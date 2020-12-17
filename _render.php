<?php

    // Author, Fredrik Skoglind, 2020

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

    // Check Game-session
    $game = isset($_SESSION[ 'game' ]) ? $_SESSION[ 'game' ] : null;

    // Check if game exists and render
    if( !is_null($game) ) { $game->render(); }
    
?>