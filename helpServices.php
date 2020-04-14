<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.
?>
<?php
session_start();
if (isset($_SESSION['sessionStudentID'])) {
} else {
  header('Location:loginform.php');
}  //return user to login
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
        .openChatbotBox {
            background-color: black;
            border: 3px solid #c9c9c9;
            border-radius: 10px;
            color: white;
            padding: 16px 20px;
            cursor: pointer;
            opacity: 0.5;
            position: fixed;
            bottom: 25px;
            right: 20px;
            width: 220px;
        }
        .chatbotBoxInside {
            border: 1px solid #c9c9c9;
            z-index: 99;
            display: none;
            position: fixed;
            right: 20px;
            bottom: 25px;
        }

        .messageChat {
            width:100%;
            text-align:center;
        }
        .chatbotBoxInsideForm {
            max-width: 300px;
            padding: 10px;
            background-color: #383838;
            color: white;

        }
        .messageChatBotUser {
            width: 99%;
            font-weight:400;
            border-radius: 6px;
            line-height:2em;
            border:none;
            box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.1);
            font-size: 16px;
            font-family: sans-serif;
            background: white;
            color: black;
            resize: none;
            min-height: 150px;
            padding: 20px;
            border: none;
            margin: 10px 0 30px 0;
            box-sizing: border-box;

        }

        .messageChatBotUser:hover {
            background: #f0f0f0;
        }

        .chatbotBoxInsideForm textarea:focus {
            background-color: white;
            outline: none;
        }

        .chatbotBoxInsideForm .btn {
            background-color: #757575;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
        }

        .chatbotBoxInsideForm .cancel {
            background-color: #757575;
        }

        .chatbotBoxInsideForm .btn:hover, .openChatbotBox:hover, .cancel:hover {
            opacity: 1;
            background-color: #595959;

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

    <div class="patch-item patch-button" style="width: 100%; float: ;">
      <a href="#" id="hsButtonText" class="button" data-abbr="">See FAQ</a>
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
