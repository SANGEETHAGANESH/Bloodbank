<?php  session_start(); ?>
<!-- admin home page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

    <link rel="stylesheet" href = "css/home.css">

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

    <?php

        include 'database.php';

        $id = $_SESSION['adminid'];

        $sql = "SELECT * FROM blood_stock ";
        $result = mysqli_query($con,$sql);





    ?>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-danger">
        <a style="color:white;" class="navbar-brand" href="admin.php">Blood Bank Management</a>


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
    <div class="main_content">
   <h1 class="text-center pt-5"  > Available Blood in Units</h1>
<br><br>
<div class="container">
<?php
    while($row = mysqli_fetch_assoc($result))
    {
        $blood[$row['blood_type']] = $row['unit'];
    }
    ?>


    <div class="row">
        <div class="col-sm-3">
          <div class="card bg-light">
            <div class="card-body">
                <div class="blood">
                    <h2>A+ <i class="fas fa-tint"></i></h2>
                </div><br><br>
                <div>
                    <?php echo $blood['A+']; ?>
                </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="blood">
                        <h2>B+ <i class="fas fa-tint"></i></h2>
                    </div><br><br>
                    <div>
                      <?php echo $blood['B+']; ?>
                    </div>
                </div>
              </div>
        </div>
        <div class="col-sm-3">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="blood">
                        <h2>O+ <i class="fas fa-tint"></i></h2>
                    </div><br><br>
                    <div>
                      <?php echo $blood['O+']; ?>
                    </div>
                </div>
              </div>
          </div>
          <div class="col-sm-3">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="blood">
                        <h2>AB+ <i class="fas fa-tint"></i></h2>
                    </div><br><br>
                    <div>
                      <?php echo $blood['AB+']; ?>
                    </div>
                </div>
              </div>
          </div>
      </div>

        <div class="row">
            <div class="col-sm-3">
              <div class="card bg-light">
                <div class="card-body">
                    <div class="blood">
                        <h2>A- <i class="fas fa-tint"></i></h2>
                    </div><br><br>
                    <div>
                      <?php echo $blood['A-']; ?>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="blood">
                            <h2>B- <i class="fas fa-tint"></i></h2>
                        </div><br><br>
                        <div>
                          <?php echo $blood['B-']; ?>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="blood">
                            <h2>O- <i class="fas fa-tint"></i></h2>
                        </div><br><br>
                        <div>
                          <?php echo $blood['O-']; ?>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="col-sm-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="blood">
                            <h2>AB- <i class="fas fa-tint"></i></h2>
                        </div><br><br>
                        <div>
                          <?php echo $blood['AB-']; ?>
                        </div>
                    </div>
                  </div>
                </div>
            </div>


<hr>



<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>
