<?php
$facebookId = $_POST['id'];
$facebookName = $_POST['name'];
$currentScore = $_POST['score'];

    $servername = "ct6014-causier.studentsites.glos.ac.uk";
    $username = "ct6014da_admin";
    $password = "DiyDisasterAdmin!";
    $dbname = "ct6014da_diy-disaster";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    //setting up sql query to see if the user exists in the database.
    $query = mysqli_query($conn, "SELECT * FROM `scores` WHERE userID = '$facebookId'");

    //if the database returns 1 then a record exists in the database
    //therefore the highscore has to be cpmpared to the current score to see if a 
    //new highscore has been set.
    if(mysqli_num_rows($query) > 0){
        $gethighscore = mysqli_query($conn, "SELECT highscore FROM `scores` WHERE userID = '$facebookId'");
        $row = mysqli_fetch_assoc($gethighscore);
        $highscore = $row['highscore'];
        if($highscore != NULL){
            if($currentScore > $highscore)
            {
                $updateHighscore = "UPDATE `scores` SET highscore = '$currentScore' WHERE userID = '$facebookId'";
                if($conn->query($updateHighscore) === TRUE){
                    echo "New high score!";
                }
                else {
                    echo "Error: " . $updateHighscore . "<br>" . $conn->error;
                }
            } else{
                echo $highscore;
            }
        }
    }
    //the user doesnt have a record yet so insert a record into the database.
    else {
        $insertUser = "INSERT INTO `scores` (userID, userName, highscore) VALUES ('$facebookId', '$facebookName', '$currentScore')";
        if($conn->query($insertUser) === TRUE){
            echo "New high score!";
        }
        else {
            echo "Error: " . $insertUser . "<br>" . $conn->error;
        }
    }
    //closing the database connection.
    $conn->close();

?>