function mainmenuAlertAnnouncement() { //currentInt, currentString

    //variables
    //gets the variable
    var amount = localStorage.getItem("announcmentNew"); //old message amount
    var current = localStorage.getItem("announcementOld"); //new message count;

    if (amount == null){
        amount = current;
    }

    var amountint = parseInt(amount);

    var page = document.getElementById('mmAnnoucementsLogo');
    page.onclick = function () {
        var theme = localStorage.getItem("theme");
        document.getElementById("mmAnnoucementsLogo").src="images/speaker.png"; //updates the image
        if (theme == "light"){
            document.getElementById("mmAnnoucementsLogo").src="images/speakerBlack.png"; //updates the image
        }
    }

    //updates the page
    if (amountint < current){ //there is a new message and it isn't from the current user
        var theme = localStorage.getItem("theme");
        localStorage.setItem("announcmentNew", current); //updates the local message amount
        document.getElementById("mmAnnoucementsLogo").src="images/speakerNotification.png"; //updates the image
        if (theme == "light"){
            document.getElementById("mmAnnoucementsLogo").src="images/speakerNptificationBlack.png"; //updates the image
        }
    }

    else{
        localStorage.setItem("announcmentNew", current); //updates the local message amount
    }
}