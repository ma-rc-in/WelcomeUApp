function setLanguage() {
    var languageSelect = document.getElementById("languageValue");
    var languageValue = languageSelect.options[languageSelect.selectedIndex].value; //gets the value of the current selected option
    if (languageValue != "Default"){//makes sure that the default option is changed
        localStorage.setItem("language", languageValue);//saves the value
    }
}


function languageChange() {
    var language = localStorage.getItem("language");
    if (language == null){//checks to see if the user has a preference set, if not
        var defaultLanguage = "English";
        localStorage.setItem("language", defaultLanguage); //sets the default language to English (for first time users)

    }

    //gets the IDs of all menu areas
    //main Menu
        var mapMenu= document.getElementById("mapMenu");
        var groupChatMenu = document.getElementById("groupChatMenu");
        var helpMenu = document.getElementById("helpMenu");
        var annoucementsMenu= document.getElementById("annoucementsMenu");
        var enrolmentMenu = document.getElementById("enrolmentMenu");
        var settingsMenu= document.getElementById("settingsMenu");

    //login
        var llWelcomeU = document.getElementById("llWelcomeU");
        var llLoginMessage  = document.getElementById("llLoginMessage");
        var llStudentID = document.getElementById("llStudentID");
        var llPassword = document.getElementById("llPassword");
        var llsubmit= document.getElementById("llSubmit");

    //groupChat
        var courseNameTitleGroupChat = document.getElementById("gcCourseNameTitle");
        var yourMessageGroupChat = document.getElementById("gcYourMessage");
        var MessageContentBoxGroupChat = document.getElementById("gcMessageContentBox");
        var reportButtonGroupChat = document.getElementById("gcReportButton");
        var sendButtonGroupChat = document.getElementById("gcSendButton");
        var reportUserGroupChat = document.getElementById("gcReportUser");
        var userIDGroupChat = document.getElementById("gcUserID");
        var reasonLabelGroupChat = document.getElementById("gcReasonTitle");
        var reasonGroupChat = document.getElementById("gcReason");
        var reasonSelectGroupChat = document.getElementById("reportType");
        var commentGroupChat = document.getElementById("reportComment");
        var reportSubmitGroupChat = document.getElementById("gcReportSubmit");

    //self enrolment
        //selfEnrolmentForm
        var eeTitleOne= document.getElementById("eeTitleOne");
        var eeStepOne = document.getElementById("eeStepOne");
        var eePersonalDetails = document.getElementById("eePersonalDetails");
        var eeTitle= document.getElementById("eeTitle");
        var eeFirstName = document.getElementById("eeFirstName");
        var eeLastName= document.getElementById("eeLastName");
        var eeGender= document.getElementById("eeGender");
        var eePersonalEmail = document.getElementById("eePersonalEmail");
        var eeukMobile = document.getElementById("eeukMobile");
        var eeukMobile2 = document.getElementById("eeukMobile2");
        var eeEmergenceTitle = document.getElementById("eeEmergenceTitle");
        var eeEmergencyPerson= document.getElementById("eeEmergencyPerson");
        var eeEmergencyRelationship = document.getElementById("eeEmergencyRelationship");
        var country= document.getElementById("country");
        var eeContactNo = document.getElementById("eeContactNo");
        var eesubmit= document.getElementById("submit");
        //uploadPhoto
        var eeTitleTwo = document.getElementById("eeTitleTwo");
        var eeStepTwo= document.getElementById("eeStepTwo");
        var eeSmartCardCurrent = document.getElementById("eeSmartCardCurrent");
        var eeSmartCardUpload= document.getElementById("eeSmartCardUpload");
        var eeFilename = document.getElementById("eeFilename");
        var eesubmitTwo= document.getElementById("submit");
        //selfEnrolmentCompleted
        var eeSuccess = document.getElementById("eeSuccess");
        var eeComplete = document.getElementById("eeComplete");
        var eeLink = document.getElementById("eeLink");


    //English
    if (language == "English"){ //each page needs a try catch so that it can load without the other pages elements
        //Main Menu
        try {
            mapMenu.innerHTML = "Map";
            groupChatMenu.innerHTML = "Group Chat";
            helpMenu.innerHTML = "Help";
            annoucementsMenu.innerHTML = "Annoucements";
            enrolmentMenu.innerHTML = "Self Enrolment";
            settingsMenu.innerHTML = "Settings";
        } catch (e) {}

        //groupchat
        try {
            courseNameTitleGroupChat.innerHTML = "- Group Chat";
            yourMessageGroupChat.innerHTML = "Your Message:";
            MessageContentBoxGroupChat.placeholder = "Type your message here.";
            reportButtonGroupChat.innerHTML = "Report";
            sendButtonGroupChat.value = "Send";
            reportUserGroupChat.innerHTML = "Report a user";
            userIDGroupChat.innerHTML = "Please select the users ID you wish to report:";
            reasonLabelGroupChat.innerHTML =  "Please select why you are making this report:";
            reasonGroupChat.innerHTML = "Please explain why you are making this report:";
            reasonSelectGroupChat.options[0].text = "Spam";
            reasonSelectGroupChat.options[1].text = "Abusive Language/Content";
            reasonSelectGroupChat.options[2].text = "Inciting Violence";
            reasonSelectGroupChat.options[3].text = "Other (Please Comment Below)";
            commentGroupChat.placeholder = "Please comment here:";
            reportSubmitGroupChat.value = "Submit";
        }catch (e) {}

        //login
        try {
            llWelcomeU.innerHTML = "WelcomeU";
            llLoginMessage.innerHTML = "Please login with your university login";
            llStudentID.placeholder = "StudentID";
            llPassword.placeholder = "Password";
            llsubmit.value = "submit";
        } catch (e) {}

        //selfEnrolmentForm
        try {
            eeTitleOne.innerHTML = "Self-enrolment Form";
            eeStepOne.innerHTML = "Step 1 _ Please fill in the details";
            eePersonalDetails.innerHTML = "Personal Details";
            eeTitle.innerHTML = "Title:";
            eeFirstName.innerHTML = "First Name:";
            eeLastName.innerHTML = "Last Name:";
            eeGender.innerHTML = "Gender:";
            eePersonalEmail.innerHTML = "Personal Email Address:";
            eeukMobile.innerHTML = "UK Mobile No.:";
            eeukMobile2.innerHTML = "Please continue after +44 XXXX XXXXXX";
            eeEmergenceTitle.innerHTML = "Emergency Contact Details";
            eeEmergencyPerson.innerHTML = "Emergency Contact Person:";
            eeEmergencyRelationship.innerHTML = "Relationship:";
            country.options[0].text = "Parents";
            country.options[1].text = "Guardian";
            country.options[2].text = "Others";
            eeContactNo.innerHTML = "Contact No.:;";
            eesubmit.value = "Save & Next";
        }catch (e) {}
        //uploadPhoto
        try {
            eeTitleTwo.innerHTML = "Self-enrolment Form";
            eeStepTwo.innerHTML = "Step 2 _ Please upload a photos of you for your Student ID";
            eeSmartCardCurrent.innerHTML = "Current SmartCard Photo";
            eeSmartCardUpload.innerHTML = "Upload SmartCard Photo";
            eeFilename.innerHTML = "Filename:";
            eesubmitTwo.value = "Submit";
        }catch (e) {}
        //selfEnrolmentCompleted
        try {
            eeSuccess.innerHTML = "Congratulation!";
            eeComplete.innerHTML = "You have completed self-enrolment process.";
            eeLink.innerHTML = "Please click this <a style=\"color: #3498DB\" href=\"https://www.northumbria.ac.uk/study-at-northumbria/new-students/\">link</a> to view your programme induction timetable";
        }catch (e) {}

    }

}