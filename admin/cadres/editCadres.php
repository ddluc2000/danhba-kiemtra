<?php
    ob_start();
    include("../config/db.php");    
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
            </header>
            
<div class="main-content">
    <div id="main-main" class="container-fluid" >
        <main>
            <?php   
            if(isset($_GET['id']))
            {
                $getid = $_GET['id'];
                $sql = "SELECT * FROM tbcanbo WHERE id= $getid ";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0)
                {
                    $row = mysqli_fetch_assoc($result);
                    $idCanbo = $row['id'];
                    $name = $row['canboName'];
                    $chucvu = $row['canboChucvu'];
                    $dtcq = $row['canboDtcq'];
                    $email = $row['canboEmail'];
                    $didong = $row['canboDidong'];
                    $iddonvi = $row['idDonvi'];
                }
                else
                {
                    header('location:'.SITEURL.'/admin/cadres/cadresManagement.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'/admin/cadres/cadresManagement.php');
            }
            ?>
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>Id</td>
                        <td>
                            <input type="text" name="txtId" value="<?php echo $idCanbo; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Họ và tên</td>
                        <td>
                            <input type="text" name="txtName" value="<?php echo $name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Chức vụ</td>
                        <td>
                            <input type="text" name="txtChucvu" value="<?php echo $chucvu; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" name="txtEmail" value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>SĐT cơ quan</td>
                        <td>
                            <input type="text" name="txtDtcq" value="<?php echo $dtcq; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Di động</td>
                        <td>
                            <input type="text" name="txtDidong" value="<?php echo $didong;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Id đơn vị</td>
                        <td>
                            <input type="text" name="txtIddonvi" value="<?php echo $iddonvi;?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="btnEdit" value="Save" class="btn btn-success">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                if(isset($_POST['btnEdit'])){
                    $id1     = $_POST['txtId'];
                    $name1   = $_POST['txtName'];
                    $email1  = $_POST['txtEmail'];
                    $chucvu1 = $_POST['txtChucvu'];
                    $dtcq1   = $_POST['txtDtcq'];
                    $didong1 = $_POST['txtDidong'];
                    $iddonvi1= $_POST['txtIddonvi'];
                    $sql2 = "UPDATE tbcanbo SET
                        id = '$id1', 
                        canboName = '$name1', 
                        canboChucvu = '$chucvu1',
                        canboDtcq = '$dtcq1',
                        canboEmail = '$email1',
                        canboDidong = '$didong1',
                        idDonvi = '$iddonvi1' WHERE id = $idCanbo ";
                    if(mysqli_query($conn,$sql2)){
                        $_SESSION['add'] = "<div class='success'>Cadres Edited Successfully.</div>";
                        header('location:'.SITEURL.'/admin/cadres/cadresManagement.php');
                    }
                    else{
                        $_SESSION['add-mes'] = "<div class = 'success'>Cadres Edited Failed.</div>";
                        header('location:'.SITEURL.'/admin');
                    }
                }
            ?>
        </main>
    </div>
    <?php
    include("../footer.php");
    ob_end_flush();
?>