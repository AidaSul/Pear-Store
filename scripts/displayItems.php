<!-- displayItems.php -->
<?php
$catCode = $_GET['categoryCode'];
$sql = "SELECT * FROM my_products
  WHERE product_category_code = '$catCode'
  ORDER BY product_name ASC";
$cat = mysqli_query($db, $sql);
$num_rows = mysqli_num_rows($cat);
echo
"<table style=\"border: 1px solid black; width: 100%;\">
  <tr style=\"border: 1px solid black;\">
    <th style=\"border: 1px solid black;\">Image</th>
    <th style=\"border: 1px solid black;\">Name</th>
    <th style=\"border: 1px solid black;\">Price</th>
    <th style=\"border: 1px solid black;\"># in Stock</th>
    <th style=\"border: 1px solid black;\">Purchase?</th>
  </tr>";
if($cat->num_rows > 0){
  while ($row = $cat->fetch_assoc()) {
    $product_id = $row['product_id'];
    $imageURL = $row['product_image_url'];
    $name = $row['product_name'];
    $price = $row['product_price'];
    $inventory = $row['product_inventory'];
    $id = $row['product_id'];
  echo
    "<tr style=\"border: 1px solid black;\">
      <td style=\"border: 1px solid black;\">
        <img height='70' width='70'
          src='$imageURL'
          alt='Product Image'>
        </td>
        <td style=\"border: 1px solid black;\">
          $name
        </td>
        <td style=\"border: 1px solid black;\">
          $price
        </td>
        <td style=\"border: 1px solid black; text-align: center;\">
          $inventory
        </td>
        <td style=\"border: 1px solid black;\">
        <p> <a class='w3-button w3-blue w3-round' href='pages/shoppingCart.php?product_id=$product_id'>
             Buy this item</a></p>
        <p><a class='w3-button w3-blue w3-round' href='pages/productCatalog.php'>
                          Return to product categories</a></p>
      </td>
    </tr>";
  }
}
echo
  "</table>
  <br>";
mysqli_close($db);
?>