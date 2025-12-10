<?php

namespace App\Observers;

use App\Models\Client;
use Illuminate\Support\Facades\Log;

class ClientObserver
{
    public function created(Client $client): void
    {
        Log::info('New Client created', ['email' => $client->email]);
    }
}
