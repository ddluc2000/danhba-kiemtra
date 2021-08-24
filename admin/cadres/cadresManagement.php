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
                        <form method="POST" class="search" action="<?php echo SITEURL; ?>/admin/search.php"> 
                            <i class="fa fa-search"></i> 
                            <input id="txtSearch" name="txtSearch" type="text" class="form-control" placeholder="Bạn muốn tìm gì?" required> 
                            <button name="sbmSearch" type="submit" class="btn btn-primary">Search</button> 
                        </form>
                    </div>
                </div>
            </header>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Cadres</h1>
        <?php 
            if(isset($_SESSION['add'])){
        ?>  <br>
        <?php
                echo $_SESSION['add'];
                unset($_SESSION['add']);
        ?>  <br>
        <?php
            }
            if(isset($_SESSION['add-mes']))
            {
        ?>  <br>
        <?php
                echo $_SESSION['add-mes'];
                unset($_SESSION['add-mes']);
        ?>  <br>
        <?php
            }
        ?>
        <?php 
            if(isset($_SESSION['edit'])){
        ?>  <br>
        <?php
                echo $_SESSION['edit'];
                unset($_SESSION['edit']);
        ?>  <br>
        <?php
            }
            if(isset($_SESSION['edit-mes']))
            {
        ?>  <br>
        <?php
                echo $_SESSION['edit-mes'];
                unset($_SESSION['edit-mes']);
        ?>  <br>
        <?php
            }
        ?>
        <?php 
            if(isset($_SESSION['delete'])){
        ?>  <br>
        <?php
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
        ?>  <br>
        <?php
            }
            if(isset($_SESSION['delete-mes']))
            {
        ?>  <br>
        <?php
                echo $_SESSION['delete-mes'];
                unset($_SESSION['delete-mes']);
        ?>  <br>
        <?php
            }
        ?>                       
        <br />
        <a href="addCadres.php" class="btn-primary">Add Cadres</a>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Filter Cadres
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <form method="GET" action="">
                    <?php
                        $sql2 = "SELECT * FROM tbdonvi";
                        $result2 = mysqli_query($conn,$sql2);
                        if(mysqli_num_rows($result2)){
                            while($row2 = mysqli_fetch_assoc($result2)){
                    ?>                        
                                <li><a class = "dropdown-item" href="filterCadres.php?id=<?php echo $row2['id']?>"><?php echo $row2['donviName'];?></a></li>                        
                    <?php
                            }
                        }
                    ?>
                </form>
            </ul>
        </div>
        <br /><br /><br><br>
    <div>
        <?php 
            $sql = "SELECT * FROM tbcanbo";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $i = 1;
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($result)){                              
                                $idDonvi = $row['idDonvi'];
                                $sql1 = "SELECT * FROM tbdonvi WHERE id = '$idDonvi'";
                                $result1 = mysqli_query($conn,$sql1);
                                $row1 = mysqli_fetch_assoc($result1);
                                $id = $row['id'];
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $i ;?></th>
                                    <td><?php echo $row['canboName'];?></td>
                                    <td><?php echo $row['canboChucvu'];?></td>
                                    <td><?php echo $row['canboDtcq'];?></td>
                                    <td><?php echo $row['canboEmail'];?></td>
                                    <td><?php echo $row['canboDidong'];?></td>
                                    <td><?php echo $row1['donviName'];?></td>
                                    <td>
                                        <a href="editCadres.php?id=<?php echo $id; ?>" class="btn-secondary">Edit Cadres</a>
                                        <a href="deleteCadres.php?id=<?php echo $id; ?>" class="btn-danger">Delete Cadres</a>
                                    </td>
                                </tr>
                                <?php
                                    $i++ ;
                            }
                        ?>   
                    </tbody>
                </table>
            <?php    
            }
            else {
            ?>
                <h3><?php echo ("Không có dữ liệu!");?></h3>
            <?php
            }
            ?>
            
    </div>
    
</div>

<?php include('../footer.php'); ?>