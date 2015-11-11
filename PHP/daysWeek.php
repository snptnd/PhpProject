<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Array Homework</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/myStyleSheet.css">
    </head>
    <body>
        
        <header>Web Development 1059 Homework</header>
        <div class="container">
        <article class="mainContent">
        
            <div>
            <b>HTML:</b><br>
            Monday Tuesday Wednesday Thursday Friday Saturday Sunday
        </div>
        <?php
        echo '
        <div>
        <br>
            <b>PHP echo:</b><br>
            Monday Tuesday Wednesday Thursday Friday Saturday Sunday
        </div>';
        
        $array = array(
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
            "Sunday"
        );
        $listDays = $array["0"] . " " . $array["1"] . " " . $array["2"] . " " . $array["3"] . " " . $array["4"] . " " . $array["5"] . " " . $array["6"];
        echo '<br><b>PHP array using concatenation: </b><br> ';
        print($listDays);
        
        echo '<br><br> <b>PHP array displayed using foreach loop: (this is the quickest method)</b><br>';
        foreach($array as $value) {
            echo "$value ";
        }
        ?>
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
