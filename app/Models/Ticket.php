<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
   
    protected $fillable = [
        'company-name',
        'name',
        'rout',
        'phone',
        'amount',
        'time',
        'buss-code'
    ];

    use HasFactory;
    public function Passenger()
    {
        return $this->belongsTo(Passenger::class);
    }
   
}

