<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $gaurded=['id'];
    protected $fillable=['category_id','trainer_id','name','small_desc','desc','price','img'];
    public function Category(){
        return $this->belongsTo('App\Category');
    }
   public function Trainer(){
        return $this->belongsTo('App\Trainer');
    }
   
    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

}
