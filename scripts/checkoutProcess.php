<!-- checkoutProcess.php -->
<?php
displayReceipt($db, $customerID);
$query =
  "SELECT
    my_order.order_id,
    my_order.customer_id,
    my_order.order_status_code,
    my_order_itms.*
  FROM
    my_order_itms, my_order
  WHERE
    my_order.order_id = my_order_itms.order_id and
    my_order.order_status_code = 'IP'          and
    my_order.customer_id = $customerID";
$orderInProgress = mysqli_query($db, $query);
$orderInProgressArray = mysqli_fetch_array($orderInProgress);
$orderID = $orderInProgressArray[0];

markOrderPaid($db, $customerID, $orderID);
markOrderItemsPaid($db, $orderID);
mysqli_close($db);

function displayReceipt($db, $customerID){
  $query = 
    "SELECT
      my_order.order_id,
      my_order.customer_id,
      my_order.order_status_code,
      my_order_itms.*
    FROM
      my_order_itms, my_order
    WHERE
      my_order.order_id = my_order_itms.order_id and
      my_order.order_status_code = 'IP' and
      my_order.customer_id = '$customerID'";
  $items = mysqli_query($db, $query) or 
      trigger_error("Query Failed! SQL: $query - Error: "
      .mysqli_error($db), E_USER_ERROR);
  $numRecords = mysqli_num_rows($items);
  if($numRecords == 0){
    echo
    "<h4>Shopping Cart</h4>
    <p>Your shopping cart is empty.</p>
    <p>To continue shopping, please
    <a href='pages/productCatalog.php'>click
    here</a>.</p>";
  }else{
    displayReceiptHeader();
    $grandTotal = 0;
    for($i=1; $i<=$numRecords; $i++){
      $row = mysqli_fetch_array($items, MYSQLI_ASSOC);
      $grandTotal += displayItemAndReturnTotalPrice($db, $row);
    }
    displayReceiptFooter($grandTotal);
  }
}

function getExistingOrder($db, $customerID){
  $query = 
    "SELECT
      my_order.order_id,
      my_order.customer_id,
      my_order.order_status_code,
      my_order_itms.*
    FROM
      my_order_itms, my_order
    WHERE
      my_order.order_id = my_order_itms.order_id and
      my_order.order_status_code = 'IP' and
      my_order.customer_id = '$customerID'";
  $items = mysqli_query($db, $query);
  return $items;
}

function displayReceiptHeader(){
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
}

function displayItemAndReturnTotalPrice($db, $row){
  $productID = $row['product_id'];
  $query = "SELECT * FROM my_products WHERE product_id ='$productID'";
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

function displayReceiptFooter($grandTotal){
  $grandTotalAsString = sprintf("$%1.2f", $grandTotal);
  echo
  "<tr>
    <td colspan='4'>
      Grand Total
    </td><td class='RightAligned'>
      <strong>$grandTotalAsString</strong>
    </td>
  </tr><tr>
    <td colspan='5'>
      <p class='Notification'>Your order has been processed.
      <br>Thank you very much for shopping with Pear Inc.
      <br>We appreciate your purchase of the above product(s).
      <br>You may print a copy of this page for your permanent record.
      <br>To return to our e-store options page please
        <a href='pages/eStoreInfo.php' class='NoDecoration'>click here</a>.
      <br>Or, you may choose one of the navigation links from our
      menu options.</p>
    </td>
  </tr>
  </table><br>";
}

function markOrderPaid($db, $customerID, $orderID){
  $query =
    "UPDATE my_order
    SET order_status_code = 'PD'
    WHERE customer_id = '$customerID' and order_id ='$orderID'";
  $success = mysqli_query($db, $query);
}

function markOrderItemsPaid($db, $orderID){
  $query =
    "SELECT *
    FROM my_order_itms
    WHERE order_id = '$orderID'";
  $orderItems = mysqli_query($db, $query);
  $numRecords = mysqli_num_rows($orderItems);
  for($i=1; $i<=$numRecords; $i++){
    $row = mysqli_fetch_array($orderItems, MYSQLI_ASSOC);
    $query =
      "UPDATE my_order_itms
      SET order_item_status_code = 'PD'
      WHERE order_item_id = $row[order_item_id] and order_id = $row[order_id]";
    mysqli_query($db, $query);
    reduceInventory($db, $row['product_id'],$row['order_item_quantity']);
  }
}

function reduceInventory($db, $productID, $quantityPurchased){
  $query = "SELECT * FROM my_products WHERE product_id = '$productID'";
  $product = mysqli_query($db, $query);
  $row = mysqli_fetch_array($product, MYSQLI_ASSOC);
  $row['product_inventory'] -= $quantityPurchased;
  $query =
    "UPDATE my_products
    SET product_inventory = $row[product_inventory]
    WHERE product_id = $row[product_id]";
  mysqli_query($db, $query);
}
?>