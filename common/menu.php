<!-- menu.html -->
<div class="w3-container w3-blue w3-border-bottom w3-border-right 
   w3-border-left w3-left-align">
  <a class="w3-button w3-blue" 
    href="my_business.php">Home</a>
  <div class="w3-dropdown-hover">
    <button class="w3-button w3-blue">e-Store</button>
    <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="pages/eStoreInfo.php"
        class="w3-bar-item w3-button">e-store Info</a>
      <a title="not yet active" 
        href="pages/productCatalog.php"
        class="w3-bar-item w3-button">Products</a>
      <?php
        if(!isset($_SESSION['customer_id'])){
        echo "<a class=\"w3-bar-item w3-button\"href=\"pages/registration.php\">
        Register</a>"; 
        echo "<a class=\"w3-bar-item w3-button\"href=\"pages/login.php\">
        Login</a>";
      }else{
        echo "<a class=\"w3-bar-item w3-button\" style=\"color: grey\">
        Register</a>";
        echo "<a class=\"w3-bar-item w3-button\" style=\"color: grey\">
        Login</a>";
      }
      ?>
      <a href="pages/shoppingCart.php?product_id=view"
        class="w3-bar-item w3-button">Shopping Cart</a>
      <a href="pages/checkout.php"
        class="w3-bar-item w3-button">Checkout</a>
      <a href="scripts/logoutScript.php"
        class="w3-bar-item w3-button">Logout</a>
    </div>
  </div>
  <div class="w3-dropdown-hover">
    <button class="w3-button w3-blue">Deals</button>
    <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="pages/studentDeals.php"
        class="w3-bar-item w3-button">Student Deals</a>
      <a href="pages/businessDeals.php"
        class="w3-bar-item w3-button">Business Deals</a>
      <a href="pages/sale.php"
        class="w3-bar-item w3-button">On Sale</a>
    </div>
  </div>
  <div class="w3-dropdown-hover">
    <button class="w3-button w3-blue">About Us</button>
    <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="pages/mission.php"
        class="w3-bar-item w3-button">Mission and Vision</a>
      <a href="pages/locations.php"
        class="w3-bar-item w3-button">Locations</a>
      <a href="pages/feedback.php"
        class="w3-bar-item w3-button">Tell Us What You Think</a>
    </div>
  </div>
  <a class="w3-button w3-blue" 
    href="pages/sitemap.php">Site Map</a>
</div>