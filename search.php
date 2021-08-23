<?php include('admin/config/db.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Danh Bạ</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
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
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row header-bottom">
                    <div class="row height d-flex text-center">
                        <?php 
                            // $search = $_POST['search'];
                            $search = mysqli_real_escape_string($conn, $_POST['txtSearch']);
                        ?>
                        <h2>Bạn muốn tìm: <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>
                    </div>
                </div>
            </header>
            <main>  
                <div class="row row1">
                    <?php
                        $sql = "SELECT * FROM tbcanbo WHERE canboName LIKE '%$search%' OR canboChucvu LIKE '%$search%'" ;
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                $iddonvi = $row['idDonvi'];
                                $sql1 = "SELECT * FROM tbdonvi WHERE id=$iddonvi";
                                $result1 = mysqli_query($conn,$sql1);
                                $row1 = mysqli_fetch_assoc($result1);     
                    ?>
                                    <div class="col-4 bg-white" style="padding:10px;">
                                        <h2><?php echo($row['canboName']);?></h2>
                                            <div class="bg-info">
                                                <p style="padding:8px;">
                                                    <h5>Chức vụ: <?php echo($row['canboChucvu']);?></h5>
                                                    <h5>Điện thoại cơ quan: <?php echo($row['canboDtcq']);?></h5>
                                                    <h5>Email: <?php echo($row['canboEmail']);?></h5>
                                                    <h5>Di động: <?php echo($row['canboDidong']);?></h5>
                                                    <h5>Tên đơn vị: <?php echo($row1['donviName']);?></h5>
                                                    <h5>Thông tin đơn vị: <?php echo($row1['donviDescription']);?></h5>
                                                </p>
                                            </div>
                                    </div>
                    <?php
                                
                            }
                        }
                        else { 
                            echo "<div class='error'>Not data.</div>";
                        }

                    ?>
                    </div>
            </main>

<?php include("footer.php")?>