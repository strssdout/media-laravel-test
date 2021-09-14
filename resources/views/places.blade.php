<!DOCTYPE html>
<html>
<link rel="stylesheet" href="{{ asset('css/places.css') }}">
    <head>
        <title>Все места</title>
    </head>
    <div>
        @include('menu')
        <body>
            <ul>
                @foreach ($places as $place)
                <li>
                    <a class="one" href="places/{{ $place->id }}/">{{ $place->name }}</a> &ensp;
                </li>
                @endforeach
            </ul>
        </body>
    </div>
</html>
