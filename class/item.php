<?php

    /**
     * Class Item
     * @author Fredrik Skoglind, 2020
     */
    class Item {
        private $width;
        private $height;
        private $positionX;
        private $positionY;

        public function setPositionX( int $x ) { $this->positionX = $x; }
        public function setPositionY( int $y ) { $this->positionY = $y; }
        public function getPositionX() : int { return $this->positionX; }
        public function getPositionY() : int { return $this->positionY; }
        
        public function setWidth( int $width ) { $this->width = $width; }
        public function setHeight( int $height ) { $this->height = $height; }
        public function getWidth() : int { return $this->width; }
        public function getHeight() : int { return $this->height; }
    }   

?>