<head>
    <title>Title</title>
</head>
<body>

<form action="ViewUserPostsBackend.php" method="POST">
    <label for="users">Select user:</label>
    <select name="users" id="users">
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
                        echo "<option value= " . $row['user_id'] . " > " . $row['user_id'] . "</option>";
                    }
                }
            }
            else
            {
                echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
            }
        ?>
    </select>
    <input type="submit" value="Submit">
</form>
</body>