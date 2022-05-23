<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Requests</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <link rel = "stylesheet" href = "css/home.css">

    <style>


        .label {
            color: white;
            padding: 8px;
        }

        .success {background-color: #4CAF50;} /* Green */
        .info {background-color: #2196F3;} /* Blue */
        .warning {background-color: #ff9800;} /* Orange */
        .danger {background-color: #f44336;} /* Red */
        .other {background-color: #e7e7e7; color: black;} /* Gray */

    </style>

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-danger">
        <a style="color:white;" class="navbar-brand" href="admin_donation_request.php">Blood Bank Management</a>


        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="admin_login.php">Logout &nbsp;</a>
                </li>

            </ul>
        </div>
      </nav>
    <br><br>
    <div class="wrapper">
    <div class="sidebar">

        <ul>
            <li><a style="text-decoration:none;" href="admin.php">Home</a></li>
            <li><a style="text-decoration:none;" href="admin_donation_request.php">Donation Request</a></li>
            <li><a style="text-decoration:none;" href="admin_blood_request.php">Blood Request</a></li>
            <li><a style="text-decoration:none;" href="users.php"> Users</a></li>
        </ul>

    </div>
    <link href="./upload.css" rel="stylesheet">
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold mt-3 text-dark">Add camp detail</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="height:40px;width:50px; border:none;
        background-color:white;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="pcode.php" method="POST" enctype="multipart/form-data" >
      <div class="modal-body mx-4 mt-3">
        <div class="md-form">
        <label>Date</label>
          <input type="text" id="orangeForm-name" name="date" style="color:black">
               </div><br>
        <div class="md-form">
        <label>Time</label>
          <input type="text" id="orangeForm-email" name="time"style="color:black">
    
        </div><br>
          <div class="md-form">
        <label>Location</label>
          <input type="text" id="orangeForm-pass"  name="location" style="color:black;">
          </div>
         
      </div><br>
      <div class="modal-footer d-flex justify-content-center my-3 mx-3">
        <button class="btn btn-success" name="add">Add Camp</button>
      </div></form>
    </div>
  </div>
</div>
<div class="container-fluid" style="width:84%; margin-right:20px;">
    <div class="card shadow mt-4">
        <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Camp 
        <button class="btn btn-success btn-rounded mb-2 text-center" data-toggle="modal" data-target="#modalRegisterForm">
            Add Camp</button>
        </h4></div>
<div class="card-body">

<?php
if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
    echo  '<h2> '.$_SESSION['success'].' </h2>';
    unset($_SESSION['success']);
}
?>

    <div class="table-responsive">

    <?php
    $con=mysqli_connect("localhost","root","","blood");
    $query="select * from camps";
    $run=mysqli_query($con,$query);
    ?>
        <table class="table table-bordered" id="database" width="100%" cellspacing="1">
            <thead>
                <tr  style="font-style:italic;color:black;">
                <th>ID</th>
               
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Edit</th>
                    <th>Delete</th>
</tr>
</thead>
<tbody>
    <?php

    if(mysqli_num_rows($run)>0){
        while($row=mysqli_fetch_assoc($run)){
           ?>
           <tr style="font-style:italic;color:black;">
        <td> <?php  echo $row['Id']; ?> </td>
       
        <td> <?php  echo $row['date']; ?> </td>
        <td> <?php  echo $row['time']; ?> </td>
        <td> <?php  echo $row['location']; ?> </td>
       <td> 
            <form action="edit_product.php" method="POST">
                <input type="hidden" name="id" value="<?php  echo $row['Id']; ?>">
            <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
        </form>
        </td>
        <td>
          <form action="pcode.php" method="POST">
            <input type="hidden" name="delete_id"  value="<?php  echo $row['Id']; ?>">
            <button type="submit" name="delete_btn"class="btn btn-danger">Delete</button>
        </form>
        </td>
       
    </tr>
    <?php
           
        }
    }
    else{
        echo "No Record Found";
    }
    ?>
   
</tbody>
</table>
</div>
</div>
</div>
