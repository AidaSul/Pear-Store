<!-- response_reg.php -->
<html>
<head>
  <?php include '../common/docHead.html';?>
</head>
<body class="Body w3-auto" style="max-width: 750px">>
  <div class="w3-container w3-center">
    <div>
      <?php include '../common/banner.php';?>
    </div>
    <div>
      <?php include '../common/menu.php';?>
    </div>
    <div class="w3-container w3-border-left w3-border-right w3-light-blue">
      <?php
      include '../scripts/dbconnection.php';

      $email = $db->query(
        "SELECT email_address
        FROM my_customers
        WHERE email_address = '$_POST[email]'"
      );

      if($email->num_rows == 0) {
        if($_POST['password'] == $_POST['pword2']){
          include '../scripts/process_reg.php';
        }else{
          echo "<h3>Sorry, but the passwords you entered do not match. Your 
          attempt to register has failed. Please try again.</h3>";
          mysqli_close($db);
        }
      } else {
        echo "<h3>Sorry, but the email address you used is already in our 
        database, please try again with another email address.</h3>";
        mysqli_close($db);
      }
      ?>
    </div>
    <div>
      <?php include '../common/footer.html';?>
    </div>
  </div>
</body>
</html>