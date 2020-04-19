<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.

session_start();
$studentEmail = "";
if (isset($_SESSION['sessionStudentID'])) {
    $studentInfo = getStudentDetails(); //gets all student details
    $studentEmail = $studentInfo['studentEmail'];//gets the student email

} else { //return user to login
    //header('Location:loginform.php');
}

if(isset($_POST['submit'])) { //change
    $email = $_POST['studentEmail'];
    $input = $_POST['hhQueryInput'];
    $query = "INSERT INTO tbl_query (studentEmail, query) VALUES (:email, :query)";
    $queryInsert = $db->prepare($query);
    $queryInsert->bindParam('email', $email, PDO::PARAM_STR);
    $queryInsert->bindParam('query', $input, PDO::PARAM_STR);
    $queryInsert->execute(array(":email" => $email, ":query" =>$input));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="CSS/css/popUpCSS.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="help.js"></script>
  <!-- <link rel="stylesheet" type="text/css" href="CSS/css/main.css"> -->

  <title>WelcomeU Login</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet'
  type='text/css'>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<style>
    .contactFormContainer {
    	width: 60%;
    	margin: 10px auto;
    	padding: 16px;
    	background: #383838;
      margin-top: 60px;
    }

.labelsContactForm {
  font-size: 20px;
  font-family: Arial, sans-serif;
  color: white;
  display: inline-block;
  margin: 10px 0px 10px 50px;
  float: left;
}

    .contactFormContainer input[type="text"],
    .contactFormContainer textarea,
    .contactFormContainer select
    {
    	-webkit-transition: all 0.30s ease-in-out;
    	-moz-transition: all 0.30s ease-in-out;
    	-ms-transition: all 0.30s ease-in-out;
    	-o-transition: all 0.30s ease-in-out;
    	outline: none;
    	box-sizing: border-box;
    	-webkit-box-sizing: border-box;
    	-moz-box-sizing: border-box;
    	width: 100%;
    	margin-bottom: 5px;
    	border: 1px solid #ccc;
    	padding: 3%;
    	color: black;
      font-size: 15px;
    }

    .contactFormContainer input[type="text"]:focus,
    .contactFormContainer textarea:focus,
    .contactFormContainer select:focus
    {
    	box-shadow: 0 0 5px #4f4f4f;
    	padding: 3%;
    	border: 1px solid #474747;
    }

    .overlay {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(0, 0, 0, 0.9);
      transition: opacity 500ms;
      visibility: hidden;
      opacity: 0;
    }
    .overlay:target {
      visibility: visible;
      opacity: 1;
    }

    .popup {
      margin: 200px auto;
      padding: 10px 20px 20px 20px;
      background: rgba(87, 87, 87, 1);
      color: white;
      border-radius: 5px;
      width: 50%;
      position: relative;
      transition: all 5s ease-in-out;
      color: white;
      font-family: Arial, sans-serif;
      font-size: 20px;
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s
    }

    .popup .close {
      position: absolute;
      top: 20px;
      right: 30px;
      transition: all 200ms;
      font-size: 38px;
      font-weight: bold;
      text-decoration: none;
      -webkit-text-stroke-width: 0.3px;
      -webkit-text-stroke-color: white;
      color: white;
    }
    .popup .close:hover {
      color: #b8b8b8;
    }
    .popup .content {
      max-height: 30%;
      overflow: auto;
    }

    @media screen and (max-width: 700px){
      .box{
        width: 70%;
      }
      .popup{
        width: 70%;
      }
    }

      </style>

    <script>
        $(document).ready(function(){
            $("#openChat").click(function(){
                $("#chatBotInside").fadeIn();
            });
            $("#closeChat").click(function(){
                $("#chatBotInside").fadeOut();
            });
        });
    </script>
    <script src="settings.js"></script>
</head>
<body>
  <div class="patch-container">
    <div class="logoMain">
      <a href="mainmenu.php">
        <div class="logoIcon">
          <img class="imgLogo" src="images/logo_white.png" alt="Logo" width="350px" height="100px"
          style="margin-top: 25px;"/>
        </div>
      </a>
    </div>

    <div id="errorMessage"class="overlay">
     <div class="popup">
       <a class="close" href="#" style=" ">&times;</a>
       <div class="content" style="margin-top: 20px;">
         <div id="hhErrorTitle">Error</div>
         <hr>
         <div id="hhErrorMsg">
         <hr>
         Due to technical limitations, password can be only reset by our admin. <br>Please use the form to contact the admin in order to reset your password.
         </div>
       </div>
     </div>
    </div>

  <div class="contactFormContainer">
      <form action="helpServices.php" method="POST">
          <label id="hhEmail" class="labelsContactForm">Student Email Address:</label>
          <input type = "text" name="studentEmail" value="<?php echo $studentEmail;?>" required><br>

          <label id="hhQuery" class="labelsContactForm">Your query:</label>
          <textarea placeholder="Please write your query here..." id="hhQueryInput" name="hhQueryInput" class="hhQueryInput" required style="height: 200px;"></textarea><br>

          <input type="submit" name="submit" id="submit" class="adminButtons" value="Submit"/>
      </form>
  </div>


    <div class="patch-item patch-button" style="width: 100%; max-height: 100px; padding-bottom: 0px">
      <a href="#" id="hsButtonText" class="button" data-abbr="" style="width: 63%">See FAQ</a>
    </div>

    <div class="patch-item patch-button" style="width: 100%; max-height: 100px; padding-top: 0px">
      <a href="#" id="hhContactBtn" class="button" data-abbr="" style="width: 63%">Contact Us</a>
    </div>

      <button class="openChatbotBox" id="openChat" type="button">Chatbot</button>
      <div class="chatbotBoxInside" id="chatBotInside">
          <form action="" class="chatbotBoxInsideForm">
              <div class="messageChat">WelcomeU<br>Chatbot<br><br></div>

              <div class="messageChat">Output</div>
              <textarea placeholder="" name="messageChatBotInput" id="hmChatOutput" class="messageChatBotUser" readonly></textarea>


              <div class="messageChat"><br><br>Put your message:</div>
              <textarea placeholder="You messsage" id="hhChatInput" name="messageChatBotInput" class="messageChatBotUser" required></textarea>

              <button type="button" class="btn" onclick="chat()">Submit</button>
              <button type="button" class="btn cancel" id="closeChat">Close the chat</button>
          </form>
      </div>


    <div id="firstModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close firstClose" id="">&times;</span>
          <h4 id="hsModalLabelText">FAQ</h4>
        </div>
        <div class="modal-body">

          <div class="faqContainer">
        		<section class="accordion">
        			<div class="insideAccordion">
        				<input type="checkbox" id="check-1" />
        				<label for="check-1" id="hhFAQ1">Question 1: How do I change my password?</label>
        				<article>
        					<p id="hhFAQans1">You can change your password by submitting a query to the admin team requesting a password change.</p>
        				</article>
        			</div>
              <div class="insideAccordion">
        				<input type="checkbox" id="check-2" />
        				<label for="check-2" id="hhFAQ2">Question 2: Where can I change the websites settings?</label>
        				<article>
        					<p id="hhFAQans2">You can change the various aspects of the website such as the theme and language in the settings menu.</p>
        				</article>
        			</div>
              <div class="insideAccordion">
        				<input type="checkbox" id="check-3" />
        				<label for="check-3" id="hhFAQ3">Question 3: I have further questions, where can I find support?</label>
        				<article>
        					<p id="hhFAQans3"> You could find find further frequently asked questions by searching here: https://libraryanswers.northumbria.ac.uk/search/</p>
        				</article>
        			</div>
        		</section>
          </div>

        </div>
      </div>
    </div>

      <div id="secondModal" class="modal">
          <div class="modal-content">
              <div class="modal-header">
                  <span class="close secondClose" id="">&times;</span>
                  <h4 id="hsModalLabelText2">Help Services Contact</h4>
              </div>
              <div class="modal-body">

                  <div class="faqContainer">
                      <section class="accordion">
                          <div class="insideAccordion">
                              <input type="checkbox" id="contact-1" />
                              <label for="contact-1" id="hhContact1">Student Central</label>
                              <article>
                                  <p id="hhContact1c">0191 227 4646 | ask4help@northumbria.ac.uk</p>
                              </article>
                          </div>
                          <div class="insideAccordion">
                              <input type="checkbox" id="contact-2" />
                              <label for="contact-2" id="hhContact1">Finance Enquiries</label>
                              <article>
                                  <p id="hhContact2c">0191 227 4050 | ask4help@northumbria.ac.uk</p>
                              </article>
                          </div>
                          <div class="insideAccordion">
                              <input type="checkbox" id="contact-3" />
                              <label for="contact-3" id="hhContact1">Applicant Services</label>
                              <article>
                                  <p id="hhContact3c">0191 4060901 | bc.applicantservices@northumbria.ac.uk</p>
                              </article>
                          </div>
                      </section>
                  </div>

              </div>
          </div>
      </div>


  </div>

  <script>
      languageChange(); //changes the lanugage (default is english)
      themeChange();
      highContrast();
  </script>
  <script>
  var modal1 = document.getElementById("firstModal");
  var modal2 = document.getElementById("secondModal");
  var btn1 = document.getElementById("hsButtonText");
  var btn2 = document.getElementById("hhContactBtn");

  var span1 = document.getElementsByClassName("close firstClose")[0];
  var span2 = document.getElementsByClassName("close secondClose")[0];
  btn1.onclick = function () {
    modal1.style.display = "block";
  }
  btn2.onclick = function () {
      modal2.style.display = "block";
  }
  span1.onclick = function () {
    modal1.style.display = "none";
  }
  span2.onclick = function () {
      modal2.style.display = "none";
  }
  window.onclick = function (event) {
    if (event.target == modal1) {
      modal1.style.display = "none";
    } else if (event.target == modal2){
        modal1.style.display = "none";
    }
  }
</script>
<script>
$('.toggle').click(function(e) {
  e.preventDefault();

  var $this = $(this);

  if ($this.next().hasClass('show')) {
    $this.next().removeClass('show');
    $this.next().slideUp(350);
  } else {
    $this.parent().parent().find('li .inner').removeClass('show');
    $this.parent().parent().find('li .inner').slideUp(350);
    $this.next().toggleClass('show');
    $this.next().slideToggle(350);
  }
});
</script>


</body>
</html>
