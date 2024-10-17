<?php 
// cleansing form inputs
    function trimData($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    
    }

    function sanitizer($sanitize){
        $cleansed = filter_var_array($sanitize, FILTER_SANITIZE_STRING);
        return $cleansed;
    }

    function mysql_prep($connect, $string){
        $data = mysqli_real_escape_string($connect, $string);
        return $data;
    }

    // password encrption
    function passEncrypt($pass){
        $newPass = md5($pass);
        return $newPass;
    }

?>