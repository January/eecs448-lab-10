<?php
$uid = $_POST["users"];
$query = "SELECT * FROM `Posts` WHERE author_id = \"$uid\";";

$mysqli = new mysqli("mysql.eecs.ku.edu", "a974f884", "Removed for privacy reasons",
    "a974f884");
/* check connection */
if ($mysqli->connect_errno)
{
    printf("I messed up somehow: %s\n", $mysqli->connect_error); exit();
}
if ($result = $mysqli->query($query))
{
    $numPosts = mysqli_num_rows($result);
    if ($numPosts <= 0)
    {
        printf("Error: No posts.");
    }
    else
    {
        echo "<table border=\"5\">";
        echo '<tr>';
        echo '<th>Author ID</th>';
        echo '<th>Post ID</th>';
        echo '<th>Content</th>';
        echo '</tr>';
        while ($row = $result->fetch_assoc())
        {
            echo '<tr>';
            echo "<td>" . $row['author_id'] . "</td>";
            echo "<td>" . $row['post_id'] . "</td>";
            echo "<td>" . $row['content'] . "</td>";
            echo '</tr>';
        }
    }
}

?>