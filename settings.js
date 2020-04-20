function setLanguage() {
    var languageSelect = document.getElementById("languageValue");
    var languageValue = languageSelect.options[languageSelect.selectedIndex].value; //gets the value of the current selected option
    if (languageValue != "Default"){//makes sure that the default option is changed
        localStorage.setItem("language", languageValue);//saves the value
    }
}

function setTheme() {
    var dark = document.getElementById("dark");

    if (dark.checked == true){
        localStorage.setItem("theme", "dark");//saves the value
    } else {
        localStorage.setItem("theme", "light");//saves the value
    }
}


function getTheme() {
    var themeCheck = localStorage.getItem("theme");
    var dark = document.getElementById("dark");
    var light = document.getElementById("light");
    if (themeCheck == "dark"){
        dark.checked = true;
        light.checked = false;
    }else {
        dark.checked = false;
        light.checked = true;
    }
}


function setHighContrast() {
    if (document.getElementById("contrastSwitch").checked == true) {
        localStorage.setItem("textContrast", "on"); //updates the local message amount
    }
    else{
        localStorage.setItem("textContrast", "off"); //updates the local message amount
    }
}

function getHighContrast() {
    var contrastCheck = localStorage.getItem("textContrast");
    if(contrastCheck == "off"){
        if (document.getElementById("contrastSwitch") != null) {
            document.getElementById("contrastSwitch").checked = false;
        }
    } else {
        if (document.getElementById("contrastSwitch") != null) {
            document.getElementById("contrastSwitch").checked = true;
        }
    }
}


function languageChange() {
    var language = localStorage.getItem("language");
    if (language == null) {//checks to see if the user has a preference set, if not
        var defaultLanguage = "English";
        localStorage.setItem("language", defaultLanguage); //sets the default language to English (for first time users)
    }

    //gets the IDs of all menu areas
    //main Menu
    var mmSmartCardBalance = document.getElementById("mmSmartCardBalance");
    var mapMenu = document.getElementById("mapMenu");
    var groupChatMenu = document.getElementById("groupChatMenu");
    var helpMenu = document.getElementById("helpMenu");
    var annoucementsMenu = document.getElementById("annoucementsMenu");
    var enrolmentMenu = document.getElementById("enrolmentMenu");
    var settingsMenu = document.getElementById("settingsMenu");

    var mmTextHeadermainMenuModal = document.getElementById("mmTextHeadermainMenuModal");
    var mmHelpMap = document.getElementById("mmHelpMap");
    var mmHelpGroupChat = document.getElementById("mmHelpGroupChat");
    var mmHelpHelp = document.getElementById("mmHelpHelp");
    var mmHelpAnnouncements = document.getElementById("mmHelpAnnouncements");
    var mmHelpEnrolment = document.getElementById("mmHelpEnrolment");
    var mmHelpSettings = document.getElementById("mmHelpSettings");

    //login
    var llWelcomeU = document.getElementById("llWelcomeU");
    var llLoginMessage = document.getElementById("llLoginMessage");
    var llStudentID = document.getElementById("inputTextCapsLockLogin");
    var llPassword = document.getElementById("inputTextCapsLockPass");
    var llsubmit = document.getElementById("llSubmit");
    var llcookieset = document.getElementById("llcookieset");
    var capsLockInfo = document.getElementById("capsLockInfo");
    var cookiewarning = document.getElementById("cookiewarning");
    var mmCookieMoreInfo = document.getElementById("mmCookieMoreInfo");
    var mmCookieAccept = document.getElementById("mmCookieAccept");
    var mmCookieInformationHeader = document.getElementById("mmCookieInformationHeader");
    var mminfo = document.getElementById("mminfo");
    var mminfo2 = document.getElementById("mminfo2");
    var mminfo3 = document.getElementById("mminfo3");
    var mminfo4 = document.getElementById("mminfo4");
    var mminfo5 = document.getElementById("mminfo5");
    var mmCookieButtonClose = document.getElementById("mmCookieButtonClose");
    var llforgotPassLabel = document.getElementById("llforgotPassLabel");


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
    var gcPinText = document.getElementById("gcPinText");
    var gcTextPinCheck = document.getElementById("gcTextPinCheck");
    var gcPinInput = document.getElementById("gcPinInput");
    var gcSubmitPin = document.getElementById("gcSubmitPin");

    //self enrolment
    //selfEnrolmentForm
    var eeTitleOne = document.getElementById("eeTitleOne");
    var eeStepOne = document.getElementById("eeStepOne");
    var eePersonalDetails = document.getElementById("eePersonalDetails");
    var eeTitle = document.getElementById("eeTitle");
    var eeFirstName = document.getElementById("eeFirstName");
    var eeLastName = document.getElementById("eeLastName");
    var eeGender = document.getElementById("eeGender");
    var eePersonalEmail = document.getElementById("eePersonalEmail");
    var eeukMobile = document.getElementById("eeukMobile");
    var eeukMobile2 = document.getElementById("eeukMobile2");
    var eeEmergenceTitle = document.getElementById("eeEmergenceTitle");
    var eeEmergencyPerson = document.getElementById("eeEmergencyPerson");
    var eeEmergencyRelationship = document.getElementById("eeEmergencyRelationship");
    var country = document.getElementById("country");
    var eeContactNo = document.getElementById("eeContactNo");
    var eesubmit = document.getElementById("submit");
    //uploadPhoto
    var eeTitleTwo = document.getElementById("eeTitleTwo");
    var eeStepTwo = document.getElementById("eeStepTwo");
    var eeSmartCardCurrent = document.getElementById("eeSmartCardCurrent");
    var eeSmartCardUpload = document.getElementById("eeSmartCardUpload");
    var eeFilename = document.getElementById("eeFilename");
    var eesubmitTwo = document.getElementById("submit");
    //selfEnrolmentCompleted
    var eeSuccess = document.getElementById("eeSuccess");
    var eeComplete = document.getElementById("eeComplete");
    var eeLink = document.getElementById("eeLink");
    var eeReturnBtn = document.getElementById("eeReturnBtn");

    //settings
    var ssTextSecurity = document.getElementById("ssTextSecurity");
    var ssButtonSecurity = document.getElementById("ssButtonSecurity");
    var ssTextNotifications = document.getElementById("ssTextNotifications");
    var ssFirstBtn = document.getElementById("ssFirstBtn");
    var ssTextLanguage = document.getElementById("ssTextLanguage");
    var ssSecondBtn = document.getElementById("ssSecondBtn");
    var gcUserID = document.getElementById("gcUserID");
    var ssTextModalNotifications = document.getElementById("ssTextModalNotifications");
    var ssTextTheme = document.getElementById("ssTextTheme");
    var ssThirdBtn = document.getElementById("ssThirdBtn");
    var ssThemeDark = document.getElementById("ssThemeDark");
    var ssThemeLight = document.getElementById("ssThemeLight");
    var ssTextContrast = document.getElementById("ssTextContrast");
    var ssTextContrastModal = document.getElementById("ssTextContrastModal");
    var ssTextContrast = document.getElementById("ssTextContrast");
    var ssFourthBtn = document.getElementById("ssFourthBtn");

    //userDashboard
    var udTextHeaderPass = document.getElementById("udTextHeaderPass");
    var udButtonTextFirstBtn = document.getElementById("udButtonTextFirstBtn");
    var udTextHeaderAccount = document.getElementById("udTextHeaderAccount");
    var udButtonTextSecondBtn = document.getElementById("udButtonTextSecondBtn");
    var udTextHeaderPin = document.getElementById("udTextHeaderPin");
    var udButtonTextThirdBtn = document.getElementById("udButtonTextThirdBtn");
    var udTextModalOldPassPlaceholder = document.getElementById("udTextModalOldPassPlaceholder");
    var udTextModalNewPassPlaceholder = document.getElementById("udTextModalNewPassPlaceholder");
    var udTextModalRepeatNewPassPlaceholder = document.getElementById("udTextModalRepeatNewPassPlaceholder");
    var udButtonTextSubmitButtonForPass = document.getElementById("udButtonTextSubmitButtonForPass");
    var udModalTextHeaderWarningNote = document.getElementById("udModalTextHeaderWarningNote");
    var udModalTextBodyWarningNote = document.getElementById("udModalTextBodyWarningNote");
    var udTextModalRepeatPassDeleteAccountPlaceholder = document.getElementById("udTextModalRepeatPassDeleteAccountPlaceholder");
    var udButtonTextSubmitButtonForDeleteAccount = document.getElementById("udButtonTextSubmitButtonForDeleteAccount");
    var udTextModalNewPinPlaceholder = document.getElementById("udTextModalNewPinPlaceholder");
    var udTextModalRepeatPinPlaceholder = document.getElementById("udTextModalRepeatPinPlaceholder");
    var udButtonTextSubmitButtonForChangePin = document.getElementById("udButtonTextSubmitButtonForChangePin");
    var udLogo = document.getElementById("udLogo");
    var udimagepass = document.getElementById("udimageremove");
    var udTextHeaderPass = document.getElementById("udTextHeaderPass");
    var udimageremove = document.getElementById("udimageremove");
    var udTextHeaderAccount = document.getElementById("udTextHeaderAccount");
    var udimagelock = document.getElementById("udimagelock");
    var udTextHeaderPin = document.getElementById("udTextHeaderPin");

    //userDashboardAdmin
    var udTextHeaderPass = document.getElementById("udTextHeaderPass");
    var udButtonTextFirstBtn = document.getElementById("udButtonTextFirstBtn");
    var udTextHeaderAccount = document.getElementById("udTextHeaderAccount");
    var udButtonTextSecondBtn = document.getElementById("udButtonTextSecondBtn");
    var udTextHeaderPin = document.getElementById("udTextHeaderPin");
    var udButtonTextThirdBtn = document.getElementById("udButtonTextThirdBtn");
    var udTextModalOldPassPlaceholder = document.getElementById("udTextModalOldPassPlaceholder");
    var udTextModalNewPassPlaceholder = document.getElementById("udTextModalNewPassPlaceholder");
    var udTextModalRepeatNewPassPlaceholder = document.getElementById("udTextModalRepeatNewPassPlaceholder");
    var udButtonTextSubmitButtonForPass = document.getElementById("udButtonTextSubmitButtonForPass");
    var udModalTextHeaderWarningNote = document.getElementById("udModalTextHeaderWarningNote");
    var udModalTextBodyWarningNote = document.getElementById("udModalTextBodyWarningNote");
    var udTextModalRepeatPassDeleteAccountPlaceholder = document.getElementById("udTextModalRepeatPassDeleteAccountPlaceholder");
    var udButtonTextSubmitButtonForDeleteAccount = document.getElementById("udButtonTextSubmitButtonForDeleteAccount");
    var udTextModalNewPinPlaceholder = document.getElementById("udTextModalNewPinPlaceholder");
    var udTextModalRepeatPinPlaceholder = document.getElementById("udTextModalRepeatPinPlaceholder");
    var udButtonTextSubmitButtonForChangePin = document.getElementById("udButtonTextSubmitButtonForChangePin");

    var udaTextHeaderReports = document.getElementById("udaTextHeaderReports");
    var udaTextHeaderAccessType = document.getElementById("udaTextHeaderAccessType");
    var udaTextHeaderBan = document.getElementById("udaTextHeaderBan");
    var udaTextHeaderAccessTypeModal = document.getElementById("udaTextHeaderAccessTypeModal");
    var udaTextHeaderBanUserModal = document.getElementById("udaTextHeaderBanUserModal");
    var udaTextHeaderBanUserModal1 = document.getElementById("udaTextHeaderBanUserModal1");

    //Map
    var mpSearch = document.getElementById("pac-input");

    //Help Services
    var hhErrorTitle  = document.getElementById("hhErrorTitle");
    var hhErrorMsg = document.getElementById("hhErrorMsg")
    var hhEmail = document.getElementById("hhEmail");
    var hhQuery = document.getElementById("hhQuery");
    var hhQueryInput = document.getElementById("hhQueryInput");
    var hsButtonText = document.getElementById("hsButtonText");
    var hhContactBtn = document.getElementById("hhContactBtn");
    var hsModalLabelText = document.getElementById("hsModalLabelText");
    var hsModalLabelText2 = document.getElementById("hsModalLabelText2");
    var hhFAQ1 = document.getElementById("hhFAQ1");
    var hhFAQ2 = document.getElementById("hhFAQ2");
    var hhFAQ3 = document.getElementById("hhFAQ3");
    var hhContact1 = document.getElementById("hhContact1");
    var hhContact2 = document.getElementById("hhContact2");
    var hhContact3 = document.getElementById("hhContact3");
    var hhFAQans1 = document.getElementById("hhFAQans1");
    var hhFAQans2 = document.getElementById("hhFAQans2");
    var hhFAQans3 = document.getElementById("hhFAQans3");
    var hhContact1c = document.getElementById("hhContact1c");
    var hhContact2c = document.getElementById("hhContact2c");
    var hhContact3c = document.getElementById("hhContact3c");
    var submit = document.getElementById("submit");

    //announcements student
    var aaStudentHeading = document.getElementById("aaStudentHeading");


    //English
    if (language == "English") { //each page needs a try catch so that it can load without the other pages elements
        //Main Menu
        try {
            mmSmartCardBalance.innerHTML = "Smart Card Balance:";
            mapMenu.innerHTML = "Map";
            groupChatMenu.innerHTML = "Group Chat";
            helpMenu.innerHTML = "Help";
            annoucementsMenu.innerHTML = "Annoucements";
            enrolmentMenu.innerHTML = "Self Enrolment";
            settingsMenu.innerHTML = "Settings";

            mmTextHeadermainMenuModal.innerHTML = "User Guide";
            mmHelpMap.innerHTML = "Map - Users can search Northumbria University's Newcastle city campus for guidance and directions to their destination.";
            mmHelpGroupChat.innerHTML = "Groupchat - Students can use the group chat service to connect with other students on their course, where they are able to message each other.";
            mmHelpHelp.innerHTML = "Help - Users can receive help by submitting enquiries, viewing the most frequently asked questions and asking our chat bot for help.";
            mmHelpAnnouncements.innerHTML = "Announcements - Users can receive announcements by lecturers on their course, allowing them to keep update to date with the most recent information. Lecturers can use this subsystem to keep students informed.";
            mmHelpEnrolment.innerHTML = "Self Enrolment - Users can enrol for their course by completing a quick form on the self enrolnment system. Changes to student details can also be updated on this form.";
            mmHelpSettings.innerHTML = "Settings - Users can change the applications language, theme and enable high contrast settings. Additionally, students will also be able to update their password, pin and delete their related data.";
        } catch (e) {
        }

        //groupchat
        try {
            courseNameTitleGroupChat.innerHTML = "- Group Chat";
            yourMessageGroupChat.innerHTML = "Your Message:";
            MessageContentBoxGroupChat.placeholder = "Type your message here.";
            reportButtonGroupChat.innerHTML = "Report";
            sendButtonGroupChat.value = "Send";
            reportUserGroupChat.innerHTML = "Report a user";
            userIDGroupChat.innerHTML = "Please select the users ID you wish to report:";
            reasonLabelGroupChat.innerHTML = "Please select why you are making this report:";
            reasonGroupChat.innerHTML = "Please explain why you are making this report:";
            reasonSelectGroupChat.options[0].text = "Spam";
            reasonSelectGroupChat.options[1].text = "Abusive Language/Content";
            reasonSelectGroupChat.options[2].text = "Inciting Violence";
            reasonSelectGroupChat.options[3].text = "Other (Please Comment Below)";
            commentGroupChat.placeholder = "Please comment here:";
            reportSubmitGroupChat.value = "Submit";

            gcPinText.innerHTML = "Pin Verification";
            gcTextPinCheck.innerHTML = "Please verify your PIN to continue:";
            gcPinInput.placeholder = "Enter your PIN";
            gcSubmitPin.value = "Submit";
        } catch (e) {
        }

        //login
        try {
            llWelcomeU.innerHTML = "WelcomeU";
            llLoginMessage.innerHTML = "Please login with your university login";
            llStudentID.placeholder = "StudentID";
            llPassword.placeholder = "Password";
            llsubmit.value = "submit";
            llcookieset.innerHTML = "Remember Username?";
            capsLockInfo.innerHTML = "*Be careful with your login and password, Caps Lock is ON*";
            llforgotPassLabel.innerHTML = "Forgot Password?";
        } catch (e) {
        }

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
        } catch (e) {
        }
        //uploadPhoto
        try {
            eeTitleTwo.innerHTML = "Self-enrolment Form";
            eeStepTwo.innerHTML = "Step 2 _ Please upload a photos of you for your Student ID";
            eeSmartCardCurrent.innerHTML = "Current SmartCard Photo";
            eeSmartCardUpload.innerHTML = "Upload SmartCard Photo";
            eeFilename.innerHTML = "Filename:";
            eesubmitTwo.value = "Submit";
        } catch (e) {
        }
        //selfEnrolmentCompleted
        try {
            eeSuccess.innerHTML = "Congratulation!";
            eeComplete.innerHTML = "You have completed self-enrolment process.";
            eeLink.innerHTML = "Please click this <a style=\"color: #3498DB\" href=\"https://www.northumbria.ac.uk/study-at-northumbria/new-students/\">link</a> to view your programme induction timetable";
            eeReturnBtn.innerHTML = "Return to Main Menu";
        } catch (e) {
        }

        //settings
        try {
            ssTextSecurity.innerHTML = "Security settings";
            ssButtonSecurity.innerHTML = "Change";
            ssTextNotifications.innerHTML = "Notifications settings";
            ssFirstBtn.innerHTML = "notifications settings";
            ssTextLanguage.innerHTML = "Change language";
            ssSecondBtn.innerHTML = "language";
            ssTextModalNotifications.innerHTML = "Enable notification alert sound?";
            ssTextTheme.innerHTML = "Change theme";
            ssThirdBtn.innerHTML = "Change theme";
            ssThemeDark.innerHTML = "Dark theme";
            ssThemeLight.innerHTML = "Light theme";
            ssTextContrast.innerHTML = "High Contrast";
            ssTextContrastModal.innerHTML = "Enable high contrast setting?";
            ssTextContrast.innerHTML = "Change contrast";
            ssFourthBtn.value = "Change";
        } catch (e) {
        }

        //userDashboard
        try {
            udTextHeaderPass.innerHTML = "Change password";
            udButtonTextFirstBtn.innerHTML = "Change";
            udTextHeaderAccount.innerHTML = "Delete account";
            udButtonTextSecondBtn.innerHTML = "Delete";
            udTextHeaderPin.innerHTML = "Set PIN";
            udButtonTextThirdBtn.innerHTML = "Set";

            //ERROR MESSAGE ID TRANSLATION????

            udTextModalOldPassPlaceholder.placeholder = "Enter your current password";
            udTextModalNewPassPlaceholder.placeholder = "Enter your new password";
            udTextModalRepeatNewPassPlaceholder.placeholder = "Repeat your new password";
            udButtonTextSubmitButtonForPass.innerHTML = "Submit";

            udModalTextHeaderWarningNote.innerHTML = "WARNING";
            udModalTextBodyWarningNote.innerHTML = "You are about to delete all data related to your account, so you will no longer be able to use this application. If you want to continue, please enter your current password below and click on 'submit'.";
            udTextModalRepeatPassDeleteAccountPlaceholder.placeholder = "Enter your password to delete your account";
            udButtonTextSubmitButtonForDeleteAccount.innerHTML = "Submit";

            udTextModalNewPinPlaceholder.placeholder = "Enter your new PIN";
            udTextModalRepeatPinPlaceholder.placeholder = "Repeat your new PIN";
            udButtonTextSubmitButtonForChangePin.innerHTML = "Submit";
        } catch (e) {
        }

        //map
        try {
            mpSearch.placeholder = "Type Northumbria...";
        } catch (e) {
        }

        //help services
        try {
            hhErrorTitle.innerHTML = "Error";
            hhErrorMsg.innerHTML = "Due to technical limitations, password can be only reset by our admin. <br>Please use the form to contact the admin in order to reset your password.";
            hhEmail.innerHTML = "Student Email Address:";
            hhQuery.innerHTML = "Your query:";
            hhQueryInput.placeholder = "Please write your query here...";
            hsButtonText.innerHTML = "See FAQ";
            hsModalLabelText.innerHTML = "FAQ";
            hhFAQ1.innerHTML = "Question 1: How do I reset my password?";
            hhFAQ2.innerHTML = "Question 2: Where can I change the websites settings?";
            hhFAQ3.innerHTML = "Question 3: I have further questions, where can I find support?";
            hhFAQans1.innerHTML = "You can reset your password by submitting a query to the admin team requesting a password change.";
            hhFAQans2.innerHTML = "You can change the various aspects of the website such as the theme and language in the settings menu.";
            hhFAQans3.innerHTML = "You could find find further frequently asked questions by searching here: https://libraryanswers.northumbria.ac.uk/search/";
            submit.value = "Submit";
            hhContactBtn.innerHTML = "Contact Us";
            hsModalLabelText2.innerHTML = "Help Services Contact";
            hhContact1.innerHTML = "Student Central";
            hhContact2.innerHTML = "Finance Enquiries";
            hhContact3.innerHTML = "Applicant Services";
            hhContact1c.innerHTML = "0191 227 4646 | ask4help@northumbria.ac.uk";
            hhContact2c.innerHTML = "0191 227 4050 | ask4help@northumbria.ac.uk";
            hhContact3c.innerHTML = "0191 4060901 | bc.applicantservices@northumbria.ac.uk";
        } catch (e) {
        }

        //userDashboardAdmin
        try {
            udaTextHeaderReports.innerHTML = "View reports";
            udaButtonTextFirstBtn.innerHTML  = "View";
            udaTextHeaderAccessType.innerHTML = "Assign access type";
            udaButtonTextSecondBtn.innerHTML = "Assign type";
            udaTextHeaderBan.innerHTML = "Ban user accounts";
            udaButtonTextThirdBtn.innerHTML = "Ban";
            udaTextHeaderBanUserModal.innerHTML = "The 'Dismiss' button can be used to reject a report so that it will not be longer displayed. <br><br>The 'Suspend' button will block the reported ID user so that the user will no longer be able to log in.";
            udaTextHeaderAccessTypeModal.innerHTML = "Access Type";
            udaTextHeaderBanUserModal1.innerHTML = "Please select the users ID you wish to Ban:";

        }catch (e) {}

        //announcement student
        try {
        aaStudentHeading.innerHTML = "Please select the module";
        }catch (e) {}
    }

    //Polish
    if (language == "Polish") {
        //Main Menu
        try {
            mapMenu.innerHTML = "Mapa";
            groupChatMenu.innerHTML = "Czat grupowy";
            helpMenu.innerHTML = "Wsparcie";
            annoucementsMenu.innerHTML = "Ogłoszenia";
            enrolmentMenu.innerHTML = "Rejestracja";
            settingsMenu.innerHTML = "Ustawienia";

            mmTextHeadermainMenuModal.innerHTML = "User Guide";
            mmHelpMap.innerHTML = "Map - Users can search Northumbria University's Newcastle city campus for guidance and directions to their destination.";
            mmHelpGroupChat.innerHTML = "Groupchat - Students can use the group chat service to connect with other students on their course, where they are able to message each other.";
            mmHelpHelp.innerHTML = "Help - Users can receive help by submitting enquiries, viewing the most frequently asked questions and asking our chat bot for help.";
            mmHelpAnnouncements.innerHTML = "Announcements - Users can receive announcements by lecturers on their course, allowing them to keep update to date with the most recent information. Lecturers can use this subsystem to keep students informed.";
            mmHelpEnrolment.innerHTML = "Self Enrolment - Users can enrol for their course by completing a quick form on the self enrolnment system. Changes to student details can also be updated on this form.";
            mmHelpSettings.innerHTML = "Settings - Users can change the applications language, theme and enable high contrast settings. Additionally, students will also be able to update their password, pin and delete their related data.";
            try {
                mmSmartCardBalance.innerHTML = "Saldo 'Smart Card'";
            } catch (e) {}
        } catch (e) {
        }

        //groupchat
        try {
            courseNameTitleGroupChat.innerHTML = "- Czat grupowy";
            yourMessageGroupChat.innerHTML = "Twoja wiadomość:";
            MessageContentBoxGroupChat.placeholder = "Wprowadź swoją wiadomość.";
            reportButtonGroupChat.innerHTML = "Zgłoś";
            sendButtonGroupChat.value = "Wyślij";
            reportUserGroupChat.innerHTML = "Zgłoś użytkownika";
            userIDGroupChat.innerHTML = "Wybierz użytkownika, którego chcesz zgłosić:";
            reasonLabelGroupChat.innerHTML = "Wybierz powód zgłoszenia:";
            reasonGroupChat.innerHTML = "Wyjaśnij czemu chcesz dokonać tego zgłoszenia:";
            reasonSelectGroupChat.options[0].text = "Spam";
            reasonSelectGroupChat.options[1].text = "Obraźliwy język/treści";
            reasonSelectGroupChat.options[2].text = "Podżeganie";
            reasonSelectGroupChat.options[3].text = "Inne (podaj więcej szczegółów poniżej)";
            commentGroupChat.placeholder = "Podaj więcej szczegółów dotyczących zgłoszenia:";
            reportSubmitGroupChat.value = "Wyślij";

            //TODO
            gcPinText.innerHTML = "Pin Verification";
            gcTextPinCheck.innerHTML = "Please verify your PIN to continue:";
            gcPinInput.placeholder = "Enter your PIN";
            gcSubmitPin.value = "Submit";
        } catch (e) {
        }

        //login
        try {
            llWelcomeU.innerHTML = "WelcomeU";
            llLoginMessage.innerHTML = "Please login with your university login";
            llStudentID.placeholder = "StudentID";
            llPassword.placeholder = "Password";
            llsubmit.value = "submit";
            llcookieset.innerHTML = "Remember Username?";
            capsLockInfo.innerHTML = "*Be careful with your login and password, Caps Lock is ON*";
            cookiewarning.innerHTML = "This website is using cookies and javascript local storage to improve your experience.";
            mmCookieMoreInfo.innerHTML = "More Information";
            mmCookieAccept.innerHTML = "Accept";
            mmCookieInformationHeader.innerHTML = "Cookie Information";
            mminfo.innerHTML = "This website uses cookies and javascript local storage to enhance your experience while using this website.";
            mminfo2.innerHTML = "We do this by using cookies to:";
            mminfo3.innerHTML = "Store your username to make it easier for you to login.";
            mminfo4.innerHTML = "We also use javascript local storage to:";
            mminfo5.innerHTML = "Save various settings you may use in our website, such as the theme, language or contrast settings.";
            mmCookieButtonClose.innerHTML = "Close";

        } catch (e) {
        }

        //settings
        try {
            ssTextSecurity.innerHTML = "Ustawienia bezpieczeństwa";
            ssButtonSecurity.innerHTML = "Zmień";
            ssTextNotifications.innerHTML = "Ustawienia powiadomień";
            ssFirstBtn.innerHTML = "Zmień powiadomienia";
            ssTextLanguage.innerHTML = "Zmień wyświetlany język";
            ssSecondBtn.innerHTML = "Zmień język";
            ssTextModalNotifications.innerHTML = "Czy chcesz włączyć dźwięk powiadomień?";
            ssTextTheme.innerHTML = "Ustawienia motywów";
            ssThirdBtn.innerHTML = "Zmień motyw";
            ssThemeDark.innerHTML = "Ciemny motyw";
            ssThemeLight.innerHTML = "Jasny motyw";
        } catch (e) {
        }

        //userDashboard
        try {
            udTextHeaderPass.innerHTML = "Zmiana hasła";
            udButtonTextFirstBtn.innerHTML = "Zmień hasło";
            udTextHeaderAccount.innerHTML = "Funkcja usuwania konta";
            udButtonTextSecondBtn.innerHTML = "Usuń konto";
            udTextHeaderPin.innerHTML = "Funkcja zmiany PINu";
            udButtonTextThirdBtn.innerHTML = "Zmień PIN";

            //ERROR MESSAGE ID TRANSLATION????

            udTextModalOldPassPlaceholder.placeholder = "Wprowadź obecne hasło";
            udTextModalNewPassPlaceholder.placeholder = "Wprowadź nowe hasło";
            udTextModalRepeatNewPassPlaceholder.placeholder = "Powtórz nowe hasło";
            udButtonTextSubmitButtonForPass.innerHTML = "Potwierdź";

            udModalTextHeaderWarningNote.innerHTML = "UWAGA";
            udModalTextBodyWarningNote.innerHTML = "Ta procedura wiąże się z usunięciem jakichkolwiek informacji związanych z tym kontem, co uniemożliwi dalesze korzystanie z serwisu. Jeśli chcesz kontynuować, wprowadź swoje hasło poniżej i kliknij 'Potwierdź'";
            udTextModalRepeatPassDeleteAccountPlaceholder.placeholder = "Wprowadź obecne hasło, aby dokończyć procedurę usunięcia konta";
            udButtonTextSubmitButtonForDeleteAccount.innerHTML = "Potwierdź";

            udTextModalNewPinPlaceholder.placeholder = "Wprowadź nowy PIN";
            udTextModalRepeatPinPlaceholder.placeholder = "Potwierdź nowy PIN";
            udButtonTextSubmitButtonForChangePin.innerHTML = "Potwierdź";
        } catch (e) {
        }

        //userDashboardAdmin
        try {
            udTextHeaderPass.innerHTML = "Zmiana hasła";
            udButtonTextFirstBtn.innerHTML = "Zmień hasło";
            udTextHeaderAccount.innerHTML = "Funkcja usuwania konta";
            udButtonTextSecondBtn.innerHTML = "Usuń konto";
            udTextHeaderPin.innerHTML = "Funkcja zmiany PINu";
            udButtonTextThirdBtn.innerHTML = "Zmień PIN";

            udTextModalOldPassPlaceholder.placeholder = "Wprowadź obecne hasło";
            udTextModalNewPassPlaceholder.placeholder = "Wprowadź nowe hasło";
            udTextModalRepeatNewPassPlaceholder.placeholder = "Powtórz nowe hasło";
            udButtonTextSubmitButtonForPass.innerHTML = "Potwierdź";

            udModalTextHeaderWarningNote.innerHTML = "UWAGA";
            udModalTextBodyWarningNote.innerHTML = "Ta procedura wiąże się z usunięciem jakichkolwiek informacji związanych z tym kontem, co uniemożliwi dalesze korzystanie z serwisu. Jeśli chcesz kontynuować, wprowadź swoje hasło poniżej i kliknij 'Potwierdź'";
            udTextModalRepeatPassDeleteAccountPlaceholder.placeholder = "Wprowadź obecne hasło, aby dokończyć procedurę usunięcia konta";
            udButtonTextSubmitButtonForDeleteAccount.innerHTML = "Potwierdź";

            udTextModalNewPinPlaceholder.placeholder = "Wprowadź nowy PIN";
            udTextModalRepeatPinPlaceholder.placeholder = "Potwierdź nowy PIN";
            udButtonTextSubmitButtonForChangePin.innerHTML = "Potwierdź";
        } catch (e) {
        }

        //selfEnrolmentForm
        try {
            eeTitleOne.innerHTML = "Formularz rejerstracji";
            eeStepOne.innerHTML = "Krok 1 _ Wypełnij podaną formę";
            eePersonalDetails.innerHTML = "Dane osobowe";
            eeTitle.innerHTML = "Zwrot:";
            eeFirstName.innerHTML = "Imię:";
            eeLastName.innerHTML = "Nazwisko:";
            eeGender.innerHTML = "Płeć:";
            eePersonalEmail.innerHTML = "Prywatny adres email:";
            eeukMobile.innerHTML = "Telefon komórkowy (UK).:";
            eeukMobile2.innerHTML = "Podaj numer komórkowy bez numeru kierunkowego - +44 XXXX XXXXXX";
            eeEmergenceTitle.innerHTML = "Telefon alarmowy do zaufanej osoby:";
            eeEmergencyPerson.innerHTML = "Dane personalne zaufanej osoby:";
            eeEmergencyRelationship.innerHTML = "Powiązanie z zaufaną osobą:";
            country.options[0].text = "Rodzic";
            country.options[1].text = "Opiekun";
            country.options[2].text = "Inne";
            eeContactNo.innerHTML = "Numer kontaktowy.:;";
            eesubmit.value = "Zapisz & Przejdź dalej";
        } catch (e) {
        }
        //uploadPhoto
        try {
            eeTitleTwo.innerHTML = "Formularz rejerstracji";
            eeStepTwo.innerHTML = "Krok 2 _ Wgraj zdjęcie do twojej legitymacji studenckiej";
            eeSmartCardCurrent.innerHTML = "Obecne 'SmartCard' zdjęcie";
            eeSmartCardUpload.innerHTML = "Wgraj 'SmartCard' zdjęcie";
            eeFilename.innerHTML = "Nazwa pliku:";
            eesubmitTwo.value = "Prześlij";
        } catch (e) {
        }
        //selfEnrolmentCompleted
        try {
            eeSuccess.innerHTML = "Gratulacje!";
            eeComplete.innerHTML = "Zakończyłeś proces rejerstracji pomyślnie.";
            eeLink.innerHTML = "Kliknij tutaj <a style=\"color: #3498DB\" href=\"https://www.northumbria.ac.uk/study-at-northumbria/new-students/\">link</a>, aby zobaczyć plan zajęć wprowadzających.";
        } catch (e) {
        }

        //map
        try {
            mpSearch.placeholder = "Napisz Northumbria...";
        } catch (e) {
        }

        //announcement student
        try {
            aaStudentHeading.innerHTML = "Please select the module";
        }catch (e) {}
    }
        //Chinese
        if (language == "Chinese") {
            //Main Menu
            try {

                mapMenu.innerHTML = "地图";
                groupChatMenu.innerHTML = "群聊";
                helpMenu.innerHTML = "帮助";
                annoucementsMenu.innerHTML = "通知";
                enrolmentMenu.innerHTML = "自助注册";
                settingsMenu.innerHTML = "设置";

                mmTextHeadermainMenuModal.innerHTML = "用户导航";
                mmHelpMap.innerHTML = "地图 - 用户可以搜索诺森比亚大学纽卡斯尔校区以获得到他们的目的地的指南和方向。";
                mmHelpGroupChat.innerHTML = "群聊 - 学生可以使用群组聊天功能与课程上的其他学生联系，在群聊界面里学生可以互相发送信息。";
                mmHelpHelp.innerHTML = "帮助 - 用户可以通过提交查询、查看最常见的问题和与我们的聊天机器人请求帮助来获得解决办法。";
                mmHelpAnnouncements.innerHTML = "通知 - 学生可以收到讲师关于他们课程的通知，并允许他们随时更新最新的信息。讲师可以使用这个子系统来通知学生。";
                mmHelpEnrolment.innerHTML = "自助注册 - 学生可以通过在自助注册系统中填写一个简洁的表格来完成自己的课程注册。学生资料的更新也可以在此表格中更改。";
                mmHelpSettings.innerHTML = "设置 - 用户可以更改应用程序的语言、主题和启用高对比度设置。此外，学生还可以更新他们的密码，pin码和删除他们的相关数据。";
                try {
                mmSmartCardBalance.innerHTML = "学生卡余额";
                } catch (e) {}
            } catch (e) {
            }
            //groupchat
            try {
                courseNameTitleGroupChat.innerHTML = "- 群聊";
                yourMessageGroupChat.innerHTML = "你的信息:";
                MessageContentBoxGroupChat.placeholder = "在此输入你的信息";
                reportButtonGroupChat.innerHTML = "举报";
                sendButtonGroupChat.value = "发送";
                reportUserGroupChat.innerHTML = "举报用户";
                userIDGroupChat.innerHTML = "请选择你要举报的用户ID:";
                reasonLabelGroupChat.innerHTML = "请选择你举报的原因:";
                reasonGroupChat.innerHTML = "请说明举报的原因:";
                reasonSelectGroupChat.options[0].text = "垃圾邮件";
                reasonSelectGroupChat.options[1].text = "辱骂语言/内容";
                reasonSelectGroupChat.options[2].text = "煽动暴力";
                reasonSelectGroupChat.options[3].text = "其他（请在下面评论）";
                commentGroupChat.placeholder = "请在这里评论:";
                reportSubmitGroupChat.value = "发送";

                //TODO
                gcPinText.innerHTML = "PIN码确认";
                gcTextPinCheck.innerHTML = "请确认PIN码以继续:";
                gcPinInput.placeholder = "输入你的PIN码";
                gcSubmitPin.value = "提交";
            } catch (e) {
            }
            //login
            try {
                llWelcomeU.innerHTML = "欢迎你";
                llLoginMessage.innerHTML = "请登陆你的学校账号";
                llStudentID.placeholder = "学生ID";
                llPassword.placeholder = "密码";
                llsubmit.value = "提交";
                llforgotPassLabel.innerHTML = "忘记密码?";

                llcookieset.innerHTML = "是否记住用户名？";
                capsLockInfo.innerHTML = "*注意你的登录名和密码，大写锁定开启*";
                cookiewarning.innerHTML = "本网站使用cookie和javascript本地存储来改善你的体验。";
                mmCookieMoreInfo.innerHTML = "更多信息";
                mmCookieAccept.innerHTML = "接受";
                mmCookieInformationHeader.innerHTML = "Cookie信息";
                mminfo.innerHTML = "本网站使用cookie和javascript本地存储来提高您使用本网站的体验。";
                mminfo2.innerHTML = "我们通过使用cookie来做到这一点:";
                mminfo3.innerHTML = "储存你的用户名，方便用户登入。";
                mminfo4.innerHTML = "我们也通过javascript本地存储来做到这一点:";
                mminfo5.innerHTML = "保存你可能在我们网站上使用的各种设置，如主题、语言或对比度设置。";
                mmCookieButtonClose.innerHTML = "关闭";
            } catch (e) {
            }
            //settings
            try {
                ssTextSecurity.innerHTML = "安全设置";
                ssButtonSecurity.innerHTML = "更改";
                ssTextNotifications.innerHTML = "通知设置";
                ssFirstBtn.innerHTML = "通知设置";
                ssTextLanguage.innerHTML = "更改语言";
                ssSecondBtn.innerHTML = "语言";
                ssTextModalNotifications.innerHTML = "是否允许通知时启用铃声？";
                ssTextTheme.innerHTML = "更换主题";
                ssThirdBtn.innerHTML = "更换主题";
                ssThemeDark.innerHTML = "暗夜主题";
                ssThemeLight.innerHTML = "白日主题";
                ssTextContrast.innerHTML = "高对比度";
                ssTextContrastModal.innerHTML = "允许高对比度设置？";
                ssTextContrast.innerHTML = "更改对比度";
                ssFourthBtn.innerHTML = "更改";
            } catch (e) {
            }

            //selfEnrolmentForm
            try {
                eeTitleOne.innerHTML = "自我注册表格";
                eeStepOne.innerHTML = "步骤1 _请填写详细信息";
                eePersonalDetails.innerHTML = "个人详细信息";
                eeTitle.innerHTML = "标题:";
                eeFirstName.innerHTML = "名字:";
                eeLastName.innerHTML = "姓氏:";
                eeGender.innerHTML = "性别:";
                eePersonalEmail.innerHTML = "个人电子邮件地址:";
                eeukMobile.innerHTML = "英国手机号码:";
                eeukMobile2.innerHTML = "请在+44 XXXX XXXXXX之后继续";
                eeEmergenceTitle.innerHTML = "紧急联系方式";
                eeEmergencyPerson.innerHTML = "紧急联系人:";
                eeEmergencyRelationship.innerHTML = "关系:";
                country.options[0].text = "父母";
                country.options[1].text = "监护人";
                country.options[2].text = "其他";
                eeContactNo.innerHTML = "联络号码:;";
                eesubmit.value = "保存并继续";
            } catch (e) {
            }
            //uploadPhoto
            try {
                eeTitleTwo.innerHTML = "自我注册表格";
                eeStepTwo.innerHTML = "步骤2 _请上传您的照片作为您的学生证";
                eeSmartCardCurrent.innerHTML = "目前所上传的学生证照片";
                eeSmartCardUpload.innerHTML = "上传照片";
                eeFilename.innerHTML = "文件名:";
                eesubmitTwo.value = "完成";
            } catch (e) {
            }
            //selfEnrolmentCompleted
            try {
                eeSuccess.innerHTML = "恭喜!";
                eeComplete.innerHTML = "您已完成自我注册过程";
                eeLink.innerHTML = "请点击这个 <a style=\"color: #3498DB\" href=\"https://www.northumbria.ac.uk/study-at-northumbria/new-students/\">链接</a> 查看您的新学期时间表";
                eeReturnBtn.value = "返回首页";
            } catch (e) {
            }

            //userDashboard
            try {
                udTextHeaderPass.innerHTML = "修改密码";
                udButtonTextFirstBtn.innerHTML = "修改";
                udTextHeaderAccount.innerHTML = "删除账户";
                udButtonTextSecondBtn.innerHTML = "删除";
                udTextHeaderPin.innerHTML = "设置PIN码";
                udButtonTextThirdBtn.innerHTML = "设置";

                //ERROR MESSAGE ID TRANSLATION????

                udTextModalOldPassPlaceholder.placeholder = "输入你现在的密码";
                udTextModalNewPassPlaceholder.placeholder = "输入你的新密码";
                udTextModalRepeatNewPassPlaceholder.placeholder = "再次输入你的新密码";
                udButtonTextSubmitButtonForPass.innerHTML = "提交";

                udModalTextHeaderWarningNote.innerHTML = "警告";
                udModalTextBodyWarningNote.innerHTML = "你正在删除你账户的所有数据, 这意味着你将无法再次使用本应用。 如果你决定继续, 请在下方输入你现在的密码并点击 '提交'.";
                udTextModalRepeatPassDeleteAccountPlaceholder.placeholder = "输入密码以删除账户";
                udButtonTextSubmitButtonForDeleteAccount.innerHTML = "提交";

                udTextModalNewPinPlaceholder.placeholder = "输入你的新PIN码";
                udTextModalRepeatPinPlaceholder.placeholder = "再次输入你的新PIN码";
                udButtonTextSubmitButtonForChangePin.innerHTML = "提交";
            } catch (e) {
            }

            //userDashboardAdmin
            try {
                udaTextHeaderReports.innerHTML = "查看报告";
                udaButtonTextFirstBtn.innerHTML  = "查看";
                udaTextHeaderAccessType.innerHTML = "分配访问类型";
                udaButtonTextSecondBtn.innerHTML = "分配类型";
                udaTextHeaderBan.innerHTML = "禁止用户帐户";
                udaButtonTextThirdBtn.innerHTML = "禁止";
                udaTextHeaderBanUserModal.innerHTML = "'Dismiss'按钮可以用来拒绝一个报告，这样它就不会显示得更久。 <br><br>'Suspend'按钮将阻止报告的ID用户，这样用户将不再能够登录。";
                udaTextHeaderAccessTypeModal.innerHTML = "访问类型";
                udaTextHeaderBanUserModal1.innerHTML = "请选择您希望禁止的用户ID:";
            }catch (e) {}

            //map
            try {
                mpSearch.placeholder = "输入 Northumbria...";
            } catch (e) {
            }

            //help services
            try {
                hhErrorTitle.innerHTML = "误";
                hhErrorMsg.innerHTML = "由于技术限制，只能由我们的管理员重置密码。 <br>请使用表格联系管理员，以重置密码。";
                hhEmail.innerHTML = "学生电子邮件地址：";
                hhQuery.innerHTML = "您的提问：";
                hhQueryInput.placeholder = "在这请写下你的提问...";
                hsButtonText.innerHTML = "查看常见问题";
                hsModalLabelText.innerHTML = "常见问题";
                hhFAQ1.innerHTML = "问题1：如何更改密码？";
                hhFAQ2.innerHTML = "问题2：在哪里可以更改网站设置？";
                hhFAQ3.innerHTML = "问题3：我还有其他问题，在哪里可以找到支持？";
                hhFAQans1.innerHTML = "您可以通过向管理团队提交查询以请求更改密码来更改密码。";
                hhFAQans2.innerHTML = "您可以在设置菜单中更改网站的各个方面，例如主题和语言。";
                hhFAQans3.innerHTML = "您可以在这里搜索找到更多的常见问题: https://libraryanswers.northumbria.ac.uk/search/";
                submit.value = "提交";
            } catch (e) {
            }

            //TODO sorry
            //announcement student
            try {
                aaStudentHeading.innerHTML = "Please select the module";
            }catch (e) {}

        }
}

function themeChange() {
    var theme = localStorage.getItem("theme");
    if (theme == null){//checks to see if the user has a preference set, if not
        var defaultTheme = "dark";
        localStorage.setItem("theme", defaultTheme); //sets the default theme to dark (for first time users)
    }

    //main menu
    //Background
    var mmSmartCardBalance = document.getElementById("mmSmartCardBalance");
    var mmBalance = document.getElementById("mmBalance");
    var backgroundMenu = document.getElementById("mmbackground");
    var mapMenu= document.getElementById("mmMapBackground");
    var groupChatMenu = document.getElementById("mmGroupChatBackground");
    var helpMenu = document.getElementById("mmHelpBackground");
    var annoucementsMenu= document.getElementById("mmAnnoucementsBackground");
    var enrolmentMenu = document.getElementById("mmEnrolmentBackground");
    var settingsMenu= document.getElementById("mmSettingsBackground");
    var mmHelpGuide= document.getElementById("mmHelpGuide");
    //Text
    var mapMenuText= document.getElementById("mapMenu");
    var groupChatMenuText = document.getElementById("groupChatMenu");
    var helpMenuText = document.getElementById("helpMenu");
    var annoucementsMenuText= document.getElementById("annoucementsMenu");
    var enrolmentMenuText = document.getElementById("enrolmentMenu");
    var settingsMenuText= document.getElementById("settingsMenu");
    //ICONS
    var menuLogo = document.getElementById("mmNULogo");
    var mmMapLogo = document.getElementById("mmMapLogo");
    var groupChatLogo = document.getElementById("groupChat");
    var helpLogo = document.getElementById("mmHelpLogo");
    var annoucementsLogo = document.getElementById("mmAnnoucementsLogo");
    var enrolmentLogo = document.getElementById("mmEnrolmentLogo");
    var settingsLogo = document.getElementById("mmSettingsLogo");
    var logoutLogo = document.getElementById("mmLogoutLogo");
    var mmlgroupChat = document.getElementById("mmlgroupChat");
    var mmEnrolmentLogoBlocked = document.getElementById("mmEnrolmentLogoBlocked");

    //settings
    var ssTextSecurity = document.getElementById("ssTextSecurity");
    var ssTextNotifications = document.getElementById("ssTextNotifications");
    var ssTextLanguage = document.getElementById("ssTextLanguage");
    var ssTextContrast = document.getElementById("ssTextContrast");
    var stLogo = document.getElementById("stLogo");
    var stContainer = document.getElementById("stContainer");
    var securityBackground = document.getElementById("securityBackground");
    var securityLogo = document.getElementById("securityLogo");
    var ssButtonSecurity = document.getElementById("ssButtonSecurity");
    var notificationBackground = document.getElementById("notificationBackground");
    var notificationLogo = document.getElementById("notificationLogo");
    var ssTextTheme = document.getElementById("ssTextTheme");
    var ssFirstBtn = document.getElementById("ssFirstBtn");
    var languageBackground = document.getElementById("languageBackground");
    var languageLogo = document.getElementById("languageLogo");
    var ssSecondBtn = document.getElementById("ssSecondBtn");
    var themeBackground = document.getElementById("themeBackground");
    var themeLogo = document.getElementById("themeLogo");
    var ssThirdBtn = document.getElementById("ssThirdBtn");
    var contrastBackground = document.getElementById("contrastBackground");
    var contrastLogo = document.getElementById("contrastLogo");
    var ssFourthBtn = document.getElementById("ssFourthBtn");

    //userdashboard
    var udLogo = document.getElementById("udLogo");
    var udimagepass = document.getElementById("udimagepass");
    var udTextHeaderPass = document.getElementById("udTextHeaderPass");
    var udimageremove = document.getElementById("udimageremove");
    var udTextHeaderAccount = document.getElementById("udTextHeaderAccount");
    var udimagelock = document.getElementById("udimagelock");
    var udTextHeaderPin = document.getElementById("udTextHeaderPin");
    var udContainer = document.getElementById("udContainer");
    var udPatchButton = document.getElementById("udPatchButton");
    var udPatch2 = document.getElementById("udPatch2");
    var udPatch3 = document.getElementById("udPatch3");
    var udButtonTextFirstBtn = document.getElementById("udButtonTextFirstBtn");
    var udButtonTextSecondBtn = document.getElementById("udButtonTextSecondBtn");
    var udButtonTextThirdBtn = document.getElementById("udButtonTextThirdBtn");

    //userdashboardadmin
    var udaContainer = document.getElementById("udaContainer");
    var udaLogo = document.getElementById("udaLogo");
    var rlPatchButton = document.getElementById("rlPatchButton");
    var rlImage = document.getElementById("rlImage");
    var udaTextHeaderReports = document.getElementById("udaTextHeaderReports");
    var udaButtonTextFirstBtn = document.getElementById("udaButtonTextFirstBtn");
    var atPatchButton = document.getElementById("atPatchButton");
    var atImage = document.getElementById("atImage");
    var udaTextHeaderAccessType = document.getElementById("udaTextHeaderAccessType");
    var udaButtonTextSecondBtn = document.getElementById("udaButtonTextSecondBtn");
    var pkPatchButton = document.getElementById("pkPatchButton");
    var pkImage = document.getElementById("pkImage");
    var udaTextHeaderBan = document.getElementById("udaTextHeaderBan");
    var udaButtonTextThirdBtn = document.getElementById("udaButtonTextThirdBtn");

    //Login
    var llLogo = document.getElementById("llLogo");
    var llWrapLogin  = document.getElementById("llWrapLogin");
    var llContainerLogin  = document.getElementById("llContainerLogin");
    var llWelcomeU = document.getElementById("llWelcomeU");
    var llLoginMessage  = document.getElementById("llLoginMessage");

    //announcementsStudent
    var asContainer = document.getElementById("asContainer");
    var asImage  = document.getElementById("asImage");
    var asBack  = document.getElementById("asBack");
    var aaStudentHeading = document.getElementById("aaStudentHeading");
    var limiter = document.getElementById("limiter");

    //announcementsLecturer
    var udLogo = document.getElementById("udLogo");
    var gcBack  = document.getElementById("gcBack");
    var alContainer = document.getElementById("alContainer");
    var alTextFillForm = document.getElementById("alTextFillForm");
    var alTextModule = document.getElementById("alTextModule");
    var alTextSubject = document.getElementById("alTextSubject");
    var alTextMessage  = document.getElementById("alTextMessage");

    //groupChat
    var gcBack= document.getElementById("gcBack");
    var gcLogo = document.getElementById("gcLogo");
    var gcBackground = document.getElementById("gcBackground");
    var gcYourMessage= document.getElementById("gcYourMessage");
    var gcMessageContentBox = document.getElementById("gcMessageContentBox");
    var gcContainer = document.getElementById("gcContainer");
    var gcLimiter = document.getElementById("limiter");
    var gcChatContainer = document.getElementById("gcChatContainer");
    var gcCourseNameEcho = document.getElementById("gcCourseNameEcho");
    var gcCourseNameTitle = document.getElementById("gcCourseNameTitle");

    //map
    var mapLogo = document.getElementById("mapLogo");
    var mapContainer = document.getElementById("mapContainer");
    var mpSearch = document.getElementById("pac-input");

    //enrolment
    var eeLogo = document.getElementById("eeLogo");
    var enrolmentContainer = document.getElementById("eeContainer");
    var eeTitleOne = document.getElementById("eeTitleOne");
    var eeStepOne = document.getElementById("eeStepOne");

    // help services
    var hhLogo = document.getElementById("hhLogo");
    var hhBackground = document.getElementById("hhBackground");
    var hhFAQbtn = document.getElementById("hhFAQbtn");
    var hhContactUsBtn = document.getElementById("hhContactUsBtn");
    //Light Theme
    if (theme == "light"){
        //Main Menu
        try {
            document.body.style.backgroundColor = "white";
            backgroundMenu.style.backgroundColor = "white";
            mapMenu.style.backgroundColor = "white";
            groupChatMenu.style.backgroundColor = "white";
            helpMenu.style.backgroundColor = "white";
            annoucementsMenu.style.backgroundColor = "white";
            enrolmentMenu.style.backgroundColor = "white";
            settingsMenu.style.backgroundColor = "white";
            mapMenuText.style.color = "black";
            groupChatMenuText.style.color = "black";
            helpMenuText.style.color = "black";
            annoucementsMenuText.style.color = "black";
            enrolmentMenuText.style.color = "black";
            settingsMenuText.style.color = "black";
            menuLogo.src="images/logoBlack.png";
            mmMapLogo.src="images/maps-and-flagsBlack.png";
            helpLogo.src="images/questionBlack.png";
            annoucementsLogo.src="images/speakerBlack.png";
            settingsLogo.src="images/settingsBlack.png";
            logoutLogo.src="images/logoutBlack.png";

            try {
                mmSmartCardBalance.style.color = "black";
                mmBalance.style.color = "black";
                mmHelpGuide.src="images/guideBlack.png";
                groupChatLogo.src="images/chatBlack.png";
                enrolmentLogo.src="images/checklistBlack.png";
            } catch (e) {}
            try {
                mmEnrolmentLogoBlocked.src="images/checklistBlockBlack.png";
                mmlgroupChat.src="images/chatBlockBlack.png";
            } catch (e) {}
        } catch (e) {}

        //settings
        try {
            ssTextTheme.style.backgroundColor = "white";
            ssTextTheme.style.color = "black";
            ssTextSecurity.style.backgroundColor = "white";
            ssTextNotifications.style.backgroundColor = "white";
            ssTextLanguage.style.backgroundColor = "white";
            ssTextContrast.style.backgroundColor = "white";
            ssTextSecurity.style.color = "black";
            ssTextNotifications.style.color = "black";
            ssTextLanguage.style.color = "black";
            ssTextContrast.style.color = "black";

            stContainer.style.backgroundColor = "white";
            securityBackground.style.backgroundColor = "white";
            notificationBackground.style.backgroundColor = "white";
            languageBackground.style.backgroundColor = "white";
            themeBackground.style.backgroundColor = "white";
            contrastBackground.style.backgroundColor = "white";
            ssButtonSecurity.style.color = "black";
            ssButtonSecurity.style.borderColor = "black";
            ssFirstBtn.style.color = "black";
            ssFirstBtn.style.borderColor = "black";
            ssSecondBtn.style.color = "black";
            ssSecondBtn.style.borderColor = "black";
            ssThirdBtn.style.color = "black";
            ssThirdBtn.style.borderColor = "black";
            ssFourthBtn.style.color = "black";
            ssFourthBtn.style.borderColor = "black";
            stLogo.src="images/logoBlack.png";
            securityLogo.src="images/securityBlack.png";
            notificationLogo.src="images/notificationSettingsBlack.png";
            languageLogo.src="images/languageBlack.png";
            themeLogo.src="images/themeBlack.png";
            contrastLogo.src="images/contrastBlack.png";
        } catch (e) {}

        //userdashboard
        try{
            document.body.style.backgroundColor = "white";
            udContainer.style.backgroundColor = "white";
            udLogo.src="images/logoBlack.png";
            udPatch2.style.backgroundColor = "white";
            udPatch3.style.backgroundColor = "white";
            udimagepass.src="images/passBlack.png";
            udimagepass.style.backgroundColor = "white";
            udTextHeaderPass.style.backgroundColor = "white";
            udTextHeaderPass.style.color = "black";
            udimageremove.src="images/removeBlack.png";
            udimageremove.style.backgroundColor = "white";
            udTextHeaderAccount.style.backgroundColor = "white";
            udTextHeaderAccount.style.color = "black";
            udimagelock.src="images/lockBlack.png";
            udButtonTextFirstBtn.style.color = "black";
            udButtonTextSecondBtn.style.color = "black";
            udButtonTextThirdBtn.style.color = "black";
            udButtonTextFirstBtn.style.borderColor = "black";
            udButtonTextSecondBtn.style.borderColor = "black";
            udButtonTextThirdBtn.style.borderColor = "black";
            udimagelock.style.backgroundColor = "white";
            udTextHeaderPin.style.backgroundColor = "white";
            udTextHeaderPin.style.color = "black";
            udPatchButton.style.backgroundColor = "white";
        }catch (e) {}
        //userdashboardadmin
        try{
            document.body.style.backgroundColor = "white";
            udaContainer.style.backgroundColor = "white";
            rlPatchButton.style.backgroundColor = "white";
            atPatchButton.style.backgroundColor = "white";
            pkPatchButton.style.backgroundColor = "white";
            udaLogo.src="images/logoBlack.png";
            rlImage.src="images/reportsListBlack.png";
            atImage.src="images/accessTypeBlack.png";
            pkImage.src="images/banBlack.png";
            udaButtonTextFirstBtn.style.color = "black";
            udaButtonTextSecondBtn.style.color = "black";
            udaButtonTextThirdBtn.style.color = "black";
            udaButtonTextFirstBtn.style.borderColor = "black";
            udaButtonTextSecondBtn.style.borderColor = "black";
            udaButtonTextThirdBtn.style.borderColor = "black";
            udaTextHeaderReports.style.backgroundColor = "white";
            udaTextHeaderReports.style.color = "black";
            udaTextHeaderAccessType.style.backgroundColor = "white";
            udaTextHeaderAccessType.style.color = "black";
            udaTextHeaderBan.style.backgroundColor = "white";
            udaTextHeaderBan.style.color = "black";
        }catch (e) {}

        //login
        try {
            llLogo.src="images/logo_white.png";
            llWrapLogin.style.backgroundColor = "black";
            llContainerLogin.style.backgroundColor = "white";
            llWelcomeU.style.backgroundColor = "black";
            llLoginMessage.style.backgroundColor = "black";
            llWelcomeU.style.color = "white";
            llLoginMessage.style.color = "white";
        } catch (e) {}

        //announcementsStudent
        try {
            aaStudentHeading.style.color = "black";
            limiter.style.backgroundColor = "white";
            asImage.src="images/logoBlack.png";
            asContainer.style.backgroundColor = "white";
            asBack.src="images/backBlack.png";

        } catch (e) {}

        //announcementsLecturer
        try {
            udLogo.src="images/logoBlack.png";
            gcBack.src="images/backBlack.png";
            alContainer.style.backgroundColor = "grey";

            alTextFillForm.style.color = "white";
            alTextModule.style.color = "white";
            alTextSubject.style.color = "white";
            alTextMessage.style.color = "white";
        } catch (e) {}

        //GroupChat
        try {
            document.body.style.backgroundColor = "white";
            gcBack.src="images/backBlack.png";
            gcLogo.src="images/logoBlack.png";
            gcContainer.style.backgroundColor = "white";
            gcLimiter.style.backgroundColor = "white";
            gcChatContainer.style.backgroundColor = "white";
            gcBackground.style.backgroundColor = "grey";
            gcYourMessage.style.backgroundColor = "white";
            gcYourMessage.style.color = "black";
            gcCourseNameEcho.style.color = "black";
            gcMessageContentBox.style.backgroundColor = "grey";
            gcCourseNameTitle.style.color = "black";
        } catch (e) {}

        //map
        try {
            mapLogo.src="images/logoBlack.png";
            mapContainer.style.backgroundColor = "white";
            mpSearch.style.backgroundColor = "grey";
        } catch (e) {}

        //enrolment
        try {
            eeLogo.src="images/logoBlack.png";
            enrolmentContainer.style.backgroundColor = "white";
            eeTitleOne.style.color = "black";
            eeStepOne.style.color = "black";
        } catch (e) {}

        // help services
        try {
            hhLogo.src="images/logoBlack.png";
            hhBackground.style.backgroundColor = "white";
            hhFAQbtn.style.backgroundColor = "white";
            hhContactUsBtn.style.backgroundColor = "white";
            hsButtonText.style.color = "black";
            hhContactBtn.style.color = "black";
            hsButtonText.style.borderColor = "grey";
            hhContactBtn.style.borderColor = "grey";
        } catch (e) {}

    }

    //Dark theme
    if (theme == "dark"){
        //Main Menu
        try {
            document.body.style.backgroundColor = "black";
            backgroundMenu.style.backgroundColor = "black";
            mapMenu.style.backgroundColor = "black";
            mmSmartCardBalance.style.color = "white";
            mmBalance.style.color = "white";
            groupChatMenu.style.backgroundColor = "black";
            helpMenu.style.backgroundColor = "black";
            annoucementsMenu.style.backgroundColor = "black";
            enrolmentMenu.style.backgroundColor = "black";
            settingsMenu.style.backgroundColor = "black";
            mapMenuText.style.color = "white";
            groupChatMenuText.style.color = "white";
            helpMenuText.style.color = "white";
            annoucementsMenuText.style.color = "white";
            enrolmentMenuText.style.color = "white";
            settingsMenuText.style.color = "white";
            menuLogo.src="images/logo_white.png";
            mmMapLogo.src="images/maps-and-flags.png";
            groupChatLogo.src="images/chat.png";
            helpLogo.src="images/question.png";
            annoucementsLogo.src="images/speaker.png";
            enrolmentLogo.src="images/checklist.png";
            settingsLogo.src="images/settings.png";
            logoutLogo.src="images/logout.png";
        } catch (e) {}

        //login
        try {
            llLogo.src="images/logoBlack.png";
            llWrapLogin.style.backgroundColor = "white";
            llContainerLogin.style.backgroundColor = "black";
            llWelcomeU.style.backgroundColor = "white";
            llLoginMessage.style.backgroundColor = "white";
            llWelcomeU.style.color = "grey";
            llLoginMessage.style.color = "black";
        } catch (e) {}

        //GroupChat
        try {
            document.body.style.backgroundColor = "black";
            gcCourseNameEcho.style.color = "white";
            gcBack.src="images/back.png";
            gcLogo.src="images/logo_white.png";
            gcContainer.style.backgroundColor = "black";
            gcLimiter.style.backgroundColor = "black";
            gcChatContainer.style.backgroundColor = "black";
            gcBackground.style.backgroundColor = "grey";
            gcYourMessage.style.backgroundColor = "black";
            gcYourMessage.style.color = "white";
            gcMessageContentBox.style.backgroundColor = "white";
            gcCourseNameTitle.style.color = "white";
        } catch (e) {}

        // help services
        try {
            hhLogo.src="images/logo_white.png";
            hhBackground.style.backgroundColor = "black";
            hhFAQbtn.style.backgroundColor = "black";
            hhContactUsBtn.style.backgroundColor = "black";
            hsButtonText.style.color = "white";
            hhContactBtn.style.color = "white";
            hsButtonText.style.borderColor = "white";
            hhContactBtn.style.borderColor = "white";
        } catch (e) {}
    }
}

function highContrast() {
    var text = localStorage.getItem("textContrast");
    if (text == null) {//checks to see if the user has a preference set, if not
        var defaultText = "off";
        localStorage.setItem("textContrast", defaultText); //sets the default to off (needs to be enabled by the user)
    }

    var theme = localStorage.getItem("theme");

    //main menu
    var mmSmartCardBalance = document.getElementById("mmSmartCardBalance");
    var mmBalance = document.getElementById("mmBalance");
    var mapMenuText = document.getElementById("mapMenu");
    var groupChatMenuText = document.getElementById("groupChatMenu");
    var helpMenuText = document.getElementById("helpMenu");
    var annoucementsMenuText = document.getElementById("annoucementsMenu");
    var enrolmentMenuText = document.getElementById("enrolmentMenu");
    var settingsMenuText = document.getElementById("settingsMenu");

    var mmTextHeadermainMenuModal = document.getElementById("mmTextHeadermainMenuModal");
    var mmHelpMap = document.getElementById("mmHelpMap");
    var mmHelpGroupChat = document.getElementById("mmHelpGroupChat");
    var mmHelpHelp = document.getElementById("mmHelpHelp");
    var mmHelpAnnouncements = document.getElementById("mmHelpAnnouncements");
    var mmHelpEnrolment = document.getElementById("mmHelpEnrolment");
    var mmHelpSettings = document.getElementById("mmHelpSettings");

    //login
    var llWelcomeU = document.getElementById("llWelcomeU");
    var llLoginMessage  = document.getElementById("llLoginMessage");
    var llsubmit= document.getElementById("llSubmit");

    //GroupChat
    var gcCourseNameEcho = document.getElementById("gcCourseNameEcho");
    var courseNameTitleGroupChat = document.getElementById("gcCourseNameTitle");
    var yourMessageGroupChat = document.getElementById("gcYourMessage");
    var MessageContentBoxGroupChat = document.getElementById("gcMessageContentBox");
    var reportButtonGroupChat = document.getElementById("gcReportButton");
    var sendButtonGroupChat = document.getElementById("gcSendButton");
    var reportUserGroupChat = document.getElementById("gcReportUser");
    var userIDGroupChat = document.getElementById("gcUserID");
    var reasonLabelGroupChat = document.getElementById("gcReasonTitle");
    var reasonGroupChat = document.getElementById("gcReason");
    var reportSubmitGroupChat = document.getElementById("gcReportSubmit");
    var gcPinText = document.getElementById("gcPinText");
    var gcTextPinCheck = document.getElementById("gcTextPinCheck");
    var gcSubmitPin = document.getElementById("gcSubmitPin");

    //settings
    var ssTextSecurity = document.getElementById("ssTextSecurity");
    var stContainer = document.getElementById("stContainer");
    var securityLogo = document.getElementById("securityLogo");
    var ssButtonSecurity = document.getElementById("ssButtonSecurity");
    var ssFirstBtn = document.getElementById("ssFirstBtn");
    var ssSecondBtn = document.getElementById("ssSecondBtn");
    var ssThirdBtn = document.getElementById("ssThirdBtn");
    var ssFourthBtn = document.getElementById("ssFourthBtn");
    var ssTextNotifications = document.getElementById("ssTextNotifications");
    var ssTextContrast = document.getElementById("ssTextContrast");
    var ssTextContrastModal = document.getElementById("ssTextContrastModal");
    var ssTextTheme = document.getElementById("ssTextTheme");
    var ssThemeDark = document.getElementById("ssThemeDark");
    var ssThemeLight = document.getElementById("ssThemeLight");
    var ssTextLanguage = document.getElementById("ssTextLanguage");
    var ssTextModalNotifications = document.getElementById("ssTextModalNotifications");

    //userdashboard
    var udLogo = document.getElementById("udLogo");
    var udimagepass = document.getElementById("udimagepass");
    var udTextHeaderPass = document.getElementById("udTextHeaderPass");
    var udimageremove = document.getElementById("udimageremove");
    var udTextHeaderAccount = document.getElementById("udTextHeaderAccount");
    var udimagelock = document.getElementById("udimagelock");
    var udTextHeaderPin = document.getElementById("udTextHeaderPin");
    var udContainer = document.getElementById("udContainer");
    var udPatchButton = document.getElementById("udPatchButton");
    var udPatch2 = document.getElementById("udPatch2");
    var udPatch3 = document.getElementById("udPatch3");
    var udButtonTextFirstBtn = document.getElementById("udButtonTextFirstBtn");
    var udButtonTextSecondBtn = document.getElementById("udButtonTextSecondBtn");
    var udButtonTextThirdBtn = document.getElementById("udButtonTextThirdBtn");
    var disabledText = document.getElementById("disabledText");

    //userdashboardadmin
    var udaTextHeaderReports = document.getElementById("udaTextHeaderReports");
    var udaButtonTextFirstBtn = document.getElementById("udaButtonTextFirstBtn");
    var udaTextHeaderAccessType = document.getElementById("udaTextHeaderAccessType");
    var udaButtonTextSecondBtn = document.getElementById("udaButtonTextSecondBtn");
    var udaTextHeaderBan = document.getElementById("udaTextHeaderBan");
    var udaButtonTextThirdBtn = document.getElementById("udaButtonTextThirdBtn");
    var udaTextHeaderBanModal = document.getElementById("udaTextHeaderBanUserModal");
    var udaTextHeaderAccessTypeModal = document.getElementById("udaTextHeaderAccessTypeModal");
    var udaTextHeaderBanUserModal = document.getElementById("udaTextHeaderBanUserModal");
    var udaTextHeaderBanUserModal1 = document.getElementById("udaTextHeaderBanUserModal1");

    //announcements student
    var aaStudentHeading = document.getElementById("aaStudentHeading");
    var adminButtons = document.getElementsByClassName('adminButtons');

    if (text == "on" && theme == "dark") {
        //mainMenu
        try {
            try {
                mmSmartCardBalance.style.color = "orange";
                mmBalance.style.color = "orange";
            }catch (e) {}
            mapMenuText.style.color = "orange";
            groupChatMenuText.style.color = "orange";
            helpMenuText.style.color = "orange";
            annoucementsMenuText.style.color = "orange";
            enrolmentMenuText.style.color = "orange";
            settingsMenuText.style.color = "orange";
            mmTextHeadermainMenuModal.style.color = "orange";
            mmHelpMap.style.color = "orange";
            mmHelpGroupChat.style.color = "orange";
            mmHelpHelp.style.color = "orange";
            mmHelpAnnouncements.style.color = "orange";
            mmHelpEnrolment.style.color = "orange";
            mmHelpSettings.style.color = "orange";

        }catch (e) {}

        //login
        try {
            llWelcomeU.style.color = "black";
            llLoginMessage.style.color = "black";
            llsubmit.style.color = "orange";
        }catch (e) {}

        //groupChat
        try {
            gcCourseNameEcho.style.color = "orange";
            courseNameTitleGroupChat.style.color = "orange";
            yourMessageGroupChat.style.color = "orange";
            MessageContentBoxGroupChat.style.color = "black";
            reportButtonGroupChat.style.color = "orange";
            sendButtonGroupChat.style.color = "orange";
            reportUserGroupChat.style.color = "orange";
            userIDGroupChat.style.color = "orange";
            reasonLabelGroupChat.style.color = "orange";
            reasonGroupChat.style.color = "orange";
            reportSubmitGroupChat.style.color = "orange";
            gcPinText.style.color = "orange";
            gcTextPinCheck.style.color = "orange";
            gcSubmitPin.style.color = "orange";
        }catch (e) {}

        //settings
        try {
            ssTextSecurity.style.color = "orange";
            ssTextNotifications.style.color = "orange";
            ssTextLanguage.style.color = "orange";
            ssTextContrast.style.color = "orange";
            stContainer.style.color = "orange";
            securityLogo.style.color = "orange";
            ssButtonSecurity.style.color = "orange";
            ssTextTheme.style.color = "orange";
            ssFirstBtn.style.color = "orange";
            ssSecondBtn.style.color = "orange";
            ssThirdBtn.style.color = "orange";
            ssFourthBtn.style.color = "orange";
            ssTextContrastModal.style.color = "orange";
            ssThemeDark.style.color = "orange";
            ssThemeLight.style.color = "orange";
            ssTextModalNotifications.style.color = "orange";
        } catch (e) {}

        // map
        try {
            mpSearch.placeholder.style.color = "orange";
        }catch (e) {}

        //self enrollment
        try {
            eeTitleOne.style.color = "orange";
            eeStepOne.style.color = "orange";
            eesubmit.style.color = "orange";
        }catch (e) {}

        //self enrollment - upload photo
        try {
            eeTitleTwo.style.color = "orange";
            eeStepTwo.style.color = "orange";
            eesubmitTwo.style.color = "orange";
        } catch (e) {}

        //self enrollment form complete
        try {
            eeSuccess.style.color = "orange";
            eeComplete.style.color = "orange";
            eeLink.style.color = "orange";
        } catch (e) {}

        //help services
        try {
            hhErrorTitle.style.color = "orange";
            hhEmail.style.color = "orange";
            hhQuery.style.color = "orange";
            hsButtonText.style.color = "orange";
            hsModalLabelText.style.color = "orange";
            submit.style.color = "orange";
            hhContactBtn.style.color = "orange";
        } catch (e) {}

        //userdashboard
        try {
        udLogo.style.color = "orange";
        udimagepass.style.color = "orange";
        udTextHeaderPass.style.color = "orange";
        udimageremove.style.color = "orange";
        udTextHeaderAccount.style.color = "orange";
        udimagelock.style.color = "orange";
        udTextHeaderPin.style.color = "orange";
        udContainer.style.color = "orange";
        udPatchButton.style.color = "orange";
        udPatch2.style.color = "orange";
        udPatch3.style.color = "orange";
        udButtonTextFirstBtn.style.color = "orange";
        udButtonTextSecondBtn.style.color = "orange";
        udButtonTextThirdBtn.style.color = "orange";
        disabledText.style.color = "orange";
        } catch (e) {}

        //userdashboardadmin
        try {
        udaTextHeaderReports.style.color = "orange";
        udaButtonTextFirstBtn.style.color = "orange";
        udaTextHeaderBanModal.style.color = "orange";
        udaTextHeaderAccessType.style.color = "orange";
        udaButtonTextSecondBtn.style.color = "orange";
        udaTextHeaderBan.style.color = "orange";
        udaButtonTextThirdBtn.style.color = "orange";
        udaTextHeaderBanUserModal.style.color = "orange";
        udaTextHeaderAccessTypeModal.style.color = "orange";
        udaTextHeaderBanUserModal1.style.color = "orange";
        }catch (e) {}

        try {
            aaStudentHeading.style.color = "orange";
            adminButtons[0].style.color = "orange";
            adminButtons[1].style.color = "orange";
            adminButtons[2].style.color = "orange";
            adminButtons[3].style.color = "orange";
            adminButtons[4].style.color = "orange";
            adminButtons[5].style.color = "orange";
            adminButtons[6].style.color = "orange";
            adminButtons[7].style.color = "orange";
            ssTextModalNotifications.style.color = "orange";
        } catch (e) {}
    }
}
