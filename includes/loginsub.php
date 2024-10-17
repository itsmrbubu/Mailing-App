<?php
    session_start();
    require_once('connection.php');
    require_once('functions.php');

    if(isset($_POST['submit'])){
        $sanitizer = sanitizer($_POST);
        $email = isset($sanitizer['email'])?trim($sanitizer['email']):'';
        $password = isset($sanitizer['password'])?trim($sanitizer['password']):'';

        if(empty($email) OR empty($password)){
            $error = 'all fields are required';
            header('location: ../public/index.php?error='.$error);
            return false;
            
        }else{
            $email = mysql_prep($connect, trimData($email));
            $password = mysql_prep($connect, trimData($password));
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = 'please enter a correct email address';
            header('location: ../public/index.php?error='.$error);
            return false;
        }       
        
        $newpass = passEncrypt($password);
        $checkemail = "SELECT * FROM user WHERE email = '$email' AND password = '$newpass' AND deleted = 1";
        $res = mysqli_query($connect, $checkemail);

        if(mysqli_num_rows($res) == 1){
            $rows = mysqli_fetch_assoc($res);
            $_SESSION['id'] = $rows['id'];
            
            if(isset($_SESSION['id'])){
                setcookie('mymail', base64_encode(json_encode(['email'=> $email, 'password'=> $password])), time() + (86400 * 30), "/");
                header('location:../public/dashboard.php');
                return false;
            }else{
                $error = "error logging user in";
                header('location:../public/index.php?error='.$error);
            }
            
        }else{
            $error = 'user does not exit';
            header('location: ../public/index.php?error='.$error);
            return false;     
        }
        
    }else{
        $error = 'field is required';
        header('location: ../public/index.php?error='.$error);
        return false;
    }

?>
