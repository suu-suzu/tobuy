<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tobuy extends Model
{
    use HasFactory;
    use SoftDeletes;
    
public function getPaginateByLimit(int $limit_count = 5)
{
    return $this::with('group')->orderBy('deadline', 'DESC')->paginate($limit_count);
}


public function group()
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