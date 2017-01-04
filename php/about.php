<?php
include ("functions.php");

$UserID = $_POST['userID'];
$AccessToken = $_POST['accesstoken'];

$isLoggedIn = IsUserLoggedIn($UserID, $AccessToken);
//if the IsUserLoggedIn method returns true the content can be shown, otherwise the user is not logged in.
if ($isLoggedIn > 0)
{
    ?>
    <!-- container for the about page -->
    <div id="container">
        <p id="title">ABOUT</p>
        <p id="greeting">Hello! Welcome to D.I.Y Disaster's information section, Type Game, Score, Aim or Logout to find out more about the game. </p>
        <img id="diydave" src="../images/DIY Dave.png"/>
        <div id='bot-div'>
            <span id='response'></span>
            <span id="inputcontainer"><input id='chat' type='text'/></span>
        </div>
        <div id="menubutton"><p>MENU</p></div>
    </div>
    <?php
} else {
    echo " Not Logged in : ${isLoggedIn}";
}
?>