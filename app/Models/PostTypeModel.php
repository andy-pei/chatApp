<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTypeModel extends Model
{
    protected $table = 'post_types';

    protected $fillable = ['name'];

    public function posts() {
        return $this->hasMany('App\Models\PostModel', 'type_id');
    }
}
