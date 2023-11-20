<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <form action="/features/store" method="post">
            @csrf
            <div>
                <div>
                    <p>name</p>
                    <input type="text" name="name" placeholder="name">
                </div>
                <div>
                    @if ($attributes->count())
                        <p>attribute</p>
                        @foreach ($attributes as $item)
                            <label for="{{$item->name}}">{{$item->name}}</label>
                            <input type="checkbox" name="feature_attribute[{{ $item->id }}]" id="{{$item->name}}">
                        @endforeach
                    @endif
                </div>
                <div>
                    <input type="submit" value="Create">
                </div>
            </div>
        </form>
    </body>
</html>
