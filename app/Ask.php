<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BrianFaust\Commentable\HasComments;

class Ask extends Model
{
    use HasComments;

    protected $fillable=['user_id', 'category_id', 'question'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

}
