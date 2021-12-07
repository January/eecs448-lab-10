<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a974f884", "Removed for privacy reasons",
    "a974f884");
/* check connection */
if ($mysqli->connect_errno)
{
    printf("I messed up somehow: %s\n", $mysqli->connect_error); exit();
}
foreach($_POST as $key => $value) {
    $query = "DELETE from Posts WHERE post_id = '$key'";
    $mysqli->query($query);
    echo ("<br>Post deleted: ". $key);
}
?>