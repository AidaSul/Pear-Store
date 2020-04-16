<?php
  include('/var/shared/vendor/autoload.php');
  include($_SERVER["CONTEXT_DOCUMENT_ROOT"] . '/../htpasswd/db_info.php');
  $client = new MongoDB\Client("mongodb://$username:$password@localhost/u02");
  $collection = $client->u02->quotes;
  $myfile = fopen($_SERVER["CONTEXT_DOCUMENT_ROOT"] .
    "/submissions/submission03/resources/todaysQuote.txt", "r")
    or die("Unable to open file!");
  
  $quoteDate = trim(fgets($myfile));
  $today = strval(date('l, F jS'));
  if($quoteDate != $today)
  {
    $num = rand(1, 20);
    $result = $collection->find([ '_id'=>$num ]);
    foreach ($result as $entry)
    {
      echo "Today's " . $entry['adjective'] . " quote, from " .
      $entry['author'] . ": " . $entry['text'];
    
      $quote = $today . "\nToday's " . $entry['adjective'] . " quote, from " .
      $entry['author'] . ": \n" . $entry['text'];
      $myfile = fopen($_SERVER["CONTEXT_DOCUMENT_ROOT"] .
        "/submissions/submission03/resources/todaysQuote.txt", "w+")
        or die("Unable to open file!");
      fwrite($myfile, $quote);
      fclose($myfile);
    }
  }
  else
  {
    $lines = file($_SERVER["CONTEXT_DOCUMENT_ROOT"] .
      "/submissions/submission03/resources/todaysQuote.txt");
    echo $lines[1] . $lines[2];
  }
?>