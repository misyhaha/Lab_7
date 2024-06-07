<?php
include 'Database.php';
include 'User.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $matric=$_GET['matric'];

    $database = new Database();
    $db=$database->getConnection();

    $user=new User($db);
    $userDetails=$user->getUser($matric);

    $db->close();

    ?>
    <!DOCTYPE html>
    <html>
        <head>
        <style>
            *{
                font-size:20px;
            }
             body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .wrapper{
                width: 320px;
                height: 300px;
                background: lightsalmon;
                text-align: justify;
                border-radius: 10px;
                padding: 30px 40px;
            }
            .wrapper h1{
                text-align: center;
                font-size: 36px;
            }
            .form-group{
                text-align:center;
            }
        </style>
            <title>Update user details</title>
        </head>
<body>
    <div class="wrapper">
        <h1>Update Details</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="matric" value="<?php echo $userDetails['matric']; ?>"><br><br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $userDetails['name']; ?>">
        <br><br>
        <label for="role">Role:</label>
            <select name="role" id = "role" required>
            <option value="">Select option</option>
            <option value="lecturer" <?php if($userDetails['role']=='lecturer') echo "selected" ?>>Lecturer</option>
            <option value="student" <?php if($userDetails['role']=='student') echo "selected" ?>>Student</option>
    </select><br><br>
    <div class="form-group">
        <input type="submit" value="Update">
    </div>
    </form>
    </div>
</body>
</html>
<?php
}
?>