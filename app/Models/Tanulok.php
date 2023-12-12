<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanulok extends Model
{
    protected $table = 'tanulok';
    protected $primaryKey = 'oktatasiazonosito';
    protected $fillable = ['nev','oktatasiazonosito','anyjaszulnev','szulhely','szulido','tankotelezett','kerdes','osztaly'];
    //use HasFactory;
}
