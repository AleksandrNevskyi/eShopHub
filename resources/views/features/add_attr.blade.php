<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Items</title>

    </head>
    <body class="antialiased">
        <form action="/feature/{{$feature}}/store_attr" method="post">
            @csrf
            <div>
                <div>
                    <select name="Value">
                        @foreach ($values as $item)
                            <option value="{{$item->id}}">{{$item -> name}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" value="{{$attr}}" name="attr">
                </div>
                <div>
                    <input type="submit" value="Add">
                </div>
            </div>
        </form>
    </body>
</html>
