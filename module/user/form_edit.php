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
                <h3> Edit Data User<small></small></h3>
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

              <!-- Form -->
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Edit Data User</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="module/user/aksi_edit.php" method="post">

                      <?php
                      
                      $idLogin=$_GET['id_login'];
                      $queryEdit=mysqli_query($connect,"SELECT * FROM user WHERE id_login='$idLogin'");

                      $hasilQuery=mysqli_fetch_array($queryEdit);
                      $username=$hasilQuery['username'];
                      $pass=$hasilQuery['password'];
                      $nis=$hasilQuery['nis'];
                      $nip=$hasilQuery['nip'];
                      $idOrtu=$hasilQuery['id_ortu'];
                      $hakAkses=$hasilQuery['hak_akses'];
                      ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Username</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="idLogin" id="idLogin" value="<?php echo $idLogin; ?>">
                          <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $username; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pass; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NIS</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="nis" class="form-control">
                            <option disabled="disabled">-- Pilih NIS --</option>
                            <option <?php if( $nis==null){echo "selected"; } ?> value=""> - </option>
                            <?php
                              $siswa=mysqli_query($connect,"SELECT * FROM siswa");
                              while ($sw=mysqli_fetch_array($siswa)) {
                             ?>
                            <option <?php if( $sw['nis']=='$nis'){echo "selected"; } ?> value="<?php echo $sw['nis']; ?>"><?php echo $sw['nis']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <!-- UNTUK JAGA-JAGA PAKAI COMBOBOX BIASA KALAU JQUERY NGGA JAyLAN
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Wali Kelas</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="jurusan" class="select2_single form-control" tabindex="-1" required="required">
                            <?php/*
                              $wali=mysqli_query($connect,"SELECT * FROM guru");
                              while ($wl=mysqli_fetch_array($wali)) {*/
                             ?>
                            <option value="<?php //echo $wl[nip]; ?>"><?php //echo $wl['nama_guru']; ?></option>
                            <?php //} ?>
                          </select>
                        </div>
                      </div>
                      -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NIP</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <?php
                              $guru=mysqli_query($connect,"SELECT * FROM guru WHERE nip='$nip'");
                              $gr=mysqli_fetch_array($guru);
                                $namaGuru=$gr['nama_guru'];
                             ?>
                                        

                          <input type="text" name="guru" id="autocomplete-custom-append" class="form-control col-md-10" style="float: left;" <?php if($nip!=null){ ?> value="<?php echo $nip." - ".$namaGuru; ?>" <?php }else{ ?> value="" <?php } ?> /> 
                    
                          <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Ortu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <?php
                              $orangTua=mysqli_query($connect,"SELECT * FROM orang_tua WHERE id_ortu='$idOrtu'");
                              $ortu=mysqli_fetch_array($orangTua);
                                $namaOrtu=$ortu['nama_ortu'];
                             ?>

                          <input type="text" name="ortu" id="autocomplete-ortu" class="form-control col-md-10" style="float: left;" <?php if($idOrtu!=null){?> value="<?php echo $idOrtu." - ".$namaOrtu; ?>" <?php }else{ ?> value="" <?php } ?>/>
                          <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hak Akses</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="hakAkses" class="form-control" required="required">
                            <option disabled="disabled">-- Hak Akses --</option>
                            <option <?php if( $hakAkses=='1'){echo "selected"; } ?> value="1">1 - Administrator</option>
                            <option <?php if( $hakAkses=='2'){echo "selected"; } ?> value="2">2 - Kesiswaan</option>
                            <option <?php if( $hakAkses=='3'){echo "selected"; } ?> value="3">3 - Wali Kelas</option>
                            <option <?php if( $hakAkses=='4'){echo "selected"; } ?> value="4">4 - Kepala Sekolah</option>
                            <option <?php if( $hakAkses=='5'){echo "selected"; } ?> value="5">5 - Siswa / Orang Tua</option>
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary" onclick="window.location='main.php?module=user'">Cancel</button>
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

            </div>
          </div>
        </div>
<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>
