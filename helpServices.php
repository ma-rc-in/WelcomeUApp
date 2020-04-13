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
  <!-- <link rel="stylesheet" type="text/css" href="CSS/css/main.css"> -->

  <title>WelcomeU Login</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet'
  type='text/css'>

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
        			<div>
        				<input type="checkbox" id="check-2" />
        				<label for="check-2">Question 2</label>
        				<article>
        					<p>Lorem ipsum </p>
        				</article>
        			</div>
        			<div>
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
    getVolume();
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
