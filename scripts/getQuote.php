<p id="quote" class="w3-right-align">    
  <?php
    $time = date('g:i a');
    if($time == '12:00 am')
    {
      $ID = rand(0, 19);

      $json = file_get_contents("../resources/quotes.json");
      $quotes = json_decode($json, true);
      $today = "Today's " . $quotes[$ID]['adjective'] . " quote, from "
        . $quotes[$ID]['author'] . ": " . $quotes[$ID]['text'];
      $myfile = fopen("../resources/todaysQuote.txt", "w+")
      or die("Unable to open file!");
      fwrite($myfile, $today);
      fclose($myfile);
    }
  ?>
</p>
