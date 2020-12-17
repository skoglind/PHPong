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

        public function collide( Item $itemB ) : bool {
            // Preload data from Item A
            $itemA_X = $this->getPositionX();
            $itemA_Y = $this->getPositionY();
            $itemA_Width = $this->getWidth();
            $itemA_Height = $this->getHeight();

            // Preload data from Item B
            $itemB_X = $itemB->getPositionX();
            $itemB_Y = $itemB->getPositionY();
            $itemB_Width = $itemB->getWidth();
            $itemB_Height = $itemB->getHeight();

            // Check for collision
            if( $itemA_X < ($itemB_X + $itemB_Width) &&
                ($itemA_X + $itemA_Width) > $itemB_X &&
                $itemA_Y < ($itemB_Y + $itemB_Height) &&
                ($itemA_Y + $itemA_Height) > $itemB_Y) {
                return true;
            }

            return false;
        }
    }   

?>