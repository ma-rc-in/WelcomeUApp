function alertFunction() { //currentInt, currentString
    //gets the variable
    var amount = localStorage.getItem("messageAmount"); //old message amount
    var current = localStorage.getItem("messageAmountLoad"); //new message count;
    //

    if (amount == null){
        amount = current;
    }

    var amountint = parseInt(amount);

    if (amountint < current){ //old amount new aa
        document.title = 'New Message! - WelcomeU Group Chat';
        //Notification Source https://notificationsounds.com/notification-sounds/when-604
        //let source = 'sounds/notification.mp3';
        //let notification = new Audio(source);
        //notification.loop = false;
        //notification.play();

            //If the User Clicks the page.
            var page = document.getElementById('limiter');
            page.onclick = function () {
                document.title = 'WelcomeU Group Chat';
                localStorage.setItem("messageAmount", current);
            }
    }
    else{
        document.title = 'WelcomeU Group Chat';
        //updates the variable
        localStorage.setItem("messageAmount", current);
    }
}