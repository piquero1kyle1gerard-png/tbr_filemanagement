<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        nav {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        nav a {
            margin: 5px 0;
            text-decoration: none;
            color: #007bff;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .logout-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff; /* Change button color */
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none; /* Remove underline */
        }

        .logout-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <h1>Successful Login! Welcome User</h1>

    @if (session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "Successfully Logged In!",
                text: "Welcome Admin",
                icon: "success"    
            });
        });
    </script>
    @endif



    <a href="{{ route('LOGIN') }}" class="logout-button"><i class="fas fa-sign-out-alt"></i> Logout</a>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>




    <!-- <div class="alert alert-success">
        {{ session('status') }}
    </div> -->