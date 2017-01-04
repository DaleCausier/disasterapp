<?php

function IsUserLoggedIn($userID, $accessToken)
{
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
    //setting up sql query to see if the session exists in the database.
    $query = mysqli_query($conn, "SELECT * FROM `session-storage` WHERE UserID = '$userID' AND accessToken = '$accessToken'");
    //if the database returns 1 then a record exists in the database and can return the hidden content.
    if(mysqli_num_rows($query) > 0){
        return true;
    }
    else {
        return false;
    }
    //closing the database connection.
    $conn->close();
    
}

?>