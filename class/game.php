<?php

    /**
     * Class Game
     * @author Fredrik Skoglind, 2020
     */
    class Game {
        const GAME_MAX_UPDATE = 25;

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