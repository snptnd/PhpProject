$(function(){
    var title = $(document).find("title").text();
    if(title == "Game"){
        hideElement("playButton");
    } 
});

function hideElement(element){
    $('#' + element).hide();
}

function validateForm(theForm) {
    var email = theForm.email;
    var password = theForm.password;
}
function newUser(email, password, sendNews, age){
    var userData = {};
    userData.email = email;
    userData.password = password;
    userData.sendNews = sendNews;
    userData.age = age;

    $.post("rest/updateuser.php", userData).done(function (data) {
        console.log("Data Loaded: " + data);
    });
}
