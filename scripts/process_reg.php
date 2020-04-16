<!-- process_reg.php -->
<?php
include '../scripts/dbconnection.php';
if (mysqli_connect_errno()) {
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$unique_login = $_POST['loginName'];
$query =
  "SELECT *
  FROM my_customers
  WHERE login_name = '$unique_login'";
$customers = mysqli_query($db, $query);
if ($customers->num_rows != 0)
{
  $i = 0;
  do
  {
    $i++;
    $unique_login = $_POST['loginName'].$i;
    $query =
      "SELECT *
      FROM my_customers
      WHERE login_name = '$unique_login'";
    $customers = mysqli_query($db, $query);
  }
  while ($customers->num_rows != 0);
}

$sql = "INSERT INTO my_customers (
  salutation,
  firstname, middle_initial, lastname,
  gender,
  email_address,
  phone_number,
  address, town, region, postal_code,
  login_name,
  password
  )
VALUES (
  '$_POST[salutation]',
  '$_POST[firstName]', '$_POST[midInitial]', '$_POST[lastname]',
  '$_POST[gender]',
  '$_POST[email]',
  '$_POST[phone]',
  '$_POST[address]','$_POST[city]', '$_POST[region]', '$_POST[postalCode]',
  '$unique_login',
  md5('$_POST[password]')
)";

if (mysqli_query($db, $sql)) { 
  if ($unique_login != $_POST['loginName'])
  {
    echo "<h3>Your preferred login name already exists.<br>So ...
    we have assigned $unique_login as your login name.</h3>";
    echo "<a href=\"pages/login.php\"><h3>To log in, click here.</h3></a>";
  }else{
    echo "<h3>Your account has been successfully created. To log in</h3>";
    echo "<a href=\"pages/login.php\"><h3>click here.</h3></a>";
  }
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
mysqli_close($db);

?>