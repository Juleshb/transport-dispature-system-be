<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BKticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_id',
        'router_id',
        'buss_id'];
    
    public function User(){
        return $this->belongsTo(User::class);
      }
    public function agence(){
        return $this->belongsTo(Agence::class);
    }
    public function router(){
        return $this->belongsTo(Router::class);
    }
    public function buss(){
        return $this->hasMany(buss::class);
    }
}
