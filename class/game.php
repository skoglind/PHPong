<?php

    /**
     * Class Game
     * @author Fredrik Skoglind, 2020
     */
    class Game {
        const GAME_MAX_UPDATE = 25;
        const PADDLE_MOVE = 15;

        private $paddle;
        private $ball;
        private $playfield;
        private $lastUpdate;

        public function __construct() {
            $this->playfield = new Playfield();
            $this->paddle = new Paddle();
            $this->ball = new Ball();
            $this->lastUpdate = $this->milliseconds();
        }

        public function movePaddleUp() {
            $boundTop = 0;

            $this->paddle->moveY( -(self::PADDLE_MOVE) );

            // Check if paddle is within bounds
            if($this->paddle->getPositionY() < $boundTop) { $this->paddle->setPositionY($boundTop); }
        }

        public function movePaddleDown() {
            $boundBottom = $this->playfield->getBounds()['height'];

            $this->paddle->moveY( self::PADDLE_MOVE );

            // Check if paddle is within bounds
            if($this->paddle->getPositionY() + $this->paddle->getHeight() > $boundBottom) { $this->paddle->setPositionY($boundBottom - $this->paddle->getHeight()); }
        }

        public function startGame() {
            $this->ball->startMovement();
        }

        public function update() {
            // Get time difference since last update
            $timeSinceLast = $this->milliseconds() - $this->lastUpdate;

            /* Check so the game doesn't update to often */
                if( $timeSinceLast >= self::GAME_MAX_UPDATE ) {
                    $this->lastUpdate = $this->milliseconds();

                    // Collision check
                    if( $this->ball->collide( $this->paddle ) ) { 
                        $this->ball->setPositionX( ($this->paddle->getPositionX() + $this->paddle->getWidth()) + 1 ); // Make shure we're not inside the paddle
                        $this->ball->setSpeedX( -($this->ball->getSpeedX()) ); // Bounce back

                        // Bounce Y-axis, if in a straight line randomize a bit
                        if($this->ball->getSpeedY() == 0) {
                            $this->ball->setSpeedY( rand(-5, 5) );
                        }
                    }

                    // Check if ball is within bounds of field, and bounce
                    $boundTop = 0;
                    $boundBottom = $this->playfield->getBounds()['height'];
                    $boundRight = $this->playfield->getBounds()['width'];
                    if( $this->ball->getPositionY() <= $boundTop ) { $this->ball->setSpeedY( -($this->ball->getSpeedY()) ); }
                    if( $this->ball->getPositionY() + $this->ball->getHeight() >= $boundBottom ) { $this->ball->setSpeedY( -($this->ball->getSpeedY()) ); }
                    if( $this->ball->getPositionX() + $this->ball->getWidth() >= $boundRight ) { $this->ball->setSpeedX( -($this->ball->getSpeedX()) ); }

                    // Do game updates
                    $this->ball->update();
                }
            /* #### */
        }

        public function render() {
            $this->playfield->render( $this->paddle, $this->ball );
        }

        private function milliseconds() : int {
            return round(microtime(true) * 1000);
        }
    }

?>