<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <p><a href="/attribute_values/create">create</a></p>
        @if ($values->count())
            @foreach ($values as $item)
                <div>
                    <h1><a href="/attribute_values/{{$item->id}}/edit">{{$item->name}}</a></h1>
                    <h2>{{ $item->attribute->name }}</h2>
                    <form action="/attribute_values/{{$item->id}}/delete" method="post">
                        @csrf
                        <input type="submit" value="Удалить">
                    </form>
                </div>
            @endforeach
        @endif
    </body>
</html>
