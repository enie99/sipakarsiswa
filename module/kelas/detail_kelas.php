<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href='$base_url'+'index.php'><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1 or $_SESSION['akses']==2 or $_SESSION['akses']==3){ ?>        
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <?php
                if ($_SESSION['akses']==1 or ($_SESSION['akses']==2)) {
                ?>
                <a href="main.php?module=kelas"><button type="button" class="btn btn-round btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</button> </a>
                <?php
              }
              ?>
                
              </div>


              <?php 
              $tahun_ajaran=mysqli_query($connect, "SELECT * FROM th_ajaran");
              $ta=mysqli_fetch_array($tahun_ajaran);
              $thAjaran=$ta['tahun_ajaran'];

              if ($_SESSION['akses']==3) {
                $username=$_SESSION['namauser'];
                $pass=$_SESSION['passuser'];
                $cariKelas=mysqli_query($connect, "SELECT * FROM user JOIN guru ON user.nip=guru.nip JOIN kelas ON guru.nip=kelas.nip WHERE user.username='$username' AND user.password='$pass'");
                $ck=mysqli_fetch_array($cariKelas);
                $idKelas=$ck['id_kelas'];
              }
              else{
              $idKelas=$_GET['id_kelas'];
              }
              $kelas=mysqli_query($connect, "SELECT * FROM kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE id_kelas='$idKelas'");
              $kls=mysqli_fetch_array($kelas);


              ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Nama Siswa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <h4 align="center">Daftar Siswa</h4>
                    <h4 align="center">Kelas <?php echo $kls['tingkat_kelas']." ".$kls['nama_jurusan']." ".$kls['sub_kelas'] ?></h4>
                    <h4 align="center">SMK Negeri 2 Depok Sleman Yogyakarta</h4>
                    <h4 align="center">Tahun Ajaran <?php echo $thAjaran; ?></h4>
                    <!--<p class="text-muted font-13 m-b-30">
                      The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                    </p>-->
                    <?php
                      if ($_SESSION['akses']==1 or $_SESSION['akses']==2) {
                    ?>
                      <a href="main.php?module=naik_kelas&id_kelas=<?php echo $kls['id_kelas'];?>" >
                        <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="tooltip" data-placement="top" title="Naik Kelas / Lulus"><i class='fa fa-level-up'><font size="3"> NAIK KELAS / LULUS</font></i></button>
                      </a>
                    <?php 
                      }            
                    ?>
                    <table id="datatable-buttons" class="table table-striped table-bordered jambo_table">
                      <thead>
                        <tr class="headings">
                          <th>No</th>
                          <th>NIS</th>
                          <th>Nama Siswa</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $siswa=mysqli_query($connect, "SELECT * FROM siswa WHERE id_kelas='$idKelas' ORDER BY nis");
                        $no=1;
                        while($sw=mysqli_fetch_array($siswa)){
                        $nis=$sw['nis'];

                         ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $sw['nis']; ?></td>
                          <td><?php echo $sw['nama_siswa']; ?></td>
                          <td>
                            <div class="btn-group">
                              
                                <a href="main.php?module=detail_siswa&nis=<?php echo $sw['nis'];?>&sb=detail_kelas&id_kelas=<?php echo $idKelas;?>" >
                                <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Profil Siswa"><i class='fa fa-eye'><font size="3"> Lihat</font></i>
                                </button>
                                </a>
                              
                            </div>
                          </td>
                        </tr>

                        <?php
                        $no++;
                        }
                         ?>
                        
                      </tbody>
                    </table>
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