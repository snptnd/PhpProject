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
function logIn(email, password){
    var userData = {};
    userData.email = email;
    userData.password = password;

    return $.post("login.php", userData).done(function (data) {
        console.log("Data Loaded: " + data);
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
        console.log("Data Loaded: " + data);
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