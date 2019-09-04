<?php

namespace App;

//use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    protected $fillable = [
        'title','content','image','slug'
    ];

    public function scopeSlug($query, $slug){
        if($slug != ''){
            $query->where('slug', $slug);
        }
    }
}
