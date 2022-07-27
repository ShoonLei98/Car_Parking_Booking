<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'customer_id',
        'service_id',
        'customer_email',
        'booking_date',
        'pick_up_date',
        'car_number',
        'duration',
        'note',
    ];
}
