<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1 or $_SESSION['akses']==2){ ?>              
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Jurusan<small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

              <!-- Table -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Jurusan</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">


                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">No </th>
                            <th class="column-title">Kode Jurusan </th>
                            <th class="column-title">Jurusan </th>
                            <?php
                              if($_SESSION['akses']==1){
                            ?>
                            <th class="column-title no-link last"><span class="nobr">Aksi</span>
                            </th>
                            <?php } ?>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                            $jurusan = mysqli_query($connect,"SELECT * FROM jurusan");
                            $no=1;
                            while($jur=mysqli_fetch_array($jurusan)){
                            if ($no%2==1) {
                          ?>
                          <tr class="even pointer">
                            <!--<td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>-->

                            <td class=" "><?php echo $no;?></td>
                            <td class=" "><?php echo $jur['id_jurusan'];?></td>
                            <td class=" "><?php echo $jur['nama_jurusan'];?></td>
                            <?php
                              if($_SESSION['akses']==1){
                            ?>
                            <td class=" last">
                              <div class="btn-group">
                                <a href="main.php?module=edit_jurusan&id_jurusan=<?php echo $jur['id_jurusan']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i> Edit</button></a>
                                <!--
                                <a href="module/jurusan/aksi_hapus.php?id_jurusan=<?php //echo $jur['id_jurusan'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button></a>
                              -->
                              </div>
                            </td>
                            <?php } ?>
                          </tr>
                            <?php
                            }
                            else{
                            ?>

                          <tr class="odd pointer">
                            
                            <td class=" "><?php echo $no;?></td>
                            <td class=" "><?php echo $jur['id_jurusan'];?></td>
                            <td class=" "><?php echo $jur['nama_jurusan'];?></td>
                            <?php
                              if($_SESSION['akses']==1){
                            ?>
                            <td class=" last">
                              <div class="btn-group">
                                <a href="main.php?module=edit_jurusan&id_jurusan=<?php echo $jur['id_jurusan']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i> Edit</button></a>
                                <!--
                                <a href="module/jurusan/aksi_hapus.php?id_jurusan=<?php //echo $jur['id_jurusan'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button></a>
                              -->
                              </div>
                            </td>
                            <?php } ?>
                          </tr>
                          <?php 
                            }
                            $no++;
                          }
                          ?>
                          
                        </tbody>
                      </table>
                      <?php
                        if($_SESSION['akses']==1){
                      ?>
                      <div align="right">
                      <a href="main.php?module=tambah_jurusan"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Jurusan</button></a>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Penutup Tabel -->

            </div>
          </div>
        </div>
<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>
