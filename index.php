
<?php 
	include("connection.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <h1>PROJECTS</h1>
        <div class="container">
            <div id="link_wrapper">

            </div>
		
	    </div>
        <button class="prjt-btn">Create Project</button>
    </div>
    <div class="tasks">
        <h1>TASKS</h1>
        <div class="task-btn">
            <img src="assets/ellipse-1.png" alt="" id="circle">
            <img src="assets/vector-GJB.png" alt="" id="plus">
        </div>
    </div>
</body>
</html>
<script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("link_wrapper").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "server.php", true);
  xhttp.send();
}
setInterval(function(){
	loadXMLDoc();
	// 1sec
},500);

window.onload = loadXMLDoc;
</script>