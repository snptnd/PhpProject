<?php ?>

<style type='text/css'>
    h1{ 
        color: white;
        text-align: left;
    }
    td{
        font-size: 1.8vw;
        color: white;
        text-align: left;
    }
    .g-row {
        display: table-row;
        width: auto;
        clear: both;
    }

    .create-col {
        float: left;
        /*fix for  buggy browsers*/
        display: table-column;
        width: 50%;
        font-weight: bold;
        font-size: 1.8vw;
        color: white;
        text-align: left;
    }

    .gender-col {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        cursor: pointer;
        float: left;
        /*fix for  buggy browsers*/
        display: table-column;
        width: 15%;
        background: #291616;
        font-weight: bold;
        font-size: 2vw;
        color: white;
        text-align: center;
        border: 1px solid rgba(255, 0, 0, 0.15);
        -moz-box-shadow: inset 2px 2px 2px rgba(255, 255, 255, .4), inset -2px -2px 2px rgba(0, 0, 0, .4);
        -webkit-box-shadow: inset 2px 2px 2px rgba(255, 255, 255, .4), inset -2px -2px 2px rgba(0, 0, 0, .4);
        box-shadow: inset 2px 2px 2px rgba(245, 158, 158, 0.46), inset -2px -2px 2px rgba(0, 0, 0, .4);
    }

    #charName {
        margin-top: -10px;
        margin-bottom: 20px;
        width: 22vw;
        height: 2.8vw;
        font-size: 2vw;
        color: black;
    }

    #ready {
        color: blue;
        cursor: pointer;
    }

    td.plus,
    td.minus {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        cursor: pointer;
        background: #291616;
        width: 2vw !important;
        font-weight: bold;
        font-size: 2vw;
        color: white;
        text-align: center;
        border: 1px solid rgba(255, 0, 0, 0.15);
        -moz-box-shadow: inset 2px 2px 2px rgba(255, 255, 255, .4), inset -2px -2px 2px rgba(0, 0, 0, .4);
        -webkit-box-shadow: inset 2px 2px 2px rgba(255, 255, 255, .4), inset -2px -2px 2px rgba(0, 0, 0, .4);
        box-shadow: inset 2px 2px 2px rgba(245, 158, 158, 0.46), inset -2px -2px 2px rgba(0, 0, 0, .4);
    }

    td.plus:hover,
    td.minus:hover {
        background-color: #5F0000;
    }

    td.plus:active,
    td.minus:active {
        background-color: black;
    }

</style>




<script type='text/javascript'>//<![CDATA[
    window.onload = function () {
        var gender = 'male';
        var points = 10;
        $(".male").css("background-color", "#5F0000");

        $("#maleBtn").click(function () {
            $(".male").css("background-color", "#5F0000");
            $(".female").css("background-color", "#291616");
            gender = 'male';
        });
        $("#femaleBtn").click(function () {
            $(".female").css("background-color", "#5F0000");
            $(".male").css("background-color", "#291616");
            gender = 'female';
        });

        function setPointString() {
            $("#pointString").text("Alocate your points... " + points + " left.");
        }
        $("#agilityMinus").click(function () {
            if (parseInt($('#agilityPoints').text()) <= 1) {
            } else {
                $('#agilityPoints').text(parseInt($('#agilityPoints').text()) - 1);
                points += 1;
                setPointString();
            }
        });
        $("#agilityPlus").click(function () {
            if (points <= 0) {
            } else {
                $('#agilityPoints').text(parseInt($('#agilityPoints').text()) + 1);
                points -= 1;
                setPointString();
            }
        });

        $("#strengthMinus").click(function () {
            if (parseInt($('#strengthPoints').text()) <= 1) {
            } else {
                $('#strengthPoints').text(parseInt($('#strengthPoints').text()) - 1);
                points += 1;
                setPointString();
            }
        });
        $("#strengthPlus").click(function () {
            if (points <= 0) {
            } else {
                $('#strengthPoints').text(parseInt($('#strengthPoints').text()) + 1);
                points -= 1;
                setPointString();
            }
        });

        $("#intellectMinus").click(function () {
            if (parseInt($('#intellectPoints').text()) <= 1) {
            } else {
                $('#intellectPoints').text(parseInt($('#intellectPoints').text()) - 1);
                points += 1;
                setPointString();
            }
        });
        $("#intellectPlus").click(function () {
            if (points <= 0) {
            } else {
                $('#intellectPoints').text(parseInt($('#intellectPoints').text()) + 1);
                points -= 1;
                setPointString();
            }
        });

        $("#wisdomMinus").click(function () {
            if (parseInt($('#wisdomPoints').text()) <= 1) {
            } else {
                $('#wisdomPoints').text(parseInt($('#wisdomPoints').text()) - 1);
                points += 1;
                setPointString();
            }
        });
        $("#wisdomPlus").click(function () {
            if (points <= 0) {
            } else {
                $('#wisdomPoints').text(parseInt($('#wisdomPoints').text()) + 1);
                points -= 1;
                setPointString();
            }
        });

        $("#hpMinus").click(function () {
            if (parseInt($('#hpPoints').text()) <= 1) {
            } else {
                $('#hpPoints').text(parseInt($('#hpPoints').text()) - 1);
                points += 1;
                setPointString();
            }
        });
        $("#hpPlus").click(function () {
            if (points <= 0) {
            } else {
                $('#hpPoints').text(parseInt($('#hpPoints').text()) + 1);
                points -= 1;
                setPointString();
            }
        });

        $("#mpMinus").click(function () {
            if (parseInt($('#mpPoints').text()) <= 1) {
            } else {
                $('#mpPoints').text(parseInt($('#mpPoints').text()) - 1);
                points += 1;
                setPointString();
            }
        });
        $("#mpPlus").click(function () {
            if (points <= 0) {
            } else {
                $('#mpPoints').text(parseInt($('#mpPoints').text()) + 1);
                points -= 1;
                setPointString();
            }
        });

        $("#staminaMinus").click(function () {
            if (parseInt($('#staminaPoints').text()) <= 1) {
            } else {
                $('#staminaPoints').text(parseInt($('#staminaPoints').text()) - 1);
                points += 1;
                setPointString();
            }
        });
        $("#staminaPlus").click(function () {
            if (points <= 0) {
            } else {
                $('#staminaPoints').text(parseInt($('#staminaPoints').text()) + 1);
                points -= 1;
                setPointString();
            }
        });

        $("#willMinus").click(function () {
            if (parseInt($('#willPoints').text()) <= 1) {
            } else {
                $('#willPoints').text(parseInt($('#willPoints').text()) - 1);
                points += 1;
                setPointString();
            }
        });
        $("#willPlus").click(function () {
            if (points <= 0) {
            } else {
                $('#willPoints').text(parseInt($('#willPoints').text()) + 1);
                points -= 1;
                setPointString();
            }
        });

        $("#ready").click(function () {
            var name = $("#charName").val();
            if (name == "" || name == null) {
                alert("Fill out your character's name!");
            } else if (name.length <= 3) {
                alert("Character name must be longer than 3 characters!");
            } else if (points != 0) {
                alert("You must alocate all of your points to continue!");
            } else {
                createNewChar($("#charName").val(), gender, 
                $("#agilityPoints").text(), $("#strengthPoints").text(), 
                $("#intellectPoints").text(), $("#wisdomPoints").text(), 
                $("#hpPoints").text(), $("#mpPoints").text(), 
                $("#staminaPoints").text(), $("#willPoints").text());
                $("#characterCreation").hide();
                findChar();
            }
        });

    }//]]> 

</script>

</head>
<body>
    <div id="characterCreation">
        <div class="create-col">
            <h1>
                Character Creation
            </h1>
            <p>
                What is your name?
            </p>
            <input type="text" id="charName" />
            <br>
            <p>
                What is your gender?
            </p>
            <div id="maleBtn" class="gender-col male">
                Male
            </div>
            <div id="femaleBtn" class="gender-col female">
                Female
            </div>

        </div>
        <div class="create-col">
            <h1 id="pointString">
                Alocate your points... 10 left.
            </h1>
            <table>
                <tr>
                    <td>
                        Agility:
                    </td>
                    <td id="agilityPoints">
                        5
                    </td>
                    <td id="agilityMinus" class="minus">
                        -
                    </td>
                    <td id="agilityPlus" class="plus">
                        +
                    </td>
                </tr>
                <tr>
                    <td>
                        Strength:
                    </td>
                    <td id="strengthPoints">
                        5
                    </td>
                    <td id="strengthMinus" class="minus">
                        -
                    </td>
                    <td id="strengthPlus" class="plus">
                        +
                    </td>
                </tr>
                <tr>
                    <td>
                        Intellect:
                    </td>
                    <td id="intellectPoints">
                        5
                    </td>
                    <td id="intellectMinus" class="minus">
                        -
                    </td>
                    <td id="intellectPlus" class="plus">
                        +
                    </td>
                </tr>
                <tr>
                    <td>
                        Wisdom:
                    </td>
                    <td id="wisdomPoints">
                        5
                    </td>
                    <td id="wisdomMinus" class="minus">
                        -
                    </td>
                    <td id="wisdomPlus" class="plus">
                        +
                    </td>
                </tr>
                <tr>
                    <td>
                        HP:
                    </td>
                    <td id="hpPoints">
                        5
                    </td>
                    <td id="hpMinus" class="minus">
                        -
                    </td>
                    <td id="hpPlus" class="plus">
                        +
                    </td>
                </tr>
                <tr>
                    <td>
                        MP:
                    </td>
                    <td id="mpPoints">
                        5
                    </td>
                    <td id="mpMinus" class="minus">
                        -
                    </td>
                    <td id="mpPlus" class="plus">
                        +
                    </td>
                </tr>
                <tr>
                    <td>
                        Stamina:
                    </td>
                    <td id="staminaPoints">
                        5
                    </td>
                    <td id="staminaMinus" class="minus">
                        -
                    </td>
                    <td id="staminaPlus" class="plus">
                        +
                    </td>
                </tr>
                <tr>
                    <td>
                        Will:
                    </td>
                    <td id="willPoints">
                        5
                    </td>
                    <td id="willMinus" class="minus">
                        -
                    </td>
                    <td id="willPlus" class="plus">
                        +
                    </td>
                </tr>
                <tr>
                    <td id="ready">
                        Ready to Play!
                    </td>
                </tr>
            </table>

        </div>
    </div>

