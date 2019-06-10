<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Triple town</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>

<body>
   
    <div id='title'> 
        <h1>Triple Town</h1>
        <h3>by Emanuele Piatti</h3>
    </div>
    <div id='spawn_div'> </div>
    <div id='point_div'> 
        <h2>Points:</h2>
        <h2 id='points'> 0 </h2>
    </div>
    <div id='grid_div'> </div>
    

    <script>

        function ajax_call_pawns_array_creator() {
            $.ajax({
                type: 'GET',
                async: false,
                url: "./pawns_array_creator.php",
                success: function(data){
                }
            });
        }

        function ajax_call_get_points() {
            var points = null;
            $.ajax({
                type: 'GET',
                async: false,
                url: "./get_points.php",
                success: function(data){
                    points = data;
                    document.getElementById("points").innerHTML = points;
                }
            });
        }

        function ajax_call_session_grid_creator() {
            $.ajax({
                type: 'GET',
                async: false,
                url: "./session_grid_creator.php",
                success: function(data){
                }
            });
        }

        function ajax_call_print_grid() {
            var output = null;
            $.ajax({
                type: 'GET',
                async: false,
                url: "./print_grid.php",
                success: function(data){
                    output = data;
                }
            });
            document.getElementById('grid_div').innerHTML = output;
            $(".dropzone").droppable({
                accept: function (item) {
                    return $(this).data("color") == item.data("color");
                },
                drop: function (event, ui) {
                    var $this = $(this);
                    var $div_id_dropped = $this[0].id
                    ui.draggable.position({
                        my: "center",
                        at: "center",
                        of: $this,
                        using: function (pos) {
                            $(this).animate(pos, 200, "linear");
                        }
                    });
                    document.getElementById($div_id_dropped).className = "dropped";          
                    ajax_call_session_grid_update($div_id_dropped);
                    ajax_call_checker($div_id_dropped);
                    document.getElementById("spawn_div").innerHTML = "";
                    ajax_call_print_grid();
                    ajax_call_get_points();
                    ajax_call_check_end_game();
                    ajax_call_element_generator();   
                    
                }
            });
        }

        function ajax_call_element_generator($div_id_dropped) {
            var output = null;
            $.ajax({
                type: 'GET',
                async: false,
                url: "./element_generator.php",
                success: function(data){
                    output = data;
                }
            });
            $("#spawn_div").append(output);
            $('.icon').draggable()  
        }

        function ajax_call_session_grid_update($div_id_dropped) {
            $.ajax({
                type: 'POST',
                async: false,
                data: {'coordinate':$div_id_dropped},
                url: "./session_grid_update.php",
                success: function(data){
                }
            });
        }

        function ajax_call_checker($div_id_dropped) {
            $.ajax({
                type: 'POST',
                async: false,
                data: {'coordinate':$div_id_dropped},
                url: "./checker.php",
                success: function(data){
                    if (data) {
                        ajax_call_checker($div_id_dropped);
                        
                    }
                }
            });
        }

        function ajax_call_check_end_game() {
            $.ajax({
                type: 'GET',
                async: false,
                url: "./check_end_game.php",
                success: function(data){
                    if (data) {
                        var points = null;
                        $.ajax({
                            type: 'GET',
                            async: false,
                            url: "./get_points.php",
                            success: function(data){
                                points = data;
                            }
                        });
                        alert("Griglia piena, partita terminata ->" + points + "punti");
                        location.reload();
                        <?php $_SESSION['points'] = 0; ?>
                    }
                }
            });
        }
    </script>

    <?php
    $_SESSION['points'] = 0;
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>

    <script> 
        ajax_call_pawns_array_creator();
        ajax_call_session_grid_creator();
        ajax_call_print_grid();
        ajax_call_element_generator(); 


        //Draggable and droppable part

            $(".icon").draggable({
                revert: 'invalid'
            });

            $(".dropzone").droppable({
                accept: function (item) {
                    return $(this).data("color") == item.data("color");
                },
                drop: function (event, ui) {
                    var $this = $(this);
                    var $div_id_dropped = $this[0].id
                    ui.draggable.position({
                        my: "center",
                        at: "center",
                        of: $this,
                        using: function (pos) {
                            $(this).animate(pos, 200, "linear");
                        }
                    });
                    document.getElementById($div_id_dropped).className = "dropped";          
                    ajax_call_session_grid_update($div_id_dropped);
                    ajax_call_checker($div_id_dropped);
                    document.getElementById("spawn_div").innerHTML = "";
                    ajax_call_print_grid();
                    ajax_call_get_points();
                    ajax_call_element_generator();   
                    
                }
            });
    </script>

</body>
</html>