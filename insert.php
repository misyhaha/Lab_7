<? php
include 'Database.php';
include "User.php";

//create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

//create an instance of the User class
$user = new User($db);

//register the user using POST data
$user->createUser($_POST['matric'], $_POST['name'],$_POST['password'], $_POST['role']);

//close the connection
$db->close();