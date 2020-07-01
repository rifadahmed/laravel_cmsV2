<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{   protected $fillable = [
    //mass assignment
    'post_id','is_active','user_id', 'body'
    ];
    public function commentReplies(){
        return $this->hasMany('App\CommentReply','comment_id');
    }
    public function post()
    {
        return $this->belongsTo("App\Post",'post_id');
    }

    public function photo()
    {
        return $this->belongsTo("App\Photo",'photo_id');
    }
    public function user()
    {
        return $this->belongsTo("App\User",'user_id');
    }
}
