<?php include 'theme/header.php'; ?>

     
      <!-- Left side column. contains the logo and sidebar -->
       <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <aside id="leftsidebar" class="sidebar">
          <div class="user-info">
                <div class="image px-0" align="center">
                    <img src="image/foto.png" width="200" height="250" alt="User" align="center"/>
                </div>
                <div class="info-container" color="white">
                    <div class="name" nama="nama_lengkap" data-toggle="dropdown" color="white" aria-haspopup="true" aria-expanded="false">Olil</div>
                </div>
            </div>
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
           <ul class="sidebar-menu">
            <li class="header" align="center">ADMIN</li>
            <li class="active">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>index.php">  
                 <i class="fa fa-home"></i> <span>Beranda</span>
              </a>
            </li>
            
            <li class="active">
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=order">
                <i class="fa fa-cart-arrow-down"></i> <span>Order</span>  
              </a>
            </li>

            <li class="active">
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=checkout">
                <i class="fa fa-calendar-check-o"></i> <span>Check Out</span>  
              </a>
            </li>  
            
            <li class="active">
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=user">
                <i class="fa fa-user"></i> <span>User</span>  
              </a>
            </li>            
          </ul>
        </section>
     
        <!-- /.sidebar -->
      </aside>
      
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Order</h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="#">Order</a></li>
            <li class="active">List Order</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
            
                        $id=$_GET['id_pesanan'];
                        $sql="SELECT  * FROM pesanan where id_pesanan='$id' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit Order 
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="order_aksi.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">
                  <div class="col-md-12 form-group">
                    <label>Nama Pemesan</label>
                    <input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap'];?>" class="form-control" placeholder="Enter..." required="">
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Tanggal Pesan</label>
                    <input type="text" name="tgl_pesanan" value="<?php echo $row['tgl_pesanan'];?>" class="form-control" placeholder="Enter..." required="">
                  </div>

                  <div class="col-md-12 form-group">
                    <label for="">Jenis Sepatu : </label>
                    <select>
                    <?php while($data = mysqli_fetch_assoc($result) ){?>
                    <option value="<?php echo $data['jenis_sepatu']; ?>"><?php echo $data['jenis_sepatu']; ?></option>
                    <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Jenis Treatment</label>
                    <input type="text" name="jenis_treatment" value="<?php echo $row['jenis_treatment'];?>" class="form-control" placeholder="Enter..." required="">
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Harga Satuan</label>
                    <input type="text" name="harga" value="<?php echo $row['harga'];?>" class="form-control" placeholder="Enter..." required="">
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Metode Pembayaran</label>
                    <input type="text" name="nama_metode" value="<?php echo $row['nama_metode'];?>" class="form-control" placeholder="Enter..." required="">
                  </div>
                                    
                  <div class="col-md-12 form-group"> 
                   <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-send"></span> Simpan</button>
                 </div>
                </div> 
                  </div></form>
              </div>
                   <?php                
                        }
                    }  else {
                    echo '';    
                    }
                    }?> 
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li> Tambah Order</a></h3>
              <div class="box-tools pull-right">
                 </div>
            </div>
            <div class="box-body">
                  <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Tanggal Pesan</th>
                        <th>Jenis Sepatu</th>
                        <th>Jenis Treatment</th>
                        <th>Harga Satuan</th>
                        <th>Metode Pembayaran</th>
                        <th>Aksi</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM pesanan,user,metode_cuci,metode_pembayaran
                              where user.email=pesanan.email
                              and pesanan.id_metode_cuci = metode_cuci.id_metode_cuci
                              and pesanan.id_metode_pembayaran = metode_pembayaran.id_metode_pembayaran";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                         <tr>
                            <td><?php echo $no ;?></td>
                            <td><?php echo $row['nama_lengkap'];?></td>
                            <td><?php echo $row['tgl_pesanan'];?></td>
                            <td><?php echo $row['jenis_sepatu'];?></td>
                            <td><?php echo $row['jenis_treatment'];?></td>
                            <td><?php echo $row['harga'];?></td>
                            <td><?php echo $row['nama_metode'];?></td>
                            <td>
                              <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=order&id_pesanan=<?php echo $row['id_pesanan'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                              <a href="order_aksi.php?sender=hapus&id=<?php echo $row['id_pesanan']; ?>" class="btn btn-danger"><li class="fa fa-trash-o"></li> Hapus</a> 
                            </td>
                        </tr> 
                            <?php    
                    $no++;                    
                        }
                    }  else {
                    echo '';    
                    }
                    }?>
                    </tbody>
                   
                     
                  </table>
            </div><!-- /.box-body -->
             
          </div><!-- /.box --> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
      
      <!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<form action="order_aksi.php?sender=order" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title" id="myModalLabel">Tambah Order</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 
    <div class="form-group">
      <label>Nama Pemesan</label>
      <input type="text" name="nama_lengkap" class="form-control" required="" placeholder="Enter ...">
    </div>

    <div class="form-group">
      <label>Tanggal Pesan</label>
      <input type="date" name="tgl_pesanan" class="form-control" required="" placeholder="Enter ...">
    </div>

    <div class="form-group">
      <label>Jenis Sepatu</label>
      <input type="text" name="jenis_sepatu" class="form-control" required="" placeholder="Enter ...">
    </div>
    
    <div class="form-group">
      <label>Jenis Treatment</label>
      <input type="text" name="jenis_treatment" class="form-control" required="" placeholder="Enter ...">
    </div>

    <div class="form-group">
      <label>Harga Satuan</label>
      <input type="text" name="harga" class="form-control" required="" placeholder="Enter ...">
    </div>

    <div class="form-group">
      <label>Metode Pembayaran</label>
      <input type="text" name="nama_metode" class="form-control" required="" placeholder="Enter ...">
    </div>
 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
<button type="submit" class="btn btn-info"> Simpan</button> 
  
</div>
   
</div>
</div>
</div>
</form>

      <!-- Content Wrapper. Contains page content -->
      
     
<?php include 'theme/footer.php'; ?>