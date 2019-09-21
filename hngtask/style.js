window.onload = function(){
    var loader = document.getElementById("Home-loader").style.display = "none";
}

var acc = document.getElementsByClassName("accordion");
var i = 0;
for (i = 0; i < acc.length; i++){
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight){
            panel.style.maxHeight = null;
          } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
          } 
    });
}