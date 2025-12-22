<?php

namespace App\Service;

use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Interface\PaymentMethodInterface;

readonly class PaymentService
{
    /**
     * Create a new class instance.
     */
    public function __construct( private  PaymentMethodInterface $paymentMethod)
    {
        //
    }

    /**
     * Before Using Open Closed Principle
     * @param $amount
     * @param $method
     * @return void
     */
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
     * After Using Open Closed Principle
     * @param $amount
     * @return void
     */
    public function pay($amount): void
    {
        $this->paymentMethod->pay($amount);
    }
}
