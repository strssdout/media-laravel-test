<html>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <ul class="menu-main">
        <li><a href={{ route('places.create') }}>Создать место</a></li>
        <li><a href={{ route('images.create') }}>Добавить фотографию к месту</a></li>
        <li><a href={{ route('places.index') }}>Все места</a></li>
        <li><a href={{ route('rating.index') }}>Рейтинг</a></li>
    </ul>
</html>
