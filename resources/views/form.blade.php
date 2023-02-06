<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>
<body>
<form action="/form" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="text" name="name">
    <button type="submit">Kirim</button>
</form>
</body>
</html>
