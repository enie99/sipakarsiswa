<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=index.php><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1 or $_SESSION['akses']==2 or $_SESSION['akses']==3 or $_SESSION['akses']==4){ ?>   
              <?php
               $nis=$_GET['nis'];
               
              ?>           
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

              <div class="title_left">
                <div class="form-group">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                      <button type="reset" class="btn btn-primary" onclick="window.location='main.php?module=alumni'"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</button>
                    
                  </div>
                </div>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>

            </div>

            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Profil Alumni </h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                              <?php       
                                $alumni=mysqli_query($connect, "SELECT * FROM alumni JOIN jurusan ON alumni.id_jurusan=jurusan.id_jurusan WHERE alumni.nis='$nis'");
                                $al=mysqli_fetch_array($alumni);
                              ?>
                      <h3><?php echo $al['nama_alumni']; ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-key user-profile-icon"></i> <?php echo $nis; ?></li>
                      </ul>
                      <br />
                                <?php
                                   $query_pelanggaran=mysqli_query($connect, "SELECT detail_poin.id_detail_poin, detail_poin.tanggal, pelanggaran.nama_pelanggaran, detail_poin.ket, SUM(pelanggaran.poin) AS jml_pelanggaran FROM detail_poin JOIN alumni ON detail_poin.nis=alumni.nis JOIN pelanggaran ON detail_poin.id_pelanggaran=pelanggaran.id_pelanggaran WHERE detail_poin.nis='$nis' ");
                                   $hitung_plg=mysqli_fetch_array($query_pelanggaran);
                                   $poin_plg=$hitung_plg['jml_pelanggaran'];
                                   $persen_plg=$poin_plg/125*100;

                                   $query_prestasi=mysqli_query($connect, "SELECT detail_poin.id_detail_poin, detail_poin.tanggal, prestasi.nama_prestasi, detail_poin.ket, SUM(prestasi.poin) AS jml_prestasi FROM detail_poin JOIN alumni ON detail_poin.nis=alumni.nis JOIN prestasi ON detail_poin.id_prestasi=prestasi.id_prestasi WHERE detail_poin.nis='$nis' ");
                                   $hitung_pres=mysqli_fetch_array($query_prestasi);
                                   $poin_pres=$hitung_pres['jml_prestasi'];
                                   $persen_pres=$poin_pres/125*100;
                                 ?>

                      <!-- start skills -->
                      <h4>Total Poin</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Prestasi<?php echo " [ ".$poin_pres." ] "; ?></p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $persen_pres; ?>"></div>
                          </div>
                        </li>
                        <li>
                          <p>Pelanggaran<?php echo " [ ".$poin_plg." ] "; ?></p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-red" role="progressbar" data-transitiongoal="<?php echo $persen_plg; ?>"></div>
                          </div>
                        </li>
                      </ul>
                      <?php if ($poin_plg>=36) {  
                      ?>
                      <button type="button" class="btn btn-danger"><i class='fa fa-exclamation-circle'></i> Cetak SP</button>
                      <?php } ?>

                      <!-- end of skills -->
                    </div> <!-- Tutup col md-3 -->

                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <h3>Detail Data Alumni</h3>
                      <table class="table">
                                    <?php
                                      $nis=$_GET['nis'];
                                      $alumni=mysqli_query($connect,"SELECT * FROM alumni JOIN jurusan ON alumni.id_jurusan=jurusan.id_jurusan JOIN orang_tua ON alumni.id_ortu=orang_tua.id_ortu WHERE nis='$nis'");
                                      $al=mysqli_fetch_array($alumni);

                                      $nis=$al['nis'];
                                      $namaAlumni=$al['nama_alumni'];
                                      $thLulus=$al['th_lulus'];
                                      $alamat=$al['alamat'];
                                      $idJurusan=$al['id_jurusan'];
                                      $idOrtu=$al['id_ortu'];
                                      $namaOrtu=$al['nama_ortu'];
                                    ?>
                        <tbody>
                          <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td><?php echo $nis; ?></td>
                          </tr>
                          <tr>
                            <td>Nama Alumni</td>
                            <td>:</td>
                            <td><?php echo $namaAlumni; ?></td>
                          </tr>
                          <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td><?php echo $al['nama_jurusan'].' '.$al['sub_kelas']; ?></td>
                          </tr>
                          <tr>
                            <td>Tahun Lulus</td>
                            <td>:</td>
                            <td><?php echo $thLulus; ?></td>
                          </tr>
                          <tr>
                            <td>Nama Orang Tua</td>
                            <td>:</td>
                            <td><?php echo $namaOrtu; ?></td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php echo $alamat; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div> <!-- Tutup col md-9 -->
                  </div> <!-- Tutup x-content -->
                </div> <!-- Tutup x-panel -->

              </div> <!-- tutup col md-12 --> 
            </div> <!-- tutup class row -->

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Detail Prestasi dan Pelanggaran</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pelanggaran</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Prestasi</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                  <!-- start tabel pelanggaran -->
                                          <?php
                                            $pelanggaran=mysqli_query($connect, "SELECT * FROM detail_poin JOIN alumni ON detail_poin.nis=alumni.nis JOIN pelanggaran ON detail_poin.id_pelanggaran=pelanggaran.id_pelanggaran WHERE detail_poin.nis='$nis' ORDER BY tanggal DESC");
                                            $banyak = mysqli_num_rows($pelanggaran);
                                            if($banyak==0){
                                              echo "<h4 align=center>Tidak ada pelanggaran yang dilakukan.</h4>";
                                            }
                                            else{
                                          ?>
                            <table id="datatable-fixed-header" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Pelanggaran</th>
                                  <th>Keterangan</th>
                                </tr>
                              </thead>

                              <tbody>
                                      <?php
                                      $no=1;
                                      while($plg=mysqli_fetch_array($pelanggaran)){
                                      $idPoinPelanggaran=$plg['id_detail_poin'];
                                       ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $plg['tanggal']; ?></td>
                                  <td><?php echo $plg['nama_pelanggaran']; ?></td>
                                  <td><?php echo $plg['ket']; ?></td>
                                </tr>

                                        <?php
                                          $no++;
                                          }
                                        ?>
                                      
                              </tbody>
                            </table>
                                  <?php } ?>        
                            <!-- end tabel pelanggaran -->
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <!-- start tabel prestasi -->
                                  <?php
                                    $prestasi=mysqli_query($connect, "SELECT * FROM detail_poin JOIN alumni ON detail_poin.nis=alumni.nis JOIN prestasi ON detail_poin.id_prestasi=prestasi.id_prestasi WHERE detail_poin.nis='$nis' ORDER BY tanggal DESC");
                                    $ketemu = mysqli_num_rows($prestasi);
                                    if($ketemu==0){
                                      echo "<h4 align=center>Belum ada prestasi yang dicapai</h4>";
                                    }
                                    else{
                                  ?>
                            <table id="datatable-fixed-header" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Prestasi</th>
                                  <th>Keterangan</th>
                                </tr>
                              </thead>

                              <tbody>
                                      <?php
                                      $no=1;
                                      while($pres=mysqli_fetch_array($prestasi)){
                                      $idDetailPoin=$pres['id_detail_poin'];
                                       ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $pres['tanggal']; ?></td>
                                  <td><?php echo $pres['nama_prestasi']; ?></td>
                                  <td><?php echo $pres['ket']; ?></td>
                                </tr>

                                      <?php
                                        $no++;
                                        }
                                      ?>
                                      
                              </tbody>
                            </table>
                                  <?php } ?>    
                            <!-- end tabel prestasi -->
                          </div> <!-- tutup tab content 2 -->

                        </div> <!-- tutup tab -->

                      </div> <!-- tutup tab panel-->
                    </div> <!-- tutup col md-12 -->
                  </div><!-- tutup x-content -->

                </div>
              </div>
            </div> <!-- tutup row -->


          </div>
        </div>
<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>
