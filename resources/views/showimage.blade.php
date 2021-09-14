<!DOCTYPE html>
<html>
    <link rel="stylesheet" href={{ asset('css/places.css') }}>
    <body>
        <form action={{ route('images.destroy', $image->id)}} method="post" enctype="multipart/form-data">
            @csrf
            @method('delete')
            <img src="{{ asset('/storage/'.$image->image) }}" width="1600" height="900">
            <button class="button button1" type="submit" formmethod="get" formaction={{ route('images.download', $image->id) }}>Download</button>
            <button class="button button2" type="submit">Delete</button>
        </form>
    </body>
</html>