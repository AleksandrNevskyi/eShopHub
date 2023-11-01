<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <a href="/category/create">create</a>
        @if ($cats -> count())
            <ul>
                @foreach ($cats as $item)
                    <li>
                        <h2><a href="/category/{{$item -> id}}/edit">{{$item -> name}}</a></h2>
                        <form action="/category/{{$item -> id}}/delete" method="post">
                            @csrf
                            <input type="submit" value="Удалить">
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </body>
</html>
