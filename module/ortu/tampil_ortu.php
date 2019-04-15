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
                <h3>Data Orang Tua<small></small></h3>
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
                    <h2>Data Orang Tua</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <?php
                        if($_SESSION['akses']==1){
                        ?>
                        <li>
                          <abbr title="Single input"><a href="main.php?module=tambah_ortu"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data Orang Tua</button></a></abbr>
                        </li>
                        <li>
                          <abbr title="Upload Data Siswa Dalam .csv"><a href="main.php?module=tambah_ortu"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-upload"></i> Upload File Orang Tua</button></a></abbr>
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
                            <th class="column-title">Nama </th>
                            <th class="column-title">No HP </th>
                            <th class="column-title">Alamat </th>
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
                            $orangtua = mysqli_query($connect,"SELECT * FROM orang_tua");
                            $no=1;
                            while($ortu=mysqli_fetch_array($orangtua)){
                          ?>
                          <tr>
                            <td class=" "><?php echo $no;?></td>
                            <td class=" "><?php echo $ortu['nama_ortu'];?></td>
                            <td class=" "><?php echo $ortu['no_hp'];?></td>
                            <td class=" "><?php echo $ortu['alamat_ortu'];?></td>
                            <?php
                              if($_SESSION['akses']==1){
                            ?>
                            <td class=" last">
                              <div class="btn-group">
                                <a href="main.php?module=edit_ortu&id_ortu=<?php echo $ortu['id_ortu']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i> Edit</button></a>
                                <!--
                                <a href="module/ortu/aksi_hapus.php?id_ortu=<?php //echo $ortu['id_ortu'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button></a>-->
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
