<?php
session_start();
include("include_web/common.php");
require('fpdf.php');
/*
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
*/
// ack via roll
if(isset($_REQUEST['roll']))
{
		$rep_char = array("&", "@", "#", "{", "}", "\\", "\"", "'", ";", " AND ", " and ", " OR ", " or ", "WFXSSProbe", "wfxssprobe");
		$cand_app_no=str_replace($rep_char,"",strip_tags($_REQUEST['roll']));
		//$cand_dob=str_replace($rep_char,"",strip_tags($_REQUEST['cd']));
		$link=@mysql_connect($dbs,$user,$pass) or die ("Error during connection");
		mysql_select_db($db,$link); 
		$data_reg=mysql_query("select * from online_app_zp_ttb where exm_roll=".$cand_app_no."");
		mysql_close($link);
		$data=mysql_fetch_array($data_reg);
}
// ack via roll
else
{
	?>
	<script language="javascript">
	window.location='slip_print_roll.php';
	</script>
	<?php 
	exit();
}
if(mysql_num_rows($data_reg)==0)
{
	?>
	<script language="javascript">
	window.location='slip_print_roll.php';
	</script>
	<?php 
	exit();
}
$fntsz=10;
$linwp=185;
$linw=150;
$pdf = new FPDF();
$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','BU',$fntsz+4);
$pdf->Cell($linwp,8,'District Level Selection Committee North 24 Parganas',0,1,'C');
$pdf->SetFont('Arial','I',$fntsz);
$pdf->Cell($linwp,8,'PRINTED APPLICATION FORM FOR THE POST OF NIRMAN SAHAYAK / EXECUTIVE ASSISTANT',0,1,'C');
$pdf->Cell($linwp,0,'',1,1,'C');
//blank line
$pdf->Cell($linwp,6,'',0,1,'C');
$pdf->SetFont('Arial','I',$fntsz-3);
$pdf->MultiCell($linwp,6,'**NO CLAIM FOR BEING A MEMBER OF THE SC, ST AND BC OR A PERSON WITH DISABILITY WILL BE ENTERTAINED AFTER SUBMISSION OF THE APPLICATION.',0,'L');
$pdf->MultiCell($linwp,6,'**SUBMISSION OF MORE THAN ONE APPLICATION FOR A SINGLE POST IS STRICTLY FORBIDDEN. THE CANDIDATURE OF A CANDIDATE WHO SUBMITS MORE THAN ONE APPLICATION FOR A SINGLE POST FOR ADMISSION TO THE EXAMINATION, WILL BE CANCELLED EVEN IF HE/SHE IS ADMITTED TO THE SAME.',0,'L');
$pdf->MultiCell($linwp,6,'** A CANDIDATE SHOULD NOTE THAT HIS/HER ADMISSION TO THE EXAMINATION WILL BE DEEMED PROVISIONAL SUBJECT TO DETERMINATION OF HIS/HER ELIGIBILITY IN ALL RESPECTS. IF AT ANY STAGE EVEN AFTER ISSUE OF THE LETTER OF APPOINTMENT A CANDIDATE IS FOUND INELIGIBLE FOR ADMISSION TO THIS EXAMINATION, HIS/HER CANDIDATURE WILL BE CANCELLED WITHOUT FURTHER REFERENCE TO HIM/HER.',0,'L');

//blank line
$pdf->Cell($linw,4,'',0,1,'C');

$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'REGISTRATION NO',0,0,'L');
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$data['cand_app_no']."         Roll-".$data['exm_roll']."",0,1,'L');

$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'CANDIDATE PICTURE',0,0,'L');
$pdf->Image($data['cand_p_pic'],$linw/2.15,95,30,40);

//blank line

$pdf->Cell($linw,48,'',0,1,'C');
$pdf->Cell($linw/2.5,8,'SIGNATURE',0,1,'L');
$pdf->Image($data['cand_p_sig'],70,140,30,10);

$pdf->Cell($linw,5,'',0,1,'C');

$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'POST APPLIED FOR',0,0,'L');
$pdf->SetFont('Arial','',$fntsz);
$var='';
if($data["cand_post"]=="post1"){$var="EXECUTIVE ASSISTANT";}
if($data["cand_post"]=="post2"){$var="NIRMAN SAHAYAK";}
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'NAME OF THE CANDIDATE',0,0,'L');
if($data['cand_nm']!=''){$var_nm=$data['cand_nm'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var_nm,0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'FATHER`S / HUSBAND`S NAME',0,0,'L');
if($data['cand_fh_nm']!=''){$var=$data['cand_fh_nm'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'CATEGORY',0,0,'L');
if($data['cand_community']!=''){$var=$data['cand_community'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'GENDER',0,0,'L');
if($data['cand_sex']=='M'){$var="MALE";}
if($data['cand_sex']=='F'){$var="FEMALE";}
if($data['cand_sex']=='O'){$var="THIRD GENDER";}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'YOU ARE',0,0,'L');

$pdf->SetFont('Arial','',$fntsz);

$var='';
if($data['ck_ex_serv']=='on')
{
$var=' EX - SERVICEMAN WITH ACTUAL '. $data['ex_serv_yr'].' YR OF SERVICE';
$pdf->Cell($linw/2.5,8,$var,0,2,'L');
}	
if($data['ck_ec']=='on')
{$var='EXEMPTED CATEGORY';
$pdf->Cell($linw/2.5,8,$var,0,2,'L');
}
if($data['ck_msp']=='on')
{
$var='MERITORIOUS SPORTS PERSON';
$pdf->Cell($linw/2.5,8,$var,0,1,'L');
}

$pdf->Cell($linw/2.5,8,'',0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'CITIZEN',0,0,'L');
if($data['ck_citizen']=='on'){$var='CITIZEN OF INDIAN AS DEFINED IN  PART-II OF THE CONSTITUTION OF INDIA';}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'DATE OF BIRTH',0,0,'L');
if($data['cand_dob']!=''){
					list($year,$month,$date)=preg_split("/[\/]|[-]+/",$data['cand_dob']);
					$cand_dob=$date."/".$month."/".$year;
					$var=$cand_dob;
					}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'AGE',0,0,'L');
if($data['cand_age']!=''){$var=$data['cand_age'];}$var.=' Years';
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'MOBILE NO',0,0,'L');
if($data['cand_phone']!=''){$var='+91'.$data['cand_phone'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');


$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'EMAIL',0,0,'L');
if($data['cand_mail']!=''){$var_email=$data['cand_mail'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var_email,0,1,'L');

$pdf->SetFont('Arial','BU',$fntsz+2);
$pdf->Cell($linw/2.5,8,'COMMUNICATING ADDRESS',0,1,'L');

$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'ADDRESS',0,0,'L');
if($data['cand_p_add']!=''){$var_p_add=$data['cand_p_add'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var_p_add,0,1,'L');
$var_p_block='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,6,'BLOCK / MUNICIPALITY /',0,0,'L');
if($data['cand_p_block']!=''){$var_p_block=$data['cand_p_block'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,6,$var_p_block,0,1,'L');
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,6,'GRAM PANCHAYAT',0,1,'L');


$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'POST OFFICE',0,0,'L');
if($data['cand_p_po']!=''){$var=$data['cand_p_po'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'POLICE STATION',0,0,'L');
if($data['cand_p_ps']!=''){$var=$data['cand_p_ps'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'PIN',0,0,'L');
if($data['cand_p_pin']!=''){$var=$data['cand_p_pin'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$pdf->SetFont('Arial','BU',$fntsz+2);
$pdf->Cell($linw/2.5,8,'PERMANENT ADDRESS',0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'ADDRESS',0,0,'L');
if($data['cand_c_add']!=''){$var=$data['cand_c_add'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,6,'BLOCK / MUNICIPALITY /',0,0,'L');
if($data['cand_c_block']!=''){$var=$data['cand_c_block'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,6,$var,0,1,'L');
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,6,'GRAM PANCHAYAT',0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'POST OFFICE',0,0,'L');
if($data['cand_c_po']!=''){$var=$data['cand_c_po'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'POLICE STATION',0,0,'L');
if($data['cand_c_ps']!=''){$var=$data['cand_c_ps'];}
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$var='';
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'PIN',0,0,'L');
$pdf->SetFont('Arial','',$fntsz);
if($data['cand_c_pin']!=''){$var=$data['cand_c_pin'];}
$pdf->Cell($linw/2.5,8,$var,0,1,'L');

$pdf->SetFont('Arial','BU',$fntsz+2);
$pdf->Cell($linw/2.5,8,'EDUCATIONAL (ESSENTIAL AND/OR DESIRABLE) QUALIFICATION',0,1,'L');

//table 
$colw=30;
// row headeing
$pdf->SetFont('Arial','B',$fntsz-2);
$pdf->Cell($colw*1.6,8,'NAME OF THE EXAM',1,0,'L');
$pdf->SetFont('Arial','B',$fntsz-2);
$pdf->Cell($colw*1.6,8,'BOARD/UNIVERSITY',1,0,'L');
$pdf->SetFont('Arial','B',$fntsz-2);
$pdf->Cell($colw*1.6,8,'STREAM OR SUBJECTS',1,0,'L');
$pdf->SetFont('Arial','B',$fntsz-2);
$pdf->Cell($colw*.7,8,'% OF MARKS',1,0,'L');
$pdf->SetFont('Arial','B',$fntsz-3);
$pdf->Cell($colw*.9,8,'YEAR OF PASSING',1,1,'L');

// g
//row 1
if($data['ee1_1']!='' && $data['ee1_1']!='NA'){


$get_x=$pdf->GetX();$get_y=$pdf->GetY();

$pdf->SetXY($get_x,$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x,$get_y+.5);
$pdf->MultiCell($colw*1.6,3,'MADHYAMIK OR ITS EQUIVALENT EXAMINATION',0,'L');

$pdf->SetXY($get_x+($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['ee1_1'],0,'L');

$pdf->SetXY($get_x+2*($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+2*($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['ee1_2'],0,'L');

$d=preg_split("/[.]/",$data['ee1_3']);
					$m='';
					if(sizeof($d)!=0){
						if($d[0]<10){$m='0'.$d[0];}
						else{$m=$d[0];}
					}else{$m='00';}
					$m.='.';
					if(sizeof($d)==2){
						if($d[1]<10){$m.=$d[1].'0';}
						else{$m.=$d[1];}
					}else{$m.='00';}
					$var=$m;
$pdf->SetXY($get_x+3*($colw*1.6),$get_y);
$pdf->Cell($colw*.7,13.5,$var,1,0,'L');
$pdf->Cell($colw*.9,13.5,$data['ee1_4'],1,1,'L');
$pdf->SetXY($get_x,$get_y+13.5); 
}
//row 2
if($data['ee2_1']!='' && $data['ee2_1']!='NA')
{
	
$get_x=$pdf->GetX();$get_y=$pdf->GetY();

$pdf->SetXY($get_x,$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x,$get_y+.5);
$pdf->MultiCell($colw*1.6,3,'HIGHER SECONDARY OR ITS EQUIVALENT EXAMINATION',0,'L');

$pdf->SetXY($get_x+($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['ee2_1'],0,'L');

$pdf->SetXY($get_x+2*($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+2*($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['ee2_2'],0,'L');
$d=preg_split("/[.]/",$data['ee2_3']);
					$m='';
					if(sizeof($d)!=0){
						if($d[0]<10){$m='0'.$d[0];}
						else{$m=$d[0];}
					}else{$m='00';}
					$m.='.';
					if(sizeof($d)==2){
						if($d[1]<10){$m.=$d[1].'0';}
						else{$m.=$d[1];}
					}else{$m.='00';}
					$var=$m;
$pdf->SetXY($get_x+3*($colw*1.6),$get_y);
$pdf->Cell($colw*.7,13.5,$var,1,0,'L');
$pdf->Cell($colw*.9,13.5,$data['ee2_4'],1,1,'L');
$pdf->SetXY($get_x,$get_y+13.5); 
}
//row 3
if($data['ee3_1']!='' && $data['ee3_1']!='NA'){
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x,$get_y+.5);
$pdf->MultiCell($colw*1.6,3,'DIPLOMA OR ITS EQUIVALENT EXAMINATION',0,'L');

$pdf->SetXY($get_x+($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['ee3_1'],0,'L');

$pdf->SetXY($get_x+2*($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+2*($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['ee3_2'],0,'L');

$d=preg_split("/[.]/",$data['ee3_3']);
					$m='';
					if(sizeof($d)!=0){
						if($d[0]<10){$m='0'.$d[0];}
						else{$m=$d[0];}
					}else{$m='00';}
					$m.='.';
					if(sizeof($d)==2){
						if($d[1]<10){$m.=$d[1].'0';}
						else{$m.=$d[1];}
					}else{$m.='00';}
					$var=$m;
$pdf->SetXY($get_x+3*($colw*1.6),$get_y);
$pdf->Cell($colw*.7,13.5,$var,1,0,'L');
$pdf->Cell($colw*.9,13.5,$data['ee3_4'],1,1,'L');
$pdf->SetXY($get_x,$get_y+13.5); 
}

//row 3
if($data['ee4_1']!='' && $data['ee4_1']!='NA'){
$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x,$get_y+.5);
$pdf->MultiCell($colw*1.6,3,'GRADUATION OR BACHELOR\'S DEGREE OR ITS EQUIVALENT EXAMINATION',0,'L');

$pdf->SetXY($get_x+($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['ee4_1'],0,'L');

$pdf->SetXY($get_x+2*($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+2*($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['ee4_2'],0,'L');

$d=preg_split("/[.]/",$data['ee4_3']);
					$m='';
					if(sizeof($d)!=0){
						if($d[0]<10){$m='0'.$d[0];}
						else{$m=$d[0];}
					}else{$m='00';}
					$m.='.';
					if(sizeof($d)==2){
						if($d[1]<10){$m.=$d[1].'0';}
						else{$m.=$d[1];}
					}else{$m.='00';}
					$var=$m;
$pdf->SetXY($get_x+3*($colw*1.6),$get_y);
$pdf->Cell($colw*.7,13.5,$var,1,0,'L');
$pdf->Cell($colw*.9,13.5,$data['ee4_4'],1,1,'L');
$pdf->SetXY($get_x,$get_y+13.5);
}

if($data['ee5_1']!='' && $data['ee5_1']!='NA'){

$get_x=$pdf->GetX();$get_y=$pdf->GetY();
$pdf->SetXY($get_x,$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x,$get_y+.5);
$pdf->MultiCell($colw*1.6,3,'POST GRADUATE OR ITS EQUIVALENT EXAMINATION',0,'L');

$pdf->SetXY($get_x+($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['ee5_1'],0,'L');

$pdf->SetXY($get_x+2*($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+2*($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['ee5_2'],0,'L');

$d=preg_split("/[.]/",$data['ee5_3']);
					$m='';
					if(sizeof($d)!=0){
						if($d[0]<10){$m='0'.$d[0];}
						else{$m=$d[0];}
					}else{$m='00';}
					$m.='.';
					if(sizeof($d)==2){
						if($d[1]<10){$m.=$d[1].'0';}
						else{$m.=$d[1];}
					}else{$m.='00';}
					$var=$m;
$pdf->SetXY($get_x+3*($colw*1.6),$get_y);
$pdf->Cell($colw*.7,13.5,$var,1,0,'L');
$pdf->Cell($colw*.9,13.5,$data['ee5_4'],1,1,'L');
$pdf->SetXY($get_x,$get_y+13.5);
}
if($data['post1_1']!='')
{
	
// row headeing
$pdf->SetFont('Arial','B',$fntsz-2);
$pdf->Cell($colw*1.6,8,'EXPERIENCE',1,0,'L');
$pdf->SetFont('Arial','B',$fntsz-2);
$pdf->Cell($colw*1.6,8,'NAME OF OFFICE/INSTITUTE',1,0,'L');
$pdf->SetFont('Arial','B',$fntsz-2);
$pdf->Cell($colw*1.6,8,'ADDRESS OF OFFICE/INSTITUTE',1,0,'L');
$pdf->SetFont('Arial','B',$fntsz-2);
$pdf->Cell($colw*1.6,8,'NO. OFYEARS WORKED',1,1,'L');

$get_x=$pdf->GetX();$get_y=$pdf->GetY();

$pdf->SetXY($get_x,$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x,$get_y+.5);
$pdf->MultiCell($colw*1.6,3,'EXPERIENCE IN SOCIAL WORK OR RURAL  DEVELOPMENT',0,'L');

$pdf->SetXY($get_x+($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['post1_1'],0,'L');

$pdf->SetXY($get_x+2*($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+2*($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['post1_2'],0,'L');

$pdf->SetXY($get_x+3*($colw*1.6),$get_y);
$pdf->Cell($colw*1.6,13.5,'',1,0,'L');
$pdf->SetXY($get_x+3*($colw*1.6),$get_y+.5);
$pdf->MultiCell($colw*1.6,3,$data['post1_3'],0,'L');

$pdf->SetXY($get_x,$get_y+13.5);
}


$pdf->Cell($linw,6,'',0,1,'C');
$pdf->SetFont('Arial','BU',$fntsz+2);
$pdf->Cell($linw/2.5,8,'DECLARATION',0,1,'L');

$pdf->SetFont('Arial','I',$fntsz-3);
$pdf->MultiCell($linwp,6,'I HAVE GONE THROUGH THE INSTRUCTION SHEET AVAILABLE IN THE WEBSITE AND FILLED IN APPLICATION FORM ACCORDINGLY. I HEREBY DECLARE THAT ALL THE STATEMENTS MADE BY ME IN THE APPLICATION FORM AND THE INFORMATION SHEETS ARE TRUE AND COMPLETE TO THE BEST OF MY KNOWLEDGE AND BELIEF AND NOTHING HAS BEEN CONCEALED OR SUPPRESSED. I ALSO DECLARE, I HAVE GONE THROUGH THE INSTRUCTIONS NOTED AND ENTERED INFORMATION AS PER INSTRUCTION. I ALSO UNDERSTAND THAT IN CASE, ANY OF MY STATEMENTS IS FOUND INCORRECT OR FALSE DURING ANY STAGE OF RECRUITMENT OR THEREAFTER, I SHALL BE DISQUALIFIED FOR THE POST APPLIED FOR AND I SHALL ALSO BE LIABLE FOR ANY OTHER PENAL ACTION UNDER THE EXISTING RULES WITHOUT FURTHER INTIMATION.',0,'L');
$pdf->SetFont('Arial','B',$fntsz);

$date=date_create($data['cand_app_dt']);
$datefmt=date_format($date,"d/m/Y");
//blank line
$pdf->Cell($linw,6,'',0,1,'C');
$pdf->SetFont('Arial','B',$fntsz);
$pdf->Cell($linw/2.5,8,'DATE',0,0,'L');
$pdf->SetFont('Arial','',$fntsz);
$pdf->Cell($linw/2.5,8,$datefmt,0,1,'L');

$filename=$cand_app_no.".pdf";
//$pdf->Output();
$pdf->Output($filename,'D');
?>