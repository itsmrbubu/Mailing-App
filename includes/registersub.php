<?php
    require_once('connection.php');
    require_once('functions.php');

    if(isset($_POST['submit'])){
        $sanitizer = sanitizer($_POST);
        $fullname = isset($sanitizer['fullname'])?trim($sanitizer['fullname']):'';
        $address = isset($sanitizer['address'])?trim($sanitizer['address']):'';
        $phone = isset($sanitizer['phone'])?trim($sanitizer['phone']):'';
        $email = isset($sanitizer['email'])?trim($sanitizer['email']):'';
        $password = isset($sanitizer['password'])?trim($sanitizer['password']):'';
        $conpassword = isset($sanitizer['conpassword'])?trim($sanitizer['conpassword']):'';

        if(empty($fullname) OR empty($address) OR empty($phone) OR empty($email) OR empty($password) OR empty($conpassword)){
            $error = 'all fields are required';
            header('location: ../public/register.php?error='.$error);
            return false;
        
        }else{
            $fullname = mysql_prep($connect, trimData($fullname));
            $address = mysql_prep($connect, trimData($address));
            $phone = mysql_prep($connect, trimData($phone));
            $email = mysql_prep($connect, trimData($email));
            $password = mysql_prep($connect, trimData($password));
            $conpassword = mysql_prep($connect, trimData($conpassword));
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = 'please enter a correct email address';
            header('location: ../public/register.php?error='.$error);
            return false;
        }
        
        if($password != $conpassword){
            $error = 'incorrect password';
            header('location: ../public/register.php?error='.$error);
            return false;

        }else{
            $checkemail = "SELECT * FROM user WHERE email = '$email'";
            $res = mysqli_query($connect, $checkemail);
            if(mysqli_num_rows($res) == 1){
                $error = 'email address already taken';
                header('location: ../public/register/public.php?error='.$error);
                return false;

            }else{
                $newpass = passEncrypt($password);
                $sql = "INSERT INTO user (fullname, uaddress, phone, email, password, createddate) VALUES ('$fullname', '$address', '$phone', '$email', '$newpass', '$date')";
                $result = mysqli_query($connect, $sql);

                if($result){
                    $success = 'now log in with your details';
                    header('location: ../public/index.php?success='.$success);
                    return false;
                }else{
                    $error = "error creating account";
                    header('location: ../public/register.php?eror='.$error);
                    return false;
                }
            }
        }

    }else{
        $error = 'be very careful';
        header('location: ../public/index.php?error='.$error);
        return false;
    }

?>
