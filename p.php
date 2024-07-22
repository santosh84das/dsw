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
.style-ad-1 {font-size: 14px; font-weight: bold;}
.style-ad-2 {font-size: 12px; font-weight: bold;}
.style-ad-6 {font-size: 12px}
.style-ad-8 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style-ad-9 {font-size: 10px}
.style-ad-12 {font-size: 11px; font-weight: bold;}
.break { page-break-before: always; }
-->
</style>

<body>';
$rep_char = array("&", "@", "#", "{", "}", "\\", "\"", "'", ";", " AND ", " and ", " OR ", " or ", "WFXSSProbe", "wfxssprobe");
		$data_reg=mysql_query("select * from online_app_zp_ttb where r_no>801847 and r_no<=801860");
		while($data=mysql_fetch_array($data_reg)){
	$var.='<div align="center" class="main_body">';

		

$scl_dtl=mysql_query("select * from online_scl_dtl where r_no_frm<=".$data['r_no']." and r_no_frm<=".$data['r_no']);
$s_dtl=mysql_fetch_array($scl_dtl);
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
						<tr style="height:15px;">
							<td align="center" style="padding:5px;"><span class="style-ad-1">DATE OF TEST</span></td>
							<td align="center" style="padding:5px;"><span class="style-ad-1">TEST TIME</span></td>
							<td align="center" style="padding:5px;"><span class="style-ad-1">REPORTING TIME</span></td>
						</tr>
						<tr style="height:15px;">
							<td align="center" style="padding:5px;"><span class="style-ad-2">';
							list($year,$month,$date)=preg_split("/[\/]|[-]+/",str_replace($rep_char,"",strip_tags($s_dtl['ex_date'])));
							$ex_date=$date."/".$month."/".$year;
							$var.=$ex_date.'</span></td>
							<td align="center" style="padding:5px;"><span class="style-ad-2">'.$s_dtl['t_time'].'</span></td>
							<td align="center" style="padding:5px;"><span class="style-ad-2">'.$s_dtl['r_time'].'</span></td>
						</tr>
				  </table>
				  <table border="0" cellpadding="0" cellspacing="0" width="480" align="center">
				  		<tr>
							<td width="340" style="vertical-align:top">
								<table border="0" style="height:160px;" cellpadding="0" cellspacing="0" width="340" align="center">
									<tr>
										<td width="120" align="left" style="padding-bottom:5px;"><span class="style-ad-12"><br />ROLL NO</span></td>
										<td align="left" style="padding-bottom:5px;"><br />:&nbsp;&nbsp;</td>
										<td width="220"align="left" style="padding-bottom:5px;"><span class="style-ad-6"><br />'.$data['r_no'].'</span></td>
									</tr>
									<tr>
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-12">NAME</span></td> 
										<td align="left" style="padding-bottom:5px;">:&nbsp;&nbsp;</td>
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-6">'.$data['cand_nm'].'</span></td>
									</tr>
									<tr>
										<td align="left" valign="top" style="padding-bottom:5px;"><span class="style-ad-12">POSTAL ADDRESS</span></td>
										<td align="left" style="padding-bottom:5px; vertical-align:top" >:&nbsp;&nbsp;</td>
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-6">';
											if($data['cand_p_add']!=''){$var.=$data['cand_p_add'];}
											if($data['cand_p_block']!=''){$var.=', ';
											$var.=$data['cand_p_block'];}
											if($data['cand_p_po']!=''){$var.='<br />
											PO - ';
											$var.=$data['cand_p_po'];}
											if($data['cand_p_ps']!=''){$var.='<br />
											PS - ';
											$var.=$data['cand_p_ps'];}
											if($data['cand_p_pin']!=0){$var.='<br />
											PIN - ';
											$var.=$data['cand_p_pin'];}
											$var.='</span></td>
									</tr>
									<tr>
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-12">CATEGORY</span></td>
										<td align="left" style="padding-bottom:5px;">:&nbsp;&nbsp;</td>
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-6">'.$data['cand_community'].'</span></td>
									</tr>
									<tr>
										<td align="left" valign="top" style="padding-bottom:5px;"><span class="style-ad-12">PHYSICALLY HANDICAPPED</span></td>
										<td align="left" style="padding-bottom:5px;">:&nbsp;&nbsp;</td>
										<td align="left" style="padding-bottom:5px;"><span class="style-ad-6">';
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
							<td width="140" align="center" valign="top" style="padding-top:5px;padding-left:15px;"><table border="1" cellpadding="0" cellspacing="0" style="width:130px;"><tr><td align="center" class="style-ad-20 style-ad-8 style-ad-9" style="height:130px; vertical-align:middle;">PASTE HERE YOUR RECENT PASSPORT SIZE ATTESTED COLOUR PHOTOGRAPH OF SIZE 3.5CM X 3.5 CM (THE COLOUR PHOTOGRAPH SHOULD NOT BE MORE THAN 3 MONTHS OLD.</td></tr></table></td>
					</tr></table>
					<table border="0" cellpadding="0" cellspacing="0" width="480" align="center">
						<tr>
							<td align="left" width="320" style="padding-bottom:5px;"><span class="style-ad-6"><br />
								<strong>NAME &amp; ADDRESS OF THE TEST CENTRE</strong></span></td>
						  <td align="center" style="padding-bottom:5px;"><span class="style-ad-6">______________________________<br />
							  <span class="style-ad-13">(SIGNATURE OF THE CANDIDATE)</span></span></td>
						</tr>
						<tr>
							<td align="left" colspan="3" style="border:solid; height:35px; white-space:100%;padding:5px;">'.$s_dtl['ex_cnt_nm'].', '.$s_dtl['ex_cnt_add'];
							if($s_dtl['ex_cnt_lm']!=''){
								$var.=', Land Mark - '.$s_dtl['ex_cnt_lm'];
							}
							if($s_dtl['ex_cnt_no']!=''){
								$var.=', '.$s_dtl['ex_cnt_no'];
							}
							$var.='<span class="style-ad-6"></span></td>
						</tr>
						<tr>
							<td align="left" colspan="3" style=""><p class="style-ad-8">DEAR CANDIDATE,</p>
							  <ol class="style-ad-8">
								<li><div align="justify" style="font-size:10px;">YOU ARE REQUESTED TO TAKE YOUR SEAT AT THE EXAMINATION HALL ON THE SCHEDULED DATE AND TIME. NO CANDIDATE WILL BE ALLOWED TO ENTRE IN THE EXAMINATION HALL 30 MINUTIES AFTER COMMENCEMENT OF EXAMINATION.</div></li>
								<li><div align="justify" style="font-size:10px;">NO CANDIDATE WILL BE ALLOWED WITHOUT ORIGINAL ADMIT CARD.</div></li>
								<li><div align="justify" style="font-size:10px;">REQUEST FOR CHANGE OF TEST CENTRE/TEST DATE WILL NOT BE ENTERTAINED UNDER ANY CIRCUMSTANCE.</div></li>
								<li><div align="justify" style="font-size:10px;">YOU MAY KINDLY NOTE THAT NO TRAVELLING EXPENSES WILL BE ADMISSIBLE FOR APPEARING IN THE WRITTEN TEST.</div></li>
								<li><div align="justify" style="font-size:10px;">CANDIDATES FOR THE POST OF SAMITI EDUCATION OFFICER WILL USE ONLY BLUE OR BLACK BALL POINT PEN FOR THE ANSWERS ON THE ANSWERS SHEET DURING THE WRITTEN TEST AND CANDIDATES FOR ALL OTHER POSTS WILL USE BLACK BALL POINT PEN ONLY TO MARK THEIR CHOICE OF ANSWER
.</div></li>
								<li><div align="justify" style="font-size:10px;">CANDIDATES  ARE  NOT ALLOWED  TO  CARRY  ANY  PAPERS,  NOTES,  BOOKS,  CORRECTION  FLUID,  CALCULATORS,  MOBILE  PHONES, SCANNING  DEVICES,  ANY  ELECTRONIC  GADGET TO  THE  TEST CENTRE.  PLEASE  NOTE  THAT,  NO  ARRANGEMENT  FOR  STORING  THESE ITEMS WILL BE MADE AT THE TEST CENTRE AS THESE ITEMS ARE BANNED INSIDE THE TEST CENTRE.</div></li>
								<li><div align="justify" style="font-size:10px;">NO CANDIDATE WILL BE ALLOWED TO LEAVE THE TEST CENTRE BEFORE END OF THE EXAM ON THE DATE OF EXAMINATION.</div></li>
								<li><div align="justify" style="font-size:10px;">CANDIDATE SHALL PASTE THEIR RECENT PASSPORT SIZE COLOUR PHOTOGRAPH ATTESTED BY ANY GAZETTED OFFICER OF CENTRAL OR STATE GOVT. OR BY HEAD OF THE INSTITUTION (SCHOOL/COLLEGE) WITH SEAL.</div></li>
								<li><div align="justify" style="font-size:10px;">CANDIDATE MUST BRING ONE PHOTO IDENTITY CARD IN ORIGINAL ALONG WITH A SELF ATTESTED PHOTOCOPY OF THE SAME WITH HIM/HER.</div></li>
								<li><div align="justify" style="font-size:10px;">CANDIDATE SHOULD NOT SIGN IN ADVANCE IN THE LOWER PORTION OF THE ADMIT CARD (SPECIFIED FOR OFFICE USE). THIS HAS TO BE DONE AT THE TIME OF WRITTEN EXAMINATION BEFORE THE INVIGILATOR ONLY.</div></li>

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
					<tr><td colspan="2" align="center" style="padding:3px; font-size:12px; font-weight:bold;"><u>ADMIT CARD (FOR OFFICE USE)</u></td>
					<tr>
						<td width="340">
							<table border="0" cellpadding="0" cellspacing="0" width="340" align="center">
								<tr>
									<td width="134" align="left" style="padding-bottom:5px;"><span class="style-ad-12"><br />&nbsp;&nbsp;&nbsp;ROLL NO</span></td>
									<td width="200"align="left" style="padding-bottom:5px;"><span class="style-ad-6"><br />: '.$data['r_no'].'</span></td>
								</tr>
								<tr>
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-12">&nbsp;&nbsp;&nbsp;NAME</span></td> 
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-6">: '.$data['cand_nm'].'</span></td>
								</tr>
								<tr>
									<td align="left" valign="top" style="padding-bottom:5px;"><span class="style-ad-12">&nbsp;&nbsp;&nbsp;POST NAME</span></td> 
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-6">: ';
									if($data["cand_post"]=="post1"){$var.="EXECUTIVE ASSISTANT";}
									if($data["cand_post"]=="post2"){$var.="NIRMAN SAHAYAK";}
									if($data["cand_post"]=="post3"){$var.="SAHAYAK";}
									if($data["cand_post"]=="post4"){$var.="BLOCK INFORMATICS OFFICER";}
									if($data["cand_post"]=="post5"){$var.="ACCOUNT CLERK(PS)";}
									if($data["cand_post"]=="post6"){$var.="CLERK-CUM-TYPIST(PS)";}
									if($data["cand_post"]=="post7"){$var.="DATA ENTRY OPERATOR(PS)";}
									if($data["cand_post"]=="post8"){$var.="SAMITI EDUCATION OFFICER";}
									if($data["cand_post"]=="post9"){$var.="GRAM PANCHAYAT SECRETARY";}
									$var.='</span></td>
									
								</tr>
								<tr>
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-12">&nbsp;&nbsp;&nbsp;CATEGORY</span></td>
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-6">: '.$data['cand_community'].'</span></td>
								</tr>
								<tr>
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-12"><br />&nbsp;&nbsp;&nbsp;SIGNATURE OF CANDIDATE</span></td>
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-6"><br />: __________________________________________</span></td>
								</tr>
                                <tr><td colspan="2" align="center" style="font-size:10px;">( AT THE TIME OF WRITTEN EXAM IN PRESENCE OF INVIGILATOR )<br /></td></tr>
								<tr>
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-12"><br />&nbsp;&nbsp;&nbsp;SIGNATURE OF CANDIDATE</span></td>
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-6"><br />: __________________________________________</span></td>
								</tr>
                                <tr><td colspan="2" align="center" style="font-size:10px;">( AT THE TIME OF INTERVIEW IF SELECTED )<br /></td></tr>
								<tr>
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-12"><br />&nbsp;&nbsp;&nbsp;SIGNATURE OF INVIGILATOR</span></td> 
									<td align="left" style="padding-bottom:5px;"><span class="style-ad-6"><br />: __________________________________________</span></td>
								</tr>
                                <tr><td colspan="2" align="center" style="font-size:10px;"><br /></td></tr>
							</table>
						</td>
						
							<td width="140" align="center" valign="top" style="padding-top:5px;padding-left:15px;"><table border="1" cellpadding="0" cellspacing="0" style="width:130px;"><tr><td align="center" class="style-ad-20 style-ad-8 style-ad-9" style="height:130px; vertical-align:middle;">PASTE HERE YOUR RECENT PASSPORT SIZE ATTESTED COLOUR PHOTOGRAPH OF SIZE 3.5CM X 3.5 CM (THE COLOUR PHOTOGRAPH SHOULD NOT BE MORE THAN 3 MONTHS OLD.</td></tr></table></td>
						
					</tr>
				</table> 
				</td>
			</tr>
		</table>
	</div>';}
$var.='</body>       
</html>';

  $dompdf = new DOMPDF();
  $dompdf->load_html($var);
  $dompdf->set_paper('a4', 'portrait');
  $dompdf->render();

  $dompdf->stream("slip.pdf", array("Attachment" => false));

  exit(0);
  mysql_close($link);
?>	