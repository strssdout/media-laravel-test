<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = [];

    public function getTypeAttribute($value)
    {
        return $value;
    }

    public function getPlaceIdAttribute($value)
    {
        return $value;
    }

    public function getImageIdAttribute($value)
    {
        return $value;
    }

    public function place()
    {
        $this->belongsTo(Place::class, 'place_id', 'id');
    }

    public function image()
    {
        $this->belongsTo(Image::class, 'image_id', 'id');
    }
}
