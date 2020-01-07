<?php
error_reporting(0);
include 'koneksi.php';
$get=$_GET['page'];

if (empty($get)=='beranda')
{
   include ('master/beranda.php');	
}

elseif ($get=='order')
{
  include ('master/order.php');
}

elseif ($get=='treatment')
{
	include('master/jenis_treatment.php');
}

elseif ($get=='sepatu')
{
	include('master/jenis_sepatu.php');
}

elseif ($get=='user')
{
  include ('master/user.php');
}

elseif ($get=='anggota')
{
  include ('master/anggota.php');
}
?>