<!-- studentDeal.php -->
<?php include '../common/docHead.html';?>
<head>
</head>
<body class="Body w3-auto" style="max-width: 750px">
  <div class="w3-container w3-center">
    <div>
      <?php 
        include '../common/banner.php';
        include '../common/menu.php';
      ?>
    </div>
    <!-- studentDeal Page -->
    <div class = "w3-container w3-light-blue">
      <div class="w3-left-align">
        <article>
          <h3>Student Deals</h3>
          <p> Our store offers different deals for students. Starting with an 
            easy payment plan for our students. We offer up to 50% off on our 
            used pearbooks and a new headphone of your choice when you buy a 
            new laptop.
          <br>
          </p>
          <ul>
            <li>To see what we have to offer?
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
    <div>
      <?php include '../common/footer.html';?>
    </div>
  </div>
</body>
</html>