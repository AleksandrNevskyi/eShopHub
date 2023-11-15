<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <form action="/locations/store" method="post">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="text" name="desc" placeholder="desc">
            <input type="submit" value="Создать">
        </form>
    </body>
</html>
