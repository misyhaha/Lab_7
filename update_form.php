<?php
include 'Database.php';
include 'User.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $matric=$_GET['matric'];

    $database=new Database();
    $db=$database->getConnection();

    $user=new User();
    $userDetails=$user->getUser($matric);

    $db->close();

    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Update user details</title>
</head>
<body>
    <form action="update.php" method="post">
        <input type="hidden" name="matric" value="<?php echo $user['matric']; ?>">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>">
        <br>
        <label for="role">Role:</label>
            <select name="role" id = "role" required>
            <option value="">Select option</option>
            <option value="lecturer" <?php if($userDetails['role']=='lecturer') echo "selected" ?>>Lecturer</option>
            <option value="student" <?php if($userDetails['role']=='student') echo "selected" ?>>Student</option>
</select><br>
<input type="submit" value="Update">
</form>
</body>
</html>
<?php
}
?>