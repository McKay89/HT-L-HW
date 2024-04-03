<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homan-Trans - Laravel Homework</title>
</head>
<body>
    <h1>{{$heading}}</h1>

    @unless(count($listings) == 0)
        @foreach($listings as $listing)
            <h2><a href="listings/{{$listing['id']}}">{{$listing['title']}}</a></h2>
            <p>{{$listing['description']}}</p>
        @endforeach
    @else
        <p>No episodes found !</p>
    @endunless
</body>
</html>