<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{   protected $fillable = [
    //mass assignment
    'post_id','is_active','author', 'email','body','photo_id'
    ];
    public function commentReplies(){
        return $this->hasMany('App\CommentReply','comment_id');
    }
}
