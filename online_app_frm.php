<?php
session_start();
include("include_web/common.php");
include("script.php");
//if(date('YmdHm')>202407302359  || date('YmdHm')<202407131001)
if(date('YmdHm')>202407302359  || date('YmdHm')<202407022359)
{
?>
<script>
alert("Application available from 02/09/2022 to 15/09/2022");
window.location='index.php';
</script>
<?php 
exit();
}
$foc='';
if(isset($_POST['sub_sub']) && $_POST['sub_sub']=='Submit'){
	if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
	
//------------------------------------------------------------------------------------------------------------------------------------------------------//
	
		$check_page=$_POST['check_page'];
		$frm_data='';
		
		$frm_data.=$_POST['cand_post'];
		$frm_data.=$_POST['cand_nm'];
		$frm_data.=$_POST['cand_fh_nm'];
		$frm_data.=$_POST['cand_mh_nm'];
		$frm_data.=$_POST['cand_community'];
		$frm_data.=$_POST['cand_sex'];
		
			
		$frm_data.=$_POST['ck_citizen'];
		/*
		if(isset($_POST['ex_serv']))
		{
			$frm_data.=$_POST['ex_serv'];
			$frm_data.=$_POST['ex_serv_yr'];
		}
			if(isset($_POST['ck_ec']))
		{
			$frm_data.=$_POST['ck_ec'];
		}
		*/
		if(isset($_POST['ck_pwd'])){
			$frm_data.=$_POST['ck_pwd'];
		}
		/*
		if(isset($_POST['ck_ret_per'])){
			$frm_data.=$_POST['ck_ret_per'];
		}
		*/
		if(isset($_POST['ck_msp'])){
			$frm_data.=$_POST['ck_msp'];
		}
 		$frm_data.=$_POST['cand_dob'];
		$frm_data.=$_POST['cand_age'];
		$frm_data.=$_POST['cand_phone'];
		
		//$frm_data.=$_POST['cand_mail'];
		$frm_data.=$_POST['cand_religion'];
		//$frm_data.=$_POST['cand_aadhar'];
		
		$frm_data.=$_POST['cand_p_add'];
		$frm_data.=$_POST['cand_p_block'];
		$frm_data.=$_POST['cand_p_po'];
		$frm_data.=$_POST['cand_p_ps'];
		$frm_data.=$_POST['cand_p_dis'];
		$frm_data.=$_POST['cand_p_st'];
		$frm_data.=$_POST['cand_p_pin'];
		$frm_data.=$_POST['cand_c_add'];
		$frm_data.=$_POST['cand_c_block'];
		$frm_data.=$_POST['cand_c_po'];
		$frm_data.=$_POST['cand_c_ps'];
		$frm_data.=$_POST['cand_c_dis'];
		$frm_data.=$_POST['cand_c_st'];
		$frm_data.=$_POST['cand_c_pin'];
		
		$frm_data.=$_POST['ee1_1'];
		$frm_data.=$_POST['ee1_2'];
		$frm_data.=$_POST['ee1_3'];
		$frm_data.=$_POST['ee1_4'];
		$frm_data.=$_POST['ee1_5'];
		$frm_data.=$_POST['ee1_6'];
		
		$frm_data.=$_POST['ee2_1'];
		$frm_data.=$_POST['ee2_2'];
		$frm_data.=$_POST['ee2_3'];
		$frm_data.=$_POST['ee2_4'];
		$frm_data.=$_POST['ee2_5'];
		$frm_data.=$_POST['ee2_6'];
		
		$frm_data.=$_POST['ee4_1'];
		$frm_data.=$_POST['ee4_2'];
		$frm_data.=$_POST['ee4_3'];
		$frm_data.=$_POST['ee4_4'];
		$frm_data.=$_POST['ee4_5'];
		$frm_data.=$_POST['ee4_6'];
		
		$frm_data.=$_POST['ee5_1'];
		$frm_data.=$_POST['ee5_2'];
		$frm_data.=$_POST['ee5_3'];
		$frm_data.=$_POST['ee5_4']; 
		$frm_data.=$_POST['ee5_5']; 
		$frm_data.=$_POST['ee5_6']; 

		$frm_data.=$_POST['ee6_1'];
		$frm_data.=$_POST['ee6_2'];
		$frm_data.=$_POST['ee6_3'];
		$frm_data.=$_POST['ee6_4']; 
		$frm_data.=$_POST['ee6_5']; 
		$frm_data.=$_POST['ee6_6'];
		
		
		$frm_data.=$_POST['ee3_1'];
		$frm_data.=$_POST['ee3_2'];
		$frm_data.=$_POST['ee3_3'];
		$frm_data.=$_POST['ee3_4'];
		$frm_data.=$_POST['ee3_5'];
		
		$frm_data.=$_POST['post1_1'];
		$frm_data.=$_POST['post1_2'];
		$frm_data.=$_POST['post1_3'];
		$frm_data.=$_POST['post1_4'];
		$frm_data.=$_POST['post1_5'];
		
		$frm_data.=$_POST['exch_1'];
		$frm_data.=$_POST['exch_2'];
		$frm_data.=$_POST['exch_3'];

		$frm_data.=$_POST['cand_dclr'];
		
		$frm_data.=$_SESSION['rand'];

/*------------------------------------------------------------------------------------------------------------------------------------------------------//

*/		//echo $frm_data ."======frm======<br>";
		//echo md5($frm_data)."=====frm====<br>";
		//echo $check_page ."======ckpg====<br>";
		//exit();
		/*if($check_page!=md5($frm_data))
		{
			$_SESSION['message']='Operation Error';
			?>
			<script>
			window.location='index.php';
			</script>
			<?php
			exit();
		}*/
/*		
-----------------------------------------------------------------------------------------------------------------------------------------------------//
	
*/
		$app_no='';		
		
		if(isset($_POST['cand_post'])){
			$cand_post=str_replace($rep_char,"",strip_tags($_POST['cand_post']));
		}else{
		$cand_post='';
		}
		
		
		
		if(isset($_POST['cand_dob'])){
		list($date,$month,$year)=preg_split("/[\/]|[-]+/",str_replace($rep_char,"",strip_tags($_POST['cand_dob'])));
		$cand_dob=$year."-".$month."-".$date;
		}else{
		$cand_dob='';
		}
		
		$cand_app_dt=date('Y-m-d');
		
		if(isset($_POST['cand_nm'])){
			$cand_nm=str_replace($rep_char,"",strip_tags($_POST['cand_nm']));
		}else{
		$cand_nm='';
		}
		
		if(isset($_POST['cand_fh_nm'])){
			$cand_fh_nm=str_replace($rep_char,"",strip_tags($_POST['cand_fh_nm']));
		}else{
		$cand_fh_nm='';
		}
		if(isset($_POST['cand_mh_nm'])){
			$cand_mh_nm=str_replace($rep_char,"",strip_tags($_POST['cand_mh_nm']));
		}else{
		$cand_mh_nm='';
		}
		if(isset($_POST['cand_community'])){
		$cand_community=str_replace($rep_char,"",strip_tags($_POST['cand_community']));
		}else{
		$cand_community='';
		}
		
		if(isset($_POST['cand_sex'])){
			$cand_sex=str_replace($rep_char,"",strip_tags($_POST['cand_sex']));
		}else{
		$cand_sex='';
		}
		
		if(isset($_POST['cand_age'])){
			$cand_age=str_replace($rep_char,"",strip_tags($_POST['cand_age']));
		}else{
		$cand_age='';
		}
		
				
		if(isset($_POST['ck_citizen'])){
			$ck_citizen=str_replace($rep_char,"",strip_tags($_POST['ck_citizen']));
		}else{
		$ck_citizen='';
		}
		
		/*if(isset($_POST['ck_ec'])){
			$ck_ec=str_replace($rep_char,"",strip_tags($_POST['ck_ec']));
		}else{
		$ck_ec='';
		}*/
		if(isset($_POST['ck_msp'])){
			$ck_msp=str_replace($rep_char,"",strip_tags($_POST['ck_msp']));
		}else{
		$ck_msp='';
		}
		/*
		if(isset($_POST['ex_serv'])){
			$ex_serv=str_replace($rep_char,"",strip_tags($_POST['ex_serv']));
			
		} else {
			$ex_serv ='';
		}	
		
		if(isset($_POST['ex_serv_yr'])){
			$ex_serv_yr=str_replace($rep_char,"",strip_tags($_POST['ex_serv_yr']));
			
		} else {
			$ex_serv_yr = '';
		}
		*/		
		
		if(isset($_POST['ck_pwd'])){
			$ck_pwd=str_replace($rep_char,"",strip_tags($_POST['ck_pwd']));
			
		} else {
			$ck_pwd = '';
		}	
/*		
		if(isset($_POST['ck_ret_per'])){
			$ck_ret_per=str_replace($rep_char,"",strip_tags($_POST['ck_ret_per']));
			
		} else {
			$ck_ret_per = '';
		}	
*/
		if(isset($_POST['cand_phone'])){
			$cand_phone=str_replace($rep_char,"",strip_tags($_POST['cand_phone']));
		}else{
		$cand_phone='';
		}
		
		if(isset($_POST['cand_mail'])){
			$cand_mail=str_replace($rep_char1,"",strip_tags($_POST['cand_mail']));
		}else{
		$cand_mail='';
		}
		if(isset($_POST['cand_aadhar'])){
			$cand_aadhar=str_replace($rep_char1,"",strip_tags($_POST['cand_aadhar']));
		}else{
		$cand_aadhar='';
		}
		if(isset($_POST['cand_religion'])){
			$cand_religion=str_replace($rep_char1,"",strip_tags($_POST['cand_religion']));
		}else{
		$cand_religion='';
		}
		
		if(isset($_POST['cand_p_add'])){
			$cand_p_add=str_replace($rep_char,"",strip_tags($_POST['cand_p_add']));
		}else{
		$cand_p_add='';
		}
		
		if(isset($_POST['cand_p_block'])){
			$cand_p_block=str_replace($rep_char,"",strip_tags($_POST['cand_p_block']));
		}else{
		$cand_p_block='';
		}
		
		if(isset($_POST['cand_p_po'])){
			$cand_p_po=str_replace($rep_char,"",strip_tags($_POST['cand_p_po']));
		}else{
		$cand_p_po='';
		}
		
		if(isset($_POST['cand_p_ps'])){
			$cand_p_ps=str_replace($rep_char,"",strip_tags($_POST['cand_p_ps']));
		}else{
		$cand_p_ps='';
		}
		
		if(isset($_POST['cand_p_dis'])){
			$cand_p_dis=str_replace($rep_char,"",strip_tags($_POST['cand_p_dis']));
		}else{
		$cand_p_dis='';
		}
			if(isset($_POST['cand_p_st'])){
			$cand_p_st=str_replace($rep_char,"",strip_tags($_POST['cand_p_st']));
		}else{
		$cand_p_st='';
		}
		
		if(isset($_POST['cand_p_pin'])){
			$cand_p_pin=str_replace($rep_char,"",strip_tags($_POST['cand_p_pin']));
		}else{
		$cand_p_pin='';
		}
		
		if(isset($_POST['cand_c_add'])){
			$cand_c_add=str_replace($rep_char,"",strip_tags($_POST['cand_c_add']));
		}else{
		$cand_c_add='';
		}
		
		if(isset($_POST['cand_c_block'])){
			$cand_c_block=str_replace($rep_char,"",strip_tags($_POST['cand_c_block']));
		}else{
		$cand_c_block='';
		}
		
		if(isset($_POST['cand_c_po'])){
			$cand_c_po=str_replace($rep_char,"",strip_tags($_POST['cand_c_po']));
		}else{
		$cand_c_po='';
		}
		
		if(isset($_POST['cand_c_ps'])){
			$cand_c_ps=str_replace($rep_char,"",strip_tags($_POST['cand_c_ps']));
		}else{
		$cand_c_ps='';
		}
		
		if(isset($_POST['cand_c_dis'])){
			$cand_c_dis=str_replace($rep_char,"",strip_tags($_POST['cand_c_dis']));
		}else{
		$cand_c_dis='';
		}
		
		if(isset($_POST['cand_c_st'])){
			$cand_c_st=str_replace($rep_char,"",strip_tags($_POST['cand_c_st']));
		}else{
		$cand_c_st='';
		}
		
		if(isset($_POST['cand_c_pin'])){
			$cand_c_pin=str_replace($rep_char,"",strip_tags($_POST['cand_c_pin']));
		}else{
		$cand_c_pin='';
		}
		
	
		if(isset($_POST['ee1_1'])){
			$ee1_1=str_replace($rep_char,"",strip_tags($_POST['ee1_1']));
		}else{
		$ee1_1='';
		}
		
		if(isset($_POST['ee1_2'])){
			$ee1_2=str_replace($rep_char,"",strip_tags($_POST['ee1_2']));
		}else{
		$ee1_2='';
		}
		
		if(isset($_POST['ee1_3'])){
			$ee1_3=str_replace($rep_char,"",strip_tags($_POST['ee1_3']));
		}else{
		$ee1_3='';
		}
		
		if(isset($_POST['ee1_4'])){
			$ee1_4=str_replace($rep_char,"",strip_tags($_POST['ee1_4']));
		}else{
		$ee1_4='';
		}
		if(isset($_POST['ee1_5'])){
			$ee1_5=str_replace($rep_char,"",strip_tags($_POST['ee1_5']));
		}else{
		$ee1_5='';
		}
		if(isset($_POST['ee1_6'])){
			$ee1_6=str_replace($rep_char,"",strip_tags($_POST['ee1_6']));
		}else{
		$ee1_6='';
		}
		
		if(isset($_POST['ee2_1'])){
			$ee2_1=str_replace($rep_char,"",strip_tags($_POST['ee2_1']));
		}else{
		$ee2_1='';
		}
		
		if(isset($_POST['ee2_2'])){
			$ee2_2=str_replace($rep_char,"",strip_tags($_POST['ee2_2']));
		}else{
		$ee2_2='';
		}
		
		if(isset($_POST['ee2_3'])){
			$ee2_3=str_replace($rep_char,"",strip_tags($_POST['ee2_3']));
		}else{
		$ee2_3='';
		}
		
		if(isset($_POST['ee2_4'])){
			$ee2_4=str_replace($rep_char,"",strip_tags($_POST['ee2_4']));
		}else{
		$ee2_4='';
		}
		if(isset($_POST['ee2_5'])){
			$ee2_5=str_replace($rep_char,"",strip_tags($_POST['ee2_5']));
		}else{
		$ee2_5='';
		}
		if(isset($_POST['ee2_6'])){
			$ee2_6=str_replace($rep_char,"",strip_tags($_POST['ee2_6']));
		}else{
		$ee2_6='';
		}
			
		if(isset($_POST['ee4_1'])){
			$ee4_1=str_replace($rep_char,"",strip_tags($_POST['ee4_1']));
		}else{
		$ee4_1='';
		}
		
		if(isset($_POST['ee4_2'])){
			$ee4_2=str_replace($rep_char,"",strip_tags($_POST['ee4_2']));
		}else{
		$ee4_2='';
		}
		
		if(isset($_POST['ee4_3'])){
			$ee4_3=str_replace($rep_char,"",strip_tags($_POST['ee4_3']));
		}else{
		$ee4_3='';
		}
		
		if(isset($_POST['ee4_4'])){
			$ee4_4=str_replace($rep_char,"",strip_tags($_POST['ee4_4']));
		}else{
		$ee4_4='';
		}
		if(isset($_POST['ee4_5'])){
			$ee4_5=str_replace($rep_char,"",strip_tags($_POST['ee4_5']));
		}else{
		$ee4_5='';
		}
		if(isset($_POST['ee4_6'])){
			$ee4_6=str_replace($rep_char,"",strip_tags($_POST['ee4_6']));
		}else{
		$ee4_6='';
		}
		
		if(isset($_POST['ee5_1'])){
			$ee5_1=str_replace($rep_char,"",strip_tags($_POST['ee5_1']));
		}else{
		$ee5_1='';
		}
		
		if(isset($_POST['ee5_2'])){
			$ee5_2=str_replace($rep_char,"",strip_tags($_POST['ee5_2']));
		}else{
		$ee5_2='';
		}
		
		if(isset($_POST['ee5_3'])){
			$ee5_3=str_replace($rep_char,"",strip_tags($_POST['ee5_3']));
		}else{
		$ee5_3='';
		}
		
		if(isset($_POST['ee5_4'])){
			$ee5_4=str_replace($rep_char,"",strip_tags($_POST['ee5_4']));
		}else{
		$ee5_4='';
		}
		if(isset($_POST['ee5_5'])){
			$ee5_5=str_replace($rep_char,"",strip_tags($_POST['ee5_5']));
		}else{
		$ee5_5='';
		}
		if(isset($_POST['ee5_6'])){
			$ee5_6=str_replace($rep_char,"",strip_tags($_POST['ee5_6']));
		}else{
		$ee5_6='';
		}
		
		if(isset($_POST['ee6_1'])){
			$ee6_1=str_replace($rep_char,"",strip_tags($_POST['ee6_1']));
		}else{
		$ee6_1='';
		}
		
		if(isset($_POST['ee6_2'])){
			$ee6_2=str_replace($rep_char,"",strip_tags($_POST['ee6_2']));
		}else{
		$ee6_2='';
		}
		
		if(isset($_POST['ee6_3'])){
			$ee6_3=str_replace($rep_char,"",strip_tags($_POST['ee6_3']));
		}else{
		$ee6_3='';
		}
		
		if(isset($_POST['ee6_4'])){
			$ee6_4=str_replace($rep_char,"",strip_tags($_POST['ee6_4']));
		}else{
		$ee6_4='';
		}
		if(isset($_POST['ee6_5'])){
			$ee6_5=str_replace($rep_char,"",strip_tags($_POST['ee6_5']));
		}else{
		$ee6_5='';
		}
		if(isset($_POST['ee6_6'])){
			$ee6_6=str_replace($rep_char,"",strip_tags($_POST['ee6_6']));
		}else{
		$ee6_6='';
		}
		
		
		
		if(isset($_POST['ee3_1'])){
			$ee3_1=str_replace($rep_char,"",strip_tags($_POST['ee3_1']));
		}else{
		$ee3_1='';
		}
		
		if(isset($_POST['ee3_2'])){
			$ee3_2=str_replace($rep_char,"",strip_tags($_POST['ee3_2']));
		}else{
		$ee3_2='';
		}
		
		if(isset($_POST['ee3_3'])){
			$ee3_3=str_replace($rep_char,"",strip_tags($_POST['ee3_3']));
		}else{
		$ee3_3='';
		}
		
		if(isset($_POST['ee3_4'])){
			$ee3_4=str_replace($rep_char,"",strip_tags($_POST['ee3_4']));
		}else{
		$ee3_4='';
		}
		
		if(isset($_POST['ee3_5'])){
			$ee3_5=str_replace($rep_char,"",strip_tags($_POST['ee3_5']));
		}else{
		$ee3_5='';
		}
	
		
		if(isset($_POST['post1_1'])){
			$post1_1=str_replace($rep_char,"",strip_tags($_POST['post1_1']));
		}else{
		$post1_1='';
		}
		
		if(isset($_POST['post1_2'])){
			$post1_2=str_replace($rep_char,"",strip_tags($_POST['post1_2']));
		}else{
		$post1_2='';
		}
		if(isset($_POST['post1_3'])){
			$post1_3=str_replace($rep_char,"",strip_tags($_POST['post1_3']));
		}else{
		$post1_3='';
		}
		if(isset($_POST['post1_4'])){
			$post1_4=str_replace($rep_char,"",strip_tags($_POST['post1_4']));
		}else{
		$post1_4='';
		}
		if(isset($_POST['post1_5'])){
			$post1_5=str_replace($rep_char,"",strip_tags($_POST['post1_5']));
		}else{
		$post1_5='';
		}
		
		if(isset($_POST['exch_1'])){
			$exch_1=str_replace($rep_char,"",strip_tags($_POST['exch_1']));
		}else{
		$exch_1='';
		}
		
		if(isset($_POST['exch_2'])){
			$exch_2=str_replace($rep_char,"",strip_tags($_POST['exch_2']));
		}else{
		$exch_2='';
		}
		if(isset($_POST['exch_3'])){
			$exch_3=str_replace($rep_char,"",strip_tags($_POST['exch_3']));
		}else{
		$exch_3='';
		}
		
		
		if(isset($_POST['cand_dclr']))
		{
			$cand_dclr=str_replace($rep_char,"",strip_tags($_POST['cand_dclr']));
		}
		else
		{
		$cand_dclr='';
		}

//------------------------------------------------------------------------------------------------------------------------------------------------------//		
		$link=@mysqli_connect("localhost",$user,$pass,$db) or die ("Error during connection");
		mysqli_select_db($link,$db);
		$app_no=mysqli_num_rows(mysqli_query($link,"select cand_app_no from online_app_zp_ttb where cand_post='".$cand_post."'"))+1;
		mysqli_close($link);
		$app_no=str_pad($app_no,6, "0", STR_PAD_LEFT);
		$cand_app_no=$cand_post.'/'.$app_no;
		$cand_app_no_img=$cand_post.'_'.$app_no;
	
		//-------------------- image uplaod ----------------------------//
		$target_dir = "../asaan/uploads/dlo/pics/";
        $randnum=mt_rand(1000000000, 9999999999);
        $candid="pic-".$randnum."-".$cand_app_no_img;
		$ext=pathinfo(basename($_FILES["cand_p_pic"]["name"]),PATHINFO_EXTENSION);
        $target_file = $target_dir . $candid.'.'.$ext;
        $uploadOk1 = 1;
        //print "<pre>"; print_r($_FILES); print "</pre>"; exit;

        if ($_FILES["cand_p_pic"]["size"] > 51200 || $_FILES["cand_p_pic"]["size"] < 10240)
        {
            //echo "Sorry, your file is too large or too small.";
            $uploadOk1 = 0;
        }
        else if ($_FILES["cand_p_pic"]["type"] != 'image/jpeg' && $_FILES["cand_p_pic"]["type"] != 'image/jpg')
        {
            //echo "Sorry, only JPG, JPEG files are allowed.";
            $uploadOk1 = 0;
        }
        else if (!move_uploaded_file($_FILES["cand_p_pic"]["tmp_name"], $target_file))
        {
            //echo "Sorry, there was an error uploading your file.";
            $uploadOk1 = 0;
        }
        else
        {
            //echo "The file '". basename( $_FILES["cand_p_pic"]["name"]). "' has been uploaded.";
        }

	//---------------------image uplaod ----------------------------//
	
	//-------------------- image signature ----------------------------//
		$target_dir = "../asaan/uploads/dlo/pics/";
        $candid2="sig-".$randnum."-".$cand_app_no_img;
		$ext2=pathinfo(basename($_FILES["cand_p_sig"]["name"]),PATHINFO_EXTENSION);
        $target_file2 = $target_dir . $candid2.'.'.$ext2;
        $uploadOk = 1;
        //print "<pre>"; print_r($_FILES); print "</pre>"; exit;

        if ($_FILES["cand_p_sig"]["size"] > 20480 || $_FILES["cand_p_sig"]["size"] < 10240 )
        {
            //echo "Sorry, your file is too large or too small.";
            $uploadOk = 0;
        }
		else if ($_FILES["cand_p_sig"]["type"] != 'image/jpeg' && $_FILES["cand_p_sig"]["type"] != 'image/jpg')
        {
           // echo "Sorry, only JPG, JPEG files are allowed.";
            $uploadOk = 0;
        }
        else if (!move_uploaded_file($_FILES["cand_p_sig"]["tmp_name"], $target_file2))
        {
            //echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
        }

	//---------------------image signature ----------------------------//
	
	//------------------------- AGE PROOF UPLOAD ---------------------------//
		$target_dir = "../asaan/uploads/dlo/pics/";
        $candid3="age_proof-".$randnum."-".$cand_app_no_img;
		$ext3=pathinfo(basename($_FILES["cand_p_age_proof"]["name"]),PATHINFO_EXTENSION);
        $target_file3 = $target_dir . $candid3.'.'.$ext3;
        $uploadOk2 = 1;
        //print "<pre>"; print_r($_FILES); print "</pre>"; exit;

        if ($_FILES["cand_p_age_proof"]["size"] > 102400 || $_FILES["cand_p_age_proof"]["size"] < 1024 )
        {
            //echo "Sorry, your file is too large or too small.";
            $uploadOk2 = 0;
        }
		else if ($_FILES["cand_p_age_proof"]["type"] != 'image/jpeg' && $_FILES["cand_p_age_proof"]["type"] != 'image/jpg')
        {
           // echo "Sorry, only JPG, JPEG files are allowed.";
            $uploadOk2 = 0;
        }
        else if (!move_uploaded_file($_FILES["cand_p_age_proof"]["tmp_name"], $target_file3))
        {
            //echo "Sorry, there was an error uploading your file.";
            $uploadOk2 = 0;
        }
//---------------------------------HS MARKS SHEET ---------------------------------//
		$target_dir = "../asaan/uploads/dlo/pics/";
        $candid4="hs_marksheet-".$randnum."-".$cand_app_no_img;
		$ext4=pathinfo(basename($_FILES["cand_p_hs_proof"]["name"]),PATHINFO_EXTENSION);
        $target_file4 = $target_dir . $candid4.'.'.$ext4;
        $uploadOk3 = 1;
        //print "<pre>"; print_r($_FILES); print "</pre>"; exit;

        if ($_FILES["cand_p_hs_proof"]["size"] > 102400 || $_FILES["cand_p_hs_proof"]["size"] < 1024 )
        {
            //echo "Sorry, your file is too large or too small.";
            $uploadOk3 = 0;
        }
		else if ($_FILES["cand_p_hs_proof"]["type"] != 'image/jpeg' && $_FILES["cand_p_hs_proof"]["type"] != 'image/jpg')
        {
           // echo "Sorry, only JPG, JPEG files are allowed.";
            $uploadOk3 = 0;
        }
        else if (!move_uploaded_file($_FILES["cand_p_hs_proof"]["tmp_name"], $target_file4))
        {
            //echo "Sorry, there was an error uploading your file.";
            $uploadOk3 = 0;
        }
		
//---------------------------------	CERTFICATE/BACHELOR LIB SC. MARKS SHEET -----------------------------------------
		$target_dir = "../asaan/uploads/dlo/pics/";
        $candid5="cert_marksheet-".$randnum."-".$cand_app_no_img;
		$ext5=pathinfo(basename($_FILES["cand_p_cert_proof"]["name"]),PATHINFO_EXTENSION);
        $target_file5 = $target_dir . $candid5.'.'.$ext5;
        $uploadOk4 = 1;
        //print "<pre>"; print_r($_FILES); print "</pre>"; exit;

        if ($_FILES["cand_p_cert_proof"]["size"] > 102400 || $_FILES["cand_p_cert_proof"]["size"] < 1024)
        {
            //echo "Sorry, your file is too large or too small.";
            $uploadOk4 = 0;
        }
		else if ($_FILES["cand_p_cert_proof"]["type"] != 'image/jpeg' && $_FILES["cand_p_cert_proof"]["type"] != 'image/jpg')
        {
           // echo "Sorry, only JPG, JPEG files are allowed.";
            $uploadOk4 = 0;
        }
        else if (!move_uploaded_file($_FILES["cand_p_cert_proof"]["tmp_name"], $target_file5))
        {
            //echo "Sorry, there was an error uploading your file.";
            $uploadOk4 = 0;
        }
//------------------------------------------------------------------------------------------		
		
		if($uploadOk!=0 && $uploadOk1!=0 && $uploadOk2!=0 && $uploadOk3!=0 && $uploadOk4!=0 )
		{
				$link=@mysqli_connect("localhost",$user,$pass,$db) or die ("Error during connection");
				mysqli_select_db($link,$db);
				
				if(mysqli_query($link,"insert into online_app_zp_ttb (cand_app_no,cand_dob) values ('".$cand_app_no."','".$cand_dob."')"))
				{
				//$sql2="insert into online_app_zp_ttb (cand_app_no,cand_dob) values ('".$cand_app_no."','".$cand_dob."')";	
					
				mysqli_query($link,"update online_app_zp_ttb set cand_app_dt='".$cand_app_dt."',cand_post='".$cand_post."',cand_nm='".$cand_nm."',cand_fh_nm='".$cand_fh_nm."',cand_mh_nm='".$cand_mh_nm."',cand_community='".$cand_community."',cand_sex='".$cand_sex."',cand_age='".$cand_age."',ck_citizen='".$ck_citizen."',ck_pwd='".$ck_pwd."',ck_msp='".$ck_msp."',cand_phone='".$cand_phone."',cand_mail='".$cand_mail."',cand_aadhar='".$cand_aadhar."',cand_religion='".$cand_religion."',cand_p_add='".$cand_p_add."',cand_p_block='".$cand_p_block."',cand_p_po='".$cand_p_po."',cand_p_ps='".$cand_p_ps."',cand_p_dis='".$cand_p_dis."',cand_p_st='".$cand_p_st."',cand_p_pin='".$cand_p_pin."',cand_c_add='".$cand_c_add."',cand_c_block='".$cand_c_block."',cand_c_po='".$cand_c_po."',cand_c_ps='".$cand_c_ps."',cand_c_dis='".$cand_c_dis."',cand_c_st='".$cand_c_st."',cand_c_pin='".$cand_c_pin."',ee1_1='".$ee1_1."',ee1_2='".$ee1_2."',ee1_3='".$ee1_3."',ee1_4='".$ee1_4."',ee1_5='".$ee1_5."',ee1_6='".$ee1_6."',ee2_1='".$ee2_1."',ee2_2='".$ee2_2."',ee2_3='".$ee2_3."',ee2_4='".$ee2_4."',ee2_5='".$ee2_5."',ee2_6='".$ee2_6."',ee3_1='".$ee3_1."',ee3_2='".$ee3_2."',ee3_3='".$ee3_3."',ee3_4='".$ee3_4."',ee3_5='".$ee3_5."',ee4_1='".$ee4_1."',ee4_2='".$ee4_2."',ee4_3='".$ee4_3."',ee4_4='".$ee4_4."',ee4_5='".$ee4_5."',ee4_6='".$ee4_6."',ee5_1='".$ee5_1."',ee5_2='".$ee5_2."',ee5_3='".$ee5_3."',ee5_4='".$ee5_4."',ee5_5='".$ee5_5."',ee5_6='".$ee5_6."',ee6_1='".$ee6_1."',ee6_2='".$ee6_2."',ee6_3='".$ee6_3."',ee6_4='".$ee6_4."',ee6_5='".$ee6_5."',ee6_6='".$ee6_6."',post1_0='WORK EXPERIENCE',post1_1='".$post1_1."',post1_2='".$post1_2."',post1_3='".$post1_3."',post1_4='".$post1_4."',post1_5='".$post1_5."',exch_1='".$exch_1."',exch_2='".$exch_2."',exch_3='".$exch_3."',cand_dclr='".$cand_dclr."',cand_p_pic='".$target_file."',cand_p_sig='".$target_file2."',cand_p_age_proof='".$target_file3."',cand_p_hs_proof='".$target_file4."',cand_p_cert_proof='".$target_file5."' where cand_app_no='".$cand_app_no."' and cand_dob='".$cand_dob."'");
				//$sql1 ="update online_app_zp_ttb set cand_app_dt='".$cand_app_dt."',cand_post='".$cand_post."',cand_nm='".$cand_nm."',cand_fh_nm='".$cand_fh_nm."',cand_mh_nm='".$cand_mh_nm."',cand_community='".$cand_community."',cand_sex='".$cand_sex."',cand_age='".$cand_age."',ck_citizen='".$ck_citizen."',ck_ex_serv='".$ex_serv."',ex_serv_yr='". $ex_serv_yr ."',cand_ec='".$ck_ec."',ck_pwd='".$ck_pwd."',ck_msp='".$ck_msp."',cand_phone='".$cand_phone."',cand_mail='".$cand_mail."'cand_aadhar='".$cand_aadhar."',cand_religion='".$cand_religion."',cand_p_add='".$cand_p_add."',cand_p_block='".$cand_p_block."',cand_p_po='".$cand_p_po."',cand_p_ps='".$cand_p_ps."',cand_p_dis='".$cand_p_dis."',cand_p_st='".$cand_p_st."',cand_p_pin='".$cand_p_pin."',cand_c_add='".$cand_c_add."',cand_c_block='".$cand_c_block."',cand_c_po='".$cand_c_po."',cand_c_ps='".$cand_c_ps."',cand_c_dis='".$cand_c_dis."',cand_c_st='".$cand_c_st."',cand_c_pin='".$cand_c_pin."',ee1_1='".$ee1_1."',ee1_2='".$ee1_2."',ee1_3='".$ee1_3."',ee1_4='".$ee1_4."',ee1_5='".$ee1_5."',ee1_6='".$ee1_6."',ee2_1='".$ee2_1."',ee2_2='".$ee2_2."',ee2_3='".$ee2_3."',ee2_4='".$ee2_4."',ee2_5='".$ee2_5."',ee2_6='".$ee2_6."',ee3_1='".$ee3_1."',ee3_2='".$ee3_2."',ee3_3='".$ee3_3."',ee3_4='".$ee3_4."',ee3_5='".$ee3_5."',ee4_1='".$ee4_1."',ee4_2='".$ee4_2."',ee4_3='".$ee4_3."',ee4_4='".$ee4_4."',ee4_5='".$ee4_5."',ee4_6='".$ee4_6."',',ee5_1='".$ee5_1."',ee5_2='".$ee5_2."',ee5_3='".$ee5_3."',ee5_4='".$ee5_4."',ee5_5='".$ee5_5."',ee5_6='".$ee5_6."',ee6_1='".$ee6_1."',ee6_2='".$ee6_2."',ee6_3='".$ee6_3."',ee6_4='".$ee6_4."',ee6_5='".$ee6_5."',ee6_6='".$ee6_6."',post1_0='WORK EXPERIENCE',post1_1='".$post1_1."',post1_2='".$post1_2."',post1_3='".$post1_3."',post1_4='".$post1_4."',exch_1='".$exch_1."',exch_2='".$exch_2."',exch_3='".$exch_3."',cand_dclr='".$cand_dclr."',cand_p_pic='".$target_file."',cand_p_sig='".$target_file2."' where cand_app_no='".$cand_app_no."' and cand_dob='".$cand_dob."'";
				//$sql1 = "update online_app_zp_ttb set cand_app_dt='".$cand_app_dt."',cand_post='".$cand_post."',cand_nm='".$cand_nm."',cand_fh_nm='".$cand_fh_nm."',cand_mh_nm='".$cand_mh_nm."',cand_community='".$cand_community."',cand_sex='".$cand_sex."',cand_age='".$cand_age."',ck_citizen='".$ck_citizen."',ck_pwd='".$ck_pwd."',ck_msp='".$ck_msp."',cand_phone='".$cand_phone."',cand_mail='".$cand_mail."',cand_aadhar='".$cand_aadhar."',cand_religion='".$cand_religion."',cand_p_add='".$cand_p_add."',cand_p_block='".$cand_p_block."',cand_p_po='".$cand_p_po."',cand_p_ps='".$cand_p_ps."',cand_p_dis='".$cand_p_dis."',cand_p_st='".$cand_p_st."',cand_p_pin='".$cand_p_pin."',cand_c_add='".$cand_c_add."',cand_c_block='".$cand_c_block."',cand_c_po='".$cand_c_po."',cand_c_ps='".$cand_c_ps."',cand_c_dis='".$cand_c_dis."',cand_c_st='".$cand_c_st."',cand_c_pin='".$cand_c_pin."',ee1_1='".$ee1_1."',ee1_2='".$ee1_2."',ee1_3='".$ee1_3."',ee1_4='".$ee1_4."',ee1_5='".$ee1_5."',ee1_6='".$ee1_6."',ee2_1='".$ee2_1."',ee2_2='".$ee2_2."',ee2_3='".$ee2_3."',ee2_4='".$ee2_4."',ee2_5='".$ee2_5."',ee2_6='".$ee2_6."',ee3_1='".$ee3_1."',ee3_2='".$ee3_2."',ee3_3='".$ee3_3."',ee3_4='".$ee3_4."',ee3_5='".$ee3_5."',ee4_1='".$ee4_1."',ee4_2='".$ee4_2."',ee4_3='".$ee4_3."',ee4_4='".$ee4_4."',ee4_5='".$ee4_5."',ee4_6='".$ee4_6."',ee5_1='".$ee5_1."',ee5_2='".$ee5_2."',ee5_3='".$ee5_3."',ee5_4='".$ee5_4."',ee5_5='".$ee5_5."',ee5_6='".$ee5_6."',ee6_1='".$ee6_1."',ee6_2='".$ee6_2."',ee6_3='".$ee6_3."',ee6_4='".$ee6_4."',ee6_5='".$ee6_5."',ee6_6='".$ee6_6."',post1_0='WORK EXPERIENCE',post1_1='".$post1_1."',post1_2='".$post1_2."',post1_3='".$post1_3."',post1_4='".$post1_4."',exch_1='".$exch_1."',exch_2='".$exch_2."',exch_3='".$exch_3."',cand_dclr='".$cand_dclr."',cand_p_pic='".$target_file."',cand_p_sig='".$target_file2."',cand_p_age_proof='".$target_file3."'cand_p_hs_proof='".$target_file4."',cand_p_cert_proof='".$target_file5."' where cand_app_no='".$cand_app_no."' and cand_dob='".$cand_dob."'";		
				//echo $sql1;
				}
				else
				{
				mysqli_close($link);
				?>
				
					<script language="javascript">
					alert('Sorry, Error occured during insertion of data please try again!');
					window.location="online_app_frm.php";
					</script>
  					<?php
					exit();

				}
				mysqli_close($link);

		?>
    	<script>
		window.location="confirmation.php?can=<?php echo $cand_app_no;?>&cd=<?php echo $_POST['cand_dob']?>";
		</script>
  		<?php
		exit();
		}
		else
		{
		?>
		<script language="javascript">
		alert('Sorry, you have provided an invalid Image / Signature / Age Prrof/ HS Marks Sheet/ Certificate Marks Sheet File');
		window.location="online_app_frm.php";
		</script>
  		<?php 
		exit();
	    }
	
	
//------------------------------------------------------------------------------------------------------------------------------------------------------//		
	}
	else
	{
		?>
		<script language="javascript">
		alert('Sorry, you have provided an invalid security code');
		</script>
  		<?php 
        $foc='security_code';
	}
}
$rand=md5(rand());
$_SESSION['rand']=$rand;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="include_web/ddlevelsmenu-base.css" />
<script type="text/javascript" src="include_web/md5.js"></script>
<script type="text/javascript" src="include_web/ddlevelsmenu.js"></script>
<script language="javascript" type="text/javascript" src="include_web/actb.js"></script>
<script language="javascript" type="text/javascript" src="include_web/common.js"></script>
<!--<link rel="shortcut icon" href="include_web/l_icon.gif" type="image/x-icon" /> -->
<script language="JavaScript" src="calendar_eu.js"></script>
<link rel="stylesheet" href="calendar.css">
<title>Online Application</title>
<style type="text/css">
<!--
#op_com_app_dtl{width:900px; font-size:13px; font-family: Verdana, Arial, Helvetica, sans-serif;}
#c_dtl{text-align:center; width:900px}
.op_edu_app_dtl{width:900px; font-size:13px; font-family: Verdana, Arial, Helvetica, sans-serif;}
.c_dtl_l{width:300px; height:25px; float:left; vertical-align:middle; vertical-align:middle; padding-bottom:5px; padding-top:5px; text-align:right; padding-right:5px; display:inline-block; font-family: Verdana, Arial, Helvetica, sans-serif;}
.c_dtl_ll{width:300px; height:70px; float:left; vertical-align:middle; vertical-align:middle; padding-bottom:5px; padding-top:5px; text-align:right; padding-right:5px; display:inline-block; font-family: Verdana, Arial, Helvetica, sans-serif;}
.c_dtl_r{width:570px; height:25px; float:right; vertical-align:middle; vertical-align:middle; padding-bottom:5px; padding-top:5px; text-align:left; display:inline-block; font-family: Verdana, Arial, Helvetica, sans-serif;}
.c_dtl_rr{width:570px; height:70px; float:right; vertical-align:middle; vertical-align:middle; padding-bottom:5px; padding-top:5px; text-align:left; display:inline-block; font-family: Verdana, Arial, Helvetica, sans-serif;}
.c_dtl_all{width: 890px; vertical-align: middle; padding-bottom: 5px; padding-top: 5px; text-align: left; display: inline-block; font-size: 16px; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif;}
.c_dtl_all_fut{width: 890px; vertical-align: middle; padding-bottom: 5px; padding-top: 5px; text-align: left; display: inline-block; font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif;}
.main_body{width:900px; height:auto; text-align:left; font-size:12px; margin:0 auto; background-color:#FFFFFF; padding-top:20px; padding-bottom:20px; padding-left:10px; padding-right:10px; border:#370909 solid; font-family: Verdana, Arial, Helvetica, sans-serif;}
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
	font-size: 14;
}
.style16 {color: #FF0000; text-align:justify;}
.style19 {font-size: 12; font-weight: bold; }
.style21 {font-size: 11px}
.style22 {color: #993300}

-->
</style>
</head>

<body style="background-color:#E3D5D9;" onLoad="document.o_a.<?php if($foc==''){echo "cand_post";}else{echo $foc;}?>.focus()">
<noscript><meta http-equiv="refresh" content="0; url=java_script_prob.html"></noscript>
<form method="post" name="o_a" onSubmit="return ckfrm()" enctype="multipart/form-data">
	<div class="main_body" align="center">
    
<!--------------------------------------Header Tag Start------------------------------->

		<div align="center" id="op_head">
        	<span class="style4"><u><span class="style10">Office Of The District Magistrate &amp; Collector<br />
        	District e-Governance Socities (DeGS)
        	<br/>
        	 Purba Medinipur</span></u></span><br />
            <span class="style14">APPLICATION FORM FOR RECUIRTMENT OF <br/>
            DISTRICT PROJECT MANAGER FOR PURBA MEDINIPUR<br />
           <br /><hr />
            <br />
        </span></div>
        
<!--------------------------------------Header Tag End------------------------------->
        
<!--------------------------------------Common Application Details Start------------------------------->

		<div id="op_com_app_dtl">
        	<div id="c_dtl">
                <div class="c_dtl_l">POST APPLIED FOR<span class="style16">*</span></div>
              	<div class="c_dtl_r">
                	<select name="cand_post" id="cand_post" onKeyPress="return char_number_allow('cand_nm', event)" onFocus="DoFocus(this)" style="font-size:12px; width:220px;" class="normalfld"  autocomplete="off" onChange="change_data()">
                       <option value="">SELECT POST APPLIED FOR</option>
                       <option <?php if(isset($_POST['sub_sub'])){if($_POST['cand_post']=='post1'){?>selected="selected"<?php }}?> value="post1">DISTRICT PROJECT MANAGER</option> 
                    </select>
           	  	</div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">NAME OF THE CANDIDATE<span class="style16">*</span></div>
              <div class="c_dtl_r">
           	    <input type="text" maxlength="70" style="font-size:12px; width:280px;" name="cand_nm" id="cand_nm" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return char_allow('cand_fh_nm', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_nm'];}?>" />
           	  </div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">FATHER'S / HUSBAND'S NAME<span class="style16">*</span></div>
              	<div class="c_dtl_r">
           	    	<input type="text" maxlength="70" style="font-size:12px; width:280px;" name="cand_fh_nm" id="cand_fh_nm" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return char_allow('cand_mh_nm', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_fh_nm'];}?>" />
           	  	</div>
            </div>
			<div id="c_dtl">
                <div class="c_dtl_l">MOTHER'S NAME<span class="style16">*</span></div>
              	<div class="c_dtl_r">
           	    	<input type="text" maxlength="70" style="font-size:12px; width:280px;" name="cand_mh_nm" id="cand_mh_nm" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return char_allow('cand_community', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_mh_nm'];}?>" />
           	  	</div>
            </div>
			
			  	<div id="c_dtl">
                <div class="c_dtl_l">CATEGORY<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<select name="cand_community" id="cand_community" onKeyPress="return char_number_allow('cand_sex', event)" onFocus="DoFocus(this)" style="font-size:12px; width:150px;" class="normalfld"  autocomplete="off" onChange="change_data();">
                        <option value="">SELECT CATEGORY</option>
                        <option <?php if(isset($_POST['sub_sub'])){if($_POST['cand_community']=='GEN'){?>selected="selected"<?php }}?> value="GEN">GEN</option>
                        <option <?php if(isset($_POST['sub_sub'])){if($_POST['cand_community']=='SC'){?>selected="selected"<?php }}?> value="SC">SC</option>
                        <option <?php if(isset($_POST['sub_sub'])){if($_POST['cand_community']=='ST'){?>selected="selected"<?php }}?> value="ST">ST</option>
                        <option <?php if(isset($_POST['sub_sub'])){if($_POST['cand_community']=='OBC-A'){?>selected="selected"<?php }}?> value="OBC-A">OBC-A</option>
                        <option <?php if(isset($_POST['sub_sub'])){if($_POST['cand_community']=='OBC-B'){?>selected="selected"<?php }}?> value="OBC-B">OBC-B</option>
                    </select>
               	</div>
         	</div>
       	  	<div id="c_dtl">
                <div class="c_dtl_l">GENDER<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<select name="cand_sex" id="cand_sex" onKeyPress="return char_number_allow('ck_blind', event)" onFocus="DoFocus(this)" style="font-size:12px; width:150px;" class="normalfld"  autocomplete="off">
                        <option value="">SELECT GENDER</option>
                        <option <?php if(isset($_POST['sub_sub'])){if($_POST['cand_sex']=='M'){?>selected="selected"<?php }}?> value="M">MALE</option>
                        <option <?php if(isset($_POST['sub_sub'])){if($_POST['cand_sex']=='F'){?>selected="selected"<?php }}?> value="F">FEMALE</option>
						<option <?php if(isset($_POST['sub_sub'])){if($_POST['cand_sex']=='O'){?>selected="selected"<?php }}?> value="O">THIRD GENDER</option>
						
                    </select>
              	</div>
          	</div>
        	<div id="c_dtl">
                <div class="c_dtl_l" style="vertical-align:top;">ARE YOU</div>
                <div class="c_dtl_r">
				<div class="c_dtl_r">
                	<input type="checkbox" <?php if(isset($_POST['sub_sub'])){if(isset($_POST['ck_citizen']) && $_POST['ck_citizen'] == 'on'){?>checked="checked"<?php }}
   ?> name="ck_citizen" id="ck_citizen" onKeyPress="return dt_allow('ex_serv', event)" />&nbsp;<span class="style16">*</span>CITIZEN OF INDIA AS DEFINED IN  PART-II OF THE CONSTITUTION OF INDIA </div>
          	</div>
			</div>
 <!--
			<div id="c_dtl">
                <div class="c_dtl_l" style="vertical-align:top;"></div>
				<div class="c_dtl_r">
				<input type="checkbox" onChange="change_data_c();" <?php if(isset($_POST['sub_sub'])){if(isset($_POST['ex_serv']) && $_POST['ex_serv'] == 'on'){?> checked="checked" <?php }}?> name="ex_serv" id="ex_serv" onKeyPress="return dt_allow('ex_serv_yr', event)"/>&nbsp;AN EX-SERVICEMAN. Please provide actual years of such service rendered&nbsp;
                <input type="text" disabled maxlength="2" style="font-size:12px; width:30px; height:15px;" name="ex_serv_yr" id="ex_serv_yr" onChange="change_data_c();" onKeyPress="return number_allow('ck_ec', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){ echo $_POST['ex_serv_yr'];}?>" /><br />
				</div>
			</div>
				
  <div id="c_dtl">
                <div class="c_dtl_l" style="vertical-align:top;"></div>
                <div class="c_dtl_r">
				<input onChange="change_data_c();" type="checkbox" <?php if(isset($_POST['ck_ec'])){if(isset($_POST['ck_ec']) && $_POST['ck_ec'] == 'on'){?>checked="checked"<?php }}?> name="ck_ec" id="ck_ec" onKeyPress="return dt_allow('ck_pwd', event)"/>&nbsp;EXEMPTED CATEGORY&nbsp;&nbsp; <br/>
				
 </div>
 </div>
 -->
 <div id="c_dtl">
                <div class="c_dtl_l" style="vertical-align:top;"></div>
                <div class="c_dtl_r">
				<input onChange="change_data_c();" type="checkbox" <?php if(isset($_POST['ck_pwd'])){if(isset($_POST['ck_pwd']) && $_POST['ck_pwd'] == 'on'){?>checked="checked"<?php }}?> name="ck_pwd" id="ck_pwd" onKeyPress="return dt_allow('ck_ret_per', event)"/>&nbsp;PERSON WITH DISABILITIES&nbsp;&nbsp;<br/>
				
 </div>
 </div>
  <!-- <div id="c_dtl">
                <div class="c_dtl_l" style="vertical-align:top;"></div>
                <div class="c_dtl_r">
				<input onChange="change_data_c();" type="checkbox" <?php if(isset($_POST['ck_ret_per'])){if(isset($_POST['ck_ret_per']) && $_POST['ck_ret_per'] == 'on'){?>checked="checked"<?php }}?> name="ck_ret_per" id="ck_ret_per" onKeyPress="return dt_allow('cand_dob', event)"/>&nbsp;RETIRED PERSON&nbsp;&nbsp;<br/>
				
 </div>
 </div> -->
		<div id="c_dtl">
                <div class="c_dtl_l" style="vertical-align:top;"></div>
                <div class="c_dtl_r">
				<input onChange="change_data_c();" type="checkbox" <?php if(isset($_POST['ck_msp'])){if(isset($_POST['ck_msp']) &&
   $_POST['ck_msp'] == 'on'){?>checked="checked"<?php }}?> name="ck_msp" id="ck_msp" onKeyPress="return dt_allow('ck_citizen', event)"/>&nbsp;KNOWLEDGE OF ENGLISH AND BENGALI &nbsp;&nbsp;</div>
		</div>

        	<br>
			
			<div id="c_dtl">
                <div class="c_dtl_l">DATE OF BIRTH<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="10" style="font-size:12px; width:80px;" name="cand_dob" id="cand_dob" onChange="chkdt();" onClick="chkdt();" onKeyPress="return dt_allow('cand_age', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_dob'];}?>" />
					<script language="JavaScript">
						new tcal1 ({
							// form name
							'formname': 'o_a',
							// input name
							'controlname': 'cand_dob'
						});
                            
                  	</script>&nbsp;&nbsp;<span class="style11">(DD/MM/YYYY)</span></div>
          	</div>
        	<div id="c_dtl">
                <div class="c_dtl_l">AGE(as on 01-01-2022)<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="2" style="font-size:12px; width:135px;" name="cand_age" id="cand_age" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return no_allow('cand_phone', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_age'];}?>" />&nbsp;&nbsp;<span class="style11">(YEARS)</span>           		</div>
          	</div>
   	  		<div id="c_dtl">
                <div class="c_dtl_l">MOBILE  NO<span class="style16">*</span></div>
        		<div class="c_dtl_r">
                	+91<input type="text" maxlength="10" style="font-size:12px; width:127px;" name="cand_phone" id="cand_phone" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return number_allow('cand_mail', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_phone'];}?>" />
             	</div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">E-MAIL</div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="50" style="font-size:12px; width:280px;" name="cand_mail" id="cand_mail" onChange="return val_mail(this)" onKeyPress="return email_allow('cand_religion', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_mail'];}?>" />
              	</div>
          	</div>
			
			<div id="c_dtl">
                <div class="c_dtl_l">RELIGION<span class="style16">*</span></div>
              	<div class="c_dtl_r">
           	    	<input type="text" maxlength="50" style="font-size:12px; width:280px;" name="cand_religion" id="cand_religion" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return char_allow('cand_aadhar', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_religion'];}?>" />
           	  	</div>
            </div>
						
			<div id="c_dtl">
                <div class="c_dtl_l">AADHAR NO</span></div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="12" style="font-size:12px; width:280px;" name="cand_aadhar" id="cand_aadhar" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return number_allow('cand_p_add', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_aadhar'];}?>" />
              	</div>
          	</div>
        	<div id="c_dtl">
                <div class="c_dtl_l"><u><strong>PRESENT ADDRESS</strong></u></div>
                <div class="c_dtl_r"></div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">VILLAGE / ROAD / TOWN<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="60" style="font-size:12px; width:280px;" name="cand_p_add" id="cand_p_add" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_p_block', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_p_add'];}?>" />
              	</div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">BLOCK / MUNICIPALITY / CORPORATION<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="50" style="font-size:12px; width:280px;" name="cand_p_block" id="cand_p_block" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_p_po', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_p_block'];}?>" />
              	</div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">POST OFFICE<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="50" style="font-size:12px; width:280px;" name="cand_p_po" id="cand_p_po" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_p_ps', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_p_po'];}?>" />
               	</div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">POLICE STATION<span class="style16">*</span></div>
                <div class="c_dtl_r">
            		<input type="text" maxlength="50" style="font-size:12px; width:280px;" name="cand_p_ps" id="cand_p_ps" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_p_dis', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_p_ps'];}?>" />
             	</div>
            </div>
			<div id="c_dtl">
                <div class="c_dtl_l">DISTRICT<span class="style16">*</span></div>
                <div class="c_dtl_r">
            		<input type="text" maxlength="50" style="font-size:12px; width:280px;" name="cand_p_dis" id="cand_p_dis" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_p_pin', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_p_dis'];}?>" />
             	</div>
            </div>
			<div id="c_dtl">
                <div class="c_dtl_l">STATE<span class="style16">*</span></div>
                <div class="c_dtl_r">
            		<input type="TEXT" maxlength="50" style="font-size:12px; width:280px;" name="cand_p_st" id="cand_p_st" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_p_dis', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_p_st'];}?>" />
             	</div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">PIN<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="6" style="font-size:12px; width:150px;" name="cand_p_pin" id="cand_p_pin" onChange="return pinck(this);" onKeyPress="return number_allow('ck_copy', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_p_pin'];}?>" />
               	</div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l"><u><strong>PERMANENT ADDRESS</strong></u></div>
               <div class="c_dtl_r"> 
                	&nbsp;&nbsp;<input type="checkbox" <?php if(isset($_POST['sub_sub'])){if(isset($_POST['ck_copy']) &&
   $_POST['ck_copy'] == 'on'){?>checked="checked"<?php }}?> name="ck_copy" id="ck_copy" onKeyPress="return dt_allow('cand_c_add', event)" onChange="copy_data();"/>
                	&nbsp;SAME AS PRESENT ADDRESS              </div> 
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">VILLAGE / ROAD / TOWN<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="50" style="font-size:12px; width:280px;" name="cand_c_add" id="cand_c_add" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_c_block', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_c_add'];}?>" />
              	</div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">BLOCK / MUNICIPALITY / CORPORATION<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="60" style="font-size:12px; width:280px;" name="cand_c_block" id="cand_c_block" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_c_po', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_c_block'];}?>" />
               	</div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">POST OFFICE<span class="style16">*</span></div>
                <div class="c_dtl_r">
             		<input type="text" maxlength="50" style="font-size:12px; width:280px;" name="cand_c_po" id="cand_c_po" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_c_ps', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_c_po'];}?>" />
             	</div>
            </div>
        	<div id="c_dtl">
                <div class="c_dtl_l">POLICE STATION<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="50" style="font-size:12px; width:280px;" name="cand_c_ps" id="cand_c_ps" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_c_dis', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_c_ps'];}?>" />
              	</div>
            </div>
			<div id="c_dtl">
                <div class="c_dtl_l">DISTRICT<span class="style16">*</span></div>
                <div class="c_dtl_r">
            		<input type="TEXT" maxlength="50" style="font-size:12px; width:280px;" name="cand_c_dis" id="cand_c_dis" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_c_pin', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_c_dis'];}?>" />
             	</div>
            </div>
				<div id="c_dtl">
                <div class="c_dtl_l">STATE<span class="style16">*</span></div>
                <div class="c_dtl_r">
            		<input type="TEXT" maxlength="50" style="font-size:12px; width:280px;" name="cand_c_st" id="cand_c_st" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('cand_c_dis', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_c_st'];}?>" />
             	</div>
            </div>
       	  	<div id="c_dtl">
              	<div class="c_dtl_l">PIN<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="text" maxlength="6" style="font-size:12px; width:150px;" name="cand_c_pin" id="cand_c_pin" onChange="return pinck(this);" onKeyPress="return number_allow('ee1_1', event)" autocomplete="off" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['cand_c_pin'];}?>" />
                </div>
          	</div>
        	
<!--------------------------------------Common Application Details End------------------------------->
       	
<!--------------------------------------ESSENTIAL Educational Details Start------------------------------->
            <div id="c_dtl">
                <div class="c_dtl_all"><u>EDUCATIONAL QUALIFICATION</u><br /> 
                <span class="style16">Note:Those fields are not applicable Mark as  NA or '0'</span>
                
                </div>
            </div>
           
           	<div id="c_dtl">
                <table border="1">
                    <tr>
                        <td width="117"><div align="center" class="style19">NAME OF THE EXAMINATION</div></td>
                      	<td width="267"><div align="center" class="style19">BOARD/COUNCIL/UNIVERSITY</div></td>
                      	<td width="170"><div align="center" class="style19">STREAM/</br>SUBJECTS</div></td>
						<td width="60"><div align="center" class="style19">%OF<br />MARKS</div></td>
                      	<td width="68"><div align="center" class="style19">YEAR OF<br />PASSING<br />(YYYY)</div></td>
						<td width="117"><div align="center" class="style19">FULL<br />MARKS<br/>OF<br/>EXAMINATION</div></td>
						<td width="84"><div align="center" class="style19">TOTAL<br />MARKS<br/>OBTAINED</div></td>
                   
                  	</tr>
                    <tr>
                        <td align="justify"><span class="style21">MADHYAMIK OR ITS EQUIVALENT</span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:267px; height:40px;" name="ee1_1" id="ee1_1" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee1_2', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee1_1'];}?></textarea></span>                       	</td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:170px; height:40px;" name="ee1_2" id="ee1_2" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee1_3', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee1_2'];}?></textarea></span>                      	</td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><input name="ee1_3" type="text" id="ee1_3" style="width:60px; height:40px;" onChange="return marksck(this);" onKeyPress="return number_value_allow('ee1_4', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee1_3'];}?>" maxlength="5" autocomplete="off" /></span>                       	</td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><input name="ee1_4" type="text" id="ee1_4" style="width:68px; height:40px;" onChange="return yrck(this);" onKeyPress="return number_allow('ee1_5', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee1_4'];}?>" maxlength="4" autocomplete="off" /></span>                     	</td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee1_5" type="text" id="ee1_5" style="width:117px; height:40px;" onChange="return totmarksck(this);" onKeyPress="return number_allows('ee1_6', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee1_5'];}?>" maxlength="4" autocomplete="off" /></span>                       	</td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee1_6" type="text" id="ee1_6" style="width:84px; height:40px;" onChange="return totmarksck(this);" onKeyPress="return number_allows('ee2_1', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee1_6'];}?>" maxlength="4" autocomplete="off" /></span></td>
							
               	  	</tr>
                    
                    <tr>
                        <td align="justify"><span class="style21">HIGHER SECONDARY OR ITS EQUIVALENT</span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:267px; height:40px;" name="ee2_1" id="ee2_1" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee2_2', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee2_1'];}?></textarea></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:170px; height:40px;" name="ee2_2" id="ee2_2" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee2_3', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee2_2'];}?></textarea></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee2_3" type="text" id="ee2_3" style="width:60px; height:40px;" onChange="return marksck(this);" onKeyPress="return number_value_allow('ee2_4', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee2_3'];}?>" maxlength="5" autocomplete="off" /></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><input name="ee2_4" type="text" id="ee2_4" style="width:68px; height:40px;" onChange="return yrck(this);" onKeyPress="return number_allow('ee2_5', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee2_4'];}?>" maxlength="4" autocomplete="off" /></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee2_5" type="text" id="ee2_5" style="width:117px; height:40px;" onChange="return totmarksck(this);" onKeyPress="return number_allows('ee2_6', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee2_5'];}?>" maxlength="4" autocomplete="off" /></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee2_6" type="text" id="ee2_6" style="width:84px; height:40px;" onChange="return totmarksck(this);" onKeyPress="return number_allows('ee4_1', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee2_6'];}?>" maxlength="4" autocomplete="off" /></span> </td>
						
					</tr>

                    <tr>
                        <td align="justify"><span class="style21">GRADUATION OR ITS EQUIVALENT</span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:267px; height:40px;" name="ee4_1" id="ee4_1" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee4_2', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee4_1'];}?></textarea></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:170px; height:40px;" name="ee4_2" id="ee4_2" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee4_3', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee4_2'];}?></textarea></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee4_3" type="text" id="ee4_3" style="width:60px; height:40px;" onChange="return marksck(this);" onKeyPress="return number_value_allow('ee4_4', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee4_3'];}?>" maxlength="5" autocomplete="off" /></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><input name="ee4_4" type="text" id="ee4_4" style="width:68px; height:40px;" onChange="return yrck(this);" onKeyPress="return number_allow('ee4_5', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee4_4'];}?>" maxlength="4" autocomplete="off" /></span></td>			
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee4_5" type="text" id="ee4_5" style="width:117px; height:40px;" onChange="return totmarksck(this);" onKeyPress="return number_allows('ee4_6', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee4_5'];}?>" maxlength="4" autocomplete="off" /></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee4_6" type="text" id="ee4_6" style="width:84px; height:40px;" onChange="return totmarksck(this);" onKeyPress="return number_allows('ee5_1', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee4_6'];}?>" maxlength="4" autocomplete="off" /></span></td>
						
					</tr>
                   
                    <tr>
                        <td align="justify"><span class="style21">POST GRADUATION OR ITS EQUIVALENT</span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:267px; height:40px;" name="ee5_1" id="ee5_1" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee5_2', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee5_1'];}?></textarea></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:170px; height:40px;" name="ee5_2" id="ee5_2" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee5_3', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee5_2'];}?></textarea></span></td>
                   	  	
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee5_3" type="text" id="ee5_3" style="width:60px; height:40px;" onChange="return marksck(this);" onKeyPress="return number_value_allow('ee5_4', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee5_3'];}?>" maxlength="5" autocomplete="off" /></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><input name="ee5_4" type="text" id="ee5_4" style="width:68px; height:40px;" onChange="return yrck(this);" onKeyPress="return number_allows('ee5_5', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee5_4'];}?>" maxlength="4" autocomplete="off" /></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee5_5" type="text" id="ee5_5" style="width:117px; height:40px;" onChange="return totmarksck(this);" onKeyPress="return number_allows('ee5_6', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee5_5'];}?>" maxlength="4" autocomplete="off" /></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee5_6" type="text" id="ee5_6" style="width:84px; height:40px;" onChange="return totmarksck(this);" onKeyPress="return number_allows('ee6_1', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee5_6'];}?>" maxlength="4" autocomplete="off" /></span></td>
						
					</tr> 
					<tr>
                        <td align="justify"><span class="style21">OTHER CERTIFICATE(IF ANY).</span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:267px; height:40px;" name="ee6_1" id="ee6_1" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee6_2', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee6_1'];}?></textarea></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:170px; height:40px;" name="ee6_2" id="ee6_2" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee6_3', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee6_2'];}?></textarea></span></td>
                   	  	
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee6_3" type="text" id="ee6_3" style="width:60px; height:40px;" onChange="return marksck(this);" onKeyPress="return number_value_allow('ee6_4', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee6_3'];}?>" maxlength="5" autocomplete="off" /></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><input name="ee6_4" type="text" id="ee6_4" style="width:68px; height:40px;" onChange="return yrck(this);" onKeyPress="return number_allows('ee6_5', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee6_4'];}?>" maxlength="4" autocomplete="off" /></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee6_5" type="text" id="ee6_5" style="width:117px; height:40px;" onChange="return totmarksck(this);" onKeyPress="return number_allows('ee6_6', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee6_5'];}?>" maxlength="4" autocomplete="off" /></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee6_6" type="text" id="ee6_6" style="width:84px; height:40px;" onChange="return totmarksck(this);" onKeyPress="return number_allows('ee3_1', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee6_6'];}?>" maxlength="4" autocomplete="off" /></span></td>				
					</tr> 
                </table>
            </div> 
      	</div>
<!--------------------------------------ESSENTIAL Educational Details End------------------------------------------>
<!--------------------------------------COMPUTER CERTIFICATE------------------------------->

<div class="op_edu_app_dtl" >
			<div id="c_dtl">
                <div class="c_dtl_all"><u>KNOWLEDGE IN COMPUTER </u></div>
            </div>
</div>
<div  class="op_edu_app_dtl">
        	<div id="c_dtl">
                <table border="1">
                    <tr>
                        <td width="300"><div align="center" class="style19">NAME OF THE INSTITUTION</div></td>
                      	<td width="260"><div align="center" class="style19">NAME OF THE COURSE</div></td>
                      	<td width="180"><div align="center" class="style19">DURATION OF COURSE <br/>(IN MONTHS)</div></td>
                      	<td width="80"><div align="center" class="style19">MARKS OBTAINED/<br/>GRADE</div></td>
						<td width="60"><div align="center" class="style19">YEAR OF<br />PASSING<br />(YYYY)</div></td>
					</tr>
					<tr>
                       	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:285px; height:40px;" name="ee3_1" id="ee3_1" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee3_2', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee3_1'];}?></textarea></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:260px; height:40px;" name="ee3_2" id="ee3_2" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('ee3_3', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['ee3_2'];}?></textarea></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="ee3_3" type="text" id="ee3_3" style="width:180px; height:40px;" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return number_value_allow('ee3_4', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee3_3'];}?>" maxlength="2" autocomplete="off" /></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><input name="ee3_4" type="text" id="ee3_4" style="width:80px; height:40px;" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return char_number_allow('ee3_5', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee3_4'];}?>" maxlength="5" autocomplete="off" /></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><input name="ee3_5" type="text" id="ee3_5" style="width:60px; height:40px;" onChange="return yrck(this);" onKeyPress="return number_allow('post1_1', event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['ee3_5'];}?>" maxlength="4" autocomplete="off" /></span></td>
               	  	</tr>
              	</table>
            </div>      
        </div> 

<!--------------------------------------COMPUTER CERTIFICATE-------------------------------->

<!--------------------------------------EXPERIENCE------------------------------->

<div class="op_edu_app_dtl" >
			<div id="c_dtl">
                <div class="c_dtl_all"><u>WORKING EXPERIENCE ( IF ANY )</u></div>
            </div>
</div>
<div  class="op_edu_app_dtl">
        	<div id="c_dtl">
                <table border="1">
                    <tr>
                        <td width="250"><div align="center" class="style19">DESIGNATION</div></td>
                      	<td width="260"><div align="center" class="style19">NAME OF OFFICE/INSTITUTE</div></td>
						<td width="120"><div align="center" class="style19">SCALE OF<br />PAY</div></td>
						<td width="120"><div align="center" class="style19">DATE OF<br />ENTRY<br/>IN SERVICE <br/>(DD/MM/YYYY)</div></td>
                      	<td width="120"><div align="center" class="style19">NO. OF<br />YEARS<br />WORKED</div></td>
                  	</tr>
                    <tr>
                        <td align="justify">
                        	<span style="font-size: 11px"><input name="post1_1" type="text" id="post1_1" style="width:250px; height:40px;" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return char_allow(post1_2, event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['post1_1'];}?>" maxlength="50" autocomplete="off" /></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:260px; height:40px;" name="post1_2" id="post1_2" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('post1_3', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['post1_2'];}?></textarea></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:120px; height:40px;" name="post1_3" id="post1_3" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('post1_4', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['post1_3'];}?></textarea></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><input name="post1_4" type="text" id="post1_4" style="width:120px; height:40px;" onChange="isDate(this);" onKeyPress="return dt_allow(post1_5, event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['post1_4'];}?>" maxlength="10" autocomplete="off" /></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="post1_5" type="text" id="post1_5" style="width:120px; height:40px;" onChange="yrexpck(this);" onKeyPress="return number_value_allow(exch_1, event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['post1_5'];}?>" maxlength="2" autocomplete="off" /></span></td>
               	  	</tr>
              	</table>
            </div>      
        </div> 
<div class="op_edu_app_dtl" >
			<div id="c_dtl">
                <div class="c_dtl_all"><u>DETAILS OF REGISTRATION WITH EMPLOYMENT EXCHANGE (IF ANY)</u></div>
            </div>
</div>
<div  class="op_edu_app_dtl">
        	<div id="c_dtl">
                <table border="1">
                    <tr>
                        <td width="430"><div align="center" class="style19">NAME OF OFFICE</div></td>
						<td width="250"><div align="center" class="style19">REGISTRATION NO</div></td>
						<td width="200"><div align="center" class="style19">DATE OF<br />REGISTRATION<br/>(DD/MM/YYYY)</div></td>
                  	</tr>
                    <tr>
                        <td align="justify">
                        	<span style="font-size: 11px"><textarea style="font-size:12px; width:430px; height:40px;" name="exch_1" id="exch_1" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow('exch_2', event)" autocomplete="off"><?php if(isset($_POST['sub_sub'])){echo $_POST['exch_1'];}?></textarea></span></td>
                   	  	<td align="justify">
                        	<span style="font-size: 11px"><input name="exch_2" type="text" id="exch_2" style="width:250px; height:40px;" onChange="javascript:this.value=this.value.toUpperCase();" onKeyPress="return all_allow(exch_3, event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['exch_2'];}?>" maxlength="50" autocomplete="off" /></span></td>
						<td align="justify">
                        	<span style="font-size: 11px"><input name="exch_3" type="text" id="exch_3" style="width:200px; height:40px;" onChange="isDate(this);" onKeyPress="return dt_allow(cand_dclr, event)" value="<?php if(isset($_POST['sub_sub'])){echo $_POST['exch_3'];}?>" maxlength="10" autocomplete="off" /></span></td>
					</tr>
              	</table>
            </div>      
        </div> 

<div class="op_edu_app_dtl" >
			<div id="c_dtl">
                <div class="c_dtl_all"><u>UPLOAD PHOTO</u></div>
            </div>
       	</div>
			<div id="c_dtl">
                <div class="c_dtl_l">Upload Photo<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="file"  style="width:280px;" name="cand_p_pic" id="cand_p_pic"  onChange="checkFile(this,'i')" onKeyPress="return all_allow('cand_p_block', event)" autocomplete="off" /><br> <span class="style16"># Image size must be within 10 to 50 KB and in .jpeg format. Height- 128px Width-99px <span>
              	</div>
            </div>
			
<!-----------------------------------singature uplaod ------------------------------->
<div class="op_edu_app_dtl" >
			<div id="c_dtl">
                <div class="c_dtl_all"><u>UPLOAD SIGNATURE</u></div>
            </div>
       	</div>
			<div id="c_dtl">
                <div class="c_dtl_l">Upload Signature<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="file"  style="width:280px;" name="cand_p_sig" id="cand_p_sig"  onChange="checkFile(this,'s')" onKeyPress="return all_allow('cand_p_block', event)" autocomplete="off" /><br> <span class="style16"># Image size must be within 10 to 20 KB and in .jpeg format.Height- 50px Width-200px</span>
              	</div>
            </div>
<!-------------- Age Prrof Upload ----------------------------------------------> 			
		<div class="op_edu_app_dtl" >
			<div id="c_dtl">
                <div class="c_dtl_all"><u>UPLOAD AGE PROOF</u></div>
            </div>
       	</div>
			<div id="c_dtl">
                <div class="c_dtl_l">Upload Age Proof<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="file"  style="width:280px;" name="cand_p_age_proof" id="cand_p_age_proof"  onChange="checkFile(this,'a')" onKeyPress="return all_allow('cand_p_block', event)" autocomplete="off" /><br> <span class="style16"># Image size must be within 10 to 100 KB and in .jpeg format.<span>
              	</div>
            </div>	
			
		<div class="op_edu_app_dtl" >
			<div id="c_dtl">
                <div class="c_dtl_all"><u>UPLOAD WORKING EXPERIENCE </u></div>
            </div>
       	</div>
			<div id="c_dtl">
                <div class="c_dtl_l">Upload WORKING EXPERIENCE<span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="file"  style="width:280px;" name="cand_p_hs_proof" id="cand_p_hs_proof"  onChange="checkFile(this,'h')" onKeyPress="return all_allow('cand_p_block', event)" autocomplete="off" /><br> <span class="style16"># Image size must be within 10 to 100 KB and in .jpeg format.<span>
              	</div>
            </div>
			
		<div class="op_edu_app_dtl" >
			<div id="c_dtl">
                <div class="c_dtl_all"><u>UPLOAD CERTIFICATE - BCA/BTECH/MCA/GRADUATE</u></div>
            </div>
       	</div>
			<div id="c_dtl">
                <div class="c_dtl_l">Upload BCA/BTECH/MCA/GRADUATE <span class="style16">*</span></div>
                <div class="c_dtl_r">
                	<input type="file"  style="width:280px;" name="cand_p_cert_proof" id="cand_p_cert_proof"  onChange="checkFile(this,'c')" onKeyPress="return all_allow('cand_p_block', event)" autocomplete="off" /><br> <span class="style16"># Image size must be within 10 to 100 KB and in .jpeg format.<span>
              	</div>
            </div>			
<!--------------------------------------Declaration------------------------------->

		<div class="op_edu_app_dtl" >
			<div id="c_dtl">
                <div class="c_dtl_all"><u>DECLARATION</u></div>
            </div>
       	</div>
        <div class="op_edu_app_dtl" >
			<div id="c_dtl">
              	<div class="c_dtl_all_fut">
               	  <div align="justify">
                	  <input type="checkbox" <?php if(isset($_POST['sub_sub'])){if(isset($_POST['cand_dclr']) &&
   $_POST['cand_dclr'] == 'on'){?>checked="checked"<?php }}?> name="cand_dclr" id="cand_dclr" onKeyPress="return dt_allow('security_code', event)" onChange=""/>
               	    <span class="style16">*</span>I HAVE GONE THROUGH THE NOTICE AVAILABLE IN THE WEBSITE AND FILLED IN APPLICATION FORM ACCORDINGLY. I HEREBY DECLARE  THAT ALL THE STATEMENTS MADE BY ME IN THE APPLICATION FORM ARE TRUE AND COMPLETE TO THE BEST OF MY KNOWLEDGE AND BELIEF AND NOTHING  HAS BEEN CONCEALED OR SUPPRESSED. I ALSO DECLARE,  I HAVE GONE THROUGH THE  INSTRUCTIONS NOTED AND ENTERED INFORMATION AS PER INSTRUCTION. I ALSO UNDERSTAND THAT IN CASE, ANY OF MY STATEMENTS IS FOUND INCORRECT OR FALSE  DURING ANY STAGE OF RECRUITMENT OR THEREAFTER, I SHALL BE DISQUALIFIED FOR THE POST APPLIED FOR AND I SHALL ALSO BE LIABLE FOR ANY OTHER  PENAL ACTION UNDER THE EXISTING RULES WITHOUT FURTHER INTIMATION. </div>
              	</div>
            </div>
        </div>
		<div class="op_edu_app_dtl" >
			<div id="c_dtl">
                <div style=" height:50px; vertical-align:middle; text-align:center;"><br />
                	Security Code<span class="style16">*</span>&nbsp;&nbsp;
                    <span style="vertical-align:middle; text-align:center;"><img src="./CaptchaSecurityImages.php?width=100&height=40&characters=5" align="middle" /></span>&nbsp;&nbsp;
              		<input id="security_code" name="security_code" maxlength="5" type="text" style="width:80px;"  autocomplete="off" onKeyPress="return all_allow('sub_sub', event)"  />&nbsp;&nbsp;
                    <input type="hidden" name="check_page" value=""  onFocus="DoFocus(this)"/>       
                    <input type="submit" value="Submit" name="sub_sub" id="sub_sub" /> 
                    <input type="button" onClick="close_win()" value="Exit" name="sub_exit" id="sub_exit" />
              </div>
            </div>
        </div>
    </div>
</form>
<input type="hidden" name="rand" id="rand" value="<?php echo $rand;?>" />
</body>
</html>
<script language="javascript">
 function checkFile(obj,ty) {

    //Get reference of FileUpload.
    var fileUpload = obj;

    //Check whether the file is valid Image.
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg)$");
	//alert(regex.test(fileUpload.value.toLowerCase()));
    if (regex.test(fileUpload.value.toLowerCase())) {

        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();

                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;

                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
					var imgsize=fileUpload.files[0].size;

					//alert(Math.round(imgsize/1024)+"-"+height+"-"+width);

                    if (ty=='i' && (height > 128 || width > 99)) {
                        alert("Height must not exceed 128px and width must not exceed 99px.");
						obj.value="";
                        return false;
                    }
                    else{

						if (ty=='s' && (height > 50 || width > 200)) {
                        alert("Height must not exceed 50px and width must not exceed 200px.");
						obj.value="";
                        return false;
						}
                    }
					 //alert (Math.round(imgsize/1024)) ;
					 if (ty=='i' && (Math.round(imgsize/1024)<10|| Math.round(imgsize/1024)>50)){
					    alert("Photo size must be between 10 to 50 Kb");
						obj.value="";
                        return false;
					 }
					else{

						if (ty=='s' && (Math.round(imgsize/1024)<10 || Math.round(imgsize/1024)>20)){
					    alert("Signature size must be between 10 to 20 Kb");
						obj.value="";
                        return false;
					 } 
					 if (ty =='a' && (Math.round(imgsize/1024)<1 || Math.round(imgsize/1024)>100)) {
						alert("Age Proof file size must be between 1 to 100 Kb");
						obj.value="";
                        return false;
					 }
					 if (ty =='h' && (Math.round(imgsize/1024)<1 || Math.round(imgsize/1024)>100)) {
						alert("HS Marks Sheet file size must be between 1 to 100 Kb");
						obj.value="";
                        return false;
					 }
					if (ty =='c' && (Math.round(imgsize/1024)<1 || Math.round(imgsize/1024)>100)) {
						alert("Certificate in Lib Sc. / Bachelor in Lib. Sc. Marks Sheet file size must be between 1 to 100 Kb");
						obj.value="";
                        return false;
					 }	
					}

                    alert("Uploaded image has valid Height, Width and Size.");
                    return true;
                };

            }
        } else {
            alert("This browser does not support HTML5.");
            return false;
        }
    } else {
        alert("Please select a valid Image file.");
		obj.value="";
        return false;
    }
}

function chkdt()
{
	if( document.o_a.cand_post.value=='')
	 {
		document.o_a.cand_dob.value='';
		alert("PLEASE SELECT POST APPLIED FOR.");
		document.o_a.cand_post.focus();
		return false;
	}
	
	if( document.o_a.cand_community.value==''){
		document.o_a.cand_dob.value='';
		alert("PLEASE SELECT CATEGORY.");
		document.o_a.cand_community.focus();
		return false;
	}
	/*
	if(document.o_a.ex_serv_yr.value=='' && document.o_a.ex_serv.checked==true){
		document.o_a.cand_dob.value='';
		alert("PLEASE ENTER ACTUAL YEARS OF SUCH SERVICE RENDERED.");
		document.o_a.ex_serv_yr.focus();
		return false;
	}*/
	
	var p=document.o_a.cand_post.value;
	var c=document.o_a.cand_community.value;
	var min_age=0;
	var max_age=0;
	
	if(p=='post1')
	{
			if(c=='GEN'){min_age=21; max_age=35;}
			else if(c=='SC'){min_age=21; max_age=35;}
			else if(c=='ST'){min_age=21; max_age=35;}
			else if(c=='OBC-A'){min_age=21; max_age=35;}
			else if(c=='OBC-B'){min_age=21; max_age=35;}
			else {min_age=21; max_age=35;}
				
	}
	if (document.o_a.ck_pwd.checked==true) {min_age=21; max_age=35;}
 /*
	if(document.o_a.ex_serv.checked==true){
		max_age=parseInt(max_age)+parseInt(document.o_a.ex_serv_yr.value);
	    if(c=='GEN') {max_age=max_age+3;}   
	}
	if(document.o_a.ck_ec.checked==true && document.o_a.ex_serv.checked!=true ){if (c=='GEN') {age=parseInt(age)+3;}} */
	return date_range(min_age,max_age); 
}

function copy_data(){     
	if(document.o_a.ck_copy.checked==true){
		document.o_a.cand_c_add.value=document.o_a.cand_p_add.value;
		document.o_a.cand_c_block.value=document.o_a.cand_p_block.value;
		document.o_a.cand_c_po.value=document.o_a.cand_p_po.value;
		document.o_a.cand_c_ps.value=document.o_a.cand_p_ps.value;
		document.o_a.cand_c_pin.value=document.o_a.cand_p_pin.value;
		document.o_a.cand_c_dis.value=document.o_a.cand_p_dis.value;
		document.o_a.cand_c_st.value=document.o_a.cand_p_st.value;
	}  
	if(document.o_a.ck_copy.checked==false){
		document.o_a.cand_c_add.value='';
		document.o_a.cand_c_block.value='';
		document.o_a.cand_c_po.value='';
		document.o_a.cand_c_ps.value='';
		document.o_a.cand_c_pin.value='';
		document.o_a.cand_c_dis.value='';
		document.o_a.cand_c_st.value = '' ;
	}
}

function change_data_c(){
	document.o_a.cand_dob.value='';
	document.o_a.cand_age.value='';
	/*
	if(document.o_a.ex_serv.checked)
	{
		document.o_a.ex_serv_yr.disabled=false;
	}
	else
	{
		document.o_a.ex_serv_yr.disabled=true;
		document.o_a.ex_serv_yr.value='';
	}
	*/
}
	
function change_data()
{
	var post_val=document.o_a.cand_post.value;
	document.o_a.cand_dob.value='';
	document.o_a.cand_age.value='';
	document.o_a.ee1_4.value='';
	document.o_a.ee2_4.value='';
	document.o_a.ee4_4.value='';
	document.o_a.ee5_4.value='';
	document.o_a.ee6_4.value='';
	document.o_a.ee3_5.value='';
	if(post_val=='post1')
	{ 
		/* document.o_a.ee5_1.value='NA';
		document.o_a.ee5_2.value='NA';
		document.o_a.ee5_3.value='00.00';
		document.o_a.ee5_4.value='0000';
		document.o_a.ee5_5.value='0000';
		document.o_a.ee5_6.value='0000';
		
		document.o_a.ee4_1.value='NA';
		document.o_a.ee4_2.value='NA';
		document.o_a.ee4_3.value='00.00';
		document.o_a.ee4_4.value='0000';
		document.o_a.ee4_5.value='0000';
		document.o_a.ee4_6.value='0000'; 
		
		document.o_a.ee6_1.value='NA';
		document.o_a.ee6_2.value='NA';
		document.o_a.ee6_3.value='0';
		document.o_a.ee6_4.value='0000';
		document.o_a.ee6_5.value='0';
		document.o_a.ee6_6.value='0'; */
	} 
	document.getElementById('post1_ee').style.display='none';
	/* document.getElementById('post2_ee').style.display='none'; */
	document.getElementById(post_val+'_ee').style.display='block';
}

function close_win()
{
	window.open('', '_self', ''); //bug fix
	window.close();
}

function ckfrm(){
	var check_page=''
	if( document.o_a.cand_post.value=='')
	{
		alert("PLEASE SELECT POST APPLIED FOR.");
		document.o_a.cand_post.focus();
		return false;
	}
	check_page+=document.o_a.cand_post.value;
	
	if( document.o_a.cand_nm.value=='')
	{
		alert("PLEASE ENTER YOUR NAME.");
		document.o_a.cand_nm.focus();
		return false;
	}
	check_page+=document.o_a.cand_nm.value;
	
	if( document.o_a.cand_fh_nm.value==''){
		alert("PLEASE ENTER YOUR FATHER'S / HUSBAND NAME.");
		document.o_a.cand_fh_nm.focus();
		return false;
	}
	check_page+=document.o_a.cand_fh_nm.value;
	
	if( document.o_a.cand_mh_nm.value==''){
		alert("PLEASE ENTER YOUR MOTHER NAME.");
		document.o_a.cand_mh_nm.focus();
		return false;
	}
	check_page+=document.o_a.cand_mh_nm.value;
	
	if( document.o_a.cand_community.value==''){
		alert("PLEASE SELECT CATEGORY.");
		document.o_a.cand_community.focus();
		return false;
	} 
	check_page+=document.o_a.cand_community.value;
	
	if( document.o_a.cand_sex.value==''){
		alert("PLEASE SELECT GENDER.");
		document.o_a.cand_sex.focus();
		return false;
	}
	check_page+=document.o_a.cand_sex.value;
				
	if( document.o_a.ck_citizen.checked!=true){
		alert("YOU MUST BE A CITIZEN OF INDIAN AS DEFINED IN PART-II OF THE CONSTITUTION OF INDIA.");
		document.o_a.ck_citizen.focus();
		return false;
	}else{
		check_page+=document.o_a.ck_citizen.value;
	}
	/*	
	if(document.o_a.ex_serv.checked==true)
	{
		if(document.o_a.ex_serv_yr.value=='')
		{
			alert("PLEASE ENTER ACTUAL YEARS OF SUCH SERVICE RENDERED.");
			document.o_a.ex_serv_yr.focus();
			return false;
		}
		else
		{
			check_page+=document.o_a.ex_serv.value + document.o_a.ex_serv_yr.value;
		}
	}

	if( document.o_a.ck_ec.checked==true){
			check_page+=document.o_a.ck_ec.value;
	}
	*/
	if( document.o_a.ck_pwd.checked==true){
			check_page+=document.o_a.ck_pwd.value;
	}
	
	/* if( document.o_a.ck_ret_per.checked==true){
			check_page+=document.o_a.ck_ret_per.value;
	} */
	
	if( document.o_a.ck_msp.checked==true){
			check_page+=document.o_a.ck_msp.value;
	}	
	

	if( document.o_a.cand_dob.value==''){
		alert("PLEASE ENTER DATE OF BIRTH.");
		document.o_a.cand_dob.focus();
		return false;
	}
	check_page+=document.o_a.cand_dob.value;
	
	if( document.o_a.cand_age.value==''){
		alert("PLEASE ENTER YOUR AGE..");
		document.o_a.cand_age.focus();
		return false;
	}
	
	check_page+=document.o_a.cand_age.value;
	
	if( document.o_a.cand_phone.value==''){
		alert("PLEASE ENTER MOBILE NO");
		document.o_a.cand_phone.focus();
		return false;
	}
	
	
	check_page+=document.o_a.cand_phone.value;
	
	//check_page+=document.o_a.cand_mail.value;
	
	if( document.o_a.cand_religion.value==''){
		alert("PLEASE ENTER RELIGION");
		document.o_a.cand_religion.focus();
		return false;
	}
	check_page+=document.o_a.cand_religion.value;
	/*
	if( document.o_a.cand_aadhar.value==''){
		alert("PLEASE ENTER AADHAR NO");
		document.o_a.cand_aadhar.focus();
		return false;
	}
	check_page+=document.o_a.cand_aadhar.value;*/
	
	if( document.o_a.cand_p_add.value==''){
		alert("PLEASE ENTER YOUR ADDRESS (COMMUNICATING).");
		document.o_a.cand_p_add.focus();
		return false;
	}
	check_page+=document.o_a.cand_p_add.value;
	
	if( document.o_a.cand_p_block.value==''){
		alert("PLEASE ENTER YOUR BLOCK/MUNICIPALITY/CORPORATION (COMMUNICATING).");
		document.o_a.cand_p_block.focus();
		return false;
	}
	
	
	check_page+=document.o_a.cand_p_block.value;
	
	if( document.o_a.cand_p_po.value==''){
		alert("PLEASE ENTER POST OFFICE (COMMUNICATING).");
		document.o_a.cand_p_po.focus();
		return false;
	}
	check_page+=document.o_a.cand_p_po.value;
	
	if( document.o_a.cand_p_ps.value==''){
		alert("PLEASE ENTER POLICE STATIONS (COMMUNICATING).");
		document.o_a.cand_p_ps.focus();
		return false;
	}
	check_page+=document.o_a.cand_p_ps.value;
	
	if( document.o_a.cand_p_dis.value==''){
		alert("PLEASE ENTER DISTRICT (COMMUNICATING).");
		document.o_a.cand_p_dis.focus();
		return false;
	}
	check_page+=document.o_a.cand_p_dis.value;
	
	if( document.o_a.cand_p_st.value==''){
		alert("PLEASE ENTER STATE (COMMUNICATING).");
		document.o_a.cand_p_st.focus();
		return false;
	}
	check_page+=document.o_a.cand_p_st.value;
	
	
	if( document.o_a.cand_p_pin.value==''){
		alert("PLEASE ENTER PIN NO (COMMUNICATING).");
		document.o_a.cand_p_pin.focus();
		return false;
	}
	check_page+=document.o_a.cand_p_pin.value;
	
	if( document.o_a.cand_c_add.value==''){
		alert("PLEASE ENTER YOUR ADDRESS (PERMANENT).");
		document.o_a.cand_c_add.focus();
		return false;
	}
	check_page+=document.o_a.cand_c_add.value;
	
	if( document.o_a.cand_c_block.value==''){
		alert("PLEASE ENTER YOUR BLOCK/MUNICIPALITY/CORPORATION (PERMANENT).");
		document.o_a.cand_c_block.focus();
		return false;
	}
	check_page+=document.o_a.cand_c_block.value;
	
	if( document.o_a.cand_c_po.value==''){
		alert("PLEASE ENTER POST OFFICE (PERMANENT).");
		document.o_a.cand_c_po.focus();
		return false;
	}
	check_page+=document.o_a.cand_c_po.value;
	
	if( document.o_a.cand_c_ps.value==''){
		alert("PLEASE ENTER POLICE STATIONS (PERMANENT).");
		document.o_a.cand_c_ps.focus();
		return false;
	}
	check_page+=document.o_a.cand_c_ps.value;
	
	if( document.o_a.cand_c_dis.value==''){
		alert("PLEASE ENTER DISTRICT (PERMANENT).");
		document.o_a.cand_c_dis.focus();
		return false;
	}
	check_page+=document.o_a.cand_c_dis.value;
	
	
		if( document.o_a.cand_c_st.value==''){
		alert("PLEASE ENTER STATE (PERMANENT).");
		document.o_a.cand_c_st.focus();
		return false;
	}
	check_page+=document.o_a.cand_c_st.value;
	
	if( document.o_a.cand_c_pin.value==''){
		alert("PLEASE ENTER PIN NO (PERMANENT).");
		document.o_a.cand_c_pin.focus();
		return false;
	}
	check_page+=document.o_a.cand_c_pin.value;
	
		
	// MP VALIDATION FOR ALL POST
	if(document.o_a.cand_post.value=='post1' || document.o_a.ee1_1.value!='' || document.o_a.ee1_2.value!='' || document.o_a.ee1_3.value!='' || document.o_a.ee1_4.value!='' || document.o_a.ee1_5.value!='' || document.o_a.ee1_6.value!=''){
		if( document.o_a.ee1_1.value==''){
			alert("PLEASE ENTER Board/University for MADHYAMIK.");
			document.o_a.ee1_1.focus();
			return false;
		}
		if( document.o_a.ee1_2.value==''){
			alert("PLEASE ENTER Stream MADHYAMIK.");
			document.o_a.ee1_2.focus();
			return false;
		}
		if( document.o_a.ee1_3.value==''){
			alert("PLEASE ENTER %of marks MADHYAMIK.");
			document.o_a.ee1_3.focus();
			return false;
		}
		if( document.o_a.ee1_4.value==''){
			alert("PLEASE ENTER Year of Passing MADHYAMIK.");
			document.o_a.ee1_4.focus();
			return false;
		}
		if( document.o_a.ee1_5.value==''){
			alert("PLEASE ENTER Full Marks in MADHYAMIK.");
			document.o_a.ee1_5.focus();
			return false;
		}
		if( document.o_a.ee1_6.value==''){
			alert("PLEASE ENTER Total marks Obtained in MADHYAMIK.");
			document.o_a.ee1_6.focus();
			return false;
		}
		if( parseInt(document.o_a.ee1_5.value) < parseInt(document.o_a.ee1_6.value) ){
			alert("Full Marks cannot be less than Total marks Obtained in MADHYAMIK.");
			document.o_a.ee1_6.focus();
			return false;
		}
	 }
	 
	check_page+=document.o_a.ee1_1.value + document.o_a.ee1_2.value + document.o_a.ee1_3.value + document.o_a.ee1_4.value+document.o_a.ee1_5.value+document.o_a.ee1_6.value;	
	// MP VALIDATION FOR ALL POST - end
	// HS VALIDATION FOR POST 
	
	if(document.o_a.cand_post.value=='post1' || document.o_a.ee2_1.value!='' || document.o_a.ee2_2.value!='' || document.o_a.ee2_3.value!='' || document.o_a.ee2_4.value!=''|| document.o_a.ee2_5.value!='' || document.o_a.ee2_6.value!='')
	 {
		if( document.o_a.ee2_1.value==''){
			alert("PLEASE ENTER Board/University for HS.");
			document.o_a.ee2_1.focus();
			return false;
		}
		if( document.o_a.ee2_2.value==''){
			alert("PLEASE ENTER Stream for HS.");
			document.o_a.ee2_2.focus();
			return false;
		}
		if( document.o_a.ee2_3.value==''){
			alert("PLEASE ENTER %of marks for HS.");
			document.o_a.ee2_3.focus();
			return false;
		}
		if( document.o_a.ee2_4.value==''){
			alert("PLEASE ENTER Year of Passing for HS.");
			document.o_a.ee2_4.focus();
			return false;
		}
		if( document.o_a.ee2_5.value==''){
			alert("PLEASE ENTER Full Marks in HS.");
			document.o_a.ee2_5.focus();
			return false;
		}
		if( document.o_a.ee2_6.value==''){
			alert("PLEASE ENTER Total marks Obtained in HS.");
			document.o_a.ee2_6.focus();
			return false;
		}
		if ( parseInt(document.o_a.ee2_5.value) < parseInt(document.o_a.ee2_6.value) ){
			alert("Full Marks cannot be less than Total marks Obtained in HS.");
			document.o_a.ee2_6.focus();
			return false;
		}
	 }

	check_page+=document.o_a.ee2_1.value + document.o_a.ee2_2.value + document.o_a.ee2_3.value + document.o_a.ee2_4.value+document.o_a.ee2_5.value+document.o_a.ee2_6.value;	
	// HS VALIDATION FOR ALL POST - end
	
	// GRADUATE VALIDATION FOR  POST 

	if(document.o_a.cand_post.value=='post1' || document.o_a.ee4_1.value!='' || document.o_a.ee4_2.value!='' || document.o_a.ee4_3.value!='' || document.o_a.ee4_4.value!='' || document.o_a.ee4_5.value!='' || document.o_a.ee4_6.value!=''){
		if( document.o_a.ee4_1.value==''){
			alert("PLEASE ENTER Board/University for GRADUATE.");
			document.o_a.ee4_1.focus();
			return false;
		}
		if( document.o_a.ee4_2.value==''){
			alert("PLEASE ENTER Stream for GRADUATE.");
			document.o_a.ee4_2.focus();
			return false;
		}
		if( document.o_a.ee4_3.value==''){
			alert("PLEASE ENTER %of marks for GRADUATE.");
			document.o_a.ee4_3.focus();
			return false;
		}
		if( document.o_a.ee4_4.value==''){
			alert("PLEASE ENTER Year of Passing for GRADUATE.");
			document.o_a.ee4_4.focus();
			return false;
		}
		if( document.o_a.ee4_5.value==''){
			alert("PLEASE ENTER Full Marks in GRADUATE.");
			document.o_a.ee4_5.focus();
			return false;
		}
		if( document.o_a.ee4_6.value==''){
			alert("PLEASE ENTER Total marks Obtained in GRADUATE.");
			document.o_a.ee4_6.focus();
			return false;
		}
		if ( parseInt(document.o_a.ee4_5.value) < parseInt(document.o_a.ee4_6.value) ){
			alert("Full Marks cannot be less than Total marks Obtained in GRADUATE");
			document.o_a.ee4_6.focus();
			return false;
		}
	 }

	check_page+=document.o_a.ee4_1.value + document.o_a.ee4_2.value + document.o_a.ee4_3.value + document.o_a.ee4_4.value+document.o_a.ee4_5.value+document.o_a.ee4_6.value;	
	
// GRADUATE VALIDATION FOR POST - END


// MASTER DEGREE FOR POST
	if( document.o_a.cand_post.value=='post1' || document.o_a.ee5_1.value!='' || document.o_a.ee5_2.value!='' || document.o_a.ee5_3.value!='' || document.o_a.ee5_4.value!='' || document.o_a.ee5_5.value!='' || document.o_a.ee5_6.value!=''){
		if( document.o_a.ee5_1.value==''){
			alert("PLEASE ENTER Board/University for POST GRADUATE.");
			document.o_a.ee5_1.focus();
			return false;
		}
		if( document.o_a.ee5_2.value==''){
			alert("PLEASE ENTER Stream for POST GRADUATE.");
			document.o_a.ee5_2.focus();
			return false;
		}
		if( document.o_a.ee5_3.value==''){
			alert("PLEASE ENTER %of marks for POST GRADUATE.");
			document.o_a.ee5_3.focus();
			return false;
		}
		if( document.o_a.ee5_4.value==''){
			alert("PLEASE ENTER Year of Passing for POST GRADUATE.");
			document.o_a.ee5_4.focus();
			return false;
		}
		if( document.o_a.ee5_5.value==''){
			alert("PLEASE ENTER Full Marks in POST GRADUATE.");
			document.o_a.ee5_5.focus();
			return false;
		}
		if( document.o_a.ee5_6.value==''){
			alert("PLEASE ENTER Total marks Obtained in POST GRADUATE.");
			document.o_a.ee5_6.focus();
			return false;
		}
		if ( parseInt(document.o_a.ee5_5.value) < parseInt(document.o_a.ee5_6.value) ){
			alert("Full Marks cannot be less than Total marks Obtained in POST GRADUATE");
			document.o_a.ee5_6.focus();
			return false;
		}
	 }

	 
	check_page+=document.o_a.ee5_1.value + document.o_a.ee5_2.value + document.o_a.ee5_3.value + document.o_a.ee5_4.value+document.o_a.ee5_5.value+document.o_a.ee5_6.value;			
						
// END MASTER DEGREE

// PROFESSIONAL CERTIFICATE FOR POST
	if( document.o_a.cand_post.value=='post1' || document.o_a.ee6_1.value!='' || document.o_a.ee6_2.value!='' || document.o_a.ee6_3.value!='' || document.o_a.ee6_4.value!='' || document.o_a.ee6_5.value!='' || document.o_a.ee6_6.value!=''){
		if( document.o_a.ee6_1.value==''){
			alert("PLEASE ENTER Board/University/Institute for OTHER CERTIFICATE .");
			document.o_a.ee6_1.focus();
			return false;
		}
		if( document.o_a.ee6_2.value==''){
			alert("PLEASE ENTER Stream for OTHER CERTIFICATE.");
			document.o_a.ee6_2.focus();
			return false;
		}
		if( document.o_a.ee6_3.value==''){
			alert("PLEASE ENTER %of marks for OTHER CERTIFICATE.");
			document.o_a.ee6_3.focus();
			return false;
		}
		if( document.o_a.ee6_4.value==''){
			alert("PLEASE ENTER Year of Passing OTHER CERTIFICATE.");
			document.o_a.ee6_4.focus();
			return false;
		}
		if( document.o_a.ee6_5.value==''){
			alert("PLEASE ENTER Full Marks for OTHER CERTIFICATE.");
			document.o_a.ee6_5.focus();
			return false;
		}
		if( document.o_a.ee6_6.value==''){
			alert("PLEASE ENTER Total marks Obtained for OTHER CERTIFICATE.");
			document.o_a.ee6_6.focus();
			return false;
		}
		if ( parseInt(document.o_a.ee6_5.value) < parseInt(document.o_a.ee6_6.value) ){
			alert("Full Marks cannot be less than Total marks Obtained for OTHER CERTIFICATE");
			document.o_a.ee6_6.focus();
			return false;
		}
		
	 }

	 
	check_page+=document.o_a.ee6_1.value + document.o_a.ee6_2.value + document.o_a.ee6_3.value + document.o_a.ee6_4.value+document.o_a.ee6_5.value+document.o_a.ee6_6.value;			
						
// END PROFESSIONAL CERTIFICATE
	
//COMPUTER CERTIFICATE VALIDATION 

if(document.o_a.cand_post.value=='post1' || document.o_a.ee3_1.value!='' || document.o_a.ee3_2.value!='' && document.o_a.ee3_3.value!='' || document.o_a.ee3_4.value!='' || document.o_a.ee3_5.value!=''){
		if( document.o_a.ee3_1.value==''){
			alert("PLEASE ENTER INSTITUTION NAME OF COMPUTER COURSE.");
			document.o_a.ee3_1.focus();
			return false;
		}
		if( document.o_a.ee3_2.value==''){
			alert("PLEASE ENTER NAME OF COMPUTER COURSE.");
			document.o_a.ee3_2.focus();
			return false;
		}
		if( document.o_a.ee3_3.value==''){
			alert("PLEASE ENTER DURATION OF COMPUTER COURSE (IN MONTHS).");
			document.o_a.ee3_3.focus();
			return false;
		}
		if( document.o_a.ee3_4.value==''){
			alert("PLEASE ENTER PERCENTAGE OF MARKS ON COMPUTER COURSE.");
			document.o_a.ee3_4.focus();
			return false;
		}
		if( document.o_a.ee3_5.value==''){
			alert("PLEASE ENTER Year of Passing for CERTIFICATE ON COMPUTER COURSE.");
			document.o_a.ee3_5.focus();
			return false;
		}
	 }
	 
	check_page+=document.o_a.ee3_1.value + document.o_a.ee3_2.value + document.o_a.ee3_3.value + document.o_a.ee3_4.value + document.o_a.ee3_5.value;	


/* END COMPUTER CERTIFICATE VALIDATION  */
// experience validation

if(document.o_a.cand_post.value=='post1' || document.o_a.post1_1.value!='' || document.o_a.post1_2.value!='' || document.o_a.post1_3.value!='' || document.o_a.post1_4.value!='' || document.o_a.post1_5.value!='' )
{
	if( document.o_a.post1_1.value==''){
			alert("PLEASE ENTER NAME OF DESIGNATION FOR WORKING EXPERIENCE");
			document.o_a.post1_1.focus();
			return false;
		}
		if( document.o_a.post1_2.value==''){
			alert("PLEASE ENTER NAME OF OFFICE/INSTITUTE FOR WORKING EXPERIENCE");
			document.o_a.post1_2.focus();
			return false;
		}
		if( document.o_a.post1_3.value==''){
			alert("PLEASE ENTER SCALE OF PAY FOR WORKING EXPERIENCE");
			document.o_a.post1_3.focus();
			return false;
		}
		if( document.o_a.post1_4.value==''){
			alert("PLEASE ENTER DATE OF ENTRY INTO SERVICE FOR WORKING EXPERIENCE");
			document.o_a.post1_4.focus();
			return false;
		}
		if( document.o_a.post1_5.value==''){
			alert("PLEASE ENTER NO. OF YEARS WORKED FOR WORKING EXPERIENCE");
			document.o_a.post1_5.focus();
			return false;
		}	
}
/*
if ( document.o_a.cand_post.value=='post1' && 	document.o_a.post1_3.value < 3 ) {
			alert("FOR ACCOUNTANT POST MIN 3 YRS. OF WORK EXP REQUIRED.");
			document.o_a.post1_3.focus();
			return false;
}
if ( document.o_a.cand_post.value=='post2' && 	document.o_a.post1_3.value < 1 ) {
			alert("FOR DATA ENTRY OPERATOR POST MIN 1 YRS. OF WORK EXP REQUIRED.");
			document.o_a.post1_3.focus();
			return false;
}*/	 
		// experience validation

		check_page+=document.o_a.post1_1.value;
		check_page+=document.o_a.post1_2.value;
		check_page+=document.o_a.post1_3.value;
		check_page+=document.o_a.post1_4.value;
		check_page+=document.o_a.post1_5.value;

//		
// DETAILS OF EMPLOYMENT EXCHANGE 

	if(document.o_a.exch_1.value!='' || document.o_a.exch_2.value!='' || document.o_a.exch_3.value!='' )
	{
		if( document.o_a.exch_1.value==''){
			alert("PLEASE ENTER NAME OF THE EMPLOYEMNT EXCHANGE OFFICE ");
			document.o_a.exch_1.focus();
			return false;
		}
		if( document.o_a.exch_2.value==''){
			alert("PLEASE ENTER THE REGISTRATION NUMBER OF EMPLOYMENT EXCHANGE");
			document.o_a.exch_2.focus();
			return false;
		}
		if( document.o_a.exch_3.value==''){
			alert("PLEASE ENTER THE DATE OF REGISTRATION FOR EMPLOYMENT EXCHANGE");
			document.o_a.exch_3.focus();
			return false;
		}
			
	}
	check_page+=document.o_a.exch_1.value;
	check_page+=document.o_a.exch_2.value;
	check_page+=document.o_a.exch_3.value;	
		
	if( document.o_a.cand_dclr.checked!=true){
		alert("PLEASE ACCEPT THE DECLARATION");
		document.o_a.cand_dclr.focus();
		return false;
	}else{
		check_page+=document.o_a.cand_dclr.value;
	}
	
	if( document.o_a.security_code.value==''){
		alert("PLEASE ENTER SECURITY CODE.");
		document.o_a.security_code.focus();
		return false;
	}
	if(document.o_a.cand_p_pic.value=='')
	{
		document.o_a.cand_p_pic.focus();
  		alert('Please Upload Candidate Picture.');
  		return false;
  	}
	if(document.o_a.cand_p_sig.value=='')
	{
		document.o_a.cand_p_sig.focus();
  		alert('Please Upload Candidate Signature.');
  		return false;
  	}
	if(document.o_a.cand_p_age_proof.value=='')
	{
		document.o_a.cand_p_age_proof.focus();
  		alert('Please Upload Candidate Age Proof Document.');
  		return false;
  	}
	if(document.o_a.cand_p_hs_proof.value=='')
	{
		document.o_a.cand_p_hs_proof.focus();
  		alert('Please Upload HS/Equivalent Examination marksheet.');
  		return false;
  	}
	if(document.o_a.cand_p_cert_proof.value=='')
	{
		document.o_a.cand_p_cert_proof.focus();
  		alert('Please Upload Certificate/Bachelor in Library Science marksheet.');
  		return false;
  	}
	check_page+=document.getElementById("rand").value;
	//alert(check_page);
	document.o_a.check_page.value=hex_md5(check_page);
	//alert(document.o_a.check_page.value);
	//document.o_a.check_page.value=(check_page);
	return confirm('Are You Sure ? To Confirm Press OK  or to Change Press Cencel');
}
</script>
