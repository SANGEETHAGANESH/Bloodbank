<?php  session_start(); ?>
<!-- all the blood request user has specified -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request History</title>

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
        <a style="color:white;" class="navbar-brand" href="request_history.php">Blood Bank Management </a>


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
    <div class="main_content">

    <?php

        include 'database.php';

        $requestor_id = $_SESSION['userid'];
        $sql = "SELECT unit, request_id, request_date, reason, status, action,location,bloodtype FROM blood_request WHERE requestor_id = '$requestor_id'";
        $result = mysqli_query($con,$sql);
        $num_rows = mysqli_num_rows($result);

        if (!$num_rows){
            $num_rows = 0;
        }
    ?>

        <br><br>
        <div class="container">
            <H4 class="text-center">Blood Request History</H4><br>

        <h5 class="text-center" style="color: red;"><?php echo $num_rows; ?> Records</h5><br>

            <table class="table table-light table-hover table-bordered table-striped">
                <thead class="bg-info">
                    <tr>

                        <th scope="col">Request ID</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Reasons</th>
                        <th scope="col">Status</th>
                        <th scope="col">Location</th>
                        <th scope="col">Blood Type</th>
            
            

                    </tr>
                </thead>

                <tbody>

                <?php

                    while ($row = mysqli_fetch_assoc($result)){

                        echo "<tr>";
                            echo "<td>" . $row['request_id'] . "</td>";  
                            echo "<td>" . $row['request_date'] . "</td>";
                            echo "<td>" . $row['unit'] . "</td>";
                            echo "<td>" . $row['reason'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['bloodtype'] . "</td>";

                        echo "</tr>";
                    }
                ?>


                </tbody>

            </table>

        </div>




    </div>
</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->

</body>
</html>
