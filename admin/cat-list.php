<?php

include('confs/config.php');
include('confs/auth.php');


$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);
$categories = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);


?>


<!doctype html>
<html lang="en">
<head>
    <title>Category List</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<h1>Category List</h1>
<ul class="menu">
    <li><a href="book-list.php">Manage Books</a></li>
    <li><a href="cat-list.php">Manage Categories</a></li>
    <li><a href="orders.php">Manage Orders</a></li>
    <li><a href="logout.php">Logout</a></li>


</ul>
<ul class="list">
    <?php foreach ($categories as $category) :?>
    <li title="<?php echo $category['remark'];?>">
        [<a href="cat-del.php?id=<?php echo $category['id'];?>" >del</a>]
        [<a href="cat-edit.php?id=<?php echo $category['id'];?>">edit</a> ]
        <?php echo $category['name']; ?>
    </li>

    <?php endforeach; ?>
</ul>

<a href="cat-new.php">New Category</a>
</body>
</html>