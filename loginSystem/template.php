<?php

include './partials/connection.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header('location: login.php');
    exit;
}
$username = $_SESSION['username'];

$query8 = "SELECT `sno` FROM `users`.`users` WHERE `username` = '$username'";
$result8 = $conn->query($query8);
$row = $result8->fetch_assoc();
$userID = $row['sno'];

$query9 = "SELECT * FROM `users`.`contacts` WHERE `userID` = '$userID'";
$result9 = $conn->query($query9);
$contacts = $result9->num_rows;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/1e291dc247.js" crossorigin="anonymous"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
      rel="stylesheet"
    />
        <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- <h1></h1>
    <a href="./logout.php">Logout</a> -->
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark gradient-custom">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['username'] ?></a>

    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-bars text-light"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link active" aria-current="page" href="./welcome.php">
            <div>
              <i class="fas fa-home fa-lg mb-1"></i>
            </div>
            Home
          </a>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="./addContact.php">
            <div>
            <i class="fa-solid fa-plus mx-2 mx-lg-1"></i>
            </div>
            Add New Contact
          </a>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="./allContacts.php">
            <div>
            <i class="fa-solid fa-address-card mx-2 mx-lg-1"></i>
              <span class="badge rounded-pill badge-notification bg-dark" id="contacts"><?php echo $contacts?></span>
            </div>
            All Contacts
          </a>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="./profile.php?name=<?php echo $_SESSION['username']?>">
            <div>
            <i class="fa-solid fa-user mx-2 mx-lg-1"></i>
            </div>
            Profile
          </a>
        </li>
          <!-- Dropdown menu -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- Left links -->

      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="#!">
            <div>
              <i class="fas fa-bell fa-lg mb-1"></i>
              <span class="badge rounded-pill badge-notification bg-dark" id="noOfContacts"></span>
            </div>
            Messages
          </a>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="./logout.php">
            <div>
            <i class="fa-solid fa-right-from-bracket fa-lg mb-1"></i>
            </div>
            Logout
          </a>
        </li>
      </ul>
      <!-- Right links -->

      <!-- Search form -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
></script>
</body>
</html>