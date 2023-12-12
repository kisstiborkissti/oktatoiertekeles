<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KolisTanulok extends Model
{
    protected $table = 'kolistanulok';
    protected $primaryKey = 'oktatasiazonosito';
    protected $fillable = ['kerdes'];
    //use HasFactory;
}
