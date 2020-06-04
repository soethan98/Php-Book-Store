<?php
include("admin/confs/config.php");
$id = $_GET['id'];
$book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM books WHERE id=$id"));

?>

<!doctype html>
<html lang="en">
<head>
    <title>Book Detail</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="detail">
    <a href="index.php" class="back">&laquo; Go Back</a>

    <img src="admin/covers/<?php echo $book['cover'] ?>" alt="">

    <h2><?php echo $book['title'] ?></h2>
    <i>by <?php echo $book['author'] ?></i>,
    <b><?php echo $book['price'] ?></b>

    <p><?php echo $book['summary'] ?></p>

    <a href="add-to-cart.php?id=<?php echo $id ?>" class="add-to-cart">Add to Cart</a>
</div>

<?php include("footer.php")?>