<?php
$uid = $_POST["uid"];
$post = $_POST["textfield"];
if ($post == "" || ctype_space($post)) // Checks if it's empty or just whitespace characters.
{
    printf("Error: Post is empty.");
}
else
{
    $mysqli = new mysqli("mysql.eecs.ku.edu", "a974f884", "Removed for privacy reasons",
        "a974f884");
    /* check connection */
    if ($mysqli->connect_errno) {
        printf("I messed up somehow: %s\n", $mysqli->connect_error); exit();
    }

    $query = "SELECT user_id FROM Users WHERE user_id = '" . $mysqli->escape_string($uid) . "';";
    if ($result = $mysqli->query($query))
    {
        if(mysqli_num_rows($result) == 0)
        {
            printf("Error: User doesn't exist!");
        }
        else
        {
            $addPost = "INSERT INTO Posts(content, author_id) VALUES('" . $mysqli->escape_string($post) . "', '" . $mysqli->escape_string($uid) . "');";
            if($mysqli->query($addPost))
            {
                printf("Success, post made!");
            }
            else
            {
                echo "Error: " . $addPost . "<br>" . mysqli_error($mysqli);
            }
        }
    }
    else
    {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
    $mysqli->close();
}
?>
