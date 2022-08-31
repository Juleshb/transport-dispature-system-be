<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussToRouter extends Model
{ 
    protected $fillable = [
    'buss_id',
    'router_id',
    'agence_id'
    
];
    use HasFactory;

    // public function buss(){
    //     return $this->hasMany(buss::class);
    //     }
    // public function router(){
    //         return $this->hasMany(Router::class);
    //       }
}

