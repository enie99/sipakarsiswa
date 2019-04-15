<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1 or $_SESSION['akses']==2 or $_SESSION['akses']==5){ ?>              
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Pelanggaran<small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-1 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <font color="red"><h4><a href="#">Help</a></h4></font>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <?php
              if($_SESSION['akses']==1 or $_SESSION['akses']==2){
            ?>
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <br>
                  <h4 align="center">Klik Untuk Lihat Daftar Kategori Pelanggaran</h4>

                  <!-- Modal Kategori Pelanggaran -->
                  <h3><div align="center">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#kat">Kategori Pelanggaran</button>
                  </div></h3>
                  <div class="modal fade bs-example-modal-lg" id="kat" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Kategori Pelanggaran</h4>
                        </div>
                        <div class="modal-body">
                          <!-- Table -->
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="x_panel">
                                <div class="x_title">
                                  <h2>Data Kategori Pelanggaran</h2>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="x_content">


                                  <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                      <thead>
                                        <tr class="headings">
                                          
                                          <th class="column-title">No </th>
                                          <th class="column-title">Kategori Pelanggaran </th>
                                          <th class="column-title no-link last"><span class="nobr">Aksi</span>
                                          </th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                        <?php 
                                          $katPelanggaran = mysqli_query($connect,"SELECT * FROM kat_pelanggaran");
                                          $no=1;
                                          while($kp=mysqli_fetch_array($katPelanggaran)){
                                          if ($no%2==1) {
                                        ?>
                                        <tr class="even pointer">
                                          <td class=" "><?php echo $no;?></td>
                                          <td class=" "><?php echo $kp['nama_kategori'];?></td>
                                          <td class=" last">
                                            <div class="btn-group">
                                              <a href="main.php?module=edit_kat_pelanggaran&id_kat_pelanggaran=<?php echo $kp['id_kat_pelanggaran']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i> Edit </button></a>
                                              <!--
                                              <a href="module/kat_pelanggaran/aksi_hapus.php?id_kat_pelanggaran=<?php //echo $kp['id_kat_pelanggaran'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button></a>
                                            -->
                                            </div>
                                          </td>
                                        </tr>
                                          <?php
                                          }
                                          else{
                                          ?>

                                        <tr class="odd pointer"> 
                                          <td class=" "><?php echo $no;?></td>
                                          <td class=" "><?php echo $kp['nama_kategori'];?></td>
                                          <td class=" last">
                                            <div class="btn-group">
                                              <a href="main.php?module=edit_kat_pelanggaran&id_kat_pelanggaran=<?php echo $kp['id_kat_pelanggaran']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i> Edit </button></a>
                                              <!--
                                              <a href="module/kat_pelanggaran/aksi_hapus.php?id_kat_pelanggaran=<?php //echo $kp['id_kat_pelanggaran'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button></a>
                                            -->
                                            </div>
                                          </td>
                                        </tr>
                                        <?php 
                                          }
                                          $no++;
                                        }
                                        ?>
                                        
                                      </tbody>
                                    </table>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Penutup Tabel -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <a href="main.php?module=tambah_kat_pelanggaran"><button type="button" class="btn btn-primary">Tambah Kategori pelanggaran</button></a>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- Penutup Modal Kategori Pelanggaran -->
                </div>
              </div>

              <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                <br>
                <h4 align="center">Klik Untuk Lihat Daftar Sub Kategori Pelanggaran</h4>
                  <!-- Modal Sub Kategori Pelanggaran -->
                <div align="center">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#subkat"> Sub Kategori Pelanggaran</button></div>

                  <div class="modal fade bs-example-modal-lg" id="subkat" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Kategori Pelanggaran</h4>
                        </div>
                        <div class="modal-body">
                          <!-- Table -->
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Sub Kategori Pelanggaran</h2>
                                <div class="clearfix"></div>
                              </div>

                              <div class="x_content">


                                <div class="table-responsive">
                                  <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                      <tr class="headings">
                                        
                                        <th class="column-title">No </th>
                                        <th class="column-title">Sub Kategori</th>
                                        <th class="column-title no-link last"><span class="nobr">Aksi</span>
                                        </th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                      <?php 
                                        $subKategori = mysqli_query($connect,"SELECT * FROM sub_kat_pelanggaran");
                                        $no=1;
                                        while($subKat=mysqli_fetch_array($subKategori)){
                                        if ($no%2==1) {
                                      ?>
                                      <tr class="even pointer">
                                        <!--<td class="a-center ">
                                          <input type="checkbox" class="flat" name="table_records">
                                        </td>-->

                                        <td class=" "><?php echo $no;?></td>
                                        <td class=" "><?php echo $subKat['nama_sub_kategori'];?></td>
                                        <td class=" last">
                                          <div class="btn-group">
                                            <a href="main.php?module=edit_sub_kategori&id_sub_kategori=<?php echo $subKat['id_sub_kategori']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i> Edit</button></a>
                                          </div>
                                        </td>
                                      </tr>
                                        <?php
                                        }
                                        else{
                                        ?>

                                      <tr class="odd pointer">
                                        
                                        <td class=" "><?php echo $no;?></td>
                                        <td class=" "><?php echo $subKat['nama_sub_kategori'];?></td>
                                        <td class=" last">
                                          <div class="btn-group">
                                            <a href="main.php?module=edit_sub_kategori&id_sub_kategori=<?php echo $subKat['id_sub_kategori']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i> Edit</button></a>
                                          </div>
                                        </td>
                                      </tr>
                                      <?php 
                                        }
                                        $no++;
                                      }
                                      ?>
                                      
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Penutup Tabel -->

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <a href="main.php?module=tambah_sub_kategori"><button type="button" class="btn btn-primary">Tambah Sub Kategori</button></a>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- Penutup Modal Sub Kategori Pelanggaran -->
  

              </div>
            </div>
            <?php } ?>


            

                
              


               
              <!-- Tabel Jenis Pelanggaran -->
              <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jenis Pelanggaran <small>Data Master</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kategori Pelanggaran</th>
                          <th>Pelanggaran</th>
                          <th>Jumlah Poin</th>
                          <?php
                            if($_SESSION['akses']==1 or $_SESSION['akses']==2){
                          ?>
                          <th>Aksi</th>
                          <?php } ?>
                        </tr>
                      </thead>


                      <tbody>

                        <?php 
                            $pelanggaran = mysqli_query($connect,"SELECT * FROM pelanggaran JOIN sub_kat_pelanggaran ON pelanggaran.id_sub_kategori=sub_kat_pelanggaran.id_sub_kategori JOIN kat_pelanggaran ON kat_pelanggaran.id_kat_pelanggaran=sub_kat_pelanggaran.id_kat_pelanggaran
                              ");
                            $no=1;
                            while($plg=mysqli_fetch_array($pelanggaran)){
                        ?>

                        <tr>
                          <td class=" "><?php echo $no;?></td>
                          <td class=" "><?php echo $plg['nama_kategori'];?></td>
                          <td class=" "><?php echo $plg['nama_pelanggaran'];?></td>
                          <td class=" "><?php echo $plg['poin'];?></td>
                          <?php
                            if($_SESSION['akses']==1 or $_SESSION['akses']==2){
                          ?>
                          <td class=" last">
                            <div class="btn-group">
                              <a href="main.php?module=edit_pelanggaran&id_pelanggaran=<?php echo $plg['id_pelanggaran']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i> Edit</button></a>
                            </div>
                          </td>
                        <?php } ?>
                        </tr>
                        
                        <?php 
                            
                            $no++;
                          }
                          ?>
                      </tbody>
                    </table>

                    <?php
                      if($_SESSION['akses']==1 or $_SESSION['akses']==2){
                    ?>
                    <div align="right">
                      <a href="main.php?module=tambah_pelanggaran"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Jenis Pelanggaran</button></a>
                      </div>
                    <?php } ?>

                  </div>
                </div>
              </div>
              </div>            
              <!-- Penutup Tabel Jenis Pelanggaran -->


            </div>
          </div>
        </div>
<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>
