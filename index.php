<?php include('admin/config/db.php');
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
                <div class="row row2">
                    <h2>
                        Danh sách các phòng khoa ban
                    </h2>
                </div>  
                <form method="GET" class="row row1">
                    <?php
                        $sql1 = "SELECT * FROM tbdonvi";
                        $result1 = mysqli_query($conn,$sql1);
                        if(mysqli_num_rows($result1)>0){
                            while($row1 = mysqli_fetch_assoc($result1)){
                                $iddonvi = $row1['id'];
                    ?>
                                        <div class="container px-4 py-5" id="featured-3">
                                                <h2 class="pb-2 border-bottom unit-tt"><?php echo ($row1['donviName']);?></h2>
                                                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                                                    <?php   
                                                        $sql2 = "SELECT * FROM tbcanbo WHERE idDonvi = $iddonvi";
                                                        $result2 = mysqli_query($conn,$sql2);
                                                        if(mysqli_num_rows($result2)>0){
                                                            while($row2 = mysqli_fetch_assoc($result2)){
                                                    ?>
                                                                <div class="feature col bg-white" style="padding:10px;">
                                                                    <h3><?php echo($row2['canboName']);?></h3>
                                                                    <div class="bg-info">
                                                                        <p style="padding:8px;">
                                                                            <?php echo($row2['canboChucvu']);?>
                                                                        </p>
                                                                        <a href="details.php?id=<?php echo($row2['id']);?>" class="link">
                                                                            Chi tiết
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                        </div>
                    <?php
                            }
                        }
                        else { 
                            echo "<div class='error'>Not data.</div>";
                        }

                    ?>
                    </form>
            </main>
<?php include("footer.php")?>