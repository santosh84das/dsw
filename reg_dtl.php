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
	<div align="center" class="main_body">
    	<div align="center">
        	<span class="style4"><u><span class="style10">District Level Selection Committee North  24 Parganas</span></u></span><br />
            <span class="style14">
			PRINTED APPLICATION FORM FOR THE POST OF<br />
            EXECUTIVE ASSISTANT / NIRMAN SAHAYAK /<br />
            ACCOUNT CLERK(PS) / CLERK-CUM-TYPIST(PS) /<br />
            SAMITI EDUCATION OFFICER / GRAM PANCHAYAT SECRETARY<br />
            UNDER DIFFERENT GRAM PANCHAYATS/PANCHAYAT SAMITIS OF  NORTH 24 PARGANAS.<br /><hr />
            <br />
        	</span>       	
       	</div>';
if(isset($_REQUEST['r_no'])){
		$rep_char = array("&", "@", "#", "{", "}", "\\", "\"", "'", ";", " AND ", " and ", " OR ", " or ", "WFXSSProbe", "wfxssprobe");
		$r_no=str_replace($rep_char,"",strip_tags($_REQUEST['r_no']));
		$data_reg=mysql_query("select * from online_app_zp_ttb where r_no='".$r_no."'");
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
$var.='<div id="op_com_app_dtl">
        	<div id="c_dtl">
                	    	<div class="style18" style="padding-bottom:5px;"><span class="style16">** </span>NO CLAIM FOR BEING A MEMBER OF THE SC, ST AND BC OR A PERSON WITH DISABILITY WILL BE ENTERTAINED AFTER SUBMISSION OF THE APPLICATION.<br /></div>
                	    	<div class="style18" style="padding-bottom:5px;"><span class="style16">** </span>SUBMISSION OF MORE THAN ONE APPLICATION FOR A SINGLE POST IS STRICTLY FORBIDDEN. THE CANDIDATURE OF A CANDIDATE WHO SUBMITS MORE THAN ONE APPLICATION FOR A SINGLE POST FOR ADMISSION TO THE EXAMINATION, WILL BE CANCELLED EVEN IF HE/SHE IS ADMITTED TO THE SAME.<br /></div>
                	    	<div class="style18"><span class="style16">** </span>A CANDIDATE SHOULD NOTE THAT HIS/HER ADMISSION TO THE EXAMINATION WILL BE DEEMED PROVISIONAL SUBJECT TO DETERMINATION OF HIS/HER ELIGIBILITY IN ALL RESPECTS. IF AT ANY STAGE EVEN AFTER ISSUE OF THE LETTER OF APPOINTMENT A CANDIDATE IS FOUND INELIGIBLE FOR ADMISSION TO THIS EXAMINATION, HIS/HER CANDIDATURE WILL BE CANCELLED WITHOUT FURTHER REFERENCE TO HIM/HER.
              	    	</div>
			</div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">REGISTRATION NO</div>
              	<div class="c_dtl_r">: '.$data["cand_app_no"];
$var.='			</div>
       		</div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">ROLL NO</div>
              	<div class="c_dtl_r">: '.$data["r_no"];
$var.='			</div>
       		</div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">POST APPLIED FOR</div>
              	<div class="c_dtl_r">: ';
					if($data["cand_post"]=="post1"){$var.="EXECUTIVE ASSISTANT";}
					if($data["cand_post"]=="post2"){$var.="NIRMAN SAHAYAK";}
					if($data["cand_post"]=="post3"){$var.="SAHAYAK";}
					if($data["cand_post"]=="post4"){$var.="BLOCK INFORMATICS OFFICER";}
					if($data["cand_post"]=="post5"){$var.="ACCOUNT CLERK(PS)";}
					if($data["cand_post"]=="post6"){$var.="CLERK-CUM-TYPIST(PS)";}
					if($data["cand_post"]=="post7"){$var.="DATA ENTRY OPERATOR(PS)";}
					if($data["cand_post"]=="post8"){$var.="SAMITI EDUCATION OFFICER";}
					if($data["cand_post"]=="post9"){$var.="GRAM PANCHAYAT SECRETARY";}
$var.='			</div>
       		</div>';
$var.='		<div id="c_dtl">
                <div class="c_dtl_l">NAME OF THE CANDIDATE</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_nm']!=''){$var.=$data['cand_nm'];}
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">FATHER`S / HUSBAND NAME</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_fh_nm']!=''){$var.=$data['cand_fh_nm'];}
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">COMMUNITY</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_community']!=''){$var.=$data['cand_community'];}
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">GENDER</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_sex']=='M'){$var.="MALE";}
				if($data['cand_sex']=='F'){$var.="FEMALE";}
$var.='    	  	</div>
            </div>';
if($data['ck_ex_serv']=='on' || $data['ck_blind']=='on' || $data['ck_hear']=='on' || $data['ck_loco']=='on'){
$var.='     <div id="c_dtl">
                <div class="c_dtl_l" style="vertical-align:top;">ARE YOU</div>
                <div class="c_dtl_r">';
					if($data['ck_ex_serv']=='on'){$var.=': EX - SERVICEMAN<br />';}
                    if($data['ck_blind']=='on'){$var.=': BLINDNESS OR LOW VISION WITH ';
					$d=preg_split("/[.]/",$data['txt_blind']);
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
					$var.=$m.' % OF DISABILITY<br />';}
                    if($data['ck_hear']=='on'){$var.=': HEARING IMPAIRMENT WITH ';
					$d=preg_split("/[.]/",$data['txt_hear']);
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
					$var.=$m.' % OF DISABILITY<br />';}
                    if($data['ck_loco']=='on'){$var.=': LOCO-MOTOR DISABILITY OR CEREBRAL PALSY WITH ';
					$d=preg_split("/[.]/",$data['txt_loco']);
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
					$var.=$m.' % OF DISABILITY<br />';}
$var.='         </div>
           	</div>';}	
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">CITIZEN</div>
              	<div class="c_dtl_r">: ';
				if($data['ck_citizen']=='on'){$var.='CITIZEN OF INDIAN AS DEFINED IN  PART-II OF THE CONSTITUTION OF INDIA';}
				
$var.='    	  	</div>
            </div>';	
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">DATE OF BIRTH</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_dob']!=''){
					list($year,$month,$date)=preg_split("/[\/]|[-]+/",$data['cand_dob']);
					$cand_dob=$date."/".$month."/".$year;
					$var.=$cand_dob;
					}
				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">AGE(as on 01-01-2012)</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_age']!=''){$var.=$data['cand_age'];}$var.=' Years';

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">MOBILE NO</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_phone']!=''){$var.='+91'.$data['cand_phone'];}

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">E-MAIL</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_mail']!=''){$var.=$data['cand_mail'];}

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_lb"><strong><u>COMMUNICATING ADDRESS</u></strong></div>
              	<div class="c_dtl_r">';

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">ADDRESS</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_p_add']!=''){$var.=$data['cand_p_add'];}

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">BLOCK / MUNICIPALITY / GRAM PANCHAYAT</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_p_block']!=''){$var.=$data['cand_p_block'];}

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">POST OFFICE</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_p_po']!=''){$var.=$data['cand_p_po'];}

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">POLICE STATIONS</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_p_ps']!=''){$var.=$data['cand_p_ps'];}

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">PIN</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_p_pin']!=''){$var.=$data['cand_p_pin'];}

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_lb"><strong><u>PERMANENT ADDRESS</u></strong></div>
              	<div class="c_dtl_r">';

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">ADDRESS</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_c_add']!=''){$var.=$data['cand_c_add'];}

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">BLOCK / MUNICIPALITY / GRAM PANCHAYAT</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_c_block']!=''){$var.=$data['cand_c_block'];}

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">POST OFFICE</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_c_po']!=''){$var.=$data['cand_c_po'];}

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">POLICE STATIONS</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_c_ps']!=''){$var.=$data['cand_c_ps'];}

				
$var.='    	  	</div>
            </div>';
$var.='    	<div id="c_dtl">
                <div class="c_dtl_l">PIN</div>
              	<div class="c_dtl_r">: ';
				if($data['cand_c_pin']!=''){$var.=$data['cand_c_pin'];}

				
$var.='    	  	</div>
            </div>';
$var.='<div id="c_dtl" class="break">
                <div class="c_dtl_all"><u>EDUCATIONAL (ESSENTIAL AND/OR DESIRABLE) QUALIFICATION</u></div>
            </div>
           	<div id="c_dtl">
                <table border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="150"><div align="center" class="style19">NAME OF THE EXAM</div></td>
                      	<td width="150"><div align="center" class="style19">BOARD/UNIVERSITY</div></td>
                      	<td width="120"><div align="center" class="style19">STREAM OR SUBJECTS </div></td>
                      	<td width="40"><div align="center" class="style19">%OF<br />MARKS</div></td>
                      	<td width="40"><div align="center" class="style19">YEAR OF<br />PASSING</div></td>
                  	</tr>';
					if($data['ee1_1']!='' && $data['ee1_1']!='NA'){
$var.='             <tr>
                        <td align="justify" style="padding:2px 4px"><span class="style21">MADHYAMIK OR ITS EQUIVALENT EXAMINATION</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee1_1'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee1_2'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">';
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
					$var.=$m.'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee1_4'].'</span></td>
               	  	</tr>';
                    }
					if($data['ee2_1']!='' && $data['ee2_1']!='NA'){
$var.='             <tr>
                        <td align="justify" style="padding:2px 4px"><span class="style21">HIGHER SECONDARY OR ITS EQUIVALENT EXAMINATION</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee2_1'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee2_2'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">';
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
					$var.=$m.'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee2_4'].'</span></td>
               	  	</tr>';
                    }
					if($data['ee3_1']!='' && $data['ee3_1']!='NA'){
$var.='             <tr>
                        <td align="justify" style="padding:2px 4px"><span class="style21">DIPLOMA OR ITS EQUIVALENT EXAMINATION</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee3_1'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee3_2'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">';
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
					$var.=$m.'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee3_4'].'</span></td>
               	  	</tr>';
                    }
					if($data['ee4_1']!='' && $data['ee4_1']!='NA'){
$var.='             <tr>
                        <td align="justify" style="padding:2px 4px"><span class="style21">GRADUATION OR BACHELOR’S DEGREE OR ITS EQUIVALENT EXAMINATION</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee4_1'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee4_2'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">';
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
					$var.=$m.'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee4_4'].'</span></td>
               	  	</tr>';
                    }
					if($data['ee5_1']!='' && $data['ee5_1']!='NA'){
$var.='             <tr>
                        <td align="justify" style="padding:2px 4px"><span class="style21">POST GRADUATE OR ITS EQUIVALENT EXAMINATION</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee5_1'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee5_2'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">';
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
					$var.=$m.'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['ee5_4'].'</span></td>
               	  	</tr>';
                    }
$var.='             					
                </table>
            </div>';
		//--------------------------------------Executive Assistant Educational Details Start-------------------------------//

		if($data['post1_1']!=''){
$var.='<br />
        	<div id="c_dtl">
                <table border="1" cellpadding="0" cellspacing="0">
                    <tr height="10px">
                        <td width="150" height="10px"><div align="center" class="style19">EXPERIENCE</div></td>
                      	<td width="150" height="10px"><div align="center" class="style19">NAME OF OFFICE/INSTITUTE</div></td>
                      	<td width="150" height="10px"><div align="center" class="style19">ADDRESS OF OFFICE/INSTITUTE</div></td>
                      	<td width="60" height="10px"><div align="center" class="style19">NO. OF<br />YEARS<br />WORKED</div></td>
                  	</tr>
                    <tr>
                        <td align="justify" style="padding:2px 4px"><span class="style21">EXPERIENCE IN SOCIAL WORK OR RURAL  DEVELOPMENT</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post1_1'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post1_2'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post1_3'].'</span></td>
               	  	</tr>
              	</table>
            </div> '; } 
        
//--------------------------------------BLOCK INFORMATICS OFFICER Educational Details Start------------------------------->

		if($data['post4_1']!=''){
$var.='<br />
			<div id="c_dtl">
                <table border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="300"><div align="center" class="style19">NAME OF THE EXAM.</div></td>
                      	<td width="260"><div align="center" class="style19">NAME OF INSTITUTE</div></td>
                      	<td width="260"><div align="center" class="style19">LEVEL OF CERTIFICATION</div></td>
                      	<td width="60"><div align="center" class="style19">YEAR OF<br />PASSING<br />(YYYY)</div></td>
                  	</tr>
                    <tr> 
                        <td align="justify" style="padding:2px 4px"><span class="style21">CERTIFICATE COURSE</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post1_1'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">';
								if($data['post4_2']=='A'){$var.='LEVEL A';}
								if($data['post4_2']=='B'){$var.='LEVEL B';}
								if($data['post4_2']=='C'){$var.='LEVEL C';}
$var.='                  	</span>
                        </td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post4_3'].'</span></td>
               	  	</tr>
              	</table>
          	</div>';}

//--------------------------------------Clerk-cum-Typist Educational Details Start------------------------------->
		
        if($data['post6_1']!=''){
$var.='    	<div id="c_dtl">
              	<div class="c_dtl_l">TYPING SPEED DETAILS</div>
                <div class="c_dtl_r" style="vertical-align:top">: '.$data['post6_1'].'
             	</div>
            </div>';}
        

//--------------------------------------Data  Entry Operator Educational Details Start------------------------------->

        if($data['post7_1']!='' || $data['post7_4']!='' || $data['post7_5']!='' || $data['post7_6']!=''){
			if($data['post7_1']!=''){
$var.='    	<br /><div id="c_dtl">
                <table border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="300"><div align="center" class="style19">EXPERIENCE</div></td>
                      	<td width="260"><div align="center" class="style19">NAME OF OFFICE/INSTITUTE</div></td>
                      	<td width="260"><div align="center" class="style19">ADDRESS OF OFFICE/INSTITUTE</div></td>
                      	<td width="60"><div align="center" class="style19">NO. OF<br />YEARS<br />WORKED</div></td>
                  	</tr>
                    <tr>
                        <td align="justify" style="padding:2px 4px"><span class="style21">ONE YEAR EXPERIENCE OF DATA ENTRY OPERATION IN  PERSONAL COMPUTER</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post7_1'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post7_2'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post7_3'].'</span></td>
               	  	</tr>
              	</table>
           	</div>';}
			if($data['post7_4']!=''){
$var.='    	<br /><div id="c_dtl">
              	<div class="c_dtl_l">CERTIFICATION DETAILS OF TYPING SPEED</div>
                <div class="c_dtl_r" style="vertical-align:top">: '.$data['post7_4'].'
             	</div>
            </div>';}
			if($data['post7_5']!=''){
$var.='    	<br /><div id="c_dtl">
              	<div class="c_dtl_l">CERTIFICATION DETAILS  OF TRAINING IN USING PERSONAL COMPUTER</div>
                <div class="c_dtl_r" style="vertical-align:top">'.$data['post7_5'].'
             	</div>
            </div>';}
			if($data['post7_6']!=''){
$var.='    	<br /><div id="c_dtl">
              	<div class="c_dtl_l">CERTIFICATION DETAILS OF DATA ENTRY SPEED</div>
                <div class="c_dtl_r" style="vertical-align:top">'.$data['post7_6'].'
             	</div>
            </div>';}
			}

//--------------------------------------Executive Assistant Educational Details Start------------------------------->

        if($data['post8_1']!='' || $data['post8_4']!='' || $data['post8_7']!=''){		
$var.='    	<br /><div id="c_dtl">
                <table border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="300"><div align="center" class="style19">EXPERIENCE</div></td>
                      	<td width="260"><div align="center" class="style19">NAME OF OFFICE/INSTITUTE</div></td>
                      	<td width="260"><div align="center" class="style19">ADDRESS OF OFFICE/INSTITUTE</div></td>
                      	<td width="60"><div align="center" class="style19">NO. OF<br />YEARS<br />WORKED</div></td>
                  	</tr>';
					if($data['post8_1']!=''){		
$var.='    			<tr>
                        <td align="justify" style="padding:2px 4px"><span class="style21">THREE YEARS EXPERIENCE IN TEACHING IN ANY PRIMARY OR SECONDARY SCHOOL.</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post8_1'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post8_2'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post8_3'].'</span></td>
               	  	</tr>';}
					if($data['post8_4']!=''){		
$var.='    			<tr>
                        <td align="justify" style="padding:2px 4px"><span class="style21">THREE YEARS WORKING IN GOVT. SPONSORED ALTERNATIVE SYSTEM OF EDUCATION.</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post8_4'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post8_5'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post8_6'].'</span></td>
               	  	</tr>';}
					if($data['post8_7']!=''){		
$var.='    			<tr>
                        <td align="justify" style="padding:2px 4px"><span class="style21">THREE YEARS EXPERIENCE IN MANAGEMENT OF EDUCATION.</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post8_7'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post8_8'].'</span></td>
                   	  	<td align="justify" style="padding:2px 4px">
                        	<span style="font-size: 11px">'.$data['post8_9'].'</span></td>
               	  	</tr>';}		
$var.='        	</table>
            </div>';}
//--------------------------------------Clerk-cum-Typist Educational Details Start------------------------------->
		
        if($data['post9_1']!=''){
$var.='    	<div id="c_dtl">
              	<div class="c_dtl_l">CERTIFICATION DETAILS  OF TRAINING IN USING PERSONAL COMPUTER</div>
                <div class="c_dtl_r" style="vertical-align:top">: '.$data['post9_1'].'
             	</div>
            </div>';}
        

   
$var.='</div>';		
$var.='<hr /><div class="op_edu_app_dtl" >
			<div id="c_dtl">
                <div class="c_dtl_all"><u>DECLARATION</u></div>
            </div>
       	</div>
        <div class="op_edu_app_dtl" >
			<div id="c_dtl">
              	<div class="c_dtl_all_fut">
                	<div align="justify">“I HAVE GONE THROUGH THE INSTRUCTION SHEET AVAILABLE IN THE WEBSITE AND FILLED IN
APPLICATION FORM ACCORDINGLY. I HEREBY DECLARE  THAT ALL THE STATEMENTS MADE BY ME IN THE APPLICATION FORM AND THE INFORMATION  SHEETS ARE TRUE AND COMPLETE TO THE BEST OF MY KNOWLEDGE AND BELIEF AND NOTHING  HAS BEEN CONCEALED OR SUPPRESSED. I ALSO DECLARE, I HAVE GONE THROUGH THE  INSTRUCTIONS NOTED AND ENTERED INFORMATION AS PER INSTRUCTION. I ALSO UNDERSTAND THAT IN CASE, ANY OF MY STATEMENTS IS FOUND INCORRECT OR FALSE  DURING ANY STAGE OF RECRUITMENT OR THEREAFTER, I SHALL BE DISQUALIFIED FOR THE POST APPLIED FOR AND I SHALL ALSO BE LIABLE FOR ANY OTHER  PENAL ACTION UNDER THE EXISTING RULES WITHOUT FURTHER INTIMATION.” </div>
              	</div>
            </div>
        </div>
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