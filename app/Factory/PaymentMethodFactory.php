<?php

namespace App\Factory;

use App\Interface\PaymentMethodInterface;
use App\Interface\PaymentRefundInterface;
use App\Service\Payment\Cash;
use App\Service\Payment\Paypal;
use App\Service\Payment\Stripe;
use DomainException;

class PaymentMethodFactory
{
    /**
     * Create a new class instance.
     */
    public function make(string $methodName): PaymentMethodInterface
    {
        return match ($methodName)
        {
            "cash" => app(Cash::class),
            "paypal" => app(Paypal::class),
            "stripe" => app(Stripe::class),
            default => throw new DomainException('Invalid payment method'),
        };
    }
    public  function makeRefund(string $methodName): PaymentRefundInterface
    {
        $paymentMethod = $this->make($methodName);
        if (!$paymentMethod instanceof PaymentRefundInterface){
            throw new DomainException('Refund not supported for this method');
        }
        return $paymentMethod;
    }
}
