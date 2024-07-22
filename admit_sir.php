<?php
session_start();
// ip blocker
/* $ip_app=$_SERVER['REMOTE_ADDR'];
$my_array = array_flip(array('10.173.88.37','10.173.88.38','10.173.88.39','10.173.88.40','10.173.88.41','10.173.88.46','10.173.88.42','10.173.89.20','10.173.89.50','10.173.89.35,164.100.177.172'));
if (!isset($my_array[$ip_app]))
{
	echo $ip_app;
	echo "You are not authenticate user";
	exit;
}*/
// ip blocker
include("include_web/common.php");
if(date('Ymd')>20170122  || date('Ymd')<20170110){?>
<script>
window.location='index.php';
</script>
<?php 
exit();
}
require('fpdf.php');
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
	window.location='admit_print.php';
	</script>
	<?php 
	exit();
}
$fntsz=8;
$linwp=190;
$pdf = new FPDF();
$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','B',$fntsz-1);
$posy=$pdf->GetY();
$pdf->Cell($linwp,3,'GOVERNMENT OF WEST BENAGAL',0,1,'C');
$pdf->Cell($linwp,3,'OFFICE OF THE DISTRICT MAGISTRATE & DISTRICT LEVEL SELECTION COMMITTE, NORTH 24 PARGANAS',0,1,'C');
$pdf->Cell($linwp,3,'( PANCHAYAT & RURAL DEVELOPMENT CELL, NORTH 24 PARGANAS )',0,1,'C');
$pdf->SetFont('Arial','B',$fntsz-1);
$pdf->Cell($linwp,5,'ADMIT CARD FOR THE WRITTEN EXAMINATION IN THE POST OF ',0,1,'C');
$pdf->Cell($linwp,2,'EXECUTIVE ASSISTANT / NIRMAN SAHAYAK UNDER NORTH 24 PARGANAS',0,1,'C');

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
$pdf->Cell($linwp/4.5,8,'FATHER\'S NAME : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,4,$var=$data['cand_fh_nm'],0,'L');


$pdf->Cell($linwp/4.5,9,'ADDRESS : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,3,$data['cand_p_add'].'. BLK/MUNI/GP: '.$data['cand_p_block'].'. PO: '.$data['cand_p_po'].'. PS:'.$var=$data['cand_p_ps'].'. PIN '.$var=$data['cand_p_pin'],0,'L');

$pdf->Cell($linwp/4.5,6,'POST : ',0,0,'L');
$var_post='';
if($data["cand_post"]=="post1"){$var_post="EXECUTIVE ASSISTANT";}
if($data["cand_post"]=="post2"){$var_post="NIRMAN SAHAYAK";}
$pdf->Cell($linwp/4,6,$var_post,0,0,'L');
$pdf->Cell($linwp/9,6,'CATEGORY : ',0,0,'L');
$pdf->Cell($linwp/9,6,$data['cand_community'],0,1,'L');

$pdf->Cell($linwp/4.5,6,'ROLL : ',0,0,'L');
$pdf->Cell($linwp/4,6,$data['exm_roll'],0,0,'L');
$pdf->Cell($linwp/5,6,'DATE OF EXAMINATION : ',0,0,'L');
$pdf->Cell($linwp/9,6,$data['exm_date'],0,1,'L');

$pdf->Cell($linwp/4.5,6,'TIME : ',0,0,'L');
$pdf->Cell($linwp/4,6,$data['exm_time'],0,0,'L');
$pdf->Cell($linwp/4.5,6,'DURATION OF EXMINATION : ',0,0,'L');
$pdf->Cell($linwp/9,6,$data['exm_duration'].' HOURS',0,1,'L');

$pdf->Cell($linwp/4.5,9,'EXAM VENUE : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,3,$data['exm_venue'].'(VenueCode:'.$data['exm_venue_code'].')',0,'L');

$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->Line($get_x+110,$get_y+7,$get_x+150,$get_y+7);

$pdf->SetXY($get_x+110,$get_y+9);
$pdf->Cell($linwp/4,3,'SIGNATURE OF CANDIDATE',0,1,'L');


$pdf->SetFont('Arial','BU',$fntsz);
$pdf->Cell($linwp,6,'# IMPORTANT INSTRUCTIONS #',0,1,'C');
$pdf->SetFont('Arial','',$fntsz-1);
$pdf->Cell($linwp,3,'1. Candidates should check the e-Admit card carefully and bring discrepancies, if any, to the notice of the DLSC, North 24 Parganas through email id (dprdon24pgs@gmail.com).',0,1,'L');
$pdf->MultiCell($linwp,3,'2. Candidate  shall bring a Photo bearing  authentic documents along with e-admit card i.e. any one of the following documents: madhyamik or equivalent certificate bearing  photograph /PASSPORT /PAN card /EPIC  (voter  identity card)  / Driving License and / Aadhar  Card  /  SC / ST/ OBC Certificate.',0,'L');
$pdf->MultiCell($linwp,3,'3. ADMISSION TO THE  EXAMINATION HALL  IS  PURELY PROVISIONAL SUBJECT TO DETERMINATION OF ELIGIBILITY IN TERMS OF THE ADVERTISEMENT.',0,'L');
$pdf->Cell($linwp,3,'4. Under no circumstance, admission will be allowed without this e-admit card (Hard Copy).',0,1,'L');
$pdf->Cell($linwp,3,'5. He/She will have to bring his/her own BLACK BALL POINT PEN. Question paper and Answer Sheet(OMR) will be supplied in the examination center.',0,1,'L');
$pdf->MultiCell($linwp,4,'6. CARRYING OF MOBILE PHONE / CALCULATOR OR ANY SORT OF ELECTRONIC GADGET / CORRECTION FLUID / BAG WILL NOT BE PERMITTED WITHIN THE EXAMINATION VENUE.AUTHORITY WILL HAVE NO RESPONSIBILITY FOR CUSTODY OF SUCH ARTICLES.',0,'L');
$pdf->Cell($linwp,3,'7. No TA/DA will be admissible for appearing for the written test.',0,1,'L');
$pdf->Cell($linwp,3,'8. Candidates should enter the examination hall 30 (thirty) minutes before commencement of the examination.',0,1,'L');
$pdf->Cell($linwp,3,'9. There will be NEGATIVE MARKS @0.25 marks per wrong answer.PLEASE BE CAREFUL WHILE ANSWERING.',0,1,'L');
$pdf->Cell($linwp,3,'10. Admission to the Examination Hall will not be allowed after 10 (ten) minutes of the scheduled time for commencement of the examination.',0,1,'L');
$pdf->Cell($linwp,3,'11. Issuance of Admit Card does not provide guarantee for selection of any post.',0,1,'L');
$pdf->Cell($linwp,3,'12. No candidate will be allowed to leave the examination hall before full expiry of the scheduled hour  of conclusion of the examination.',0,1,'L');
$pdf->Cell($linwp,3,'13. No request of change of venue of examination will be entertained.',0,1,'L');
$pdf->MultiCell($linwp,3,'14. Candidate should not sign in advance  in the lower portion of the Admit Card (specified for Office use). This has to be done at the time of written examination before the invigilator only.',0,'L');
$pdf->MultiCell($linwp,3,'15. MCQ Test for NIRMAN SAHAYAK will be of 85 marks. The test shall be on English-13 Marks, General Knowledge-07 Marks, Civil Engg.-65 Marks.',0,'L');
$pdf->MultiCell($linwp,3,'16. MCQ Test for EXECUTIVE ASSISTANT will be of 85 marks. The test shall be on English-25 Marks, Bengali-25 Marks, Arithmetic-25 Marks,General Knowledge (Special Emphasis on Rural Life and Rural Development)-10 Marks.',0,'L');


$pdf->SetFont('Arial','',$fntsz-1.5);
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->Image('dm_sign.jpg',132,$get_y,8,10);

$pdf->SetXY($get_x+110,$get_y+12);
$pdf->Cell($linwp/5,3,'DISTRICT MAGISTRATE',0,1,'C');

$pdf->SetXY($get_x+110,$get_y+15);
$pdf->Cell($linwp/5,3,'&',0,1,'C');

$pdf->SetXY($get_x+110,$get_y+19);
$pdf->Cell($linwp/5,3,'CHAIRMAN, DISTRICT LEVEL SELECTION COMMITTEE',0,1,'C');

$pdf->SetXY($get_x+110,$get_y+22);
$pdf->Cell($linwp/5,3,'NORTH 24PARGANAS',0,1,'C');

$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->Line($get_x,$get_y+3,$get_x+$linwp,$get_y+3);

$pdf->SetFont('Arial','',$fntsz-2);
$pdf->SetXY($get_x,$get_y+4);
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
$pdf->Cell($linwp/4.5,8,'FATHER\'S NAME : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,4,$var=$data['cand_fh_nm'],0,'L');

$pdf->Cell($linwp/4.5,9,'ADDRESS : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,3,$data['cand_p_add'].'. BLK/MUNI/GP: '.$data['cand_p_block'].'. PO: '.$data['cand_p_po'].'. PS: '.$var=$data['cand_p_ps'].'. PIN: '.$var=$data['cand_p_pin'],0,'L');

$pdf->Cell($linwp/4.5,6,'POST : ',0,0,'L');
$pdf->Cell($linwp/4,6,$var_post,0,0,'L');
$pdf->Cell($linwp/9,6,'CATEGORY : ',0,0,'L');
$pdf->Cell($linwp/9,6,$data['cand_community'],0,1,'L');

$pdf->Cell($linwp/4.5,6,'ROLL : ',0,0,'L');
$pdf->Cell($linwp/4,6,$data['exm_roll'],0,0,'L');
$pdf->Cell($linwp/5,6,'DATE OF EXAMINATION : ',0,0,'L');
$pdf->Cell($linwp/9,6,$data['exm_date'],0,1,'L');

$pdf->Cell($linwp/4.5,6,'TIME : ',0,0,'L');
$pdf->Cell($linwp/4,6,$data['exm_time'],0,0,'L');
$pdf->Cell($linwp/5,6,'DURATION OF EXMINATION : ',0,0,'L');
$pdf->Cell($linwp/9,6,$data['exm_duration'].' HOURS',0,1,'L');

$pdf->Cell($linwp/4.5,9,'EXAM VENUE : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,3,$data['exm_venue'].'(VenueCode:'.$data['exm_venue_code'].')',0,'L');

$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->Line($get_x+20,$get_y+7,$get_x+70,$get_y+7);
$pdf->Line($get_x+110,$get_y+7,$get_x+155,$get_y+7);

$pdf->SetXY($get_x+20,$get_y+8);
$pdf->Cell($linwp/4,2,'SIGNATURE OF CANDIDATE ',0,0,'C');
$pdf->Cell($linwp/1.5,2,'SIGNATURE OF INVIGILATOR ',0,1,'C');

$pdf->Cell($linwp/2.2,3,'( IN PRESENCE OF INVIGILATOR )',0,0,'C');
$pdf->Output();
?>