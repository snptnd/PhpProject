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
    </head>
    <body>
        
        <header>Web Development 1059 Homework</header>
        <div class="container">
        <article class="mainContent">
            <?php
            $fileName = "../HWresources/baseball.txt";
            $code = file_get_contents($fileName);
            eval($code);
            // $baseballString is now set to the contents of the text file
            
            $numWords = str_word_count($baseballString);
            echo "The number of words in \$baseballString is $numWords";
            echo "<br><br>";
            
            $lastFew = substr($baseballString, -119);
            echo "The last 119 chars of \$baseballString are $lastFew";
            echo "<br><br>";
            
            $subPos = strpos($baseballString , ".393");
            echo "The character position of the substring '.393' is $subPos";
            echo "<br><br>";
            
            $subPos = strpos($baseballString , ".00728");
            if($subPos != "" | null){
                echo "The character position of the substring '.00728' is $subPos";
                echo "<br><br>";
            }
            else{
                echo "The substring '.00728' does not exist within \$baseballString";
                echo "<br><br>";
            }
            
            $wordsArray = explode(';', $baseballString);
            $wordBool = null;
            foreach($wordsArray as $word){
                echo $word;
                echo "<br>";
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
