<!DOCTYPE html>
<html>
    <head>
        <title>Survey</title>
        <link rel="stylesheet" href="surveySS.css">
        <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    </head>

    <body>
        <section class="survey-body">
            <h1>Website Survey</h1>
            <?php include '/etc/capstone/database.php';
            include '/etc/capstone/value.php';
            
            // DB connection
            $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);

            // Check connection
            if ($mysqli -> connect_errno) {
              echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
              exit();
            }

            // Insert statement
            $sql = "INSERT INTO surveydata (age, highesteducation, iteducation, qrlocation, email, feedback) VALUES (?, ?, ?, ?, AES_ENCRYPT(?, '$key'), ?)";

            // Prepare insert statement
            if($statement = mysqli_prepare($mysqli, $sql)){
                mysqli_stmt_bind_param($statement, "isssss", $age, $highesteducation, $iteducation, $qrlocation, $email, $feedback);

                // Form parameters
                $age = $_REQUEST['age'];
                $highesteducation = $_REQUEST['highesteducation'];
                $iteducation = $_REQUEST['iteducation'];
                $qrlocation = $_REQUEST['qrlocation'];
                $email = $_REQUEST['email'];
                $feedback = $_REQUEST['feedback'];

                // Duplicate email check
                $dupcheck = mysqli_query($mysqli, "SELECT AES_DECRYPT(email, '$key') FROM surveydata WHERE email='$email'");
                if(mysqli_num_rows($dupcheck) > 0){
                    echo "<h1>Email already submitted, please submit a unique email address!</h1>";
                    echo "<div align='center'><a href='/survey.html'>Click here to go back</a></div>";
                    exit();
                }

                // Execute prepared insert statement
                if(mysqli_stmt_execute($statement)){
                    echo "<h1>Thank you for submitting your information. Winner of the giftcard will be chosen by 5/9/22</h1>";
                    echo "<div align='center'><a href='/analytics.php'>Click here to see our project analytics!</a></div>";
                } else{
                    echo "Please enter a unique email address";
                    echo "<div align='center'><a href='/survey.html'>Click here to go back</a></div>";
                }
            } else{
                echo "There was an error preparing your information: $sql. " . mysqli_error($mysqli);
            }
            mysqli_stmt_close($statement);
            mysqli_close($mysqli);
            ?>
    </body>
</html>
