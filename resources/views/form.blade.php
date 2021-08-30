<form action="/form" method="post" enctype="multipart/form-data">
    @csrf
    Name: <input type="text" name="name" id="" class="@error('name') is-invalid @enderror" value={{ old('name') }}>
    @error('name')
        <div class="alert alert-danger"><font size="5" color="red">{{ $message }}</font></div>
    @enderror
    <br>
    Email: <input type="text" name="email" id="" class="@error('email') is-invalid @enderror" value={{ old('email') }}>
    @error('email')
        <div class="alert alert-danger"><font size="5" color="red">{{ $message }}</font></div>
    @enderror
    <br>
    Password: <input type="password" name="password" id="" class="@error('password') is-invalid @enderror" value={{ old('password') }}>
    @error('password')
        <div class="alert alert-danger"><font size="5" color="red">{{ $message }}</font></div>
    @enderror
    <br>
    <button type="submit">Send</button>
    <input type="file" name="image" id="">
</form>