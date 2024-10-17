<?php
    require_once('connection.php');
    
    $searchkey = $_POST['keyword'];
    $output = '';
    $query = "SELECT * FROM user WHERE email LIKE '%$searchkey%' ";
    $res = mysqli_query($connect, $query);
    if(mysqli_num_rows($res) > 0 ){
        $output .= '<h4 align = "center"> SEARCH RESULT </h4>';
        $output .= '<div class = "table-responsiveness">
                         <table class="table table-bordered">
                             <tr>
                                <th>S/N</th>
                                <th>FULLNAME</th>
                                <th>EMAIL</th>
                                <th>ADDRESS</th>
                                <th>PHONE</th>
                             </tr>';

        $num = 1;                    
        while($row = mysqli_fetch_assoc($res)){
            $fullname = $row['fullname'];
            $email = $row['email'];
            $address = $row['uaddress'];
            $phone = $row['phone'];

            $output .= '<tr>
                            <td>'.$num++.'</td>
                            <td>'.$fullname.'</td>
                            <td>'.$email.'</td>
                            <td>'.$address.'</td>
                            <td>'.$phone.'</td>
                        </tr>';

        }                     
        $output .= '</table></div>';
        echo $output;


    }else{
        echo'user not found';
        return false;
    }


?>