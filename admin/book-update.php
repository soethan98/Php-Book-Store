<?php
include("confs/config.php");
$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$summary = $_POST['sum'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];

$cover = $_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];

if ($cover) {
    move_uploaded_file($tmp, "covers/$cover");

    $query = "UPDATE books SET title='$title',author='$author',summary = '$summary',
price = '$price',category_id = '$category_id',
cover='$cover',modified_date = now() WHERE id='$id'";
} else {
    $query = "UPDATE books SET title='$title',author='$author',summary = '$summary',
price = '$price',category_id = '$category_id',modified_date = now() WHERE id='$id'";
}

if (mysqli_query($conn, $query)) {
    header("location: book-list.php");
} else {
    echo 'ERROR ' . mysqli_error($conn);
}
?>