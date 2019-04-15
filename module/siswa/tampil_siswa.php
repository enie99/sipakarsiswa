<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=index.php><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1 or $_SESSION['akses']==2 or $_SESSION['akses']==3){ ?>     <!-- Cek user, hanya administrator(1) dan kesiswaan(2) yg dapat akses-->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Siswa<small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

              <!-- Table -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Siswa</h2>

                      <ul class="nav navbar-right panel_toolbox">
                        <?php
                        if($_SESSION['akses']==1){
                        ?>
                        <li>
                          <abbr title="Single input"><a href="main.php?module=tambah_siswa"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data Siswa</button></a></abbr>
                        </li>
                        <li>
                          <abbr title="Upload Data Siswa Dalam .csv"><a href="main.php?module=tambah_guru"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-upload"></i> Upload File Siswa</button></a></abbr>
                        </li>
                        <?php } ?>
                      </ul>

                     

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">


                    <div class="table-responsive">
                      <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">No </th>
                            <th class="column-title">NIS </th>
                            <th class="column-title">Nama Siswa </th>
                            <th class="column-title">Kelas </th>
                            <th class="column-title">Angkatan </th>
                            <th class="column-title no-link last"><span class="nobr">Aksi</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                            $siswa = mysqli_query($connect,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan ORDER BY siswa.nis DESC");
                            $no=1;
                            while($sw=mysqli_fetch_array($siswa)){ 
                          ?>
                          <tr>
                            <td class=" "><?php echo $no;?></td>
                            <td class=" "><?php echo $sw['nis'];?></td>
                            <td class=" "><?php echo $sw['nama_siswa'];?></td>
                            <td class=" "><?php echo $sw['tingkat_kelas']." ".$sw['nama_jurusan']." ".$sw['sub_kelas'];?></td>
                            <td class=" "><?php echo $sw['th_angkatan'];?></td>
                            <td class=" last">
                              <div class="btn-group">
                                <?php
                                  if($_SESSION['akses']==1){
                                ?>
                                <a href="main.php?module=edit_siswa&nis=<?php echo $sw['nis']; ?>" >
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class='fa fa-pencil'></i>
                                </button>
                                </a>
                                <?php } ?>
                                <!--
                                <a href="<?php //echo $base_url; ?>module/siswa/aksi_hapus.php?nis=<?php //echo $sw['nis'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                              -->
                                <a href="main.php?module=detail_siswa&nis=<?php echo $sw['nis'];?>&sb=tampil_siswa" >
                                <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Detail Siswa"><i class='fa fa-eye'></i>
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
