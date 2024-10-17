<?php
    require_once('connection.php');
    require_once('functions.php');

    if(isset($_POST['submit'])){
        $sanitizer = sanitizer($_POST);
        $fullname = isset($sanitizer['fullname'])?trim($sanitizer['fullname']):'';
        $address = isset($sanitizer['address'])?trim($sanitizer['address']):'';
        $phone = isset($sanitizer['phone'])?trim($sanitizer['phone']):'';
        $id = $sanitizer['id'];

        if(empty($fullname) OR empty($address) OR empty($phone)){
            $error = 'all fields are required';
            header('location: ../public/changeprofile.php?error='.$error);
            return false;
            
        }else{
            $fullname = mysql_prep($connect, trimData($fullname));
            $address = mysql_prep($connect, trimData($address));
            $phone = mysql_prep($connect, trimData($phone));

        }
              
        $sql = "UPDATE `user` SET  `fullname` = '$fullname',  `uaddress`= '$address', `phone`='$phone' WHERE `id`= '$id' ";
        $result = mysqli_query($connect, $sql);

        if($result){
            $success = 'profile updated';
            header('location: ../public/changeprofile.php?success='.$success);
            return false;
        }else{
            $error = "error updating profile";
            header('location: ../public/changeprofile.php?eror='.$error);
            return false;
        }
            
    } else{
        $error = 'be very careful';
        header('location: ../public/index.php?error='.$error);
        return false;
    }

?>
