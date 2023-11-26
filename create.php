<?php

$servername="localhost";
$username="root";
$password="";
$database="quanlybds_team02";
//create connection
$connection=new mysqli($servername,$username,$password,$database);

 
$ID="";
$Full_Contract_Code="";
$Customer_Name="";
$Year_Of_Birth="";
$SSN="";
$Customer_Address="";
$Mobile="";
$Property_ID="";
$Date_Of_Contract="";
$Price="";
$Deposit="";
$Remain="";
$Status="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $Customer_Name=$_POST["Customer_Name"];
    $Year_Of_Birth=$_POST["Year_Of_Birth"];
    $SSN=$_POST["SSN"];
    $Customer_Address=$_POST["Customer_Address"];
    $Mobile=$_POST["Mobile"];
    $Date_Of_Contract=$_POST["Date_Of_Contract"];
    $Price=$_POST["Price"];
    $Deposit=$_POST["Deposit"];
    $Remain=$_POST["Remain"];
    $Status=$_POST["Status"];

    do{
        if(empty($Customer_Name)||empty($Year_Of_Birth)||empty($SSN)||empty($Customer_Address)||empty($Mobile)||empty($Date_Of_Contract)||empty($Price)||empty($Deposit)||empty($Remain)||empty($Status)){
            $errorMessage="điền đầy đủ thông tin";
            break;
        }
        //add new client to database

        $sql="INSERT INTO `full_contract` (`ID`, `Full_Contract_Code`, `Customer_Name`, `Year_Of_Birth`, `SSN`, `Customer_Address`, `Mobile`, `Property_ID`, `Date_Of_Contract`, `Price`, `Deposit`, `Remain`, `Status`)" . 
            "VALUES (NULL,NULL,'$Customer_Name','$Year_Of_Birth','$SSN','$Customer_Address','$Mobile','$Property_ID','$Date_Of_Contract','$Price','$Deposit','$Remain','$Status')";
        $result = $connection->query($sql);
        if(!$result){
            $errorMessage="Invalid query:" . $connection->error;
            break;    
        }

        $ID="";
        $Full_Contract_Code="";
        $Customer_Name="";
        $Year_Of_Birth="";
        $SSN="";
        $Customer_Address="";
        $Mobile="";
        $Property_ID="";
        $Date_Of_Contract="";
        $Price="";
        $Deposit="";
        $Remain="";
        $Status="";


        $successMessage="thêm thành công";

        header("location:index.php");
        exit;
    } while (false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPC Company ADD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .alert {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            display: inline-block;
        }
        header h1 {
            margin: 0;
        }
        img {
            height: 80px;
            width: 80px;
            margin-top: 10px;
        }
    </style>

</head>
<body>
    <div class="container my-5">
    <h1>PCC Company</h1>
    <img src="logo.png" alt="1" style="height: 100px; width: 100px;">
        <h2>Hợp Đồng Mới</h2>
        <?php
             if(!empty($errorMessage)){
                echo"
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
             }
            ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Customer_Name*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Customer_Name" value="<?php echo $Customer_Name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Year_Of_Birth*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Year_Of_Birth" value="<?php echo $Year_Of_Birth;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">SSN*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="SSN" value="<?php echo $SSN;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Customer_Address*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Customer_Address" value="<?php echo $Customer_Address;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Mobile*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Mobile" value="<?php echo $Mobile;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Property_ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Property_ID" value="<?php echo $Property_ID;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date_Of_Contract*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Date_Of_Contract" value="<?php echo $Date_Of_Contract;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Price*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Price" value="<?php echo $Price;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Deposit*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Deposit" value="<?php echo $Deposit;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Remain*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Remain" value="<?php echo $Remain;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Status*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Status" value="<?php echo $Status;?>">
                </div>
            </div>

            <?php
            if(!empty($successMessage)){
            echo"
            <div class='row mb-3'>
                <div class='offset-sm-3' col-sm-6>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
            </div>
            ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>