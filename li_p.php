<?php
session_start();
include("../../common.php");
include("../../config-inc.php");
require_once("../dompdf_config.inc.php");
	
$data_reg=mysql_query("select * from online_app_zp_f_ttb ORDER BY r_no ASC LIMIT 130 , 20 ");

$var='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
p.MsoNormal {
margin-top:0in;
margin-right:0in;
margin-bottom:10.0pt;
margin-left:0in;
line-height:115%;
font-size:11.0pt;
font-family:"Calibri","sans-serif";
}
-->
</style>
</head>

<body>';
while($data=mysql_fetch_array($data_reg)){
$var.='<table align="center" width="500"><tr><td>
<p class="MsoNormal" align="center" style="margin-bottom:.0001pt;text-align:center;line-height:normal;"><strong><span style="font-family:Cambria,serif; font-size:14.0pt; ">DISTRICT LEVEL SELECTION  COMMITTEE</span></strong></p>
<p class="MsoNormal" align="center" style="margin-bottom:.0001pt;text-align:center;line-height:normal;"><strong><span style="font-family:Cambria,serif; ">NORTH 24 PARGANAS, BARASAT</span></strong><strong><u><span style="font-family:Cambria,serif; font-size:14.0pt; "> </span></u></strong></p>
<p class="MsoNormal"><span style="line-height:115%; font-family:Cambria,serif; font-size:12.0pt; ">&nbsp;</span></p>
<p class="MsoNormal"> <span style="font-family:Cambria,serif; font-size:12.0pt; "><table width="100%"><tr><td align="left"> No. <b>1111(145)/DPO.XIX</b></td><td align="right">Date: <b>22/07/2013</b></td></tr></table></span></p>
<p class="MsoNormal" style="margin-bottom:.0001pt;"><strong><span style="font-family:Cambria,serif; ">&nbsp;</span></strong></p>
<p class="MsoNormal" style="margin-bottom:.0001pt;"><span style="font-family:Cambria,serif; font-size:12.0pt; ">To,<br><br></span></p>
<p class="MsoNormal" style="margin-bottom:.0001pt;"><span style="font-family:Cambria,serif; font-size:12.0pt; ">Sri/Smt.&nbsp;<b>'.$data['cand_nm'].'</b><br />
S/D/W of&nbsp;<b>'.$data['cand_fh_nm'].'</b></span></p>
<p class="MsoNormal" style="margin-bottom:.0001pt; "><span style="font-family:Cambria,serif; font-size:12.0pt; ">';
if($data['cand_p_add']!=''){$var.=$data['cand_p_add'];}
if(strlen($data['cand_p_add'])+strlen($data['cand_p_block'])>50){
	$var.='<br>';
}else{
	$var.=', ';
}
	if($data['cand_p_block']!=''){$var.=$data['cand_p_block'];}
$var.='</span></p>
<p class="MsoNormal" style="margin-bottom:.0001pt;"><span style="font-family:Cambria,serif; font-size:12.0pt; ">';
	if($data['cand_p_po']!=''){$var.='PO - '.$data['cand_p_po'];}
	if($data['cand_p_ps']!=''){$var.=', PS - '.$data['cand_p_ps'];}
	if($data['cand_p_pin']!=0){$var.=', PIN - '.$data['cand_p_pin'];}
$var.='</span></p>
<p class="MsoNormal" style="margin-bottom:.0001pt;"><span style="font-family:Cambria,serif; font-size:12.0pt; ">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom:.0001pt;"><span style="font-family:Cambria,serif; font-size:12.0pt; ">ROLL NO :&nbsp;<u>'.$data['r_no'].'</u></span></p><br /><br />
<p class="MsoNormal" align="center" style="margin-bottom:.0001pt;text-align:center;"><strong><em><u><span style="font-family:Cambria,serif; font-size:12.0pt; ">Sub:  Letter of intimation<br><br></span></u></em></strong></p>
<p class="MsoNormal" style="margin-bottom:.0001pt;"><span style="font-family:Cambria,serif; ">&nbsp;</span></p>
<p class="MsoNormal" style="text-align:justify;line-height:150%;"><span style="line-height:150%; font-family:Cambria,serif; font-size:12.0pt; ">You  have been selected for appointment to the post of&nbsp;<u>';
					if($data["cand_post"]=="post1"){$var.="EXECUTIVE ASSISTANT";}
					if($data["cand_post"]=="post2"){$var.="NIRMAN SAHAYAK";}
					if($data["cand_post"]=="post3"){$var.="SAHAYAK";}
					if($data["cand_post"]=="post4"){$var.="BLOCK INFORMATICS OFFICER";}
					if($data["cand_post"]=="post5"){$var.="ACCOUNT CLERK(PS)";}
					if($data["cand_post"]=="post6"){$var.="CLERK-CUM-TYPIST(PS)";}
					if($data["cand_post"]=="post7"){$var.="DATA ENTRY OPERATOR(PS)";}
					if($data["cand_post"]=="post8"){$var.="SAMITI EDUCATION OFFICER";}
					if($data["cand_post"]=="post9"){$var.="GRAM PANCHAYAT SECRETARY";}
$var.='</u>  under this District as per panel already published on 15<sup>th</sup> May 2013.</span></p>
<p class="MsoNormal" style="text-align:justify;line-height:150%;"><span style="font-family:Cambria,serif; font-size:12.0pt; ">You are  requested to download the blank PVR Form from the district website  (www.north24parganas.gov.in) and submit the duly filled in form to the office  of the District Panchayat and Rural Development Officer, 2<sup>nd</sup> Floor,  Zilla Parishad Bhavan, Barasat, North 24 Parganas on any working day between 11  am to 3 pm by 16<sup>th</sup> August 2013. </span></p>
<p class="MsoNormal" style="margin-bottom:.0001pt;text-align:justify;"><span style="font-family:Cambria,serif; ">&nbsp;</span></p>
<p class="MsoNormal" align="center" style="margin-bottom:.0001pt;text-align:center;text-indent:269.35pt;"><img width="102" height="88" src="clip_image.jpg" alt="" /></p>
<p class="MsoNormal" align="center" style="margin-bottom:.0001pt;text-align:center;text-indent:269.35pt;"><strong><span style="font-family:Cambria,serif; ">Chairman DLSC</span></strong></p>
<p class="MsoNormal" align="center" style="margin-bottom:.0001pt;text-align:center;text-indent:269.35pt;"><strong><span style="font-family:Cambria,serif; ">&amp;</span></strong></p>
<p class="MsoNormal" align="center" style="margin-bottom:.0001pt;text-align:center;text-indent:269.35pt;"><strong><span style="font-family:Cambria,serif; ">District Magistrate</span></strong></p>
<p class="MsoNormal" align="center" style="margin-bottom:.0001pt;text-align:center;text-indent:269.35pt;"><strong><span style="font-family:Cambria,serif; ">North 24 Parganas</span></strong></p>
<p class="MsoNormal" style="margin-bottom:.0001pt;text-align:justify;"><span style="font-family:Cambria,serif; ">&nbsp;</span></p>
</td></tr></table>';}
$var.='</body>
</html>';

  $dompdf = new DOMPDF();
  $dompdf->load_html($var);
  $dompdf->set_paper('a4', 'portrait');
  $dompdf->render();
  $dompdf->stream(" Letter_intimation.pdf", array("Attachment" => false));
  exit(0);
// echo $var;
  mysql_close($link);
?>	