<?php
class Pawn {
        private $name;
        private $level;
        private $image_url;

        public function __construct($name, $level) {
            $this->name = $name;
            $this->level = $level;
            $this->image_url = $level . ".png";
        }

        public function get_name() {
            return $this->name;
        }

        public function get_level() {
            return $this->level;
        }

        public function get_image_url() {
            return $this->image_url;
        }
    }
?>