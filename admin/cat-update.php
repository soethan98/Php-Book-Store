<?php
include('confs/config.php');
$id = $_POST['id'];
$name = $_POST['name'];
$remark = $_POST['remark'];

$query = "UPDATE categories SET name='$name', remark='$remark',modified_dare=now() WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    header("location: cat-list.php");
} else {
    echo 'ERROR ' . mysqli_error($conn);
}
?>