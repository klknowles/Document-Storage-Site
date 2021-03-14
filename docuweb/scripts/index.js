function deleteEntry(id){
    var htp = new XMLHttpRequest();
    htp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById(docuList).innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "gethint.php?q=" + id, true);
      xmlhttp.send();
}

var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 6000); // Change image every 2 seconds
}