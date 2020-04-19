function mainmenuAlert() { //currentInt, currentString

    //variables
    //gets the variable
    var amount = localStorage.getItem("mainMenuMessageNew"); //old message amount
    var current = localStorage.getItem("mainMenuMessageOld"); //new message count;

    //used to determine who sent the message (and whether they should be notified) - in case the user has two tabs open
    var currentStudent = localStorage.getItem("mainMenuCurrentStudent"); //current student signed In
    var lastStudent = localStorage.getItem("mainMenuLastStudent"); //Student who sent the Message.
    var check = currentStudent.localeCompare(lastStudent);

    if (amount == null){
        amount = current;
    }

    var amountint = parseInt(amount);

    var page = document.getElementById('groupChat');
    page.onclick = function () {
        var theme = localStorage.getItem("theme");
        document.getElementById("groupChat").src="images/chat.png"; //updates the image
        if (theme == "light"){
            document.getElementById("groupChat").src="images/chatBlack.png"; //updates the image
        }
    }

    //updates the page
    if (amountint < current && check != 0){ //there is a new message and it isn't from the current user
        var theme = localStorage.getItem("theme");
        localStorage.setItem("mainMenuMessageNew", current); //updates the local message amount
        document.getElementById("groupChat").src="images/chatNotification.png"; //updates the image
        if (theme == "light"){
            document.getElementById("groupChat").src="images/chatNotificationBlack.png"; //updates the image
        }
    }

    else{
        localStorage.setItem("mainMenuMessageNew", current); //updates the local message amount
    }
}