<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = [];

    //Get id attribute by $place->id;

    public function getIdAttribute($value)
    {
        return $value;
    }

    //Get name attribute by $place->id;

    public function getNameAttribute($value)
    {
        return $value;
    }

    //Comparing place with images

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
