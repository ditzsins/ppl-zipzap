
<?php
error_reporting(0);
include 'koneksi.php';
$get=$_GET['page'];

if ($get=='login')
{
  include ('login.php');
}
elseif (empty($get)=='beranda')
{
   include ('master/beranda.php');	
}

elseif ($get=='order')
{
  include ('master/order.php');
}

elseif ($get=='checkout')
{
	include('master/checkout.php');
}

elseif ($get=='user')
{
  include ('master/user.php');
}

?>



<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
   $username = $_SESSION['username']; 
}
?>
<title>Halaman Sukses Login</title>
<div align='center'>
   Selamat Datang, <b><?php echo $username;?></b> <a href="logout.php"><b>Logout</b></a>
</div>
