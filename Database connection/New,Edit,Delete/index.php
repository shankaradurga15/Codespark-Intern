<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
    <center><h1>List the Datas</h1></center>
    <form method="post" action="send-mail.php">
    <a class="btn btn-primary" href="/mystore/create.php"role="button">New Client</a>
   <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PHONE NO</th>
                <th>EMAIL ID</th>
                <th>GENDER</th>
                <th>DOB</th>
                <th>ACTION</th>
            </tr>
        </thead>   
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "web";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              $q="select* from details";
              $r=$conn->query($q);
              if (!$r) {
                die("Invalid query: " . $conn->error);
              }
              while($row=$r->fetch_assoc()){
                 echo"<tr>
                    <td>". $row['Id']."</td>
                    <td>".$row['R_Name']."</td>
                    <td>". $row['Phone_no']."</td>
                    <td>".$row['Email_id']."</td>
                    <td>". $row['Gender']."</td>
                    <td>".$row['Date_of_birth']."</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/mystore/edit.php?Id=$row[Id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/mystore/delete.php?Id=$row[Id]'>Delete</a>

                    </td> 
                </tr>";
              }
           ?>          
    </table>
            </form>
</body>
</html>