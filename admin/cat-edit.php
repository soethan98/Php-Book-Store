<?php
include('confs/config.php');
$id = $_GET['id'];

$query = "SELECT * FROM categories WHERE id=$id";
$result = mysqli_query($conn, $query);
$category = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Category Edit</title>
    <link rel="stylesheet" href="css/style.css">

    <!--    <style>-->
<!--        form label {-->
<!--            display: block;-->
<!--            margin-top: 8px;-->
<!--        }-->
<!--    </style>-->
</head>
<body>

<h1>Edit Category</h1>

<ul class="menu">
    <li><a href="book-list.php">Manage Books</a></li>
    <li><a href="cat-list.php">Manage Categories</a></li>
    <li><a href="orders.php">Manage Orders</a></li>
    <li><a href="logout.php">Logout</a></li>


</ul>
<form method="post" action="cat-update.php">
    <input type="hidden" name="id" value="<?php echo $category['id'] ?>">

    <label for="name">Category Name</label>
    <input type="text" name="name" id="name" value="<?php echo $category['name'] ?>">

    <label for="remark">Remark</label>
    <textarea name="remark" id="remark">
        <?php echo $category['remark'] ?>
    </textarea>

    <br><br>

    <input type="submit" value="Update Category">


</form>

</body>
</html>
