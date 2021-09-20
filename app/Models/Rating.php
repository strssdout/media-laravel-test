<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = [];

    //Get type attribute by $rating->id;

    public function getTypeAttribute($value)
    {
        return $value;
    }

    //Get place_id attribute by $rating->id;

    public function getPlaceIdAttribute($value)
    {
        return $value;
    }

    //Get image_id attribute by $rating->id;

    public function getImageIdAttribute($value)
    {
        return $value;
    }

    //Comparing rating with place

    public function place()
    {
        $this->belongsTo(Place::class, 'place_id', 'id');
    }

    //Comparing rating with image

    public function image()
    {
        $this->belongsTo(Image::class, 'image_id', 'id');
    }

    //Scopes for likes, dislikes and overall rating for places and images

    public function scopeRatingPlace($query, $place_id)
    {
        $ratings = $query->where('place_id', $place_id)->get();
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

    public function scopeLikesPlace($query, $place_id)
    {
        $ratings = $query->where('place_id', $place_id)->get();
        $counter = 0;

        foreach ($ratings as $rating)
        {
            if ($rating->type == 'like'){
                $counter++;
            }
        }

        return $counter;
    }

    public function scopeDislikesPlace($query, $place_id)
    {
        $ratings = $query->where('place_id', $place_id)->get();
        $counter = 0;

        foreach ($ratings as $rating)
        {
            if ($rating->type == 'dislike'){
                $counter++;
            }
        }
        
        return $counter;
    }

    public function scopeRatingImage($query, $image_id)
    {
        $ratings = $query->where('image_id', $image_id)->get();
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

    public function scopeLikesImage($query, $image_id)
    {
        $ratings = $query->where('image_id', $image_id)->get();
        $counter = 0;

        foreach ($ratings as $rating)
        {
            if ($rating->type == 'like'){
                $counter++;
            }
        }

        return $counter;
    }

    public function scopeDislikesImage($query, $image_id)
    {
        $ratings = $query->where('image_id', $image_id)->get();
        $counter = 0;

        foreach ($ratings as $rating)
        {
            if ($rating->type == 'dislike'){
                $counter++;
            }
        }

        return $counter;
    }
}
