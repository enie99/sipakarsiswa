<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=index.php><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1 or $_SESSION['akses']==2 ){ ?>     <!-- Cek user, hanya administrator(1) dan kesiswaan(2) yg dapat akses-->
        <div class="right_col" role="main">
          <div class="">
            <!--
            <div class="page-title">
              <div class="title_left">
                <h3>Data Alumni<small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>-->

            <div class="clearfix"></div>

            <!-- Form Keluarkan Siswa -->
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Masukkan NIS Siswa Yang Akan Dikeluarkan</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <h2></h2><br>
                    <form id="demo-form2" class="form-horizontal form-label-left" action="module/siswa_keluar/aksi_simpan.php" method="post">
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">NIS / Nama</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group">
                            <input type="text" name="siswa" id="autocomplete-siswa" class="form-control col-md-6" style="float: left;" />
                            <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 0px;"></div>
                            <span class="input-group-btn">
                              <a href="module/siswa_keluar/aksi_simpan.php" onClick="return confirm('Anda yakin ingin mengeluarkan siswa ini?')">
                                <button type="submit" class="btn btn-primary">Keluarkan</button>
                              </a>
                            </span>
                          </div> 
                        </div>
                      </div>
                    </form><br>
                  </div>
                </div>
              </div>
              <!-- Form Keluarkan Siswa -->

              <!-- Note -->
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <div class="panel panel-danger">
                      <div class="panel-heading">
                        <h3 class="panel-title">Catatan !</h3>
                      </div>
                      <div class="panel-body">
                        Siswa yang namanya telah dimasukkan kedalam daftar siswa yang keluar, sudah tidak dapat dikembalikan datanya ke dalam data siswa.<br>
                        <b>Sebelum memasukkan nama atau NIS mohon pastikan terlebih dahulu !</b>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Penutup Note -->

              <!-- Data Siswa Keluar -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Siswa Yang Keluar / Pindah</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">No </th>
                            <th class="column-title">NIS </th>
                            <th class="column-title">Nama </th>
                            <th class="column-title">Jurusan </th>
                            <th class="column-title">Tahun Pindah / Keluar </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                            $siswaKeluar = mysqli_query($connect,"SELECT * FROM siswa_do JOIN jurusan ON siswa_do.id_jurusan=jurusan.id_jurusan ORDER BY siswa_do.nis DESC");
                            $no=1;
                            while($sk=mysqli_fetch_array($siswaKeluar)){ 
                          ?>
                          <tr>
                            <td class=" "><?php echo $no;?></td>
                            <td class=" "><?php echo $sk['nis'];?></td>
                            <td class=" "><?php echo $sk['nama'];?></td>
                            <td class=" "><?php echo $sk['nama_jurusan'];?></td>
                            <td class=" "><?php echo $sk['th_keluar'];?></td>
                          </tr>
                           
                          <?php 
                            $no++;
                          }
                          ?>
                          
                        </tbody>
                      </table> 
                    </div>
                  </div>
                </div>
              </div>
              <!-- Penutup Data Siswa Keluar -->

            </div>
          </div>
        </div>
<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>
