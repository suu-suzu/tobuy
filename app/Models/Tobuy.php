<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;



class Tobuy extends Model
{
    use HasFactory;
    use SoftDeletes;
    
public function getPaginateByLimit(int $limit_count = 5)
{
    return $this::with('group')->orderBy('deadline', 'ASC')->paginate($limit_count);
}


public function group()
{
    return $this->belongsTo(Group::class);
}

public function getMyGroupTobuy()
{
    $myGroupIds = Auth::user()->groups()->wherePivot('application', 1)->pluck('id')->toArray();
    $orderedTobys = $this->whereIn('group_id', $myGroupIds)->with('group')->orderBy('deadline', 'ASC')->paginate(5);
    return $orderedTobys;
}

protected $fillable = [
    'tobuy',
    'deadline',
    'count',
    'group_id',
    'memo'
];
}