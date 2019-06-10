<?php
class Pawn {
        private $name;
        private $level;
        private $image_url;
        private $point;

        public function __construct($name, $level, $point) {
            $this->name = $name;
            $this->level = $level;
            $this->image_url = $level . ".png";
            $this->point = $point;
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

        public function get_points() {
            return $this->point;
        }
    }
?>