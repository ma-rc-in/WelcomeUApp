<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.

session_start();
if (isset($_SESSION['sessionStudentID'])) {
    $studentInfo = getStudentDetails(); //gets all student details
    $studentEmail = $studentInfo['studentEmail'];//gets the student email
} else { //return user to login
    header('Location:loginform.php');
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

  <div class="contactFormContainer">
      <form action="helpServices.php" method="POST">
          <label id="hhEmail" class="labelsContactForm">Student Email Address:</label>
          <input type = "text" name="studentEmail" value="<?php echo $studentEmail;?>" required><br>

          <label id="hhQuery" class="labelsContactForm">Your query:</label>
          <textarea placeholder="Please write your query here..." id="hhQueryInput" name="hhQueryInput" class="hhQueryInput" required style="height: 200px;"></textarea><br>

          <input type="submit" name="submit" id="submit" class="adminButtons" value="Submit"/>
      </form>
  </div>


    <div class="patch-item patch-button" style="width: 100%; max-height: 100px;">
      <a href="#" id="hsButtonText" class="button" data-abbr="" style="width: 63%">See FAQ</a>
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
        				<label for="check-1">Question 1</label>
        				<article>
        					<p>Lorem ipsum </p>
        				</article>
        			</div>
              <div class="insideAccordion">
        				<input type="checkbox" id="check-2" />
        				<label for="check-2">Question 2</label>
        				<article>
        					<p>Lorem ipsum </p>
        				</article>
        			</div>
              <div class="insideAccordion">
        				<input type="checkbox" id="check-3" />
        				<label for="check-3">Question 3</label>
        				<article>
        					<p>Lorem ipsum </p>
        				</article>
        			</div>
        		</section>
          </div>

        </div>
      </div>
    </div>
  </div>


  <script>
  var modal1 = document.getElementById("firstModal");
  var btn1 = document.getElementById("hsButtonText");
  var span1 = document.getElementsByClassName("close firstClose")[0];
  btn1.onclick = function () {
    modal1.style.display = "block";
  }
  span1.onclick = function () {
    modal1.style.display = "none";
  }
  window.onclick = function (event) {
    if (event.target == modal1) {
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
