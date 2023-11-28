<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaypalSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'account_mode',
        'country_name',
        'currency',
        'currency_rate',
        'client_id',
        'secret_key',
    ];
}
