<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTypeModel extends Model
{
    protected $table = 'post_types';

    protected $fillable = ['name'];
}
