 <?php

    $host   ="localhost";
    $user ="root";
    $password ="";
    $db ="db_zipzap"; 
    
    $config =  mysqli_connect($host, $user, $password,$db);
    if(mysqli_connect_errno())
    {
    echo'Gagal Bang:'.mysqli_connect_error();
    }
    else {
    }
    error_reporting(0);
    
?>