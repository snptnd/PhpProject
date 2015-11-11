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
            <h1>Thank you for your interest <?php echo filter_input(INPUT_POST, 'firstName'); ?>!</h1>
            <p>You rated your...</p>
            <p>Work experience as <?php echo filter_input(INPUT_POST, 'WorkExperience'); ?></p>
            <p>Appearance as <?php echo filter_input(INPUT_POST, 'Appearance'); ?></p>
            <p>Education as <?php echo filter_input(INPUT_POST, 'Education'); ?></p>
            <p>Enthusiasm as <?php echo filter_input(INPUT_POST, 'Enthusiasm'); ?></p>
            <footer></footer>
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
