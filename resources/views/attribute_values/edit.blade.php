<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit</title>

    </head>
    <body class="antialiased">
        <h1>{{$value->name}}</h1>
        <form action="/attribute_values/{{$value->id}}/update" method="post">
            @csrf
            <p>name</p>
            <input type="text" name="name" value="{{$value->name}}" placeholder="name">
            <p>attribute</p>
            <select name="attribute">
                @foreach ($attributes as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="Update  ">
        </form>
    </body>
</html>