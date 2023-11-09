<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <form action="/items/store" method="post">
            @csrf
            <p>name
            <input type="text" name="name" placeholder="name"></p>
            <p>category
            <select name="cat_id">
                @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select></p>
            <input type="submit" value="Создать">
        </form>
    </body>
</html>
