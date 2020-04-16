<!-- eStoreInfo.php -->
<?php include '../common/docHead.html';?>
<body class="Body w3-auto" style="max-width: 750px">
  <div class="w3-container w3-center">
    <div>
      <?php 
        include '../common/banner.php';
        include '../common/menu.php';
      ?>
    </div>
    <!-- eStore Page -->
    <div class="w3-container w3-light-blue">
      <div class="w3-left-align">
        <article>
          <h3>Welcome to our estore ... thanks for visiting.</h3>
          <p> Our store contains a large collection of electronic supplies. 
            For your shopping and browsing convenience, please choose one 
            of the following links:
            <br>
          </p>
          <ul>
            <li>Just want to see what we have to offer?
              <br>
              To browse our exciting product catalog 
              <a title="not active yet" 
                href="pages/sorry.html">
                click here.</a>
            </li>
            <li>Ready to purchase and already have a username and password?
              <br>
              To log in to our e-store and begin shopping
              <a  
               href="pages/login.php">
                click here </a>
              (if not logged in already).
            </li>
            <li>Need to register for our e-store so you can make purchases?
              <br>
              To register (you only need to do it once) 
              <a 
                href="pages/registration.php">
                click here.</a>
            </li>
            <li>Trying to log in as a different user?
              <br>
              You must first
              <a 
                href="scripts/logoutScript.php">
                click here </a>
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