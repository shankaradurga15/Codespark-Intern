<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$n=$_POST['R_Name'];
$p=$_POST['Phone_no'];
$e=$_POST['Email_id'];
$g=$_POST['Gender'];
$d=$_POST['Date_of_birth'];
$sql = "INSERT INTO details(R_Name,Phone_no,Email_id,Gender,Date_of_birth)values('$n','$p','$e','$g','$d')"; 
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}