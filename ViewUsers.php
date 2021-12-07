<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a974f884", "Removed for privacy reasons",
    "a974f884");
/* check connection */
if ($mysqli->connect_errno) {
    printf("I messed up somehow: %s\n", $mysqli->connect_error); exit();
}

$query = "SELECT user_id FROM Users;";
if ($result = $mysqli->query($query))
{
    $numUsers = mysqli_num_rows($result);
    if($numUsers <= 0)
    {
        printf("Error: No users.");
    }
    else
    {
        while($row = $result->fetch_assoc()){
            $userArray[] = $row['user_id'];
        }
        echo "<table border=\"5\">";
        for ($i = 0; $i < $numUsers; $i++)
        {
            echo("<td>");
            echo($userArray[$i]);
            echo("</td>");
        }
        echo("</table>");
    }
}
else
{
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}
?>
