<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MockTest extends Model
{
    protected $fillable = ['question_id', 'user_id', 'user_answer'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function subject(){
        return $this->belongsTo('App\Subject');
    }

    public function question(){
        return $this->belongsTo('App\Question');
    }
}
