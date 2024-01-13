<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portaille appogee</title>
</head>
<body background="red">
    
    <a style=" background-color:rgb(0, 255, 208)" class="btn text-white w-50" href="{{ route('admin.login')}}" type="button">Admin-connect</a>
    <a style=" background-color:rgb(0, 255, 208)" class="btn text-white w-50" href="{{ route('prof.login')}}" type="button">Prof-connect</a>
    <a style=" background-color:rgb(0, 255, 208)" class="btn text-white w-50" href="{{ route('user.login')}}" type="button">Etu-connect</a>
</body>
</html>