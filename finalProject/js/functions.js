var charPlaceID = '';
var charName = '';
var charGender = 'male';
var charAgility = 0;
var charStrength = 0;
var charIntellect = 0;
var charMaxHP = 10;
var charCurHP = 10;
var charMaxMP = 8;
var charCurMP = 8;
var charMaxStamina = 0;
var charCurStamina = 0;
var charMaxWill = 0;
var charCurWill = 0;
var charExperience = 0;
var charLevel = 1;


function findChar() {
    $.post("findChar.php").done(function (data) {
        var jsonData = JSON.parse(data);
        console.log(JSON.parse(data));
        var charFound = jsonData.length;
        console.log(charFound);
        if (jsonData.character.length > 0) {
            var charPlaceID = jsonData.character[0].placeID;
            var charName = jsonData.character[0].name;
            var charGender = jsonData.character[0].gender;
            var charAgility = jsonData.character[0].agility;
            var charStrength = jsonData.character[0].strength;
            var charIntellect = jsonData.character[0].intellect;
            var charMaxHP = jsonData.character[0].maxHP;
            var charCurHP = jsonData.character[0].curHP;
            var charMaxMP = jsonData.character[0].maxMP;
            var charCurMP = jsonData.character[0].curMP;
            var charMaxStamina = jsonData.character[0].maxStamina;
            var charCurStamina = jsonData.character[0].curStamina;
            var charMaxWill = jsonData.character[0].maxWill;
            var charCurWill = jsonData.character[0].curWill;
            var charExperience = jsonData.character[0].experience;
            var charLevel = jsonData.character[0].level;
        } else {
            createNewChar();
        }

        //score = numberCorrect * pointMultiplier;
        $('#scoreDisplay').html("Number of attempts on Level " + levelID + ": " + jsonData.score.length + ". Questions completed: " + questionsCompleted + ". Correct choices: " + numberCorrect + ". Your score: " + score);

    });
}
function createNewChar() {
    $.post("createChar.php").done(function (data) {

    });
}



$(function () {
    var title = $(document).find("title").text();
    if (title == "Game") {
        hideElement("playButton");
    }
});

function hideElement(element) {
    $('#' + element).hide();
}

function validateForm(theForm) {
    var email = theForm.email;
    var password = theForm.password;
}
function getCharsJSONstring() {
    var userData = {};

    return $.post("getChars.php", userData).done(function (data) {
    });
}
function validatePass(pass) {
    if (pass == null || pass == "") {
        $("#regLogPassword").css("visibility", "visible");
        return 1;
    } else {
        $("#regLogPassword").css("visibility", "hidden");
        return 0;
    }
}
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
function newPost(threadID, content) {
    var postData = {};
    postData.threadID = threadID;
    postData.content = content;
    postData.guid = guid();
    $.post("newPost.php", postData).done(function (data) {

    });
}
function logIn(email, password) {
    var userData = {};
    userData.email = email;
    userData.password = password;

    return $.post("login.php", userData).done(function (data) {
    });
}
function newUser(email, displayName, password, sendNews, age) {
    var userData = {};
    userData.email = email;
    userData.displayName = displayName;
    userData.password = password;
    userData.sendNews = sendNews;
    userData.age = age;
    userData.userID = guid();

    $.post("newuser.php", userData).done(function (data) {
    });
}

function guid() {
    function s4() {
        return Math.floor((1 + Math.random()) * 0x10000)
                .toString(16)
                .substring(1);
    }
    return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
            s4() + '-' + s4() + s4() + s4();
}