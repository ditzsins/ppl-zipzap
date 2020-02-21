<?php include 'theme/header.php'; ?>

     
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel --> 
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
          <h1>User</h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="user.php">User</a></li>
            <li class="active">List User</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
            
                        $id=$_GET['email'];
                        $sql="SELECT  * FROM user where email='$id' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit User 
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="user_aksi.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">
                  <div class="col-md-12 form-group">
                    <label>Nama Lengkap</label>
                    <input type="hidden" name="email" value="<?php echo $row['email'];?>" class="form-control">
                    <input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap'];?>" class="form-control" placeholder="Nama Lengkap" required="">
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $row['username'];?>" class="form-control" placeholder="Username" required="">
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo $row['password'];?>" class="form-control" placeholder="Password" required="">
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Email</label>
                    <p class="form-control"> <?php echo $row['email'];?> </p>
                  </div>

                  <div class="col-md-12 form-group">
                    <label>Jenis Kelamin</label>
                      <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki Laki
                      <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
                  </div>

                  <div class="col-md-12 form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" placeholder="Alamat" name="alamat" type="text"><?php echo $row['alamat'];?></textarea>
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
                <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li> Tambah User</a></h3>
              <div class="box-tools pull-right">
                 </div>
            </div>
            <div class="box-body">
                               <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM user";
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
                            <td><?php echo $row['username'];?></td>
                            <td><?php echo $row['password'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['jenis_kelamin'];?></td>
                            <td><?php echo $row['alamat'];?></td>
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=user&email=<?php echo $row['email'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                                <a href="user_aksi.php?sender=hapus&id=<?php echo $row['email']; ?>" class="btn btn-danger"><li class="fa fa-trash-o"></li> Hapus</a> 
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
<form action="user_aksi.php?sender=user" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title" id="myModalLabel">Tambah User</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 
    <div class="form-group">
      <label>Nama Lengkap</label>
      <input type="text" name="nama_lengkap" class="form-control" required="" placeholder="Nama Lengkap.">
    </div>

    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control" required="" placeholder="Username">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required="" placeholder="Password">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" required="" placeholder="Email">
    </div>

    <div class="form-group">
      <label>Jenis Kelamin</label>
      <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki Laki
      <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
    </div>

    <div class="form-group">
      <label>Alamat</label>
      <textarea type="text" name="alamat" class="form-control" placeholder="Alamat"></textarea> 
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