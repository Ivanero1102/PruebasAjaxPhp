$(document).ready(function() {
    console.log("JQuery is working");
    $("#task-result").hide();
    fetchTasks();
    $("#search").keyup(function(e) {
        if($("#search").val()){
            let search = $("#search").val();
            $.ajax({
                url: "task-search.php",
                type: "POST",
                data: { search },
                success: function(response){
                    let tasks = JSON.parse(response);
                    let template = "";
                    tasks.forEach(task => {
                        template += `<li>
                            ${task.nombre}
                        </li>`
                    });
                    $("#container").html(template);
                    $("#task-result").show();
                }
            })
        }else{
            $("#task-result").hide();
        }
    });

    $("#task-form").submit(function (e) {
        const postData = {
            nombre: $("#name").val(),
            descripcion: $("#description").val()
        };
        $.post("task-add.php", postData, function (response) {
            fetchTasks();
            $("#task-form").trigger('reset');
        })
        e.preventDefault();
    });

    function fetchTasks(){
        $.ajax({
            url: "task-list.php",
            type: "GET",
            success: function (response) {
                let tasks = JSON.parse(response);
                let template = "";
                tasks.forEach(task => {
                    template += `<tr>
                        <td>${task.id}</td>
                        <td>${task.nombre}</td>
                        <td>${task.descripcion}</td>
                    </tr>`
                });
                $("#tasks").html(template);
            }
        });
    }
});