<?php
/**
 * Created by solutionDrive GmbH.
 *
 * @author   :  Vladislav Sultanov <sultanov@solutionDrive.de>
 * @date     :  03.02.18
 * @time     :  11:42
 * @copyright:  2018 solutionDrive GmbH
 */

namespace Tests\AppBundle\Behat\Context;


use Behat\Behat\Context\Context;
use Sylius\Behat\Page\Admin\Customer\ShowPage;
use Sylius\Component\Core\Model\ProductInterface;
use Webmozart\Assert\Assert;

class LastSeenProductsContext implements Context
{
    /**
     * @var ShowPage
     */
    private $showPage;

    public function __construct(ShowPage $showPage)
    {
        $this->showPage = $showPage;
    }

    /**
     * @And customer :customer visited pages of products :product and :product
     */
    public function customerVistitedPagesOfProducts($customer, ...$products)
    {
        $lastSeenProduct = [];
        /** @var ProductInterface $product */
        foreach ($products as $product) {
            $lastSeenProduct[] = $product->getCode();
        }

        $customer->setLastSeen($lastSeenProduct);
    }

    /**
     * @Then I should see :count last seen products
     */
    public function iShouldSeeLastSeenProducts($count)
    {
        $codes = $this->showPage->countLastSeenProductsCodes();
        assertEquals($count, $codes);
    }

    /**
     * @And I should see :name product
     */
    public function iShouldSeeThatProduct($name)
    {
        assertTrue($this->showPage->hasLastSeenProduct($name));
    }

    /**
     * @And I should not to see :name product
     */
    public function iShouldNotToSeeThatProduct($name)
    {
        assertFalse($this->showPage->hasLastSeenProduct($name));
    }
}