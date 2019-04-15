<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href='$base_url'+'index.php><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1 or $_SESSION['akses']==2 or $_SESSION['akses']==3 or $_SESSION['akses']==4){ ?>        

        <div class="right_col" role="main">
          <div class="">

            <div class="row top_tiles">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">


                    <?php
                      $hitungTotal=mysqli_query($connect, "SELECT detail_poin.nis, SUM(pelanggaran.poin) AS poin FROM detail_poin JOIN pelanggaran ON detail_poin.id_pelanggaran=pelanggaran.id_pelanggaran GROUP BY detail_poin.nis");
                      while($total=mysqli_fetch_array($hitungTotal)){
                        $nis=$total['nis'];
                        $totalPoin=$total['poin'];

                        if ($totalPoin>=36 && $totalPoin<=50) {
                          $cariSp1=mysqli_query($connect, "SELECT nis FROM temp_sp_1 WHERE nis=$nis");
                          $hasil=mysqli_num_rows($cariSp1);
                          if ($hasil==0) {
                            $simpan=mysqli_query($connect, "INSERT INTO temp_sp_1(nis, jml_poin_pelanggaran, lihat) VALUES ('$nis', '$totalPoin', 'N' )");
                          }
                        }
                        elseif ($totalPoin>=51 && $totalPoin<=75) {
                          $cariSp2=mysqli_query($connect, "SELECT nis FROM temp_sp_2 WHERE nis=$nis");
                          $hasil2=mysqli_num_rows($cariSp2);
                          if ($hasil2==0) {
                            $simpan2=mysqli_query($connect, "INSERT INTO temp_sp_2(nis, jml_poin_pelanggaran, lihat) VALUES ('$nis', '$totalPoin', 'N' )");
                          }
                        }
                        elseif ($totalPoin>=76 && $totalPoin<=124) {
                          $cariSp3=mysqli_query($connect, "SELECT nis FROM temp_sp_3 WHERE nis=$nis");
                          $hasil3=mysqli_num_rows($cariSp3);
                          if ($hasil3==0) {
                            $simpan3=mysqli_query($connect, "INSERT INTO temp_sp_3(nis, jml_poin_pelanggaran, lihat) VALUES ('$nis', '$totalPoin', 'N' )");
                          }
                        }
                        elseif ($totalPoin>=125) {
                          $cariRapat=mysqli_query($connect, "SELECT nis FROM temp_rapat WHERE nis=$nis");
                          $hasil4=mysqli_num_rows($cariRapat);
                          if ($hasil4==0) {
                            $simpan4=mysqli_query($connect, "INSERT INTO temp_rapat(nis, jml_poin_pelanggaran, lihat) VALUES ('$nis', '$totalPoin', 'N' )");
                          }
                        }

                      }

                    ?>

                    <!-- Start Notifikasi -->
                    <div class="col-md-9">
                      <div class="row tile_count">

                        <!-- SP 1 -->
                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                          <span class="count_top" ><i class="fa fa-envelope-square"></i> Surat Peringatan 1</span>
                          <div class="count">
                            <a class="pull-left border-green profile_thumb" style="color:#bebebe">
                              <i class="fa fa-bell-o"></i>&nbsp;
                            </a>
                            <?php
                              $sp1=mysqli_query($connect, "SELECT temp_sp_1.nis, temp_sp_1.id_temp_sp_1, siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_1.jml_poin_pelanggaran FROM temp_sp_1 JOIN siswa ON temp_sp_1.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='N'");
                              $jmlSp1=mysqli_num_rows($sp1);
                            ?>
                            <a href="#"><?php if ($jmlSp1==0) { echo "0";}else{echo $jmlSp1;} ?></a>
                          </div>
                          <span class="count_bottom"><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".cetaksp1">SP 1 Perlu Dicetak</button></span>
                        </div>
                        <!-- Penutup SP 1 -->

                        <!-- modals SP 1 -->
                        <div class="modal fade cetaksp1" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel"><font color="#da3131"><b>Daftar Surat Peringatan (SP 1) Yang Harus Dicetak</b></font></h4>
                              </div>
                              <div class="modal-body">
                                <h4>Perlu Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $no=1;
                                    while ($cetak1=mysqli_fetch_array($sp1)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$cetak1['nis'].") ".$cetak1['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$cetak1['tingkat_kelas']." ".$cetak1['nama_jurusan']." ".$cetak1['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$cetak1['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=detail_siswa&nis=<?php echo $cetak1['nis']; ?>&sb=home">
                                        <button type="button" class="btn btn-info btn-xs" ><i class='fa fa-eye'></i> Lihat</button>
                                      </a>
                                      <a href="main.php?module=pre_cetak1&nis=<?php echo $cetak1['nis']; ?>&id_temp_sp_1=<?php echo $cetak1['id_temp_sp_1']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>                            

                                <br>
                                <h4>Terakhir Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $sdhCetak1=mysqli_query($connect, "SELECT temp_sp_1.nis, temp_sp_1.id_temp_sp_1, siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_1.jml_poin_pelanggaran FROM temp_sp_1 JOIN siswa ON temp_sp_1.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='Y' ORDER BY temp_sp_1.id_temp_sp_1 DESC LIMIT 5 ");
                                    $urut=1;
                                    while ($ulang1=mysqli_fetch_array($sdhCetak1)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $urut; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$ulang1['nis'].") ".$ulang1['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$ulang1['tingkat_kelas']." ".$ulang1['nama_jurusan']." ".$ulang1['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$ulang1['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=pre_cetak1&nis=<?php echo $ulang1['nis']; ?>&id_temp_sp_1=<?php echo $ulang1['id_temp_sp_1']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak Ulang</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>      

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- Penutup modals SP 1 -->

                        <!-- SP 2 -->
                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                          <span class="count_top"><i class="fa fa-envelope-square"></i> Surat Peringatan 2</span>
                          <div class="count">
                            <a class="pull-left border-green profile_thumb" style="color:#da8631">
                              <i class="fa fa-bell-o"></i>&nbsp;
                            </a>
                            <?php
                              $sp2=mysqli_query($connect, "SELECT temp_sp_2.nis, temp_sp_2.id_temp_sp_2,siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_2.jml_poin_pelanggaran FROM temp_sp_2 JOIN siswa ON temp_sp_2.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='N'");
                              $jmlSp2=mysqli_num_rows($sp2);
                              $cetak2=mysqli_fetch_array($sp2);
                            ?>
                            <a href="#"><?php if ($jmlSp2==0) { echo "0";}else{echo $jmlSp2;} ?></a>
                          </div>
                          <span class="count_bottom"><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".cetaksp2">SP 2 Perlu Dicetak</button></span>
                        </div>
                        <!-- Penutup SP 2 -->

                        <!-- modals SP 2 -->
                        <div class="modal fade cetaksp2" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel"><font color="#da3131"><b>Daftar Surat Peringatan (SP 2) Yang Harus Dicetak</b></font></h4>
                              </div>
                              <div class="modal-body">
                                <h4>Perlu Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $no=1;
                                    while ($cetak2) {
                                  ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$cetak2['nis'].") ".$cetak2['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$cetak2['tingkat_kelas']." ".$cetak2['nama_jurusan']." ".$cetak2['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$cetak2['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=detail_siswa&nis=<?php echo $cetak2['nis']; ?>&sb=home">
                                        <button type="button" class="btn btn-info btn-xs" ><i class='fa fa-eye'></i> Lihat</button>
                                      </a>
                                      <a href="main.php?module=pre_cetak2&nis=<?php echo $cetak2['nis']; ?>&id_temp_sp_2=<?php echo $cetak2['id_temp_sp_2']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>                            

                                <br>
                                <h4>Terakhir Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $sdhCetak2=mysqli_query($connect, "SELECT temp_sp_2.nis, temp_sp_2.id_temp_sp_2,siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_2.jml_poin_pelanggaran FROM temp_sp_2 JOIN siswa ON temp_sp_2.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='Y' ORDER BY temp_sp_2.id_temp_sp_2 DESC LIMIT 5 ");
                                    $urut=1;
                                    while ($ulang2=mysqli_fetch_array($sdhCetak2)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $urut; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$ulang2['nis'].") ".$ulang2['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$ulang2['tingkat_kelas']." ".$ulang2['nama_jurusan']." ".$ulang2['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$ulang2['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=pre_cetak2&nis=<?php echo $ulang2['nis']; ?>&id_temp_sp_2=<?php echo $ulang2['id_temp_sp_2']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak Ulang</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>      

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- Penutup modals SP 2 -->

                        <!-- SP 3 -->
                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                          <span class="count_top"><i class="fa fa-envelope-square"></i> Surat Peringatan 3</span>
                          <div class="count">
                            <a class="pull-left border-green profile_thumb" style="color:#da3131">
                              <i class="fa fa-bell-o"></i>&nbsp;
                            </a>
                            <?php
                              $sp3=mysqli_query($connect, "SELECT temp_sp_3.nis, temp_sp_3.id_temp_sp_3, siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_3.jml_poin_pelanggaran FROM temp_sp_3 JOIN siswa ON temp_sp_3.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='N'");
                              $jmlSp3=mysqli_num_rows($sp3);
                            ?>
                            <a href="#"><?php if ($jmlSp3==0) { echo "0";}else{echo $jmlSp3;} ?></a>
                          </div>
                          <span class="count_bottom"><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".cetaksp3">SP 3 Perlu Dicetak</button></span>
                        </div>
                        <!-- Penutup SP 3 -->

                        <!-- modals SP 3 -->
                        <div class="modal fade cetaksp3" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel"><font color="#da3131"><b>Daftar Surat Peringatan (SP 3) Yang Harus Dicetak</b></font></h4>
                              </div>
                              <div class="modal-body">
                                <h4>Perlu Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $no=1;
                                    while ($cetak3=mysqli_fetch_array($sp3)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$cetak3['nis'].") ".$cetak3['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$cetak3['tingkat_kelas']." ".$cetak3['nama_jurusan']." ".$cetak3['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$cetak3['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=detail_siswa&nis=<?php echo $cetak3['nis']; ?>&sb=home">
                                        <button type="button" class="btn btn-info btn-xs" ><i class='fa fa-eye'></i> Lihat</button>
                                      </a>
                                      <a href="main.php?module=pre_cetak3&nis=<?php echo $cetak3['nis']; ?>&id_temp_sp_3=<?php echo $cetak3['id_temp_sp_3']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>                            

                                <br>
                                <h4>Terakhir Dicetak</h4>
                                <table class="table table-hover">
                                  <?php
                                    $sdhCetak3=mysqli_query($connect, "SELECT temp_sp_3.nis, temp_sp_3.id_temp_sp_3 siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_sp_3.jml_poin_pelanggaran FROM temp_sp_3 JOIN siswa ON temp_sp_3.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='Y' ORDER BY temp_sp_3.id_temp_sp_3 DESC LIMIT 5 ");
                                    $urut=1;
                                    while ($ulang3=mysqli_fetch_array($sdhCetak3)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $urut; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$ulang3['nis'].") ".$ulang3['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$ulang3['tingkat_kelas']." ".$ulang3['nama_jurusan']." ".$ulang3['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$ulang3['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <a href="main.php?module=pre_cetak3&nis=<?php echo $ulang3['nis']; ?>&id_temp_sp_3=<?php echo $ulang3['id_temp_sp_3']; ?>">
                                        <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Cetak Ulang</button>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>      

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- Penutup modals SP 3 -->

                        <!-- Keputusan Akhir -->
                        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                          <span class="count_top"><i class="fa fa-envelope-square"></i> Keputusan Akhir</span>
                          <div class="count">
                            <a class="pull-left border-green profile_thumb" style="color:#da3131">
                              <i class="fa fa-exclamation-circle"></i>&nbsp;
                            </a>
                            <?php
                              $do=mysqli_query($connect, "SELECT temp_rapat.nis, siswa.nama_siswa, kelas.tingkat_kelas, jurusan.nama_jurusan, kelas.sub_kelas, temp_rapat.jml_poin_pelanggaran FROM temp_rapat JOIN siswa ON temp_rapat.nis=siswa.nis JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE lihat='N'");
                              $jmlDo=mysqli_num_rows($do);
                            ?>
                            <a href="#"><?php if ($jmlDo==0) { echo "0";}else{echo $jmlDo;} ?></a>
                          </div>
                          <span class="count_bottom"><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".rapat">Perlu Dirapatkan</button></span>
                        </div>
                        <!-- Penutup Keputusan Akhir -->

                        <!-- modals Keputusan Akhir -->
                        <div class="modal fade rapat" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel"><font color="#da3131"><b>Daftar Yang Harus Dirapatkan</b></font></h4>
                              </div>
                              <div class="modal-body">
                                <h4>List Untuk Diakan Rapat Pleno</h4>
                                <table class="table table-hover">
                                  <?php
                                    $no=1;
                                    while ($rapat=mysqli_fetch_array($do)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo "<b>Nama:</b> (".$rapat['nis'].") ".$rapat['nama_siswa']; ?></td>
                                    <td><?php echo "<b>Kelas:</b> ".$rapat['tingkat_kelas']." ".$rapat['nama_jurusan']." ".$rapat['sub_kelas']; ?></td>
                                    <td><?php echo "<b>Total Poin:</b> ".$rapat['jml_poin_pelanggaran']; ?></td>
                                    <td>
                                      <button type="button" class="btn btn-primary btn-xs" ><i class='fa fa-print'></i> Sudah Rapat</button>
                                    </td>
                                  </tr>
                                  <?php 
                                    $no++;
                                    }
                                  ?>
                                </table>                            

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- Penutup modals Keputusan Akhir -->

                      </div>
                    </div>
                    <!-- End Notifikasi -->

                    <?php 
                      $thAjaran=mysqli_query($connect, "SELECT * FROM th_ajaran WHERE sekarang='Y' ");
                      $ta=mysqli_fetch_array($thAjaran);
                      $th_ajaran=$ta['tahun_ajaran'];
                      $idThAjaran=$ta['id_th_ajaran'];
                    ?>
                    <div class="row" style="margin-top:25">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                        <div class="tile-stats" >
                          <!--<div class="icon"><i class="fa fa-caret-square-o-right"></i></div>-->
                          <div class="count">TA <?php echo $th_ajaran; ?></div>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".th_ajaran" style="margin-left: 55px">Ganti Tahun Ajaran</button>

                          <div class="modal fade th_ajaran" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel2">Ganti Tahun Ajaran</h4>
                                </div>
                                <form method="post" action="module/th_ajaran/update_data.php">
                                <div class="modal-body">
                                    <label>Th Ajaran : </label>
                                    <input type="hidden" name="idThAjaran" value="<?php echo $idThAjaran; ?>">
                                    <input type="text" name="thAjaran" placeholder="<?php echo $th_ajaran; ?>">
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Perbarui</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- Tutup class="x_content"-->
                </div>
              </div><!-- Penutup col-md-12 -->
            </div><!-- Penutup row top_tiles -->

            <div class="row">
              <!-- bar chart -->
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Grafik Pelanggaran Siswa <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <?php
                        $tahunAjaran1=mysqli_query($connect, "SELECT * FROM th_ajaran ORDER BY tahun_ajaran DESC limit 2, 1");
                        $ta1=mysqli_fetch_array($tahunAjaran1);
                        $tahun1=$ta1['tahun_ajaran'];
                       ?>
                      <h2><small><?php echo $tahun1; ?></small></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="grafik_pelanggaran1" style="width:100%; height:230px;"></div>
                  </div>
                </div>
              </div>
              <!-- /bar charts -->

              <!-- bar chart -->
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Grafik Pelanggaran Siswa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <?php
                        $tahunAjaran2=mysqli_query($connect, "SELECT * FROM th_ajaran ORDER BY tahun_ajaran DESC limit 1, 1");
                        $ta2=mysqli_fetch_array($tahunAjaran2);
                        $tahun2=$ta2['tahun_ajaran'];
                       ?>
                      <h2><small><?php echo $tahun2; ?></small></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="grafik_pelanggaran2" style="width:100%; height:230px;"></div>
                  </div>
                </div>
              </div>
              <!-- /bar charts -->

              <!-- bar chart -->
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Grafik Pelanggaran Siswa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <?php
                        $tahunAjaran3=mysqli_query($connect, "SELECT * FROM th_ajaran ORDER BY tahun_ajaran DESC limit 0, 1");
                        $ta3=mysqli_fetch_array($tahunAjaran3);
                        $tahun3=$ta3['tahun_ajaran'];
                       ?>
                      <h2><small><?php echo $tahun3; ?></small></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="grafik_pelanggaran3" style="width:100%; height:230px;"></div>
                  </div>
                </div>
              </div>
              <!-- /bar charts -->


            </div> <!-- Penutup row -->

            <div class="row">
              <!-- bar chart -->
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Grafik Prestasi Siswa <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <h2><small><?php echo $tahun1; ?></small></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="grafik_prestasi1" style="width:100%; height:230px;"></div>
                  </div>
                </div>
              </div>
              <!-- /bar charts -->

              <!-- bar chart -->
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Grafik Prestasi Siswa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <h2><small><?php echo $tahun2; ?></small></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="grafik_prestasi2" style="width:100%; height:230px;"></div>
                  </div>
                </div>
              </div>
              <!-- /bar charts -->

              <!-- bar chart -->
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Grafik Prestasi Siswa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <h2><small><?php echo $tahun3; ?></small></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="grafik_prestasi3" style="width:100%; height:230px;"></div>
                  </div>
                </div>
              </div>
              <!-- /bar charts -->


            </div> <!-- Penutup row -->

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Aktivitas Terbaru </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!--<div class="col-md-3 col-sm-3 col-xs-12 profile_left">



                    </div>-->
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
                            <!-- start pelanggaran terbaru -->
                            <table class="data table table-striped no-margin table-bordered">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>NIS</th>
                                  <th>Kelas</th>
                                  <th>Nama Siswa</th>
                                  <th>Pelanggaran</th>
                                </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    $tahun = mysqli_query($connect, "SELECT * FROM th_ajaran");
                                    $th = mysqli_fetch_array($tahun);

                                    $detail_poin = mysqli_query($connect,"SELECT * FROM detail_poin JOIN siswa ON siswa.nis=detail_poin.nis JOIN pelanggaran ON detail_poin.id_pelanggaran=pelanggaran.id_pelanggaran JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan ORDER BY detail_poin.tanggal DESC LIMIT 10");
                                    $no=1;
                                    while($dp=mysqli_fetch_array($detail_poin)){
                
                                  ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $dp['tanggal']; ?></td>
                                  <td><?php echo $dp['nis']; ?></td>
                                  <td><?php echo $dp['tingkat_kelas']." ".$dp['nama_jurusan']." ".$dp['sub_kelas']; ?></td>
                                  <td><?php echo $dp['nama_siswa']; ?></td>
                                  <td><?php echo $dp['nama_pelanggaran']; ?></td>
                                </tr>
                                <?php 
                                $no++;
                                } ?>
                                
                              </tbody>
                            </table>
                            <!-- end pelanggaran terbaru -->
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="home-tab">
                            <!-- start prestasi terbaru -->
                            <table class="data table table-striped no-margin table-bordered">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>NIS</th>
                                  <th>Kelas</th>
                                  <th>Nama Siswa</th>
                                  <th>Prestasi</th>
                                </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    $tahun = mysqli_query($connect, "SELECT * FROM th_ajaran");
                                    $th = mysqli_fetch_array($tahun);

                                    $detail_poin = mysqli_query($connect,"SELECT * FROM detail_poin JOIN siswa ON siswa.nis=detail_poin.nis JOIN prestasi ON detail_poin.id_prestasi=prestasi.id_prestasi JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan ORDER BY detail_poin.tanggal DESC LIMIT 10");
                                    $no=1;
                                    while($dp=mysqli_fetch_array($detail_poin)){
                
                                  ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $dp['tanggal']; ?></td>
                                  <td><?php echo $dp['nis']; ?></td>
                                  <td><?php echo $dp['tingkat_kelas']." ".$dp['nama_jurusan']." ".$dp['sub_kelas']; ?></td>
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