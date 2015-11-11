<?php
require("classes/dbutils.php");
$pageTitle = "Game";
require("header.php");
?>
<script>
    $(function () {
        $("#regEmail").watermark("Email Address");
        $("#regPassword").watermark("Password");
        $("#regAge").watermark("Age");
        document.body.style.background = "#000000";
        $("#registerLink").click(function () {
            $("#registerContainer").toggle();
            $("#loginContainer").toggle();
        });
        function validateFormOnSubmit(myForm){
            //myForm.
        }
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
                <form method="post" action="#" onsubmit="return validateFormOnSubmit(this);" name="registerform" id="registerform">
                    <div class="row centerDiv"> 
                        <div class="col-xs-2"> 
                            <input type="text" name="email" id="regEmail" />
                        </div>
                    </div>
                    <div class="row centerDiv"> 
                        <div class="col-xs-2">
                            <input type="password" name="password" id="regPassword" />
                        </div>
                    </div>
                    <div class="row centerDiv"> 
                        <div class="col-xs-2">
                            <input type="text" name="regAge" id="regAge" />
                        </div>
                    </div>
                    <div class="row centerDiv"> 
                        <div class="col-xs-8" style="width: 250px !important; text-align: left;">
                            <input type="checkbox" checked="checked" name="regSendNews" id="regSendNews" /> 
                        </div>
                        <div class="col-xs-2">
                            <label for="regAge">I would like to receive news regarding the game.</label>
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