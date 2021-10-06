<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizs';
    public function subjects(){
        return $this->belongsTo(Subject::class);
    }
}
