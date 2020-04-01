function alertFunction() { //currentInt, currentString
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

    if (amountint < current && check != 0){ //there is a new message and it isn't from the current user
        document.title = 'New Message! - WelcomeU Group Chat';

            //If the User Clicks the page.
            var page = document.getElementById('limiter');
            page.onclick = function () {
                document.title = 'WelcomeU Group Chat';
                localStorage.setItem("messageAmount", current); //updates the local message amount
            }
    }
    else{
        document.title = 'WelcomeU Group Chat';
        //updates the variable
        localStorage.setItem("messageAmount", current); //updates the local message amount
    }
}