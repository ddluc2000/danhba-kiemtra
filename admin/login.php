<?php 
    include("config/db.php");
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
<body class="text-center lgin">
    <main class="form-signin">
        <form method="POST">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="name@example.com">
                <label for="txtEmail">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="txtPass" name="txtPass" placeholder="Password">
                <label for="txtPass">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="sbmLogin">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
        <?php
            if(isset($_POST['sbmLogin'])){
                $email = $_POST['txtEmail'];
                $pass  = $_POST['txtPass'];
                $sql1 = "SELECT * FROM tbadmin WHERE email='$email' AND pass='$pass'";
                $result1 = mysqli_query($conn,$sql1);
                if(mysqli_num_rows($result1)){   
                    $_SESSION['login'] = "<div class='success'>Login Successful.</div>"; 
                    header('location:'.SITEURL.'/admin/index.php');
                }
                else{
                    header('location:'.SITEURL.'/admin/login.php');
                    echo ("<div class='error text-center'>Email or Password did not match.</div>");
                }
            }
        ?>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</html>
