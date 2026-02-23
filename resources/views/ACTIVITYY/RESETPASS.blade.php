<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-color: #f4f4f9;
    }

    .form-container {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      background: #ffffff;
      border-radius: 8px;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h2 {
      font-size: 24px;
      color: #333;
      margin-bottom: 10px;
    }

    p {
      font-size: 14px;
      color: #666;
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-size: 14px;
      color: #333;
      text-align: left;
      margin-bottom: 5px;
    }

    input[type="email"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
    }

    button {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    .back-link {
      margin-top: 15px;
      font-size: 14px;
    }

    .back-link a {
      color: #007bff;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .back-link a:hover {
      color: #0056b3;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Forgot Password</h2>
  <p>Please enter your email address to reset your password.</p>

  <form action="/reset-password" method="POST">
    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Reset Password</button>
  </form>
  
  <p class="back-link"><a href="/LOGIN">Back to Login</a></p>
</div>

</body>
</html>
