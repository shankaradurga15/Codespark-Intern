<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$Id=$_GET['Id'];
$sql="select * from details where Id=$Id";
$r=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($r);
$R_Name=$row['R_Name'];
$Phone_no=$row['Phone_no'];
$Email_id=$row['Email_id'];
$Gender=$row['Gender'];
$Date_of_birth=$row['Date_of_birth'];
if (isset($_POST["submit"])) {
    $R_Name = $_POST["R_Name"];
    $Phone_no = $_POST["Phone_no"];
    $Email_id= $_POST["Email_id"];
    $Gender = $_POST["Gender"];
    $Date_of_birth= $_POST["Date_of_birth"];
    $sql="update details set Id=$Id,R_Name='$R_Name',Phone_no='$Phone_no',Email_id='$Email_id',Gender='$Gender',Date_of_birth='$Date_of_birth' 
    where Id=$Id";
    $r=mysqli_query($conn,$sql);
    if($r){
        header('location:/mystore/index.php');
    }
    else{
        die("Connection failed: " . $conn->connect_error);
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <me ta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container my-5">
        

        
        <form method="post">
            <input type="hidden" name="Id" value="<?php echo $Id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">NAME</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="R_Name" value="<?php echo $R_Name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">PHONE NO</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Phone_no" value="<?php echo $Phone_no; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">EMAIL ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Email_id" value="<?php echo $Email_id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">GENDER</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Gender" value="<?php echo $Gender; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">DOB</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Date_of_birth" value="<?php echo $Date_of_birth; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid ">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/mystore/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>