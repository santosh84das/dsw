<?php 
session_start();
include("include_web/common.php");
$link=@mysql_connect($dbs,$user,$pass) or die ("Error during connection");
mysql_select_db($db,$link);

$r=mysql_query("select * from online_app_zp_ttb_venue where post ='post1' order by venuecd asc;");
while($f=mysql_fetch_array($r)){
mysql_query("update online_app_zp_ttb set exm_venue_code = '". $f['venuecode'] . "' where cand_post = 'post1' and exm_roll >= ". $f['roll_from'] ." and exm_roll <= ". $f['roll_to'] . ";" );
}

$r=mysql_query("select * from online_app_zp_ttb_venue where post='post2' order by venuecd asc ;");
while($f=mysql_fetch_array($r)){
mysql_query("update online_app_zp_ttb set exm_venue_code = '". $f['venuecode'] . "' where cand_post = 'post2' and exm_roll >= ". $f['roll_from'] ." and exm_roll <= ". $f['roll_to'] . ";" );
}
?>
<script language="javascript">
alert('Done');
</script>
<?php 
mysql_close($link);
exit();
?>
