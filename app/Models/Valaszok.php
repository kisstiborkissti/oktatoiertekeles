<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valaszok extends Model
{
    protected $table = 'valaszok';
    protected $primaryKey = 'sorszam';
    protected $fillable = ['tanuloom','oktato','kerdes','ertekeles'];
    //use HasFactory;
}
