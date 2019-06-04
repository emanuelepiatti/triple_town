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
<div id='spawn_div'>
    <h3>spawn: </h3>
</div>

<script>
function ajax_call_element_generator() {
    var output = null;
    $.ajax({
        async: false,
        url: "./element_generator.php",
        success: function(data){
            output = data;
        }
    });
    $("#spawn_div").append(output);
}
</script>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once('pawn.php');

    $pawns_array = array();

    $erba = new Pawn("erba", 1);
    $cespuglio = new Pawn("cespuglio", 2);
    $albero = new Pawn("albero",3);
    $capanna = new Pawn("capanna", 4);
    $casa = new Pawn("casa", 5);
    $dimora = new Pawn("dimora", 6);
    $castello = new Pawn("castello", 7);
    $castello_galleggiante = new Pawn("castello galleggiante", 8);
    $castello_triplo = new Pawn("castello triplo", 9);

    array_push($pawns_array, $erba, $cespuglio, $albero, $capanna, $casa, $dimora, $castello, $castello_galleggiante, $castello_triplo);
    $_SESSION['pawns_array'] = serialize($pawns_array);

    function session_grid_creator($pawns_array) {
        $array_for_session = array();

        for ($x=0; $x < 6; $x++) {
            for ($y=0; $y < 6; $y++) {
                $array_for_session[$x][$y] = NULL;
            }
        }

        for ($i=0; $i < 5; $i++) {
            do {
                $random_x = rand(0, 5);
                $random_y = rand(0, 5); 

            } while (!is_null($array_for_session[$random_x][$random_y]));

            $random_element = rand(0, 2);
            $array_for_session[$random_x][$random_y] = $pawns_array[$random_element];
        }

        $_SESSION['grid'] = serialize($array_for_session);   
    }

    function printTable($pawns_array) {
        $grid = unserialize($_SESSION['grid']);

        echo "<table style='width:30%' align='center' valgin'center'>";
        for ($row=0; $row < 6 ; $row++) { 
            echo "<tr>";
            for ($column = 0; $column  < 6 ; $column++) { 
                $div_id = $row . "-" .$column;
                if (empty($grid[$row][$column])) {
                    echo "<td> <div id= $div_id class='dropzone'> </div> </td>";
                }
                else {
                    $image_url = $grid[$row][$column]->get_image_url();
                    echo "<td> <div id= $div_id class='dropped centered_image'> <img class = 'centered_image' src='icons/$image_url'> </div> </td>";
                }    
            }
        echo "</tr>";
        }
    }
    
#GAME TEST    
session_grid_creator($pawns_array);
printTable($pawns_array);
?>
<script> 
ajax_call_element_generator(); 
</script>

<script>    
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
            //ui.draggable.draggable({disabled: true});

            ajax_call_element_generator();
            


        }
    });
</script>
 
</body>
</html>

<!-- TODO
1.Matrice 6x6
2.Creare elenco degli oggetti in Array(cespuglio ecc..)
3.Popolare matrice random (5 elementi)
4.Salvare matrice in sessione (serializzare)
5.Ricaricare la matrice dalla sessione
6.Attivare singole celle vuote al click (Link, bottoni o altro)
7.Visualizzare matrice
8.Generare elemento casuale da posizionare
8.Gestire il click sulla cella e posizionare l'elemento
9.Logica app per unire eventuali celle
10.Verifica fine partita altrimenti tornare al punto 4.
-->