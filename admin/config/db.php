<?php
    session_start();
    // Bước 01: Kết nối Server:
    //Định nghĩa Hằng số trong PHP
    define('SITEURL','http://localhost/danhBa');
    define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('DB_NAME','webkhoa');
    define('PORT','3306');
    $conn = mysqli_connect(HOST,USER,PASS,DB_NAME);
    if(!$conn){
        die("Không thể kết nối: ".mysqli_connect_error());
    }
?>