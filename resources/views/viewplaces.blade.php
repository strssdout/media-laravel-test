<!DOCTYPE html>
<html>
    <head>
        <style>
            h2 {text-align: center;}
            p {text-align: center;}
            div {text-align: center;}
        </style>
        <link rel="stylesheet" href="{{ asset('css/image.css') }}">
    </head>
    <div>
        @include('menu')
        <body>
            <h2 class="center">Название: {{$place->name}}</h2>
            <h2 class="center">Тип: {{$place->type}}</h2>
            <h2 class="center">Фотографии:</h2><br>
            <div class="imageContainer">
                @foreach ($images as $image)
                <img src="{{ asset('/storage/'.$image->image) }}" width="640" height="400">
                @endforeach
            </div>
        </body>
    </div>
</html>