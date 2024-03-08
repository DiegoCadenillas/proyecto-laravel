<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'fullName',
        'cardNumber',
        'expiryDate',
        'fiscalCountry',
        'fiscalCity',
        'fiscalStreet',
        'fiscalPostalCode'
    ];
}
