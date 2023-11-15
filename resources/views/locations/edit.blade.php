<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit</title>

    </head>
    <body class="antialiased">
        <h1>{{$location->title}}</h1>
        <p>{{$location -> desc}}</p>
        <form action="/locations/{{$location->id}}/update" method="post">
            @csrf
            <p>name</p>
            <input type="text" name="name" placeholder="name" value="{{$location->title}}" id="name">
            <p>desc</p>
            <input type="text" name="desc" placeholder="desc" value="{{$location->desc}}" id="desc">
            <input type="submit" value="Изменить">
        </form>
    </body>
</html>
