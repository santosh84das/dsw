<?php
session_start();
include("../../common.php");
include("../../config-inc.php");
include("script.php");
    

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>North24Parganas ::Online Application</title>

<meta name="keywords" content="Home,About District,Demography,Folk Culture,Map Gallery,Photo Gallery,History & Heritage,Collectorate,Group-C Establishment,Gazetted Officers Cell,Nezarath,Election,Judicial Munshikhana,Motor Vehicle,N V F,Revenue Munshikhana,Land & Land Reforms,Land Acquisition,Planning & Development,Panchayat & Rural Dev.,ICDS,Backward Class Welfare,SC & ST Fin. Corp.,Civil Defence,Municipal Affairs,SHG & SE,Refugee Rehabilitation,District Municipal Affairs,Projects,Sarba Siksha Mission,SSK & MSK,MP Local Area Dev. Scheme,Total Sanitation Campain,Tender & Notice,Recruitments,Contacts,DM, ADMS & SDOs,Dist. HQ & Sub-Divisions,Block & Panchayat Samities,Gram Panchayats,Municipalities,Police,MPs & MLAs,Important Links,Air India,Banglar Mukh,india.gov.in,Indian Rail,Zilla Parishad,MGNREGA,DRDC,Barrackpore Sub Division,RTI,North 24 Parganas Police,Public Grievance,Police Verification(GOI),G2C Services,G2G Services,Pay Vehicle Tax">

<meta name="description" content="Information pertaining to various departments are put in the district website north24parganas.gov.in, Overview of some Information available on web site: About district (Demography, folk culture, map gallery, photo gallery, history and heritage), Various departments of the Collectorate (Election, Motor vehicles, Land Acquisition, Backward class welfare, Projects (Sarva Siksha Mission, Total Sanitaion Campaign), Contact information (DM, ADMs, SDOs, Block and Panchayat Samities, Gram Panchayats, Police, MP ,MLAs), Citizen Centric  parts such as Police Verification , Public Grievances are also available in the site.">

<link rel="shortcut icon" href="<?php echo URL;?>images/si.png" />
<link rel="stylesheet" type="text/css" href="../../css/style_n24p.css" />
<link rel="stylesheet" type="text/css" href="../../css/<?php echo $_SESSION['thm_id'];?>_theme.css" />
<link rel="stylesheet" type="text/css" href="../../ddlevelsmenu-base_<?php echo $_SESSION['thm_id'];?>.css" />
<style type="text/css">
<!--
.stylex {font-size: 9px}
.stylevr {
	font-size: 18px;
	font-weight: bold;
}
.stylevrul {font-size: 16px; font-weight: bold; }
.stylevrli {font-size: 13px; font-weight: bold; }
-->
</style>
<script type="text/javascript" src="../../ddlevelsmenu_<?php echo $_SESSION['thm_id'];?>.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL;?>js/actb.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL;?>js/common.js"></script>
<script type="text/javascript" src="../md5.js"></script>
<script language="JavaScript" src="calendar_eu.js"></script>
<link rel="stylesheet" href="calendar.css">

<script language="javascript">
if(window.top!=window){
	window.location='../operation_error.php';
}
</script>

<style type="text/css">
<!--
.style1 {
	font-size: 13px;
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table border="1">
<?php                        
$scl_data=mysql_query("select * from online_scl_dtl where ex_date='2013-02-10' and t_time='2:00 PM' ORDER BY r_no_frm");
while($scl=mysql_fetch_array($scl_data)){
?>
	<tr>
		<td colspan="4"><?php echo $scl['ex_cnt_nm'];?></td>
	</tr><tr>
		<td colspan="2">Date : <?php echo $scl['ex_date'];?></td>
		<td colspan="2">Time : <?php echo $scl['t_time'];?></td>
	</tr><tr>
		<td>Roll no</td>
		<td>Candidate Name</td>
		<td>Candidate Father's Name</td>
		<td>Candidate dob</td>
	</tr>
<?php                        
$cand_data=mysql_query("select distinct(r_no),cand_nm,cand_fh_nm,cand_dob from online_app_zp_ttb where r_no>='".$scl['r_no_frm']."' and r_no<='".$scl['r_no_to']."' ORDER BY r_no");
//echo "select distinct(r_no),cand_nm,cand_fh_nm,cand_dob from online_app_ttb where r_no>='".$scl['r_no_frm']."' and r_no<='".$scl['r_no_to']."'";
while($cand=mysql_fetch_array($cand_data)){
?>
	<tr>
		<td><?php echo $cand['r_no'];?></td>
		<td><?php echo $cand['cand_nm'];?></td>
		<td><?php echo $cand['cand_fh_nm'];?></td>
		<td><?php echo $cand['cand_dob'];?></td>
	</tr>
<?php }}?>
</table>
</body>
</html>