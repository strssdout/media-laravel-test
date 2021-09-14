<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Http\Requests\PlaceRequest;
use App\Models\Image;
use App\Http\Requests\ImageRequest;
use App\Models\Rating;
class PlacesController extends Controller
{
    public function place($id)
    {
        $place = Place::find($id);
        $images = Image::where('place_id', $place->id)->get();
        $ratings = Rating::all();
        $rating = 0;
        if ($place == NULL){
            return redirect('places');
        }
        else return view('viewplaces', compact('id', 'place', 'images', 'ratings', 'rating'));
    }

    public function ratingIndex()
    {
        $places = Place::all();
        $images = Image::all();
        $ratings = Rating::all();
        if ($places == NULL){
            return redirect('places');
        }
        else return view('rating', compact('places', 'images', 'ratings'));
    }

    public function index()
    {
        $places = Place::all();
        return view('places', compact('places'));
    }

    public function showForm()
    {
        return view('createplace');
    }

    public function addPlace(PlaceRequest $req/*, ImageRequest $reqIm*/)
    {
        /*$imageName = $reqIm->file('image')->storePublicly('images', 'public');*/
        $name = $req->name;
        $type = $req->type;
        Place::create([
            'name' => $name,
            'type' => $type,
        ]);
        /*$placeId = Place::where('name', $name)->first();
        Image::create([
            'place_id' => $placeId->id,
            'name' => $name,
            'image' => $imageName,
        ]);*/
        return redirect('places/create');
    }

    public function rate(Request $req)
    {
        $images = Image::all();
        foreach ($images as $image){
            if ($req->submit == $image->id . 'likei'){
                Rating::create([
                    'type' => 'like',
                    'image_id' => $image->id,
                ]);
            }
            else if ($req->submit == $image->id . 'dislikei'){
                Rating::create([
                    'type' => 'dislike',
                    'image_id' => $image->id,
                ]);
            }
        }
        $places = Place::all();
        foreach ($places as $place){
            if ($req->submit == $place->id . 'likep'){
                Rating::create([
                    'type' => 'like',
                    'place_id' => $place->id,
                ]);
            }
            else if ($req->submit == $place->id . 'dislikep'){
                Rating::create([
                    'type' => 'dislike',
                    'place_id' => $place->id,
                ]);
            }
        }
        return redirect()->back();
    }
}
