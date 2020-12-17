<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <title> PONG </title>
        <meta name="author" value="Fredrik Skoglind, 2020" />
        <link rel="stylesheet" href="standard.css" />
        <script type="text/javascript" src="pong.js"></script>
    </head>
    <body>
        <div id="game"></div>
        <div class="pong_menu">
            <button onclick="loadURL('_update.php?play=1', callbackButton);">Starta</button>
            <button onclick="loadURL('_update.php?reset=1', callbackButton);">Avsluta</button>
        </div>
    </body>
</html>