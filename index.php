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

    class element {
        private $name;
        private $level;
        private $points;

        public function __construct($name, $level, $points) {
            $this->name = $name;
            $this->level = $level;
            $this->points = $points;
        }
        public function get_name() {
            return $this->name;
        }
        public function get_level() {
            return $this->level;
        }
        public function get_points() {
            return $this->points;
        }
    }

    $elements_list = array("erba", "cespuglio", "albero", "capanna", "casa", "dimora", "castello", "castello_galleggiante", "castello_triplo");
    $elements_objects = array();
    $level_counter = 1;
    $points_counter = 10;

    foreach ($elements_list as $element){
        $object_game = new element($element, $level_counter, $points_counter); 
        array_push($elements_objects, $object_game);

        $level_counter++;
        $points_counter = $points_counter + 10;
    }
    
?>

   <table style="width:30%">
    <?php
    for ($row=0; $row < 6 ; $row++) { 
        echo "<tr>";
        for ($column = 0; $column  < 6 ; $column++) { 
            $div_id = $row . "-" .$column; 
            echo "<td> <div id= $div_id class='dropzone'></div> </td>";
        }
    echo "</tr>";
    }

?>

<img id="icon" src="icons/albero.png">

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






