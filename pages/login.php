<!-- mission.php -->
<?php
  include '../common/docHead.html';
  $retrying = isset($_GET['retrying']) ? true : false;
?>
<body class="Body w3-auto" style="max-width: 750px">
  <div class="w3-container">
    <div>
      <?php 
        include '../common/banner.php';
        include '../common/menu.php';
      ?>
    </div>
    <!-- mission -->
    <div class="w3-container w3-light-blue w3-border-right w3-border-left">
      <h4 class="w3-center">
        <strong>Log in</strong>
      </h4>
      <p class ="w3-red w3-center w3-padding"> Important Note </p>
      <span w3-padding-16>
        "Purchasing items from our on-line
        e-store requires logging in. And if you have not yet registered with 
        Amazing Stuff, before attempting to log in you must"
        <a href="pages/sorry.html">Register here.</a>
        
      </span>
      <form id="loginform" action="scripts/loginForm.php" method="post" autocomplete="on">
        <div class="w3-row w3-section">
          <div class="w3-quarter w3-container">
            Login name: 
          </div>
          <div class="w3-threequarter w3-container w3-wide">
            <input type="text" name="login_name" required style="width: 90%;" value placeholder="Must be name assigned at registeration">
          </div>
        </div>

        <div class="w3-row w3-section">
          <div class="w3-quarter w3-container">
            Password: 
          </div>
          <div class="w3-threequarter w3-container w3-wide">
            <input type="password" name="password" required style="width: 90%;" value placeholder="Must be password chosen at registeration">
          </div>
        </div>
        <div class="w3-row w3-section">
          <div class="w3-quarter w3-container">
          </div>
          <div class="w3-threequarter w3-container">
            <input type="submit" value="Log in">
            <input type="reset" value="Reset Form">
            
          </div>

          <?php if ($retrying == true) { ?>
            <div class="w3-row w3-section">
              <p class="w3-red w3-padding">
                Sorry, but your login procedure failed.
                An invalid username or password was entered.
                Please try again to enter your correct login information.
              </p>  
            </div>
          <?php } ?>   
        </div> 
      </form>
    </div>
    <div>
      <?php include '../common/footer.html';?>
    </div>
  </div>
</body>
</html>