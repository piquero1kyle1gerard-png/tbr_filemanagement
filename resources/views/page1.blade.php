<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.css'])
</head>
<body>
    <h1>WELCOME TO PAGE 1</h1>
    <a href="{{route('homepage')}}"><button class= "border border-red-500 bg-gray-500 hover:bg-blue-500 text-white rounded-md p-2">Back</a>
</body>
</html>
