<?php

$accesstoken = $_POST['accesstoken'];
$userId = $_POST['userID'];

echo $accesstoken;
echo $userId;

storeSessionDetails($accesstoken, $userId);

function storeSessionDetails($ACCESSTOKEN, $USERID){

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

    $sql = "INSERT INTO `session-storage` (UserID, accessToken) VALUES ('$USERID', '$ACCESSTOKEN')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();  
}

?>