<!--
Something Phishy
Capstone IT4970
3/6/22
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="analyticsSS.css">
        <title>QR Code Analytics</title>
        <link rel="icon" type="image/x-icon" href="/images/favicon.png">
        <meta charset="utf-8">

</head>

<body>
    <div class="contents">
        <h1>QR Scan Analytics</h1>
    <div class="contents">
        <h3>Scanner Age Analytics</h3>
        <table>
            <tr>
                <th>Scanner Age</th>
                <th>Number of Scans</th>
            </tr>
            <tr>
                <td>13-17</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sql13 = "SELECT * FROM surveydata WHERE age BETWEEN 13 AND 17";
                if ($result13 = mysqli_query($mysqli, $sql13)){
                    $rowcount13 = mysqli_num_rows( $result13 );
                    echo "$rowcount13";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>18-22</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sql18 = "SELECT * FROM surveydata WHERE age BETWEEN 18 AND 22";
                if ($result18 = mysqli_query($mysqli, $sql18)){
                    $rowcount18 = mysqli_num_rows( $result18 );
                    echo "$rowcount18";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>23-34</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sql23 = "SELECT * FROM surveydata WHERE age BETWEEN 23 AND 34";
                if ($result23 = mysqli_query($mysqli, $sql23)){
                    $rowcount23 = mysqli_num_rows( $result23 );
                    echo "$rowcount23";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>35-44</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sql35 = "SELECT * FROM surveydata WHERE age BETWEEN 35 AND 44";
                if ($result35 = mysqli_query($mysqli, $sql35)){
                    $rowcount35 = mysqli_num_rows( $result35 );
                    echo "$rowcount35";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>45-54</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sql45 = "SELECT * FROM surveydata WHERE age BETWEEN 45 AND 54";
                if ($result45 = mysqli_query($mysqli, $sql45)){
                    $rowcount45 = mysqli_num_rows( $result45 );
                    echo "$rowcount45";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>55-64</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sql55 = "SELECT * FROM surveydata WHERE age BETWEEN 55 AND 64";
                if ($result55 = mysqli_query($mysqli, $sql55)){
                    $rowcount55 = mysqli_num_rows( $result55 );
                    echo "$rowcount55";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>65 and older</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sql65 = "SELECT * FROM surveydata WHERE age BETWEEN 65 AND 100";
                if ($result65 = mysqli_query($mysqli, $sql65)){
                    $rowcount65 = mysqli_num_rows( $result65 );
                    echo "$rowcount65";
                }
                ?>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <hr>
    <div class="contents">
        <h3>Scanner Education Analytics</h3>
        <table>
            <tr>
                <th>Scanner Highest Level of Education</th>
                <th>Number of Scans</th>
            </tr>
            <tr>
                <td>Didn't Complete High School</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqllessthanhs = "SELECT * FROM surveydata WHERE highesteducation='Lessthanhs'";
                if ($resultlessthanhs = mysqli_query($mysqli, $sqllessthanhs)){
                    $rowcountlessthanhs = mysqli_num_rows( $resultlessthanhs );
                    echo "$rowcountlessthanhs";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>High School Diploma</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqlhighschool = "SELECT * FROM surveydata WHERE highesteducation='Hs'";
                if ($resulthighschool = mysqli_query($mysqli, $sqlhighschool)){
                    $rowcounthighschool = mysqli_num_rows( $resulthighschool );
                    echo "$rowcounthighschool";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Associates Degree</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqlassociate = "SELECT * FROM surveydata WHERE highesteducation='Associate'";
                if ($resultassociate = mysqli_query($mysqli, $sqlassociate)){
                    $rowcountassociate = mysqli_num_rows( $resultassociate );
                    echo "$rowcountassociate";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Bachelors Degree</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqlbachelor = "SELECT * FROM surveydata WHERE highesteducation='Bachelor'";
                if ($resultbachelor = mysqli_query($mysqli, $sqlbachelor)){
                    $rowcountbachelor = mysqli_num_rows( $resultbachelor );
                    echo "$rowcountbachelor";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Masters Degree</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqlmaster = "SELECT * FROM surveydata WHERE highesteducation='Master'";
                if ($resultmaster = mysqli_query($mysqli, $sqlmaster)){
                    $rowcountmaster = mysqli_num_rows( $resultmaster );
                    echo "$rowcountmaster";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Docorate Degree</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqldoctor = "SELECT * FROM surveydata WHERE highesteducation='Doctor'";
                if ($resultdoctor = mysqli_query($mysqli, $sqldoctor)){
                    $rowcountdoctor = mysqli_num_rows( $resultdoctor );
                    echo "$rowcountdoctor";
                }
                ?>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <th>Scanner IT Education</th>
                <th>Number of Scans</th>
            </tr>
            <tr>
                <td>Received IT security training</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqlyesittraining = "SELECT * FROM surveydata WHERE iteducation='Yesittraining'";
                if ($resultyesittraining = mysqli_query($mysqli, $sqlyesittraining)){
                    $rowcountyesittraining = mysqli_num_rows( $resultyesittraining );
                    echo "$rowcountyesittraining";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Have not received IT security training</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqlnoittraining = "SELECT * FROM surveydata WHERE iteducation='Noittraining'";
                if ($resultnoittraining = mysqli_query($mysqli, $sqlnoittraining)){
                    $rowcountnoittraining = mysqli_num_rows( $resultnoittraining );
                    echo "$rowcountnoittraining";
                }
                ?>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <hr>
    <div class="contents">
        <h3>Scanner Habit Analytics</h3>
        <table>
            <tr>
                <th>Where QR scans usually takes place</th>
                <th>Number of Scans</th>
            </tr>
            <tr>
                <td>Resturants</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqlresturant = "SELECT * FROM surveydata WHERE qrlocation='Resturant'";
                if ($resultresturant = mysqli_query($mysqli, $sqlresturant)){
                    $rowcountresturant = mysqli_num_rows( $resultresturant );
                    echo "$rowcountresturant";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Retail stores</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqlretail = "SELECT * FROM surveydata WHERE qrlocation='Retail'";
                if ($resultretail = mysqli_query($mysqli, $sqlretail)){
                    $rowcountretail = mysqli_num_rows( $resultretail );
                    echo "$rowcountretail";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Physical Advertisments</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqlphysical = "SELECT * FROM surveydata WHERE qrlocation='Physicaladvert'";
                if ($resultphysical = mysqli_query($mysqli, $sqlphysical)){
                    $rowcountphysical = mysqli_num_rows( $resultphysical );
                    echo "$rowcountphysical";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Digital Advertisments</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqldigital = "SELECT * FROM surveydata WHERE qrlocation='Digitaladvert'";
                if ($resultdigital = mysqli_query($mysqli, $sqldigital)){
                    $rowcountdigital = mysqli_num_rows( $resultdigital );
                    echo "$rowcountdigital";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Other</td>
                <td>
                <?php include '/etc/capstone/database.php';
                // DB Con
                $mysqli = new mysqli($HOST,$USER,$DB_PSWD,$DB_NAME);
                $sqlother = "SELECT * FROM surveydata WHERE qrlocation='Other'";
                if ($resultother = mysqli_query($mysqli, $sqlother)){
                    $rowcountother = mysqli_num_rows( $resultother );
                    echo "$rowcountother";
                }
                ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
