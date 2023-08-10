<?php
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the provided credentials are valid
    if ($username === "admin" && $password === "admin") {
        $_SESSION["authenticated"] = true;
        header("Location: http://localhost/php/crud/index.php");

    } else {
        $loginError = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login to acess Employee CRUD application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: purple;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 600px;
        }
        .login-error {
            color: red;
            margin-top: 10px;
        }

        .btn {
         padding: 15px 30px;
         font-size: 18px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         background-color: #007bff;
         color: #ffffff;
         transition: background-color 0.3s ease;
         text-decoration: none;
         text-align: center;
      }

      .btn:hover {
         background-color: #0056b3;
      }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login to acess Employee CRUD application</h2>
        <?php if (isset($loginError)) { ?>
            <p class="login-error"><?php echo $loginError; ?></p>
        <?php } ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
           <br>
 <input type="submit" value="Login" class="btn">
        </form>
    </div>
</body>
</html>
