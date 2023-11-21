<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit</title>

    </head>
    <body class="antialiased">
        <h1>{{$item->name}}</h1>
        <h2>Категория</h2>
        <h3>{{$category->name}}</h2>
	    <p>{{$category->description}}</p>
        <h2>Локации</h2>
        @foreach ($item->locations as $location)
            <p>{{ $location->title }}</p>
        @endforeach

        <h2>Features</h2>
        @foreach ($item->features as $feature)
            <h5>{{$feature->name}}</h5>
        @endforeach

        
        <form action="/items/{{$item->id}}/update" method="post">
            @csrf
            <p>name
            <input type="text" name="name" placeholder="name" value="{{$item->name}}" id="name"></p>
            <p>
                category
                <select name="cat_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
	            </select>
            </p>
            <p>
                <p>locations</p>
                @foreach ($locations as $location)
                    <label for="{{$location->id}}">{{$location->title}}</label>
                    <input @if ($item->locations()->pluck('id')->contains($location->id)) checked @endif type="checkbox" name="item_location[{{ $location->id }}]" id="{{$location->id}}">
                @endforeach
                
                <p>features</p>
                @foreach ($features as $feature)
                    <label for="{{$feature->id}}">{{$feature->name}}</label>
                    <input @if ($item->features()->pluck('id')->contains($feature->id)) checked @endif type="checkbox" name="item_feature[{{ $feature->id }}]" id="{{$feature->id}}">
                @endforeach
            </p>

            <input type="submit" value="Изменить">
        </form>
    </body>
</html>
