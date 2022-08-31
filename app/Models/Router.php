<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
  protected $fillable = [
    'router_name',
    'amount',
    'agence_id'
    
];
use HasFactory;

public function User(){
    return $this->belongsTo(User::class);
  }
  public function router(){
    return $this->belongsTo(BussToRouter::class);
  }
}