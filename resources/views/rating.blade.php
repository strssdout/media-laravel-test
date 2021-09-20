<!DOCTYPE html>
<html>

    <head>
        <div>
            @include('loginform')
        </div>
        @include('menu')
        <style>
            h3 {text-align: center;}
            div {text-align: center;}
        </style>
        <h3 class="center">Рейтинг для всех мест и их фотографий</h1>
    </head>
    <body>
        @foreach ($places as $place)
            <h2>Название: {{$place->name}}</h2>
            <h2>Рейтинг места: {{$ratingPlaceLikes[$place->id] - $ratingPlaceDislikes[$place->id]}} 
                (Лайков: {{$ratingPlaceLikes[$place->id]}}, 
                Дизлайков:{{$ratingPlaceDislikes[$place->id]}})
            </h2>
            <h2>Тип: {{$place->type}}</h2>
            <h2>Рейтинг фотографий: @if ($images->where('place_id', $place->id)->first()==NULL)
                <i>фотографий не найдено</i>
                @endif
            </h2>
            @foreach ($images as $image)
            @if ($image->place_id == $place->id)
            <i>{{$ratingImagesLikes[$image->id] - $ratingImagesDislikes[$image->id]}}
                (Лайков: {{$ratingImagesLikes[$image->id]}}, 
                Дизлайков: {{$ratingImagesDislikes[$image->id]}})
            </i>
            @endif
            @endforeach
        @endforeach
    </body>
</html>