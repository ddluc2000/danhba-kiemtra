<?php
    include('../config/db.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Danh Bạ</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="container-fluid">
            <header class="head">
                <div class="row header-top">
                    <div class="header-top-left">
                        <h2>DANH BẠ TLU</h2>
                    </div>
                    <div class="header-top-right">
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">Home</a>
                            </li>
                            <li>
                                <a class="nav-link" href="../users/usersManagement.php">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cadresManagement.php">Cadres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../unit/unitManagement.php">Unit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
                <div class="row header-bottom">
                    <div class="row height d-flex">
                    </div>
                </div>
            </header>
            <main>
                <?php
                    if(isset($_GET['id'])){
                        $getid = $_GET['id'];
                        $sql = "SELECT * FROM tbcanbo WHERE idDonvi=$getid";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                            $i=1;
                ?>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr class="t-tittle">
                                        <th scope="col">TT</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Chức vụ</th>
                                        <th scope="col">Số máy cơ quan</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Di động</th>
                                        <th scope="col">Đơn vị</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)){
                                        $sql1 = "SELECT * FROM tbdonvi WHERE id = '$getid'";
                                        $result1 = mysqli_query($conn,$sql1);
                                        $row1 = mysqli_fetch_assoc($result1);
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $i;?></th>
                                            <td><?php echo $row['canboName'];?></td>
                                            <td><?php echo $row['canboChucvu'];?></td>
                                            <td><?php echo $row['canboDtcq'];?></td>
                                            <td><?php echo $row['canboEmail'];?></td>
                                            <td><?php echo $row['canboDidong'];?></td>
                                            <td><?php echo $row1['donviName'];?></td>
                                        </tr>
                                <?php
                                        $i++;
                                    }
                                ?>
                                </tbody>
                            </table>
                    <?php
                        }
                    }
                    else{
                        echo "Not data";
                    }
                ?>
            </main>