<?php
session_start();
require("classes/dbutils.php");
$pageTitle = "Forum";
require("header.php");
?>

<script>
    $(function () {
        var numAttempt = 0;
        var numA = 0;
        var content = "";
        if (<?php
if (isset($_SESSION["displayName"])) {
    echo("true");
} else {
    echo("false");
}
?>) {
            $(".loginButton").hide();
        }
        $(".loggedIn").hide();
        $("#loggedInContainer").hide();
        $("#regEmail").watermark("Email Address");
        $("#regPassword").watermark("Password");
        $("#regDisplayName").watermark("Display Name");
        $("#regAge").watermark("Age");

        $("#logEmail").watermark("Email Address");
        $("#logPassword").watermark("Password");

        $("#startTopic").click(function () {
            alert("Only administrators may start a topic.");
        });
        
        $("#startThread").click(function () {
           alert("Only administrators may start a Thread.");
        });
        
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
                            $('#myModal').modal('toggle');
                            $("#loggedInContainer").show();
                            $("#registerContainer").hide();
                            $("#loginContainer").hide();
                            window.location.reload();
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
                    if (text == "VALID") {
                        $('#myModal').modal('toggle');
                        $("#loggedInContainer").show();
                        $("#registerContainer").hide();
                        $("#loginContainer").hide();
                        window.location.reload();
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




        $('#reply').click(function () {
            if (<?php
if (isset($_SESSION["displayName"])) {
    echo("true");
} else {
    echo("false");
}
?>) {
                $("table").after('<div class="postBox"><div><textarea rows="8" class="txtField" id="txtField"></textarea></div><div><button type="button" class="btn btn-info postButton" id="postButton">Post</button></div></div>');
                window.scrollTo(0, document.body.scrollHeight);
                $("#postButton").click(function () {
                    content = document.getElementById("txtField").value;
                    pressPost();
                });
            } else {
                $('#myModal').modal('toggle');
            }
        });
        $('#startThread').click(function () {
            if (<?php
if (isset($_SESSION["displayName"])) {
    echo("true");
} else {
    echo("false");
}
?>) {
                if ("<?php
if (isset($_GET["topicID"])) {
    echo($_GET["topicID"]);
} else {
    echo(0);
}
?>" == "123abcd") {
                    if (<?php
if ($_SESSION["type"] == "admin") {
    echo("true");
} else {
    echo("false");
}
?>) {
                        //start new thread
                    } else {
                        alert("Administrator privledges required to open a thread in this topic.");
                    }
                } else {
                    // start new thread
                }
            } else {
                $('#myModal').modal('toggle');
            }
        });
        function pressPost() {
            newPost("<?php echo $_GET["threadID"] ?>", content);
            $(".postBox").remove();
            setTimeout(function () {
                window.location.reload();
            }, 200);
        }
    }
    );
</script>

<!-- modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- modal stuff-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">


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

                <!-- modal end -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>



<div class="tblHolder">
    <?php
    if (isset($_GET["topicID"])) {
        if (isset($_GET["threadID"])) {
            if (isset($_GET["postID"])) {
                
            } else {
                ?>


                <div class="row top">
                    <div class="col-xs-2 postButton" id="reply">
                        Reply
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-info loginButton" data-toggle="modal" data-target="#myModal">Login</button>
                    </div>
                    <div class="col-xs-2 bc1" id="breadCrums">
                        <!-- this is where the bread crums go -->
                    </div>
                </div>
                <table class="tableCenter">
                    <tr class="topRow">
                        <td class="topicCell">
                            Posted by
                        </td>
                        <td class="latestThCell">
                            Content
                        </td>
                        <td class="threadsCountCell">

                        </td>
                        <td class="postsCountCell">

                        </td>
                    </tr>



                    <?php
                    $sql = "SELECT postID, FK_threadID, email, displayName, post.timeS, content FROM post LEFT JOIN user ON post.FK_userID = user.userID WHERE FK_threadID = '" . $_GET["threadID"] . "';";
                    $db = new DbUtilities;
                    $collectionList = $db->getDataset($sql);
                    foreach ($collectionList as &$row) {


                        if ($style == 0) {
                            echo('<tr class="rowStyle1">');
                            $style = 1;
                        } else {
                            echo('<tr class="rowStyle2">');
                            $style = 0;
                        }
                        echo('<td>');
                        echo('<a class="forumLink" href="#">' . $row["displayName"] . '</a>');
                        echo('</td>');
                        echo('<td colspan="3">');
                        echo($row["content"]);
                        echo('</td>');
                        echo('</tr>');
                    }
                }
            } else {
                ?>
                <div class="row top">
                    <div class="col-xs-2 postThreadButton" id="startThread">
                        Start Thread
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-info loginButton" data-toggle="modal" data-target="#myModal">Login</button>
                    </div>
                </div>
                <table class="tableCenter">
                    <tr class="topRow">
                        <td class="topicCell">
                            Thread
                        </td>
                        <td class="latestThCell">
                            Description
                        </td>
                        <td class="threadsCountCell">

                        </td>
                        <td class="postsCountCell">
                            Posts
                        </td>
                    </tr>



                    <?php
                    $sql = "SELECT * FROM thread WHERE FK_topicID='" . $_GET["topicID"] . "';";
                    $db = new DbUtilities;
                    $collectionList = $db->getDataset($sql);
                    foreach ($collectionList as &$row) {

                        if ($style == 0) {
                            echo('<tr class="rowStyle1">');
                            $style = 1;
                        } else {
                            echo('<tr class="rowStyle2">');
                            $style = 0;
                        }
                        echo('<td>');
                        echo('<a class="forumLink" href="' . 'forum.php?topicID=' . $_GET["topicID"] . '&threadID=' . $row["threadID"] . '">' . $row["header"] . '</a>');
                        echo('</td>');
                        echo('<td>');
                        echo($row["description"]);
                        echo('</td>');
                        echo('<td>');
                        echo("");
                        echo('</td>');
                        echo('<td>');
                        echo("");
                        echo('</td>');
                        echo('</tr>');
                    }
                }
            } else {
                ?>
                <div class="row top">
                    <div class="col-xs-2 postThreadButton" id="startTopic">
                        Start Topic
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-info loginButton" data-toggle="modal" data-target="#myModal">Login</button>
                    </div>
                </div>
                <table class="tableCenter">
                    <tr class="topRow">
                        <td class="topicCell">
                            Topic
                        </td>
                        <td class="latestThCell">
                            Description
                        </td>
                        <td class="threadsCountCell">
                            Threads
                        </td>
                        <td class="postsCountCell">
                            Posts
                        </td>
                    </tr>

                    <?php
                    $threadArray = array();
                    $postCount = 0;
                    $style = 0;

                    $sql = "SELECT * FROM topic";
                    $db = new DbUtilities;
                    $collectionList = $db->getDataset($sql);

                    $newSql = "SELECT * FROM topic JOIN thread ON topic.topicID = thread.FK_topicID JOIN post on thread.threadID = post.FK_threadID;";
                    $db2 = new DbUtilities;
                    $tCollectionList = $db2->getDataset($newSql);
                    foreach ($tCollectionList as &$row2) {
                        array_push($threadArray, $row2['threadID']);
                    }
                    foreach ($threadArray as $ID) {
                        $postCount += 1;
                        if (!isset($$ID)) {
                            $$ID = 0;
                        } else {
                            $$ID += 1;
                        }
                    }

                    foreach ($collectionList as &$row) {
                        if ($style == 0) {
                            echo('<tr class="rowStyle1">');
                            $style = 1;
                        } else {
                            echo('<tr class="rowStyle2">');
                            $style = 0;
                        }
                        echo('<td>');
                        echo('<a class="forumLink" href="forum.php?topicID=' . $row["topicID"] . '">' . $row["header"] . '</a>');
                        echo('</td>');
                        echo('<td>');
                        echo($row["description"]);
                        echo('</td>');
                        echo('<td>');
                        echo($threadCount);
                        echo('</td>');
                        echo('<td>');
                        echo("");
                        echo('</td>');
                        echo('</tr>');
                    }
                }
                ?>
            </table>
            </div>

            <?php
            require("footer.php");
            ?>