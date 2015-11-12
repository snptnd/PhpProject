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
        $("#registerForm").submit(function () {
            var errors = 0;
            var email = document.getElementById("regEmail").value;
            var pass = document.getElementById("regPassword").value;
            var age = document.getElementById("regAge").value;
            var news = document.getElementById("regSendNews").value;
            
            errors += validateEmail(email);
            errors += validatePass(pass);
            errors += validateAge(age);

            if (errors > 0) {
                return false;
            } else {
                newUser(email, pass, news, age);
                return false;
            }
        });
        function validateEmail(email) {
            var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            if (!pattern.test(email)) {
                $(".hookEmail").css("visibility", "visible");
                return 1;
            } else {
                $(".hookEmail").css("visibility", "hidden");
                return 0;
            }
        }
            function validatePass(pass) {
                if (pass == null || pass == "") {
                    $(".hookPassword").css("visibility", "visible");
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
            <div class="container-fluid centerMe" id="loginContainer">
                <div class ="block">
                    <div class="row">
                        <h1 class="gameHeader">Login</h1>
                    </div>
                    <div class="row">
                        <p style="font-size: 1.5vw; margin: 1%;">Please either login below, or <a href="#" id="registerLink">click here to register</a>.</p>
                    </div>
                    <form method="post" name="loginform" id="loginform">
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
                    <p style="    font-size: 1.8vw; margin: 1%; font-weight: bold;">Please enter your details below to register.</p>
                </div>
                <form method="post" name="registerForm" id="registerForm">
                    <div class="row centerDiv"> 
                        <div class="col-xs-2 reqSize"> 
                            <input type="text" name="email" id="regEmail" />
                        </div>
                        <div class="col-xs-2 validateVis hookEmail" id="valEmail"> 
                            <label for="regEmail">Required</label>
                        </div>
                    </div>
                    <div class="row centerDiv"> 
                        <div class="col-xs-2 reqSize">
                            <input type="password" name="password" id="regPassword" />
                        </div>
                        <div class="col-xs-2 validateVis hookPassword" id="valPassword"> 
                            <label for="regPassword">Required</label>
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