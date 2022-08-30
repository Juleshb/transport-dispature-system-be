<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buss extends Model
{
    protected $fillable = [
        'buss-name',
        'driver-name',
        'buss-code',
        'agence_id'
        
    ];
    use HasFactory;

    public function User(){
        return $this->belongsTo(User::class);
      }
}
