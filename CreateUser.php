<?php
$uid = $_POST["uid"];
if ($uid == "" || ctype_space($uid)) // Checks if it's empty or just whitespace characters.
{
    printf("Error: User ID is empty.");
}
else
{
    $mysqli = new mysqli("mysql.eecs.ku.edu", "a974f884", "Removed for privacy reasons",
        "a974f884");
    /* check connection */
    if ($mysqli->connect_errno) {
        printf("I messed up somehow: %s\n", $mysqli->connect_error); exit();
    }
    $query = "INSERT INTO Users(user_id) VALUES('" . $mysqli->escape_string($uid) . "');"; // Prevent SQL injection while we're at it
    if ($mysqli->query($query))
    {
        printf("Success, user created!");
    }
    else // Triggers automatically for duplicates.
    {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
    $mysqli->close();
}
?>
