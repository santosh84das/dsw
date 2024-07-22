<?php
session_start();
include("include_web/common.php");
include("script.php");
if(isset($_REQUEST['can']) && isset($_REQUEST['cd'])){
		$rep_char = array("&", "@", "#", "{", "}", "\\", "\"", "'", ";", " AND ", " and ", " OR ", " or ", "WFXSSProbe", "wfxssprobe");
		$cand_app_no=str_replace($rep_char,"",strip_tags($_REQUEST['can']));
		$cand_dob=str_replace($rep_char,"",strip_tags($_REQUEST['cd']));
		list($date,$month,$year)=preg_split("/[\/]|[-]+/",str_replace($rep_char,"",$cand_dob));
		$cand_dob_s=$year."-".$month."-".$date;
}else {
	?>
	<script language="javascript">
	window.location='online_app_frm.php';
	</script>
	<?php 
	exit();
}
?><!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><meta name="author" content="NIC"/><title>Print - Confirmation!</title><style type="text/css">
<!--
  .s1 { font-family: sans-serif; font-weight: normal; font-size: 8.5pt; }
 .s2 { font-family: sans-serif; font-weight: normal; font-size: 11pt; }
 .s3 { color: #C00; font-family: serif; font-weight: normal; font-size: 14.5pt; }
 p { color: #00F; font-family: sans-serif; font-weight: normal; font-size: 11pt; }
 .s4 { color: #00F; font-family: serif; font-weight: normal; font-size: 5pt; }
 .s5 { color: #F00; font-family: sans-serif; font-weight: normal; font-size: 12.5pt; }
.style1 {
	font-size: 16px
}
  -->
</style></head><body><br /><br /><br /><br />
<table align="center" border="3" cellpadding="0" cellspacing="0" width="700px">
	<tr>
    	<td style="padding:10px; text-align:center;">
        <p class="s2">Registration No: <span class="s3"><?php echo $cand_app_no;?></span></p>
        <p class="s2">Your Date of Birth: <span class="s3"><?php echo $cand_dob;?></span></p>
        </td>
    </tr>
    <tr>
    	<td style="padding:10px; text-align:center;">
        <p>Congratulations and thanks for your interest.You have successfully completed your registration..</p>
        <p class="s5">These are very important information. Kindly note down your registration number and date of birth. You will need these for future references.
        <INPUT type="button" value="Print" onClick="print_page();"></p>
		<p class="s5">Print your application - 
        <INPUT type="button" value="Print" onClick="re_direct();"></p>
       	</td>
    </tr>
    </table>
<script language="javascript">
function re_direct(){
	window.location='reg_frm_print.php?can=<?php echo $cand_app_no;?>&cd=<?php echo $cand_dob_s;?>';
}

function print_page(){
	window.print();
	window.location="confirmation.php?can=<?php echo $cand_app_no;?>&cd=<?php echo $cand_dob?>";	
}
</script>
<?php //mysql_close($link);?>