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
        notificationAlert();
        localStorage.setItem("messageAmount", current); //updates the local message amount
    }

    else{
        localStorage.setItem("messageAmount", current); //updates the local message amount
    }
}

function scrollBottom() {
   var element = document.getElementById('messageBox');
   element.scrollTop = element.scrollHeight;
}

function notificationAlert() {
    //Notification Source https://notificationsounds.com/notification-sounds/when-604
    let source = 'sounds/notification.mp3';
    let notification = new Audio(source);
    notification.loop = false;
    notification.volume = getVolume();
    notification.play();

}

function getVolume() {
    var volumeCheck = localStorage.getItem("volume");
    if(volumeCheck == "off"){
        if (document.getElementById("notificationSwitch") != null) {
            document.getElementById("notificationSwitch").checked = false;
        }
        var volume = 0;
    } else {
        if (document.getElementById("notificationSwitch") != null) {
            document.getElementById("notificationSwitch").checked = true;
        }
        var volume = 1;
    }
    return volume;
}

function setVolume() {
    if (document.getElementById("notificationSwitch").checked == true) {
        localStorage.setItem("volume", "on"); //updates the local message amount
    }
    else{
        localStorage.setItem("volume", "off"); //updates the local message amount
    }

}
