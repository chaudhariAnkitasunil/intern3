<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div style="text-align:center; padding:15%;">
        <p style="font-size:50px; font-weight:bold;">
            Welcome to the homepage
            <?php
            if (isset($_SESSION['email'])) {
                echo $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $_SESSION['email'] . "'");
                if ($query) {
                    $row = mysqli_fetch_assoc($query);
                    echo "<br>First Name: " . $row['fName'];
                    echo "<br>Last Name: " . $row['lName'];
                } else {
                    echo "<br>Error: " . mysqli_error($conn);
                }
            }
            ?>
        </p>
    </div>
</body>
</html>