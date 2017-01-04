<?php
include ("functions.php");

$UserID = $_POST['userID'];
$AccessToken = $_POST['accesstoken'];

$isLoggedIn = IsUserLoggedIn($UserID, $AccessToken);
//if the IsUserLoggedIn method returns true the content can be shown, otherwise the user is not logged in.
if ($isLoggedIn > 0)
{
    ?>
    <div id="instructionspopup">
        <div class="instructioncontainer">
            <div class="imagecontainer">
                <img class="instructionimage" src="../images/pipe-burst.png"/>
            </div>
            <div class="instructiontext">
                Pipe intersections will start to burst
            </div>        
        </div>
        <div class="instructioncontainer">
            <div class="imagecontainer">
                <img class="instructionimage" src="../images/pipes.png"/>
            </div>
            <div class="instructiontext">
                Click on the bursting pipe to diffuse them
            </div>   
        </div>
        <div id="startbutton"><p>START</p></div>
    </div>

    <div id="gamecontainer">
        <div id="gameinformation">
            <p id="scoretext">Score:&nbsp;</p>
            <div id="scorecontainer">
            </div>
        </div>
        <div id="pipecontainer">
            <div class="pipe">
                <div class="1 hitpoint"></div>
                <div class="2 hitpoint"></div>
                <div class="3 hitpoint"></div>
            </div>
            <div class="pipe">
                <div class="4 hitpoint"></div>
                <div class="5 hitpoint"></div>
                <div class="6 hitpoint"></div>
            </div>
            <div class="pipe">
                <div class="7 hitpoint"></div>
                <div class="8 hitpoint"></div>
                <div class="9 hitpoint"></div>
            </div>
        </div>
        <div id="statusupdate">
            <p id="result"></p>
        </div> 
    </div>

    <div id="gameoverpopup">
        <p id="gameover">GAME OVER</p>
        <div class="scorecontainer">
            <p class="scoretitle">Your Score</p>
            <div class="scorediv" id="currentscore"></div>
        </div>
        <div class="scorecontainer">
            <p class="scoretitle">High Score</p>
            <div class="scorediv" id="highscore"></div>
            <p id="highscorealert">New high score!</p>
        </div>
        <div id="buttoncontainer">
            <div id="retrybutton"><p>RETRY</p></div>
            <div id="menubutton"><p>MENU</p></div>
        </div>
    </div>
    <?php
} else {
    echo " Not Logged in : ${isLoggedIn}";
}
?>