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
                            <li class="nav-item">
                                <a class="nav-link" href="../users/usersManagement.php">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../cadres/cadresManagement.php">Cadres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="unitManagement.php">Unit</a>
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
        <h1>Manage Unit</h1>
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
        <a href="addUnit.php" class="btn-primary">Add Unit</a>

        <br /><br /><br />
    <div>
        <?php 
            $sql = "SELECT * FROM tbdonvi";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $i = 1;
        ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr class="t-tittle">
                            <th scope="col">TT</th>
                            <th scope="col">Tên đơn vị</th>
                            <th scope="col">Mã đơn vị</th>
                            <th scope="col">Thông tin</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                            
                            $id = $row['id'];
                    ?>
                            <tr>
                                <th scope="row"><?php echo $i?></th>
                                <td><?php echo $row['donviName'];?></td>
                                <td><?php echo $row['maDonvi'];?></td>
                                <td><?php echo $row['donviDescription'];?></td>
                                <td>
                                    <a href="editUnit.php?id=<?php echo $id; ?>" class="btn-secondary">Edit Unit</a>
                                    <a href="deleteUnit.php?id=<?php echo $id; ?>" class="btn-danger">Delete Unit</a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php    
            }
            else{
            ?>
                <h3><?php echo ("Không có dữ liệu!");?></h3>
            <?php
            }
            ?>
            
    </div>
    
</main>

<?php include('../footer.php') ?>