<?php
session_start();
include("include_web/common.php");
//include("../../config-inc.php");
include("script.php");

$rand=md5(rand());
$_SESSION['rand']=$rand;
//echo date("h:i:sa");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo CSS;?>style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>ddlevelsmenu-base.css" />
<script type="text/javascript" src="../md5.js"></script>
<script type="text/javascript" src="<?php echo URL;?>ddlevelsmenu.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL;?>js/actb.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL;?>js/common.js"></script>
<link rel="shortcut icon" href="<?php echo IMAGE;?>l_icon.gif" type="<?php echo IMAGE;?>x-icon" />
<script language="JavaScript" src="calendar_eu.js"></script>
<link rel="stylesheet" href="calendar.css">
<title>Online Application</title>
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
.style2 {color: #FF0000}
-->
</style>
</head>

<body onLoad="document.o_a.cand_nm.focus()">

					
<div id="content">
<?php 
	$link=@mysqli_connect($dbs,$user,$pass) or die ("Error during connection");
	mysqli_select_db($db,$link);
	$data=mysqli_query("select cand_post from online_app_zp_ttb where `cand_post`='post1'");
	$post1=mysqli_num_rows($data);
	//$data=mysqli_query("select cand_post from online_app_zp_ttb where `cand_post`='post2'");
	//$post2=mysqli_num_rows($data);
	mysqli_close($link);
	/*$data=mysqli_query("select cand_post from online_app_zp_ttb where `cand_post`='post4'");
	$post4=mysqli_num_rows($data);
	$data=mysqli_query("select cand_post from online_app_zp_ttb where `cand_post`='post5'");
	$post5=mysqli_num_rows($data);
	$data=mysqli_query("select cand_post from online_app_zp_ttb where `cand_post`='post6'");
	$post6=mysqli_num_rows($data);
	$data=mysqli_query("select cand_post from online_app_zp_ttb where `cand_post`='post7'");
	$post7=mysqli_num_rows($data);
	$data=mysqli_query("select cand_post from online_app_zp_ttb where `cand_post`='post8'");
	$post8=mysqli_num_rows($data);
	$data=mysqli_query("select cand_post from online_app_zp_ttb where `cand_post`='post9'");
	$post9=mysqli_num_rows($data);*/
?>
<table align="center" border="0" style="padding:5px;">
<tr><td align="left">LIBRARIAN</td><td align="center"> : </td><td align="left"><?php echo $post1;?></td></tr>
<!---<tr><td align="left">DATA ENTRY OPERATOR</td><td align="center"> : </td><td align="left"><?php echo $post2;?></td></tr>
<tr><td align="left">BLOCK INFORMATICS OFFICER</td><td align="center"> : </td><td align="left"><?php echo $post4;?></td></tr>
<tr><td align="left">ACCOUNT CLERK(PS)</td><td align="center"> : </td><td align="left"><?php echo $post5;?></td></tr>
<tr><td align="left">CLERK-CUM-TYPIST(PS)</td><td align="center"> : </td><td align="left"><?php echo $post6;?></td></tr>
<tr><td align="left">DATA ENTRY OPERATOR(PS)</td><td align="center"> : </td><td align="left"><?php echo $post7;?></td></tr>
<tr><td align="left">SAMITI EDUCATION OFFICER</td><td align="center"> : </td><td align="left"><?php echo $post8;?></td></tr>
<tr><td align="left">GRAM PANCHAYAT SECRETARY</td><td align="center"> : </td><td align="left"><?php echo $post9;?></td></tr>  --->
<tr><td align="left">TOTAL</td><td align="center"> : </td><td align="left"><?php echo $post1;?></td></tr>
</table></div></body></html>
<?php //mysqli_close($link); ?>