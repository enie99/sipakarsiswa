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
                <h3>Master Data Pelanggaran<small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                    <span class="input-group-btn">
                      
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
                    <h2>Form Tambah Data Pelanggaran</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form name="tambah_pelanggaran" id="tambah_pelanggaran" data-parsley-validate class="form-horizontal form-label-left" id="demo-form" action="module/pelanggaran/aksi_simpan.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Pelanggaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" name="katPelanggaran" id="katPelanggaran" class="form-control" onchange="tampilSubKat()">
                            <option disabled="disabled" selected="">-- Pilih Kategori --</option>
                            <?php
                              $kat_pelanggaran=mysqli_query($connect,"SELECT * FROM kat_pelanggaran");
                              while ($kat=mysqli_fetch_array($kat_pelanggaran)) {
                             ?>
                            <option value="<?php echo $kat['id_kat_pelanggaran']; ?>"><?php echo $kat['nama_kategori']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Kategori</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="subKatPelanggaran" id="subKatPelanggaran" class="form-control" required="required">
                            <option disabled="disabled">-- Pilih Sub Kategori --</option>
                            
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Pelanggaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jenisPelanggaran" name="jenisPelanggaran" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Poin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" data-validate-length-range="0,3" id="poin" name="poin" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary" onclick="window.location='main.php?module=pelanggaran'">Cancel</button>
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
