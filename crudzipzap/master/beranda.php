<?php include 'theme/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    { <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <aside id="leftsidebar" class="sidebar">
          <div class="user-info">
            <div class="image px-0" align="center">
              <img src="" width="200" height="250" alt="User" align="center"/>
            </div>
            <div class="info-container" color="white">
              <div class="name" nama="nama_lengkap" data-toggle="dropdown" color="white" aria-haspopup="true" aria-expanded="false">Olil</div>
            </div>
          </div>  
            }   <!-- sidebar menu: : style can be found in sidebar.less -->
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
          <h1>
            Beranda
            <small>Zip Zap</small>
          </h1>        
        </section>
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
                  </tr>
                </thead>
                <tbody>
                <?php
                    $sql="SELECT  * FROM testimoni, user, pesanan, metode_pembayaran, metode_pengiriman, konfirmasi, detail_pesanan, metode_cuci, sepatu
                          where testimoni.email = user.email
                          and user.email=pesanan.email
                          and pesanan.id_metode_pembayaran = metode_pembayaran.id_metode_pembayaran
                          and metode_pembayaran.id_metode_pengiriman = metode_pengiriman.id_metode_pengiriman
                          and pesanan.id_pesanan = konfirmasi.id_pesanan
                          and pesanan.id_pesanan = detail_pesanan.id_pesanan
                          and detail_pesanan.id_metode_cuci = metode_cuci.id_metode_cuci
                          and metode_cuci.id_sepatu = sepatu.id_sepatu
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
        
      </section><!-- right col -->
    </div><!-- /.row (main row) -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
     
<?php include 'theme/footer.php'; ?>