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

    public function countRatingForPlace($place_id)
    {
        $ratings = $this->where('place_id', $place_id)->get();
        $counter = 0;
        foreach ($ratings as $rating)
        {
            if ($rating->type == 'like'){
                $counter++;
            }
            else $counter--;
        }
        return $counter;
    }

    public function countLikesForPlace($place_id)
    {
        $ratings = $this->where('place_id', $place_id)->get();
        $counter = 0;
        foreach ($ratings as $rating)
        {
            if ($rating->type == 'like'){
                $counter++;
            }
        }
        return $counter;
    }

    public function countDislikesForPlace($place_id)
    {
        $ratings = $this->where('place_id', $place_id)->get();
        $counter = 0;
        foreach ($ratings as $rating)
        {
            if ($rating->type == 'dislike'){
                $counter++;
            }
        }
        return $counter;
    }

    public function countRatingForImage($image_id)
    {
        $ratings = $this->where('image_id', $image_id)->get();
        $counter = 0;
        foreach ($ratings as $rating)
        {
            if ($rating->type == 'like'){
                $counter++;
            }
            else $counter--;
        }
        return $counter;
    }

    public function countLikesForImage($image_id)
    {
        $ratings = $this->where('image_id', $image_id)->get();
        $counter = 0;
        foreach ($ratings as $rating)
        {
            if ($rating->type == 'like'){
                $counter++;
            }
        }
        return $counter;
    }

    public function countDislikesForImage($image_id)
    {
        $ratings = $this->where('image_id', $image_id)->get();
        $counter = 0;
        foreach ($ratings as $rating)
        {
            if ($rating->type == 'dislike'){
                $counter++;
            }
        }
        return $counter;
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
