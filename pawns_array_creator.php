<?php
    session_start();
    require_once('pawn.php');

    $pawns_array = array();

    $erba = new Pawn("erba", 1, 5);
    $cespuglio = new Pawn("cespuglio", 2, 10);
    $albero = new Pawn("albero",3, 20);
    $capanna = new Pawn("capanna", 4, 30);
    $casa = new Pawn("casa", 5, 40);
    $dimora = new Pawn("dimora", 6, 50);
    $castello = new Pawn("castello", 7, 75);
    $castello_galleggiante = new Pawn("castello galleggiante", 8, 100);
    $castello_triplo = new Pawn("castello triplo", 9, 150);

    array_push($pawns_array, NULL, $erba, $cespuglio, $albero, $capanna, $casa, $dimora, $castello, $castello_galleggiante, $castello_triplo);
    $_SESSION['pawns_array'] = serialize($pawns_array);

    print_r($_SESSION['pawns_array']);
?>