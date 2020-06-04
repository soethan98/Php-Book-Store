<?php
include('confs/config.php');
$id = $_GET['id'];
$query = "DELETE FROM categories WHERE id = $id";

//mysqli_query($conn,$query);
//header("location: cat-list.php");



if (mysqli_query($conn, $query)) {
    header("location: cat-list.php");
} else {
    echo 'ERROR ' . mysqli_error($conn);
}

?>