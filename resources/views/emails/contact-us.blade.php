<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Info</title>
</head>

<body>
    <div class="row mx-auto contact-wrapper">
        <h2 class="text-center">A contact request from {{$request->name}}</h2>
        <hr />

        <h5>from: <strong>{{$request->email}}</strong></h5>

        <p>Message:</p>
        <p>{{$request->text}}</p>
    </div>
</body>
</html>