
<html>
    <head>
        <title><?php echo($pageTitle); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/bootstrap-3.3.4.min.css" rel="stylesheet" type="text/css"/>
        <script src="../lib/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="lib/bootstrap-3.2.0.min.js" type="text/javascript"></script>
        <link href="../CSS/finalProject.css" rel="stylesheet" type="text/css"/>
        <script src="js/functions.js" type="text/javascript"></script>
        <script src="lib/jquery.watermark.min.js" type="text/javascript"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand visible-xs" href="homepage.php"><img class="img-responsive" src="images/Brand3.png" alt=""/></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <a class="navbar-brand hidden-xs" href="homepage.php"><img class="img-responsive" src="images/Brand3.png" alt=""/></a>
                        <li class="divider-vertical"></li>
                        <li><a href="#">Game Guide<span class="sr-only">(current)</span></a></li>
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">News<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Updates</a></li>
                                <li><a href="#">Upcoming</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">All News</a></li>
                            </ul>
                        </li>
                        <li class="divider-vertical"></li>
                        <li><a href="#">Leader Boards</a></li>
                        <li class="divider-vertical"></li>
                        <li><a href="forum.php">Forum</a></li>
                        <li class="divider-vertical"></li>
                        <li class="playButton" id="playButton"><a class="lastPlay" href="game.php">Play</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

