<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body'
    ];

    public function createdAt()
    {
        return $this->created_at->toFormattedDateString();
    }
}
