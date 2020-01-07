<?php include 'theme/header.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
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
          <h1>Jenis Treatment</h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="jenis_treatment.php">Jenis Treatment</a></li>
            <li class="active">List Jenis Treatment</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
            
                        $id=$_GET['id_metode_cuci'];
                        $sql="SELECT  * FROM metode_cuci where id_metode_cuci='$id' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit Jenis Treatment 
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="treatment_aksi.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">
                  <div class="col-md-12 form-group">
                    <label>Jenis Treatment</label>
                    <input type="hidden" name="id_metode_cuci" value="<?php echo $row['id_metode_cuci'];?>" class="form-control">
                    <input type="text" name="jenis_treatment" value="<?php echo $row['jenis_treatment'];?>" class="form-control" placeholder="Jenis Treatment" required="">
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Jenis Sepatu</label>
                    <select name="id_sepatu" class="form-control" required="">
                    <?php 
                      $sql = mysqli_query($config, "SELECT * FROM sepatu");
                      while ($row = $sql->fetch_assoc()){
                    ?>
                      <option value="<?php echo $row['id_sepatu'];?>"><?php echo $row['jenis_sepatu']; ?></option>
                    <?php }?>
                      
                    </select>
                    
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Harga Satuan</label>
                    <input type="text" name="harga" value="<?php echo $row['harga'];?>" class="form-control" placeholder="Harga Satuan" required="">
                  </div>

                  <div class="col-md-12 form-group">
                      <label>Deskripsi</label>
                      <textarea value="<?php echo $row['deskripsi'];?>" class="form-control" placeholder="Deskripsi" name="deskripsi" type="text"><?php echo $row['deskripsi'];?></textarea>
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Foto</label>
                    <input type="file" name="foto_treatment" value="<?php echo $row['foto_treatment'];?>" class="form-control" placeholder="Foto" required="">
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
                <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li> Tambah Jenis Treatment</a></h3>
              <div class="box-tools pull-right">
                 </div>
            </div>
            <div class="box-body">
                  <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        <th>No</th>
                        <th>Jenis Treatment</th>
                        <th>Jenis Sepatu</th>
                        <th>Harga Satuan</th>
                        <th>Deskripsi</th> 
                        <th>Foto</th>         
                        <th>Aksi</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM metode_cuci, sepatu WHERE metode_cuci.id_sepatu=sepatu.id_sepatu";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo $no ;?></td>
                            <td><?php echo $row['jenis_treatment'];?></td>
                            <td><?php echo $row['jenis_sepatu'];?></td>
                            <td><?php echo $row['harga'];?></td>
                            <td><?php echo $row['deskripsi'];?></td>
                            <td><?php 
                            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['foto_treatment'] ).'" alt="Avatar" style="width:90%" align="center"/>';
                        ?></td>
                
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=treatment&id_metode_cuci=<?php echo $row['id_metode_cuci'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                                <a href="treatment_aksi.php?sender=hapus&id=<?php echo $row['id_metode_cuci']; ?>" class="btn btn-danger"><li class="fa fa-trash-o"></li> Hapus</a> 
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
<form action="treatment_aksi.php?sender=treatment" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title" id="myModalLabel">Tambah Jenis Treatment</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 
    <div class="form-group">
      <label>Jenis Treatment</label>
      <input type="text" name="jenis_treatment" class="form-control" required="" placeholder="Jenis Treatment">
    </div>

    <div class="form-group">
      <label>Jenis Treatment</label>
      <select name="id_sepatu" class="form-control" required="">
      <?php 
        $sql = mysqli_query($config, "SELECT * FROM sepatu");
        while ($row = $sql->fetch_assoc()){
        ?>
        <option value="<?php echo $row['id_sepatu']; ?>"><?php echo $row['jenis_sepatu']; ?></option>
        <?php }?>
          
        </select>
    </div>

    <div class="form-group">
      <label>Harga Satuan</label>
      <input type="text" name="harga" class="form-control" required="" placeholder="Harga Satuan">
    </div>

    <div class="form-group">
      <label>Deskripsi</label>
      <textarea type="text" name="deskripsi" class="form-control" placeholder="deskripsi"></textarea> 
    </div>
    <div class="form-group">
      <label>Foto</label>
      <input type="file" name="foto_treatment" class="form-control" required="" placeholder="Foto">
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