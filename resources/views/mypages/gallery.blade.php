<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gallery Page</title>
</head>
<body>
    <h1>This is Gallery Page</h1>

    <ul>
        <li>
            <a href="{{route('home')}}">
                <Button>Home</Button>
            </a>
        </li>
        <li>
            <a href="{{route('gallery')}}">
                <Button>Gallery</Button>
            </a>
        </li>
        <li>
            <a href="{{route('contact')}}">
                <Button>Contact</Button>
            </a>
        </li>
    </ul>
</body>
</html>