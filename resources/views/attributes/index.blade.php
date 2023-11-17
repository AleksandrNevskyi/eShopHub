<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
       @if ($attributes->count())
            @foreach ($attributes as $item) 
                <div>
                    <h2><a href="/attributes/{{$item->id}}/edit">{{$item->name}}</a></h2>
                    <form action="/attributes/{{$item->id}}/delete" method="POST">
                        @csrf
                        <input type="submit" value="Удалить">
                    </form>
                </div>
            @endforeach
       @endif
    </body>
</html>
