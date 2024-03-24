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
	<script src="jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="outer" id="outer">
        <div class="add-project-box" id="add-project-box">
            <form method="post" action="create_project.php" onsubmit="return validateForm()" name="createprojectform">
                <label for="input_project_name">Create Project</label><br />
                <input type="text" name="project_name" id="input_project_name" placeholder="Enter Project Name..." /><br />
                <button onclick="close_add_project_box()" type="reset" class="cancel_btn_">CANCEL</button>
                <button type="submit" class="create_btn_">CREATE</button>
            </form>
        </div>
        <div class="add-task-box" id="add-task-box">
            <label for="">Create Task</label><br />
            <input type="text" name="task_name" id="input_task_name" placeholder="Enter Task Name..." /><br />
            <button onclick="close_add_task_box()" type="reset" class="cancel_btn_">CANCEL</button>
            <button  onclick="postProjectName()" class="create_btn_">CREATE</button>
        </div>
        <div class="left-box" id="left-box">
            <h1>PROJECTS</h1>
            <div class="all-projects">
                <div id="link_wrapper"></div>
            </div>
            <button id="myBtn" class="create-project-btn" onclick="create_project()">CREATE PROJECT</button>
        </div>
        <div class="right-box" id="right-box">
            <h1>TASKS</h1>
            <div class="all-tasks">
                <div id="link_wrapper1"></div>
            </div>
            <button class="create-task-btn" id="create-task-btn" onclick="Create_task_()">
                <img class="plus" src="icons/white-plus.png" alt="">
            </button>
        </div>
    </div>
    <script src="script.js"></script>
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
    loadXMLDoc();
    
    function loadXMLDoc1() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("link_wrapper1").innerHTML =
                this.responseText;
            }
        };
        xhttp.open("GET", "server2.php", true);
        xhttp.send();
    }
    loadXMLDoc1();
    window.onload = loadXMLDoc;
</script>
