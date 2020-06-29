<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        //mass assignment
        'comment_id','is_active','author', 'email','body','photo_id'
        ];
}
