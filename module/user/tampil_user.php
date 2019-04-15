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
                <h3>Data User<small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

              <!-- Table -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data User</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg">Help</button></li>

                      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                              <h4 class="modal-title" id="myModalLabel">Hak Akses User</h4>
                            </div>
                            <div class="modal-body">
                              <div align="center"><img src="images/privileges.png"></div><br>
                              <p>
                                Keterangan:<br>
                                C : Create (Menambahkan Data)<br>
                                R : Read (Melihat Data)<br>
                                U : Update (Mengubah Data)<br>
                                D : Delete (Menghapus Data)
                              </p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                              
                            </div>

                          </div>
                        </div>
                      </div>

                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">


                    <div class="table-responsive">
                      <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">No </th>
                            <th class="column-title">Nama</th>
                            <th class="column-title">Username  </th>
                            <th class="column-title">Hak Akses </th>
                            <th class="column-title no-link last"><span class="nobr">Aksi</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                            $user = mysqli_query($connect,"SELECT * FROM user");
                            $no=1;
                            while($usr=mysqli_fetch_array($user)){
                            $nis=$usr['nis'];
                            $nip=$usr['nip'];
                            $id_ortu=$usr['id_ortu'];
                          ?>
                          <tr>
                            <td class=" "><?php echo $no;?></td>
                              <?php

                              if ($nis!=null) {
                                $nama_siswa=mysqli_query($connect, "SELECT nama_siswa FROM siswa WHERE nis=$nis");
                                $nm=mysqli_fetch_array($nama_siswa);
                                $nama= $nm['nama_siswa'];
                              }
                              elseif ($nip!=null) {
                                $nm_guru=mysqli_query($connect, "SELECT nama_guru FROM guru WHERE nip=$nip");
                                $nm=mysqli_fetch_array($nm_guru);
                                $nama= $nm['nama_guru'];
                              }
                              else{
                                $nama_ortu=mysqli_query($connect, "SELECT nama_ortu FROM orang_tua WHERE id_ortu=$id_ortu");
                                $nm=mysqli_fetch_array($nama_ortu);
                                $nama= $nm['nama_ortu'];
                              }
                              ?>
                            <td class=" "><?php echo $nama;?></td>
                            <td class=" "><?php echo $usr['username'];?></td>
                            <td class=" "><?php echo $usr['hak_akses'];
                            if($usr['hak_akses']==1){
                              echo " - Administrator";
                            }
                            elseif($usr['hak_akses']==2){
                              echo " - Guru Kesiswaan";
                            }
                            elseif($usr['hak_akses']==3){
                              echo " - Wali Kelas";
                            }
                            elseif($usr['hak_akses']==4){
                              echo " - Kepala Sekolah";
                            }
                            else{
                              echo " - Orang Tua/Siswa";
                            }?></td>
                            <td class="last">
                              <div class="btn-group">
                                <a href="main.php?module=edit_user&id_login=<?php echo $usr['id_login']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i></button></a>
                                <a href="module/user/aksi_hapus.php?id_login=<?php echo $usr['id_login'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button></a>
                              </div>
                            </td>
                          </tr>
                          <?php 
                            $no++;
                            }
                          ?>
                          
                        </tbody>
                      </table>
                      <div align="right">
                      <a href="main.php?module=tambah_user"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Data User</button></a>
                      </div>
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
