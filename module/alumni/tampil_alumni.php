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
                <h3>Data Alumni<small></small></h3>
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
                    <h2>Data Alumni</h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">


                    <div class="table-responsive">
                      <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">No </th>
                            <th class="column-title">NIS </th>
                            <th class="column-title">Nama Alumni </th>
                            <th class="column-title">Jurusan </th>
                            <th class="column-title">Tahun Lulus </th>
                            <th class="column-title">Aksi </th>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                            $alumni = mysqli_query($connect,"SELECT * FROM alumni JOIN jurusan ON alumni.id_jurusan=jurusan.id_jurusan ORDER BY alumni.nis DESC");
                            $no=1;
                            while($al=mysqli_fetch_array($alumni)){ 
                          ?>
                          <tr>
                            <td class=" "><?php echo $no;?></td>
                            <td class=" "><?php echo $al['nis'];?></td>
                            <td class=" "><?php echo $al['nama_alumni'];?></td>
                            <td class=" "><?php echo $al['nama_jurusan']." ".$al['sub_kelas'];?></td>
                            <td class=" "><?php echo $al['th_lulus'];?></td>
                            <td class=" last">
                              <div class="btn-group">
                                <a href="main.php?module=detail_alumni&nis=<?php echo $al['nis'];?>" >
                                <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Detail Alumni"><i class='fa fa-eye'> Lihat Detail</i>
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
