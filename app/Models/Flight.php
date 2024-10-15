<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flights';

    protected $casts = [
        'departure_time' => 'datetime:h:i:s',
        'arrival_time' => 'datetime:h:i:s',
        
    ];
    
    protected $fillable = ['flight_code', 'origin', 'destination', 'departure_time', 'arrival_time'];

    public function tickets():HasMany{
        return $this->hasMany(Ticket::class);
    }

}