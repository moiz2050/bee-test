<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Record extends Model
{
    use Searchable;

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

    public function getCreatedAtAttribute($value)
    {
        return Carbon::create($value)->toFormattedDateString();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::create($value)->toFormattedDateString();
    }

    /**
     * Get the index-able data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'title' => "",
            'artist' => ""
        ];
    }
}
