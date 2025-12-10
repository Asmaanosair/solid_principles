<?php

namespace App\Service;

use App\Models\Client;

class ClientService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(array $data) : Client
    {
        return  Client::create($data);
    }
}
