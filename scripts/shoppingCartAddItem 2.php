<!-- shoppingCartAddItem.php -->
<?php
session_start();
include("dbconnection.php");
$customer_id = $_SESSION['customer_id'];
$product_id = $_GET['product_id'];
$query =
  "SELECT
    my_order.order_id,
    my_order.order_status_code,
    my_order.customer_id
  FROM my_order
  WHERE
    my_order.order_status_code = 'IP' and
    my_order.customer_id = $customer_id";
$order = mysqli_query($db, $query);    
$row = mysqli_fetch_array($order, MYSQLI_ASSOC);
$orderID = $row['order_id'];
$query =
  "SELECT *
  FROM my_products
  WHERE product_id = '$product_id'";
$product = mysqli_query($db, $query);
$row = mysqli_fetch_array($product, MYSQLI_ASSOC);
$productInventory = $row['product_inventory'];
$quantityRequested = $_GET['quantity'];
if ($quantityRequested > $productInventory)
{
  header("Location: ../pages/shoppingCart.php?product_id=$product_id&retrying=true");
}
else
{
  $productPrice = $row['product_price'];
  $query = "INSERT INTO my_order_itms
  (
    order_item_status_code,
    order_id,
    product_id,
    order_item_quantity,
    order_item_price,
    other_order_item_details
  )
  VALUES
  (
    'IP',
    '$orderID',
    '$product_id',
    '$quantityRequested',
    '$productPrice',
    NULL
  )";
  $success = mysqli_query($db, $query);
  header("Location: ../pages/shoppingCart.php?product_id=view");
}
?>
