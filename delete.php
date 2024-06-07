<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<?php
include 'Database.php';
include 'User.php';

if($_SERVER["REQUEST_METHOD"]=="GET"){
    //retrieve the matric value from the POST request
    $matric=$_GET ['matric'];

    //instantiate Database class and get the connection
    $database=new Database();
    $db=$database->getConnection();

    //instantiate User class
    $user = new User($db);
    $user->deleteUser($matric);

    $db->close();
}