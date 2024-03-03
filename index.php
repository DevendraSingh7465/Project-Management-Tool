<?php 
	include("connection.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management Tool</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="outer">
        <div class="left-box">
            <h1>PROJECTS</h1>

            <div class="all-projects">
                <div id="link_wrapper">

                </div>
            </div>

            <button class="create-project-btn">CREATE PROJECT</button>
        </div>
        <div class="right-box">
            <h1>TASKS</h1>

            <div class="all-tasks"></div>

            <button class="create-task-btn">
                <img class="plus" src="white-plus.png" alt="">
            </button>
        </div>

    </div>
</body>
</html>

<!-- For Getting Live Changes -->
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