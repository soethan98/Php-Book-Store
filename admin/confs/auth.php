<?php
/**
 * Created by PhpStorm.
 * User: soe_than
 * Date: 4/23/20
 * Time: 1:32 PM
 */

session_start();
if (!isset($_SESSION['auth'])){
    header("location : index.php");
    exit();
}

?>