<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osszerendeles extends Model
{
    protected $table = 'osszerendeles';
    protected $primaryKey = 'id';
    protected $fillable = ['elotag','vezeteknev','utonev','oktazon','osztalycsoport','pedagogus','tantargy','pedom'];
    //use HasFactory;
}
