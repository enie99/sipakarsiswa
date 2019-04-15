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
              
            </div>

            <div class="clearfix"></div>

            <!-- page content -->
			        

			            <div class="row">
			              <div class="col-md-12">
			                <div class="x_panel">
			                  <div class="x_title">
			                    <h2>Bantuan</h2>
			                    
			                    <div class="clearfix"></div>
			                  </div>

			                  <div class="x_content">

			                    <div class="col-md-9 col-sm-9 col-xs-12">

			                      
			                      <div>

			                        <h3>Petunjuk Penggunaan Sistem</h3>
			                        <h4 id="petunjuk">Langkah menggunakan sistem informasi pembinaan karakter siswa ini antara lain</h4>

			                        


			                      </div>


			                    </div>

			                    <!-- start project-detail sidebar -->
			                    <div class="col-md-3 col-sm-3 col-xs-12">

			                      <section class="panel">

			                        <div class="x_title">
			                          <h2>Navigasi</h2>
			                          <div class="clearfix"></div>
			                        </div>
			                        <div class="panel-body">
			                          
			                          <ul class="list-unstyled project_files">
			                            <li><a href="#petunjuk"><i class="fa fa-square"></i> Petunjuk Penggunaan Sistem</a>
			                            </li>
			                            <li><a href="#coba"><i class="fa fa-square"></i> Cara menambahkan Data Pelanggaran</a>
			                            </li>
			                            <li><a href=""><i class="fa fa-square"></i> Cara menambahkan Data Prestasi</a>
			                            </li>
			                            
			                          </ul>
			                          <br />

			                          
			                        </div>

			                      </section>

			                    </div>
			                    <!-- end project-detail sidebar -->

			                  </div>
			                </div>
			           
			        <!-- /page content -->


          </div>
        </div>

<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>

