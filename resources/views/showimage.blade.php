<!DOCTYPE html>
<html>
    <link rel="stylesheet" href={{ asset('css/places.css') }}>
    <link rel="stylesheet" href={{ asset('css/image.css') }}>
    <body>
        <form action={{ route('images.destroy', $image->id)}} method="post" enctype="multipart/form-data">
            @csrf
            @include('loginform')
            @method('delete')
            <div>
                <img src="{{ asset('/storage/'.$image->image) }}" width="1600" height="900"><br>
                @if (Auth::id() == 1)
                    <button class="button button1" type="submit" formmethod="get" formaction={{ route('images.download', $image->id) }}>Download</button>
                    <button class="button button2" type="submit">Delete</button>
                @else
                    <button class="button button1" type="submit" formmethod="get" formaction={{ route('images.download', $image->id) }}>Download</button>
                @endif
            </div>
        </form>
    </body>
</html>