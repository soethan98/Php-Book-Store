<?php
include("confs/config.php");
$title = $_POST['title'];
$author = $_POST['author'];
$summary = $_POST['summary'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$cover = $_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];

echo $category_id;

if ($cover) {
    move_uploaded_file($tmp, "covers/$cover");
}

$sql = "INSERT INTO books (
    title, author, summary, price, category_id,
    cover, created_date, modified_date
  ) VALUES (
    '$title', '$author', '$summary', '$price',
    '$category_id', '$cover', now(), now()
  )";


//$sql = "INSERT INTO books(title,author,summary,price,category_id,cover,created_at,modified_date)
//VALUES ($title,$author,$summary,$price,$category_id,$cover,now(),now())";


if (mysqli_query($conn, $sql)) {
    header("location: book-list.php");

} else {
    echo 'ERROR ' . mysqli_error($conn);
}
?>