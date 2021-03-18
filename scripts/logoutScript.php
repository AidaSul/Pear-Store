<!-- logoutScript.php -->
<?php 
session_start();
include '../scripts/dbconnection.php';
if (isset($_SESSION['customer_id'])) 
  $notLoggedIn = false;
else
  $notLoggedIn = true;
session_unset();
session_destroy();
include '../common/docHead.html';
?>
<body class="Body w3-auto" style="max-width: 750px">
  <div class="w3-container">
    <!-- banner -->
    <div>
      <?php include '../common/banner.php';?>
    </div>
    <!-- menu -->
    <div>
      <?php include '../common/menu.php';?>
    </div>
    <!-- mission -->
    <div class="w3-container w3-light-blue w3-border-right w3-border-left">
      <h3>Log out</h3>

      <?php if ($notLoggedIn) { ?>
        
        <p><br>Thank you for visiting our website.
           You have not yet logged in.</p>
        <p>If you do wish to log in,
          <a href="pages/login.php">
            click here</a>.</p>
        <p>Or, just to browse our product catalog,
          <a href="pages/sorry.html"
             tittle ="not active yet">click here</a>.</p>

      <?php } else { ?>
        <p>
          Thank you for visiting our e-store.
          <br>
          You have successfully logged out.
          <br>
          <br>
          If you wish to log back in,
          <a 
            href="pages/login.php">
            click here.</a>
          <br>
          <br>
          To browse our product catalog,
          <a title="not active yet"
            href="pages/sorry.html">
            click here.</a>
        </p>
      <?php } ?>

    </div>
    <!-- footer -->
    <div>
      <?php include '../common/footer.html';?>
    </div>
  </div>
</body>
