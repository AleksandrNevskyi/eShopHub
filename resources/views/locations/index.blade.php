<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <a href="/locations/create">create</a>
        @if ($locations -> count())
            <ul>
                @foreach ($locations as $item)
                    <li>
			            <h2><a href="/locations/{{$item->id}}/edit">{{$item->title}}</a></h2>
                        @if ($item->item->count())
                            @foreach ($item->items as $i)
                                <p>{{ $i->title }}</p>
                            @endforeach
                        @endif
                        <form action="/locations/{{$item -> id}}/delete" method="post">
                            @csrf
                            <input type="submit" value="Удалить">
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </body>
</html>
