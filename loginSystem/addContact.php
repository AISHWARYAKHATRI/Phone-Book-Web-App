<?php 
include './template.php';
include './partials/connection.php';

$contactInserted = false;
$username = $_SESSION['username'];
$query = "SELECT `sno` FROM `users`.`users` WHERE `username`= '$username'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$userID = $row['sno'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST['name'];
  $number = $_POST['number'];

  if($name == "" && $number == ""){
    echo "<script>alert('Please Fill Details!')</script";
    echo "<script>window.location.replace('http://localhost/webcreta/phone%20book/loginSystem/addContact.php')</script>";
  }else{
  // Inserting data into database named contacts

  $query1 = "INSERT INTO `users`.`contacts`(`userID`, `name`, `number`) VALUES ('$userID', '$name', '$number')"; 
  $contactInsert = $conn->query($query1);

  if($contactInsert){
    $contactInserted = true;
    echo "<script> window.location.replace('http://localhost/webcreta/phone%20book/loginSystem/allContacts.php')</script>";
  }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
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
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
></script>

</head>
<body>

<?php 
if($contactInserted){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> New Contact Added.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-5 text-uppercase">Add New COntact</h2>
              <!-- <p class="text-white-50 mb-5">Please enter your login and password!</p> -->
            <form action="./addContact.php" method="post">
            <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label text-white">Name</label>
               <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label text-white">Number</label>
              <input type="tel" maxlength="10" class="form-control" id="exampleFormControlInput1" name="number" value="">
            </div>
              <input type="submit" class="btn btn-outline-light btn-lg px-5" value="Save Contact" name="addContact">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
  const id = document.getElementById('noOfContacts');
  console.log(id.innerText);
  // <?php
  // $query3 = "SELECT * FROM `users`.`contacts` WHERE `userID` = '$userID'";
  // $result3 = $conn->query($query3);
  // $noOfContacts = $result3->num_rows;
  // echo $noOfContacts;
  // ?>
  id.innerText = '1';
  console.log(id.innerText);

</script>
</body>
</html>