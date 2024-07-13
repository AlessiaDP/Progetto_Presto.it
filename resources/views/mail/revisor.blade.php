<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>{{$content['name']}} ha richiesto di diventare revisore</h1>
        <p>La sua email è {{$content['email']}}</p>
        <p>Le sue esperienze sono: <br> <span>"{{$content['body']}}"</span></p>
        <p>Per accettarla clicca sul link qui sotto</p>
        <a href="{{route('makeRevisor' , compact('user'))}}">Accetta</a>
    </div>
</body>
</html>