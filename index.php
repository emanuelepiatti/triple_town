<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Triple town</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css.css"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="triple_town.js"></script>
</head>
<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$array_for_session[0][0] = $valore;

for ($i=0; $i < 6; $i++) { 
    # popolare l array bidimensionale randomicamente se vuoto usare "0"
}

$_SESSION['grid'] = serialize($array_for_session);

print_r($_SESSION['grid']);

    class element {
        private $name;
        private $level;
        private $points;

        public function __construct($name, $level) {
            $this->name = $name;
            $this->level = $level;
        }
        public function get_name() {
            return $this->name;
        }
        public function get_level() {
            return $this->level;
        }
    }

    $elements_list = array("erba", "cespuglio", "albero", "capanna", "casa", "dimora", "castello", "castello_galleggiante", "castello_triplo");
    $elements_objects = array();
    $level_counter = 1;

    foreach ($elements_list as $element){
        $object_game = new element($element, $level_counter); 
        array_push($elements_objects, $object_game);

        $level_counter++;
    }

    function printTable() {
    echo "<table style='width:30%'>";
    for ($row=0; $row < 6 ; $row++) { 
        echo "<tr>";
        for ($column = 0; $column  < 6 ; $column++) { 
            $div_id = $row . "-" .$column; 
            echo "<td> <div id= $div_id class='dropzone'>
            </div> </td>";
        }
    echo "</tr>";
    }
    }
    
?>

<img id="icon" src="icons/albero.png">

<?php
printTable();
?>

<script>
    $("#icon").draggable({
        revert: 'invalid'
    });

    $(".dropzone").droppable({
    accept: function (item) {
        return $(this).data("color") == item.data("color");
    },
    drop: function (event, ui) {
        var $this = $(this);
        ui.draggable.position({
            my: "center",
            at: "center",
            of: $this,
            using: function (pos) {
                $(this).animate(pos, 200, "linear");
            }
        }); 
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




