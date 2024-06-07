<?php
session_start();

include 'Database.php';
include 'User.php';

if(isset($_POST['submit'])&&($_SERVER['REQUEST_METHOD']=='POST')){
    //CREATE DATABASE CONNECTION
    $database =new Database();
    $db = $database->getConnection();

    $matric=$db->real_escape_string($_POST['matric']);
    $password=$db->real_escape_string($_POST['password']);

    //validate inputs
    if(!empty($matric)&& !empty($password)){
        $user= new User($db);
        $userDetails=$user->getUser($matric);

        //check if user exists and verify p/w
        if($userDetails && password_verify($password, $userDetails['password'])){
            $_SESSION['loggedin']= true;
            $_SESSION['matric'] = $userDetails['matric'];

            //redirect to originally intended page
            $redirect_url = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : 'read.php';
            unset($_SESSION['redirect_url']);
            header('Location: ' . $redirect_url);
            exit();
        } else{
            echo 'Login failed. Invalid username or password. Try <a href="login.php">login</a> again.';
        }
    }else{
        echo 'Please fill in all the fields required.';
    }
}
?>