<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Items</title>

    </head>
    <body class="antialiased">
        <a href="/items/create">create</a>
        @if ($items->count())
            <ul>
                @foreach ($items as $item)
                    <li>
			<h2><a href="/items/{{$item->id}}/edit">{{$item->name}}</a></h2>
			<p>{{ $item->category->name }}</p>
                        <form action="/items/{{$item->id}}/delete" method="post">
                            @csrf
                            <input type="submit" value="Удалить">
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </body>
</html>
