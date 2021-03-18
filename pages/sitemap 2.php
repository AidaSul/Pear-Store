<!-- sitemap.php -->
<?php include '../common/docHead.html';?>
<body class="Body w3-auto" style="max-width: 750px">
  <div class="w3-container w3-center">
    <div>
      <?php 
        include '../common/banner.php';
        include '../common/menu.php';
        ?>
    </div>
    <div class="w3-container w3-light-blue w3-border-right w3-border-left">
      <div class="w3-half w3-border-bottom w3-border-left w3-border-right
       w3-border-top w3-border-grey">
        <div class="w3-container w3-border-bottom w3-border-grey">
          <ul style="list-style-type: none" class="w3-center">
            <li><h3><a href="my_business.php">Home</a></h3></li>
          </ul>
        </div>
        <div class="w3-container">
          <ul style="list-style-type: none" class="w3-center">
            <li><h3>e-Store</h3></li>
            <li><a href="pages/eStoreInfo.php">e-Store Info</a></li>
            <li><a href="pages/productCatalog.php">Products</a></li>
            <?php
              if(!isset($_SESSION['customer_id'])){
                echo "<li><a href=\"pages/registration.php\">Register</a></li>"; 
                echo "<li><a href=\"pages/login.php\">Login</a><li>";}
              else{
                echo "<li><a style=\"color: grey\">Register</a></li>";
                echo "<li><a style=\"color: grey\">Login</a></li>";}
            ?>
            <li><a href="pages/shoppingCart.php?product_id=view">
              Shopping Cart</a></li>
            <li><a href="pages/checkout.php">Checkout</a></li>
            <li><a href="scripts/logoutScript.php">Logout</a></li>
          </ul>
        </div>
      </div>
      <div class="w3-half w3-border-bottom w3-border-left w3-border-right
        w3-border-top  w3-border-grey">
        <div class="w3-container w3-border-bottom w3-border-grey">
          <ul style="list-style-type: none" class="w3-center">
            <li><h3>Deals</h3></li>
            <li><a href="pages/studentDeals.php">Student Deals</a></li>
            <li><a href="pages/businessDeals.php">Business Deals</a></li>
            <li><a href="pages/sale.php">On Sale</a></li>
          </ul>
        </div>
        <div class="w3-container w3-border-bottom w3-border-grey">
          <ul style="list-style-type: none" class="w3-center">
            <li><h3>About Us</h3></li>
            <li><a href="pages/mission.php">Mission and Vision</a></li>
            <li><a href="pages/locations.php">Locations</a></li>
            <li><a href="pages/feedback.php">Tell Us What You Think</a></li>
          </ul>
        </div>
        <div class="w3-container">
          <ul style="list-style-type: none" class="w3-center">
            <li><h3><a href="pages/sitemap.php">Site Map</a></h3></li>
          </ul>
        </div>
      </div>
    </div>
    <div>
      <?php include '../common/footer.html';?>
    </div>
  </div>
</body>
</html>