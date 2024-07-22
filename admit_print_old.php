<?php
session_start();
include("../../common.php");
include("../../config-inc.php");
require_once("../dompdf_config.inc.php");
$var='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<style type="text/css">
<!--
#op_com_app_dtl{width:900px; font-size:13px; font-family: Verdana, Arial, Helvetica, sans-serif;}
#c_dtl{text-align:center; width:700px;}
.op_edu_app_dtl{width:690px; font-size:13px; font-family: Verdana, Arial, Helvetica, sans-serif;}
.c_dtl_l{width:190px; vertical-align:middle; padding-bottom:5px; padding-top:5px; text-align:left;font-size: 11px; padding-left:10px; font-weight: bold; display:inline-block;}
.c_dtl_ll{width:500px; vertical-align:middle; text-align:left;font-size: 11px; font-weight: bold; display:inline-block;}
.c_dtl_lll{width:300px; vertical-align:middle; text-align:left;font-size: 11px; font-weight: bold; display:inline-block;}
.c_dtl_lb{width:190px; vertical-align:middle; padding-bottom:5px; padding-top:5px; text-align:left;font-size: 13px; padding-left:10px; font-weight: bold; display:inline-block;}
.c_dtl_r{width:500px; vertical-align:middle; padding-bottom:5px; padding-top:5px; text-align:left; display:inline-block;}
.c_dtl_rr{width:130px; vertical-align:middle; padding-bottom:5px; padding-top:5px; padding-left:20px; text-align:right; display:inline-block;}
.c_dtl_rrr{width:330px; vertical-align:middle; padding-bottom:5px; padding-top:5px; padding-left:20px; text-align:right; display:inline-block;}
.c_dtl_all{width: 890px; vertical-align: middle; padding-bottom: 5px; padding-top: 5px; text-align: left; display: inline-block; font-size: 16px; font-weight: bold;}
.c_dtl_all_fut{width: 690px; vertical-align: middle; padding-bottom: 5px; padding-top: 5px; text-align: left; display: inline-block; font-size: 11px;}
.main_body{width:700px; height:auto; text-align:left; font-size:12px; margin:0 auto; background-color:#FFFFFF; padding-top:0px; padding-bottom:5px; padding-left:0px; padding-right:0px;<!-- border:#370909 solid;-->}
.style4 {
	font-weight: bold;
	font-size: 18px;
}
.style10 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style11 {
	font-size: 10px;
	color: #FF0000;
}
.style14 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10;
}
.style16 {font-size: 10px; color: #FF0000; text-align:justify;}
.style18 {font-size: 10px; text-align:justify; font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:300;}
.style20 {font-size: 10px; font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:300;}
.style19 {font-size: 9; font-weight: bold; }
.style21 {font-size: 11px}
.style-ad-1 {font-size: 18px; font-weight: bold;}
.style-ad-2 {font-size: 14px; font-weight: bold;}
.style-ad-6 {font-size: 12px}
.style-ad-8 {font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style-ad-9 {font-size: 10px}
.style-ad-12 {font-size: 11px; font-weight: bold;}
.break { page-break-before: always; }
-->
</style>

<body>
	<div align="center" class="main_body">';
if(isset($_REQUEST['can']) && isset($_REQUEST['cd'])){
		$rep_char = array("&", "@", "#", "{", "}", "\\", "\"", "'", ";", " AND ", " and ", " OR ", " or ", "WFXSSProbe", "wfxssprobe");
		$cand_app_no=str_replace($rep_char,"",strip_tags($_REQUEST['can']));
		$cand_dob=str_replace($rep_char,"",strip_tags($_REQUEST['cd']));	
		$data_reg=mysql_query("select * from online_app_zp_ttb where cand_app_no='".$cand_app_no."' and cand_dob='".$cand_dob."'");
		$data=mysql_fetch_array($data_reg);
}else{
	?>
	<script language="javascript">
	window.location='slip_print.php';
	</script>
	<?php 
	exit();
}
if(mysql_num_rows($data_reg)==0) {
	?>
	<script language="javascript">
	window.location='slip_print.php';
	</script>
	<?php 
	exit();
}
$var.='<table width="500" align="center" cellpadding="0" cellspacing="0" border="2">
			<tr>
				<td align="center">
				  <span class="style-ad-1"><br />
				  <u>DISTRICT LEVEL SELECTION COMMITTEE NORTH  24 PARGANAS</u></span><strong><u></u></strong><br />
					<span class="style-ad-2">RECUIRTMENT TO THE POST OF ';
					if($data["cand_post"]=="post1"){$var.="EXECUTIVE ASSISTANT";}
					if($data["cand_post"]=="post2"){$var.="NIRMAN SAHAYAK";}
					if($data["cand_post"]=="post3"){$var.="SAHAYAK";}
					if($data["cand_post"]=="post4"){$var.="BLOCK INFORMATICS OFFICER";}
					if($data["cand_post"]=="post5"){$var.="ACCOUNT CLERK(PS)";}
					if($data["cand_post"]=="post6"){$var.="CLERK-CUM-TYPIST(PS)";}
					if($data["cand_post"]=="post7"){$var.="DATA ENTRY OPERATOR(PS)";}
					if($data["cand_post"]=="post8"){$var.="SAMITI EDUCATION OFFICER";}
					if($data["cand_post"]=="post9"){$var.="GRAM PANCHAYAT SECRETARY";}
$var.='<br />UNDER DIFFERENT GRAM PANCHAYATS/PANCHAYAT SAMITIS <br />
		OF NORTH 24 PARGANAS<br />
		<u>ADMIT CARD</u></span> <br />
		<br />
					<table border="1" cellpadding="0" cellspacing="0" width="480" align="center">
						<tr style="height:20px;">
							<td align="center" style="padding:5px;"><span class="style-ad-1">DATE OF TEST</span></td>
							<td align="center" style="padding:5px;"><span class="style-ad-1">TEST TIME</span></td>
							<td align="center" style="padding:5px;"><span class="style-ad-1">REPORTING TIME</span></td>
						</tr>
						<tr style="height:20px;">
							<td align="center" style="padding:5px;"><span class="style-ad-2">date</span></td>
							<td align="center" style="padding:5px;"><span class="style-ad-2">t-time</span></td>
							<td align="center" style="padding:5px;"><span class="style-ad-2">r-time</span></td>
						</tr>
				  </table>
				  <table border="0" cellpadding="0" cellspacing="0" width="480" align="center">
				  		<tr>
							<td width="340">
								<table border="0" cellpadding="0" cellspacing="0" width="340" align="center">
									<tr>
										<td width="120" align="left" style="padding-bottom:5px;"><span class="style-ad-12"><br />ROLL NO</span></td>
										<td width="220"align="left" style="padding-bottom:5px;"><span class="style-ad-6"><br />: '.$cand_app_no.'</span></td>
									</tr>
									<tr>
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-12">NAME</span></td> 
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-6">: '.$data['cand_nm'].'</span></td>
									</tr>
									<tr>
										<td align="left" valign="top" style="padding-bottom:5px;"><span class="style-ad-12">POSTAL ADDRESS</span></td>
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-6">: ';
											if($data['cand_c_add']!=''){$var.=$data['cand_p_add'];}
											$var.=', ';
											if($data['cand_c_block']!=''){$var.=$data['cand_c_block'];}
											$var.='<br />
											&nbsp;&nbsp;PO - ';
											if($data['cand_c_po']!=''){$var.=$data['cand_c_po'];}
											$var.='<br />
											&nbsp;&nbsp;PS - ';
											if($data['cand_c_ps']!=''){$var.=$data['cand_c_ps'];}
											$var.='<br />
											&nbsp;&nbsp;PIN - ';
											if($data['cand_c_pin']!=''){$var.=$data['cand_c_pin'];}
											$var.='</span></td>
									</tr>
									<tr>
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-12">CATEGORY</span></td>
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-6">: '.$data['cand_community'].'</span></td>
									</tr>
									<tr>
										<td align="left" valign="top" style="padding-bottom:5px;"><span class="style-ad-12">PHYSICALLY HANDICAPPED</span></td>
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-6">: ';
										if($data['ck_ex_serv']=='on' || $data['ck_blind']=='on' || $data['ck_hear']=='on' || $data['ck_loco']=='on'){
											if($data['ck_ex_serv']=='on'){$var.='EX - SERVICEMAN<br />&nbsp;&nbsp;';}
											if($data['ck_blind']=='on'){$var.='BLINDNESS OR LOW VISION WITH '.$data['txt_blind'].' % OF DISABILITY<br />&nbsp;&nbsp;';}
											if($data['ck_hear']=='on'){$var.='HEARING IMPAIRMENT WITH '.$data['txt_blind'].' % OF DISABILITY<br />&nbsp;&nbsp;';}
											if($data['ck_loco']=='on'){$var.='LOCO-MOTOR DISABILITY OR CEREBRAL PALSY WITH '.$data['txt_loco'].' % OF DISABILITY<br />';}
										}else{
											$var.='NO';
										}
										$var.='</span></td>
									</tr>
				  				</table>
							</td>
							<td width="140" align="center" valign="top" style="padding-top:5px;padding-left:15px;"><table border="1" cellpadding="0" cellspacing="0" style="width:130px;"><tr><td align="center" class="style-ad-20 style-ad-8 style-ad-9" style="height:130px; vertical-align:middle;">PASTE HERE YOUR RECENT PASSPORT SIZE COLOUR PHOTOGRAPH OF SIZE 3.5CM X 3.5 CM (THE COLOUR PHOTOGRAPH SHOULD NOT BE MORE THAN 3 MONTHS OLD.</td></tr></table></td>
					</tr></table>
					<table border="0" cellpadding="0" cellspacing="0" width="480" align="center">
						<tr>
							<td align="left" width="320" style="padding-bottom:5px;"><span class="style-ad-6"><br />
								<strong>NAME &amp; ADDRESS OF THE TEST CENTRE</strong></span></td>
						  <td align="center" style="padding-bottom:5px;"><span class="style-ad-6">______________________________<br />
							  <span class="style-ad-13">(SIGNATURE OF THE CANDIDATE)</span></span></td>
						</tr>
						<tr>
							<td align="left" colspan="3" style="border:solid; height:40px; white-space:100%;padding-bottom:5px;"><span class="style-ad-6"></span></td>
						</tr>
						<tr>
							<td align="left" colspan="3" style=""><p class="style-ad-8">DEAR CANDIDATE,</p>
							  <ol class="style-ad-8">
								<li><div align="justify">YOU ARE REQUESTED TO APPEAR IN THE TEST ON THE DATE AND TIME SPECIFIED ABOVE. LATE COMERS WILL NOT BE PERMITTED TO APPEAR IN THE TEST.</div></li>
								<li><div align="justify">YOU WILL BE ALLOWED TO ENTER IN TEST CENTRE ONLY ON PRODUCTION OF ADMIT CARD. PLEASE NOTE DOWN YOUR ROLL / REGISTRATION NUMBER FOR FUTURE REFERENCE.</div></li>
								<li><div align="justify">REQUEST FOR CHANGE OF TEST CENTRE/TEST DATE WILL NOT BE ENTERTAINED UNDER ANY CIRCUMSTANCE.</div></li>
								<li><div align="justify">YOU MAY KINDLY NOTE THAT NO TRAVELLING EXPENSES WILL BE ADMISSIBLE FOR APPEARING IN THE WRITTEN TEST.</div></li>
								<li><div align="justify">ONLY BLUE OR BLACK BALL POINT PEN SHOULD BE USED FOR THE ANSWERS ON THE ANSWERS SHEET DURING THE WRITTEN TEST.</div></li>
								<li><div align="justify">CANDIDATES  ARE  NOT ALLOWED  TO  CARRY  ANY  PAPERS,  NOTES,  BOOKS,  CORRECTION  FLUID,  CALCULATORS,  MOBILE  PHONES, SCANNING  DEVICES,  ANY  ELECTRONIC  GADGET TO  THE  TEST CENTRE.  PLEASE  NOTE  THAT,  NO  ARRANGEMENT  FOR  STORING  THESE ITEMS WILL BE MADE AT THE TEST CENTRE AS THESE ITEMS ARE BANNED INSIDE THE TEST CENTRE.</div></li>
								<li><div align="justify">NO CANDIDATE WILL BE ALLOWED TO LEAVE THE TEST CENTRE BEFORE END OF THE EXAM ON THE DATE OF EXAMINATION.</div></li>
								<li><div align="justify">CANDIDATE SHOULD BRING ONE PHOTO IDENTITY CARD IN ORIGINAL & PHOTOCOPY WITH HIM/HAR.</div></li>
							  </ol>
							                    </td>
						</tr>
					</table> 
				</td>
			</tr>
		</table><span style="font-size:6px"><br /><hr /><br /></span>

	<table width="500" align="center" cellpadding="0" cellspacing="0" border="2">
		<tr>
			<td align="center">		
				<table border="0" cellpadding="0" cellspacing="0" width="480" align="center">
					<tr><td colspan="2" align="center" style="padding:3px; font-size:12px; font-weight:bold;"><u>( FOR OFFICE USE ONLY )</u></td>
					<tr>
						<td width="340">
							<table border="0" cellpadding="0" cellspacing="0" width="340" align="center">
								</tr>
                                <tr><td colspan="3" align="center"><br /></td></tr>
								<tr>
									<td width="134" align="left" style="padding-bottom:5px;"><span class="style-ad-12"><br />&nbsp;&nbsp;&nbsp;SIGNATURE OF CANDIDATE</span></td>
									<td width="6" style="padding-bottom:5px;"><br />: </td> 
									<td width="200"align="left" style="padding-bottom:5px;"><span class="style-ad-6"><br />_________________________________________________</span></td>
								</tr>
                                <tr><td colspan="3" align="center">( AT THE TIME OF WRITTEN EXAM IN PRESENCE OF INVIGILATOR )<br /><br /></td></tr>
								<tr>
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-12"><br />&nbsp;&nbsp;&nbsp;SIGNATURE OF CANDIDATE</span></td>
									<td width="6" style="padding-bottom:5px;"><br />: </td> 
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-6"><br />_________________________________________________</span></td>
								</tr>
                                <tr><td colspan="3" align="center">( AT THE TIME OF INTERVIEW IF SELECTED )<br /><br /></td></tr>
								<tr>
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-12"><br />&nbsp;&nbsp;&nbsp;SIGNATURE OF INVIGILATOR</span></td>
									<td width="6" style="padding-bottom:5px;"><br />: </td> 
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-6"><br />_________________________________________________</span></td>
								</tr>
                                <tr><td colspan="3" align="center"><br /></td></tr>
							</table>
						</td>
						
							<td width="140" align="center" valign="top" style="padding-top:5px;padding-left:15px;"><table border="1" cellpadding="0" cellspacing="0" style="width:130px;"><tr><td align="center" class="style-ad-20 style-ad-8 style-ad-9" style="height:130px; vertical-align:middle;">SAME PASSPORT SIZE PHOTOGRAPH TO BE PASTED.</td></tr></table></td>
						
					</tr>
				</table> 
				</td>
			</tr>
		</table>
	</div>
</body>       
</html>';

  $dompdf = new DOMPDF();
  $dompdf->load_html($var);
  $dompdf->set_paper('a4', 'portrait');
  $dompdf->render();

  $dompdf->stream("slip.pdf", array("Attachment" => false));

  exit(0);
  mysql_close($link);
?>	