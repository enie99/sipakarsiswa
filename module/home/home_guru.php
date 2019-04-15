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
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>NIS</th>
                                  <th>Nama Siswa</th>
                                  <th>Pelanggaran</th>
                                </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    $tahun = mysqli_query($connect, "SELECT * FROM th_ajaran");
                                    $th = mysqli_fetch_array($tahun);

                                    $detail_poin = mysqli_query($connect,"SELECT * FROM detail_poin JOIN siswa ON siswa.nis=detail_poin.nis JOIN pelanggaran ON detail_poin.id_pelanggaran=pelanggaran.id_pelanggaran ORDER BY detail_poin.tanggal DESC LIMIT 10");
                                    $no=1;
                                    while($dp=mysqli_fetch_array($detail_poin)){
                
                                  ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $dp['tanggal']; ?></td>
                                  <td><?php echo $dp['nis']; ?></td>
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