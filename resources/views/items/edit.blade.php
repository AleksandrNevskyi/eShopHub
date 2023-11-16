<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit</title>

    </head>
    <body class="antialiased">
        <h1>{{$item->name}}</h1>
        <h2>{{$category->name}}</h2>
        <p>{{$category->description}}</p>
        
        <form action="/items/{{$item->id}}/update" method="post">
            @csrf
            <p>name
            <input type="text" name="name" placeholder="name" value="{{$item->name}}" id="name"></p>
            <p>category
                <select name="cat_id">
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
            </select></p>
            @foreach ($item as $item)
                <p>{{ $item->locations->title }}</p>
            @endforeach
            <input type="submit" value="Изменить">
        </form>
    </body>
</html>