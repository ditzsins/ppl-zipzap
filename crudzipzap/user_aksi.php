<?php
include 'koneksi.php';
//Start Aksi user
$g=$_GET['sender'];
if($g=='user')
{
    $sql="INSERT INTO user (nama_lengkap, username, password, email, jenis_kelamin, alamat)
        VALUES
        ('$_POST[nama_lengkap]',
         '$_POST[username]',
         '$_POST[password]',
         '$_POST[email]',
         '$_POST[jenis_kelamin]',
         '$_POST[alamat]')";    
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("User baru dengan Nama Lengkap :('.$_POST[nama_lengkap].') Tersimpan")
            window.location.href="index.php?page=user";
            </script>'; 
    }
    else{
        echo "Error : ".$sql.". ".mysqli_error($config);
    }
     //header('location:http://localhost/');
}

else 
    if($g=='edit')
    {
        mysqli_query($config,"
            UPDATE user 
            SET nama_lengkap    ='$_POST[nama_lengkap]',
                username        ='$_POST[username]',
                password        ='$_POST[password]',
                email           ='$_POST[email]',
                jenis_kelamin   ='$_POST[jenis_kelamin]',
                alamat          ='$_POST[alamat]' 
                WHERE email='$_POST[email]'");
         echo '<script LANGUAGE="JavaScript">
            alert("User dengan nama_lengkap :('.$_POST[nama_lengkap].') Di Update")
            window.location.href="index.php?page=user";
            </script>';
    } 
else 
    if($g=='hapus')
    {
         mysqli_query($config,"DELETE FROM user where email='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("User dengan Email :('.$_GET[email].') Di Terhapus")
            window.location.href="index.php?page=user";
            </script>';
    }
//End Aksi Anggota
?>
