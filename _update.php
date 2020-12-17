<?php

    // Author, Fredrik Skoglind, 2020

    /*

        INPUT
            int play [0,1]
            int reset [0,1]

    */

    // Visa alla PHP-Fel
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    // Ladda in klasser
    require_once( 'class/game.php' );
    require_once( 'class/playfield.php' );
    require_once( 'class/item.php' );
    require_once( 'class/paddle.php' );
    require_once( 'class/ball.php' );

    session_start();
    
    // User input
    $playGame = isset( $_GET['play'] ) ? intval($_GET['play']) : 0;
    $resetGame = isset( $_GET['reset'] ) ? intval($_GET['reset']) : 0;
    $keyPress = isset( $_GET['key'] ) ? intval($_GET['key']) : 0;

    // Check if game should be reset
    if($resetGame) { unset($_SESSION[ 'game' ]); }

    // Check Game-session
    $game = isset($_SESSION[ 'game' ]) ? $_SESSION[ 'game' ] : new Game();

    // Check if the game should start,
    if( $playGame == 1) { $game->startGame(); }

    // Keypress
    switch( $keyPress ) {
        case 1: // UP
            $game->movePaddleUp();
            break;
        case -1: // DOWN
            $game->movePaddleDown();
            break;
        default:
            // Do Nothing
    }

    // Update game-logic
    $game->update();

    // Save gamestate to session
    $_SESSION[ 'game' ] = $game;

?>