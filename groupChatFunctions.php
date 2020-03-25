<?php
function groupChatMessage($courseName)
{
    $db = getConnection();
    $message = $db->query("SELECT * FROM tbl_groupChat WHERE chatRoomName='$courseName'"); //used to only display the course chatroom
    //$row = $message->fetch(PDO::FETCH_ASSOC);
    return $message;
}
?>
