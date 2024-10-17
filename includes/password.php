<?php
    require_once('connection.php');
    require_once('functions.php');

    if(isset($_POST['submit'])){
        $sanitizer = sanitizer($_POST); 
        $password = isset($sanitizer['password'])?trim($sanitizer['password']):'';
        $conpassword = isset($sanitizer['conpassword'])?trim($sanitizer['conpassword']):'';
        $id = $sanitizer['id'];

        if( empty($password) OR empty($conpassword)){
            $error = 'all fields are required';
            header('location: ../public/changepass.php?error='.$error);
            return false;
            
        }else{   
            $password = mysql_prep($connect, trimData($password));
            $conpassword = mysql_prep($connect, trimData($conpassword));
        }
        
        if($password != $conpassword){
            $error = 'incorrect password';
            header('location: ../public/changepass.php?error='.$error);
            return false;

        }else{
            $newpass = passEncrypt($password);
            $sql = "UPDATE `user` SET `password`= '$newpass' WHERE `id` = '$id'";
            $result = mysqli_query($connect, $sql);

            if($result){
                $success = 'Password changed';
                header('location: ../public/changepass.php?success='.$success);
                return false;

            }else{
                $error = "error changing password";
                header('location: ../public/register.php?eror='.$error);
                return false;
            }
            
        }

    }else{
        $error = 'be very careful';
        header('location: ../public/index.php?error='.$error);
        return false;
    }

?>
