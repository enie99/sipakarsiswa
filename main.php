<?php
include "lib/koneksi.php";
include "lib/config.php";
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href='$base_url'+'index.php><b>LOGIN</b></a></center>";
}
else{ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pembinaan Karakter Siswa</title>
    <script language="JavaScript">
      var txt=":: Pembinaan Karakter Siswa ";
      var kecepatan=250;var segarkan=null;function bergerak() { document.title=txt;
      txt=txt.substring(1,txt.length)+txt.charAt(0);
      segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
    </script>

    <script type="text/javascript">
      function validasi_input(form){
        var car = 18;
        if (form.nip.value.length != car){
          alert("NIP harus 18 Karater!");
          form.nip.focus();
          return (false);
        }
         return (true);
      }
    </script>




    <link rel="shortcut icon" href="images/fav.ico">

    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="assets/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <!-- CSS form -->
    <!-- bootstrap-wysiwyg -->
    <link href="assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="assets/vendors/starrr/dist/starrr.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
    <link href="assets/build/css/style.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="main.php?module=home" class="site_title">
                <div class="logo_pic"><img src="images/logo.png" alt="..." class="img-lgkrn logo_img"></div>
                <span>Dashboard</span></a>
            </div>
            <div class="clearfix"></div>
            <br />


            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <?php
                $akses=$_SESSION['akses'];
                if ($akses == 5) {
                include "menu/siswa.php";
                }
                elseif ($akses == 1) {
                include "menu/admin.php";
                }
                elseif ($akses == 2) {
                include "menu/kesiswaan.php";
                }
                elseif ($akses == 3) {
                include "menu/wali_kelas.php";
                }
                elseif ($akses == 4) {
                include "menu/kepsek.php";
                }
                else{
                  echo "Anda Tidak Memiliki Hak Akses Untuk mengakses Halaman Ini";
                }
              ?>              

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <!--<img src="images/img.jpg" alt="">-->
                    <?php
                      $query = mysqli_query($connect,"SELECT * FROM user WHERE username='$_SESSION[namauser]' AND password='$_SESSION[passuser]'");
                      $q = mysqli_fetch_array($query);
                      $nis=$q['nis'];
                      $nip=$q['nip'];
                      $id_ortu=$q['id_ortu'];
                      if ($nis!=null){
                        $siswa = mysqli_query($connect,"SELECT * FROM siswa WHERE nis='$nis'");
                        $s = mysqli_fetch_array($siswa);
                        $nama=$s['nama_siswa'];
                        
                      }
                      elseif ($nip!=null){
                        $guru = mysqli_query($connect,"SELECT * FROM guru WHERE nip='$nip'");
                        $g = mysqli_fetch_array($guru);
                        $nama=$g['nama_guru'];
                      }
                      elseif ($id_ortu!=null){
                        $ortu = mysqli_query($connect,"SELECT * FROM orang_tua WHERE id_ortu='$id_ortu'");
                        $o = mysqli_fetch_array($ortu);
                        $nama=$o['nama_ortu'];
                      }
                      else{
                        $nama="Not Found";
                      }
                      echo $nama;
                    ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <!--<li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>-->
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="main.php?module=help" class="dropdown-toggle info-number">
                    <!--<i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>-->
                    Bantuan
                  </a>
                </li>
                
              </ul>
            </nav>

          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->

        <?php
        if ($_GET['module'] == 'home_admin') {
                include "module/home/home_admin.php";
        }elseif ($_GET['module'] == 'home_guru') {
                include "module/home/home_guru.php";
        }elseif ($_GET['module'] == 'home_siswa') {
                include "module/home/home_siswa.php";
        }
         elseif ($_GET['module'] == 'jurusan') {
                include "module/jurusan/tampil_jurusan.php";
        }elseif ($_GET['module'] == 'tambah_jurusan') {
                include "module/jurusan/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_jurusan') {
                include "module/jurusan/form_edit.php";
        }
         elseif ($_GET['module'] == 'kelas') {
                include "module/kelas/tampil_kelas.php";
        }elseif ($_GET['module'] == 'tambah_kelas') {
                include "module/kelas/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_kelas') {
                include "module/kelas/form_edit.php";
        }elseif ($_GET['module'] == 'detail_kelas') {
                include "module/kelas/detail_kelas.php";
        }elseif ($_GET['module'] == 'naik_kelas') {
                include "module/kelas/naik_kelas.php";
        }
         elseif ($_GET['module'] == 'guru') {
                include "module/guru/tampil_guru.php";
        }elseif ($_GET['module'] == 'tambah_guru') {
                include "module/guru/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_guru') {
                include "module/guru/form_edit.php";
        }
         elseif ($_GET['module'] == 'siswa') {
                include "module/siswa/tampil_siswa.php";
        }elseif ($_GET['module'] == 'tambah_siswa') {
                include "module/siswa/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_siswa') {
                include "module/siswa/form_edit.php";
        }elseif ($_GET['module'] == 'detail_siswa') {
                include "module/siswa/detail_siswa.php";
        }elseif ($_GET['module'] == 'profil_siswa') {
                include "module/siswa/profil_siswa.php";
        }
         elseif ($_GET['module'] == 'ortu') {
                include "module/ortu/tampil_ortu.php";
        }elseif ($_GET['module'] == 'tambah_ortu') {
                include "module/ortu/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_ortu') {
                include "module/ortu/form_edit.php";
        }
         elseif ($_GET['module'] == 'user') {
                include "module/user/tampil_user.php";
        }elseif ($_GET['module'] == 'tambah_user') {
                include "module/user/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_user') {
                include "module/user/form_edit.php";
        }
        elseif ($_GET['module'] == 'alumni') {
                include "module/alumni/tampil_alumni.php";
        }elseif ($_GET['module'] == 'detail_alumni') {
                include "module/alumni/detail_alumni.php";
        }
        elseif ($_GET['module'] == 'siswa_keluar') {
                include "module/siswa_keluar/tampil_siswa_keluar.php";
        }

         elseif ($_GET['module'] == 'tambah_kat_pelanggaran') {
                include "module/kat_pelanggaran/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_kat_pelanggaran') {
                include "module/kat_pelanggaran/form_edit.php";
        }
         
         elseif ($_GET['module'] == 'tambah_sub_kategori') {
                include "module/sub_kat_pelanggaran/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_sub_kategori') {
                include "module/sub_kat_pelanggaran/form_edit.php";
        }
         elseif ($_GET['module'] == 'pelanggaran') {
                include "module/pelanggaran/tampil_data_pelanggaran.php";
        }elseif ($_GET['module'] == 'tambah_pelanggaran') {
                include "module/pelanggaran/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_pelanggaran') {
                include "module/pelanggaran/form_edit.php";
        }
         elseif ($_GET['module'] == 'tindakan') {
                include "module/tindakan/tampil_tindakan.php";
        }elseif ($_GET['module'] == 'tambah_tindakan') {
                include "module/tindakan/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_tindakan') {
                include "module/tindakan/form_edit.php";
        }
         elseif ($_GET['module'] == 'prestasi') {
                include "module/prestasi/tampil_prestasi.php";
        }elseif ($_GET['module'] == 'tambah_prestasi') {
                include "module/prestasi/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_prestasi') {
                include "module/prestasi/form_edit.php";
        }
         elseif ($_GET['module'] == 'input_pelanggaran_siswa') {
                include "module/pelanggaran_siswa/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_pelanggaran_siswa') {
                include "module/pelanggaran_siswa/form_edit.php";
        }
         elseif ($_GET['module'] == 'input_prestasi_siswa') {
                include "module/prestasi_siswa/form_tambah.php";
        }elseif ($_GET['module'] == 'edit_prestasi_siswa') {
                include "module/prestasi_siswa/form_edit.php";
        }
         elseif ($_GET['module'] == 'laporan_pelanggaran') {
                include "module/laporan_pelanggaran/tampil_laporan_pelanggaran.php";
        }elseif ($_GET['module'] == 'detail_pelanggaran_siswa') {
                include "module/laporan_pelanggaran/tampil_detail.php";
        }elseif ($_GET['module'] == 'lap_pelanggaran_ke_siswa') {
                include "module/laporan_pelanggaran/laporan_ke_siswa.php";
        }
         elseif ($_GET['module'] == 'laporan_prestasi') {
                include "module/laporan_prestasi/tampil_laporan_prestasi.php";
        }elseif ($_GET['module'] == 'detail_prestasi_siswa') {
                include "module/laporan_prestasi/tampil_detail.php";
        }elseif ($_GET['module'] == 'lap_prestasi_ke_siswa') {
                include "module/laporan_prestasi/laporan_ke_siswa.php";
        }

        elseif ($_GET['module'] == 'pre_cetak1') {
                include "module/cetak/pre_cetak1.php";
        }elseif ($_GET['module'] == 'pre_cetak2') {
                include "module/cetak/pre_cetak2.php";
        }elseif ($_GET['module'] == 'pre_cetak3') {
                include "module/cetak/pre_cetak3.php";
        }elseif ($_GET['module'] == 'cetak_sp') {
                include "module/cetak/surat.php";
        }
        elseif ($_GET['module'] == 'help') {
                include "module/bantuan/bantuan.php";
        }

        elseif ($_GET['module'] == 'coba') {
                include "module/coba.php";
        }

         else{
          if ($akses==1 or $akses==2) {
            include "module/home/home_admin.php";
          }elseif ($akses==3 or $akses==4) {
            include "module/home/home_guru.php";
          }elseif ($akses==5) {
            include "module/home/home_siswa.php";
          }
                          
         }
        ?>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Sistem Pembinaan Karakter Siswa - SMK N 2 Depok Sleman &copy;2017
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- jQuery Validate-->
    <script src="assets/vendors/jquery.validate/jquery.validate.js"></script>
    <!-- Bootstrap -->
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="assets/vendors/bernii/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="assets/vendors/Flot/jquery.flot.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="assets/js/flot/jquery.flot.orderBars.js"></script>
    <script src="assets/js/flot/date.js"></script>
    <script src="assets/js/flot/jquery.flot.spline.js"></script>
    <script src="assets/js/flot/curvedLines.js"></script>
    <!-- jVectorMap -->
    <script src="assets/js/maps/jquery-jvectormap-2.0.3.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="assets/js/moment/moment.min.js"></script>
    <script src="assets/js/datepicker/daterangepicker.js"></script>

    <!-- bootstrap-wysiwyg -->
    <script src="assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="assets/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="assets/vendors/parsleyjs/dist/parsley.min.js"></script>
    <script src="assets/vendors/parsleyjs/dist/i18n/id.js"></script>
    <!-- Autosize -->
    <script src="assets/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="assets/vendors/starrr/dist/starrr.js"></script>
    <!-- validator -->
    <script src="assets/vendors/validator/validator.min.js"></script>

     <!-- Datatables -->
    <script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- morris.js -->
    <script src="assets/vendors/raphael/raphael.min.js"></script>
    <script src="assets/vendors/morris.js/morris.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="assets/build/js/custom.min.js"></script>


    <!-- Flot -->
    <script>
      $(document).ready(function() {
        var data1 = [
          [gd(2012, 1, 1), 17],
          [gd(2012, 1, 2), 74],
          [gd(2012, 1, 3), 6],
          [gd(2012, 1, 4), 39],
          [gd(2012, 1, 5), 20],
          [gd(2012, 1, 6), 85],
          [gd(2012, 1, 7), 7]
        ];

        var data2 = [
          [gd(2012, 1, 1), 82],
          [gd(2012, 1, 2), 23],
          [gd(2012, 1, 3), 66],
          [gd(2012, 1, 4), 9],
          [gd(2012, 1, 5), 119],
          [gd(2012, 1, 6), 6],
          [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
          data1, data2
        ], {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            shadowSize: 2
          },
          grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
          },
          colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
          xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 8,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        });

        function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }
      });
    </script>
    <!-- /Flot -->

    <!-- jVectorMap -->
    <script src="assets/js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/js/maps/jquery-jvectormap-us-aea-en.js"></script>
    <script src="assets/js/maps/gdp-data.js"></script>
    <script>
      $(document).ready(function(){
        $('#world-map-gdp').vectorMap({
          map: 'world_mill_en',
          backgroundColor: 'transparent',
          zoomOnScroll: false,
          series: {
            regions: [{
              values: gdpData,
              scale: ['#E6F2F0', '#149B7E'],
              normalizeFunction: 'polynomial'
            }]
          },
          onRegionTipShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
    <!-- /jVectorMap -->

    <!-- Skycons -->
    <script>
      $(document).ready(function() {
        var icons = new Skycons({
            "color": "#73879C"
          }),
          list = [
            "clear-day", "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
            "fog"
          ],
          i;

        for (i = list.length; i--;)
          icons.set(list[i], list[i]);

        icons.play();
      });
    </script>
    <!-- /Skycons -->

    <!-- Doughnut Chart -->
    <!--<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas1"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Symbian",
              "Blackberry",
              "Other",
              "Android",
              "IOS"
            ],
            datasets: [{
              data: [15, 20, 30, 10, 30],
              backgroundColor: [
                "#BDC3C7",
                "#9B59B6",
                "#E74C3C",
                "#26B99A",
                "#3498DB"
              ],
              hoverBackgroundColor: [
                "#CFD4D8",
                "#B370CF",
                "#E95E4F",
                "#36CAAB",
                "#49A9EA"
              ]
            }]
          },
          options: options
        });
      });
    </script>-->
    <!-- /Doughnut Chart -->
    
    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- gauge.js -->
    <!--<script>
      var opts = {
          lines: 12,
          angle: 0,
          lineWidth: 0.4,
          pointer: {
              length: 0.75,
              strokeWidth: 0.042,
              color: '#1D212A'
          },
          limitMax: 'false',
          colorStart: '#1ABC9C',
          colorStop: '#1ABC9C',
          strokeColor: '#F0F3F3',
          generateGradient: true
      };
      var target = document.getElementById('foo'),
          gauge = new Gauge(target).setOptions(opts);

      gauge.maxValue = 6000;
      gauge.animationSpeed = 32;
      gauge.set(3200);
      gauge.setTextField(document.getElementById("gauge-text"));
    </script>-->
    <!-- /gauge.js -->

    <!-- bootstrap-wysiwyg -->
    <script>
      $(document).ready(function() {
        function initToolbarBootstrapBindings() {
          var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
              'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
              'Times New Roman', 'Verdana'
            ],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
          $.each(fonts, function(idx, fontName) {
            fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
          });
          $('a[title]').tooltip({
            container: 'body'
          });
          $('.dropdown-menu input').click(function() {
              return false;
            })
            .change(function() {
              $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
            })
            .keydown('esc', function() {
              this.value = '';
              $(this).change();
            });

          $('[data-role=magic-overlay]').each(function() {
            var overlay = $(this),
              target = $(overlay.data('target'));
            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
          });

          if ("onwebkitspeechchange" in document.createElement("input")) {
            var editorOffset = $('#editor').offset();

            $('.voiceBtn').css('position', 'absolute').offset({
              top: editorOffset.top,
              left: editorOffset.left + $('#editor').innerWidth() - 35
            });
          } else {
            $('.voiceBtn').hide();
          }
        }

        function showErrorAlert(reason, detail) {
          var msg = '';
          if (reason === 'unsupported-file-type') {
            msg = "Unsupported format " + detail;
          } else {
            console.log("error uploading file", reason, detail);
          }
          $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
          fileUploadError: showErrorAlert
        });

        window.prettyPrint;
        prettyPrint();
      });
    </script>
    <!-- /bootstrap-wysiwyg -->

    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->

    <!-- jQuery Tags Input -->
    <script>
      function onAddTag(tag) {
        alert("Added a tag: " + tag);
      }

      function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
      }

      function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
      }

      $(document).ready(function() {
        $('#tags_1').tagsInput({
          width: 'auto'
        });
      });
    </script>
    <!-- /jQuery Tags Input -->

    <!-- Parsley -->
    <script>
      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form .btn').on('click', function() {
          $('#demo-form').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });

      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form2 .btn').on('click', function() {
          $('#demo-form2').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form2').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
      try {
        hljs.initHighlightingOnLoad();
      } catch (err) {}
    </script>
    <!-- /Parsley -->

    <!-- Autosize -->
    <script>
      $(document).ready(function() {
        autosize($('.resizable_textarea'));
      });
    </script>
    <!-- /Autosize -->

    <!-- jQuery autocomplete -->
    <script>
      $(document).ready(function() {
        <?php
        include "lib/koneksi.php";
        //get matched data from skills table
        $query = $connect->query("SELECT * FROM guru");
        ?>

        var countries ={
          <?php while($row=mysqli_fetch_array($query)){
            echo "$row[nip]".":\""."$row[nip]"." - "."$row[nama_guru]"."\",";
          } ?>
        };

        var countriesArray = $.map(countries, function(value, key) {
          return {
            value: value,
            data: key
          };
        });

        // initialize autocomplete with custom appendTo
        $('#autocomplete-custom-append').autocomplete({
          lookup: countriesArray,
          appendTo: '#autocomplete-container'
        });
      });
    </script>
    <!-- /jQuery autocomplete -->

    <!-- Autocomplete Ortu -->
    <script>
      $(document).ready(function() {
        <?php
        include "lib/koneksi.php";
        //get matched data from skills table
        $query = $connect->query("SELECT * FROM orang_tua");
        ?>

        var ortu ={
          <?php while($row=mysqli_fetch_array($query)){
            echo "$row[id_ortu]".":\""."$row[id_ortu]"." - "."$row[nama_ortu]"."\",";
          } ?>
        };

        var ortuArray = $.map(ortu, function(value, key) {
          return {
            value: value,
            data: key
          };
        });

        // initialize autocomplete with custom appendTo
        $('#autocomplete-ortu').autocomplete({
          lookup: ortuArray,
          appendTo: '#autocomplete-container'
        });
      });
    </script>
    <!-- /Autocomplete Ortu -->


    <!-- Autocomplete Siswa -->
    <script>
      $(document).ready(function() {
        <?php
        include "lib/koneksi.php";
        //get matched data from skills table
        $query = $connect->query("SELECT * FROM siswa");
        ?>

        var siswa ={
          <?php while($row=mysqli_fetch_array($query)){
            echo "$row[nis]".":\""."$row[nis]"." - "."$row[nama_siswa]"."\",";
          } ?>
        };

        var siswaArray = $.map(siswa, function(value, key) {
          return {
            value: value,
            data: key
          };
        });

        // initialize autocomplete with custom appendTo
        $('#autocomplete-siswa').autocomplete({
          lookup: siswaArray,
          appendTo: '#autocomplete-container'
        });
      });
    </script>
    <!-- /Autocomplete Siswa -->

    <!-- Autocomplete Pelanggaran -->
    <script>
      $(document).ready(function() {
        <?php
        include "lib/koneksi.php";
        //get matched data from skills table
        $query = $connect->query("SELECT * FROM pelanggaran JOIN sub_kat_pelanggaran ON pelanggaran.id_sub_kategori=sub_kat_pelanggaran.id_sub_kategori JOIN kat_pelanggaran ON sub_kat_pelanggaran.id_kat_pelanggaran=kat_pelanggaran.id_kat_pelanggaran");
        ?>

        var pelanggaran ={
          <?php while($row=mysqli_fetch_array($query)){
            echo "$row[id_pelanggaran]".":\""."$row[id_pelanggaran]"." - "."$row[nama_sub_kategori]"." - "."$row[nama_pelanggaran]"."\",";
          } ?>
        };

        var pelanggaranArray = $.map(pelanggaran, function(value, key) {
          return {
            value: value,
            data: key
          };
        });

        // initialize autocomplete with custom appendTo
        $('#autocomplete-pelanggaran').autocomplete({
          lookup: pelanggaranArray,
          appendTo: '#autocomplete-container'
        });
      });
    </script>
    <!-- Autocomplete Pelanggaran -->

    <!-- Autocomplete Prestasi -->
    <script>
      $(document).ready(function() {
        <?php
        include "lib/koneksi.php";
        //get matched data from skills table
        $query = $connect->query("SELECT id_prestasi, nama_prestasi FROM prestasi");
        ?>

        var prestasi ={
          <?php while($row=mysqli_fetch_array($query)){
            echo "$row[id_prestasi]".":\""."$row[id_prestasi]"." - "."$row[nama_prestasi]"."\",";
          } ?>
        };

        var prestasiArray = $.map(prestasi, function(value, key) {
          return {
            value: value,
            data: key
          };
        });

        // initialize autocomplete with custom appendTo
        $('#autocomplete-prestasi').autocomplete({
          lookup: prestasiArray,
          appendTo: '#autocomplete-container'
        });
      });
    </script>
    <!-- Autocomplete Prestasi -->


    <!-- Starrr -->
    <script>
      $(document).ready(function() {
        $(".stars").starrr();

        $('.stars-existing').starrr({
          rating: 4
        });

        $('.stars').on('starrr:change', function (e, value) {
          $('.stars-count').html(value);
        });

        $('.stars-existing').on('starrr:change', function (e, value) {
          $('.stars-count-existing').html(value);
        });
      });
    </script>
    <!-- /Starrr -->

    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->

        <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

    <!-- Select Kategori & Sub Kategori -->
    <script language='javascript'>
      function tampilSubKat()
      {
      <?php
        // membaca semua kategori
        $hasil = mysqli_query($connect,"SELECT * FROM kat_pelanggaran ORDER BY id_kat_pelanggaran ASC");

        // membuat if untuk masing-masing pilihan kategori beserta isi option untuk combobox kedua
        while ($data = mysqli_fetch_array($hasil))
        {
          $kat = $data['id_kat_pelanggaran'];

          // membuat IF untuk masing-masing kategori
          echo "if (document.getElementById(\"tambah_pelanggaran\").katPelanggaran.value == \"".$kat."\")";
          echo "{";

          // membuat option sub Kategori untuk masing-masing kategori
          $hasil2 = mysqli_query($connect,"SELECT * FROM sub_kat_pelanggaran WHERE id_kat_pelanggaran = '$kat' ORDER BY id_sub_kategori ASC");
          $content = "document.getElementById('subKatPelanggaran').innerHTML = \"";
          while ($data2 = mysqli_fetch_array($hasil2))
          {
            $content .= "<option value='".$data2['id_sub_kategori']."'>".$data2['nama_sub_kategori']."</option>";
          }

          $content .= "\"";
          echo $content;
          echo "}\n";

        }
      ?>
      }

    </script>
    <!-- Select Kategori & Sub Kategori -->

    <!-- morris.js -->
    <script>
      $(document).ready(function() {
        <?php
          $tahunAjaran1=mysqli_query($connect, "SELECT * FROM th_ajaran ORDER BY tahun_ajaran DESC limit 2, 1");
          $ta=mysqli_fetch_array($tahunAjaran1);
          $tahun=$ta['tahun_ajaran'];

          $plgJan=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=1 GROUP BY MONTH(tanggal)");
          $plgFeb=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=2 GROUP BY MONTH(tanggal)");
          $plgMar=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=3 GROUP BY MONTH(tanggal)");
          $plgApr=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=4 GROUP BY MONTH(tanggal)");
          $plgMei=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=5 GROUP BY MONTH(tanggal)");
          $plgJun=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=6 GROUP BY MONTH(tanggal)");
          $plgJul=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=7 GROUP BY MONTH(tanggal)");
          $plgAgu=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=8 GROUP BY MONTH(tanggal)");
          $plgSep=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=9 GROUP BY MONTH(tanggal)");
          $plgOkt=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=10 GROUP BY MONTH(tanggal)");
          $plgNov=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=11 GROUP BY MONTH(tanggal)");
          $plgDes=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=12 GROUP BY MONTH(tanggal)");

        ?>
        Morris.Bar({
          element: 'grafik_pelanggaran1',
          data: [
            
            {device: 'Juli', geekbench: <?php $plg7=mysqli_fetch_array($plgJul); if($plg7['jumlah_data']==""){echo "0";} else {echo $plg7['jumlah_data'];} ?>},
            {device: 'Agustus', geekbench: <?php $plg8=mysqli_fetch_array($plgAgu); if($plg8['jumlah_data']==""){echo "0";} else {echo $plg8['jumlah_data'];} ?>},
            {device: 'September', geekbench: <?php $plg9=mysqli_fetch_array($plgSep); if($plg9['jumlah_data']==""){echo "0";} else {echo $plg9['jumlah_data'];} ?>},
            {device: 'Oktober', geekbench: <?php $plg10=mysqli_fetch_array($plgOkt); if($plg10['jumlah_data']==""){echo "0";} else {echo $plg10['jumlah_data'];} ?>},
            {device: 'November', geekbench: <?php $plg11=mysqli_fetch_array($plgNov); if($plg11['jumlah_data']==""){echo "0";} else {echo $plg11['jumlah_data'];} ?>},
            {device: 'Desember', geekbench: <?php $plg12=mysqli_fetch_array($plgDes); if($plg12['jumlah_data']==""){echo "0";} else {echo $plg12['jumlah_data'];} ?>},
            {device: 'Januari', geekbench: <?php $plg1=mysqli_fetch_array($plgJan); if($plg1['jumlah_data']==""){echo "0";} else {echo $plg1['jumlah_data'];} ?>},
            {device: 'Februari', geekbench: <?php $plg2=mysqli_fetch_array($plgFeb); if($plg2['jumlah_data']==""){echo "0";} else {echo $plg2['jumlah_data'];} ?>},
            {device: 'Maret', geekbench: <?php $plg3=mysqli_fetch_array($plgMar); if($plg3['jumlah_data']==""){echo "0";} else {echo $plg3['jumlah_data'];} ?>},
            {device: 'April', geekbench: <?php $plg4=mysqli_fetch_array($plgApr); if($plg4['jumlah_data']==""){echo "0";} else {echo $plg4['jumlah_data'];} ?>},
            {device: 'Mei', geekbench: <?php $plg5=mysqli_fetch_array($plgMei); if($plg5['jumlah_data']==""){echo "0";} else {echo $plg5['jumlah_data'];} ?>},
            {device: 'Juni', geekbench: <?php $plg6=mysqli_fetch_array($plgJun); if($plg6['jumlah_data']==""){echo "0";} else {echo $plg6['jumlah_data'];} ?>}
          ],
          xkey: 'device',
          ykeys: ['geekbench'],
          labels: ['Angka Pelanggaran'],
          barRatio: 0.4,
          barColors: ['#da3131', '#34495E', '#ACADAC', '#3498DB'],
          xLabelAngle: 68,
          hideHover: 'auto',
          resize: true
        });

        <?php
          $presJan=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=1 GROUP BY MONTH(tanggal)");
          $presFeb=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=2 GROUP BY MONTH(tanggal)");
          $presMar=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=3 GROUP BY MONTH(tanggal)");
          $presApr=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=4 GROUP BY MONTH(tanggal)");
          $presMei=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=5 GROUP BY MONTH(tanggal)");
          $presJun=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=6 GROUP BY MONTH(tanggal)");
          $presJul=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=7 GROUP BY MONTH(tanggal)");
          $presAgu=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=8 GROUP BY MONTH(tanggal)");
          $presSep=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=9 GROUP BY MONTH(tanggal)");
          $presOkt=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=10 GROUP BY MONTH(tanggal)");
          $presNov=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=11 GROUP BY MONTH(tanggal)");
          $presDes=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=12 GROUP BY MONTH(tanggal)");

        ?>
        Morris.Bar({
          element: 'grafik_prestasi1',
          data: [
            
            {device: 'Juli', geekbench: <?php $pres7=mysqli_fetch_array($presJul); if($pres7['jumlah_data']==""){echo "0";} else {echo $pres7['jumlah_data'];} ?>},
            {device: 'Agustus', geekbench: <?php $pres8=mysqli_fetch_array($presAgu); if($pres8['jumlah_data']==""){echo "0";} else {echo $pres8['jumlah_data'];} ?>},
            {device: 'September', geekbench: <?php $pres9=mysqli_fetch_array($presSep); if($pres9['jumlah_data']==""){echo "0";} else {echo $pres9['jumlah_data'];} ?>},
            {device: 'Oktober', geekbench: <?php $pres10=mysqli_fetch_array($presOkt); if($pres10['jumlah_data']==""){echo "0";} else {echo $pres10['jumlah_data'];} ?>},
            {device: 'November', geekbench: <?php $pres11=mysqli_fetch_array($presNov); if($pres11['jumlah_data']==""){echo "0";} else {echo $pres11['jumlah_data'];} ?>},
            {device: 'Desember', geekbench: <?php $pres12=mysqli_fetch_array($presDes); if($pres12['jumlah_data']==""){echo "0";} else {echo $pres12['jumlah_data'];} ?>},
            {device: 'Januari', geekbench: <?php $pres1=mysqli_fetch_array($presJan); if($pres1['jumlah_data']==""){echo "0";} else {echo $pres1['jumlah_data'];} ?>},
            {device: 'Februari', geekbench: <?php $pres2=mysqli_fetch_array($presFeb); if($pres2['jumlah_data']==""){echo "0";} else {echo $pres2['jumlah_data'];} ?>},
            {device: 'Maret', geekbench: <?php $pres3=mysqli_fetch_array($presMar); if($pres3['jumlah_data']==""){echo "0";} else {echo $pres3['jumlah_data'];} ?>},
            {device: 'April', geekbench: <?php $pres4=mysqli_fetch_array($presApr); if($pres4['jumlah_data']==""){echo "0";} else {echo $pres4['jumlah_data'];} ?>},
            {device: 'Mei', geekbench: <?php $pres5=mysqli_fetch_array($presMei); if($pres5['jumlah_data']==""){echo "0";} else {echo $pres5['jumlah_data'];} ?>},
            {device: 'Juni', geekbench: <?php $pres6=mysqli_fetch_array($presJun); if($pres6['jumlah_data']==""){echo "0";} else {echo $pres6['jumlah_data'];} ?>}
          ],
          xkey: 'device',
          ykeys: ['geekbench'],
          labels: ['Angka Prestasi'],
          barRatio: 0.4,
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          xLabelAngle: 68,
          hideHover: 'auto',
          resize: true
        });

        /* Grafik tengah */
        <?php
          $tahunAjaran2=mysqli_query($connect, "SELECT * FROM th_ajaran ORDER BY tahun_ajaran DESC limit 1, 1");
          $ta2=mysqli_fetch_array($tahunAjaran2);
          $tahun2=$ta2['tahun_ajaran'];

          $plgJan2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=1 GROUP BY MONTH(tanggal)");
          $plgFeb2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=2 GROUP BY MONTH(tanggal)");
          $plgMar2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=3 GROUP BY MONTH(tanggal)");
          $plgApr2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=4 GROUP BY MONTH(tanggal)");
          $plgMei2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=5 GROUP BY MONTH(tanggal)");
          $plgJun2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=6 GROUP BY MONTH(tanggal)");
          $plgJul2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=7 GROUP BY MONTH(tanggal)");
          $plgAgu2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=8 GROUP BY MONTH(tanggal)");
          $plgSep2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=9 GROUP BY MONTH(tanggal)");
          $plgOkt2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=10 GROUP BY MONTH(tanggal)");
          $plgNov2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=11 GROUP BY MONTH(tanggal)");
          $plgDes2=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=12 GROUP BY MONTH(tanggal)");

        ?>
        Morris.Bar({
          element: 'grafik_pelanggaran2',
          data: [
            
            {device: 'Juli', geekbench: <?php $plg72=mysqli_fetch_array($plgJul2); if($plg72['jumlah_data']==""){echo "0";} else {echo $plg72['jumlah_data'];} ?>},
            {device: 'Agustus', geekbench: <?php $plg82=mysqli_fetch_array($plgAgu2); if($plg82['jumlah_data']==""){echo "0";} else {echo $plg82['jumlah_data'];} ?>},
            {device: 'September', geekbench: <?php $plg92=mysqli_fetch_array($plgSep2); if($plg92['jumlah_data']==""){echo "0";} else {echo $plg92['jumlah_data'];} ?>},
            {device: 'Oktober', geekbench: <?php $plg102=mysqli_fetch_array($plgOkt2); if($plg102['jumlah_data']==""){echo "0";} else {echo $plg102['jumlah_data'];} ?>},
            {device: 'November', geekbench: <?php $plg112=mysqli_fetch_array($plgNov2); if($plg112['jumlah_data']==""){echo "0";} else {echo $plg112['jumlah_data'];} ?>},
            {device: 'Desember', geekbench: <?php $plg122=mysqli_fetch_array($plgDes2); if($plg122['jumlah_data']==""){echo "0";} else {echo $plg122['jumlah_data'];} ?>},
            {device: 'Januari', geekbench: <?php $plg12=mysqli_fetch_array($plgJan2); if($plg12['jumlah_data']==""){echo "0";} else {echo $plg12['jumlah_data'];} ?>},
            {device: 'Februari', geekbench: <?php $plg22=mysqli_fetch_array($plgFeb2); if($plg22['jumlah_data']==""){echo "0";} else {echo $plg22['jumlah_data'];} ?>},
            {device: 'Maret', geekbench: <?php $plg32=mysqli_fetch_array($plgMar2); if($plg32['jumlah_data']==""){echo "0";} else {echo $plg32['jumlah_data'];} ?>},
            {device: 'April', geekbench: <?php $plg42=mysqli_fetch_array($plgApr2); if($plg42['jumlah_data']==""){echo "0";} else {echo $plg42['jumlah_data'];} ?>},
            {device: 'Mei', geekbench: <?php $plg52=mysqli_fetch_array($plgMei2); if($plg52['jumlah_data']==""){echo "0";} else {echo $plg52['jumlah_data'];} ?>},
            {device: 'Juni', geekbench: <?php $plg62=mysqli_fetch_array($plgJun2); if($plg62['jumlah_data']==""){echo "0";} else {echo $plg62['jumlah_data'];} ?>}
          ],
          xkey: 'device',
          ykeys: ['geekbench'],
          labels: ['Angka Pelanggaran'],
          barRatio: 0.4,
          barColors: ['#da3131', '#34495E', '#ACADAC', '#3498DB'],
          xLabelAngle: 65,
          hideHover: 'auto',
          resize: true
        });

        <?php
          $presJan2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=1 GROUP BY MONTH(tanggal)");
          $presFeb2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=2 GROUP BY MONTH(tanggal)");
          $presMar2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=3 GROUP BY MONTH(tanggal)");
          $presApr2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun' AND MONTH(tanggal)=4 GROUP BY MONTH(tanggal)");
          $presMei2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=5 GROUP BY MONTH(tanggal)");
          $presJun2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=6 GROUP BY MONTH(tanggal)");
          $presJul2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=7 GROUP BY MONTH(tanggal)");
          $presAgu2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=8 GROUP BY MONTH(tanggal)");
          $presSep2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=9 GROUP BY MONTH(tanggal)");
          $presOkt2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=10 GROUP BY MONTH(tanggal)");
          $presNov2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=11 GROUP BY MONTH(tanggal)");
          $presDes2=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun2' AND MONTH(tanggal)=12 GROUP BY MONTH(tanggal)");

        ?>
        Morris.Bar({
          element: 'grafik_prestasi2',
          data: [
            
            {device: 'Juli', geekbench: <?php $pres72=mysqli_fetch_array($presJul2); if($pres72['jumlah_data']==""){echo "0";} else {echo $pres72['jumlah_data'];} ?>},
            {device: 'Agustus', geekbench: <?php $pres82=mysqli_fetch_array($presAgu2); if($pres82['jumlah_data']==""){echo "0";} else {echo $pres82['jumlah_data'];} ?>},
            {device: 'September', geekbench: <?php $pres92=mysqli_fetch_array($presSep2); if($pres92['jumlah_data']==""){echo "0";} else {echo $pres92['jumlah_data'];} ?>},
            {device: 'Oktober', geekbench: <?php $pres102=mysqli_fetch_array($presOkt2); if($pres102['jumlah_data']==""){echo "0";} else {echo $pres102['jumlah_data'];} ?>},
            {device: 'November', geekbench: <?php $pres112=mysqli_fetch_array($presNov2); if($pres112['jumlah_data']==""){echo "0";} else {echo $pres112['jumlah_data'];} ?>},
            {device: 'Desember', geekbench: <?php $pres122=mysqli_fetch_array($presDes2); if($pres122['jumlah_data']==""){echo "0";} else {echo $pres122['jumlah_data'];} ?>},
            {device: 'Januari', geekbench: <?php $pres12=mysqli_fetch_array($presJan2); if($pres12['jumlah_data']==""){echo "0";} else {echo $pres12['jumlah_data'];} ?>},
            {device: 'Februari', geekbench: <?php $pres22=mysqli_fetch_array($presFeb2); if($pres22['jumlah_data']==""){echo "0";} else {echo $pres22['jumlah_data'];} ?>},
            {device: 'Maret', geekbench: <?php $pres32=mysqli_fetch_array($presMar2); if($pres32['jumlah_data']==""){echo "0";} else {echo $pres32['jumlah_data'];} ?>},
            {device: 'April', geekbench: <?php $pres42=mysqli_fetch_array($presApr2); if($pres42['jumlah_data']==""){echo "0";} else {echo $pres42['jumlah_data'];} ?>},
            {device: 'Mei', geekbench: <?php $pres52=mysqli_fetch_array($presMei2); if($pres52['jumlah_data']==""){echo "0";} else {echo $pres52['jumlah_data'];} ?>},
            {device: 'Juni', geekbench: <?php $pres62=mysqli_fetch_array($presJun2); if($pres62['jumlah_data']==""){echo "0";} else {echo $pres62['jumlah_data'];} ?>}
          ],
          xkey: 'device',
          ykeys: ['geekbench'],
          labels: ['Angka Prestasi'],
          barRatio: 0.4,
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          xLabelAngle: 65,
          hideHover: 'auto',
          resize: true
        });
        /* Penutup Grafik tengah */

        /* Grafik Kanan */
        <?php
          $tahunAjaran3=mysqli_query($connect, "SELECT * FROM th_ajaran ORDER BY tahun_ajaran DESC limit 0, 1");
          $ta3=mysqli_fetch_array($tahunAjaran3);
          $tahun3=$ta3['tahun_ajaran'];

          $plgJan3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=1 GROUP BY MONTH(tanggal)");
          $plgFeb3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=2 GROUP BY MONTH(tanggal)");
          $plgMar3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=3 GROUP BY MONTH(tanggal)");
          $plgApr3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=4 GROUP BY MONTH(tanggal)");
          $plgMei3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=5 GROUP BY MONTH(tanggal)");
          $plgJun3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=6 GROUP BY MONTH(tanggal)");
          $plgJul3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=7 GROUP BY MONTH(tanggal)");
          $plgAgu3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=8 GROUP BY MONTH(tanggal)");
          $plgSep3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=9 GROUP BY MONTH(tanggal)");
          $plgOkt3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=10 GROUP BY MONTH(tanggal)");
          $plgNov3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=11 GROUP BY MONTH(tanggal)");
          $plgDes3=mysqli_query($connect, "SELECT COUNT(id_pelanggaran) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=12 GROUP BY MONTH(tanggal)");

        ?>
        Morris.Bar({
          element: 'grafik_pelanggaran3',
          data: [
            
            {device: 'Juli', geekbench: <?php $plg73=mysqli_fetch_array($plgJul3); if($plg73['jumlah_data']==""){echo "0";} else {echo $plg73['jumlah_data'];} ?>},
            {device: 'Agustus', geekbench: <?php $plg83=mysqli_fetch_array($plgAgu3); if($plg83['jumlah_data']==""){echo "0";} else {echo $plg83['jumlah_data'];} ?>},
            {device: 'September', geekbench: <?php $plg93=mysqli_fetch_array($plgSep3); if($plg93['jumlah_data']==""){echo "0";} else {echo $plg93['jumlah_data'];} ?>},
            {device: 'Oktober', geekbench: <?php $plg103=mysqli_fetch_array($plgOkt3); if($plg103['jumlah_data']==""){echo "0";} else {echo $plg103['jumlah_data'];} ?>},
            {device: 'November', geekbench: <?php $plg113=mysqli_fetch_array($plgNov3); if($plg113['jumlah_data']==""){echo "0";} else {echo $plg113['jumlah_data'];} ?>},
            {device: 'Desember', geekbench: <?php $plg123=mysqli_fetch_array($plgDes3); if($plg123['jumlah_data']==""){echo "0";} else {echo $plg123['jumlah_data'];} ?>},
            {device: 'Januari', geekbench: <?php $plg13=mysqli_fetch_array($plgJan3); if($plg13['jumlah_data']==""){echo "0";} else {echo $plg13['jumlah_data'];} ?>},
            {device: 'Februari', geekbench: <?php $plg23=mysqli_fetch_array($plgFeb3); if($plg23['jumlah_data']==""){echo "0";} else {echo $plg23['jumlah_data'];} ?>},
            {device: 'Maret', geekbench: <?php $plg33=mysqli_fetch_array($plgMar3); if($plg33['jumlah_data']==""){echo "0";} else {echo $plg33['jumlah_data'];} ?>},
            {device: 'April', geekbench: <?php $plg43=mysqli_fetch_array($plgApr3); if($plg43['jumlah_data']==""){echo "0";} else {echo $plg43['jumlah_data'];} ?>},
            {device: 'Mei', geekbench: <?php $plg53=mysqli_fetch_array($plgMei3); if($plg53['jumlah_data']==""){echo "0";} else {echo $plg53['jumlah_data'];} ?>},
            {device: 'Juni', geekbench: <?php $plg63=mysqli_fetch_array($plgJun3); if($plg63['jumlah_data']==""){echo "0";} else {echo $plg63['jumlah_data'];} ?>}
          ],
          xkey: 'device',
          ykeys: ['geekbench'],
          labels: ['Angka Pelanggaran'],
          barRatio: 0.4,
          barColors: ['#da3131', '#34495E', '#ACADAC', '#3498DB'],
          xLabelAngle: 68,
          hideHover: 'auto',
          resize: true
        });

        <?php
          $presJan3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=1 GROUP BY MONTH(tanggal)");
          $presFeb3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=2 GROUP BY MONTH(tanggal)");
          $presMar3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=3 GROUP BY MONTH(tanggal)");
          $presApr3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=4 GROUP BY MONTH(tanggal)");
          $presMei3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=5 GROUP BY MONTH(tanggal)");
          $presJun3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=6 GROUP BY MONTH(tanggal)");
          $presJul3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=7 GROUP BY MONTH(tanggal)");
          $presAgu3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=8 GROUP BY MONTH(tanggal)");
          $presSep3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=9 GROUP BY MONTH(tanggal)");
          $presOkt3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=10 GROUP BY MONTH(tanggal)");
          $presNov3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=11 GROUP BY MONTH(tanggal)");
          $presDes3=mysqli_query($connect, "SELECT COUNT(id_prestasi) AS jumlah_data FROM detail_poin WHERE tahun_ajaran='$tahun3' AND MONTH(tanggal)=12 GROUP BY MONTH(tanggal)");

        ?>
        Morris.Bar({
          element: 'grafik_prestasi3',
          data: [
            
            {device: 'Juli', geekbench: <?php $pres73=mysqli_fetch_array($presJul3); if($pres73['jumlah_data']==""){echo "0";} else {echo $pres73['jumlah_data'];} ?>},
            {device: 'Agustus', geekbench: <?php $pres83=mysqli_fetch_array($presAgu3); if($pres83['jumlah_data']==""){echo "0";} else {echo $pres83['jumlah_data'];} ?>},
            {device: 'September', geekbench: <?php $pres93=mysqli_fetch_array($presSep3); if($pres93['jumlah_data']==""){echo "0";} else {echo $pres93['jumlah_data'];} ?>},
            {device: 'Oktober', geekbench: <?php $pres103=mysqli_fetch_array($presOkt3); if($pres103['jumlah_data']==""){echo "0";} else {echo $pres103['jumlah_data'];} ?>},
            {device: 'November', geekbench: <?php $pres113=mysqli_fetch_array($presNov3); if($pres113['jumlah_data']==""){echo "0";} else {echo $pres113['jumlah_data'];} ?>},
            {device: 'Desember', geekbench: <?php $pres123=mysqli_fetch_array($presDes3); if($pres123['jumlah_data']==""){echo "0";} else {echo $pres123['jumlah_data'];} ?>},
            {device: 'Januari', geekbench: <?php $pres13=mysqli_fetch_array($presJan3); if($pres13['jumlah_data']==""){echo "0";} else {echo $pres13['jumlah_data'];} ?>},
            {device: 'Februari', geekbench: <?php $pres23=mysqli_fetch_array($presFeb3); if($pres23['jumlah_data']==""){echo "0";} else {echo $pres23['jumlah_data'];} ?>},
            {device: 'Maret', geekbench: <?php $pres33=mysqli_fetch_array($presMar3); if($pres33['jumlah_data']==""){echo "0";} else {echo $pres33['jumlah_data'];} ?>},
            {device: 'April', geekbench: <?php $pres43=mysqli_fetch_array($presApr3); if($pres43['jumlah_data']==""){echo "0";} else {echo $pres43['jumlah_data'];} ?>},
            {device: 'Mei', geekbench: <?php $pres53=mysqli_fetch_array($presMei3); if($pres53['jumlah_data']==""){echo "0";} else {echo $pres53['jumlah_data'];} ?>},
            {device: 'Juni', geekbench: <?php $pres63=mysqli_fetch_array($presJun3); if($pres63['jumlah_data']==""){echo "0";} else {echo $pres63['jumlah_data'];} ?>}
          ],
          xkey: 'device',
          ykeys: ['geekbench'],
          labels: ['Angka Prestasi'],
          barRatio: 0.4,
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          xLabelAngle: 68,
          hideHover: 'auto',
          resize: true
        });
        /* Penutup Grafik Kanan */





        Morris.Bar({
          element: 'graph_bar_group',
          data: [
            {"period": "2016-10-01", "licensed": 807, "sorned": 660},
            {"period": "2016-09-30", "licensed": 1251, "sorned": 729},
            {"period": "2016-09-29", "licensed": 1769, "sorned": 1018},
            {"period": "2016-09-20", "licensed": 2246, "sorned": 1461},
            {"period": "2016-09-19", "licensed": 2657, "sorned": 1967},
            {"period": "2016-09-18", "licensed": 3148, "sorned": 2627},
            {"period": "2016-09-17", "licensed": 3471, "sorned": 3740},
            {"period": "2016-09-16", "licensed": 2871, "sorned": 2216},
            {"period": "2016-09-15", "licensed": 2401, "sorned": 1656},
            {"period": "2016-09-10", "licensed": 2115, "sorned": 1022}
          ],
          xkey: 'period',
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          ykeys: ['licensed', 'sorned'],
          labels: ['Licensed', 'SORN'],
          hideHover: 'auto',
          xLabelAngle: 60,
          resize: true
        });

        Morris.Bar({
          element: 'graphx',
          data: [
            {x: '2015 Q1', y: 2, z: 3, a: 4},
            {x: '2015 Q2', y: 3, z: 5, a: 6},
            {x: '2015 Q3', y: 4, z: 3, a: 2},
            {x: '2015 Q4', y: 2, z: 4, a: 5}
          ],
          xkey: 'x',
          ykeys: ['y', 'z', 'a'],
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          hideHover: 'auto',
          labels: ['Y', 'Z', 'A'],
          resize: true
        }).on('click', function (i, row) {
            console.log(i, row);
        });

        Morris.Area({
          element: 'graph_area',
          data: [
            {period: '2014 Q1', iphone: 2666, ipad: null, itouch: 2647},
            {period: '2014 Q2', iphone: 2778, ipad: 2294, itouch: 2441},
            {period: '2014 Q3', iphone: 4912, ipad: 1969, itouch: 2501},
            {period: '2014 Q4', iphone: 3767, ipad: 3597, itouch: 5689},
            {period: '2015 Q1', iphone: 6810, ipad: 1914, itouch: 2293},
            {period: '2015 Q2', iphone: 5670, ipad: 4293, itouch: 1881},
            {period: '2015 Q3', iphone: 4820, ipad: 3795, itouch: 1588},
            {period: '2015 Q4', iphone: 15073, ipad: 5967, itouch: 5175},
            {period: '2016 Q1', iphone: 10687, ipad: 4460, itouch: 2028},
            {period: '2016 Q2', iphone: 8432, ipad: 5713, itouch: 1791}
          ],
          xkey: 'period',
          ykeys: ['iphone', 'ipad', 'itouch'],
          lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          labels: ['iPhone', 'iPad', 'iPod Touch'],
          pointSize: 2,
          hideHover: 'auto',
          resize: true
        });

        Morris.Donut({
          element: 'graph_donut',
          data: [
            {label: 'Jam', value: 25},
            {label: 'Frosted', value: 40},
            {label: 'Custard', value: 25},
            {label: 'Sugar', value: 10}
          ],
          colors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          formatter: function (y) {
            return y + "%";
          },
          resize: true
        });

        Morris.Line({
          element: 'graph_line',
          xkey: 'year',
          ykeys: ['value'],
          labels: ['Value'],
          hideHover: 'auto',
          lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          data: [
            {year: '2012', value: 20},
            {year: '2013', value: 10},
            {year: '2014', value: 5},
            {year: '2015', value: 5},
            {year: '2016', value: 20}
          ],
          resize: true
        });

        $MENU_TOGGLE.on('click', function() {
          $(window).resize();
        });
      });
    </script>
    <!-- /morris.js -->

    <!-- Input hanya huruf dan spasi -->
    <script language='javascript'>
      $(document).ready(function(){
       $('form').parsley();
      });
    </script>
    <!-- /Input hanya huruf dan spasi -->


  </body>
</html>
<?php } ?>