<!DOCTYPE html>
<html>
    <head>
        <title>Survey</title>
        <link rel="stylesheet" href="surveySS.css">
    </head>

    <body>
        <?php include '/etc/capstone/database.php';
        // DB connection
        $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);

        // Check connection
        if ($mysqli -> connect_errno) {
          echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
          exit();
        }
        ?> 
        <section class="survey-body">
            <h1>Website Survey</h1>
            <form name="submitForm" action="/thankYou.html" method="post" required>
                <label class="required" for="age">Please enter your age:</label></br>
                <input type="number" id="age" name="age" min="13" max="150" required></br></br>
                <label class="required" for="gender">Select your gender:</label></br>
                <select name="gender" required>
                    <option disabled selected value>------</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select></br></br>
                <label class="required" for="email">Enter your email:</label></br>
                <input type="email" id="email" name="email" required></br></br>
                <label class="required" for="feedback">Please give us some feedback about the game:</label></br>
                <textarea name="feedback" required></textarea></br></br>
                <a href="/thankYou.html">
                    <input type="submit" value="Submit" id="surveySubmit">
                </a>
            </form>
    </body>
</html>