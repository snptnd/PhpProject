<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/myStyleSheet.css">
        <script src="../lib/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script>
            function validateForm()
            {
                var fName = document.forms["theForm"]["firstName"].value;
                var lName = document.forms["theForm"]["lastName"].value;
                var weName = document.forms["theForm"]["WorkExperience"].value;
                var appearName = document.forms["theForm"]["Appearance"].value;
                var edName = document.forms["theForm"]["Education"].value;
                var enthName = document.forms["theForm"]["Enthusiasm"].value;
                var month = document.forms["theForm"]["month"].value;
                var day = document.forms["theForm"]["day"].value;
                var year = document.forms["theForm"]["year"].value;
                var whyWork = document.forms["theForm"]["whyWork"].value;
                var strengths = document.forms["theForm"]["strengths"].value;
                var language = document.querySelectorAll('input[name=language]:checked');
                var other = document.forms["theForm"]["other"].value;
                if (
                        fName == null || fName == "" ||
                        lName == null || lName == "" ||
                        weName == null || weName == "" ||
                        appearName == null || appearName == "" ||
                        edName == null || edName == "" ||
                        enthName == null || enthName == ""
                        )
                {
                    return true;
                }
                else
                {
                    updateForm(
                            fName,
                            lName,
                            month,
                            day,
                            year,
                            weName,
                            appearName,
                            edName,
                            enthName,
                            whyWork,
                            strengths,
                            language,
                            other
                            );
                    document['theForm'].action = "submitEval.php";
                }
                function updateForm(
                        firstName,
                        lastName,
                        month,
                        day,
                        year,
                        WorkExperience,
                        Appearance,
                        Education,
                        Enthusiasm,
                        whyWork,
                        strengths,
                        language,
                        other
                        ) {
                    var date = year + "-" + month + "-" + day;
                    var langs = "";
                    
                    for(i=0; i < language.length; i++){
                        langs += language[i].value + " ";
                    }
                    
                    var appData = {};
                    appData.fName = firstName;
                    appData.lName = lastName;
                    appData.dateSubmitted = date;
                    appData.workExpSE = WorkExperience;
                    appData.appearanceSE = Appearance;
                    appData.educationSE = Education;
                    appData.enthusiasmSE = Enthusiasm;
                    appData.whyWork = whyWork;
                    appData.majorStrengths = strengths;
                    appData.languages = langs;
                    appData.other = other;
                    $.post("../rest/updatetables.php", appData).done(function (data) {
                        console.log("Data Loaded: " + data);
                    });
                }
            }
        </script>
    </head>
    <body>

        <header>Web Development 1059 Homework</header>
        <div class="container">
            <article class="mainContent">
                <h1>Job Interview Evaluation Form</h1>
                <?php
                $firstNameErr = "";
                $lastNameErr = "";
                $weErr = "";
                $appearErr = "";
                $edErr = "";
                $enErr = "";

                $firstName = "";
                $lastName = "";

                if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) == "POST") {
                    if (empty($_POST['firstName'])) {
                        $firstNameErr = "First name is required";
                    } else {
                        $firstName = test_input($_POST["firstName"]);
                        // check if name only contains letters and whitespace
                        // the below if statement was taken from w3 schools.
                        if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
                            $nameErr = "Only letters and white space allowed";
                        }
                    }

                    // -----------------------------------------------------------

                    if (empty($_POST["lastName"])) {
                        $lastNameErr = "Last name is required";
                    } else {
                        $lastName = test_input($_POST["lastName"]);
                        // check if name only contains letters and whitespace
                        // the below if statement was taken from w3 schools.
                        if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
                            $lastNameErr = "Only letters and white space allowed";
                        }
                    }

                    // -----------------------------------------------------------

                    if (empty($_POST["WorkExperience"])) {
                        $weErr = "Required";
                    }

                    // -----------------------------------------------------------

                    if (empty($_POST["Appearance"])) {
                        $appearErr = "Required";
                    }

                    // -----------------------------------------------------------

                    if (empty($_POST["Education"])) {
                        $edErr = "Required";
                    }

                    // -----------------------------------------------------------

                    if (empty($_POST["Enthusiasm"])) {
                        $enErr = "Required";
                    }
                }

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                ?>
                <form name='theForm' onsubmit="return validateForm()" action=
                      <?php echo /* 'submitEval.php?'; */htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">

                    Required fields are marked with an asterisk *<br><br>
                    <span style="color:red;">*</span>First Name <input type="text" name="firstName" value="<?php echo $firstName; ?>"><span style="color:red;"> <?php echo $firstNameErr ?></span><br><br> 
                    <span style="color:red;">*</span>Last Name <input type="text" name="lastName" value="<?php echo $lastName; ?>"><span style="color:red;"> <?php echo $lastNameErr ?></span><br><br>
                    <span style="color:red;">*</span>Date 

                    <select name="month" id="month">
                        <?php
                        $monthArray = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

                        for ($i = 0; $i < sizeof($monthArray); $i++) {
                            $monthNumber = 1 + $i;
                            if ($monthNumber == date("m")) {
                                echo '<option selected="selected" value=' . sprintf("%02d", $monthNumber) . ">" . $monthArray[$i] . "</option> \n";
                            } else {
                                echo "<option value=" . sprintf("%02d", $monthNumber) . ">" . $monthArray[$i] . "</option> \n";
                            }
                        }
                        ?> 
                    </select>
                    <select name="day" id="day">
                        <?php
                        for ($i = 0; $i < date("t"); $i++) {
                            $inLoopDay = 1 + $i;
                            $currentDay = date("j") - 1;
                            if ($inLoopDay == $currentDay) {
                                echo '<option selected="selected" value=' . sprintf("%02d", $inLoopDay) . ">" . $currentDay . "</option> \n";
                            } else {
                                echo "<option value=" . sprintf("%02d", $inLoopDay) . ">" . $inLoopDay . "</option> \n";
                            }
                        }
                        ?>
                    </select>
                    <select name="year" id="year">
                        <?php
                        //complete this later. Curretnly only shows the current year.
                        $year = date("Y");
                        echo '<option selected="selected" value=' . $year . ">" . $year . "</option> \n";
                        ?>   
                    </select>

                    <br><br><i>All applicants are expected to do a self-evaluation. Please review and answer all of the questions or ratings.</i><br><br>

                    <?php
                    $chArray = array("Work Experience", "Appearance", "Education", "Enthusiasm");
                    $headArray = array("", "Poor", "Fair", "Average", "Good", "Superior");


                    echo '<table class="chTable" width=75%>';
                    echo "<tr>";
                    for ($k = 0; $k < sizeof($headArray); $k++) {
                        echo "<th>";
                        echo $headArray[$k];
                        echo "</th>";
                    }
                    echo "</tr>";
                    for ($f = 0; $f < sizeof($chArray); $f++) {
                        echo "<tr>";
                        echo "<th>";
                        echo '<span style="color:red;">*</span>';
                        echo $chArray[$f];
                        // -------- this handles what error to display -------------
                        $radioArray = array($weErr, $appearErr, $edErr, $enErr);
                        echo '<span style="color:red;"> ' . $radioArray[$f] . '</span>';
                        // -------- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -------------
                        echo "</th>";
                        $tempString = str_replace(' ', '', $chArray[$f]);
                        for ($j = 1; $j < sizeof($headArray); $j++) {

                            echo "<th>";
                            $tempHeadString = $headArray[$j] + 1;
                            echo '<input type="radio" name="' . $tempString . '" ';
                            if (!empty($_POST[$tempString]) && $_POST[$tempString] == $headArray[$j]) {
                                echo "checked ";
                            }
                            echo 'value="' . $headArray[$j] . '"';
                            echo "</th>";
                        }
                        echo "</tr>";
                    }
                    echo '</table><br><br>';
                    ?>

                    Why do you want to work for the company?<br>
                    <input type="text" name="whyWork" size="100%" style="padding: 0 0 100px 0;"><br><br>

                    What are your other major strengths?<br>
                    <input type="text" name="strengths" size="100%" style="padding: 0 0 100px 0;"><br><br>

                    Please check off all of the computer languages you know<br>
                    <?php
                    $langArray = array("COBOL", "JAVA", "PHP", "PYTHON", "ASP.NET", "SQL", "C", "C++", "C#");
                    for ($m = 0; $m < sizeof($langArray); $m++) {
                        echo '<input type="checkbox" name="language" value="' . $langArray[$m] . '"> ' . $langArray[$m] . '<br>';
                    }
                    ?>

                    Other<br>
                    <input type="text" name="other" size="100%">

                    <br><br><button type="submit" >Submit</button>
                </form>

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