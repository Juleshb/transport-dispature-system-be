<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Symfony\Component\HttpKernel\Profiler\Profile;



class Agence extends Authenticatable
{
    use HasFactory, HasApiTokens,Notifiable;
    public $timestamps=false;
    protected $fillable=['company_name','company_Admin','company_Code',
    'company_OwnershipType','company_Email',];

    // public function profile(){
    //     return $this->hasOne(Profile::class);
    // }
    
   
}