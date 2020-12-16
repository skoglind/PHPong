<?php

    /**
     * Class Playfield
     * @author Fredrik Skoglind, 2020
     */
    class Playfield {
        private $width;
        private $height;

        public function __construct() {
            $this->width = 500;
            $this->height = 500;
        }

        public function render( ...$items ) {
            $z_index = 0;

            echo '<div id="pong" style="',
                  'width: ', $this->width, 'px;',
                  'height: ', $this->height, 'px;',
                  '">';
                
                // Render all game items
                foreach($items as $item) {
                    $item->render($z_index++);
                    unset($item);
                }

            echo '</div>';
        }

    }

?>