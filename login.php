<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="wrapper">
        <form action="authentication.php" method="post">
        <h1>Login</h1>
            <label for="matric">Matric:</label>
            <input type ="text" name="matric" id="matric" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br><br>
            <input type="submit"  name="submit" value="Submit">
            <div class="register-link">
                <p>Don't have an account?<a href="registration.php">Register</a></p>
            </div>
        </form>
    </div>
    </body>
</html>