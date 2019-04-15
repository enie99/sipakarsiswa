<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1){ ?>              
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Tambah Data Kelas<small></small></h3>
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

              <!-- Form -->
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah Kelas</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="module/kelas/aksi_simpan.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tingkat Kelas</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="tingkatKelas" class="form-control" required="required">
                            <option disabled="disabled">-- Pilih Tingkat Kelas--</option>
                            <option value="X">X (Sepuluh)</option>
                            <option value="XI">XI (Sebelas)</option>
                            <option value="XII">XII (Dua Belas)</option>
                            <option value="XII">XIII (Tiga Belas)</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jurusan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="jurusan" class="form-control" required="required">
                            <option disabled="disabled">-- Pilih Jurusan --</option>
                            <?php
                              $jurusan=mysqli_query($connect,"SELECT * FROM jurusan");
                              while ($jur=mysqli_fetch_array($jurusan)) {
                             ?>
                            <option value="<?php echo $jur['id_jurusan']; ?>"><?php echo $jur['nama_jurusan']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Kelas</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="subKelas" class="form-control" required="required">
                            <option disabled="disabled">-- Pilih --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jumlah Siswa</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jmlSiswa" name="jmlSiswa" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <!-- UNTUK JAGA-JAGA PAKAI COMBOBOX BIASA KALAU JQUERY NGGA JALAN
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Wali Kelas</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="jurusan" class="select2_single form-control" tabindex="-1" required="required">
                            <?php/*
                              $wali=mysqli_query($connect,"SELECT * FROM guru");
                              while ($wl=mysqli_fetch_array($wali)) {*/
                             ?>
                            <option value="<?php //echo $wl[nip]; ?>"><?php //echo $wl['nama_guru']; ?></option>
                            <?php //} ?>
                          </select>
                        </div>
                      </div>
                      -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Wali Kelas</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="waliKelas" id="autocomplete-custom-append" class="form-control col-md-10" style="float: left;" />
                          <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary" onclick="window.location='main.php?module=kelas'">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      

                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>
              <!-- Penutup Form -->

            </div>
          </div>
        </div>
<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>
