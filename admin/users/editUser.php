<?php
    ob_start();
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
                <div class="row header-bottom">
                    <div class="row height d-flex">
                        <form method="POST" class="search"> 
                            <i class="fa fa-search"></i> 
                            <input id="txtSearch" name="txtSearch" type="text" class="form-control" placeholder="Bạn muốn tìm gì?"> 
                            <button name="sbmSearch" type="submit" class="btn btn-primary">Search</button> 
                        </form>
                        <?php
                            if(isset($_POST['sbmSearch'])){
                                header('location:'.SITEURL.'/views/search.php');         
                            }
                        ?>
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
                $sql = "SELECT * FROM tbadmin WHERE id= $getid ";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0)
                {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $fullname = $row['full_name'];
                    $username = $row['user_name'];
                    $email = $row['email'];
                    $pass = $row['pass'];
                }
                else
                {
                    header('location:'.SITEURL.'/admin/users/usersManagement.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'/admin/users/usersManagement.php');
            }
            ?>
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>Id</td>
                        <td>
                            <input type="text" name="txtId" value="<?php echo $id ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Fullname</td>
                        <td>
                            <input type="text" name="txtFullname" value="<?php echo $fullname ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="txtUsername" value="<?php echo $username ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" name="txtEmail" value="<?php echo $email ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="text" name="txtPass" value="<?php echo $pass ?>">
                        </td>
                    </tr>>
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
                    $id     = $_POST['txtId'];
                    $fullname   = $_POST['txtFullname'];
                    $email  = $_POST['txtEmail'];
                    $username = $_POST['txtUsername'];
                    $pass   = $_POST['txtPass'];
                    $sql1 = "UPDATE tbadmin SET
                        id = '$id', 
                        full_name = '$fullname', 
                        user_name = '$username',
                        email = '$email',
                        pass = '$pass' WHERE id = $getid ";
                    if(mysqli_query($conn,$sql1)){
                        $_SESSION['edit'] = "<div class='success'>User Edited Successfully.</div>";
                        header('location:'.SITEURL.'/admin/users/usersManagement.php');
                    }
                    else{
                        $_SESSION['edit'] = "<div class='success'>User Edited Failed.</div>";
                        header('location:'.SITEURL.'/admin/users/usersManagement.php');
                    }
                }
            ?>
<?php include('../footer.php'); 
ob_end_flush() ?>