 <?php
include 'koneksi.php';
//Start Aksi user
$g=$_GET['sender'];
if($g=='sepsatu')
{
    $sql="INSERT INTO sepatu (jenis_sepatu, foto)
        VALUES
        ('$_POST[jenis_sepatu]',
         '$_POST[foto]')";    
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Jenis Sepatu dengan nama :('.$_POST[jenis_sepatu].') Tersimpan")
            window.location.href="index.php?page=sepatu";
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
        mysqli_query($config,
            "UPDATE sepatu 
            SET jenis_sepatu    ='$_POST[jenis_sepatu]',
                foto            ='$_POST[foto]'
            WHERE id_sepatu = '$_POST[id_sepatu]'");
            
         echo '<script LANGUAGE="JavaScript">
            alert("Jenis Sepatu dengan nama :('.$_POST[id_sepatu].') Di Update")
            window.location.href="index.php?page=sepatu";
            </script>';
    } 
else 
    if($g=='hapus')
    {
         mysqli_query($config,"DELETE FROM sepatu where id_sepatu='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Jenis Sepatu dengan nama :('.$_GET[jenis_sepatu].') Di Terhapus")
            window.location.href="index.php?page=sepatu";
            </script>';
    }
//End Aksi Anggota
?>
