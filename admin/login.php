<?php

if(isset($_POST['submit'])){
    session_start();


    $name = htmlentities($_POST['name']);
    $password =htmlentities($_POST['password']);

//    echo $name . $password;

    if($name == "admin" and $password == "1234"){
        $_SESSION['auth'] = true;
        header("location: book-list.php");

    }else{
        header("location: index.php");
    }
}
?>