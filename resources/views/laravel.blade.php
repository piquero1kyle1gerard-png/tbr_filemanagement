<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    @vite(['resources/css/app.css','resources/js/app.css'])
</head>
<body class="bg-blue-500">
    <div class="bg-orange-500 mx-auto w-full text-center">
    <h1 class="Text-center mb-11">THIS IS MY FIRST ROUTE!</h1>
    <a href="{{route('jander')}}">
        <button class= "border border-red-500 bg-gray-500 hover:bg-blue-500 text-white rounded-md p-2">
            Go to page 1
        </button>
        </a>
    </div>
</body>
</html>