<?php
//process_checkout.php
//display the receipt
$query = 
  "SELECT 
    my_order.order_id,
    my_order.customer_id,
    my_order.order_status_code,
    my_order_itms.*
  FROM
    my_order, my_order_itms
  WHERE
    my_order.order_id = my_order_itms.order_id and
    my_order.order_status_code = 'IP' and
    my_order.customer_id = '$customerID'";
$orderInProgress = mysqli_query($db, $query);
$numRecords = mysqli_num_rows($orderInProgress);
if ($numRecords == 0) {
  echo
  "<h4 class='ShoppingCartHeader'>Shopping Cart</h4>
  <p class='Notification'>Your shopping cart is empty.</p>
  <p class='Notification'>To continue shopping, please
  <a class='NoDecoration' href='pages/productCatalog.php'>click
  here</a>.</p>";
  exit(0);
}else{
  //Receipt header
  $date = date("F j, Y");
  $time = date('g:ia');
  echo
  "<p class='ReceiptTitle'>***** R E C E I P T *****</p>
  <p class='Notification'>
    Payment received from
    $_SESSION[salutation]
    $_SESSION[firstname]
    $_SESSION[middle_initial]
    $_SESSION[lastname] on $date at $time.
  </p>";
  echo
  "<table class='Receipt'>
    <tr>
      <th>Product Image</th>
      <th>Product Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
    </tr>";
  //get total
  $grandTotal = 0;
  for($i=1; $i<=$numRecords; $i++){
    $row = mysqli_fetch_array($orderInProgress, MYSQLI_ASSOC);
    $grandTotal += totalPrice($db, $row);
  }
  //receipt footer
  $grandTotalAsString = sprintf("$%1.2f", $grandTotal);
  echo
  "<tr>
    <td class='Notification' colspan='4'>
      Grand Total
    </td><td class='RightAligned'>
      <strong>$grandTotalAsString</strong>
    </td>
  </tr><tr>
    <td colspan='5'>
      <p class='Notification'>Your order has been processed.
      <br>Thank you very much for shopping with Nature's Source.
      <br>We appreciate your purchase of the above product(s).
      <br>You may print a copy of this page for your permanent record.
      <br>To return to our e-store options page please
        <a href='pages/estore.php' class='NoDecoration'>click here</a>.
      <br>Or, you may choose one of the navigation links from our
      menu options.</p>
          
      <p class='LeftAligned'>Note to readers of the text:<br>
      We have only marked, in our database, the order and corresponding
      order items as paid, and reduced the database inventory in our
      Products table accordingly. The revised inventory levels should
      appear in any subsequent display of an affected product. Actual
      handling of payments and shipment is beyond the scope of our text.
      Besides, if truth be told, we have nothing to sell!</p>
    </td>
  </tr>
  </table>";
}

//get order id
$orderInProgressArray = mysqli_fetch_array($orderInProgress);
$orderID = $orderInProgressArray[0];

//mark order and items as paid
paidOrder($db,$customerID,$orderID);
paidOrderItms($db,$orderID);
mysqli_close($db);

function totalPrice($db, $row)
{
  $productID = $row['product_id'];
  $query = "SELECT * FROM Products WHERE product_id ='$productID'";
  $product = mysqli_query($db, $query);
  $rowProd = mysqli_fetch_array($product, MYSQLI_ASSOC);
  $productPrice = $rowProd['product_price'];
  $productPriceAsString = sprintf("$%1.2f", $productPrice);
  $totalPrice = $row['order_item_quantity'] * $row['order_item_price'];
  $totalPriceAsString = sprintf("$%1.2f", $totalPrice);
  $imageLocation = $rowProd['product_image_url'];
  echo
  "<tr>
    <td class='Centered'>
      <img height='70' width='70'
          src='$imageLocation' alt='Product Image'>
    </td><td class='LeftAligned'>
      $rowProd[product_name]
    </td><td class='RightAligned'>
      $productPriceAsString
    </td><td class='Centered'>
      $row[order_item_quantity]
    </td><td class='RightAligned'>
      $totalPriceAsString
    </td>
  </tr>";
  return $totalPrice;
}

function paidOrder($db, $customerID, $orderID)
{
  $query =
    "UPDATE Orders
    SET order_status_code = 'PD'
    WHERE customer_id = '$customerID' and
      order_id ='$orderID'";
  $success = mysqli_query($db, $query);
}

function paidOrderItms($db, $orderID)
{
  $query =
    "SELECT *
    FROM Order_Items
    WHERE order_id = '$orderID'";
  $orderItems = mysqli_query($db, $query);
  $numRecords = mysqli_num_rows($orderItems);
  for($i=1; $i<=$numRecords; $i++){
    $row = mysqli_fetch_array($orderItems, MYSQLI_ASSOC);
    $query =
      "UPDATE Order_Items
      SET order_item_status_code = 'PD'
      WHERE order_item_id = $row[order_item_id] and
        order_id = $row[order_id]";
    mysqli_query($db, $query);
    updateInventory($db, $row['product_id'],$row['order_item_quantity']);
    }
}

function updateInventory($db, $productID, $quantityPurchased)
{
    $query = "SELECT * FROM Products WHERE product_id = '$productID'";
    $product = mysqli_query($db, $query);
    $row = mysqli_fetch_array($product, MYSQLI_ASSOC);
    $row['product_inventory'] -= $quantityPurchased;
    $query =
        "UPDATE Products
        SET product_inventory = $row[product_inventory]
        WHERE product_id = $row[product_id]";
    mysqli_query($db, $query);
}
?>