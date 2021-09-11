<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Http\Requests\PlaceRequest;
use Hamcrest\Type\IsInteger;
use App\Models\Image;
use App\Http\Requests\ImageRequest;

class PlacesController extends Controller
{
    public function place($id)
    {
        $place = Place::find($id);
        $images = Image::where('name', $place->name)->get();
        if ($place == NULL){
            return redirect('places');
        }
        else return view('viewplaces', compact('id', 'place', 'images'));
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

    public function addPlace(PlaceRequest $req, ImageRequest $reqIm)
    {
        $imageName = $reqIm->file('image')->storePublicly('images', 'public');
        $name = $req->name;
        $type = $req->type;
        Place::create([
            'name' => $name,
            'type' => $type,
        ]);
        Image::create([
            'name' => $name,
            'image' => $imageName,
        ]);
        return redirect('places/create');
    }

    public function showAddPhoto($id)
    {
        $place = Place::find($id);
        if ($place == NULL){
            return redirect('places');
        }
        else return view('photoform', compact('id', 'place'));
    }

    public function addPhoto(ImageRequest $req)
    {
        $imageName = $req->file('image')->storePublicly('images', 'public');
        $name = $req->name;
        Image::create([
            'name' => $name,
            'image' => $imageName,
        ]);
        return redirect('places');
    }

    public function addPhotoForm()
    {
        $places = Place::all();
        return view('addphoto', compact('places'));
    }

    public function sendPhoto(ImageRequest $req)
    {
        $imageName = $req->file('image')->storePublicly('images', 'public');
        $name = $req->name;
        Image::create([
            'name' => $name,
            'image' => $imageName,
        ]);
        return redirect('photos/add');
    }
}
