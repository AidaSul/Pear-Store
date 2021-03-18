<!-- buisnessDeals.php -->
<?php include '../common/docHead.html';?>
<head>
</head>
<body class="Body w3-auto" style="max-width: 750px">
  <div class="w3-container w3-center">
    <!-- banner -->
    <div>
      <?php include '../common/banner.php';?>
    </div>
    <!--menu -->
    <div>
      <?php include '../common/menu.php';?>
    </div>
    <!-- buisnessDeal Page -->
    <div class = "w3-container w3-light-blue">
      <div class="w3-left-align">
        <article>
          <h3>Buisness Deals</h3>
          <p> Our store offers different deals for businesses. To build a 
            strong relationship between businesses and our company, if a 
            business choses to buy items in bulk we offer discounts of 30% on 
            items version 2015 and earlier and 20% discount on items version 
            2016 and later.
          <br>
          At the moment we do not offer any kind of deals for businesses who do
           not chose to buy items in bulk.
          </p>
          <ul>
            <li>Just want to see what we have to offer?
              <br>
              To browse our exciting products catalog
              <a 
               href="pages/productCatalog.php">
               click here.</a>
             </li>
             <li>Ready to purchase and already have a user name and password?
              <br>
              To log in to our e-store and begin shopping
              <a 
              href="pages/login.php">
              click here.</a>
              (if not logged in already).
             </li>
             <li>Need to register for out e-store so you can make 
              purchases?
              <br>
              To register (you only need to do it once)
              <a
               href="pages/registration.php">
             click here.</a>
             </li>
             <li>Trying to log in as a diffrent user?
              <br>
              You must first
              <a 
               href="scripts/logoutScript.php">
               click here.</a>
              to log out.
             </li>
          </ul> 
        </article>
      </div>
    </div>
    <!-- footer -->
    <div>
      <?php include '../common/footer.html';?>
    </div>
  </div>
</body>
</html>