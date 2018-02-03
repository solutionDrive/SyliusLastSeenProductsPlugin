<?php

declare(strict_types=1);

namespace spec\SolutionDrive\SyliusLastSeenProductsPlugin\Entity;

use SolutionDrive\SyliusLastSeenProductsPlugin\Entity\Customer;
use Sylius\Component\Core\Model\Customer as BaseCustomer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CustomerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Customer::class);
    }

    public function it_is_sylius_customer()
    {
        $this->shouldHaveType(BaseCustomer::class);
    }

    public function it_gets_and_sets_last_seen_products()
    {
        $this->setLastSeen(['product1', 'product2']);
        $this->getLastSeen()->shouldReturn(['product1', 'product2']);
    }
}
