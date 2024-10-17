<?php
    require_once('connection.php');
    
        $id = $_POST['msgid'];
        // delete entirely from our database table
        // $query = "DELETE FROM `inbox` WHERE `id` = '$id'";

        $query = "UPDATE `inbox` SET `deleted`= 0 WHERE `id` = '$id' ";
        $res = mysqli_query($connect, $query);
     


?>