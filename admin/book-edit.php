<?php
include("confs/config.php");
$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id=" . $id;

//Get result
$result = mysqli_query($conn, $query);

//Fetch Data
$book = mysqli_fetch_assoc($result);

//free result
//mysqli_free_result($result);

?>

<!doctype html>
<html lang="en">
<head>

    <title>Edit Book</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<h1>Edit Book</h1>

<ul class="menu">
    <li><a href="book-list.php">Manage Books</a></li>
    <li><a href="cat-list.php">Manage Categories</a></li>
    <li><a href="orders.php">Manage Orders</a></li>
    <li><a href="logout.php">Logout</a></li>


</ul>
<form action="book-update.php" method="post" enctype="multipart/form-data">

    <input type="hidden" value="<?php echo $book['id'] ?>" name="id">

    <label for="title">Book Title</label>
    <input type="text" value="<?php echo $book['title'] ?>" name="title" id="title">


    <label for="author">Author</label>
    <input type="text" name="author" id="author" value="<?php echo $book['author'] ?>">

    <label for="sum">Summary</label>
    <textarea id="sum" name="sum"><?php echo $book['summary'] ?></textarea>


    <label for="price">Price</label>
    <input type="text" id="price" name="price" value="<?php echo $book['price'] ?>">

    <label for="categories">Category</label>
    <select id="categories" name="category_id">
        <option value="0">--Choose--</option>
        <?php
        $categories = mysqli_query($conn, "SELECT id,name FROM categories");
        while ($cat = mysqli_fetch_assoc($categories)):
            ?>

            <option value="<?php echo $cat['id'] ?>" <?php if ($cat['id'] == $book['category_id']) echo "Selected" ?>>
                <?php echo $cat['name'] ?>
            </option>

        <?php endwhile; ?>
    </select>

    <br><br>

    <img src="covers/<?php echo $book['cover'] ?>" alt="" height="150">

    <label for="cover">Change cover</label>
    <input type="file" name="cover" id="cover">
    <br><br>
    <input type="submit" value="Update Book">
    <a href="book-list.php">Back</a>

</form>


</body>
</html>