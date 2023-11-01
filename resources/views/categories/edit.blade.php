<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit</title>

    </head>
    <body class="antialiased">
        <h1>{{$cat->name}}</h1>
        <p>{{$cat -> description}}</p>
        <form action="/category/{{$cat->id}}/update" method="post">
            @csrf
            <p>name</p>
            <input type="text" name="name" placeholder="name" value="{{$cat->name}}" id="name">
            <p>desc</p>
            <input type="text" name="desc" placeholder="desc" value="{{$cat->description}}" id="desc">
            <input type="submit" value="Изменить">
        </form>
    </body>
</html>