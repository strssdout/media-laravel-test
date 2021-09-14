<!DOCTYPE html>
<html>
    <form action={{ route('places.rate') }} method="post">
        @csrf
        <head>
            <link rel="stylesheet" href="{{ asset('css/image.css') }}">
            <link rel="stylesheet" href="{{ asset('css/places.css') }}">
        </head>
        <div>
            @include('menu')
            <body>
                <h2 class="center">Название: {{$place->name}}</h2>
                <h2 class="center">Рейтинг: {{$ratings->countRatingForPlace($place->id)}}</h2>
                <button class="button button1" type="submit" name="submit" value={{ $place->id . 'likep' }}>Like</button>
                <button class="button button2" type="submit" name="submit" value={{ $place->id . 'dislikep' }}>Dislike</button>
                <h2 class="center">Тип: {{$place->type}}</h2>
                <h2 class="center">Фотографии:</h2><br>
                <!-- <div class="imageContainer"> -->
                    @foreach ($images as $image)
                    <a href={{ route('images.show', $image->id) }}><img src="{{ asset('/storage/'.$image->image) }}" width="640" height="400"></a>
                    <b>{{ $ratings->countRatingForImage($image->id) }}</b>
                    <button class="button button1" type="submit" name="submit" value={{ $image->id . 'likei' }}>Like</button>
                    <button class="button button2" type="submit" name="submit" value={{ $image->id . 'dislikei' }}>Dislike</button>
                    <!-- <button type="reset" formaction={{ route('images.destroy', $image->id)}} formmethod="delete">Delete</button> -->
                    @endforeach
                <!-- </div> -->
            </body>
        </div>
    </form>
</html>