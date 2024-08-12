<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";
$conn = new mysqli($servername, $username, $password, $dbname);
$R_Name="";
$Phone_no="";
$Email_id="";
$Gender="";
$Date_of_birth="";

$errorMessage="";
$successMessage="";
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $R_Name=$_POST["R_Name"];
    $Phone_no=$_POST["Phone_no"];
    $Email_id=$_POST["Email_id"];
    $Gender=$_POST["Gender"];
    $Date_of_birth=$_POST["Date_of_birth"];
    do{
       if(empty($R_Name)||empty( $Phone_no)||empty($Email_id)||empty( $Gender)||empty( $Date_of_birth)){
        $errorMessage="All the finish are required";
        break;
       }
       //add new client to database
       $sql = "INSERT INTO details(R_Name,Phone_no,Email_id,Gender,Date_of_birth)values('$R_Name','$Phone_no','$Email_id','$Gender','$Date_of_birth')"; 
       $r=$conn->query($sql);
              if (!$r) {
                $errorMessage="Invalid query: " . $conn->error;
                break;
              }
       $R_Name="";
       $Phone_no="";
       $Email_id="";
       $Gender="";
       $Date_of_birth="";

       $successMessage="Client added correctly";
       header("location:/mystore/index.php");
       exit;

    }while(true);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container my-5">
       

        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post" action="connect.php">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">NAME</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="R_Name" value="<?php echo $R_Name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">PHONE NO</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="Phone_no" value="<?php echo $Phone_no; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">EMAIL ID</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="Email_id" value="<?php echo $Email_id; ?>">
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
                    <input type="date" class="form-control" name="Date_of_birth" value="<?php echo $Date_of_birth; ?>">
                </div>
            </div>
            <?php
            if(!empty($successMessage)){
                echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/mystore/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>