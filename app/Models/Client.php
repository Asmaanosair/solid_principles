<?php

namespace App\Models;

use App\Observers\ClientObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
#[ObservedBy(ClientObserver::class)]
class Client extends Model
{
    protected $fillable = ['name', 'email'];
}
