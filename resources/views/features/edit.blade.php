<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit</title>

    </head>
    <body class="antialiased">
        <h1>{{$feature->name}}</h1>
        <div>
            <p>attributes</p>
                @foreach ($feature->attributes as $item)
                    <h4>{{$item->name}}:</h4><p>{{App\Models\Attribute_value::find($item->pivot->value_id)->name}}</p>
                @endforeach 
            <form action="/feature/{{$feature->id}}/add_attr/" method="post">
                @csrf
                <div>
                    <select name="attr">
                        @foreach ($attributes as $item)
                            @if (null == ($feature->attributes()->pluck("id")->contains($item->id)))<option value="{{$item->id}}">{{$item->name}}</option>@endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="submit" value="add attr">
                </div>
            </form>
        </div>
        <form action="/features/{{$feature->id}}/update" method="post">
            @csrf
            <div>
                <div>
                    <p>name</p>
                    <input type="text" name="name" placeholder="name" value="{{$feature->name}}">
                </div>
                <div>
                    <input type="submit" value="Update">
                </div>
            </div>
        </form>
    </body>
</html>
