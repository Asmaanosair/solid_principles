<?php

namespace App\Service\Payment;

use App\Interface\PaymentMethodInterface;

class Paypal  implements PaymentMethodInterface
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
}
