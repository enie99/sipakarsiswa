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
                <h3>Data Guru<small></small></h3>
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
                    <h2>Data Guru</h2>

                      <ul class="nav navbar-right panel_toolbox">
                        <?php
                        if($_SESSION['akses']==1){
                        ?>
                        <li>
                          <a href="main.php?module=tambah_guru"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data Guru</button></a>
                        </li>
                        <li>
                          <a href="main.php?module=tambah_guru"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-upload"></i> Upload File Guru</button></a>
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
                            <th class="column-title">NIP </th>
                            <th class="column-title">Nama Guru </th>
                            <th class="column-title">Kontak </th>
                            <th class="column-title">Jabatan </th>
                            <?php
                              if($_SESSION['akses']==1){
                            ?>
                            <th class="column-title no-link last"><span class="nobr">Aksi</span>
                            </th>
                            <?php } ?>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                            $guru = mysqli_query($connect,"SELECT * FROM guru ORDER BY nama_guru ASC");
                            $no=1;
                            while($gur=mysqli_fetch_array($guru)){
                          ?>
                          <tr>
                            <td class=" "><?php echo $no;?></td>
                            <td class=" "><?php echo $gur['nip'];?></td>
                            <td class=" "><?php echo $gur['nama_guru'];?></td>
                            <td class=" "><?php echo $gur['no_hp'];?></td>
                            <td class=" "><?php echo $gur['jabatan'];?></td>
                            <?php
                              if($_SESSION['akses']==1){
                            ?>
                            <td class=" last">
                              <div class="btn-group">
                                <a href="main.php?module=edit_guru&nip=<?php echo $gur['nip']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i> Edit</a>
                                <!--<a href="<?php //echo $base_url; ?>module/guru/aksi_hapus.php?nip=<?php //echo $gur['nip'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></a>-->
                              </div>
                            </td>
                            <?php } ?>
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
