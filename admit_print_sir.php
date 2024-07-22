<?php
session_start();
include("include_web/common.php");
include("script.php");
if(date('Ymd')>20170122  || date('Ymd')<20170110){?>
<script>
window.location='index.php';
</script>
<?php 
exit();
}
if(isset($_POST['sub_sub']) && $_POST['sub_sub']=='Submit'){
	$check_page=$_POST['check_page'];
	$frm_data=md5($_POST['cand_app_no'].$_POST['cand_dob'].$_SESSION['rand']);
	#echo $frm_data."<br>---";
	#echo $check_page;
	#exit();
	if($check_page!=$frm_data){
		$_SESSION['message']='Operation Error';
		?>
		<script>
		window.location='index.php';
		</script>
		<?php
		exit();
	}
		$rep_char = array("&", "@", "#", "{", "}", "\\", "\"", "'", ";", " AND ", " and ", " OR ", " or ", "WFXSSProbe", "wfxssprobe");
		$cand_app_no=str_replace($rep_char,"",strip_tags($_POST['cand_app_no']));
		$cand_app_no=strtoupper($cand_app_no);
		list($cand_post,$no)=preg_split("/[\/]|[-]+/",$cand_app_no);
		$cand_dob=str_replace($rep_char,"",strip_tags($_POST['cand_dob']));	
		list($v1,$v2,$v3)=preg_split("/[\/]|[-]+/",$cand_dob);
		$cand_dob=$v3."-".$v2."-".$v1;
		$link=@mysql_connect($dbs,$user,$pass) or die ("Error during connection");
		mysql_select_db($db,$link);
		$data_r=mysql_query("select exm_roll from online_app_zp_ttb where cand_app_no='".$cand_app_no."' and cand_dob='".$cand_dob."'");
		$data_reg=mysql_fetch_array($data_r);
		//echo $data_reg[0];
		if(mysql_num_rows($data_r)==0){
		?>
		<script>
		alert('No Record Found');
		</script>
		<?php
	}else{
		mysql_query("update online_app_zp_ttb set print_chk='y', print_dt='".date("Y-m-d")."', print_time='".date("h:i:s")."', print_ip='".$_SERVER['REMOTE_ADDR']."' where exm_roll='".$data_reg[0]."'");
		mysql_close($link);
		?>
    	<script>
			window.location='admit.php?can=<?php echo $cand_app_no;?>&cd=<?php echo $cand_dob;?>';
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
<title>North24Parganas :: Online Application</title>

<meta name="keywords" content="Home,About District,Demography,Folk Culture,Map Gallery,Photo Gallery,History & Heritage,Collectorate,Group-C Establishment,Gazetted Officers Cell,Nezarath,Election,Judicial Munshikhana,Motor Vehicle,N V F,Revenue Munshikhana,Land & Land Reforms,Land Acquisition,Planning & Development,Panchayat & Rural Dev.,ICDS,Backward Class Welfare,SC & ST Fin. Corp.,Civil Defence,Municipal Affairs,SHG & SE,Refugee Rehabilitation,District Municipal Affairs,Projects,Sarba Siksha Mission,SSK & MSK,MP Local Area Dev. Scheme,Total Sanitation Campain,Tender & Notice,Recruitments,Contacts,DM, ADMS & SDOs,Dist. HQ & Sub-Divisions,Block & Panchayat Samities,Gram Panchayats,Municipalities,Police,MPs & MLAs,Important Links,Air India,Banglar Mukh,india.gov.in,Indian Rail,Zilla Parishad,MGNREGA,DRDC,Barrackpore Sub Division,RTI,North 24 Parganas Police,Public Grievance,Police Verification(GOI),G2C Services,G2G Services,Pay Vehicle Tax">

<meta name="description" content="Information pertaining to various departments are put in the district website north24parganas.gov.in, Overview of some Information available on web site: About district (Demography, folk culture, map gallery, photo gallery, history and heritage), Various departments of the Collectorate (Election, Motor vehicles, Land Acquisition, Backward class welfare, Projects (Sarva Siksha Mission, Total Sanitaion Campaign), Contact information (DM, ADMs, SDOs, Block and Panchayat Samities, Gram Panchayats, Police, MP ,MLAs), Citizen Centric  parts such as Police Verification , Public Grievances are also available in the site.">
<link rel="stylesheet" type="text/css" href="include_web/style_n24p.css" />
<style type="text/css">
<!--
.stylex {font-size: 9px}
.stylepgrs {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>
<link href="style.css" rel="stylesheet">
<!--<link rel="stylesheet" type="text/css" href="include_web/ddlevelsmenu-base.css" />--->
<script type="text/javascript" src="include_web/md5.js"></script>
<script type="text/javascript" src="include_web/ddlevelsmenu.js"></script>
<script language="javascript" type="text/javascript" src="include_web/actb.js"></script>
<script language="javascript" type="text/javascript" src="include_web/common.js"></script>
<!-- <link rel="shortcut icon" href="include_web/l_icon.gif" type="image/x-icon" /> -->
<script language="JavaScript" src="calendar_eu.js"></script>
<link rel="stylesheet" href="calendar.css">
</head>


<body style="background:#ebeaea;">
<div class="wrapper">
	<div class="main" style="background:#ebeaea">
    
    	<?php //include("../../header.php");?>
        
    	<?php //include("../../nav.php");?>
		
		
		<div class="container" style="height:600px">
			<!-- <div class="leftside">
                
                <?php // include("../../mid_l_i.php");?>
			</div>
			<div class="midright">
            <div class="scrolling-text">
				<marquee onMouseOver="this.stop()" onMouseOut="this.start()" scrollAmount="3"> 
			<?php // include('../new_news.php');?>
          		</marquee>
			</div> -->
			
			        <div class="container" style="margin-top:80px;">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><b>District Level Selection Committee North 24 Parganas</b></h2>
                    <h3 class="section-subheading text-muted center">ADMIT CARD FOR RECUIRTMENT TO THE POST OF EXECUTIVE ASSISTANT / NIRMAN SAHAYAK </h3>
                </div>
            </div>

       	  <div>
           	  <h4 class="section-subheading text-muted center text-center"><u>Print Admit Card</u></h4>
                    
           	  <p align="center" style="padding-left:50px">
       		<form action="" method="post" name="app_print" onSubmit="return ckfrm()">
                        <table width="366" align="center" cellspacing="10">
                          <tr>
                       		<td style="font-size:13px; font-weight:700; color='#000044'; " >Registration no</td><td><input type="text" maxlength="13" style="font-size:12px; width:180px;" name="cand_app_no" id="cand_app_no" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_dob', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_app_no'];}?>" /></td></tr>
                           <tr><td>&nbsp;&nbsp;</td><td>&nbsp;&nbsp;</td></tr>
						   <tr><td style="font-size:13px; font-weight: 600;">Date of Birth</td><td><input type="text" maxlength="10" style="font-size:12px; width:80px;" name="cand_dob" id="cand_dob" onKeyPress="return dt_allow('sub_sub', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_dob'];}?>" />
								<script language="JavaScript">
                                new tcal ({
                                    // form name
                                    'formname': 'app_print',
                                    // input name
                                    'controlname': 'cand_dob'
                                });
                            
                                </script>&nbsp;&nbsp;<sp(dd/mm/yyyy)</td></tr>
								<tr><td>&nbsp;&nbsp;</td><td>&nbsp;&nbsp;</td></tr>
                                <tr><td></td><td>
                            <input type="hidden" name="check_page" value=""  onFocus="DoFocus(this)"/>       
                            <input type="submit" value="Submit" name="sub_sub" id="sub_sub" class="btn btn-primary" style="padding:12px 22px;" />&nbsp;&nbsp; 
                    		
                            </td></tr></table>
       	    </form>     
                    </p>                       
                    <!-- div align="right"><a href="index.php"><img src="../../image/back.jpg" border="0" /></a> </div -->
               <!-- </div> -->
		  </div>
		</div>
   	<?php //include("../../footer.php");?>
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