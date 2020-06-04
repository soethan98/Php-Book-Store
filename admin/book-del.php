<?php
include("confs/config.php");

$id = $_GET['id'];
$query = "DELETE FROM books WHERE  id =$id";

if(mysqli_query($conn,$query)){
    header("location: book-list.php");
}else{
    echo 'ERROR '.mysqli_error($conn);
}
?>