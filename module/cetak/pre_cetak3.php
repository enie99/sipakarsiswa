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
              
            </div>

            <div class="clearfix"></div>
            <?php
              $nis=$_GET['nis'];
              $idTempSp3=$_GET['id_temp_sp_3'];
              $editLihat=mysqli_query($connect, "UPDATE temp_sp_3 SET lihat='Y' WHERE id_temp_sp_3='$idTempSp3'");

              $siswa=mysqli_query($connect, "SELECT siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, orang_tua.nama_ortu FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan JOIN orang_tua ON siswa.id_ortu=orang_tua.id_ortu WHERE nis='$nis'");
              $sw=mysqli_fetch_array($siswa);
              $nama=$sw['nama_siswa'];
              $tingkatKelas=$sw['tingkat_kelas'];
              $jurusan=$sw['nama_jurusan'];
              $subKelas=$sw['sub_kelas'];
              $ortu=$sw['nama_ortu'];
            ?>

              <!-- Isi Data Sebelum Cetak -->
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lengkapi Data Untuk Cetak Surat</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form class="form-horizontal form-label-left input_mask" method="post" action="<?php echo $base_url; ?>main.php?module=cetak_sp">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Surat</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="no_surat" class="form-control" placeholder="Default Input">
                        </div>
                      </div><br>
                      <p>
                      <label>Waktu yang ditentukan untuk orang tua:</label>
                      <input type="hidden" name="nama" value="<?php echo $nama; ?>">
                      <input type="hidden" name="tingkatKelas" value="<?php echo $tingkatKelas; ?>">
                      <input type="hidden" name="jurusan" value="<?php echo $jurusan; ?>">
                      <input type="hidden" name="subKelas" value="<?php echo $subKelas; ?>">
                      <input type="hidden" name="ortu" value="<?php echo $ortu; ?>">
                      </p>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hari/Tanggal</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="hariTanggal" class="form-control" placeholder="Default Input">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Waktu (WIB)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="waktu" class="form-control" placeholder="Default Input">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-10">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                    
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
