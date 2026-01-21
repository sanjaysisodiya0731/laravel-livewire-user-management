<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'image_name'
    ];
}
