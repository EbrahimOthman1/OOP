<?php
include_once('conn.php');
include('login.html');
include('login.css');
if(isset($_POST['login'])){

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = [];
        if (strlen($email) <= 0) {
            array_push($errors, ['email'=>'The email field is required.']);
        } 
        if (strlen($password) <= 0) {
            array_push($errors, ['password'=>'The Password Field Is Required.']);
        }

        if (!count($errors)) {
            $query = "SELECT id FROM admin WHERE email='$email' AND password='$password';";
            $result = $conn->query($query);
            $id_list= $result->fetch_assoc();
            if (isset($id_list['id'])){
                header("location: crud.php");
            } else {
                echo "Wrong Email or Password";
            }
        }
    }
}
