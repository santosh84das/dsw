<?php
session_start();
include("../../common.php");
include("../../config-inc.php");
include("script.php");
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
.style1 {
	color: #FF0000;
	font-weight: bold;
}
.style2 {color: #000000}
-->
</style>
<script type="text/javascript" src="../../ddlevelsmenu_<?php echo $_SESSION['thm_id'];?>.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL;?>js/actb.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URL;?>js/common.js"></script>
<script type="text/javascript" src="../md5.js"></script>

<script language="javascript">
if(window.top!=window){
	window.location='../operation_error.php';
}
</script>

</head>

<body>
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
                	<p align="center" class="stylevr">Category wise result of Written Exam</p>
                    <ul>
                        <li class="stylevrli"><a href="p1.pdf" style="text-decoration:none;" target="_blank"><font color="#000000">EXECUTIVE ASSISTANT</font></a></li>
                        <li class="stylevrli"><a href="p2.pdf" style="text-decoration:none;" target="_blank"><font color="#000000">NIRMAN SAHAYAK</font></a></li>
                        <li class="stylevrli"><a href="p4.pdf" style="text-decoration:none;" target="_blank"><font color="#000000">BLOCK INFORMATICS OFFICER</font></a></li>
                        <li class="stylevrli"><a href="p5.pdf" style="text-decoration:none;" target="_blank"><font color="#000000">ACCOUNT CLERK(PS)</font></a></li>
                        <li class="stylevrli"><a href="p6.pdf" style="text-decoration:none;" target="_blank"><font color="#000000">CLERK-CUM-TYPIST(PS)</font></a></li>
                        <li class="stylevrli"><a href="p7.pdf" style="text-decoration:none;" target="_blank"><font color="#000000">DATA ENTRY OPERATOR(PS)</font></a></li>
                        <li class="stylevrli"><a href="p8.pdf" style="text-decoration:none;" target="_blank"><font color="#000000">SAMITI EDUCATION OFFICER</font></a></li>
                        <li class="stylevrli"><a href="p9.pdf" style="text-decoration:none;" target="_blank"><font color="#000000">GRAM PANCHAYAT SECRETARY</font></a></li>
                      



                          <p>
                            <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" style="text-decoration:none;"><font color="#000000">Recruting Body Name</font></a>-->
                            </li>
                          </p>
                       </ul>                             
                    <div align="right"><a href="index.php"><img src="../../image/back.jpg" border="0" /></a> </div>
                
                </div>
			</div>
		</div>
   	<?php include("../../footer.php");?>
	</div>
</div>
</body>
</html>
