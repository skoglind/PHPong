<?php

    /**
     * Class Game
     * @author Fredrik Skoglind, 2020
     */
    class Game {
        private $paddle;
        private $ball;
        private $playfield;

        public function __construct() {
            $this->playfield = new Playfield();
            $this->paddle = new Paddle();
            $this->ball = new Ball();
        }

        public function update() {
            $this->ball->update();
        }

        public function render() {
            $this->playfield->render( $this->paddle, $this->ball );
        }
    }

?>