<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.
?>
<?php
session_start();
$StudentInfo = getStudentDetails();
if(isset($_SESSION['sessionStudentID'])) {
  if (checkAccessType() == "Lecturer") {
    header('Location:mainmenuLecturer.php');
  }
}
else
{header('Location:loginform.php');}  //return user to login
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="mainmenu.js"></script>
  <script src="settings.js"></script>
  <script src="announcementNotif.js"></script>

  <title>WelcomeU</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet' type='text/css'>

  <!--scripts for bootstrap user guide-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour-standalone.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour-standalone.min.css" rel="stylesheet"/>
  <style>

  html, body {

    /*background-color: black;*/
    font-family: 'Open Sans', Arial, sans-serif;
    -webkit-font-smoothing: subpixel-antialiased;
  }

  @-ms-viewport{
    height: device-height;
  }
  a {
    text-decoration: none;
  }

  .patch-button {

    color: white;
    cursor: pointer;
    font-size: 1em;
    font-size: 1.5em;
    letter-spacing: 0;
    height: 70px;
    width: 30px;
  }

  .patch-item {
    padding-top: 100px;
    background-color: black;
    border-radius: 4px;
    float: left;
    height: 200px;
    margin: 0 0 5% 0;
    width: 70%;
  }

  .textIcons {
    color: white;
  }

  .patch-container {
    background-color: #000000;
    border-radius: 5px;
    color: #000000;
    overflow: auto;
    position: relative;
    text-align: center;
    zoom: 1;
  }

  .patch-panel {
    background-color: #FFF;
    border-radius: 4px;
    color: #FFF;
    display: none;
    float: left;
    font-size: 1.5em;

    line-height: 250px;
    margin: 0 0 2% 0;
    width: 70%;
    height: 00px;
  }

  @media only screen and (max-width: 989px) {
    h2 {
      font-size: 3.3rem;
    }

    .patch-panel {
      margin: 1%;
      width: 100%;

    }
    .components {
      margin: 1.5%;
      width: 46%;
    }

    .logout-box {
      padding-top: 30px;
      float: left;
      height: 100px;
      width: 100%;

    }

    .patch-item {
      padding-top: 30px;
      background-color: black;
      border-radius: 4px;
      float: left;
      height: 200px;
      margin: 0 0 1% 0;
      width: 50%;

    }
  }

  @media only screen and (min-width: 990px) {
    .patch-container {
      max-width: 100%;

    }

    .patch-item {
      margin: 0.6667%;
      margin: calc(4% / 6);
      width: 32%;
    }

    .patch-panel {
      margin: 0.6667%;
      margin: calc(4% / 6);
      width: 98.6666%;
      width: calc(100% - (4% / 6) * 2);
    }

    .logout-box {
      padding-top: 30px;
      float: left;
      height: 100px;
      width: 100%;

    }

    .resize {
      margin: 50px auto -2%;
    }
    .wide {
      margin: 0.6667%;
      margin: calc(4% / 6);
      width: 48.6666%;
      width: calc(50% - (4% / 6) * 2);
    }
    .thin {
      width: 23.6666%;
      width: calc(25% - (4% / 6) * 2);
    }
  }

  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,10); /* Fallback color */
    background-color: rgba(0,0,0,.95); /* Black w/ opacity */
  }

  .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    width: 80%;
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
  }

  @-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
  }

  @keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
  }

  .close {
    color: white;
    float: right;
    font-size: 38px;
    font-weight: bold;
    -webkit-text-stroke-width: 0.3px;
    -webkit-text-stroke-color: white;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  .modal-header {
    padding: 2px 16px;
    background-color: #474747;
    color: white;
  }

  .modal-body {
    padding: 2px 16px;
    background-color: #383838;
    color: white;
    font-family: OpenSans-Regular, sans-serif;

  }

  .logoDiv {
    width: 100%;
    margin-top: 20px;
    display: inline-block;
  }

  .logoMain {
    width: 350px;
    height: 100px;
    margin-left: 38%;
    margin-left: auto;
  }

  .guideButton {
    opacity: .7;
    -webkit-transition: all 0.8s;
    -moz-transition: all 0.8s;
    transition: all 0.8s;
    margin-top: -76px;
    float: right;
    margin-right: auto;
  }

  .guideButton:hover {
    opacity: 1;
    -webkit-transition: all 0.8s;
    -moz-transition: all 0.8s;
    transition: all 0.8s;
  }

  .guideIcon {
    height: 48px;
    width: 48px;
    margin-bottom: 40px;
    margin-right: 20px;
    cursor: pointer;
  }

  @media only screen and (max-width: 600px) {

    .guideButton {
      width: 100%;
      display: block;
      margin-top: 40px;
    }

    .guideIcon {
      height: 58px;
      width: 58px;
      margin-bottom: 40px;
      margin-right: 20px;
      cursor: pointer;
    }
  }

  </style>
  </head>

  <script>
  //load the form up
  $(document).ready(function(){
    $(".groupChatPlaceHolder").load("mainmenuCheck.php");//checks to see if there are new messages
    mainmenuAlert();
    mainmenuAlertAnnouncement();
    languageChange(); //changes the lanugage (default is english)
    themeChange();
    highContrast();
    });

    //every 10 seconds check
    $(document).ready(function(){
      setInterval(function()
      {
        $(".groupChatPlaceHolder").load("mainmenuCheck.php");//checks to see if there are new messages
        $(".AnnoucementsPlaceHolder").load("mainmenuAnnounce.php");//checks to see if there are new messages
        mainmenuAlert();
        mainmenuAlertAnnouncement();
        }, 5000);
        });

        </script>


        <body>
        <div class="patch-container" id="mmbackground">

        <div class="logoDiv">
        <div class="logoChatWrapper">
        <a href="mainmenu.php">
        <img class="logoMain" id="mmNULogo" src="images/logo_white.png" alt="Logo"/>
        </a>
        </div>
        <div class="guideButton" id="userGuideButton"><img src="images/guide.png" id="mmHelpGuide" class="guideIcon"></div>
        </div>

        <div style="width: 100%; color: white">
        <h5 id="mmSmartCardBalance" style="display: inline-block;">Smart Card Balance:</h5>
        <h5 id="mmBalance" style="display: inline-block;">£<?php echo $StudentInfo['smartCardBalance'];?></h5>
        </div>


        <div class="patch-item patch-button" id="mmMapBackground">
        <a href="map.php">
        <img class="test" id="mmMapLogo" src="images/maps-and-flags.png" alt="Map" width= "120px" height= "120px" />
        <h5 class="textIcons" id="mapMenu">Map</h5>
        </a>
        </div>

        <div class="patch-item patch-button" id="mmGroupChatBackground">
        <a href="groupChat.php">
        <img class="logo" id="groupChat" src="images/chat.png" alt="Group Chat" width= "120px" height= "120px" />
        <h5 class="textIcons" id="groupChatMenu">Group Chat</h5>
        <div class="groupChatPlaceHolder"></div>
        </a>
        </div>

        <div class="patch-item patch-button" id="mmHelpBackground">
        <a href="helpServices.php">
        <img class="test" id="mmHelpLogo" src="images/question.png" alt="Help" width= "120px" height= "120px" />
        <h5 class="textIcons" id="helpMenu">Help</h5>
        </a>
        </div>

        <div class="patch-item patch-button" id="mmAnnoucementsBackground">
        <a href="announcementsStudent.php">
        <img class="test" id="mmAnnoucementsLogo" src="images/speaker.png" alt="Annoucements" width= "120px" height= "120px" />
        <h5 class="textIcons" id="annoucementsMenu">Annoucements</h5>
        <div class="AnnoucementsPlaceHolder"></div>
        </a>
        </div>

        <div class="patch-item patch-button" id="mmEnrolmentBackground">
        <a href="selfEnrolmentForm.php">
        <img class="test" id="mmEnrolmentLogo" src="images/checklist.png" alt="Self Enrolment" width= "120px" height= "120px" />
        <h5 class="textIcons" id="enrolmentMenu">Self Enrolment</h5>
        </a>
        </div>

        <div class="patch-item patch-button" id="mmSettingsBackground">
        <a href="settings.php">
        <img class="test" id="mmSettingsLogo" src="images/settings.png" alt="Settings" width= "120px" height= "120px" />
        <h5 class="textIcons" id="settingsMenu">Settings</h5>
        </a>
        </div>

        <div class="logout-box">
        <a href="logout.php">
        <img class="test" id="mmLogoutLogo" src="images/logout.png" alt="Logout" width= "44px" height= "44px" />
        </a>

        </div>
        </div>

          <script>
          languageChange(); //changes the lanugage (default is english)
          themeChange();
          highContrast();
          </script>

          <script>
          var tour = new Tour({
          backdrop: false,
          storage: false,
          template: "<div class='popover tour'><div class='arrow'></div><h3 class='popover-title'></h3><div class='popover-content'></div><nav class='popover-navigation'><div class='btn-group'><button class='btn btn-default' data-role='prev'>« Prev</button><button class='btn btn-default' data-role='next'>Next »</button></div><button class='btn btn-default btn-end' data-role='end'>Skip guide</button></nav></div>"
          });

          var language = localStorage.getItem("language");
          if (language == null) {//checks to see if the user has a preference set, if not
              var defaultLanguage = "English";
              localStorage.setItem("language", defaultLanguage); //sets the default language to English (for first time users)
          }

          if (language == "English") {
              tour.addSteps([
                  {
                      element: "#mmSmartCardBalance", // string (jQuery selector) - html element next to which the step popover should be shown
                      title: "SmartCard Balance", // string - title of the popover
                      placement: "bottom",
                      backdrop: true,
                      content: "Users can view their smart card balance here." // string - content of the popover
                  },
                  {
                      element: "#mmMapLogo",
                      title: "Map",
                      placement: "top",
                      backdrop: true,
                      content: "Users can search Northumbria University's Newcastle city campus for guidance and directions to their destination."
                  },
                  {
                      element: "#groupChat",
                      title: "Group Chat",
                      placement: "top",
                      backdrop: true,
                      content: "Students can use the group chat service to connect with other students on their course, where they are able to message each other."
                  },
                  {
                      element: "#mmHelpLogo",
                      title: "Help Services",
                      placement: "top",
                      backdrop: true,
                      content: "Users can receive help by submitting enquiries, viewing the most frequently asked questions and asking our chat bot for help."
                  },
                  {
                      element: "#mmAnnoucementsLogo",
                      title: "Annoucements",
                      placement: "top",
                      backdrop: true,
                      content: "Users can receive announcements by lecturers on their course, allowing them to keep update to date with the most recent information. Lecturers can use this subsystem to keep students informed."
                  },
                  {
                      element: "#mmEnrolmentLogo",
                      title: "Self-Enrolment",
                      placement: "top",
                      backdrop: true,
                      content: "Users can enrol for their course by completing a quick form on the self enrolment system. Changes to student details can also be updated on this form."
                  },
                  {
                      element: "#mmSettingsLogo",
                      title: "Settings",
                      placement: "top",
                      backdrop: true,
                      content: "Users can change the applications language, theme and enable high contrast settings. Additionally, students will also be able to update their password, pin and delete their related data."
                  },
                  {
                      element: "#mmLogoutLogo",
                      title: "Logout",
                      placement: "top",
                      backdrop: true,
                      content: "Users can click here to logout."
                  }
              ]);
          }

          if (language == "Chinese") {
              tour.addSteps([
                  {
                      element: "#mmSmartCardBalance", // string (jQuery selector) - html element next to which the step popover should be shown
                      title: "学生卡余额", // string - title of the popover
                      placement: "bottom",
                      backdrop: true,
                      content: "用户可以在此查询学生卡余额。" // string - content of the popover
                  },
                  {
                      element: "#mmMapLogo",
                      title: "地图",
                      placement: "top",
                      backdrop: true,
                      content: "用户可以搜索诺森比亚大学纽卡斯尔校区以获得到他们的目的地的指南和方向。"
                  },
                  {
                      element: "#groupChat",
                      title: "群聊",
                      placement: "top",
                      backdrop: true,
                      content: "学生可以使用群组聊天功能与课程上的其他学生联系，在群聊界面里学生可以互相发送信息。"
                  },
                  {
                      element: "#mmHelpLogo",
                      title: "帮助",
                      placement: "top",
                      backdrop: true,
                      content: "用户可以通过提交查询、查看最常见的问题和与我们的聊天机器人请求帮助来获得解决办法。"
                  },
                  {
                      element: "#mmAnnoucementsLogo",
                      title: "通知",
                      placement: "top",
                      backdrop: true,
                      content: "学生可以收到讲师关于他们课程的通知，并允许他们随时更新最新的信息。讲师可以使用这个子系统来通知学生。"
                  },
                  {
                      element: "#mmEnrolmentLogo",
                      title: "自助注册",
                      placement: "top",
                      backdrop: true,
                      content: "学生可以通过在自助注册系统中填写一个简洁的表格来完成自己的课程注册。学生资料的更新也可以在此表格中更改。"
                  },
                  {
                      element: "#mmSettingsLogo",
                      title: "设置",
                      placement: "top",
                      backdrop: true,
                      content: "用户可以更改应用程序的语言、主题和启用高对比度设置。此外，学生还可以更新他们的密码，pin码和删除他们的相关数据。"
                  },
                  {
                      element: "#mmLogoutLogo",
                      title: "登出",
                      placement: "top",
                      backdrop: true,
                      content: "用户点击此处以登出。"
                  }
              ]);
          }

          $("#userGuideButton").click(function(){
          // Start the tour
          if(!tour.start()){
            tour.restart();
          }
          });
          </script>

</body>
</html>
