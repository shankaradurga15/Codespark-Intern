<?php
if(isset($_GET["Id"])){
    $I=$_GET["Id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql="DELETE FROM details WHERE Id=$I";
    $conn->query($sql);
}
header("location:/mystore/index.php");
exit;

?>
