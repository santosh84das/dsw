<?php
/*
if($_SESSION['thm_id']==''){
	$k=rand(1,3);
	if($k==1){
		$_SESSION['thm_id']='green';
	}
	if($k==2){
		$_SESSION['thm_id']='blue';
	}
	if($k==3){
		$_SESSION['thm_id']='orange';
	}
}
*/
$rep_char = array("&", "@", "#", "{", "}", "\\", "\"", "'", ";", " AND ", " and ", " OR ", " or ", "WFXSSProbe", "wfxssprobe");
$rep_char1 = array("&",  "#", "{", "}", "\\", "\"", "'", ";", " AND ", " and ", " OR ", " or ", "WFXSSProbe", "wfxssprobe");
?>
<script language=JavaScript>
var message="";
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")
</script>

<script language="javascript">
if(window.top!=window){
window.location='operation_error.php';
}
</script>

<script language="javascript">
function checkdate_range(){
	var inputdate=document.getElementById('cand_dob');
	var input=inputdate.value;
	//alert(input);
	var validformat=/^\d{1,2}\/\d{1,2}\/\d{4}$/; //Basic check for format validity
	var returnval=true;
	if(input.search(validformat)==-1) {
		if(input=="") {
			alert("Date field should not be empty.");
			inputdate.focus();
		} else {
			inputdate.value="";
			alert(input+" : Invalid Date Format. Please correct and submit again.(dd/mm/yyyy)");
			inputdate.focus();
		}
		inputdate.focus();
		return false;
	}
	else{ 
		var mydate=input.split("/");
		var dayobj=new Date(mydate[2],mydate[1],mydate[0]); // It takes in the format of (yyyy/mm/dd)
		if(mydate[1] == 1 || mydate[1] == 3 || mydate[1] == 5 ||mydate[1] == 7 || mydate[1] == 8 || mydate[1] == 10 || mydate[1] == 12 ) {
			if(mydate[0] > 31) {
				alert("Date invalid");
				inputdate.focus();
				returnval=false;
			}
		} else if(mydate[1] == 4 || mydate[1] == 6 || mydate[1] == 9 ||mydate[1] == 11) {
			if(mydate[0] > 30 ) {
				alert("Date invalid");
				inputdate.focus();
				returnval=false;
			}
		} else if( mydate[1] == 2) {
			if(mydate[2] % 400 == 0) {
				if(mydate[0] > 29 ) {
					alert("Date invalid");
					inputdate.focus();
					returnval=false;
				}
			} else if(mydate[2] % 100 != 0 && mydate[2] % 4 == 0){
				if(mydate[0] > 29 ) {
					alert("Date invalid");
					inputdate.focus();
					returnval=false;
				}
			} else if(mydate[2] % 4 !=0) {
				if(mydate[0] > 28) {
					alert("Date invalid");
					inputdate.focus();
					returnval=false;
				}
			}
		} else if(mydate[1] > 12 ) {
			alert("Month invalid");
			inputdate.focus();
			returnval=false;
		}
	}
	
	var mydatex=input.split("/");
	var dto=mydatex[2]+mydatex[1]+mydatex[0]; 
	//alert('19750501-----------'+parseInt(dto)+'-----------19940501');
	if(parseInt(dto)<19800101 || parseInt(dto)>19990101){
		alert("Candidates should be between 21 to 40 yrs, as on 01/01/2020");
		inputdate.focus();
		inputdate.value='';
	}
}
</script>
<script language="javascript">
function date_range(min_age,max_age){
	var inputdate=document.getElementById('cand_dob');
	var input=inputdate.value;
	//alert(input);
	var validformat=/^\d{1,2}\/\d{1,2}\/\d{4}$/; //Basic check for format validity
	var returnval=true;
	if(input.search(validformat)==-1) {
		if(input=="") {
			alert("Date field should not be empty.");
			inputdate.focus();
		} else {
			inputdate.value="";
			alert(input+" : Invalid Date Format. Please correct and submit again.(dd/mm/yyyy)");
			inputdate.focus();
		}
		inputdate.focus();
		return false;
	}
	else{ 
		var mydate=input.split("/");
		var dayobj=new Date(mydate[2],mydate[1],mydate[0]); // It takes in the format of (yyyy/mm/dd)
		if(mydate[1] == 1 || mydate[1] == 3 || mydate[1] == 5 ||mydate[1] == 7 || mydate[1] == 8 || mydate[1] == 10 || mydate[1] == 12 ) {
			if(mydate[0] > 31) {
				alert("Date invalid");
				inputdate.focus();
				returnval=false;
			}
		} else if(mydate[1] == 4 || mydate[1] == 6 || mydate[1] == 9 ||mydate[1] == 11) {
			if(mydate[0] > 30 ) {
				alert("Date invalid");
				inputdate.focus();
				returnval=false;
			}
		} else if( mydate[1] == 2) {
			if(mydate[2] % 400 == 0) {
				if(mydate[0] > 29 ) {
					alert("Date invalid");
					inputdate.focus();
					returnval=false;
				}
			} else if(mydate[2] % 100 != 0 && mydate[2] % 4 == 0){
				if(mydate[0] > 29 ) {
					alert("Date invalid");
					inputdate.focus();
					returnval=false;
				}
			} else if(mydate[2] % 4 !=0) {
				if(mydate[0] > 28) {
					alert("Date invalid");
					inputdate.focus();
					returnval=false;
				}
			}
		} else if(mydate[1] > 12 ) {
			alert("Month invalid");
			inputdate.focus();
			returnval=false;
		}
	}
	
	
	
	var mydatex=input.split("/");
	var dto=mydatex[2]+mydatex[1]+mydatex[0]; 
	//alert('19750501-----------'+parseInt(dto)+'-----------19940501');
	var lim=0;
	lim_max=20200101-parseInt(max_age)*10000;
	lim_min=20200101-parseInt(min_age)*10000;
	
	
	if( parseInt(dto)<parseInt(lim_max) || parseInt(dto)>parseInt(lim_min) ){


		alert("Candidates should be between "+ min_age +" to "+ max_age +" years as on 01/01/2020");
		inputdate.focus();
		inputdate.value='';
		document.o_a.cand_age.value= ''
		return false;
	}
	
	
	var date1 = new Date();
	var  dob= document.getElementById("cand_dob").value;
	var dob1=dob.split("/");
	var dob2=dob1[1]+'/'+dob1[0]+'/'+dob1[2];
	var date2=new Date(dob2);
	var pattern = /^\d{1,2}\/\d{1,2}\/\d{4}$/; //Regex to validate date format (dd/mm/yyyy)
	var y1 = date1.getFullYear(); //getting current year
	var y2 = date2.getFullYear(); //getting dob year
	var age = y1 - y2;
	document.o_a.cand_age.value= y1 - y2; 
	document.o_a.ee1_4.value='';
	document.o_a.ee2_4.value='';
	document.o_a.ee4_4.value='';
	//document.o_a.ee3_5.value='';
	return returnval;
}
</script>
<script type="text/javascript">
/////////////////////////////////////////////////////////////////////////////////////////////

function val_mail(val)
{
var x=val.value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  val.value='';
  val.focus();
  return false;
  }
}
/////////////////////////////////////////////////////////////////////////////////////////////

function pinck(val)
{
var x=val.value;
if (x.length!=6)
  {
  alert("Not a valid PIN no.");
  val.value='';
  val.focus();
  return false;
  }
}
/////////////////////////////////////////////////////////////////////////////////////////////
function yrexpck(val,post)
{
var x=val.value;
if(post=='post1'&& x<=0)
{
alert("Compulsory years of experience must more than zero years.");
val.value='';
val.focus();
return false;
}
}

/////////////////////////////////////////////////////////////////////////////////////////////

function yrck(val)
{
var x =val.value;
var y1;
var dob1, dob2;
var date2;
var dob= document.getElementById("cand_dob").value;
if ( dob != "" ) {
dob1=dob.split("/");
dob2=dob1[1]+'/'+dob1[0]+'/'+dob1[2];
date2=new Date(dob2);
y1 = date2.getFullYear();
} else {
y1 = 1979;
}
if(x!='0000'){
if (x.length!=4 || x<y1 || x>2019)
  {
  alert("Not a valid YEAR.");
  val.value='';
  val.focus();
  return false;
  }}
}
/////////////////////////////////////////////////////////////////////////////////////////////

function marksck(val)
{
var x=val.value;
if(x!='00.00'){
if (x>100 || x<0)
  {
  alert("Not a valid % value");
  val.value='';
  val.focus();
  return false;
  }else{
	x= Math.round(x*Math.pow(10,2))/Math.pow(10,2)+'';
	var z=x.split(".");
	if(z.length==2){
		var y=(z[1] < 10 ? z[1]+'0' : z[1]);
	}
	else{
		var y='00';
	}
	val.value=(z[0] < 10 ? '0' : '') + z[0]+'.'+y;
	}}
}
/////////////////////////////////////////////////////////////////////////////////////////////

function marksck1(val)
{
var x=val.value;
if (x>100)
  {
  alert("Not a valid % value");
  val.value='';
  val.focus();
  return false;
  }
else if (x<40)
  {
  alert("DISABILITY OF 40% AND ABOVE");
  val.value='';
  val.focus();
  return false;
  }else{
	x= Math.round(x*Math.pow(10,2))/Math.pow(10,2)+'';
	var z=x.split(".");
	if(z.length==2){
		var y=(z[1] < 10 ? z[1]+'0' : z[1]);
	}
	else{
		var y='00';
	}
	val.value=(z[0] < 10 ? '0' : '') + z[0]+'.'+y;
	}
  
}
/////////////////////////////////////////////////////////////////////////////////////////////

function marksck2(val)
{
var x=val.value;
if (x>100)
  {
  alert("Not a valid % value");
  val.value='';
  val.focus();
  return false;
  }
if (x<55)
  {
  alert("Honors Graduate with 55% marks in any stream");
  val.value='';
  val.focus();
  return false;
  }
}

////////////////////////////////////////////////////////////////////////////////////////////

function all_allow(elemName, evt) {
	//allow= abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890`~!$%^*_-|/?.>,<
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
    if (charCode == 13 || charCode == 3) {
         document.getElementById(elemName).focus();
        return false;
    }
	charCode = (evt.which) ? evt.which : event.keyCode;
	//alert(charCode);
    if(charCode > 31 && charCode != 32  && charCode != 33  && charCode != 36  && charCode != 37 && charCode != 42 && charCode != 44 && charCode != 45 && charCode != 46 && charCode != 47 && charCode != 60 && charCode != 62 && charCode != 63  && charCode != 94 && charCode != 95  && charCode != 96  && charCode != 124  && charCode != 126 && (charCode < 48 || charCode > 57) && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90)){
        return false;
	}else{
        return true;
	}
	
}

////////////////////////////////////////////////////////////////////////////////////////////

function pass_allow(elemName, evt) {
	//allow= abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890`~!$%^*_-|/?.>,<@
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
    if (charCode == 13 || charCode == 3) {
         document.getElementById(elemName).focus();
        return false;
    }
	charCode = (evt.which) ? evt.which : event.keyCode;
	//alert(charCode);
    if(charCode > 31 && charCode != 32  && charCode != 33  && charCode != 36  && charCode != 37 && charCode != 42 && charCode != 44 && charCode != 45 && charCode != 46 && charCode != 47 && charCode != 60 && charCode != 62 && charCode != 63 && charCode != 64  && charCode != 94 && charCode != 95  && charCode != 96  && charCode != 124  && charCode != 126 && (charCode < 48 || charCode > 57) && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90)){
        return false;
	}else{
        return true;
	}
}

//////////////////////////////////////////////////////////////////////////////////////

function email_allow(elemName, evt) {
	//allow= abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890._-@
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
    if (charCode == 13 || charCode == 3) {
         document.getElementById(elemName).focus();
        return false;
    }
	charCode = (evt.which) ? evt.which : event.keyCode;
	//alert(charCode);
    if(charCode > 31  && charCode != 45  && charCode != 46  && charCode != 64  && charCode != 95 && (charCode < 48 || charCode > 57) && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90)){
        return false;
	}else{
        return true;
	}
}

///////////////////////////////////////////////////////////////////////////////////////////

function char_number_allow(elemName, evt) {
	//allow= abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.,
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
		//alert(charCode);
    if (charCode == 13 || charCode == 3) {
         document.getElementById(elemName).focus();
        return false;
    }
	charCode = (evt.which) ? evt.which : event.keyCode;
    if(charCode > 31 && charCode != 32 && charCode != 44  && charCode != 45 && charCode != 46  && charCode != 95 && (charCode < 48 || charCode > 57) && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90)){
        return false;
	}else{
        return true;
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////

function char_allow(elemName, evt) {
	//allow= abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
		//alert(charCode);
    if (charCode == 13 || charCode == 3) {
         document.getElementById(elemName).focus();
        return false;
    }
	charCode = (evt.which) ? evt.which : event.keyCode;
    if(charCode > 31 && charCode != 32 && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90)){
        return false;
	}else{
        return true;
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////

function number_value_allow(elemName, evt) {
	//allow= 1234567890.
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
		//alert(charCode);
    if (charCode == 13 || charCode == 3) {
         document.getElementById(elemName).focus();
        return false;
    }
	charCode = (evt.which) ? evt.which : event.keyCode;
    if(charCode > 31 && charCode != 46 && (charCode < 48 || charCode > 57)){
        return false;
	}else{
        return true;
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////

function dt_allow(elemName, evt) {
	//allow= 1234567890
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
		//alert(charCode);
    if (charCode == 13 || charCode == 3) {
         document.getElementById(elemName).focus();
        return false;
    }
	charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && charCode != 47 && (charCode < 48 || charCode > 57)){
        return false;
	}else{
        return true;
	}

}

///////////////////////////////////////////////////////////////////////////////////////////////////////

function number_allow(elemName, evt) {
	//allow= 1234567890
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
		//alert(charCode);
    if (charCode == 13 || charCode == 3) {
         document.getElementById(elemName).focus();
        return false;
    }
	charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
	}else{
        return true;
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////

function number_allows(elemName, evt) {
	//allow= 1234567890
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
		//alert(charCode);
    if (charCode == 13 || charCode == 3) {
		if(elemName=='post1'  || elemName=='post4'  || elemName=='post6' || elemName=='post7' || elemName=='post8' || elemName=='post9'){
         document.getElementById(elemName+'_1').focus();
		 }else{
         document.getElementById('cand_dclr').focus();
		 }
        return false;
    }
	charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
	}else{
        return true;
	}
}
function no_allow(elemName, evt)
 {
	//allow= 1234567890
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
		//alert(charCode);
		
    if (charCode == 13 || charCode == 3)
		{
         document.getElementById(elemName).focus();
        return false;
    }
	charCode = (evt.which) ? evt.which : event.keyCode;
	
    if (charCode > 31 && (charCode < 48 || charCode > 57))
	{
        return false;
	}else
	{
        return false;
	}
}

</script>
