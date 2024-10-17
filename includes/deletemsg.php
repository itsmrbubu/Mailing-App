<?php
    require_once('connection.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        // delete entirely from our database table
        // $query = "DELETE FROM `inbox` WHERE `id` = '$id'";

        $query = "UPDATE `inbox` SET `deleted`= 0 WHERE `id` = '$id' ";
        $res = mysqli_query($connect, $query);
        
        if($res){
            header('location:../public/dashboard.php');
        }else{
            header('location:../public/message.php?id='.base64_encode($id));
        }  
    }else{
        header("location:../public/index.php?error=please login");
    }

?>