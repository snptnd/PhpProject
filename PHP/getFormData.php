<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/myStyleSheet.css">
        <link href="../CSS/bootstrap-3.3.4.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <header>Web Development 1059 Homework</header>
        <div class="container">
            <article class="mainContent">
                <form method="POST" action=
                      <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>> <!--   -->
                    <div class="row">

                        <div class="col-md-4"><input type="submit" name="allFields" class="btn-sm" style="width: 100%; margin-bottom: 1em;"  value="All Fields"></div>
                        <div class="col-md-4"><input type="submit" name="pyJava" class="btn-sm" style="width: 100%; margin-bottom: 1em;"  value="Python and Java"></div>
                        <div class="col-md-4"><input type="submit" name="cobol" class="btn-sm" style="width: 100%; margin-bottom: 1em;"  value="Cobol info"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><input type="submit" name="janJuly" class="btn-sm" style="width: 100%; margin-bottom: 1em;"  value="Applied Jan to July"></div>
                        <div class="col-md-4"><input type="submit" name="notJanJuly" class="btn-sm" style="width: 100%; margin-bottom: 1em;"  value="Not applied Jan to July"></div>
                        <div class="col-md-4"><input type="submit" name="teamWork" class="btn-sm" style="width: 100%; margin-bottom: 1em;"  value="Major strength is team work"></div>
                    </div>
                </form>

                <?php
                $result = null;
                $sql = null;
                $param0 = '';
                $param1 = '';
                $param2 = '';
                $param3 = '';
                $param4 = '';
                $param5 = '';
                $param6 = '';
                $param7 = '';
                $param8 = '';
                $param9 = '';
                $param10 = '';
                $param11 = '';
                $param12 = '';
                
                //$server = 'sis-teach-01.sis.pitt.edu';
                $server = 'localhost';
                $dbname = 'srp63';
                $username = 'srp63';
                $password = '3669488';

                if (isset($_POST['allFields'])) {
                    $sql = "SELECT * ";
                    $sql .= "FROM Applicant;";
                    $param0 = "idApplicant";
                    $param1 = 'fName';
                    $param2 = 'lName';
                    $param3 = 'dateSubmitted';
                    $param4 = 'workExpSE';
                    $param5 = 'appearanceSE';
                    $param6 = 'educationSE';
                    $param7 = 'enthusiasmSE';
                    $param8 = 'whyWork';
                    $param9 = 'majorStrengths';
                    $param10 = 'languages';
                    $param11 = 'other';
                }
                if (isset($_POST['pyJava'])) {
                    $sql = "SELECT fName, lName, languages ";
                    $sql .= "FROM Applicant WHERE languages like '%JAVA%' and languages like '%PYTHON%'";
                    $param0 = "fName";
                    $param1 = 'lName';
                    $param2 = 'languages';
                }
                if (isset($_POST['cobol'])) {
                    $sql = "SELECT fName, lName, workExpSE, educationSE ";
                    $sql .= "FROM Applicant WHERE languages like '%COBOL%';";
                    $param0 = "fName";
                    $param1 = 'lName';
                    $param2 = 'workExpSE';
                    $param3 = 'educationSE';
                }
                if (isset($_POST['janJuly'])) {
                    $sql = "SELECT fName, lName, dateSubmitted ";
                    $sql .= "FROM Applicant WHERE dateSubmitted >= '2015-01-00' and dateSubmitted <= '2015-7-31'";
                    $param0 = "fName";
                    $param1 = 'lName';
                    $param2 = 'dateSubmitted';
                }
                if (isset($_POST['notJanJuly'])) {
                    $sql = "SELECT fName, lName, dateSubmitted ";
                    $sql .= "FROM Applicant WHERE NOT (dateSubmitted >= '2015-01-00' and dateSubmitted <= '2015-7-31')";
                    $param0 = "fName";
                    $param1 = 'lName';
                    $param2 = 'dateSubmitted';
                }
                if (isset($_POST['teamWork'])) {
                    $sql = "SELECT fName, lName, majorStrengths ";
                    $sql .= "FROM Applicant WHERE majorStrengths like '%teamwork%';";
                    $param0 = "fName";
                    $param1 = 'lName';
                    $param2 = 'majorStrengths';
                }

                $conn = new mysqli($server, $username, $password, $dbname) or die('Unable to connect to database [' . $mysqli->connect_error . ']');
                /*if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }*/

                if ($sql != null) {
                    $result = mysqli_query($conn, $sql) or die('Unable to query database [' . $conn->connect_error . ']');
                }
                
                /*unset($_POST);
                $_POST = array();*/
                ?>

                <div class="row">
                    <div name="field" id="field" class="col-md-12">
                        <?php
                        if ($result != null) {

                            while ($row = mysqli_fetch_assoc($result)) {

                                echo '<hr>';
                                echo '<div class="row">';
                                echo '<div class="col-md-1">';
                                if ($param0 != "") {
                                    echo $row[$param0];
                                }
                                echo '</div>';
                                echo '<div class="col-md-2">';
                                if ($param1 != "") {
                                    echo $row[$param1];
                                }
                                echo '</div>';
                                echo '<div class="col-md-2">';
                                if ($param2 != "") {
                                    echo $row[$param2];
                                }
                                echo '</div>';
                                echo '<div class="col-md-2">';
                                if ($param3 != "") {
                                    echo $row[$param3];
                                }
                                echo '</div>';
                                echo '<div class="col-md-1">';
                                if ($param4 != "") {
                                    echo $row[$param4];
                                }
                                echo '</div>';
                                echo '<div class="col-md-1">';
                                if ($param5 != "") {
                                    echo $row[$param5];
                                }
                                echo '</div>';
                                echo '<div class="col-md-1">';
                                if ($param6 != "") {
                                    echo $row[$param6];
                                }
                                echo '</div>';
                                echo '<div class="col-md-1">';
                                if ($param7 != "") {
                                    echo $row[$param7];
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>


                <?php mysqli_close($conn) ?>
                <footer><a href="../homework.html">Back</a></footer>
            </article>
            <nav class="leftPane">
                <!-- For my reference: leave blank or insert navbar -->
            </nav>
            <aside class="rightPane">
                <!-- For my reference: leave blank or content can go here -->
            </aside>
        </div>

    </body>
</html>
