<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    public function subjects(){
        return $this->hasMany(Subject::class,'class_id','id');
    }
}
