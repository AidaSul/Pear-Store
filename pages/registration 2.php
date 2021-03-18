<!-- registration.php -->
<?php include '../common/docHead.html';?>
<body class="Body w3-auto" style="max-width: 750px">
  <div class="w3-container w3-center">
    <div>
      <?php include '../common/banner.php';?>
    </div>
    <div>
      <?php include '../common/menu.php';?>
    </div>
    <div class="w3-container w3-border-left w3-border-right w3-light-blue">
      <h4 class="w3-center">Registration Form</h4>
      <h5>(Sorry, but only Candian residents for the moment)</h5>
      <p class="w3-text-red">Each * denotes a required field.</p>
      <form id="registration"
      action="scripts/response_reg.php" method="post"
      autocomplete="on">
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Salutation:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <select name="salutation" style="width: 30%;" required>
              <option value selected disabled hidden>Choose one</option>
              <option value="Mrs.">Mrs.</option>
              <option value="Ms.">Ms.</option>
              <option value="Mr.">Mr.</option>
              <option value="Dr.">Dr.</option>
            </select>
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            First Name:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input required type="text" name="firstName" style="width: 75%;" 
            title="Starts with a capital, can contain spaces and hyphens"
            pattern="^[A-Z][A-Za-z -]*$" required value="<?php if (isset($_POST['firstname'])) {echo $_POST['firstname'];}?>">
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Middle Initial:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input type="text" name="midInitial" style="width: 10%;" 
            title="Capital letter, can be followed by a period"
            pattern="[A-Z]\.?*">
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Last Name:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input type="text" name="lastname" style="width: 75%;" 
            title="Starts with a capital, can contain spaces and hyphens"
            pattern="^[A-Z][A-Za-z -]*$" required>
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Gender:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <select name="gender" style="width: 30%;" required>
              <option value selected disabled hidden>Choose one</option>
              <option value="Female">Female</option>
              <option value="Male">Male</option>
              <option value="Other">Other</option>
            </select>
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Email Address:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input type="text" name="email" style="width: 75%;" 
            title="x@y.z, with . or - allowed in x and/or y, z must be 2 to 3 
            letters"
            placeholder="Must be unique within our database" 
            pattern="^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$" required>
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Phone Number:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input type="text" name="phone" style="width: 75%;" 
            title="Format must be xxx-yyy-zzzz" 
            pattern="((\d{3}-)?\d{3}-\d{4})">
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Street Address:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input type="text" name="address" style="width: 75%;" required>
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            City:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input type="text" name="city" style="width: 75%;" required>
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Region:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <select name="region" style="width: 30%;"  required>
              <optgroup label="Provinces:">
                <option value selected disabled hidden>Choose one</option>  
                <option title="Alberta" value="AB">AB</option>
                <option title="British Columbia" value="BC">BC</option>
                <option title="Manitoba" value="MB">MB</option>
                <option title="New Brunswick" value="NB">NB</option>
                <option title="Nova Scotia" value="NS">NS</option>
                <option title="Ontario" value="ON">ON</option>
                <option title="Prince Edward Island" value="PE">PE</option>
                <option title="Quebec" value="QC">QC</option>
                <option title="Saskatchewan" value="SK">SK</option>
              </optgroup>
              <optgroup label="Territories:">
                <option title="Northwest Territories" value="NT">NT</option>
                <option title="Nunavut" value="NU">NU</option>
                <option title="Yukon Territory" value="YT">YT</option>
              </optgroup>  
            </select>
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Postal Code:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input type="text" name="postalCode" style="width: 30%;" 
            title="Can be A1B 2C3 or A1B2C3" 
            pattern="[A-Z]\d[A-z] ?\d[A-Z]\d" required>
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Login Name:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input type="text" name="loginName" style="width: 75%;" 
            title="Must start with a letter, contain only letters and digits, 
            and be 6 to 15 characters long"
            placeholder="Choose your preferred username" 
            pattern="[A-Za-z][A-Za-z0-9]{5,14}" required>
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Password:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input type="password" name="password" style="width: 75%;" 
            title="8 to 15 characters long, must contain at least one 
            uppercase letter, lowercase letter and one special case character 
            from the group @^_+=[]:" 
            placeholder="Choose a good strong password" 
            pattern="(?=.*\d)(?=.*[@^_+=[\]:])(?=.*[A-Z])(?=.*[a-z])\S{7,14}"
            required>
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container">
            Password Again:
          </div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input type="password" name="pword2" style="width: 75%;" 
            title="Must match the above password" 
            placeholder="Re-enter same password as above" 
            pattern="(?=.*\d)(?=.*[@^_+=[\]:])(?=.*[A-Z])(?=.*[a-z])\S{7,14}"
            required>
            <span class="w3-text-red">*</span>
          </div>
        </div>
        <br>
        <div class="w3-row">
          <div class="w3-quarter w3-container"></div>
          <div class="w3-threequarter w3-container w3-left-align">
            <input type="submit" value="Submit Form">
            <input type="reset" value="Reset Form">
          </div>
        </div>
        <br>
      </form>
    </div>
    <div>
      <?php include '../common/footer.html';?>
    </div>
  </div>
</body>
</html>