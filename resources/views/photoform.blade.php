<form action={{ route('photos_add') }} method="post" enctype="multipart/form-data">
    @csrf
    <h1 class="center">Добавьте новую фотографию для {{$place->name}}</h1>
    <input type="hidden" name="name" value="{{ $place->name }}">
    <input type="file" name="image" id="" class="@error('image') is-invalid @enderror">
    @error('image')
        <div class="alert alert-danger"><font size="5" color="red">{{ $message }}</font></div>
    @enderror
    <button type="submit">Send</button>
</form>