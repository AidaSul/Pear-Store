<!-- savefeedback -->
<head>
  <meta charset="utf-8">
  <title>
    Your Message
  </title>
</head>
<body>
  <?php
  $salutation = $_REQUEST['salutation'];
  $firstName = $_REQUEST['firstName'];
  $lastName = $_REQUEST['lastName'];
  $email = $_REQUEST['email'] ;
  $phoneNumber = $_REQUEST['phoneNum'];
  $subject = $_REQUEST['subject'];
  $message = $_REQUEST['comments'] ;

  
  $final = "Dear ";
  $final .= $salutation . " " . $lastName; 
  $final .= "\nThe following message was received from you by Pear lmtd :\n";
  $final .= "========================\nFrom: ";
  $final .= $salutation . " " . $firstName . " " . $lastName;
  $final .= "\nFrom: " . $email . "\nPhone number: ";
  if($phoneNumber == "")
    $final .= "Not given"; 
  else 
    $final .= $phoneNumber;
  $final .="\n------------------------\n";
  $final .= "Subject: " . $subject . "\n------------------------\n";
  $final .= $message . "\n========================\n";
  $final .= "Thank you for your interest and your feedback.\nFrom the folks at Pear lmtd\n";
  $final .= "========================";
  echo nl2br("<p style='font-family: monospace;'>" . $final . "</p>");

//To the client
  mail($email , $subject , $final);

//To the buisness
  mail("u50@mail.cs.smu.ca" , $subject , $final);
  
  
  $files = "../data/feedback.txt";
  $nextline = "\n\n\n";
  $content = file_get_contents($files);
  $myfile = fopen($files, "w+")
    or die("Unable to open file!");
  fwrite($myfile, ($final . $nextline . $content));
  fclose($myfile);
 

  
  
?>
</body>


