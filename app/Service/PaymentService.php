<?php

namespace App\Service;

use App\Factory\PaymentMethodFactory;
use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Interface\PaymentMethodInterface;
use App\Interface\PaymentRefundInterface;
use DomainException;

readonly class PaymentService
{
    public function __construct(private PaymentMethodFactory $factory) {}

    public function payOld($amount,$method): void
    {
        if($method=="paypal")
        {
            //  PayPal logic
        }
        elseif ($method=="stripe")
        {
            // Stripe logic
        }
        elseif ($method=="cash")
        {
            //  Cash logic
        }
    }

    /**
     * After Using LSP
     * @param float $amount
     * @param string $method
     * @return void
     */
    public function pay(float $amount,string $method): void
    {
        $paymentMethod = $this->factory->make($method);
        $paymentMethod->pay($amount);
    }
}
