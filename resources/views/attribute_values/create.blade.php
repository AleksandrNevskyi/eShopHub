<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <form action="/attribute_values/store" method="post">
            @csrf
            <p>name</p>
            <input type="text" placeholder="name" name="name">
            <p>
                <select name="attribute">
                    @foreach ($attributes as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </p>
            <input type="submit" value="create">
        </form>
    </body>
</html>
