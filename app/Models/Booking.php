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
        'car_number',
        'duration',
        'note',
    ];

    public function setCategoryAttribute($value)
    {
        $this->attributes['service'] = json_encode($value);
    }

    public function getCatgoryAttribute($value)
    {
        return json_decode($value);
    }
}
