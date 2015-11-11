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

