<!--category.php -->
<?php
  include("../common/docHead.html");
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
    <div>
      <?php include '../scripts/dbconnection.php';?>
    </div>
    <div class="w3-container w3-light-blue w3-border-right w3-border-left">
      <h4 class="w3-center">List of Products in Chosen Category</h4>
      <?php
        include '../scripts/displayItems.php'
      ?>
    
    </div>
    <!-- footer -->
    <div>
      <?php include '../common/footer.html';?>
    </div>
  </div>
</body>
</html>