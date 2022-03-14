<?php include '/etc/capstone/database.php';
        // DB connection
        $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);

        // Check connection
        if ($mysqli -> connect_errno) {
          echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
          exit();
        }
?> 
