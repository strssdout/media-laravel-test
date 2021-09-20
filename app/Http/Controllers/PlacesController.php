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

    //Show place by id

    public function place($id)
    {
        $place = Place::find($id);
        $images = Image::where('place_id', $place->id)->get();
        $ratingPlace = Rating::ratingPlace($place->id);
        $ratingImagesLikes[] = 0;
        $ratingImagesDislikes[] = 0;
        
        foreach ($images as $image){
            $ratingImagesLikes[$image->id] = Rating::likesImage($image->id);
            $ratingImagesDislikes[$image->id] = Rating::dislikesImage($image->id);
        }

        if ($place == NULL){
            return redirect('places');
        }

        else if ($images == NULL){
            return view('viewplaces', compact('id', 'place', 'images', 'ratingPlace'));
        }

        else return view('viewplaces', compact('id', 'place', 'images', 'ratingPlace', 'ratingImagesLikes', 'ratingImagesDislikes'));
    }

    //Show rating for all places

    public function ratingIndex()
    {
        $places = Place::all();
        $images = Image::all();
        $ratings = Rating::all();

        foreach ($places as $place){
            $ratingPlaceLikes[$place->id] = Rating::likesPlace($place->id);
            $ratingPlaceDislikes[$place->id] = Rating::dislikesPlace($place->id);
        }

        foreach ($images as $image){
            $ratingImagesLikes[$image->id] = Rating::likesImage($image->id);
            $ratingImagesDislikes[$image->id] = Rating::dislikesImage($image->id);
        }

        if ($places == NULL){
            return redirect('places');
        }

        else return view('rating', compact('places', 'images', 'ratings', 'ratingPlaceLikes', 'ratingPlaceDislikes', 'ratingImagesLikes', 'ratingImagesDislikes'));
    }

    //Show all places

    public function index()
    {
        $places = Place::all();

        return view('places', compact('places'));
    }

    //Show form for add places

    public function showForm()
    {
        return view('createplace');
    }

    //Post new place

    public function addPlace(PlaceRequest $req)
    {
        $name = $req->name;
        $type = $req->type;

        Place::create([
            'name' => $name,
            'type' => $type,
        ]);

        return redirect('places/create');
    }

    //Post new rate for images and places

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
