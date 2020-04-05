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
            width: 100%;

        }

        .textIcons {

            color: white;
            float: center;
            font-weight: bold;
            width: 50%;
            pointer: none;



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

        a.button{
            display:inline-block;
            padding:0.35em 1.2em;
            border:0.1em solid #FFFFFF;
            margin:0 0.3em 0.3em 0;
            border-radius:0.12em;
            box-sizing: border-box;
            text-decoration:none;
            font-family:'Roboto',sans-serif;
            font-weight:300;
            color:#FFFFFF;
            text-align:center;
            transition: all 0.2s;
            float: right;
            margin-right: 100px;
            margin-top: 28px;
            width: 35%;

        }
        a.button:hover{
            color:#000000;
            background-color:#FFFFFF;
        }
        @media all and (max-width:30em){
            a.button{
                display:block;
                margin:0.4em auto;
            }
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
                width: 100%;

            }

            @media only screen and (min-width: 990px) {
                .patch-container {
                    max-width: 100%;

                }

                .maps {
                    margin: 0.6667%;
                    height: 30%;
                    width: 60%;
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
            <img class="test" src="Images/logo_white.png" alt="Logo" width= "350px" height= "100px" style="margin-top: 25px;" />
        </a>
    </div>
</div>
<div class="maps">
    <div id="map" style="width:100%;height:500px"></div>
</div>
<script>

    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 54.977811, lng: -1.608458},
            zoom: 17
        });

    }

</script>
<script
    src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAR74Eta1Ce36l5wvfuY4IaNKL9jWyfmMo&sensor=SET_TO_TRUE_OR_FALSE&callback=initMap&language=en-GB&region=GB"></script>

</body>
</html>
