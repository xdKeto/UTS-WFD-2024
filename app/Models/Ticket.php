<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $casts = [
      'boarding_time' => 'datetime:h:i:s',  
    ];

    protected $fillable = ['flight_id', 'passenger_name', 'passenger_phone', 'seat_number', 'is_boarding', 'boarding_time'];

    public function flights():BelongsTo{
        return $this->belongsTo(Flight::class);
    }
}