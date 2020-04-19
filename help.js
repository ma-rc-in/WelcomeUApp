function chat() {
    var chat = document.getElementById("hhChatInput").value;
    var chat = chat.toLowerCase()
    var chatOutput = document.getElementById("hmChatOutput");

    //reset password
    if(chat.indexOf('change') != -1 || chat.indexOf('reset') != -1
        && chat.indexOf('password') != -1) {
        chatOutput.value = "You can change your password by contacting....";
    }
    // view introduction week timetable
    else if (chat.indexOf('view') != -1 || chat.indexOf('introduction') != -1 || chat.indexOf('orientation') != -1
        || chat.indexOf('week') != -1 && chat.indexOf('timetable') != -1) {
        chatOutput.value = "To view the introduction week timetable, you can visit this link https://www.northumbria.ac.uk/study-at-northumbria/new-students/";
    }

    else{
        chatOutput.value = "I do not know what you are trying to ask, please try again.";
    }
}