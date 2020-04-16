//slide.js
var index = 0;
function slide()
{
  var slides = document.getElementsByClassName("mypicture");
  var labels = document.getElementsByClassName("mylable");
  for (var i = 0; i < slides.length; i++)
  {
    slides[i].style.display = "none";  
    labels[i].style.display = "none";  
  }
  index++;
  if (index > slides.length)
  {index = 1}    
  slides[index-1].style.display = "block";  
  labels[index-1].style.display = "block";  
  setTimeout(slide, 3000);
}

