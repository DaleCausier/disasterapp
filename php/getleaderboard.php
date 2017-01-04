<?php

$servername = "ct6014-causier.studentsites.glos.ac.uk";
    $username = "ct6014da_admin";
    $password = "DiyDisasterAdmin!";
    $dbname = "ct6014da_diy-disaster";
$facebookID = $_POST['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//setting up sql query to see if the user exists in the database.
$query = mysqli_query($conn, "SELECT * FROM `scores` ORDER by `highscore` DESC LIMIT 10");
$numberofresults = mysqli_num_rows($query);
?>

<div id="topten">
    <!-- contains the title of the page -->
    <p class="title">LEADERBOARD</p>
    <p id="introduction">Are you the number one plumber?</p>
    <!-- will contain the fetched leaderboard data from php -->

    <!-- creating the html structure of the page ready to populate table 
    content -->
    <table class="scorestable" id="leaderboarddata">
    <tr>
        <th class="tablerank">Rank</th>
        <th class="tablename">User Name</th>      
        <th class="tablescore">Score</th>

    </tr>
    <?php
    //looping through the top 10 leaderboard results and adding them to the table
    if($numberofresults > 0){
        for($i = 1; $i <= $numberofresults; $i++)
        {
            //get the current row
            $row = mysqli_fetch_array($query);
            //add to table 
            ?>
            <tr>
                <td class="datarank"><?php echo $i?></td>
                <td class="dataname"><?php echo $row['userName']?></td>       
                <td class="datascore"><?php echo $row['highscore']?></td>
            </tr>
            <?php
        }
    } else{
        ?>
             <tr>
                <td class="datarank">N/A</td>
                <td class="dataname">N/A</td>       
                <td class="datascore">N/A</td>
            </tr>
            <?php
    }
    ?>
    
    </table>
</div>

<?php
//database query to get the position of the current user so that if they are not in 
//the top 10 positions they can see what position they are in
$getuserposition = mysqli_query($conn, "SELECT x.userID, x.userName, x.highscore, x.rank 
                        FROM (SELECT t.userID, t.userName, t.highscore, @rownum := @rownum + 1 
                        AS rank 
                        FROM `scores` t 
                        JOIN (SELECT @rownum := 0) r 
                        ORDER BY t.highscore DESC) x 
                        WHERE x.userID = '$facebookID'");
//getting the users row with their position
$userposition = mysqli_fetch_array($getuserposition);
//creating a table to store the users position, name and score
?>
<div id="userposition">
    <p class="title" id="userpositiontitle">YOUR POSITION</p>
    <table class="scorestable">
        <tr>
            <th class="tablerank">Rank</th>
            <th class="tablename">User Name</th>      
            <th class="tablescore">Score</th>
        </tr>
        <tr>
            <?php
            if($userposition['rank'] != null && $userposition['userName'] != null && $userposition['highscore'] != null)
            {
                ?>
                <td id="userrank" class="datarank currentuser"><?php echo $userposition['rank']?></td>
                <td class="dataname currentuser"><?php echo $userposition['userName']?></td>       
                <td class="datascore currentuser"><?php echo $userposition['highscore']?></td>
                <?php
            } else {
                ?>
                <td id="userrank" class="datarank currentuser">N/A</td>
                <td class="dataname currentuser">N/A</td>       
                <td class="datascore currentuser">N/A</td>
                <?php
            }
            ?>
        </tr>
    </table>
</div>
<?php
?>
