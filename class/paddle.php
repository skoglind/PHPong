<?php

    /**
     * Class Paddle Extends Item
     * @author Fredrik Skoglind, 2020
     */
    class Paddle extends Item {
        const PADDLE_WIDTH = 100;
        const PADDLE_HEIGHT = 25;

        public function __construct() {
            $this->setWidth( self::PADDLE_WIDTH );
            $this->setHeight( self::PADDLE_HEIGHT );
            $this->setPositionX( 50 );
            $this->setPositionY( 300 );
        }

        public function moveY( int $val ) {
            $this->setPositionY( $this->getPositionY() + $val );
        }

        public function render( int $zindex ) {
            echo '<div class="pong_item paddle" style="',
            'z-index: ', $zindex, ';',
            'width: ', $this->getWidth(), 'px;',
            'height: ', $this->getHeight(), 'px;',
            'top: ', $this->getPositionY(), 'px;',
            'left: ', $this->getPositionX(), 'px;',
            '"></div>';
        }
    }   

?>