<?php
/**
 * Created by solutionDrive GmbH
 *
 * @author    lei wang <wang@solutiondrive.de>
 * @date      03.02.18
 * @time:     12:14
 * @copyright 2018 solutionDrive GmbH
 */

declare(strict_types=1);

namespace SolutionDrive\SyliusLastSeenProductsPlugin\Entity;

use Sylius\Component\Core\Model\Customer as BaseCustomer;

class Customer extends BaseCustomer
{
    /**
     * @var array
     */
    private $lastSeen = [];

    /**
     * @return array
     */
    public function getLastSeen(): ?array
    {
        return $this->lastSeen;
    }

    /**
     * @param array $lastSeen
     */
    public function setLastSeen(?array $lastSeen): void
    {
        $this->lastSeen = $lastSeen;
    }
}
