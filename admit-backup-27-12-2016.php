<?php
session_start();
include("include_web/common.php");
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
	window.location='slip_print.php';
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
$pdf->SetFont('Arial','',$fntsz);
$posy=$pdf->GetY();
$pdf->Cell($linwp,3,'DISTRICT LEVEL SELECTION COMMITTEE',0,1,'C');
$pdf->Cell($linwp,3,'NORTH 24 PARGANAS',0,1,'C');
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linwp,3,'ADMIT CARD FOR THE WRITTEN EXAMINATION FOR THE POST OF ',0,1,'C');
$pdf->Cell($linwp,3,'EXECUTIVE ASSISTANT/NIRMAN SAHAYAK UNDER NORTH 24 PARGANAS',0,1,'C');
$pdf->SetFont('Arial','BU',$fntsz+2);
$pdf->Cell($linwp,6,'ADMIT CARD',0,1,'C');
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
$pdf->Image($cand_sig,162,$posy+45,45,22);
/*$pdf->SetFont('Arial','',$fntsz-2);
$pdf->MultiCell(30,8,'PHOTOGRAPH OF CANDIDATE WITH SIGNATURE',1,'C');
*/
$pdf->SetXY($get_x,$get_y);

$pdf->SetFont('Arial','',$fntsz);
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
$pdf->MultiCell($linwp/1.8,3,$data['cand_p_add'].' '.$data['cand_p_block'].' '.$data['cand_p_po'].' '.$var=$data['cand_p_ps'].' '.$var=$data['cand_p_pin'],0,'L');

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
$pdf->Cell($linwp/4.5,6,'DURATION OF EXMINAITION : ',0,0,'L');
$pdf->Cell($linwp/9,6,$data['exm_duration'].' HOURS',0,1,'L');

$pdf->Cell($linwp/4.5,9,'EXAM VENUE : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,3,$data['exm_venue'],0,'L');

$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->Line($get_x+110,$get_y+7,$get_x+150,$get_y+7);

$pdf->SetXY($get_x+110,$get_y+9);
$pdf->Cell($linwp/4,3,'SIGNATURE OF CANDIDATE',0,1,'L');


$pdf->SetFont('Arial','BU',$fntsz);
$pdf->Cell($linwp,6,'IMPORTANT INSTRUCTIONS',0,1,'C');
$pdf->SetFont('Arial','',$fntsz-1);
$pdf->Cell($linwp,4,'1. Candidates should check the e-Admit card carefully and bring discrepancies, if any, to the notice of the DLSC, North 24 Parganas.',0,1,'L');
$pdf->MultiCell($linwp,4,'2. Candidate  shall bring a Photo bearing  authentic documents along with e-admit card i.e. any one of the following documents: / madhyamik or equivalent certificate bearing  photograph /PASSPORT /PAN card /EPIC  (voter  identity card)  / Driving License and / Aadhar  Card  /  SCI ST/ OBC Certificate.',0,'L');
$pdf->MultiCell($linwp,4,'3. ADMISSION TO THE  EXAMINATION HALL  IS  PURELY PROVISIONAL SUBJECT TO PRODUCTION OF AUTHENTIC DOCUMENT AS MENTIONED IN SL. NO. 2.',0,'L');
$pdf->Cell($linwp,4,'4. Under no circumstance, admission will be allowed without  this e-admit card.',0,1,'L');
$pdf->Cell($linwp,4,'5. You may kindly note that, no Travelling Expenses will be admissible for appearing the written test.',0,1,'L');
$pdf->Cell($linwp,4,'6. Admission to the Examination Hall will not be allowed after 10 (ten) minutes of the  scheduled time for commence of the examination.',0,1,'L');
$pdf->Cell($linwp,4,'7. Candidates should enter the examination hall 30 (thirty) minutes before commencement of the examination.',0,1,'L');
$pdf->Cell($linwp,4,'8.  No request for change of venue of the examination will be entertained.',0,1,'L');
$pdf->Cell($linwp,4,'9. No candidate will be allowed to leave the examination hall before full expiry of the scheduled hour  of conclusion of the examination.',0,1,'L');
$pdf->Cell($linwp,4,'10. Adoption  of any kind of unfair means during  the hours of examination will entail penal action as would deem fit by the committee.',0,1,'L');
$pdf->MultiCell($linwp,4,'11. Candidate should not sign in advance  in the lower portion of the Admit Card (specified for Office use). This has to be done at the time of written examination before the invigilator only.Candidate should bring black ball point pen for filling of OMR sheet.',0,'L');
$pdf->MultiCell($linwp,4,'CARRYING/USING ANY TYPE OF PAPERS I NOTES/  BOOKS/ CORRECTION FLUID/ CALCULATOR /MOBILE PHONE / ELECTRONIC GADGET COMMUNICATION  INSIDE  THE EXAMINATION HALL IS STRICTLY PROHIBITED. INFRINGEMENT OF  THIS INSTRUCTION WILL ATTRACT PENAL ACTION.',1,'L');

$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->Image('dm_sign.jpg',132,$get_y+8,8,10);

$pdf->SetXY($get_x+110,$get_y+20);
$pdf->Cell($linwp/5,3,'DISTRIC MAGISTRATE',0,1,'C');

$pdf->SetXY($get_x+110,$get_y+23);
$pdf->Cell($linwp/5,3,'&',0,1,'C');

$pdf->SetXY($get_x+110,$get_y+27);
$pdf->Cell($linwp/5,3,'CHAIRMAN, DISTRICT LEVEL SELECTION COMMITTEE',0,1,'C');

$pdf->SetXY($get_x+110,$get_y+30);
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
$pdf->Image($cand_sig,160,$posyl+25,45,22);
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
$pdf->MultiCell($linwp/1.8,3,$data['cand_p_add'].' '.$data['cand_p_block'].' '.$data['cand_p_po'].' '.$var=$data['cand_p_ps'].' '.$var=$data['cand_p_pin'],0,'L');

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
$pdf->Cell($linwp/4.5,6,'DURATION OF EXMINAITION : ',0,0,'L');
$pdf->Cell($linwp/9,6,$data['exm_duration'].' HOURS',0,1,'L');

$pdf->Cell($linwp/4.5,9,'EXAM VENUE : ',0,0,'L');
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y+2);
$pdf->MultiCell($linwp/1.8,3,$data['exm_venue'],0,'L');

$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->Line($get_x+20,$get_y+7,$get_x+70,$get_y+7);
$pdf->Line($get_x+110,$get_y+7,$get_x+155,$get_y+7);

$pdf->SetXY($get_x+20,$get_y+8);
$pdf->Cell($linwp/4,2,'SIGNATURE OF CANDIDATE ',0,0,'C');
$pdf->Cell($linwp/1.5,2,'SIGNATURE OF INVIGILATOR ',0,1,'C');

$pdf->Cell($linwp/2.2,3,'( IN PRESENCE OF INVIGILATOR )',0,0,'C');
$pdf->Cell($linwp/1.2,3,'(OVER LEAF FOR GUIDANCE)',0,1,'C');

$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','BU',10);

/*--------------------------------------------- 2nd Page instruction ---------------------------------------------*/

$pdf->Cell($linwp,10,'RULES FOR THE GUIDANCE OF CANDIDATE',0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->MultiCell($linwp,8,'Each candidat e must carefully  read  the following instructions. Failing  to observe  any instruction will render him/ her liable to such punishment as the DLSC may deem f it to impose.',0,'L');
$pdf->MultiCell($linwp,8,'1. Candidates  must produce  their  e-admit  cards, sign  on  the  attendance  sheets  and  help  the invigilators  whenever   any  clarification  or  specific  information  regarding  their  candidature is needed.',0,'L');
$pdf->MultiCell($linwp,8,'2. Candidates must also abide by such other  instructions as may be specified on the cover page of the  answer-books  of  any  other  instructions which  may  be  given  by  the  supervisor  of  the examination.  If a candidate  fails to do so, he/ she will render  himself/herself  liable  to expulsion from the examination  and/or such other punishment as the DLSC may deem fit to impose.',0,'L');
$pdf->MultiCell($linwp,8,'3. Candidates must  attempt questions  in accordance  with  directions laid down on each question paper.If questions  are attempted in  excess of  the  prescribed  number, only answer to those attempted first up to the prescribed number shall be valued and the remaining ones ignored.',0,'L');
$pdf->MultiCell($linwp,8,'4. The assessment and evaluation of answer-scripts done by the DLSC shall be treated as final and shall not be open to scrutiny by any external authority.',0,'L');
$pdf->MultiCell($linwp,8,'5. Candidates detected while adopting or making an attempt to adopt unfair means or copying or allowing other(s) to  copy  or  communicating  with  one  another  or found  in  possession of unauthorised shall be liable to expulsion from the examination centre  or such other pumshment as the DLSC may deem fit to impose.',0,'L');
$pdf->MultiCell($linwp,8,'6. The  DLSC reserves the right for any reason which may appear to be sufficient to cancel the candidature of any candidate. The DLSC may also cancel the candidature of any candidate even after publication of the results if  there  are reason(s) to  believe that the candidate has adopted unfair means during the examination. If at any stage, even after  issue of the letter of appointment, a candidate is found ineligible in terms of advertisement, his/ her candidature will be cancelled without further reference to him/ her .',0,'L');
$pdf->MultiCell($linwp,8,'7. Affix a stamp size photograph with signature in the counter part of the admit card for office use.',0,'L');
$pdf->Output();
?>