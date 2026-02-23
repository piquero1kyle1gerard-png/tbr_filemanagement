<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>SIGNUP</title>
    <style>
        /* General Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        @media (max-width: 400px) {
            .container {
                padding: 10px;
                max-width: 90%;
            }
        }

        body {
            background: url('https://scontent.fmnl17-1.fna.fbcdn.net/v/t1.6435-9/66496274_1253373478169702_2264055064777719808_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=2nL7qNET95IQ7kNvgEtmxu_&_nc_zt=23&_nc_ht=scontent.fmnl17-1.fna&_nc_gid=A5YlDXFlxbj3jAQQd0yoVEx&oh=00_AYDCnfoMxZqhdzC5qjAN3zVS2o2fjNU7k9B7yEjfQnhROQ&oe=6780F895') no-repeat center center/cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #2c3e50;
        }

        .container {
            max-width: 350px;
            /* Reduced max-width */
            width: 100%;
            padding: 20px;
            /* Reduced padding */
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            transition: box-shadow 0.3s ease;
        }

        .container:hover {
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 1.3em;
            /* Decreased font size */
            margin-bottom: 15px;
            /* Reduced margin */
            color: #34495e;
            text-align: center;
            font-weight: 600;
            text-transform: uppercase;
            /* Added for emphasis */
        }

        label {
            display: block;
            font-size: 0.85em;
            /* Decreased font size */
            color: #34495e;
            margin-bottom: 6px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            /* Reduced padding */
            margin-bottom: 15px;
            /* Increased space for better separation */
            border: 1px solid #bdc3c7;
            border-radius: 6px;
            font-size: 0.9em;
            /* Decreased font size */
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .error-message {
            color: #d9534f;
            font-size: 0.8em;
            /* Decreased error message font size */
            margin-top: -5px;
            /* Adjusted to align better with inputs */
            margin-bottom: 10px;
        }

        .input-error {
            border-color: #d9534f;
        }

        button {
            width: 100%;
            padding: 10px;
            /* Reduced button padding */
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.9em;
            /* Decreased font size */
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
            margin-top: 15px;
            /* Added space above the button */
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        .back-button {
            background-color: transparent;
            color: #007bff;
            border: 1px solid #007bff;
            margin-top: 12px;
        }

        .back-button:hover {
            background-color: #007bff;
            color: white;
        }

        .show-password {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .show-password input[type="checkbox"] {
            margin-right: 10px;
        }

        /* Additional styling for visual hierarchy */
        fieldset {
            border: none;
            /* Remove default border for fieldset */
            margin-bottom: 15px;
            /* Space between fieldsets */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>CREATE AN ACCOUNT</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <label for="name">NAME</label>
            <input type="text" name="name" id="name" class="{{ $errors->has('name') ? 'input-error' : '' }}"
                required autofocus aria-describedby="nameError">
            <x-input-error :messages="$errors->get('name')" class="error-message" id="nameError" />

            <label for="email">USERNAME / EMAIL</label>
            <input type="email" name="email" id="email" class="{{ $errors->has('email') ? 'input-error' : '' }}"
                required aria-describedby="emailError">
            <x-input-error :messages="$errors->get('email')" class="error-message" id="emailError" />

            <fieldset>
                <div class="mb-2">
                    <label for="password">PASSWORD</label>
                    <input type="password" name="password" id="password"
                        class="{{ $errors->has('password') ? 'input-error' : '' }}" required
                        aria-describedby="passwordError">
                    <x-input-error :messages="$errors->get('password')" class="error-message" id="passwordError" />
                    <div class="mb-2">
                        <div class="show-password">
                            <input type="checkbox" id="showPassword1"
                                onclick="togglePasswordVisibility('password', this)">
                            <label for="showPassword1">SHOW PASSWORD</label>
                        </div>
                        <div class="mb-2">
                            <label for="role">Select Role Type</label><br>
                            <select name="role" id="role">
                                @if (!\App\Models\User::where('role', 'admin')->first())
                                    <option value="admin">Admin</option>
                                @endif
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>
                        <div class="mb-5">
                            <label for="password_confirmation">CONFIRM PASSWORD</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="{{ $errors->has('password_confirmation') ? 'input-error' : '' }}" required
                                aria-describedby="passwordConfirmationError">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" id="passwordConfirmationError" />
                        </div>

                        <div class="show-password">
                            <input type="checkbox" id="showPassword2"
                                onclick="togglePasswordVisibility('password_confirmation', this)">
                            <label for="showPassword2">SHOW PASSWORD</label>
                        </div>
            </fieldset>

            <button type="submit">SIGN UP</button>
        </form>
        <form action="{{ route('LOGIN') }}" method="GET">
            <button type="submit" class="back-button">BACK TO LOGIN</button>
        </form>
    </div>

    <script>
        function togglePasswordVisibility(passwordFieldId, checkbox) {
            const passwordField = document.getElementById(passwordFieldId);
            passwordField.type = checkbox.checked ? 'text' : 'password';
        }
    </script>
</body>

</html>
