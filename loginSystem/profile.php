<?php
include './template.php';
include './partials/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-5 text-uppercase">Your Profile</h2>
              <!-- <p class="text-white-50 mb-5">Please enter your login and password!</p> -->

            <div class="mb-3">
            <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" width="150" height="150" alt="">
                    <!-- Profile picture help block-->
            </div>

            <!-- Retrieving username and contact details -->
            <?php 
            $username = $_GET['name'];
            $query7 = "SELECT * FROM `users`.`users` WHERE `username`= '$username'";
            $result7 = $conn->query($query7);
            $row = $result7->fetch_assoc();
            ?>
            <div class="mb-3">
               <p>Username: <?php echo $row['username'] ?></p>
            </div>
            <div class="mb-3">
              <p>Email: <?php echo $row['email'] ?></p>
            </div>
            <a href="./welcome.php" class="btn btn-outline-light btn-lg px-5">Back</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>