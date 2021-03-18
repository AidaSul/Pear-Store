<!-- my_business.php --> 
<?php include 'common/docHead.html';?>
<link rel="stylesheet" href="css/my_css.css">
<body class="Body w3-auto" style="max-width: 750px;" onload="slide()">
  <div class="w3-container w3-center">
    <div>
      <?php include 'common/banner.php';?>
    </div>
    <div>
      <?php include 'common/menu.php';?>
    </div>
    <div class="w3-container w3-light-blue" >
      <div class="w3-half w3-left-align">
        <h3>Welcome to the Pear website!</h3>
        <p>
          Founded in 2020, Pear is a company that specializes in making quality
          electronics. From mobile divices to laptops, we have it all! 
          <br><br>
          Our products are designed to meet the needs of students, business 
          professionals,<br> or those who wish to upgrade their personal 
          devices. Please browse our website for products and information.
        </p>
      </div>
      <div class="w3-half">
        <div class="w3-card-4 w3-section" style="width: 100%; height: 100%;
          max-width: 750px;">
          
          <img class="mypicture" src="images/products/pearbook.jpeg" 
            alt="Pear Book" style="width: 100%; height: 300px; display: block;">
          <img class="mypicture" src="images/products/pearbookpro.jpeg" 
            alt="Pear Book Pro" style="width: 100%; height: 300px; display: none;">
          <img class="mypicture" src="images/products/pearphone.jpeg" 
            alt="Pear Phone" style="width: 100%; height: 300px; display: none;">
          <img class="mypicture" src="images/products/pearphone2.jpeg" 
            alt="Pear Phone 2" style="width: 100%; height: 300px; display: none;">
          <img class="mypicture" src="images/products/ipadpro.jpeg" 
            alt="Pear Phone 2" style="width: 100%; height: 300px; display: none;">
          <img class="mypicture" src="images/products/iphone7.jpg" 
            alt="Pear Phone 2" style="width: 100%; height: 300px; display: none;">

          <footer class="mylable w3-container w3-blue" style="display: block;">
            <h5>Pearbook 13"</h5>
          </footer>
          <footer class="mylable w3-container w3-blue" style="display: none;">
            <h5>PearbookPro 13"</h5>
          </footer>
          <footer class="mylable w3-container w3-blue" style="display: none;">
            <h5>PearPhone 11"</h5>
          </footer>
          <footer class="mylable w3-container w3-blue" style="display: none;">
            <h5>PearPhone 5"</h5>
          </footer>
          <footer class="mylable w3-container w3-blue" style="display: none;">
            <h5>PearPad pro"</h5>
          </footer>
          <footer class="mylable w3-container w3-blue" style="display: none;">
            <h5>PearPhone 7 plus"</h5>
          </footer>
        </div>
      </div>
    </div>
    <div>
      <?php include 'common/footer.html';?>
    </div>
  </div>
</body>
</html>
