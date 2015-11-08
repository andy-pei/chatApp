<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = 'comments';

    protected $fillable = ['post_id', 'user_id', 'comment', 'block'];

    public function auther() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
