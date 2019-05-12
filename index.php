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
<?php

    class element {
        private $name;
        private $level;

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

    //$elements_list = array("erba", "cespuglio", "albero", "capanna", "casa", "dimora", "castello", "castello galleggiante", "castello triplo");

    $erba = new element("erba", 1);
    $cespuglio = new element("cespuglio", 2);
    $albero = new element("albero", 3);
    $capanna = new element("capanna", 4);
    $casa = new element("casa", 5);
    $dimora = new element("dimora", 6);
    $castello = new element("castello", 7);
    $castello_galleggiante = new element("castello galleggiante", 8);
    $castello_triplo = new element("castello triplo", 9);

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






