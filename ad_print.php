<?php
session_start();
include("../../common.php");
include("../../config-inc.php");
include("script.php");


if(isset($_POST['sub_sub']) && $_POST['sub_sub']=='Submit'){
	

	$check_page=$_POST['check_page'];
	$frm_data=md5($_POST['cand_app_no'].$_POST['cand_dob'].$_SESSION['rand']);
	//echo $frm_data."<br>---";
	//echo $check_page;
	//exit();
	if($check_page!=$frm_data){
		$_SESSION['message']='Operation Error';
		?>
		<script>
		window.location='../welcome.php';
		</script>
		<?php
		exit();
	}
	
	$cand_app_no=str_replace($rep_char,"",strip_tags($_POST['cand_app_no']));
	list($date,$month,$year)=preg_split("/[\/]|[-]+/",str_replace($rep_char,"",strip_tags($_POST['cand_dob'])));
	$cand_dob=$year."-".$month."-".$date;
	$cand_data=mysql_fetch_array(mysql_query("select r_no from online_app_zp_ttb where cand_app_no='".$cand_app_no."' and  cand_dob='".$cand_dob."'"));
	if($cand_data[0]==''){
		?>
		<script>
		alert('No Record Found');
		</script>
		<?php
	}else{
	mysql_query("update online_app_zp_ttb set print_chk='y', print_dt='".date("Y-m-d")."', print_time='".date("h:i:s")."', print_ip='".$_SERVER['REMOTE_ADDR']."' where r_no='".$cand_data[0]."'")
	?>
    	<script>
		window.location='admit_print.php?can=<?php echo $cand_app_no;?>&cd=<?php echo $cand_dob;?>';
		</script>
  		<?php
		exit();
	}
}
$rand=md5(rand());
$_SESSION['rand']=$rand;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>North24Parganas ::Online Application</title>

<meta name="keywords" content="Home,About District,Demography,Folk Culture,Map Gallery,Photo Gallery,History & Heritage,Collectorate,Group-C Establishment,Gazetted Officers Cell,Nezarath,Election,Judicial Munshikhana,Motor Vehicle,N V F,Revenue Munshikhana,Land & Land Reforms,Land Acquisition,Planning & Development,Panchayat & Rural Dev.,ICDS,Backward Class Welfare,SC & ST Fin. Corp.,Civil Defence,Municipal Affairs,SHG & SE,Refugee Rehabilitation,District Municipal Affairs,Projects,Sarba Siksha Mission,SSK & MSK,MP Local Area Dev. Scheme,Total Sanitation Campain,Tender & Notice,Recruitments,Contacts,DM, ADMS & SDOs,Dist. HQ & Sub-Divisions,Block & Panchayat Samities,Gram Panchayats,Municipalities,Police,MPs & MLAs,Important Links,Air India,Banglar Mukh,india.gov.in,Indian Rail,Zilla Parishad,MGNREGA,DRDC,Barrackpore Sub Division,RTI,North 24 Parganas Police,Public Grievance,Police Verification(GOI),G2C Services,G2G Services,Pay Vehicle Tax">

<meta name="description" content="Information pertaining to various departments are put in the district website north24parganas.gov.in, Overview of some Information available on web site: About district (Demography, folk culture, map gallery, photo gallery, history and heritage), Various departments of the Collectorate (Election, Motor vehicles, Land Acquisition, Backward class welfare, Projects (Sarva Siksha Mission, Total Sanitaion Campaign), Contact information (DM, ADMs, SDOs, Block and Panchayat Samities, Gram Panchayats, Police, MP ,MLAs), Citizen Centric  parts such as Police Verification , Public Grievances are also available in the site.">

<link rel="shortcut icon" href="<?php echo URL;?>images/si.png" />
<link rel="stylesheet" type="text/css" href="../../css/style_n24p.css" />
<link rel="stylesheet" type="text/css" href="../../css/<?php echo $_SESSION['thm_id'];?>_theme.css" />
<link rel="stylesheet" type="text/css" href="../../ddlevelsmenu-base_<?php echo $_SESSION['thm_id'];?>.css" />
<style type="text/css">
<!--
.stylex {font-size: 9px}
.stylevr {
	font-size: 18px;
	font-weight: bold;
}
.stylevrul {font-size: 16px; font-weight: bold; }
.stylevrli {font-size: 13px; font-weight: bold; }
-->
</style>
<script type="text/javascript" src="../../ddlevelsmenu_<?php echo $_SESSION['thm_id'];?>.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL;?>js/actb.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL;?>js/common.js"></script>
<script type="text/javascript" src="../md5.js"></script>
<script language="JavaScript" src="calendar_eu.js"></script>
<link rel="stylesheet" href="calendar.css">

<script language="javascript">
if(window.top!=window){
	window.location='../operation_error.php';
}
</script>

</head>

<body onLoad="document.app_print.cand_app_no.focus()">
<noscript><meta http-equiv="refresh" content="0; url=java_script_prob.html"></noscript>
<div class="wrapper">
	<div class="main">
    
    	<?php include("../../header.php");?>
        
    	<?php include("../../nav.php");?>
		
		<div class="scrolling-text">
			<marquee onMouseOver="this.stop()" onMouseOut="this.start()" scrollAmount="3"> 
			<?php include('../new_news.php');?>
          </marquee>
		</div>
		<div class="container">
			<div class="leftside">
                
                <?php include("../../mid_l_i.php");?>	
			</div>
			<div class="midright">
            	<div class="mid_s">
                	<p align="center" class="stylevr">Print Admit</p>
                    
           	  <p align="center" class="stylevr" style="padding-left:50px">
                   		<form action="" method="post" name="app_print" onSubmit="return ckfrm()">
                        <table>
                          <tr>
                       		<td>Registration no</td><td><input type="text" maxlength="12" style="font-size:12px; width:180px;" name="cand_app_no" id="cand_app_no" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_dob', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_app_no'];}?>" /> (Please enter full Registration no like post01/00223)</td></tr>
                           <tr><td>Date of Birth</td><td><input type="text" maxlength="10" style="font-size:12px; width:80px;" name="cand_dob" id="cand_dob" onKeyPress="return dt_allow('sub_sub', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_dob'];}?>" />
								<script language="JavaScript">
                                new tcal ({
                                    // form name
                                    'formname': 'app_print',
                                    // input name
                                    'controlname': 'cand_dob'
                                });
                            
                                </script>&nbsp;&nbsp;<span class="style2">(dd/mm/yyyy)</span></td></tr>
                                <tr><td></td><td>
                            <input type="hidden" name="check_page" value=""  onFocus="DoFocus(this)"/>       
                            <input type="submit" value="Submit" name="sub_sub" id="sub_sub" />&nbsp;&nbsp; 
                    		
                            </td></tr></table>
               	  </form>     
                    </p>                       
                    <div align="right"><a href="index.php"><img src="../../image/back.jpg" border="0" /></a> </div>
                
                </div>
		  </div>
		</div>
   	<?php include("../../footer.php");?>
<input type="hidden" name="rand" id="rand" value="<?php echo $rand;?>" />
	</div>
</div>
</body>
</html>
<script language="javascript">
function ckfrm(){
var check_page=''
	if( document.app_print.cand_app_no.value==''){
		alert("Please Enter Application No.");
		document.app_print.cand_app_no.focus();
		return false;
	}
	check_page+=document.app_print.cand_app_no.value;
	if( document.app_print.cand_dob.value==''){
		alert("Please Enter your Date of Birth");
		document.app_print.cand_dob.focus();
		return false;
	}
	check_page+=document.app_print.cand_dob.value;
	check_page+=document.getElementById("rand").value;
	document.app_print.check_page.value=hex_md5(check_page);
	return confirm('Are You Sure ? To Confirm Press OK  or to Change Press Cencel');
}
</script>
