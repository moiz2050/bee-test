<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['shop_id', 'title', 'artist', 'genre'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public function setArtistAttribute($value)
    {
        $this->attributes['artist'] = strtolower($value);
    }

    public function getArtistAttribute($value)
    {
        return ucwords($value);
    }
}
