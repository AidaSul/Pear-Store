<?php
session_start();
include("dbconnection.php");

$orderItemID = $_GET['orderItemID'];
$orderID = $_GET['orderID'];
$query =
  "DELETE FROM my_order_itms
  WHERE order_item_id='$orderItemID'";
$success = mysqli_query($db, $query);
$query =
  "SELECT COUNT(*) AS numItemsStillInOrder
  FROM my_order_itms
  WHERE order_id='$orderID'";
$return_value = mysqli_query($db, $query);
$row = mysqli_fetch_array($return_value, MYSQLI_ASSOC);
if ($row[numItemsStillInOrder] == 0)
{
  $query = 
    "DELETE FROM Orders
    WHERE order_id='$orderID'";
  $success = mysqli_query($db, $query);
}
header("Location: ../pages/shoppingCart.php?product_id=view");
?>