<?php
include('confs/auth.php');
?>


<!DOCTYPE>
<html lang="en">
<head>
    <title>Document</title>
        <link rel="stylesheet" href="css/style.css">


</head>


<body>

<h1>New Category</h1>

<ul class="menu">
    <li><a href="book-list.php">Manage Books</a></li>
    <li><a href="cat-list.php">Manage Categories</a></li>
    <li><a href="orders.php">Manage Orders</a></li>
    <li><a href="logout.php">Logout</a></li>


</ul>
<form action="cat-add.php" method="post">

    <label for="name">Category Name</label>
    <input type="text" id="name" name="name">

    <label for="remark">Remark</label>
    <textarea  id="remark" name="remark"></textarea>

    <br><br>
    <input type="submit" value="Add Category">
</form>

</body>
</html>