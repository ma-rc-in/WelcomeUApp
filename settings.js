function setLanguage() {
    var languageSelect = document.getElementById("languageValue");
    var languageValue = languageSelect.options[languageSelect.selectedIndex].value; //gets the value of the current selected option
    if (languageValue != "Default"){//makes sure that the default option is changed
        localStorage.setItem("language", languageValue);//saves the value
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
    var mapMenu = document.getElementById("mapMenu");
    var groupChatMenu = document.getElementById("groupChatMenu");
    var helpMenu = document.getElementById("helpMenu");
    var annoucementsMenu = document.getElementById("annoucementsMenu");
    var enrolmentMenu = document.getElementById("enrolmentMenu");
    var settingsMenu = document.getElementById("settingsMenu");

    //login
    var llWelcomeU = document.getElementById("llWelcomeU");
    var llLoginMessage = document.getElementById("llLoginMessage");
    var llStudentID = document.getElementById("llStudentID");
    var llPassword = document.getElementById("llPassword");
    var llsubmit = document.getElementById("llSubmit");

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

    //Map
    var mpSearch = document.getElementById("pac-input");
    //English
    if (language == "English") { //each page needs a try catch so that it can load without the other pages elements
        //Main Menu
        try {
            mapMenu.innerHTML = "Map";
            groupChatMenu.innerHTML = "Group Chat";
            helpMenu.innerHTML = "Help";
            annoucementsMenu.innerHTML = "Annoucements";
            enrolmentMenu.innerHTML = "Self Enrolment";
            settingsMenu.innerHTML = "Settings";
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
        } catch (e) {
        }

        //login
        try {
            llWelcomeU.innerHTML = "WelcomeU";
            llLoginMessage.innerHTML = "Please login with your university login";
            llStudentID.placeholder = "StudentID";
            llPassword.placeholder = "Password";
            llsubmit.value = "submit";
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
            } catch (e) {
            }
            //login
            try {
                llWelcomeU.innerHTML = "欢迎你";
                llLoginMessage.innerHTML = "请登陆您的学校账号";
                llStudentID.placeholder = "学生ID";
                llPassword.placeholder = "密码";
                llsubmit.value = "提交";
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
                ssFourthBtn.value = "更改";
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

            //map
            try {
                mpSearch.placeholder = "输入 Northumbria...";
            } catch (e) {
            }

        }

    }
}
