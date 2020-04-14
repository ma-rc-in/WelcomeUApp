function chat() {
    var chat = document.getElementById("hhChatInput").value;
    var chat = chat.toLowerCase()
    var chatOutput = document.getElementById("hmChatOutput");

    //reset password
    if(chat.indexOf('change') != -1 || chat.indexOf('reset') != -1
        && chat.indexOf('password') != -1) {
        chatOutput.value = "You can change the password by contacting ";
    }

    else{
        chatOutput.value = "I do not know what you are trying to ask, please try again.";
    }
}