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
        <meta charset="utf-8">

</head>

<body>
    <div class="contents">
        <h1>QR Scan Analytics</h1>
        <h3>Location Analytics</h3>
        <p>Click <a href=locations.html>HERE</a> to see a full map of our QR code locations.</p>
        <table>
            <tr>
                <th>Scan Location</th>
                <th>Number of Scans</th>
            </tr>
            <tr>
                <td>Example</td>
                <td>Example</td>
            </tr>
            <tr>
                <td>Example</td>
                <td>Example</td>
            </tr>
        </table>
    </div>
    <br>
    <hr>
    <div class="contents">
        <h3>Device Type Analytics</h3>
        <table>
            <tr>
                <th>Scan Location</th>
                <th>Number of Scans</th>
            </tr>
            <tr>
                <td>iPhone</td>
                <td>example</td>
            </tr>
            <tr>
                <td>Android</td>
                <td>Example</td>
            </tr>
            <tr>
                <td>Desktop</td>
                <td>Example</td>
            </tr>
            <tr>
                <td>Other</td>
                <td>Example</td>
            </tr>
        </table>
    </div>
    <br>
    <hr>
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
        <h3>Scanner Gender Analytics</h3>
        <table>
            <tr>
                <th>Scanner Gender</th>
                <th>Number of Scans</th>
            </tr>
            <tr>
                <td>Male</td>
                <td>example</td>
            </tr>
            <tr>
                <td>Female</td>
                <td>Example</td>
            </tr>
            <tr>
                <td>Other</td>
                <td>Example</td>
            </tr>
            <tr>
                <td>Prefer not to answer</td>
                <td>Example</td>
            </tr>
        </table>
    </div>
</body>

</html>
