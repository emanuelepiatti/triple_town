<?php
    require_once('pawn.php');
    session_start();
    $grid = unserialize($_SESSION['grid']);
    $pawns_array = unserialize($_SESSION['pawns_array']);  
    
    echo "<table id='table'>";
    for ($row=0; $row < 5 ; $row++) { 
        echo "<tr>";
        for ($column = 0; $column  < 5 ; $column++) { 
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
?>
    