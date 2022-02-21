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
    public function country(){
        return $this->belongsTo(Countries::class,'country_id','id');
    }
    public function state(){
        return $this->belongsTo(States::class,'state_id','id');
    }
    public function city(){
        return $this->belongsTo(Cities::class,'city_id','id');
    }
}
