var div = document.getElementById("add-project-box");
var add_task_box = document.getElementById("add-task-box");
var create_task_btn = document.getElementById("create-task-btn");
let buttonId = "";

// this function is used to show enter project name box
function create_project() {
  div.style.display = "block";
}

// this function is used to hide enter project name box
function close_add_project_box() {
  div.style.display = "none";
}

// this function is accessed when we click on any project
function showCreateTask() {
  create_task_btn.style.display = "block";
}

// this function is used to show the enter taks name
function Create_task_() {
  add_task_box.style.display = "block";
}

// this function is used to hide the enter taks name
function close_add_task_box() {
  add_task_box.style.display = "none";
}



// This function is used to delete the project from app
function delete_operation(event) {
  let delete_btn_id = event.target.id;
  let last_digit_of_id = delete_btn_id.substring(10);
  let project_id_guess = 'table-btn'+last_digit_of_id;
  let project_name = document.getElementById(project_id_guess).innerText;
  let text = "Are you sure you want to delete '"+ project_name+"'.";
  if (confirm(text) == true) {
    $.post(
      "status.php",
      {
        postProjectName: project_name,
        statusCheck: 2,
      }, // 3 - delete project
      function (data) {
        $().html(data);
      }
    );
    location.reload();
  }
}

// This function is used to update the project name
function update_operation(button){
  let update_btn_id = button.id;
  let last_digit_of_id = update_btn_id.substring(10);
  let project_id_guess = 'table-btn'+last_digit_of_id;
  let project_name = document.getElementById(project_id_guess).innerText;
  let placeholder_project_name = project_name+' updated';
  let new_project_name = prompt("Please enter new Project Name.", placeholder_project_name);
  if (new_project_name != null) {
    $.post(
      "status.php",
      {
        postProjectName: project_name,
        postUpdatedProjectName: new_project_name,
        statusCheck: 3,
      }, // 4 - update project name
      function (data) {
        $().html(data);
      }
    );
    location.reload();
  }
}

// this function sends the project name to server2.php to fetch all the tasks related to it.
function showtasksrelatedtoproject() {
  try {
    var clickedProjectbtn = document.getElementById(buttonId).innerText;
    $.post(
      "server2.php",
      { postProjectName: clickedProjectbtn },
      function (data) {
        $(".all-tasks").html(data);
      }
    );
    try {
      $.post(
        "status.php",
        { postProjectName: clickedProjectbtn },
        function (data) {
          var elementsInDoubleQuotes = data
            .match(/"([^"]*)"/g)
            .map(function (str) {
              return str.replace(/"/g, "");
            });
          var length_of_object = Object.keys(elementsInDoubleQuotes).length;
          for (let i = 0; i < length_of_object; i++) {
            let fetched_label = elementsInDoubleQuotes[i];
            const checkboxes = document.querySelectorAll(".ui-checkbox");
            checkboxes.forEach(function (checkbox) {
              const label = checkbox.nextElementSibling;
              if (label.innerText === fetched_label) {
                var hello = document.getElementById(checkbox.id);
                hello.checked = true;
              }
            });
          }
        }
      );
    } catch (err) { }
  } catch (err) { }
}

// this functions works on the click of any project
function xyz() {
  document.querySelectorAll(".table-btn").forEach(function (button) {
    button.addEventListener("click", function (event) {
      buttonId = event.target.id;
      showCreateTask();
      showtasksrelatedtoproject();
    });
  });
}

// this fucntion works on the click of create button of task box
function postProjectName() {
  var clickedProjectbtn = document.getElementById(buttonId).innerText;
  var input_task_name = document.getElementById("input_task_name").value;
  $.post(
    "create_task.php",
    { postProjectName: clickedProjectbtn, postTaskName: input_task_name },
    function (data) {
      $().html(data);
    }
  );
  close_add_task_box();
  var refresh_btn = document.getElementById(buttonId);
  refresh_btn.click();
}

function status_check() {
  const checkboxes = document.querySelectorAll(".ui-checkbox");
  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener("change", function () {
      const labelValue = checkbox.nextElementSibling.textContent;
      var project_name = document.getElementById(buttonId).innerText;

      if (checkbox.checked) {
        $.post(
          "status.php",
          {
            postProjectName: project_name,
            postTaskName: labelValue,
            statusCheck: 1,
          }, // 1 - project completed
          function (data) {
            $().html(data);
          }
        );
      } else {
        $.post(
          "status.php",
          {
            postProjectName: project_name,
            postTaskName: labelValue,
            statusCheck: 0,
          }, // 0 - project incomplete
          function (data) {
            $().html(data);
          }
        );
      }
    });
  });
}

