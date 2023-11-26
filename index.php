<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPC Company</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
          body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #495057;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header img {
            height: 80px;
            width: 80px;
            margin-bottom: 10px;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .btn-primary {
            display: inline;
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .table {
            width: 10%;
            border-collapse: right;
            margin-top: 30px;
            margin-right:1000000px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            vertical-align: right;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header><img src="logo.png" alt="1">
        <h1>PCC Company</h1>
</header>
    <div class="container my-5"> 
    <h2 style="font-size: 32px; margin-bottom: 20px; color: #007bff;">Danh Sách Hợp Đồng</h2>
        <a href="create.php" class="btn btn-primary">New Contract</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full_Contract_Code</th>
                    <th>Customer_Name</th>
                    <th>Year_Of_Birth</th>
                    <th>SSN</th></br>
                    <th>Customer_Address</th>
                    <th>Mobile</th>
                    <th>Property_ID</th>
                    <th>Date_Of_Contract</th>
                    <th>Price</th>
                    <th>Deposit</th>
                    <th>Remain</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername="localhost";
                $username="root";
                $password="";
                $database="quanlybds_team02";
                //create connection
                $connection=new mysqli($servername,$username,$password,$database);
                //check connection
                if ($connection->connect_error){
                    die("loi ket noi".$connection->connect_error);
                }
                // đọc toàn bộ dữ liệu trong database
                $sql="select * from Full_Contract";
                $result = $connection->query($sql);
                if(!$result){
                    die("loi gia tri:".$connection->error);
                }
                while($row=$result->fetch_assoc()){
                    echo "<tr>
                    <td>$row[ID]</td>
                    <td>$row[Full_Contract_Code]</td>
                    <td>$row[Customer_Name]</td>
                    <td>$row[Year_Of_Birth]</td>
                    <td>$row[SSN]</td>
                    <td>$row[Customer_Address]</td>
                    <td>$row[Mobile]</td>
                    <td>$row[Property_ID]</td>
                    <td>$row[Date_Of_Contract]</td>
                    <td>$row[Price]</td>
                    <td>$row[Deposit]</td>
                    <td>$row[Remain]</td>
                    <td>$row[Status]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='delete.php?ID=$row[ID]'>Delete</a>
                    </td>
                </tr>" ;
                }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>