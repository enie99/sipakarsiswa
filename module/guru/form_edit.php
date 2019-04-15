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
                <h3> Edit Data Guru<small></small></h3>
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
                    <h2>Form Edit Guru</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="module/guru/aksi_edit.php" method="post">

                      <?php
                      $nip=$_GET['nip'];
                      $guru=mysqli_query($connect,"SELECT * FROM guru WHERE nip='$nip'");
                      $gr=mysqli_fetch_array($guru);
                      ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> NIP</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $gr['nip']; ?>" disabled="disabled">
                          <input type="hidden" name="nip" id="nip" value="<?php echo $gr['nip']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Nama Guru</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="namaGuru" name="namaGuru" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $gr['nama_guru']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Kontak</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="noHp" name="noHp" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $gr['no_hp']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jabatan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jabatan" name="jabatan" class="form-control col-md-7 col-xs-12" value="<?php echo $gr['jabatan']; ?>">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary" onclick="window.location='main.php?module=guru'">Cancel</button>
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