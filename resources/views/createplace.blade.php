<html>
    <head>
        @include('loginform')
    </head>
    <div>
        @include('menu')
        <form action={{ route('places.create.add') }} method="post" enctype="multipart/form-data">
            @csrf
            <h1>Добавьте новое место</h1>
            Название: <input type="text" name="name" id="" class="@error('name') is-invalid @enderror" value={{ old('name') }}>
            @error('name')
                <div class="alert alert-danger"><font size="5" color="red">{{ $message }}</font></div>
            @enderror
            <br>
            Тип: <select name="type" id="" class="@error('type') is-invalid @enderror">
                <option value="City">Город</option>
                <option value="Attraction">Достопримечательность</option>
            </select>
            @error('type')
                <div class="alert alert-danger"><font size="5" color="red">{{ $message }}</font></div>
            @enderror
            <br>
            <button type="submit">Send</button>
        </form>
    </div>
</html>

