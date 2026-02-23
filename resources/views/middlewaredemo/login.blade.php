<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="mx-auto text-center">
    <h1>LOGIN</h1>
    <div>
        <form action="{{ route('login_page') }}" method="POST">
            @csrf <!-- Include CSRF token for security -->
            <label for="user">Username</label>
            <input type="text" name="username" id="user" required autofocus><br/>
            
            <label for="pass">Password</label>
            <input type="password" name="password" id="pass" required><br/>
            
            <br>
            <button type="submit" class="w-40 border bg-blue-500 text-white hover:bg-blue-800 px-5 py-2">LOGIN</button>
        </form>
    </div>
    
    @if($errors->any())
        <div>
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif
    <x-footer/>
</body>
</html>
