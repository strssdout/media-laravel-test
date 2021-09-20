<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Image extends Model
{
    protected $guarded = [];

    //Get id attribute by $image->id;

    public function getIdAttribute($value)
    {
        return $value;
    }

    //Get name attribute by $image->id;

    public function getNameAttribute($value)
    {
        return $value;
    }
}
