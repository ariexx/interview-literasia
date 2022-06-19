<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
    ];

    public function commentable()
    {
        return $this->morphTo(); //one to many relationship, 1 post atau 1 video
    }
}
