<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Group extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
    
    public function tobuys(){
        return $this->hasMany(Tobuy::class);
    }
    
    public function getByGroup(int $limit_count = 5){
        return $this->tobuys()->with('group')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    

    public function users(){
        return $this->belongsToMany(User::class, 'group_users');
    }
    
}
