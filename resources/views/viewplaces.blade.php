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
                <h2 class="center">Рейтинг: {{$ratingPlace}}</h2>
                <button class="button button1" type="submit" name="submit" value={{ $place->id . 'likep' }}>Like</button>
                <button class="button button2" type="submit" name="submit" value={{ $place->id . 'dislikep' }}>Dislike</button>
                <h2 class="center">Тип: {{$place->type}}</h2>
                <h2 class="center">Фотографии
                    @if ($images->where('place_id', $place->id)->first()==NULL)
                    не найдены
                    @endif
                </h2><br>
                    @foreach ($images as $image)
                    <a href={{ route('images.show', $image->id) }}><img src="{{ asset('/storage/'.$image->image) }}" width="640" height="400"></a>
                    <b>{{ $ratingImagesLikes[$image->id] - $ratingImagesDislikes[$image->id] }}</b>
                    <button class="button button1" type="submit" name="submit" value={{ $image->id . 'likei' }}>Like</button>
                    <button class="button button2" type="submit" name="submit" value={{ $image->id . 'dislikei' }}>Dislike</button>
                    @endforeach
            </body>
        </div>
    </form>
</html>