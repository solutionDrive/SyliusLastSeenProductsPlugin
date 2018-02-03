<?php
/**
 * Created by solutionDrive GmbH.
 *
 * @author   :  Vladislav Sultanov <sultanov@solutionDrive.de>
 * @date     :  03.02.18
 * @time     :  11:42
 * @copyright:  2018 solutionDrive GmbH
 */

namespace Tests\SolutionDrive\SyliusLastSeenProductsPlugin\Behat\Context;

use Behat\Behat\Context\Context;
use SolutionDrive\SyliusLastSeenProductsPlugin\Entity\Customer;
use Sylius\Component\Core\Model\ProductInterface;
use Tests\SolutionDrive\SyliusLastSeenProductsPlugin\Behat\Page\ShowPage;
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
     * @When /^(customer "[^"]+") visited pages of (product "[^"]+") and (product "[^"]+")$/
     */
    public function customerVisitedPagesOfProducts(Customer $customer, ...$products): void
    {
        $lastSeenProductCodes = [];
        /** @var ProductInterface $product */
        foreach ($products as $product) {
            $lastSeenProductCodes[] = $product->getCode();
        }

        $customer->setLastSeen($lastSeenProductCodes);
    }

    /**
     * @Then I should see :count last seen products
     */
    public function iShouldSeeLastSeenProducts(int $count): void
    {
        Assert::same($this->showPage->countLastSeenProductsCodes(), $count);
    }

    /**
     * @When I should see :name product
     */
    public function iShouldSeeThatProduct(string $name): void
    {
        Assert::true($this->showPage->hasLastSeenProduct($name));
    }

    /**
     * @When I should not see :name product
     */
    public function iShouldNotToSeeThatProduct(string $name): void
    {
        Assert::false($this->showPage->hasLastSeenProduct($name));
    }
}
