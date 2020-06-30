<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable=['title', 'category_id', 'summary', 'detalis', 'published','image'];
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
}
