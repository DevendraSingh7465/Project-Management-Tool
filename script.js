var div = document.getElementById('add-project-box');
var add_task_box = document.getElementById('add-task-box');
var create_task_btn = document.getElementById('create-task-btn');

let buttonId = '';


function create_project(){
    div.style.display = 'block';
}

function close_add_project_box(){
    div.style.display = 'none';
}

function showCreateTask(){
    create_task_btn.style.display = 'block';
}
function showtasksrelatedtoproject(){
    try{
        var clickedProjectbtn = document.getElementById(buttonId).innerText;
        // console.log(clickedProjectbtn);
        $.post('server2.php', {postProjectName:clickedProjectbtn}, 
            function(data){
                $('.all-tasks').html(data);
            }
        );
        try{
            let labels_ =[];
            $.post('status.php', {postProjectName:clickedProjectbtn}, 
                function(data){
                    
                    console.log("Data From PHP File : "+data);
                    
                    var elementsInDoubleQuotes = data.match(/"([^"]*)"/g).map(function(str) {
                        return str.replace(/"/g, '');
                    });
                    
                    console.log(elementsInDoubleQuotes);
                    var length_of_object = Object.keys(elementsInDoubleQuotes).length
                    console.log("Length Of the Object : "+length_of_object); // length of the Object
                    // console.log(typeof elementsInDoubleQuotes);
                    for(let i = 0; i<length_of_object; i++ ){
                        let fetched_label = elementsInDoubleQuotes[i];
                        const checkboxes = document.querySelectorAll('.ui-checkbox');
                        checkboxes.forEach(function(checkbox) {
                            const label = checkbox.nextElementSibling;
                            if (label.innerText === fetched_label) {
                              console.log(checkbox.id);
                              // checkboxes.checked = true;
                              var hello = document.getElementById(checkbox.id);
                              hello.checked = true;
                            }
                          });
                        // console.log(fetched_label);
                    }
                }
            );
            console.log(labels_);
            
        }
        catch(err){

        }
    }catch(err){

    }
}
function xyz(){

    document.querySelectorAll('.table-btn').forEach(function(button) {
        button.addEventListener('click', function(event) {
            buttonId = event.target.id;
            showCreateTask()
            showtasksrelatedtoproject();
            
        });
    });
    
}


function Create_task_(){
    add_task_box.style.display = 'block'; 
}
function postProjectName(){
    // console.log("postProjectName() Project Button id : "+buttonId);

    var clickedProjectbtn = document.getElementById(buttonId).innerText;
    // let text1 = clickedProjectbtn.innerText;
    var input_task_name = document.getElementById('input_task_name').value;

    // console.log("Project Name : "+text1);
    // console.log("Project Name : "+clickedProjectbtn);
    // console.log("Task Name : "+input_task_name);


    $.post('create_task.php', {postProjectName:clickedProjectbtn,postTaskName:input_task_name}, 
        function(data){
            $().html(data);
        }
    );
    add_task_box.style.display = 'none';
    alert("Task Added please refresh the page.")
    
}
function close_add_task_box(){
    add_task_box.style.display = 'none';
}
function status_check(){
    const checkboxes = document.querySelectorAll('.ui-checkbox');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // console.log(checkbox.id);
            // console.log(checkbox.innerText);
            const labelValue = checkbox.nextElementSibling.textContent;
            console.log("Task Name : "+labelValue);
            // console.log("Project ID : "+ buttonId);
            var project_name = document.getElementById(buttonId).innerText;
            console.log("Project name : "+project_name);
            $.post('status.php', {postProjectName:project_name,postTaskName:labelValue}, 
            function(data){
                $().html(data);
            });
        });
    });
}