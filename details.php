<?php include('admin/config/db.php');
      session_start();
?>
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
                    <div class="row height d-flex">
                        <form method="POST" class="search" action="<?php echo SITEURL; ?>/search.php"> 
                            <i class="fa fa-search"></i> 
                            <input id="txtSearch" name="txtSearch" type="text" class="form-control" placeholder="Bạn muốn tìm gì?" required> 
                            <button name="sbmSearch" type="submit" class="btn btn-primary">Search</button> 
                        </form>
                    </div>
                </div>
            </header>
            <main>
                <div class="row">
                    <img class="img-responsive" src="images/olp2021.JPG" alt="olp-2021">
                </div>
                <?php
                    if(isset($_GET['id'])){
                        $getid = $_GET['id'];
                        $sql = "SELECT * FROM tbcanbo WHERE id=$getid";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){ 
                ?>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr class="t-tittle">
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
                                        $idDonvi = $row['idDonvi'];
                                        $sql1 = "SELECT * FROM tbdonvi WHERE id = '$idDonvi'";
                                        $result1 = mysqli_query($conn,$sql1);
                                        $row1 = mysqli_fetch_assoc($result1);
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['canboName'];?></th>
                                            <td><?php echo $row['canboChucvu'];?></td>
                                            <td><?php echo $row['canboDtcq'];?></td>
                                            <td><?php echo $row['canboEmail'];?></td>
                                            <td><?php echo $row['canboDidong'];?></td>
                                            <td><?php echo $row1['donviName'];?></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                    <?php    
                        }
                    ?>
            <?php
                    }
            ?>
            </main>
<?php include("footer.php")?>