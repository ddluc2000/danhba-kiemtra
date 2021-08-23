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
    <div id="main-main" class="container-fluid" >
        <main>
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>Id</td>
                        <td>
                            <input type="text" name="txtId" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td>Họ và tên</td>
                        <td>
                            <input type="text" name="txtName" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td>Chức vụ</td>
                        <td>
                            <input type="text" name="txtChucvu" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" name="txtEmail" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td>SĐT cơ quan</td>
                        <td>
                            <input type="text" name="txtDtcq" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td>Di động</td>
                        <td>
                            <input type="text" name="txtDidong" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td>Id đơn vị</td>
                        <td>
                            <input type="text" name="txtIddonvi" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="btnAdd" value="Save" class="btn btn-success">
                        </td>
                    </tr>
                    
                </table>
            </form>
            <?php
                if(isset($_POST['btnAdd'])){
                    $id     = $_POST['txtId'];
                    $name   = $_POST['txtName'];
                    $email  = $_POST['txtEmail'];
                    $chucvu = $_POST['txtChucvu'];
                    $dtcq   = $_POST['txtDtcq'];
                    $didong = $_POST['txtDidong'];
                    $iddonvi= $_POST['txtIddonvi'];
                    //Kiểm tra: Dữ liệu người dùng nhập có đang BỎ TRỐNG trường nào KO?
                    //Kiểm tra: Trước khi thêm Tài khoản, phải kiểm tra có tồn tại chưa?
                    //Nếu chưa tồn tại thì mới thêm;
                    $sql = "INSERT INTO tbcanbo (id, canboName, canboChucvu, canboDtcq, canboEmail, canboDidong, idDonvi)
                            VALUES ('$id','$name','$chucvu',' $dtcq','$email','$didong','$iddonvi')";
                    if(mysqli_query($conn,$sql)){
                        $_SESSION['add'] = "<div class='success'>Cadres Added Successfully.</div>";
                        header('location:'.SITEURL.'/admin/cadres/cadresManagement.php');
                    }
                    else{
                        $_SESSION['add'] = "<div class='success'>Cadres Added Failed.</div>";
                        header('location:'.SITEURL.'/admin/cadres/cadresManagement.php');
                    }
                }
            ?>
        </main>
    </div>
<?php include("../footer.php"); 
ob_end_flush(); ?>