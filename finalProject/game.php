<?php
require("classes/dbutils.php");
$pageTitle = "Game";
require("header.php");
?>
<script>
    $(function () {
        document.body.style.background = "#000000";
        $("#registerLink").click(function () {
            $("#registerContainer").toggle();
            $("#loginContainer").toggle();
        });
    });
</script>

<div class="wrapper">
    <div class="whiteBack">

        <?php
        if (!empty($_SESSION['UserID'])) {
            ?>
            <h1>Member Area</h1>
            <p>Thanks for logging in! You are <?php echo $_SESSION['UserID'] ?> and your email address is <?php echo $_SESSION['EmailAddress'] ?>.</p>
            <p><a href="logout.php">Logout</a></p>
            <?php
        } else {
            ?>
            <div class="container-fluid centerMe" id="loginContainer">
                <div class ="block">
                    <div class="row">
                        <h1 class="gameHeader">Login</h1>
                    </div>
                    <div class="row">
                        <p style="font-size: 1.5vw; margin: 1%;">Please either login below, or <a href="#" id="registerLink">click here to register</a>.</p>
                    </div>
                    <form method="post" action="#" onsubmit="return validateForm(this);" name="loginform" id="loginform">
                        <div class="row centerDiv"> 
                            <div class="col-xs-2">
                                <label for="username">Email:</label>
                            </div>
                            <div class="col-xs-2"> 
                                <input type="text" name="email" id="email" />
                            </div>
                        </div>
                        <div class="row centerDiv"> 
                            <div class="col-xs-2">
                                <label for="password">Password:</label>
                            </div>
                            <div class="col-xs-2">
                                <input type="password" name="password" id="password" />
                            </div>
                        </div>
                        <div class="row centerDiv"> 
                            <div class="col-xs-2">
                                <input type="submit" name="login" id="login" value="Login" />
                            </div>
                    </form>
                </div>
            </div>      
        </div>

        <!-- this is for registration -->

        <div class="container-fluid centerMe hideMe" id="registerContainer">
            <div class ="block">
                <div class="row">
                    <h1 class="gameHeader">Register</h1>
                </div>
                <div class="row">
                    <p style="font-size: 1.5vw; margin: 1%;">Please enter your details below to register.</p>
                </div>
                <form method="post" action="register.php" name="registerform" id="registerform">
                    <div class="row centerDiv"> 
                        <div class="col-xs-2">
                            <label for="email">Email:</label>
                        </div>
                        <div class="col-xs-2"> 
                            <input type="text" name="email" id="email" />
                        </div>
                    </div>
                    <div class="row centerDiv"> 
                        <div class="col-xs-2">
                            <label for="password">Password:</label>
                        </div>
                        <div class="col-xs-2">
                            <input type="password" name="password" id="password" />
                        </div>
                    </div>
                    <div class="row centerDiv"> 
                        <div class="col-xs-2">
                            <input type="submit" name="register" id="register" value="Register" />
                        </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>


</div>
</div>



<?php
require("footer.php");
?>