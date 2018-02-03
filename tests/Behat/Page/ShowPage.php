<?php
/**
 * Created by solutionDrive GmbH.
 *
 * @author   :  Vladislav Sultanov <sultanov@solutionDrive.de>
 * @date     :  03.02.18
 * @time     :  12:14
 * @copyright:  2018 solutionDrive GmbH
 */

namespace Tests\SolutionDrive\SyliusLastSeenProductsPlugin\Behat\Page;

use Sylius\Behat\Page\Admin\Customer\ShowPage as BaseShowPage;

class ShowPage extends BaseShowPage
{
    public function countLastSeenProductsCodes()
    {
        return count($this->getDocument()->find('css', '#LastSeenProducts .code'));
    }

    public function hasLastSeenProduct($product)
    {
        return null !== $this->getDocument()->find(
            'css',
            sprintf('#LastSeenProducts .code:contains("%s")', $product)
        );
    }
}
