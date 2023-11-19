<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Items</title>

    </head>
    <body class="antialiased">
        <p><a href="/features/create">create</a></p>
        @if ($features->count())
            @foreach ($features as $item)
                <div>
                    <h2><a href="/features/{{$item->id}}/edit">{{$item->name}}</a></h2>
                    <form action="/features/{{$item->id}}/delete" method="post">
                        @csrf
                        <input type="submit" value="Удалить">
                    </form>
                </div>
            @endforeach
        @endif
    </body>
</html>
