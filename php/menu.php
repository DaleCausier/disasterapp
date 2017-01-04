<?php
include ("functions.php");

$UserID = $_POST['userID'];
$AccessToken = $_POST['accesstoken'];

$isLoggedIn = IsUserLoggedIn($UserID, $AccessToken);
//if the IsUserLoggedIn method returns true the content can be shown, otherwise the user is not logged in.
if ($isLoggedIn > 0)
{
    //echo " logged in : ${isLoggedIn}";
    ?>
    <div id="menupage">
        <header class="roof">
            <div id="headertext">
                <h1 class="diy">D.I.Y</h1>
                <span><p class="disaster">DISASTE</p></span><span><p id="rotatedcharacter" class="disaster">R</p></span>
            </div>
        </header>
        <main class="contentcontainer">
            <div id="pictureframe">
                <img id="pictureframeimg" src="../images/pictureframe.png" alt="image of a picture frame"/>
            </div>
            <nav id="mainnavigation">
                <div class="menubuttoncontainer">
                    <div id="playbutton" class="lefttilt">
                        <p id="playclick">PLAY</p>
                    </div>
                    <div class="lefttilt brownbar"></div>
                    <div class="shadowcontainer">
                        <div class="shadowbarright"></div>
                    </div>
                </div>
                <div class="menubuttoncontainer">
                    <div class="menubuttons righttilt">
                        <p id="leaderboardbutton">LEADERBOARD</p>
                    </div>
                    <div class="righttilt brownbar"></div>
                    <div class="shadowcontainer">
                        <div class="shadowbarleft"></div>
                    </div>
                </div>
                <div class="menubuttoncontainer">
                    <div class="menubuttons lefttilt">
                        <p id="aboutbutton">ABOUT</p>
                    </div>
                    <div class="lefttilt brownbar"></div>
                    <div class="shadowcontainer">
                        <div class="shadowbarright"></div>
                    </div>
                </div>
            </nav>
            <div id="skirtingboards"></div>
            <img id="paintbucket" src="../images/paint-bucket-logout.png"/>
            <footer class="floor"></footer>
        </main>
    </div>
    <?php
} else {
    echo " Not Logged in : ${isLoggedIn}";
}
?>