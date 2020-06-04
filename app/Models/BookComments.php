<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookComments extends Model
{
    protected $fillable
        = [
            'post_id',
            'comments',
            'user_id',
        ];
}
