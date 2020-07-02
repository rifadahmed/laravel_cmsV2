<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        //mass assignment
        'comment_id','is_active','user_id','body'
        ];
        public function user()
        {
            return $this->belongsTo('App\User','user_id');
        }
        public function comment(){
            return $this->belongsTo('App\Comment','comment_id');
        }
}
