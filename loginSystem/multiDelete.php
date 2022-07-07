<?php 
include './partials/connection.php';
        if(isset($_POST['delete'])){
          
          if(!isset($_POST['check'])){
                echo "<script>alert('No Records Selected!'); window.location.replace('http://localhost/webcreta/phone%20book/loginSystem/allContacts.php'); 
                </script>";
        }
        else{
        $all_id = $_POST['check'];
          $extract_id = implode(',', $all_id);
$delquery = "DELETE FROM `users`.`contacts` WHERE `contactID` IN($extract_id)";
$conn->query($delquery);
header('location:allContacts.php');
        }
    }
?>