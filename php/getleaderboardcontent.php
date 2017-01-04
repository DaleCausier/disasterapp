<?php
include ("functions.php");

$UserID = $_POST['userID'];
$AccessToken = $_POST['accesstoken'];

$isLoggedIn = IsUserLoggedIn($UserID, $AccessToken);
//if the IsUserLoggedIn method returns true the content can be shown, otherwise the user is not logged in.
if ($isLoggedIn > 0)
{
    ?>
    <!-- container for the leaderboard page -->
    <div id="leaderboardcontainer">
        <div id="leaderboard">

        </div>
        <div id="buttoncontainer"><p id="menubutton">MENU</p></div>
    </div>
    <?php
} else {
    echo " Not Logged in : ${isLoggedIn}";
}
?>