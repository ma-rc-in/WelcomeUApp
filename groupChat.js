function alertFunction() { //currentInt, currentString

    //variables
    //gets the variable
    var amount = localStorage.getItem("messageAmount"); //old message amount
    var current = localStorage.getItem("messageAmountLoad"); //new message count;

    //used to determine who sent the message (and whether they should be notified)
    var currentStudent = localStorage.getItem("currentStudent"); //current student signed In
    var lastStudent = localStorage.getItem("lastStudent"); //Student who sent the Message.
    var check = currentStudent.localeCompare(lastStudent);

    if (amount == null){
        amount = current;
    }

    var amountint = parseInt(amount);

    //If the User clicks the page - used to reset the message function.
    var page = document.getElementById('limiter');
    page.onclick = function () {
        document.title = 'WelcomeU Group Chat';
    }

    //updates the page
    if (amountint < current && check != 0){ //there is a new message and it isn't from the current user
        document.title = 'New Message! - WelcomeU Group Chat';

        //Notification Source https://notificationsounds.com/notification-sounds/when-604
        let source = 'sounds/notification.mp3';
        let notification = new Audio(source);
        notification.loop = false;
        notification.play();
        localStorage.setItem("messageAmount", current); //updates the local message amount
    }

    else{
        localStorage.setItem("messageAmount", current); //updates the local message amount
    }
}

function scrollBottom() {
    var objDiv = document.getElementById("messageBox");
    objDiv.scrollTop = objDiv.scrollHeight;
}
