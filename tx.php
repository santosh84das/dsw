<?php 
session_start();
include("include_web/common.php");
$link=@mysql_connect($dbs,$user,$pass) or die ("Error during connection");
mysql_select_db($db,$link);

mysql_query("update online_app_zp_ttb set roll_rand =0;");
mysql_query("update online_app_zp_ttb set roll_rand = FLOOR (RAND() * 100000);");




mysql_query("set @r1:= 100000;");
mysql_query("update online_app_zp_ttb set exm_roll = @r1:= @r1 + 1 where cand_post = 'post1' order by roll_rand desc;");

mysql_query("set @r2:= 200000;");
mysql_query("update online_app_zp_ttb set exm_roll = @r2:= @r2 + 1 where cand_post = 'post2' order by roll_rand desc;");



$r=mysql_query("select * from online_app_zp_ttb_venue where post ='post1' order by venuecd asc;");
while($f=mysql_fetch_array($r)){
mysql_query("update online_app_zp_ttb set exm_venue = '". $f['venue'] . "', exm_venue_code= '". $f['venuecode'] . "' where cand_post = 'post1' and exm_roll >= ". $f['roll_from'] ." and exm_roll <= ". $f['roll_to'] . ";" );
}
mysql_query("update online_app_zp_ttb set exm_date = '04/08/2019', exm_time = '12.00 NOON', exm_duration = '02.00' where cand_post = 'post1';");

$r=mysql_query("select * from online_app_zp_ttb_venue where post='post2' order by venuecd asc ;");
while($f=mysql_fetch_array($r)){
mysql_query("update online_app_zp_ttb set exm_venue = '". $f['venue'] . "' where cand_post = 'post2' and exm_roll >= ". $f['roll_from'] ." and exm_roll <= ". $f['roll_to'] . ";" );
}
mysql_query("update online_app_zp_ttb set exm_date = '04/08/2019', exm_time = '12.00 NOON', exm_duration = '02.00' where cand_post = 'post2';");
?>
<script language="javascript">
alert('Done');
</script>
<?php 
mysql_close($link);
exit();
?>
