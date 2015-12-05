<?php
require("classes/dbutils.php");
$pageTitle = "Game";
require("header.php");
session_start();
?>
<script>
    $(function () {
        var numAttempt = 0;
        var numA = 0;
        $("#deleteMe").hide();
        $("#loggedInContainer").hide();
        $("#regEmail").watermark("Email Address");
        $("#regPassword").watermark("Password");
        $("#regDisplayName").watermark("Display Name");
        $("#regAge").watermark("Age");

        $("#logEmail").watermark("Email Address");
        $("#logPassword").watermark("Password");
        $("#registerLink").click(function () {
            $("#registerContainer").toggle();
            $("#loginContainer").toggle();
        });





        $("#loginForm").submit(function () {
            var errors = 0;
            var logEmail = document.getElementById("logEmail").value;
            var logPass = document.getElementById("logPassword").value;

            errors += validateEmail(logEmail);
            errors += validatePass(logPass);

            if (errors > 0) {
                return false;
            } else {
                var attempt = logIn(logEmail, logPass);

                attempt.success(function (data) {
                    var text = data.replace(/(\r\n|\n|\r)/gm, "");
                    numAttempt += 1;
                    numA = 4 - numAttempt;
                    if (numAttempt < 4) {
                        if (text == "VALID") {

                            $("#loggedInContainer").show();
                            $("#registerContainer").hide();
                            $("#loginContainer").hide();
                        } else {
                            alert("Incorrect Credintials Provided\n" + numA + " more attempt(s) before lockout.");
                        }
                    } else {
                        alert("Access Denied.\nContact an Administrator");
                    }
                });
                return false;
            }
        });
        $("#registerForm").submit(function () {
            var errors = 0;
            var email = document.getElementById("regEmail").value;
            var pass = document.getElementById("regPassword").value;
            var displayName = document.getElementById("regDisplayName").value;
            var age = document.getElementById("regAge").value;
            var news = document.getElementById("regSendNews").value;

            errors += validateEmail(email);
            errors += validateDisplayName(displayName);
            errors += validateRegPass(pass);
            errors += validateAge(age);

            if (errors > 0) {
                return false;
            } else {
                newUser(email, displayName, pass, news, age);
                var promise = logIn(email, pass);

                promise.success(function (data) {
                    var text = data.replace(/(\r\n|\n|\r)/gm, "");
                    //alert(text);
                    //location.reload();
                    if (text == "VALID") {
                        $("#loggedInContainer").show();
                        $("#registerContainer").hide();
                        $("#loginContainer").hide();
                    }
                });
                return false;
            }
        });
        function fillCharList() {
            var jsonData = getCharsJSONstring();

        }
        function validateDisplayName(displayName) {
            if (displayName == null || displayName == "") {
                $(".hookDisplayName").css("visibility", "visible");
                return 1;
            } else {
                $(".hookDisplayName").css("visibility", "hidden");
                return 0;
            }
        }
        function validateRegPass(pass) {
            if (pass == null || pass == "") {
                $(".hookPassword").css("visibility", "visible");
                $('.hookPassword').text('Required');
                return 1;
            } else if (pass.length < 6) {
                $(".hookPassword").css("visibility", "visible");
                $('.hookPassword').text('Requires more than 6 characters');
                return 1;
            } else {
                $(".hookPassword").css("visibility", "hidden");
                return 0;
            }
        }
        function validateAge(age) {
            if (isNaN(age) || age == null || age == "") {
                $(".hookAge").css("visibility", "visible");
                return 1;
            } else {
                $(".hookAge").css("visibility", "hidden");
                return 0;
            }
        }



    });</script>

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

            <div class="container-fluid centerMe" id="loggedInContainer">
                <?php
                //require("characterCreation.php");
                require('gameLayout.php');
                ?>
            </div>

            <!-- this is for logging in -->

            <div class="container-fluid centerMe" id="loginContainer">
                <div class ="block">
                    <div class="row">
                        <h1 class="gameHeader">Login</h1>
                    </div>
                    <div class="row">
                        <p style="font-size: 1.5vw; margin: 1%;">Please either login below, or <a href="#" id="registerLink">click here to register</a>.</p>
                    </div>
                    <form method="post" name="loginForm" id="loginForm">
                        <div class="row centerDiv">
                            <div class="col-xs-2 reqSize">
                                <input type="text" name="logEmail" id="logEmail" />
                            </div>
                            <div class="col-xs-2 validateVis hookEmail" id="valLogEmail">
                                <label id="regLogEmail">Required</label>
                            </div>
                        </div>
                        <div class="row centerDiv">
                            <div class="col-xs-2 reqSize">
                                <input type="password" name="password" id="logPassword" />
                            </div>
                            <div class="col-xs-2 validateVis hookPassword" id="valLogPassword">
                                <label id="regLogPassword">Required</label>
                            </div>
                        </div>
                        <div class="row centerDiv">
                            <div class="col-xs-2">
                                <input type="submit" name="login" id="login" value="Login" />
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <!-- this is for registration -->

            <div class="container-fluid centerMe hideMe" id="registerContainer">
                <div class ="block">
                    <div class="row">
                        <h1 class="gameHeader">Register</h1>
                    </div>
                    <div class="row">
                        <p style="font-size: 1.8vw; margin: 1%; font-weight: bold;">Please enter your details below to register.</p>
                    </div>
                    <form method="post" name="registerForm" id="registerForm">
                        <div class="row centerDiv"> 
                            <div class="col-xs-2 reqSize"> 
                                <input type="text" name="email" id="regEmail" />
                            </div>
                            <div class="col-xs-2 validateVis hookEmail" id="valEmail"> 
                                <label id="regEmail">Required</label>
                            </div>
                        </div>
                        <div class="row centerDiv"> 
                            <div class="col-xs-2 reqSize">
                                <input type="password" name="password" id="regPassword" />
                            </div>
                            <div class="col-xs-2 validateVis hookPassword" id="valPassword"> 
                                <label id="regPassword">Required</label>
                            </div>
                        </div>
                        <div class="row centerDiv"> 
                            <div class="col-xs-2 reqSize">
                                <input type="text" name="displayName" id="regDisplayName" />
                            </div>
                            <div class="col-xs-2 validateVis hookDisplayName" id="valDisplayName"> 
                                <label id="reqDisplayName">Required</label>
                            </div>
                        </div>
                        <div class="row centerDiv"> 
                            <div class="col-xs-2 reqSize">
                                <input type="text" name="regAge" id="regAge" />
                            </div>
                            <div class="col-xs-2 validateVis hookAge" id="valAge"> 
                                <label for="regAge">Required</label>
                            </div>
                        </div>
                        <div class="row centerDiv"> 
                            <div class="col-xs-2" style="width: 30px; padding-right: 0;">
                                <input type="checkbox" checked="checked" name="regSendNews" id="regSendNews" /> 
                            </div>
                            <div class="col-xs-3" id="newsLbl">
                                <label for="regSendNews" id="newsLbl">I would like to receive news regarding the game.</label>
                            </div>
                        </div>
                        <div class="row centerDiv"> 
                            <div class="col-xs-2">
                                <input type="submit" name="register" id="register" value="Register" />
                            </div>
                        </div>
                    </form>

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