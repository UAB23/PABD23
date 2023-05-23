<?php

namespace config\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}