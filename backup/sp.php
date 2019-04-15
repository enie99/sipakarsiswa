<?php
include "../../lib/config.php";

 // Define relative path from this script to mPDF
 $nama_dokumen='Surat Peringatan'; //Beri nama file PDF hasil.
define('_MPDF_PATH','MPDF57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>

<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 14 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:0cm;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-link:"Header Char";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-link:"Footer Char";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
span.HeaderChar
	{mso-style-name:"Header Char";
	mso-style-link:Header;}
span.FooterChar
	{mso-style-name:"Footer Char";
	mso-style-link:Footer;}
.MsoChpDefault
	{font-family:"Calibri","sans-serif";}
.MsoPapDefault
	{margin-bottom:10.0pt;
	line-height:115%;}
 /* Page Definitions */
 @page WordSection1
	{size:595.3pt 841.9pt;
	margin:72.0pt 72.0pt 72.0pt 72.0pt;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

</head>

<body lang=IN>

<div class=WordSection1>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;font-family:"Times New Roman","serif"'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;font-family:"Times New Roman","serif"'>Nomor  
:</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;font-family:"Times New Roman","serif"'>Lamp.   
:</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;font-family:"Times New Roman","serif"'>Hal         :
Surat Peringatan dan Pemanggilan</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;font-family:"Times New Roman","serif"'>               
Orang Tua Murid</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;font-family:"Times New Roman","serif"'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:12.0pt;font-family:"Times New Roman","serif"'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>Yth.
Bapak/Ibu Wali Murid </span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>Dengan
hormat,</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>Bersama
surat ini, kami pihak sekolah mengharap kehadiran Bapak/Ibu Wali Murid dari:</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>      
   Nama           : </span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>         
Kelas           :</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>Untuk
menemui wali kelas dan guru BK, pada waktu sebagai berikut:</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>         
Hari/tanggal :</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>         
Waktu          :</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>         
Tempat        :</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>Demikian
surat ini kami sampaikan. Atas perhatiannya kami sampaikan terima kasih.</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>Hormat
kami,</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>Kepala
Sekolah</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>&nbsp;</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>Drs.
Aragani Mizan Zakaria, M.Pd.</span></p>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
150%'><span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman","serif"'>NIP.
19630203 198803 1 010            </span></p>

</div>

</body>

</html>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>