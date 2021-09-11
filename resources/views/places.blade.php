<!DOCTYPE html>
<html>
    <head>
        <title>Все места</title>
    </head>
    <div>
        @include('menu')
        <body>
        <style>
            li {
                list-style-type: none;
                position: relative;
                padding: 0 0 0 20px;
            }
            ul {
                line-height: 1.5em;
                margin: 5px 0 15px;
                padding: 0;
                margin-left: 0;
                padding-left: 0;
            }
        </style>
            <center>
                <ul>
                    @foreach ($places as $place)
                    <li>
                        <a href="places/{{ $place->id }}/">{{ $place->name }} – {{ $place->type }}</a> &ensp;
                    </li>
                    @endforeach
                </ul>
            </center>
        </body>
    </div>
</html>
