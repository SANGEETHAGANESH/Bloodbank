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
        <li><a style="text-decoration:none;" href="camp.php"> Camps</a></li>
    </ul>

</div>
 <link href="upload.css" rel="stylesheet">
<div class="container-fluid" style="width:84%; margin-right:20px;">
    <div class="card shadow mt-4">
        <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Edit camp detail
        </h4></div>
<div class="card-body">
    <?php
    $con=mysqli_connect("localhost","root","","blood");
if(isset($_POST['edit_btn'])){
    $id=$_POST['id'];
    $query="select*from camps where id='$id'";
    $run=mysqli_query($con,$query);

    foreach($run as $row){
        ?>
       <form action="pcode.php" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="id" value="<?php  echo $row['Id']; ?>">
<div class="modal-body mx-3">
        <div class="md-form mb-3">
        <label>Date</label>
          <input type="text" id="orangeForm-name"class="form-control form-control-user" name="date" value="<?php  echo $row['date']; ?>">
         
        </div>
        <div class="md-form mb-3">
        <label>Time</label>
          <input type="text" id="orangeForm-email"class="form-control form-control-user" name="time" value="<?php  echo $row['time']; ?>">
        
        </div>

        <div class="md-form mb-3">
        <label>Location</label>
          <input type="text" id="orangeForm-pass"  name="location" class="form-control form-control-user"
          value="<?php  echo $row['location']; ?>">
           </div>
          

      </div>

     
     
        <button class="btn btn-success mx-4 mb-4" name="update" type="submit">Update</button>
        <a href="product.php" class="btn btn-danger mb-4">Cancel</a>
    </form>
      <?php
    }


  }
?>


</div>
</div>
</div></div>
