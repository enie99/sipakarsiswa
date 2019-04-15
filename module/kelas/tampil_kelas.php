<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1 or $_SESSION['akses']==2){ ?>     <!-- Cek user, hanya administrator(1) dan kesiswaan(2) yg dapat akses-->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Kelas<small></small></h3>
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

              <!-- Table -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Kelas</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">


                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">No </th>
                            <th class="column-title">Kelas </th>
                            <th class="column-title">Jumlah Siswa </th>
                            <th class="column-title">Wali Kelas </th>
                            <th class="column-title no-link last"><span class="nobr">Aksi</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                            $kelas = mysqli_query($connect,"SELECT * FROM kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan JOIN guru ON kelas.nip=guru.nip");
                            $no=1;
                            while($kls=mysqli_fetch_array($kelas)){
                            if ($no%2==1) {
                          ?>
                          <tr class="even pointer">
                            <td class=" "><?php echo $no;?></td>
                            <td class=" "><a href="main.php?module=detail_kelas&id_kelas=<?php echo $kls['id_kelas']; ?>">
                              <?php echo $kls['tingkat_kelas'].' '.$kls['nama_jurusan'].' '.$kls['sub_kelas'];?></a>
                            </td>
                            <td class=" "><?php echo $kls['jml_siswa'];?></td>
                            <td class=" "><?php echo $kls['nama_guru'];?></td>
                            <?php
                              if($_SESSION['akses']==1 or $_SESSION['akses']==2){
                            ?>
                            <td class=" last">
                              <div class="btn-group">
                                <a href="main.php?module=edit_kelas&id_kelas=<?php echo $kls['id_kelas']; ?>"><button class="btn btn-warning btn-sm" <?php if ($_SESSION['akses']==2){ echo 'disabled'; }?>><i class='fa fa-pencil'></i> Edit</button></a>
                                <!--
                                <a href="<?php //echo $base_url; ?>module/kelas/aksi_hapus.php?id_kelas=<?php //echo $kls['id_kelas'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                              -->
                                <a href="main.php?module=detail_kelas&id_kelas=<?php echo $kls['id_kelas'];?>" >
                                <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Daftar Siswa"><i class='fa fa-eye'> Lihat</i>
                                </button>
                                </a>
                              </div>
                              </div>
                            </td>
                            <?php } ?>
                          </tr>
                            <?php
                            }
                            else{
                            ?>

                          <tr class="odd pointer">
                            
                            <td class=" "><?php echo $no;?></td>
                            <td class=" "><a href="main.php?module=detail_kelas&id_kelas=<?php echo $kls['id_kelas']; ?>"><?php echo $kls['tingkat_kelas'].' '.$kls['nama_jurusan'].' '.$kls['sub_kelas'];?></a></td>
                            <td class=" "><?php echo $kls['jml_siswa'];?></td>
                            <td class=" "><?php echo $kls['nama_guru'];?></td>
                            <?php
                              if($_SESSION['akses']==1 or $_SESSION['akses']==2){
                            ?>
                            <td class=" last">
                              <div class="btn-group">
                                <a href="main.php?module=edit_kelas&id_kelas=<?php echo $kls['id_kelas']; ?>"><button class="btn btn-warning btn-sm" <?php if ($_SESSION['akses']==2){ echo 'disabled'; }?>><i class='fa fa-pencil'></i> Edit</button></a>
                                <!--
                                <a href="<?php //echo $base_url; ?>module/kelas/aksi_hapus.php?id_kelas=<?php //echo $kls['id_kelas'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>
                              -->
                                <a href="main.php?module=detail_kelas&id_kelas=<?php echo $kls['id_kelas'];?>" >
                                <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Daftar Siswa"><i class='fa fa-eye'> Lihat</i>
                                </button>
                                </a>
                              </div>
                              </div>
                            </td>
                            <?php } ?>

                          </tr>
                          <?php 
                            }
                            $no++;
                          }
                          ?>
                          
                        </tbody>
                      </table>
                      <?php
                        if($_SESSION['akses']==1){
                      ?>
                      <div align="right">
                      <a href="main.php?module=tambah_kelas"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Kelas</button></a>
                      </div>
                      <?php } ?>
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
