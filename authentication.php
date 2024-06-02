<? php
include 'Database.php';
include 'User.php';

if(isset($_POST['submit'])&&($_SERVER['REQUEST_METHOD']=='POST')){
    //CREATE DATABASE CONNECTION
    $database =new Database();
    $db = $database->getConnection();

    $matric=$db->real_escape_string($_POST['matric']);
    $password=$db->real_escape_string($_POST['password']);

    //valodate inputs
    if(!empty($matric)&& !empty($password)){
        $user= new USer($db);
        $userDetails=$user->getUser($matric);

        //check if user exists and verify p/w
        if($userDetails && password_verify($password, $userDetails['password'])){
            echo 'Login successful';
        } else{
            echo 'Login failed';
        }
    }else{
        echo 'Please fill in all the fields required.';
    }
}