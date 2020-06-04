<?php
include('confs/config.php');
include('confs/auth.php');
$query = "SELECT books.*,categories.name FROM books LEFT JOIN categories ON books.category_id = categories.id
ORDER BY books.created_date DESC";


$result = mysqli_query($conn, $query);

$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Book List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Book List</h1>

<ul class="menu">
    <li><a href="book-list.php">Manage Books</a></li>
    <li><a href="cat-list.php">Manage Categories</a></li>
    <li><a href="orders.php">Manage Orders</a></li>
    <li><a href="logout.php">Logout</a></li>


</ul>

<ul class="list">
    <?php foreach($books as $book): ?>
        <li>
            <img src="covers/<?php echo $book['cover']?>" alt="" align="right" height="140">

            <b><?php echo $book['title'] ?></b>
            <i>by <?php echo $book['author'] ?></i>
            <small>(in <?php echo $book['name']?>)</small>
            <span>$<?php echo $book['price']?></span>
            <div><?php echo $book['summary']?></div>

            [<a href="book-del.php?id=<?php echo $book['id']?>" class="del">del</a>]
            [<a href="book-edit.php?id=<?php echo $book['id']?>">edit</a> ]
        </li>
    <?php endforeach; ?>
</ul>
<a href="book-new.php" class="new">New Book</a>
</body>
</html>
