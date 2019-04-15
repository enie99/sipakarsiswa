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
                <h3> Edit Data Pelanggaran Siswa<small></small></h3>
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
                    <h2>Form Edit Data Pelanggaran</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="module/pelanggaran_siswa/aksi_edit.php" method="post">
                      <?php
                        $idDetailPoin=$_GET['id_detail_poin'];

                        $pelanggaran=mysqli_query($connect, "SELECT * FROM detail_poin JOIN siswa ON detail_poin.nis=siswa.nis JOIN pelanggaran ON detail_poin.id_pelanggaran=pelanggaran.id_pelanggaran WHERE id_detail_poin='$idDetailPoin'");
                        $plg=mysqli_fetch_array($pelanggaran);
                        $nis=$plg['nis'];
                        $namaSiswa=$plg['nama_siswa'];
                        $idPelanggaran=$plg['id_pelanggaran'];
                        $namaPelanggaran=$plg['nama_pelanggaran'];
                      ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tahun Ajaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="idDetailPoin" value="<?php echo $idDetailPoin; ?>">
                          <input type="text" id="thAjaran" name="thAjaran" value="<?php echo $plg['tahun_ajaran']; ?>" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div><br>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tanggal" name="tanggal" value="<?php echo $plg['tanggal']; ?>" required="required" class="form-control col-md-7 col-xs-12">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pelanggaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $idPelanggaran." - ".$namaPelanggaran; ?>" type="text" name="pelanggaran" id="autocomplete-pelanggaran" class="form-control col-md-10" style="float: left;" />
                          <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea placeholder="<?php echo $plg['ket']; ?>" name="ket" class="resizable_textarea form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary" onclick="window.location='main.php?module=input_pelanggaran_siswa'">Cancel</button>
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
