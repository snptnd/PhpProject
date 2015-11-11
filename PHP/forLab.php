<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>In Class Lab</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/myStyleSheet.css">
        <script>
            function validateForm()
            {
                var fName = document.forms["theForm"]["firstName"].value;
                var lName = document.forms["theForm"]["lastName"].value;
                var weName = document.forms["theForm"]["WorkExperience"].value;
                var appearName = document.forms["theForm"]["Appearance"].value;
                var edName = document.forms["theForm"]["Education"].value;
                var enthName = document.forms["theForm"]["Enthusiasm"].value;
                if (
                        fName === null || fName === "" ||
                        lName === null || lName === "" ||
                        weName === null || weName === "" ||
                        appearName === null || appearName === "" ||
                        edName === null || edName === "" ||
                        enthName === null || enthName === ""
                        )
                {
                    return true;
                }
                else
                {
                    document['theForm'].action = "forLab.php";
                }
            }
        </script>
    </head>
    <body>

        <header>Web Development 1059 Homework</header>
        <div class="container">
            <article class="mainContent">
                <form name='theForm' onsubmit="return validateForm()" action=
                      <?php echo /* 'submitEval.php?'; */htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">
                          <?php
                          require("../classes/dbutils.php");
                          require("../rest/getEmployee.php");

                          $fillDep = "";

                          if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) == "POST") {
                              if (!empty($_POST['department'])) {
                                  $index = $_POST['department'];
                                  $empCol = leftOuterJoin("Department", "Employee", "idDepartment", "Department_idDepartment", $index);
                                  $fillDep = $empCol;
                              }
                          }


                          $empCol = selectDB("Department");
                          echo 'Select a department: ';
                          echo '<select name="department" id="department">';
                          $length = sizeof($empCol) + 1;
                          for ($i = 1; $i < $length; $i++) {
                              echo "<option value=" . $i . ">" . $empCol[$i-1]["name"] . "</option> \n";
                          }
                          echo '</select>';
                          ?>
                          <br><span style="color:red;"> <?php echo $fillDep ?></span><br><br>
                          <?php
                          
                          
                          
                          ?>
                    <br><br><input type="submit">
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



