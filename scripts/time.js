setInterval(
function (){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("datetime").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "scripts/time.php", true);
  xhttp.send();
}, 60000);