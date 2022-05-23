<?php
 if(isset($_POST['send'])) {

    include 'database.php';
    $phone_number=$row['phone_number'];
    $sql = "SELECT phone_number FROM user where phone_number='$phone_number'";
   
    $result = mysqli_query($con,$sql);
    if($result){
           echo 'success';
    }
    else{
           echo "fail";
    }
   
 }

?>