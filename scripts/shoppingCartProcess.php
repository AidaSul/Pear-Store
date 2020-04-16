<?php
$retrying = isset($_GET['retrying']) ? true : false;
$items =
    "SELECT
      my_order.order_id,
      my_order.customer_id,
      my_order.order_status_code,
      my_order_itms.*
    FROM
      my_order_itms, my_order
    WHERE
      my_order.order_id = my_order_itms.order_id and
      my_order.order_status_code = 'IP'        and
      my_order.customer_id = $customer_id";
$items = mysqli_query($db, $items);
$numRecords = mysqli_num_rows($items);

if ($numRecords == 0 && $product_id == 'view')
{
  echo"<p class='Notification'>Your shopping cart is empty.</p>
  <p class='Notification'>To continue shopping, please
  <a class='NoDecoration' href='pages/productCatalog.php'>click here</a>.</p>";
}
else
{
  displayHeader();
  $grandTotal = 0;
  if ($numRecords == 0) //Shopping cart is empty
  {
    createOrder($db, $customer_id);
  }
  else //Shopping cart contains one or more items to display
  {
    for ($i=1; $i<=$numRecords; $i++)
    {
      $grandTotal += displayExistingItemColumns($db, $items);
    }
  }
  if ($product_id != 'view') //Display entry row for new item
  {
    if ($retrying)
    {
      echo"<tr style=\"border: 1px solid black;\">
      <td class='Notification' colspan='7' style=\"border: 1px solid black;\">
      Please re-enter a product quantity not exceeding the inventory level.
      </td></tr>";
    } 
    displayNewItemColumns($db, $product_id);
  }
  displayFooter($grandTotal);
}
mysqli_close($db);


function getExistingOrder($db, $customer_id)
{
  $query =
    "SELECT
      my_order.order_id,
      my_order.customer_id,
      my_order.order_status_code,
      my_order_itms.*
    FROM
      my_order_itms, my_order
    WHERE
      my_order.order_id = my_order_itms.order_item_id and
      my_order.order_status_code = 'IP'        and
      my_order.customer_id = $customer_id";
  $items = mysqli_query($db, $query);
  return $items;
}


function createOrder($db, $customer_id)
{
  $query = "INSERT INTO my_order
  (
    customer_id,
    order_status_code,
    date_order_placed,
    order_details
  )
  VALUES
  (
    '$customer_id',
    'IP',
    CURDATE(),
    NULL
  )";
  $success = mysqli_query($db, $query);
}


function displayHeader()
{
  echo "<form id='orderForm'
  onsubmit='return shoppingCartAddItemFormValidate();'
  action='scripts/shoppingCartAddItem.php'>
  <table style=\"border: 1px solid black; width: 100%;\">
  <tr style=\"border: 1px solid black;\">
  <th style=\"border: 1px solid black;\">Product Image</th>
  <th style=\"border: 1px solid black;\">Product Name</th>
  <th style=\"border: 1px solid black;\">Price</th>
  <th style=\"border: 1px solid black;\"># in Stock</th>
  <th style=\"border: 1px solid black;\">Quantity</th>
  <th style=\"border: 1px solid black;\">Total</th>
  <th style=\"border: 1px solid black;\">Action</th>
  </tr>";
}


function displayFirstFourColumns($db, $product_id)
{
  $query =
    "SELECT *
    FROM my_products
    WHERE product_id='$product_id'";
  $product = mysqli_query($db, $query);
  $row = mysqli_fetch_array($product, MYSQLI_ASSOC);
  $productPrice = sprintf("$%1.2f", $row['product_price']);
  echo"<tr style=\"border: 1px solid black;\">
  <td style=\"border: 1px solid black;\">
  <img height='70' width='70'
    src='$row[product_image_url]' alt='Product Image'>
  </td><td style='text-align: left; border: 1px solid black;'>
    $row[product_name]
  </td><td style='text-align: right; border: 1px solid black;'>
    $productPrice
  </td><td style=\"border: 1px solid black;\">
    $row[product_inventory]
  </td>";
}


function displayExistingItemColumns($db, $items)
{
  $row = mysqli_fetch_array($items, MYSQLI_ASSOC);
  $product_id = $row['product_id'];
  displayFirstFourColumns($db, $product_id);
    
  $total = $row['order_item_quantity'] * $row['order_item_price'];
  $totalAsString = sprintf("$%1.2f", $total);
  echo"<td style=\"border: 1px solid black;\">
    $row[order_item_quantity]
  </td><td style='text-align: right; border: 1px solid black;'>
    $totalAsString
  </td><td style=\"border: 1px solid black;\">
  <p><a class='w3-button w3-blue w3-round'
    href='scripts/shoppingCartDeleteItem.php?orderItemID=
    $row[order_item_id]&orderID=$row[order_id]'>
    Delete</a></p>
  <p><a class='w3-button w3-blue w3-round' href='pages/productCatalog.php'>
    Continue shopping</a></p>
  </td></tr>";
  return $total;
}


function displayNewItemColumns($db, $product_id)
{
  displayFirstFourColumns($db, $product_id);
  echo"<td style=\"border: 1px solid black;\">
  <input type='hidden' id='product_id' name='product_id' value=$product_id>
  <input type='text' id='quantity' name='quantity' size='3'>
  </td><td style='text-align: right; border: 1px solid black;'>
    TBA
  </td><td style=\"border: 1px solid black;\">
  <p class='Centered' style='font-size:100%'>
    <input class='w3-button w3-blue w3-round' type='submit' value='Add to cart'></p>
  <p><a class='w3-button w3-blue w3-round' href='pages/productCatalog.php'>
    Continue shopping</a></p>
  </td></tr>";
}

function displayFooter($grandTotal)
{
  $grandTotalAsString = sprintf("$%1.2f", $grandTotal);
  echo"<tr style=\"border: 1px solid black;\">
  <td class='Notification' colspan='5' style=\"border: 1px solid black;\">
    Grand Total
  </td><td class='RightAligned' style=\"border: 1px solid black;\">
    <strong>$grandTotalAsString</strong>
  </td><td style=\"border: 1px solid black;\">
    <p><a class='w3-button w3-blue w3-round' href='pages/checkout.php'>
    Proceed to checkout</a></p>
  </td></tr>
  </table>
  </form>";
}
?>
