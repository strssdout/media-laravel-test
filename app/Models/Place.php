<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = [];

    public function getIdAttribute($value)
    {
        return $value;
    }

    public function getNameAttribute($value)
    {
        return $value;
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
