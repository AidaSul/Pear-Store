<!-- banner.php -->
<div class="w3-container w3-border-bottom w3-border-right w3-border-left
  w3-light-blue w3-center">
  <div id="logo" class="w3-half">
  	<img src="images/pear.png" alt="Pear Logo"
      style="width: 40%; height: 40%">
  </div>
  <div class="w3-half w3-right-align">
    <div class="w3-panel">
      <?php
      if(session_id() == '')
      {
      	session_start();
      }
      if (isset($_SESSION['customer_id'])){
        echo "<h6>" . $_SESSION['salutation'] . " " . $_SESSION['firstname'] .
        " " . $_SESSION['lastname'] . " ... Welcome, " . $_SESSION['firstname']
        . "!</h6>";
      }else{
        echo "<h4>Welcome!</h4>";
      }
      include $_SERVER["CONTEXT_DOCUMENT_ROOT"] .
      '/submissions/submission06//scripts/time.php';

      if(!isset($_SESSION['customer_id'])){
        echo "<a class=\"w3-button w3-blue w3-round\" href=\"pages/login.php\">
        Click Here To Log In</a>";
      }else{
        echo "<a class=\"w3-button w3-blue w3-round\"
        href=\"scripts/logoutScript.php\">Click Here To Log out</a>";
      }
      echo "<p id=\"quote\">";
        include $_SERVER["CONTEXT_DOCUMENT_ROOT"] .
        '/submissions/submission06/scripts/get_quote_mongo.php';
      echo "</p>";
      ?>
    </div>
  </div> 
</div>