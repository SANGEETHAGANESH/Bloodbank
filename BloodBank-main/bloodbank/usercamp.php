<?php  session_start(); ?>
<!-- blood doantion request page for users -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank Management</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

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
        <a style="color:white;" class="navbar-brand" href="donate_blood.php">Blood Bank Management</a>


        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="index.php">Logout &nbsp; </a>
                
                </li>

            </ul>
        </div>
      </nav>
<br><br>
<div class="wrapper">
    <div class="sidebar">

    <ul>
            <li><a style="text-decoration:none;" href="home.php">Home</a></li>
            <li><a style="text-decoration:none;" href="donate_blood.php">Donate Blood</a></li>
            <li><a style="text-decoration:none;" href="donation_history.php">Donation History</a></li>
            <li><a style="text-decoration:none;" href="request_blood.php">Blood Request</a></li>
            <li><a style="text-decoration:none;" href="request_history.php">Request History</a></li>
            <li><a style="text-decoration:none;" href="inventory.php"> View Inventory</a></li>
            <li><a style="text-decoration:none;" href="usercamp.php"> Camps</a></li>

        </ul>

    </div>
    <br>
    <link rel="stylesheet"type="text/css" href="product.css">
    <h5 class="text-danger text-center ">
        UPCOMING CAMPS
</h5>

                      
    <div class="container">
    <?php
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="blood";
    
    $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
     
    $query='select * from camps ';
    $run=mysqli_query($conn,$query);
    if(mysqli_num_rows($run)>0){

    while($row=mysqli_fetch_array($run)){
?>
<div class="col-lg-11 "style="margin-left:80px;" >
<form method="POST" action="userproduct.php?action=add&Id=<?php echo $row["Id"] ?>">
<div class="card mt-5 shadow" style="font-style:italic;">  
<div class="row no-gutters">
    <div class="card-body">
    <div class="col-sm-8 col-md-6 col-lg-12">
    <h4 class="text-danger text-center">BLOOD DONATION CAMPS</h4>
            <h5 class="card-title " > Date :<span class="text-muted"> <?php echo $row["date"]; ?></span> </h5>  
            <h5 >Time: <span class="text-muted">  <?php echo $row["time"]; ?></span> </h5> 
            <h5>Location:<span class="text-muted">  <?php echo $row["location"]; ?></span> </h5> 
            <input type="hidden" name="id" value="<?php  echo $row['Id']; ?>"> 
            <input type="hidden" name="date" value="<?php  echo $row['date']; ?>">
            <input type="hidden" name="time" value="<?php  echo $row['time']; ?>">
            <input type="hidden" name="location" value="<?php  echo $row['location']; ?>">
         </div>
    </div>
    </div></div>
    </form>
    </div>
<?php
    }
}
?>
 

</div>


</div>