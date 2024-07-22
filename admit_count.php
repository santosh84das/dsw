<?php
session_start();
include("include_web/common.php");
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


<body style="background:#FFFFFF">
<?php 
//echo date('YmdHm');
$link=@mysql_connect($dbs,$user,$pass) or die ("Error during connection");
mysql_select_db($db,$link);
$all_y=mysql_num_rows(mysql_query("select distinct cand_app_no from online_app_zp_ttb where print_chk='y'"));
$post1=mysql_num_rows(mysql_query("select distinct cand_app_no from online_app_zp_ttb where print_chk='y' and cand_post='post1'"));
//$post2=mysql_num_rows(mysql_query("select distinct exm_roll from online_app_zp_ttb where print_chk='y' and cand_post='post2'"));
?>
<table align="center" border="1">
<tr>
	<td width="56">Catagory</td>
	<td width="63">Download</td>
</tr>
<tr>
	<td>SSHGSE </td><td><?php echo $post1;?></td>
</tr>

<tr>
	<td>TOTAL</td><td><?php echo $all_y;?></td>
</tr>
</table>
</body>
</html>