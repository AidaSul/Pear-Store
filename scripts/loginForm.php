<?php
  session_start();
  include '../scripts/dbconnection.php';
  if (isset($_SESSION['customer_id']))
    header("Location: ../pages/estore.php");
 
  if (mysqli_connect_errno())
  {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
  $query = "SELECT * FROM my_customers
                   WHERE login_name = '$_POST[login_name]'";

  $myQuery = mysqli_query($db, $query);
  $numRows = mysqli_num_rows($myQuery);

  if ($numRows == 0)
  {
    header("Location: ../pages/login.php?retrying=true");
  }
  if ($numRows == 1)
  {
    $user = mysqli_fetch_array($myQuery, MYSQLI_ASSOC);
    $userPassword = md5($_POST['password']);

    //md5('$_POST[password]
    if ($userPassword == $user['password'])
    {
        $_SESSION['customer_id'] = $user['customer_id'];
        $_SESSION['salutation']  = $user['salutation'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['middle_initial'] =
            $user['middle_initial'];
        $_SESSION['lastname'] = $user['lastname'];
        header("Location: ../pages/eStoreInfo.php"); 
    }
    else
    {
      $correctpassword = false;
      header("Location: ../pages/login.php?retrying=true");
    }
  }
 
  mysqli_close($db);
?>