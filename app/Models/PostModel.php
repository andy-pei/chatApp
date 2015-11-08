<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'posts';

    protected $fillable = ['user_id', 'type_id', 'title', 'body'];

    public function type() {
        return $this->belongsTo('App\Models\PostTypeModel', 'type_id');
    }

    public function author() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
