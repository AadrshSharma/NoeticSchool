<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table = 'personals';
    protected $guarded = [];
    public function skills0(){
        return $this->belongsToMany(Skills::class,'user_skills','user_id','skill_id');
    }
}
