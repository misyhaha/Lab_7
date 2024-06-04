<!DOCTYPE html>
<html>
    <head>
    <style>
            body{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                font-size: 20px;
            }
            .wrapper{
                width: 300px; 
                background: lightblue;
                text-align: center;
                border-radius: 10px;
                padding: 30px 40px;
            }
        </style>
        <title>Dokumen</title>
</head>
<body>
    <h2>Register</h2>
<div class="wrapper">
    <form action="insert.php" method="post">
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required><br><br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="matric" required><br><br>
        <label for="password">Password:</label>
        <input type="text" name="password" id="password" required><br><br>
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="">Please select</option>
            <option value="lecturer">Lecturer</option>
            <option value="student">Student</option>
        </select><br><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
</body>
</html>