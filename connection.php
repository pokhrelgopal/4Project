<?php
$con=mysqli_connect("localhost","root","root","labs");
if($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}
?>