<?php
    include '/etc/capstone/database.php';
    // DB connection
    $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }

    $location = mysqli_real_escape_string($conn, $_POST['location']);

    if (strlen($times) > 200000) {  $times = "";    }

    $sql = "INSERT INTO locationlist (location);

    if ($conn->query($sql) === TRUE) {
        echo "Page saved!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
