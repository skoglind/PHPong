// AJAX-Function to load file
function loadURL( URL, callbackFunction ) {
    var httpRequest = new XMLHttpRequest();

    httpRequest.onreadystatechange = function() {
        if (httpRequest.readyState == XMLHttpRequest.DONE && httpRequest.status == 200) {
            callbackFunction(httpRequest.responseText);
        }
    };

    httpRequest.open("GET", URL, true);
    httpRequest.send();
}

/* Render Game */
    function renderGame() { loadURL("_render.php", callbackRenderGame); }
    function callbackRenderGame( html ) {
        console.log( 'RENDER' );
        document.getElementById("game").innerHTML = html;
    }
/* ### */

/* Update Game */
    function updateGame() { loadURL("_update.php", callbackUpdateGame); }
    function callbackUpdateGame( html ) { console.log( 'UPDATE' ); }
/* ### */

// Regular Callback for buttons
function callbackButton() { console.log( 'BUTTONPRESS' ); }

// Set timers
window.setInterval( updateGame, 50 );
window.setInterval( renderGame, 50 );

// Update and Render game instantly
updateGame();
renderGame();