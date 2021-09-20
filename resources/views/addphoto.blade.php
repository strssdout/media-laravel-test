<!DOCTYPE html>
<html>
    <head>
        @include('loginform')
        <title>Добавить фото</title>
    </head>
    <div>
        @include('menu')
        <form action={{ route('images.store') }} method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="center">Добавьте новую фотографию</h1>
            Город: <select name="type" id="" class="@error('type') is-invalid @enderror">
                @foreach ($places as $place)
                <option value={{ $place->id }}>{{ $place->name }}</option>
                @endforeach
            </select>
            <input type="file" name="image" id="" class="@error('image') is-invalid @enderror">
            @error('image')
                <div class="alert alert-danger"><font size="5" color="red">{{ $message }}</font></div>
            @enderror
            <button type="submit">Send</button>
        </form>
    </div>
</html>
