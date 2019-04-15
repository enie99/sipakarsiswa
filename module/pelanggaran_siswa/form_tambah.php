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
                <h3> Input Data Pelanggaran Siswa<small></small></h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>

            <div class="clearfix"></div>

              <!-- Form -->
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah Data Pelanggaran</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="module/pelanggaran_siswa/aksi_simpan.php" method="post">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tahun Ajaran</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <?php 
                            $th_ajaran=mysqli_query($connect, "SELECT * FROM th_ajaran WHERE sekarang='Y'");
                            $ta=mysqli_fetch_array($th_ajaran);
                            $thAjaran=$ta['tahun_ajaran'];
                           ?>
                          <input type="text" id="thAjaran" name="thAjaran" value="<?php echo $ta['tahun_ajaran']; ?>" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <?php 
                            $tgl=date('Y-m-d');
                           ?>
                          <input type="text" id="tanggal" name="tanggal" value="<?php echo $tgl; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <!-- UNTUK JAGA-JAGA PAKAI COMBOBOX BIASA KALAU JQUERY NGGA JALAN
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Orang Tua</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="siswa" class="select2_single form-control" tabindex="-1" required="required">
                            <?php/*
                              $siswa=mysqli_query($connect,"SELECT * FROM siswa");
                              while ($sw=mysqli_fetch_array($siswa)) {*/
                             ?>
                            <option value="<?php //echo $sw[nis]; ?>"><?php //echo $sw['nama_siswa']; ?></option>
                            <?php //} ?>
                          </select>
                        </div>
                      </div>
                      -->

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NIS / Nama</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="siswa" id="autocomplete-siswa" class="form-control col-md-10" style="float: left;" required="required" />
                          <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pelanggaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="pelanggaran" id="autocomplete-pelanggaran" class="form-control col-md-10" style="float: left;" required="required" />
                          <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="ket" class="resizable_textarea form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary" onclick="window.location='main.php?module=pelanggaran_siswa'">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      

                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>
              <!-- Penutup Form -->


              <!-- Tabel Semua Data Pelanggaran -->
              <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <h4>Data Pelanggaran Siswa</h4>
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>NIS</th>
                          <th>Nama Siswa</th>
                          <th>Pelanggaran</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $pelanggaran=mysqli_query($connect, "SELECT * FROM detail_poin JOIN siswa ON detail_poin.nis=siswa.nis JOIN pelanggaran ON detail_poin.id_pelanggaran=pelanggaran.id_pelanggaran WHERE tahun_ajaran='$thAjaran' ORDER BY tanggal DESC");
                        $no=1;
                        while($plg=mysqli_fetch_array($pelanggaran)){
                        $idDetailPoin=$plg['id_detail_poin'];
                         ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $plg['tanggal']; ?></td>
                          <td><a href="main.php?module=detail_siswa&nis=<?php echo $plg['nis'];?>&sb=input_pelanggaran"><?php echo $plg['nis']; ?></a></td>
                          <td><a href="main.php?module=detail_siswa&nis=<?php echo $plg['nis'];?>&sb=input_pelanggaran"><?php echo $plg['nama_siswa']; ?></a></td>
                          <td><?php echo $plg['nama_pelanggaran']; ?></td>
                          <td>
                            <div class="btn-group">
                              <a href="main.php?module=edit_pelanggaran_siswa&id_detail_poin=<?php echo $idDetailPoin; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i></button></a>
                              <a href="module/pelanggaran_siswa/aksi_hapus.php?id_detail_poin=<?php echo $id_detail_poin;?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button></a>
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
              <!-- Tabel Semua Data Pelanggaran -->

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
