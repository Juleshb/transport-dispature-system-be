<?php

namespace App\Models;
// use App\Models\Reciptionist;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Agence extends Authenticatable
{
    use HasFactory, HasApiTokens,Notifiable;
    public $timestamps=false;
    protected $fillable=['company_name','company_Admin','company_Code',
    'password','company_OwnershipType','created_at','role','updated_at'];

    // public function Doctor(){
    // return $this->hasMany(Doctor::class);
    // }
    // public function Reciptionist(){
    //     return $this->hasMany(Reciptionist::class);
    //     }
}