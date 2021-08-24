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
                                <a class="nav-link" href="usersManagement.php">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../cadres/cadresManagement.php">Cadres</a>
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
                        <td>Fullname</td>
                        <td>
                            <input type="text" name="txtFullname" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="txtUsername" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" name="txtEmail" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="text" name="txtPass" placeholder="Mời bạn nhập!">
                        </td>
                    </tr>>
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
                    $fullname   = $_POST['txtFullname'];
                    $email  = $_POST['txtEmail'];
                    $username = $_POST['txtUsername'];
                    $pass   = $_POST['txtPass'];
                    // $pass_md5   = md5($pass);
                    //Kiểm tra: Dữ liệu người dùng nhập có đang BỎ TRỐNG trường nào KO?
                    //CSDL của chúng ta đã lưu Mật khẩu ở dạng THÔ
                    //Kiểm tra: Trước khi thêm Tài khoản, phải kiểm tra username và email này có tồn tại chưa?
                    //Nếu chưa tồn tại thì mới thêm;
                    //Bước 02: Thực hiện truy vấn
                    $sql = "INSERT INTO tbadmin (id, full_name, user_name, email, pass)
                            VALUES ('$id','$fullname','$username',' $email','$pass')";
                    if(mysqli_query($conn,$sql)){
                        $_SESSION['add'] = "<div class='success'>User Added Successfully.</div>";
                        header('location:'.SITEURL.'/admin/users/usersManagement.php');
                    }
                    else{
                        $_SESSION['add-mes'] = "<div class='success'>User Added Failed.</div>";
                        header('location:'.SITEURL.'/admin/users/usersManagement.php');
                    }
                }
            ?>
        </main>
    </div>
<?php include("../footer.php"); ?>