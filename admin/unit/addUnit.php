<?php
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
                        <td>Tên đơn vị</td>
                        <td>
                            <input type="text" name="txtName" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td>Mã đơn vị</td>
                        <td>
                            <input type="text" name="txtMa" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td>Thông tin</td>
                        <td>
                            <input type="text" name="txtDes" placeholder="Mời bạn nhập!">
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
                    $madonvi  = $_POST['txtMa'];
                    $des = $_POST['txtDes'];
                    // $pass_md5   = md5($pass);
                    //Kiểm tra: Dữ liệu người dùng nhập có đang BỎ TRỐNG trường nào KO?
                    //CSDL của chúng ta đã lưu Mật khẩu ở dạng THÔ
                    //Kiểm tra: Trước khi thêm Tài khoản, phải kiểm tra username và email này có tồn tại chưa?
                    //Nếu chưa tồn tại thì mới thêm;
                    //Bước 02: Thực hiện truy vấn
                    $sql = "INSERT INTO tbdonvi (id, donviName, maDonvi, donviDescription)
                            VALUES ('$id','$name','$madonvi',' $des')";
                    if(mysqli_query($conn,$sql)){
                        $_SESSION['add'] = "<div class='success'>Cadres Added Successfully.</div>";
                        header("location:".SITEURL.'/admin/unit/unitManagement.php');
                    }
                    else{
                        header("location:".SITEURL.'/admin');
                    }
                    ?>
                    <?php
                }          
            ?>
            
        </main>
    </div>
    <?php
    include("../footer.php");
?>