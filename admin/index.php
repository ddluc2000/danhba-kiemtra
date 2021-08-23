<?php
    include("config/db.php");    
    if(!isset($_SESSION['login'])){
        header('location:'.SITEURL.'/admin/login.php');
    }
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
                                <a class="nav-link" href="users/usersManagement.php">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cadres/cadresManagement.php">Cadres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="unit/unitManagement.php">Units</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
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
            <div id="main-main" class="container-fluid" >
                <main>
                    <h2>Dashboard</h2>
                    <div class="row main-content">
                        <div class="col col-md-3 mx-2 bg-white">
                            <h3>
                                <?php
                                    $sql = "SELECT * FROM tbadmin";
                                    $result = mysqli_query($conn,$sql);
                                    $count_users = mysqli_num_rows($result);
                                    echo $count_users;
                                ?>
                            </h3>
                            <p>Users</p>
                        </div>
                        <div class="col col-md-3 mx-2 bg-white">
                            <h3>
                                <?php
                                    $sql1 = "SELECT * FROM tbcanbo";
                                    $result1 = mysqli_query($conn,$sql1);
                                    $count_cadres = mysqli_num_rows($result1);
                                    echo $count_cadres;
                                ?>
                            </h3>
                            <p>Cadres</p>
                        </div>
                        <div class="col col-md-3 mx-2 bg-white">
                            <h3>
                            <?php
                                    $sql2 = "SELECT * FROM tbdonvi";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $count_unit = mysqli_num_rows($result2);
                                    echo $count_unit;
                            ?>
                            </h3>
                            <p>Units</p>
                        </div>
                    </div>
                </main>
            </div>
    <?php
    include("footer.php");