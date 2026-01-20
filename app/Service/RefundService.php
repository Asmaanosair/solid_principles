<?php

namespace App\Service;

use App\Factory\PaymentMethodFactory;
use App\Interface\PaymentMethodInterface;
use App\Interface\PaymentRefundInterface;

readonly class RefundService
{
    /**
     * Create a new class instance.
     */
    public function __construct( private  PaymentMethodFactory $factory)
    {
        //
    }

    /**
     * After Using LSP
     * @param float $amount
     * @param string $method
     * @return void
     */
    public function refund(float $amount, string $method): void
    {
        $refund = $this->factory->makeRefund($method);
        $refund->refund($amount);
    }
}
