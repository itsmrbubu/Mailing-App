<?php
    require_once('connection.php');
    require_once('functions.php');

    if(isset($_POST['submit'])){
        $sanitizer = sanitizer($_POST);
        $from = isset($sanitizer['from'])?trim($sanitizer['from']):'';
        $senderid = $sanitizer['senderid'];
        $subject = isset($sanitizer['subject'])?trim($sanitizer['subject']):'';
        $to = isset($sanitizer['to'])?trim($sanitizer['to']):'';
        $message = isset($sanitizer['message'])?trim($sanitizer['message']):'';

        if(empty($from) OR empty($to) OR empty($subject) OR empty($to) OR empty($message)){
            $error = 'all fields are required';
            header('location: ../public/compose.php?error='.$error);
            return false;           
        }else{
            $from = mysql_prep($connect, trimData($from));
            $senderid = mysql_prep($connect, trimData($senderid));
            $subject = mysql_prep($connect, trimData($subject));
            $to = mysql_prep($connect, trimData($to));
            $message = mysql_prep($connect, trimData($message));
            
        }
        if(!filter_var($to, FILTER_VALIDATE_EMAIL)){
            $error = 'please enter a correct receiver email';
            header('location: ../public/compose.php?error='.$error);
            return false;
        }
        
        
        $checkto = "SELECT * FROM user WHERE email = '$to'";
        $res = mysqli_query($connect, $checkto);

        if(mysqli_num_rows($res) == 0){
            $error = 'no user with email found';
            header('location:../public/compose.php?error='.$error);
            return false;

        }else{
            $date = date('Y-m-d');
            $sql = "INSERT INTO inbox (senderid, sender, receiver, subject, message, createddate) 
            VALUES ('$senderid','$from', '$to', '$subject', '$message' ,'$date')";

            $result = mysqli_query($connect, $sql);
            $sqlo = "INSERT INTO outbox (senderid, sender, receiver, subject, message, createddate) 
            VALUES ('$senderid','$from', '$to', '$subject', '$message' ,'$date')";

            $res = mysqli_query($connect, $sqlo);

            if($res){
                $success = 'message sent';
                header('location:../public/compose.php?success='.$success);
                return false;
            }else{
                $error = "error creating account";
                header('location:../public/compose.php?eror='.$error);
                return false;
            }
        }
        
    }else{
        $error = 'be very careful';
        header('location: ../public/index.php?error='.$error);
        return false;
    }

?>
