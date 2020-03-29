<?php
require_once("connection.php");//gets the connections.php
require_once("functions.php");
$db = getConnection();//returns the connection for the database.
?>
<?php
session_start();
if(isset($_SESSION['sessionStudentID'])) {}
else
{header('Location:loginform.php');}  //return user to login
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WelcomeU Login</title>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Source+Code+Pro' rel='stylesheet' type='text/css'>
<style>

html, body {

  background-color: black;
  font-family: 'Open Sans';
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

/*
.patch-button:hover {
  border: solid 3px #FFF;
  line-height: 1px;
}
*/

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
  float: right;
  font-weight: bold;
  margin-right: 30%;


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

[data-patch-panel='1'],
[data-patch-panel='5'],
[data-patch-panel='8'] {
  background: #F5AB35;
}

[data-patch-panel='2'],
[data-patch-panel='6'],
[data-patch-panel='9'] {
  background: #00B16A;
}

[data-patch-panel='3'],
[data-patch-panel='7'],
[data-patch-panel='10'] {
  background: #E74C3C;
}

[data-patch-panel='4'],
[data-patch-panel='8'],
[data-patch-panel='12'] {
  background: #3498DB;
}
/********************************
Media Queries
********************************/

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

	.textIcons {

  color: white;
  float: right;
  font-weight: bold;
	margin-right: 30%;}

.patch-item {
    padding-top: 30px;
  background-color: black;
  border-radius: 4px;
  float: left;
  height: 200px;
  margin: 0 0 1% 0;
  width: 50%;

}

    /*.patch-item {
    float: left;
  height: 200px;
  margin: 0 0 5% 0;
    width: 30%;
  }*/


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

.textIcons {

  color: white;
  float: right;
  font-weight: bold;
margin-right: 30%;}

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
</style>
</head>
<body>


<div class="patch-container">

    <div class="logoMain">
        <a href="mainmenu.php">
            <img class="test" src="images/logo_white.png" alt="Logo" width= "350px" height= "100px" style="margin-top: 25px;" />
        </a>
    </div>

    <div class="patch-item patch-button" style="width: 100%; float: left;">
        <a href="userDashboard.php">
            <img class="test" src="images/profile.png" alt="Map" width= "90px" height= "90px" />
            <h2 class="textIcons">My Profile</h2>
        </a>
    </div>

    </div>

</body>
</html>
