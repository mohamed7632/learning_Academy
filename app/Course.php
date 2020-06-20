<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $gaurded=['id'];
    public function Category(){
        return $this->belongsTo('App\Category');
    }
   public function Trainer(){
        return $this->belongsTo('App\Trainer');
    }
}
