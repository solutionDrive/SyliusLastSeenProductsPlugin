<?php

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
