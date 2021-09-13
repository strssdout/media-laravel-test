<!DOCTYPE html>
<html>
    <form action={{ route('places_rate') }} method="post">
        @csrf
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
                <h2 class="center">Рейтинг: {{$ratings->countRatingForPlace($place->id)}}</h2>
                <button class="center" type="submit" name="submit" value={{ $place->id . 'likep' }}>Like</button>
                <button class="center" type="submit" name="submit" value={{ $place->id . 'dislikep' }}>Dislike</button>
                <h2 class="center">Тип: {{$place->type}}</h2>
                <h2 class="center">Фотографии:</h2><br>
                <!-- <div class="imageContainer"> -->
                    @foreach ($images as $image)
                    <img src="{{ asset('/storage/'.$image->image) }}" width="640" height="400">
                    <b>{{ $ratings->countRatingForImage($image->id) }}</b>
                    <button type="submit" name="submit" value={{ $image->id . 'likei' }}>Like</button>
                    <button type="submit" name="submit" value={{ $image->id . 'dislikei' }}>Dislike</button>
                    @endforeach
                <!-- </div> -->
            </body>
        </div>
    </form>
</html>