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
                <h3> Edit Data Prestasi Siswa<small></small></h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>

            <div class="clearfix"></div>

              <!-- Form -->
            <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Edit Data Prestasi</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="module/prestasi_siswa/aksi_edit.php" method="post">
                      <?php
                        $idDetailPoin=$_GET['id_detail_poin'];

                        $prestasi=mysqli_query($connect, "SELECT * FROM detail_poin JOIN siswa ON detail_poin.nis=siswa.nis JOIN prestasi ON detail_poin.id_prestasi=prestasi.id_prestasi WHERE id_detail_poin='$idDetailPoin'");
                        $pres=mysqli_fetch_array($prestasi);
                        $nis=$pres['nis'];
                        $namaSiswa=$pres['nama_siswa'];
                        $idPrestasi=$pres['id_prestasi'];
                        $namaPrestasi=$pres['nama_prestasi'];
                      ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tahun Ajaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="idDetailPoin" value="<?php echo $idDetailPoin; ?>">
                          <input type="text" id="thAjaran" name="thAjaran" value="<?php echo $pres['tahun_ajaran']; ?>" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div><br>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tanggal" name="tanggal" value="<?php echo $pres['tanggal']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div><br>
                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NIS / Nama</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $nis." - ".$namaSiswa; ?>" type="text" name="siswa" id="autocomplete-siswa" class="form-control col-md-10" style="float: left;" />
                          <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Prestasi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $idPrestasi." - ".$namaPrestasi; ?>" type="text" name="prestasi" id="autocomplete-prestasi" class="form-control col-md-10" style="float: left;" />
                          <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea placeholder="<?php echo $pres['ket']; ?>" name="ket" class="resizable_textarea form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary" onclick="window.location='main.php?module=input_prestasi_siswa'">Cancel</button>
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
