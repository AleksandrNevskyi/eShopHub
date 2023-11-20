<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit</title>

    </head>
    <body class="antialiased">
        <h1>{{$feature->name}}</h1>
        @foreach ($feature->attributes as $item)
            <h3>{{$item->name}}</h3>
        @endforeach
        <form action="/features/{{$feature->id}}/update" method="post">
            @csrf
            <div>
                <div>
                    <p>name</p>
                    <input type="text" name="name" placeholder="name" value="{{$feature->name}}">
                </div>
                <div>
                    <p>attributes</p>
                    @foreach ($attributes as $item)
                        <label for="{{$item->id}}">{{$item->name}}</label>
                        <input @if ($feature->attributes()->pluck('id')->contains($item->id)) checked @endif type="checkbox" name="feature_attribute[{{$item->id}}]" id="{{$item->id}}">
                    @endforeach
                </div>
                <div>
                    <input type="submit" value="Update">
                </div>
            </div>
        </form>
    </body>
</html>
