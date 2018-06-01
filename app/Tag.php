<?php

namespace App;


class Tag extends Model
{
    protected $touches = ['images'];

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
