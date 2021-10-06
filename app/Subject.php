<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    public function classes(){
         return $this->belongsTo(Classes::class);
    }
    public function quizes(){
        return $this->hasMany(Quiz::class,'book_id','id');
    }
}
