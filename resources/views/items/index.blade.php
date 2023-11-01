<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Items</title>

    </head>
    <body class="antialiased">
        @if ($items->count())
            <ul>
                @foreach ($items as $item)
                    <li>
                        <h2><a href="/items/edit/{{$item->id}}">{{$item->name}}</a></h2>
                        <form action="/items/delete/{{$item->id}}" method="post">
                            @csrf
                            <input type="submit" value="Удалить">
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <a href="/item/create">create</a>
        @endif
    </body>
</html>
