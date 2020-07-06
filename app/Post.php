<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    protected $slugKeyName = 'alternate';

    public function sluggable()
    {
        return [
            'slug' => [
                'source'   => 'title',
                'onUpdate' => true
            ]
        ];
    }
    protected $fillable = [
        //mass assignment
        'user_id', 'photo_id', 'category_id','title','body'
    ];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function photo(){
        return $this->belongsTo('App\photo','photo_id');
    }
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
