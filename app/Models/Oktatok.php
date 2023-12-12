<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oktatok extends Model
{
    protected $table = 'oktatok';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nev','tanev','szulhely','szulido','oktaz','2fa'];
    //use HasFactory;
}
