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

print_r($castello_triplo);


