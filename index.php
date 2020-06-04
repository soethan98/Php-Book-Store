<?php
session_start();
include('admin/confs/config.php');

$cart = 0;
if (isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $qty){
        $cart+=$qty;
    }
}

if(isset($_GET['cat'])){
    $cat_id = $_GET['cat'];
    $query = "SELECT * FROM books WHERE category_id=$cat_id";
    $result = mysqli_query($conn,$query);
    $books = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
    $query = "SELECT * FROM books";
    $result = mysqli_query($conn,$query);
    $books = mysqli_fetch_all($result,MYSQLI_ASSOC);
}

$categoryQuery = "SELECT * FROM categories";
$categories = mysqli_fetch_all(mysqli_query($conn,$categoryQuery),MYSQLI_ASSOC);
?>


<!doctype html>
<html lang="en">
<head>
    <title>Book Store</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Book Store</h1>

<div class="info">
    <a href="view-cart.php">(<?php echo $cart?>) books in your cart</a>

</div>

<div class="sidebar">
    <ul class="cats">
        <li><b><a href="index.php">All Categories</a></b></li>

        <?php foreach ($categories as $category): ?>
        <li>
            <a href="index.php?cat=<?php echo $category['id']?>">
                <?php echo $category['name']?>
            </a>
        </li>

        <?php endforeach; ?>
    </ul>
</div>

<div class="main">
    <ul class="books">
        <?php foreach ($books as $book): ?>
        <li>
            <img src="admin/covers/<?php echo $book['cover']?>" height="150" width="150">
            <b>
                <a href="book-detail.php?id=<?php echo $book['id']?>">
                    <?php echo $book['title']?>
                </a>
            </b>

            <i><?php echo $book['price']?></i>

            <a href="add-to-cart.php?id=<?php echo $book['id']?>" class="add-to-cart">
                Add to Cart

            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php include("footer.php")?>