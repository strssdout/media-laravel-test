<!DOCTYPE html>
<html>
@include('menu')
    <head>
            <style>
                h1 {text-align: center;}
                div {text-align: center;}
            </style>
        <h1 class="center">Рейтинг для всех мест и их фотографий</h1>
    </head>
    <body>
        @foreach ($places as $place)
            <h2>Название: {{$place->name}}</h2>
            <h2>Рейтинг места: {{$ratings->countRatingForPlace($place->id)}} (Лайков: {{$ratings->countLikesForPlace($place->id)}}, Дизлайков:{{$ratings->countDislikesForPlace($place->id)}})</h2>
            <h2>Тип: {{$place->type}}</h2>
            <h2>Рейтинг фотографий:</h2>
            @php
            $rating = 0;
            $ratingL = 0;
            $ratingD = 0;
            foreach ($images as $image)
            {{
                if ($image->name == $place->name)
                {
                    $rating = $rating + $ratings->countRatingForImage($image->id);
                    $ratingL = $ratingL + $ratings->countLikesForImage($image->id);
                    $ratingD = $ratingD + $ratings->countDislikesForImage($image->id);
                }
            }}
            @endphp
            <i>{{$rating}}(Лайков: {{$ratingL}}, Дизлайков: {{$ratingD}})</i>
        @endforeach
    </body>
</html>