<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tobuy extends Model
{
    use HasFactory;
    
protected $fillable = [
    'tobuy',
    'deadline',
    'group_id',
    'memo'
];
}
