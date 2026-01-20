<?php

namespace App\Service\Payment;

use App\Interface\PaymentMethodInterface;
use App\Interface\PaymentRefundInterface;

class Stripe  implements PaymentMethodInterface , PaymentRefundInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function pay($amount): void
    {
        // TODO: Implement pay() method.
    }

    public function refund($amount): void
    {
        // TODO: Implement refund() method.
    }
}
