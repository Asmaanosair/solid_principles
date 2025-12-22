<?php

namespace App\Interface;

interface PaymentMethodInterface
{
    //
    public function pay($amount): void;
}
