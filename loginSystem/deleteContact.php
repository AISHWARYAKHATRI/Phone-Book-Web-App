<?php 
ob_start();
include './partials/connection.php';
include './template.php';

$contactID = $_GET['i'];
$userID = $_GET['rn'];

$query6 = "DELETE FROM `users`.`contacts` WHERE `contactID` = '$contactID' AND `userID` = '$userID'";
$deletedContact = $conn->query($query6);

if($deletedContact){
    header('location: allContacts.php');
}
ob_end_flush();
?>
