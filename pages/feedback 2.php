<!-- feedback.php-->
<?php include '../common/docHead.html';?>
<body class="Body w3-auto" style="max-width: 750px">
  <div class="w3-container w3-center">
    <div>
      <?php include '../common/banner.php';?>
      <?php include '../common/menu.php';?>
    </div>
    <div class="w3-container w3-light-blue w3-border-right w3-border-left">
      <h3>
        Feedback Form ... Tell Us What You Think, or Ask Us a Question
      </h3>
      <form id="newForm" action="scripts/savefeedback.php" method="post" autocomplete="on">
        <div class="w3-row">
          <div class="w3-third w3-container">
            <h4>Salutation:</h4>
          </div>
          <div class="w3-twothird w3-container w3-left-align">
            <select name="salutation" required>
              <option value disabled selected hidden>Choose one</option>
              <option value="Mrs.">Mrs.</option>
              <option value="Ms.">Ms.</option>
              <option value="Mr.">Mr.</option>
              <option value="Dr.">Dr.</option>
            </select>
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-third w3-container">
            <h4>First Name:</h4>
          </div>
          <div class="w3-twothird w3-container w3-left-align">
            <input type="text" name="firstName" style="width: 85%;" 
            pattern="^[A-Z][A-Za-z]*$" required title="Initials capital, spaces and hyphens allowed">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-third w3-container">
            <h4>Last Name:</h4>
          </div>
          <div class="w3-twothird w3-container w3-left-align">
            <input type="text" name="lastName" style="width: 85%;"
            pattern="^[A-Z][A-Za-z]*$" required title="Initials capital, spaces and hyphens allowed">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-third w3-container">
            <h4>Email Address:</h4>
          </div>
          <div class="w3-twothird w3-container w3-left-align">
            <input type="text" name="email" style="width: 85%;"
            pattern="(^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$)"
            required title="x@y.z, x and y can have . or -, z only 2 or 3 letters">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-third w3-container">
            <h4>Phone Number:</h4>
          </div>
          <div class="w3-twothird w3-container w3-left-align">
            <input type="text" name="phoneNum" style="width: 85%;"
            pattern="^(\d{3}-)?\d{3}-\d{4}" title="xxx-yyy-zzzz, area code xxx- optional">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-third w3-container">
            <h4>Subject:</h4>
          </div>
          <div class="w3-twothird w3-container w3-left-align">
            <input type="text" name="subject" style="width: 85%;" required>
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-third w3-container">
            <h4>Comments:</h4>
          </div>
          <div class="w3-twothird w3-container w3-left-align">
            <textarea name="comments" style="width: 100%;" required></textarea>
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-third w3-container"></div>
          <div class="w3-twothird w3-container">
            <h6>
              Please check if you would like us to get back to you: 
              <input type="checkbox" name="reply">
            </h6>
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-third w3-container"></div>
          <div class="w3-twothird w3-container" style="padding-bottom: 20px">
            <input type="submit" name="send">
            <input type="reset" name="reset">
          </div>
        </div>
      </form>
    </div>
    <div>
      <?php include '../common/footer.html';?>
    </div>
  </div>
</body>
</html>