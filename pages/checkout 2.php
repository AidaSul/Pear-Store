<!-- checkout.php-->
<?php
session_start();
if (!preg_match('/shoppingCart.php/', $_SERVER['HTTP_REFERER']))
    header("Location: shoppingCart.php?product_id=view");
$customerID = $_SESSION['customer_id'];
include '../common/docHead.html';
?>
<body class="Body w3-auto" style="max-width: 750px">
  <div class="w3-container">
    <?php
      echo "<div>";
      include '../common/banner.php';
      include '../common/menu.php';
      include '../scripts/dbconnection.php';
      echo "</div>";
      echo "<div class=\"w3-container w3-light-blue\" >";
      include '../scripts/checkoutProcess.php';
      echo "</div>";
      echo "<footer>";
      include '../common/footer.html';
      echo "</footer>";
    ?>
  </div>
</body>
</html>