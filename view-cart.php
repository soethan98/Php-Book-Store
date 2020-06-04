<?php
session_start();
if (!isset($_SESSION['cart'])) {
    header("location: index.php");
    exit();
}

include("admin/confs/config.php");
?>

<!doctype html>
<html lang="en">
<head>
    <title>View Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>View Cart</h1>

<div class="sidebar">
    <ul class="cats">
        <li><a href="index.php">&laquo; Continue Shopping</a></li>
        <li><a href="clear-cart.php" class="del">&times; Clear Cart</a></li>
    </ul>
</div>


<div class="main">
    <table>
        <tr>
            <th>Book Title</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Price</th>

        </tr>

        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $qty):

            $result = mysqli_query($conn, "SELECT title,price FROM books WHERE id=$id");
            $row = mysqli_fetch_assoc($result);
            $total += $row['price'] * $qty; ?>
            <tr>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $qty ?></td>
                <td>$<?php echo $row['price'] ?></td>
                <td>$<?php echo $row['price'] * $qty ?></td>

            </tr>

        <? endforeach; ?>

        <tr>
            <td colspan="3" align="right"><b>Total:</b></td>
            <td>$<?php echo $total; ?></td>
        </tr>
    </table>

    <div class="order-form">
        <h2>Order Now</h2>
        <form action="submit-order.php" method="post">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name">

            <label for="email">Email</label>
            <input type="text" id="email" name="email">

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone">

            <label for="address">Address</label>
            <textarea id="address" name="address"></textarea>

            <br><br>
            <input type="submit" value="Submit Order">
            <a href="index.php">Continue Shopping</a>
        </form>
    </div>
</div>

<?php include("footer.php")?>