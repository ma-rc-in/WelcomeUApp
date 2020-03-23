<?php
function logout()
{
    session_start();
    unset($_SESSION["sessionStudentID"]);
    session_destroy();
    header('Location: loginform.php');
}
?>
