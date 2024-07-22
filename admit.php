<?php
session_start();
/*
$ip_app=$_SERVER['REMOTE_ADDR'];
$my_array = array_flip(array('10.173.88.37','10.173.88.38','10.173.88.39','10.173.88.40','10.173.88.41','10.173.88.46','10.173.88.42','127.0.0.1'));
if (!isset($my_array[$ip_app]))
{
	echo $ip_app;
	echo " You are not authenticate user";
	exit;
} 
*/
include("include_web/common.php");
require('fpdf.php');
if(date('YmdHm')>202204032359  || date('YmdHm')<202203141159)
{
	?>
<script>
alert("Admit card download will be available from 17/03/2022 (12:00 Noon) to 03/04/2022");
window.location='index.php';
</script>
<?php 
exit();
}
if(isset($_REQUEST['can']) && isset($_REQUEST['cd']))
{
		$rep_char = array("&", "@", "#", "{", "}", "\\", "\"", "'", ";", " AND ", " and ", " OR ", " or ", "WFXSSProbe", "wfxssprobe");
		$cand_app_no=str_replace($rep_char,"",strip_tags($_REQUEST['can']));
		$cand_dob=str_replace($rep_char,"",strip_tags($_REQUEST['cd']));
		$link=@mysql_connect($dbs,$user,$pass) or die ("Error during connection");
		mysql_select_db($db,$link); 
		$data_reg=mysql_query("select * from online_app_zp_ttb where cand_app_no='".$cand_app_no."' and cand_dob='".$cand_dob."'");
		mysql_close($link);
		$data=mysql_fetch_array($data_reg);
}
else
{
	?>
	<script language="javascript">
	window.location='admit_print.php';
	</script>
	<?php 
	exit();
}
if(mysql_num_rows($data_reg)==0)
{
	?>
	<script language="javascript">
	alert("Invalid Credentials provided OR your are not shortlisted. Please try with correct information.");
	window.location='admit_print.php';
	</script>
	<?php 
	exit();
}
$var_post='';
if($data["cand_post"]=="post1"){$var_post="BENCH CLERK";}
if($data["cand_post"]=="post2"){$var_post="LOWER DIVISION CLERK";}

$fntsz=8;
$linwp=190;
$pdf = new FPDF();
$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','B',$fntsz-1);
$posy=$pdf->GetY();
$pdf->Cell($linwp,3,'GOVERNMENT OF WEST BENAGAL',0,1,'C');
$pdf->Cell($linwp,3,'Office Of The District Magistrate, District Social Welfare Section, North24 Parganas',0,1,'C');
$pdf->Cell($linwp,3,'',0,1,'C');
$pdf->SetFont('Arial','B',$fntsz-1);
$pdf->Cell($linwp,5,'ADMIT CARD FOR WRITTEN EXAMINATION FOR ENGAGEMENT TO THE POST OF '.$var_post,0,1,'C');
$pdf->Cell($linwp,2,'ON CONTRACTUAL BASIS IN JUVENILE JUSTICE BOARD ,NORTH 24 PARGANAS.',0,1,'C');

//FOR RECUIRTMENT OF  BENCH CLERK AND LOWER DIVISION CLERK <br/>ON CONTRACTUAL BASIS IN JUVENILE JUSTICE BOARD ,NORTH 24 PARGANAS
//$get_y=$pdf->GetY();$get_x=$pdf->GetX();
//$pdf->SetXY(170,$get_y);



$get_y=$pdf->GetY();$get_x=$pdf->GetX();
$pdf->SetXY(170,$get_y);
//$posy=$get_y;
//check image fie
if (file_exists($data['cand_p_pic'])) {
    $cand_pic=$data['cand_p_pic'];
} else {
    $cand_pic='noimage.jpg';
}
if (file_exists($data['cand_p_sig'])) {
    $cand_sig=$data['cand_p_sig'];
} else {
    $cand_sig='nosig.jpg';
}
// cehck file
$pdf->Image($cand_pic,170,$posy+20,20,24);
$pdf->Image($cand_sig,170,$posy+45,30,10);
/*$pdf->SetFont('Arial','',$fntsz-2);
$pdf->MultiCell(30,8,'PHOTOGRAPH OF CANDIDATE WITH SIGNATURE',1,'C');
*/
$pdf->SetXY($get_x,$get_y+2);
$pdf->SetFont('Arial','',$fntsz-1);
$pdf->Cell($linwp/4.5,6,'NAME OF THE CANDIDATE : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+1.5);
if($data['cand_nm']!=''){$var_nm=$data['cand_nm'];}
$pdf->MultiCell($linwp/1.8,3,$var_nm,0,'L');

$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y);
$pdf->SetFont('Arial','',$fntsz-1);
$pdf->Cell($linwp/4.5,8,'FATHER\'S / HUSBAND\'S  NAME : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,4,$var=$data['cand_fh_nm'],0,'L');


$pdf->Cell($linwp/4.5,9,'ADDRESS : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,3,$data['cand_p_add'].'. BLK/MUNI/CORP: '.$data['cand_p_block'].'. PO: '.$data['cand_p_po'].'. PS:'.$var=$data['cand_p_ps'].'. PIN: '.$var=$data['cand_p_pin'].' DISTRICT: '.$var=$data['cand_p_dis'],0,'L');

$pdf->Cell($linwp/4.5,6,'POST : ',0,0,'L');
//$var_post='';
//if($data["cand_post"]=="post1"){$var_post="ACCOUNTANT";}
//if($data["cand_post"]=="post2"){$var_post="DATA ENTRY OPERATOR";}
$pdf->Cell($linwp/4,6,$var_post,0,0,'L');

$pdf->Cell($linwp/9,6,' ',0,0,'L');
//$pdf->Cell($linwp/9,6,'CATEGORY : ',0,0,'L');
$pdf->Cell($linwp/9,6,$data['cand_community'],0,1,'L');

$pdf->Cell($linwp/4.5,6,'ROLL NO. : ',0,0,'L');
$pdf->Cell($linwp/4,6,$data['exm_roll'],0,0,'L');


$pdf->Cell($linwp/7,6,'REGISTRATION NO. : ',0,0,'L');
$pdf->Cell($linwp/4.6,6,$data['cand_app_no'],0,1,'L');

$pdf->Cell($linwp/4.5,6,'DATE OF EXAMINATION : ',0,0,'L');
$pdf->Cell($linwp/4,6,$data['exm_date'],0,1,'L');

$pdf->Cell($linwp/4.5,6,'REPORTING TIME : ',0,0,'L');
$pdf->Cell($linwp/4,6,$data['exm_time'],0,0,'L');
//$pdf->Cell($linwp/4,6,'11:00 AM',0,0,'L');
//$pdf->Cell($linwp/5,6,'COMMENCEMENT OF EXAM : ',0,0,'L');
//$pdf->Cell($linwp/9,6,'12:00 NOON',0,1,'L');

$pdf->Cell($linwp/5,6,'',0,0,'L');
$pdf->Cell($linwp/9,6,'',0,1,'L');

//$pdf->Cell($linwp/4.5,6,' ',0,0,'L');
//$pdf->Cell($linwp/9,6,'',0,1,'L');

$pdf->Cell($linwp/4.5,9,'EXAM VENUE : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,3,$data['exm_venue'],0,'L');

$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->Line($get_x+110,$get_y+7,$get_x+150,$get_y+7);

$pdf->SetXY($get_x+110,$get_y+9);
$pdf->Cell($linwp/4,3,'SIGNATURE OF CANDIDATE',0,1,'L');


$pdf->SetFont('Arial','BU',$fntsz);
$pdf->Cell($linwp,6,'# IMPORTANT INSTRUCTIONS #',0,1,'C');
$pdf->SetFont('Arial','',$fntsz-2);
$pdf->MultiCell($linwp,3,'1. Candidates should check the Admit card carefully and bring discrepancies, if any, to the notice of the competent authority within 01/04/2022 before 3:00 p.m. at social welfare section.',0,'L');
$pdf->MultiCell($linwp,3,'2. Candidate shall bring a Photo bearing authentic document along with Admit card i.e. any one of the following documents: Madhyamik or equivalent certificate bearing photograph / PASSPORT / PAN card/ EPIC (Voter Identity Card) / Driving License / Aadhar Card / SC / ST / OBC Certificate.',0,'L');
$pdf->MultiCell($linwp,3,'3. ADMISSION TO THE WRITTEN EXAMINATION/TEST HALL IS PURELY PROVISIONAL SUBJECT TO DETERMINATION OF ELIGIBILITY AFTER SCRUTINY IN TERMS OF THE ADVERTISEMENT.  ',0,'L');
$pdf->Cell($linwp,3,'4. Under no circumstance, admission will be allowed without this Admit card (Hard Copy) in original. No photocopy will be entertained.',0,1,'L');
$pdf->MultiCell($linwp,3,'5. CARRYING OF MOBILE PHONE/ CALCULATOR OR ANY SORT OF ELECTRONIC GADGET / CORRECTION FLUID / BAG WILL NOT BE PERMITTED WITHIN THE EXAMINATION HALL. AUTHORITY WILL HAVE NO RESPONSIBILITY FOR CUSTODY OF SUCH ARTICLES.',0,'L');
$pdf->MultiCell($linwp,3,'6. No TA/DA will be admissible for appearing for the written test / viva voce/ computer test / personality test.',0,'L');
$pdf->MultiCell($linwp,4,'7. Issuance of Admit Card does not provide guarantee for selection in any post.',0,'L');
$pdf->MultiCell($linwp,3,'8. Candidate should not sign in advance in the lower portion of the Admit Card (specified for Office use). This has to be done at the time of computer examination/test in presence of the invigilator only. The photo and the signature in the admit card should be same as those of the application form.',0,'L');
$pdf->Cell($linwp,3,'9. There will be no negative marking system.',0,1,'L');
$pdf->MultiCell($linwp,3,'10. Admission to the written Examination/Test Hall will not be allowed after 30 minutes of reporting time',0,'L');
$pdf->MultiCell($linwp,3,'11. No candidate will be allowed to leave examination/test hall before full expiry of the scheduled hour of the conclusion of the examination.',0,'L');
$pdf->MultiCell($linwp,3,'12. No request of change of venue of  examination/test will be entertained.',0,'L');
$pdf->MultiCell($linwp,3,'13. Candidates should bring photocopies alongwith original of  all documents i.e. Age proof, Domicile /Residential Certificate (issued by the concerned authority), Educational qualification proof, Computer Certificate, Experience Certificate in original on the day of computer test  and on verification if any document is found not satisfactory his/her candidature will be cancelled.',0,'L');
$pdf->MultiCell($linwp,3,'14. Candidate should bring one copy of his/her photo identical to the photograph submitted at the time of application.',0,'L');
//$pdf->MultiCell($linwp,3,'15. The computer examination/test & personality test will be held on the same date.',0,'L');
$pdf->MultiCell($linwp,3,'15. Candidate must keep following the District Web Site (www.north24parganas.gov.in) regularly for result and further update in regard to the test.',0,'L');


$pdf->SetFont('Arial','',$fntsz-1.5);
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->Image('dm_sign.jpg',125,$get_y+3,27,10);

$pdf->SetXY($get_x+110,$get_y+14);
$pdf->Cell($linwp/5,3,'ADDITIONAL DISTRICT MAGISTRATE(T)',0,1,'C');

$pdf->SetXY($get_x+110,$get_y+17);
$pdf->Cell($linwp/5,3,'&',0,1,'C');

$pdf->SetXY($get_x+110,$get_y+20);
$pdf->Cell($linwp/5,3,'MEMBER, DISTRICT LEVEL SELECTION COMMITTEE',0,1,'C');

$pdf->SetXY($get_x+110,$get_y+23);
$pdf->Cell($linwp/5,3,'NORTH 24 PARGANAS',0,1,'C');

$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->Line($get_x,$get_y+5,$get_x+$linwp,$get_y+5);

$pdf->SetFont('Arial','',$fntsz-2);
$pdf->SetXY($get_x,$get_y+8);
$pdf->Cell($linwp,6,'FOR OFFICE USE ONLY',0,1,'C');



$pdf->SetFont('Arial','',$fntsz-1);
$pdf->Cell($linwp/4.5,6,'NAME OF THE CANDIDATE : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+1.5);
$pdf->MultiCell($linwp/1.8,3,$var_nm,0,'L');
$posyl=$get_y;

$get_y=$pdf->GetY();$get_x=$pdf->GetX();
$pdf->SetXY(170,$get_y-6);

$pdf->Image($cand_pic,160,$posyl,20,24);
$pdf->Image('stamp.jpg',185,$posyl,20,24);
$pdf->Image($cand_sig,160,$posyl+25,30,10);
/*$pdf->SetFont('Arial','',$fntsz-2);
$pdf->MultiCell(30,8,'PHOTOGRAPH OF CANDIDATE WITH SIGNATURE',1,'C');*/
$pdf->SetXY($get_x,$get_y);

$pdf->SetFont('Arial','',$fntsz-1);
$pdf->Cell($linwp/4.5,8,'FATHER\'S / HUSBAND\'S NAME : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,4,$var=$data['cand_fh_nm'],0,'L');

$pdf->Cell($linwp/4.5,9,'ADDRESS : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,3,$data['cand_p_add'].'. BLK/MUNI/CORP: '.$data['cand_p_block'].'. PO: '.$data['cand_p_po'].'. PS: '.$var=$data['cand_p_ps'].'. PIN: '.$var=$data['cand_p_pin'].' DISTRICT: '.$var=$data['cand_p_dis'],0,'L');

$pdf->Cell($linwp/4.5,6,'POST : ',0,0,'L');
$pdf->Cell($linwp/4,6,$var_post,0,0,'L');
//$pdf->Cell($linwp/9,6,'CATEGORY : ',0,0,'L');
$pdf->Cell($linwp/9,6,'  ',0,0,'L');
$pdf->Cell($linwp/9,6,$data['cand_community'],0,1,'L');

$pdf->Cell($linwp/4.5,6,'ROLL NO. : ',0,0,'L');
$pdf->Cell($linwp/4,6,$data['exm_roll'],0,0,'L');

$pdf->Cell($linwp/7,6,'REGISTRATION NO :',0,0,'L');
$pdf->Cell($linwp/4,6,$data['cand_app_no'],0,1,'L');



$pdf->Cell($linwp/4.5,6,'DATE OF EXAMINATION : ',0,0,'L');
$pdf->Cell($linwp/4,6,$data['exm_date'],0,1,'L');

$pdf->Cell($linwp/4.5,6,'REPORTING TIME : ',0,0,'L');
//$pdf->Cell($linwp/4,6,'11:00 AM',0,0,'L');
$pdf->Cell($linwp/4,6,$data['exm_time'],0,0,'L');
//$pdf->Cell($linwp/5,6,'COMMENCEMENT OF EXAM : ',0,0,'L');
//$pdf->Cell($linwp/9,6,'12:00 NOON',0,1,'L');

$pdf->Cell($linwp/5,6,'',0,0,'L');
$pdf->Cell($linwp/9,6,'',0,1,'L');


//$pdf->Cell($linwp/5,6,'',0,0,'L');
//$pdf->Cell($linwp/9,6,'',0,1,'L');

$pdf->Cell($linwp/4.5,9,'EXAM VENUE : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,3,$data['exm_venue'],0,'L');

$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->Line($get_x+20,$get_y+10,$get_x+70,$get_y+10);
$pdf->Line($get_x+110,$get_y+10,$get_x+155,$get_y+10);

$pdf->SetXY($get_x+20,$get_y+14);
$pdf->Cell($linwp/4,2,'SIGNATURE OF CANDIDATE ',0,0,'C');
$pdf->Cell($linwp/1.5,2,'SIGNATURE OF INVIGILATOR ',0,1,'C');

$pdf->Cell($linwp/2.2,3,'( IN PRESENCE OF INVIGILATOR )',0,0,'C');

$pdf->Output();
?>