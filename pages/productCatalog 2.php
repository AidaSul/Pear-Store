<!-- productCatalog.php -->
<?php include '../common/docHead.html';?>
<body class="Body w3-auto" style="max-width: 750px">
  <div class="w3-container">
    <div>
      <?php 
        include '../common/banner.php';
        include '../common/menu.php';
        include '../scripts/dbconnection.php';
      ?>
    </div>
    <div class="w3-container w3-light-blue w3-border-right w3-border-left">
      <h4 class="w3-center">Product Categories</h4>
      <?php include '../scripts/displayCategories.php';?>
    </div>
    <div>
      <?php include '../common/footer.html';?>
    </div>
  </div>
</body>
</html>