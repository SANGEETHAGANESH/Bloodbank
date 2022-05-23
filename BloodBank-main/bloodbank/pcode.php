<?php
session_start();
 $host="localhost";
 $dbusername="root";
 $dbpassword="";
 $dbname="blood";
 
 $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
if(isset($_POST['add'])){
    $date=$_POST['date'];
    $time=$_POST['time'];
    $location=$_POST['location'];

    $query="insert into camps(date,time,location) values ('$date','$time','$location')";
    $run=mysqli_query($conn,$query);
    if($run)
    {
        $_SESSION['success'] ="Successfully";
        header('Location:product.php');
    }
    else
    {
        $_SESSION['status'] ="Admin profile not added";
        header('Location:product.php');
    }
}



if(isset($_POST['update'])){
    $id=$_POST['id'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $location=$_POST['location'];
    $update="update camps set date='$date' , time='$time' , location='$location' where id='$id'";
    $run=mysqli_query($conn,$update);

    if($run){
        $_SESSION['success'] ="Your data is updated";
        header('Location:product.php');

    }
    else
    {
        $_SESSION['status'] ="Your data is not updated";
        header('Location:product.php');
    }
}
if(isset($_POST['delete_btn'])){
    $id=$_POST['delete_id'];
    $delete="delete from camps where id='$id'";
    $run=mysqli_query($conn,$delete);
    if($run){
        $_SESSION['success'] ="Your data is deleted";
        header('Location:product.php');

    }
    else
    {
        $_SESSION['status'] ="Your data is not deletedd";
        header('Location:product.php');
    }

}
?>