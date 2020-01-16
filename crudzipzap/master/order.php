<?php include 'theme/header.php'; ?>

     
      <!-- Left side column. contains the logo and sidebar -->
       <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
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
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=treatment">
                <i class="fa fa-check-square"></i> <span>Jenis Treatment</span>  
              </a>
            </li>

            <li class="active">
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=sepatu">
                <i class="fa fa-check-square-o"></i> <span>Jenis Sepatu</span>  
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
                    <input type="hidden" name="email" value="<?php echo $row['email'];?>" class="form-control">
                    <p class="form-control"> <?php echo $row['nama_lengkap'];?> </p>
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Tanggal Pesan</label>
                    <p class="form-control"> <?php echo $row['tgl_pesanan'];?> </p>
                  </div>

                  <div class="col-md-12 form-group">
                    <label for="">Jenis Sepatu : </label>
                   <p class="form-control"> <?php echo $row['jenis_sepatu'];?> </p>
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Jenis Treatment</label>
                    <p class="form-control"> <?php echo $row['jenis_treatment'];?> </p>
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Harga Satuan</label>
                    <p class="form-control"> <?php echo $row['harga'];?> </p>
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Metode Pembayaran</label>
                    <p class="form-control"> <?php echo $row['nama_metode'];?> </p>
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Status</label>
                    <input type="text" name="status" value="<?php echo $row['status'];?>" class="form-control" placeholder="Enter..." required="">
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
                        <th>Status</th>
                        <th>Aksi</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * 
                              FROM user, pesanan, metode_pembayaran, metode_pengiriman,detail_pesanan, metode_cuci, sepatu
                              WHERE user.email = pesanan.email
                              and pesanan.id_metode_pembayaran = metode_pembayaran.id_metode_pembayaran
                              and pesanan.id_pesanan = detail_pesanan.id_pesanan
                              and detail_pesanan.id_metode_cuci = metode_cuci.id_metode_cuci
                              and metode_cuci.id_sepatu = sepatu.id_sepatu
                              group by pesanan.id_pesanan
                              ";
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
                            <td><?php echo $row['status'];?></td>
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
    </div>
   
  </div>
</div>
</div>
</form>

      <!-- Content Wrapper. Contains page content -->
      
     
<?php include 'theme/footer.php'; ?>