<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit</title>

    </head>
    <body class="antialiased">
        <h1>{{$item->name}}</h1>
        <form action="/item/update/{{$item->id}}" method="post">
            @csrf
            <p>name</p>
            <input type="text" name="name" placeholder="name" value="{{$item->name}}" id="name">
            <input type="submit" value="Изменить">
        </form>
    </body>
</html>