<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* General styling */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: url('https://scontent.fmnl17-1.fna.fbcdn.net/v/t1.6435-9/66496274_1253373478169702_2264055064777719808_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=2nL7qNET95IQ7kNvgEtmxu_&_nc_zt=23&_nc_ht=scontent.fmnl17-1.fna&_nc_gid=A5YlDXFlxbj3jAQQd0yoVEx&oh=00_AYDCnfoMxZqhdzC5qjAN3zVS2o2fjNU7k9B7yEjfQnhROQ&oe=6780F895') no-repeat center center/cover;
            font-family: 'Roboto', Arial, sans-serif;
            color: #333;
        }



        .red-text {
            color: red;
            /* Make the "e" red */
        }


        .login-container {
            background: #ffffff;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
            color: rgb(31, 31, 154);
            margin-bottom: 24px;

        }

        p.subtitle {
            font-size: 14px;
            color: #555;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-size: 14px;
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #f9fafb;
            color: #333;
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 8px rgba(99, 102, 241, 0.4);
            outline: none;
        }

        .btn {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
            border: none;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: linear-gradient(135deg, #4f46e5, #3730a3);
        }

        .link {
            margin-top: 15px;
            display: inline-block;
            font-size: 14px;
            color: #4f46e5;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .link:hover {
            color: #3730a3;
            text-decoration: underline;
        }

        .extra-options {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #555;
        }

        .extra-options label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .show-password {
            margin-top: -10px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #555;
            display: flex;
            align-items: center;
        }

        .show-password input {
            margin-right: 8px;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .login-container {
                padding: 30px;
                width: 90%;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>
            Cristal <span class="red-text">e</span>-Highschool
        </h1>


        <p class="subtitle">Please log in to your account to continue</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" required autofocus>
                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>



            <button type="submit" class="btn">Log In</button>

            <a href="{{ route('register-form') }}" class="link">Don't have an account? Sign Up</a>
        </form>
    </div>

    <script>
        // JavaScript to toggle the password visibility
        document.getElementById('togglePassword').addEventListener('change', function() {
            const passwordField = document.getElementById('password');
            passwordField.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>

</html>
