<?php

namespace App\Interface;

use App\Models\PaymentMethod;

interface PaymentRefundInterface
{
    public function refund( $amount ): void;
}
