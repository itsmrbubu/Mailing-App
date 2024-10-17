<?php
    require_once('connection.php');
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        if($_FILES['file']['size'] == ['']){
            $error = "please upload an image";
            header('loctaion: ../pubic/changedp.php?error='.$error);
            return false;
        }else{
            $filesname = $_FILES['file']['name'];
            $filetmp = $_FILES['file']['tmp_name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            $fileext = explode('.', $filesname);
            $fileactualext = strtolower(end($fileext));
            $allow = array('jpg', 'jpeg', 'gif', 'png');

            if(in_array($fileactualext, $allow)){
                if($filesize <800000){
                    $pic = uniqid('',true).'.'.$fileactualext;
                    $filedest = 'uploads/'.$pic;
                    if(move_uploaded_file($filetmp, $filedest)){
                        $query = " UPDATE `user` SET `img` = '$pic' WHERE `id` = '$id'";
                        $res = mysqli_query($connect, $query);
                        if($res){
                            $success = "dp changed";
                            header('location: ../public/changedp.php?success='.$success);
                            return false;
                        }

                    }else{
                        $error = "error uploading file";
                        header('location: ../public/changedp.php?error='.$error);
                        return false;
                    }

                }else{
                    $error = "image is too large";
                    header('location:../public/changedp.php?error='.$error);
                    return false;
                }
                
            }else{
                $error = 'please upload an image format';
                header('loaction:../public/changedp.php?error='.$error);
                return false;
            }

        }
        
    }else{
        header('location:../public/index.php?error=login first');
    }
?>