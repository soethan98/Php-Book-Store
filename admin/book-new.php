<?php
include('confs/auth.php');
?>


<!doctype html>
<html lang="en">
<head>
    <title>New Book</title>
        <link rel="stylesheet" href="css/style.css">

</head>
<body>
<h1>New Book</h1>

<ul class="menu">
    <li><a href="book-list.php">Manage Books</a></li>
    <li><a href="cat-list.php">Manage Categories</a></li>
    <li><a href="orders.php">Manage Orders</a></li>
    <li><a href="logout.php">Logout</a></li>


</ul>

<form action="book-add.php" method="post" enctype="multipart/form-data">
    <label for="title">Book Title</label>
    <input type="text" id="title" name="title">

    <label for="author">Author</label>
    <input type="text" name="author" id="author">

    <label for="summary">Summary</label>
    <textarea name="summary" id="summary"></textarea>

    <label for="price">Price</label>
    <input type="text" name="price" id="price">

    <label for="categories">Category</label>
    <select name="category_id" id="categories">
        <option value="0">--Choose--</option>
        <?php
        include('confs/config.php');

        $query = "SELECT id,name FROM categories";
        $result = mysqli_query($conn,$query);
        $categories = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        foreach ($categories as $category) :?>
        <option value="<?php echo $category['id'] ?>">
            <?php echo $category['name']; ?>
        </option>

        <?php endforeach; ?>
    </select>

    <label for="cover">Cover</label>
    <input type="file" name="cover" id="cover">

    <br><br>

    <input type="submit" value="Add Book">
    <a href="book-list.php">Back</a>
</form>
</body>
</html>