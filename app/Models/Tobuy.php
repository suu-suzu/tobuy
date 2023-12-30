<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tobuy extends Model
{
    use HasFactory;
    use SoftDeletes;
    
public function groups()
{
    return $this->belongsTo(Group::class);
}
    
protected $fillable = [
    'tobuy',
    'deadline',
    'group_id',
    'memo'
];
}
