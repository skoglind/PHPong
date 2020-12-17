<?php

    /**
     * Class Ball Extends Item
     * @author Fredrik Skoglind, 2020
     */
    class Ball extends Item {
        const BALL_WIDTH = 25;
        const BALL_HEIGHT = 25;
        const BALL_SPEED_X = -8;
        const BALL_SPEED_Y = 0;
        const BALL_POS_X = 225; 
        const BALL_POS_Y = 225; 

        private $speedX = 0;
        private $speedY = 0;

        public function __construct() {
            $this->setWidth( self::BALL_WIDTH );
            $this->setHeight( self::BALL_HEIGHT );
            $this->resetBall();
        }

        public function resetBall() {
            $this->setPositionX( self::BALL_POS_X );
            $this->setPositionY( self::BALL_POS_Y );
        }

        public function startMovement() {
            $this->setSpeedX( self::BALL_SPEED_X );
            $this->setSpeedY( self::BALL_SPEED_Y );
        }

        public function stopMovement() {
            $this->setSpeedX( 0 );
            $this->setSpeedY( 0 );
        }

        public function setSpeedX( int $val ) { $this->speedX = $val; }
        public function setSpeedY( int $val ) { $this->speedY = $val; }
        public function getSpeedX() : int { return $this->speedX; }
        public function getSpeedY() : int { return $this->speedY; }

        public function update() {
            $skipUpdate = false;

            if( ($this->getPositionX() + $this->getSpeedX() + $this->getWidth()) < 0 ) {
                $this->resetBall();
                $skipUpdate = true;
            }

            if(!$skipUpdate) {
                $this->setPositionX( $this->getPositionX() + $this->getSpeedX() );
                $this->setPositionY( $this->getPositionY() + $this->getSpeedY() );
            }
        }

        public function render( int $zindex ) {
            echo '<div class="pong_item ball" style="',
            'z-index: ', $zindex, ';',
            'width: ', $this->getWidth(), 'px;',
            'height: ', $this->getHeight(), 'px;',
            'top: ', $this->getPositionY(), 'px;',
            'left: ', $this->getPositionX(), 'px;',
            '"></div>';
        }
    }   

?>