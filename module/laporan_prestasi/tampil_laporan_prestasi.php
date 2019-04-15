<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1 or $_SESSION['akses']==2 or $_SESSION['akses']==3 or $_SESSION['akses']==4){ ?>        

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Prestasi Siswa</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <!-- Siswa Dengan Prestasi Terbanyak -->
            <div class="row top_tiles">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                      <div class="row tile_count">
                        <?php
                          $terbanyak=mysqli_query($connect, "SELECT detail_poin.nis, SUM(prestasi.poin) AS poin, siswa.nama_siswa FROM detail_poin JOIN prestasi ON detail_poin.id_prestasi=prestasi.id_prestasi JOIN siswa ON detail_poin.nis=siswa.nis GROUP BY detail_poin.nis ORDER BY SUM(prestasi.poin) DESC LIMIT 6");
                          $no=1;
                          while($byk=mysqli_fetch_array($terbanyak)){
                        ?>

                        <!-- Top 6 -->
                        <div class="col-md-2 col-sm-2 col-xs-6 tile_stats_count">
                          <span class="count_top" >Poin Terbanyak Ke-<?php echo $no; ?></span>
                          <div class="count">
                            <a class="pull-left border-green profile_thumb" style="color:#008686">
                              <i class="fa fa-check-circle-o"></i>&nbsp;
                            </a>
                            
                            <a href="#"><?php echo $byk['poin']; ?></a>
                          </div>
                          <span class="count_bottom"><h4><?php echo $byk['nama_siswa']; ?></h4></span>
                        </div>
                        <!-- Penutup Top 6 -->
                        <?php 
                          $no++;
                          } 
                        ?>

                      </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pelanggaran Siswa Dengan Prestasi Terbanyak -->

            <!-- Laporan Prestasi -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan Prestasi Siswa </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-12 col-sm-12 col-xs-12">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Terbaru</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Berdasarkan Kelas</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Berdasarkan Jurusan</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Berdasarkan Kategori</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <!-- start prestasi terbaru -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>NIS</th>
                                  <th>Nama Siswa</th>
                                  <th>Prestasi</th>
                                </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    $tahun = mysqli_query($connect, "SELECT * FROM th_ajaran");
                                    $th = mysqli_fetch_array($tahun);

                                    $detail_poin = mysqli_query($connect,"SELECT * FROM detail_poin JOIN siswa ON siswa.nis=detail_poin.nis JOIN prestasi ON detail_poin.id_prestasi=prestasi.id_prestasi ORDER BY detail_poin.tanggal DESC LIMIT 10");
                                    $no=1;
                                    while($dp=mysqli_fetch_array($detail_poin)){
                
                                  ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $dp['tanggal']; ?></td>
                                  <td><?php echo $dp['nis']; ?></td>
                                  <td><?php echo $dp['nama_siswa']; ?></td>
                                  <td><?php echo $dp['nama_prestasi']; ?></td>
                                </tr>
                                <?php 
                                $no++;
                                } ?>
                                
                              </tbody>
                            </table>
                            <!-- end prestasi terbaru -->
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start prestasi per kelas -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Kelas</th>
                                  <th>Jumlah Poin</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    $kelas=mysqli_query($connect, "SELECT * FROM kelas ORDER BY id_kelas");
                                    $no=1;
                                    while($kls=mysqli_fetch_array($kelas)){
                                    $idKelas=$kls['id_kelas'];
                                    
                                    $poin_kelas = mysqli_query($connect,"SELECT kelas.id_kelas, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, SUM(prestasi.poin) AS jml FROM detail_poin JOIN siswa ON detail_poin.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan JOIN prestasi ON detail_poin.id_prestasi=prestasi.id_prestasi WHERE kelas.id_kelas='$idKelas'");
                                
                                    $pk=mysqli_fetch_array($poin_kelas);
                                    $tingkatKelas=$pk['tingkat_kelas'];
                                    $namaJurusan=$pk['nama_jurusan'];
                                    $subKelas=$pk['sub_kelas'];
                                    $poin=$pk['jml'];
                                  ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $tingkatKelas." ".$namaJurusan." ".$subKelas; ?></td>
                                  <td><?php echo $poin; ?></td>
                                  <td>
                                    <div class="btn-group">
                                      <a href="main.php?module=detail_prestasi_siswa&id_kelas=<?php echo $idKelas; ?>" class="btn btn-info btn-sm" ><i class='fa fa-eye'></i> Lihat Detail</a>
                                    </div>
                                  </td>
                                </tr>
                                <?php 
                                $no++;
                              } ?>
                                
                              </tbody>
                            </table>
                            <!-- end prestasi per kelas -->

                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <!-- start prestasi per jurusan -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Jurusan</th>
                                  <th>Jumlah Poin</th>
                                  <th>Poin Rata-rata Jurusan</th>
                                </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    
                                    $jurusan=mysqli_query($connect, "SELECT * FROM jurusan ORDER BY id_jurusan");
                                    $no=1;
                                    while($jur=mysqli_fetch_array($jurusan)){
                                    $id_jurusan=$jur['id_jurusan'];
                                      $poin_jurusan=mysqli_query($connect, "SELECT jurusan.nama_jurusan, SUM(prestasi.poin) AS jml FROM jurusan JOIN kelas ON jurusan.id_jurusan=kelas.id_jurusan JOIN siswa ON kelas.id_kelas=siswa.id_kelas JOIN detail_poin ON siswa.nis=detail_poin.nis JOIN prestasi ON detail_poin.id_prestasi=prestasi.id_prestasi WHERE jurusan.id_jurusan='$id_jurusan'");
                                      $pj=mysqli_fetch_array($poin_jurusan);
                                      $poin=$pj['jml'];
                                      $rataRata=($poin/32)/100*100;
                                  ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $jur['nama_jurusan'] ?></td>
                                  <td><?php echo $poin; ?></td>
                                  <td class="vertical-align-mid">
                                    <div class="progress"><?php echo $rataRata." "; ?> 
                                      <div class="progress-bar progress-bar-danger" data-transitiongoal="<?php echo $rataRata; ?>"></div>
                                    </div>
                                  </td>
                                </tr>
                                <?php 
                                  $no++;
                                } ?>
                                
                              </tbody>
                            </table>
                            <!-- end prestasi per jurusan -->

                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                           <!-- start prestasi per jenis prestasi -->
                  
                                    <table class="data table table-striped no-margin">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Prestasi</th>
                                          <th>Jumlah Prestasi </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                            $tahun_ajaran=mysqli_query($connect, "SELECT * FROM th_ajaran");
                                            $ta=mysqli_fetch_array($tahun_ajaran);
                                            $thAjaran=$ta['tahun_ajaran'];

                                            $prestasi=mysqli_query($connect, "SELECT * FROM prestasi ORDER BY id_prestasi");
                                              $id=1;
                                              while($pres=mysqli_fetch_array($prestasi)){
                                                $idPrestasi=$pres['id_prestasi'];

                                                $poin_prestasi=mysqli_query($connect, "SELECT COUNT(prestasi.poin) AS jml FROM prestasi JOIN detail_poin ON prestasi.id_prestasi=detail_poin.id_prestasi WHERE prestasi.id_prestasi='$idPrestasi' AND detail_poin.tahun_ajaran='$thAjaran'");
                                                $pPres=mysqli_fetch_array($poin_prestasi);
                                                $jmlPoinPres=$pPres['jml'];
                                                
                                           ?>

                                        <tr>
                                          <th scope="row">#</th>
                                          <td><?php echo $pres['nama_prestasi']; ?></td>
                                          <td><?php echo $jmlPoinPres; ?></td>
                                        </tr>
                                        <?php
                                          }
                                         ?>
                                        
                                      </tbody>
                                    </table>

                                  </div>
                                </div>
                              </div>
                            
                            <!-- end prestasi -->



                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>