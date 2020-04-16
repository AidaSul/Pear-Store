<?php
if(session_id() == ''){
    //session has not started
    session_start();
}
$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : "";
$product_id = $_GET['product_id'];
if ($customer_id == "")
{
    $_SESSION['purchasePending'] = $product_id;
    header("Location: login.php");
}
include("../common/docHead.html");
?>
  <body class="Body w3-auto" style="max-width: 750px">
    <header>
      <?php
      include("../common/banner.php");
      include("../common/menu.php");
      include("../scripts/dbconnection.php");
      ?>
    </header>
    <main>
      <div class="w3-container w3-light-blue w3-border-right w3-border-left">
      <article class="ShoppingCart">
        <h4 class="ShoppingCart">Shopping Cart</h4>
        <?php
        include("../scripts/shoppingCartProcess.php");
        ?>
      </article>
      </div>
    </main>
    <footer>
      <?php
      include("../common/footer.html");
      ?>
    </footer>
  </body>
</html>
