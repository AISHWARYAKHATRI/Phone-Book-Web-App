<?php

include './template.php';
include './partials/connection.php';

$username = $_SESSION['username'];
$query = "SELECT `sno` FROM `users`.`users` WHERE `username`= '$username'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$userID = $row['sno'];
$query3 = "SELECT * FROM `users`.`contacts` WHERE `userID` = '$userID'";
$result3 = $conn->query($query3);
$noOfContacts = $result3->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Links for datatable -->
    <!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />

    <title>All Contacts</title>
</head>
<body>
    <h1 class="text-center my-5"><?php echo $noOfContacts?> Contacts</h1>
    <form action="./multiDelete.php" method="post">
    <div class="container-sm my-5">
<table class="table table-striped table-dark" id="myTable">
  <thead>
  <tr>
      <!-- <th scope="col"></th> -->
      <th><input type="checkbox" name="chkall" onchange="checkAll(this)"></th>
      <th scope="col">Name</th>
      <th scope="col">Number</th>
      <th>Action(s)</th>
      <!-- <th scope="col">Handle</th> -->
    </tr>
  </thead>
  <tbody>
    <?php  
    $query4 = "SELECT * FROM `users`.`contacts` WHERE `userID` = '$userID'";
    $result4 = $conn->query($query4);
    if($result4->num_rows){
    while($row = $result4->fetch_assoc()){ ?>
        <tr>
        <td><input type="checkbox" name="check[]" value="<?php echo $row['contactID']?>"></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['number']; ?></td>
        <td>
          <div class="d-flex">
              <a href="./editContact.php?i=<?php echo $row['contactID'] ?>&rn=<?php echo $userID ?>&n=<?php echo $row['name'] ?>&num=<?php echo $row['number'] ?>"><i class="fa-solid fa-pen"></i></a>
              <p class="mx-2"></p>
              <a onclick="return confirm('Are you sure to delete this contact?')" href="./deleteContact.php?i=<?php echo $row['contactID'] ?>&rn=<?php echo $userID ?>"><i class="fa-solid fa-trash-can"></i></a>
          </div>
        </td>
      </tr>
  <?php 
    }  
}
    ?>
  </tbody>
</table>
<div class="text-center">
<input type="submit" class="btn btn-success btn-lg" value="Delete" name="delete" onclick="return alert('Are you sure you want to delete?')">
</div>
</div>
</form>
<script>
  var checkboxes = document.querySelectorAll("input[type = 'checkbox']");
      // console.log(checkboxes);
      function checkAll(myCheckbox){
        if(myCheckbox.checked == true){
          checkboxes.forEach(function(checkbox){
            checkbox.checked = true;
          });
        }
        else{
          checkboxes.forEach(function(checkbox){
            checkbox.checked = false;
          });
        }
      }
      // links for datatables

      $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
</body>
</html>