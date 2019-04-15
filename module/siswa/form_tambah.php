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
                <h3> Tambah Data Siswa<small></small></h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>

            <div class="clearfix"></div>

              <!-- Form -->
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah Siswa</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form-validasi" action="module/siswa/aksi_simpan.php" method="post" class="form-horizontal form-label-left" novalidate>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> NIS</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="nis" name="nis" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,5">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Siswa</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="namaSiswa" id="namaSiswa" class="form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tahun Angkatan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" maxlength="4" data-validate-length-range="4,4" id="thAngkatan" name="thAngkatan" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="alamat" class="resizable_textarea form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelas</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="kelas" class="form-control" required="required">
                            <option disabled="disabled">-- Pilih Kelas --</option>
                            <?php
                              $kelas=mysqli_query($connect,"SELECT * FROM kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan ORDER BY kelas.tingkat_kelas");
                              while ($kls=mysqli_fetch_array($kelas)) {
                             ?>
                            <option value="<?php echo $kls['id_kelas']; ?>"><?php echo $kls['tingkat_kelas'].' '.$kls['nama_jurusan'].' '.$kls['sub_kelas']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <!-- UNTUK JAGA-JAGA PAKAI COMBOBOX BIASA KALAU JQUERY NGGA JALAN
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Orang Tua</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="jurusan" class="select2_single form-control" tabindex="-1" required="required">
                            <?php/*
                              $orang_tua=mysqli_query($connect,"SELECT * FROM orang_tua");
                              while ($ortu=mysqli_fetch_array($orang_tua)) {*/
                             ?>
                            <option value="<?php //echo $ortu[id_ortu]; ?>"><?php //echo $ortu['nama_ortu']; ?></option>
                            <?php //} ?>
                          </select>
                        </div>
                      </div>
                      -->

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Orang Tua</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="ortu" id="autocomplete-ortu" class="form-control col-md-10" style="float: left;" required="required" />
                          <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary" onclick="window.location='main.php?module=siswa'">Cancel</button>
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
