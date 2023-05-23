<?php

namespace config\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content', 'thread_id'];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}