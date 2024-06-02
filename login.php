<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form action="authentication.php" method="post">
            <label for="matric">Matric:</label>
            <input type ="text" name="matric" id="matric" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            <input type="submit"  name="submit" value="Submit">
        </form>
    </body>
</html>