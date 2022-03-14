<!DOCTYPE html>
<html>
    <head>
        <title>Survey</title>
        <link rel="stylesheet" href="surveySS.css">
    </head>

    <body>
        <section class="survey-body">
            <h1>Website Survey</h1>
            <?php include '/etc/capstone/database.php';
            // DB connection
            $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);

            // Check connection
            if ($mysqli -> connect_errno) {
              echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
              exit();
            }

            // Insert statement
            $sql = "INSERT INTO surveydata (age, gender, email, feedback) VALUES (?, ?, ?, ?)";

            // Prepare insert statement
            if($statement = mysqli_prepare($mysqli, $sql)){
                mysqli_stmt_bind_param($statement, "isss", $age, $gender, $email, $feedback);

                // Form parameters
                $age = $_REQUEST['age'];
                $gender = $_REQUEST['gender'];
                $email = $_REQUEST['email'];
                $feedback = $_REQUEST['feedback'];

                // Duplicate email check
                $dupcheck = mysqli_query($mysqli, "SELECT * FROM surveydata WHERE email='$email'");
                if(mysqli_num_rows($dupcheck) > 0){
                    echo "<h1>Email already submitted, please submit a unique email address!</h1>";
                    echo "<div align='center'><a href='/survey.html'>Click here to go back</a></div>";
                    exit();
                }

                // Execute prepared insert statement
                if(mysqli_stmt_execute($statement)){
                    echo "<h1>Thank you for submitting your information. Winners of the Giftcard will be chosen by 5$
                } else{
                    echo "There was an error submitting your information: $sql." . mysqli_error($mysqli);
                }
            } else{
                echo "There was an error preparing your information: $sql. " . mysqli_error($mysqli);
            }
            mysqli_stmt_close($statement);
            mysqli_close($mysqli);
            ?>
    </body>
</html>
