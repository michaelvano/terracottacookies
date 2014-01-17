<?php

	session_start();
			if (0==1) {
	   		$_SESSION['T-1001'] = $_POST['T-1001'] ;
			$_SESSION['T-4101'] = $_POST['T-4101'] ;
	   		$_SESSION['T-10001'] = $_POST['T-10001'] ;
	   		$_SESSION['1002-D'] = $_POST['1002-D'] ;
	   		$_SESSION['3002-D'] = $_POST['3002-D'] ;
	   		$_SESSION['4002-D'] = $_POST['4002-D'] ;
	   		$_SESSION['5002-D'] = $_POST['5002-D'] ;
	   		$_SESSION['6002-D'] = $_POST['6002-D'] ;
			$_SESSION['V1003'] = $_POST['1003'] ;
			$_SESSION['V1103'] = $_POST['1103'] ;
//	   		$_SESSION['1203'] = $_POST['1203'] ;
	   		$_SESSION['V3003'] = $_POST['3003'] ;
	   		$_SESSION['V4003'] = $_POST['4003'] ;
	   		$_SESSION['V4103'] = $_POST['4103'] ;	   		
	   		$_SESSION['V1003'] = $_POST['1003'] ;
	   		$_SESSION['V5003'] = $_POST['5003'] ;	   		
	   		$_SESSION['1003-D'] = $_POST['1003-D'] ;
	   		$_SESSION['4003-D'] = $_POST['4003-D'] ;
	   		$_SESSION['6003-D'] = $_POST['6003-D'] ;
//	   		$_SESSION['4103'] = $_POST['4103'] ;
//	   		$_SESSION['5003'] = $_POST['5003'] ;
	   		$_SESSION['1004-D'] = $_POST['1004-D'] ;
	   		$_SESSION['4004-D'] = $_POST['4004-D'] ;
	   		$_SESSION['6004-D'] = $_POST['6004-D'] ;
	   		$_SESSION['V1004'] = $_POST['1004'] ;
	   		$_SESSION['V1104'] = $_POST['1104'] ;
	   		$_SESSION['V3004'] = $_POST['3004'] ;
	   		$_SESSION['V4004'] = $_POST['4004'] ;
	   		$_SESSION['V4104'] = $_POST['4104'] ;
	   		$_SESSION['V5004'] = $_POST['5004'] ;
//	   		$_SESSION['1204'] = $_POST['1204'] ;
	   		$_SESSION['V7002'] = $_POST['7002'] ;
	   		$_SESSION['V7102'] = $_POST['7102'] ;
	   		$_SESSION['V7003'] = $_POST['7003'] ;
	   		$_SESSION['V7103'] = $_POST['7103'] ;
	   		$_SESSION['V7004'] = $_POST['7004'] ;
	   		$_SESSION['V7104'] = $_POST['7104'] ;
	   		$_SESSION['DAWG-D'] = $_POST['DAWG-D'] ;
	   		$_SESSION['DAWG-M'] = $_POST['DAWG-M'] ;
	   		$_SESSION['8003-P']=$_POST['8003-P'];
	   		$_SESSION['8003-S']=$_POST['8003-S'];
	   		$_SESSION['8003-H']=$_POST['8003-H'];
	   		$_SESSION['8003-B']=$_POST['8003-B'];
	   		$_SESSION['8002-ML']=$_POST['8002-ML'];
	   		$_SESSION['9003-GT']=$_POST['9003-GT'];
	   		$_SESSION['IceDawgI'] = $_POST['IceDawgI'] ;
	   		$_SESSION['IceDawgIV'] = $_POST['IceDawgIV'] ;

	   		$_SESSION['OASISApple'] = $_POST['OASISApple'] ;
	   		$_SESSION['OASISWildberry'] = $_POST['OASISWildberry'] ;
	   		$_SESSION['OASISTropical'] = $_POST['OASISTropical'] ;
	   		$_SESSION['BEAT'] = $_POST['BEAT'] ;
	   		$_SESSION['GF-10'] = $_POST['GF-10'] 		;
	   		$_SESSION['GF-15'] = $_POST['GF-15'] ;		
	   		$_SESSION['GF-20'] = $_POST['GF-20'] ;						
	   		$_SESSION['other'] = $_POST['other'] ;
			$_SESSION['school'] = $_POST['school'] ;
			$_SESSION['school2'] = $_POST['school2'] ;
			$_SESSION['cemail'] = $_POST['cemail'] ;
			$_SESSION['city'] = $_POST['city'] ;
			$_SESSION['deliverydate'] = $_POST['deliverydate'] ;
			$_SESSION['phone1'] = $_POST['phone1'] ;
			$_SESSION['phone2'] = $_POST['phone2'];
		    $myErrorMsg='';
		    }
	    


?>	

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Terra Cotta Cookies Order Form</title>
<meta name="keywords" content="Terra, Terra Cotta Cookies, cookies, TC Cookies, fundraising, cookie dough, healthy cookies, healthy snacks, children’s snacks, healthy desserts, snacks, peanut free, nut free, schools, allergy, ice cream, fat, chocolate, holiday, desserts, student’s desserts, nutrition, frozen, shortbread, soya, Dr. Ben Feingold, natural ingredients, Toronto, Ontario, Georgetown, cookie delivery" />


<style type="text/css" media="screen">
<!--

@import url("vzstyles/vzh4.css");
-->
</style>
<!--[if IE 5]>
<style type="text/css">
body {text-align: center;}
table {text-align: left;}
</style>
<![endif]-->
<SCRIPT language=javascript type=text/javascript>
	<!--
	/* Create new child window */
	var win=null;
	function NewWindow(mypage,myname,w,h,scroll,pos) {
		w=680; // Sets all popup to be same width
		h=360; // Sets all popup to be same height
		
		if (mypage=='') {
			return false;
		}
		if (pos=="center") {
			LeftPosition=(screen.width)?(screen.width-w)/2:100;
			TopPosition=(screen.height)?(screen.height-h-70)/2:100;
		}
		else if (pos!="center") {
			LeftPosition=0;TopPosition=20
		}
		settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=yes';		
		win=window.open(mypage,myname,settings);
		win.focus();
	}
	// -->
</SCRIPT>
<SCRIPT language=JavaScript>
	<!--
	/* Go to selected links */
	function GoUrl(s) {
		var d = s.options[s.selectedIndex].value		
		if (d=='') {
			s.selectedIndex=0
			return false;
		} else {
			window.location.href = d
			s.selectedIndex=0
			return true;
		}
	}
	// -->
</SCRIPT>
<script type="text/javascript" src="p7pmm/p7PMMscripts.js"></script>
<link href="p7pmm/p7PMMh10.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
<div id="pagewrapper">
<table id="contentTable" border="0" cellpadding="0" cellspacing="0">
<tr>
<td  id="masthead">
<div id="logodiv"><img src="images/TC-logo-compliant.jpg" alt="Terra Cotta Cookie Company" width="206" height="130"></div></td>
</tr>

<tr>
<td id="maincontent">
 <form name="form1" method="post" action="ordersubmit.php" id="form1">
 <table width="550"  border="0" align="center" class="columns">
  <!--DWLayoutTable-->
         <tr>
          <td colspan="5"><div align="center"> <font color="#FF0000"><strong>           
           Print Order Confirmation</strong></font></div></td>
         </tr>
        <tr>
          <td colspan="5"><div align="right">

			<input type="button" value="Print this order" onClick="window.print()">

         </td>
         </tr>
<tr>
   <td height="18" bgcolor="#ffffff"><?php if (isset($_SESSION['school']) and strlen(trim($_SESSION['school']))>0 ) { ?>
            <font color="#003399">Name of School</font>
            <?php } else { ?>
            <font color="#FF0000">Name of School</font>
            <?php } ?></td>
   <td bgcolor="#ffffff"><?php if (isset($_SESSION['school'])) {  echo $_SESSION['school'];} ?></td>
   <td height="18" bgcolor="#ffffff">
   <?php if (isset($_SESSION['school2'])  and strlen(trim($_SESSION['school2']))>0 ) { ?>
            <font color="#003399">Contact Name</font>
            <?php } else { ?>
            <font color="#FF0000">Contact Name</font>
    <?php } ?>
	</td>
   <td height="18" colspan="2" bgcolor="#ffffff"><?php if (isset($_SESSION['school2'])) {  echo $_SESSION['school2'];} ?></td>
  </tr>
  <tr>
<td height="24" bgcolor="#ffffff">
      <?php if (isset($_SESSION['city']) and strlen(trim($_SESSION['city']))>0 ) { ?>
            <font color="#003399">Town/City</font>
            <?php } else { ?>
            <font color="#FF0000">Town/City</font>
    <?php } ?>

   </td>
   <td bgcolor="#ffffff"><?php if (isset($_SESSION['city'])) {  echo $_SESSION['city'];} ?></td>  
   <td bgcolor="#ffffff">
      <?php if (isset($_SESSION['cemail']) and strlen(trim($_SESSION['cemail']))>0 ) { ?>
            <font color="#003399">Contact email</font>
            <?php } else { ?>
            <font color="#FF0000">Contact email</font>
    <?php } ?>

   </td>
   <td colspan="2" bgcolor="#ffffff"><?php if (isset($_SESSION['cemail'])) {  echo $_SESSION['cemail'];} ?></td>
  </tr>
  <tr>
   <td bgcolor="#ffffff">
   <?php if (strlen( trim($_SESSION['phone2']) . trim($_SESSION['phone1']) )>0) { ?>
            <font color="#003399">Phone 1</font>
            <?php } else { ?>
            <font color="#FF0000">Phone 1</font>
            <?php }  ?> 
   </td>
   <td bgcolor="#ffffff"><?php if (isset($_SESSION['phone1'])) {  echo $_SESSION['phone1'];} ?></td>
   <td bgcolor="#ffffff">
   <?php if (strlen( trim($_SESSION['phone2']) . trim($_SESSION['phone1']) )>0) { ?>
            <font color="#003399">Phone 2</font>
            <?php } else { ?>
            <font color="#FF0000">Phone 2</font>
            <?php }  ?> 
   </td>
   <td colspan="2" bgcolor="#ffffff"><?php if (isset($_SESSION['phone2'])) {  echo $_SESSION['phone2'];} ?></td>
  </tr>
  <tr>
   <td height="18" bgcolor="#ffffff"><font color="#003399">Today`s Date</font></td>
   <td bgcolor="#ffffff"><?php print date('D, d M Y H:i:s T');?></td>
<td align="middle" bgcolor="#ffffff"><div align="left">
   <?php if (strlen($_SESSION['deliverydate'])>0 ) {?>
	<font color="#003399">Delivery 
	 
	 Date</font>
	<?php  } else { ?>
	<font color="#FF0000">Delivery 
	 
	 Date</font>
	<?php }?>
   </div></td>
   <td colspan="2" align="middle" bgcolor="#ffffff"><div align="left">
     <?php if (isset($_SESSION['deliverydate'])) {  echo $_SESSION['deliverydate'];} ?>
   </div></td>  </tr>

  <tr>
   <td width="14%" bgcolor="#CCFFFF"><strong>&nbsp;Code</strong></td>
   <td width="36%" bgcolor="#CCFFFF"><strong>&nbsp;Product</strong></td>
   <td width="20%" bgcolor="#CCFFFF"><strong>&nbsp;Size</strong></td>
   <td width="15%" bgcolor="#CCFFFF"><strong>&nbsp;Pack</strong></td>
   <td width="10%" bgcolor="#CCFFFF"><strong>&nbsp;Order</strong></td>
  </tr>
  <tr class="text">
   <td colspan="5" bgcolor="#FFFFff"><div align="center"><span class="tinygrey">----------------------------------------------------------------------------------------------------------------------</span></div></td>
   </tr><tr class="text">
   <td colspan="6"  ><div align="center" class="bluemed">Baked Cookes - Delivered Frozen</div></td>
  </tr><tr>
   <td ></td>
   <td colspan="2" ><font color="#003399"><strong><span class="textlarge">&lt; 3.6g of fat + 2g of fibre</span></strong></font></td>
   <td >&nbsp;</td>
   <td >&nbsp;</td>
   <td >&nbsp;</td>
  </tr>
  <?php if (strlen(trim($_SESSION['1002-D']))>0){ ?>  
  <tr>
   <td>1002-D </td>
   <td>Chocolate Chip DeLite</td>
   <td>Small, Bulk</td>
   <td>96/case</td>
   <td><div align="center">
     <?php if (isset($_SESSION['1002-D'])) {  echo $_SESSION['1002-D'] ;} ?>
   </div></td>
  </tr>
    <?php }
	if (strlen(trim($_SESSION['3002-D']))>0){ ?>
  <tr>
   <td>3002-D</td>
   <td>Oatmeal Raisin</td>
   <td>Small, Bulk</td>
   <td>96/case</td>
   <td><div align="center">
     <?php if (isset($_SESSION['3002-D'])) {  echo $_SESSION['3002-D'] ;} ?>
   </div></td>
  </tr>
    <?php }
	if (strlen(trim($_SESSION['4002-D']))>0){ ?>
  <tr>
   <td>4002-D </td>
   <td>Fudge Chip DeLite</td>
   <td>Small, Bulk</td>
   <td>96/case</td>
   <td><div align="center">
     <?php if (isset($_SESSION['4002-D'])) {  echo $_SESSION['4002-D'] ;} ?>
   </div></td>
  </tr>
   <?php }
	if (strlen(trim($_SESSION['5002-D']))>0){ ?>
  <tr>
   <td>5002-D </td>
    <td>Oatmeal Choc Chip DeLite </td>
    <td>Small, Bulk </td>
    <td>96/case </td>
   <td><div align="center">
     <?php if (isset($_SESSION['5002-D'])) {  echo $_SESSION['5002-D'] ;} ?>
   </div></td>
  </tr>
   <?php }
	if (strlen(trim($_SESSION['6002-D']))>0){ ?>
  <tr>
   <td>6002-D</td>
    <td>Oatmeal  DeLite </td>
    <td>Small, Bulk </td>
    <td>96/case </td>
   <td><div align="center">
     <?php if (isset($_SESSION['6002-D'])) {  echo $_SESSION['6002-D'] ;} ?>
   </div></td>
   </tr>
   <?php } ?>
     <tr class="text">
   <td colspan="6" class="tinygrey"><div align="center">----------------------------------------------------------------------------------------------------------------------</div></td>
   </tr>
  </tr>
  <tr>
   <td>&nbsp;</td>
   <td><font color="#003399"><strong>(5g of fat + 3g of fibre)</strong></font></td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
  </tr>
   <?php if (strlen(trim($_SESSION['1003-D']))>0){ ?>
  <tr>
   <td>1003-D </td>
    <td>Chocolate Chip DeLite</td>
    <td>Lg, Wrapped </td>
    <td>48/case</td>
   <td><div align="center">
     <?php if (isset($_SESSION['1003-D'])) {  echo $_SESSION['1003-D'] ;} ?>
   </div></td>
  </tr>
     <?php }
	if (strlen(trim($_SESSION['3003-D']))>0){ ?>
  <tr>
    <td>3003-D </td>
    <td>Oatmeal Raisin DeLite</td>
    <td>Lg. Wrapped </td>
    <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['3003-D'])) {  echo $_SESSION['3003-D'] ;} ?>
   </div></td>
  </tr>
     <?php }
	if (strlen(trim($_SESSION['4003-D']))>0){ ?>

  <tr>
    <td>4003-D</td>
    <td>Fudge Chip DeLite</td>
    <td>Lg. Wrapped</td>
    <td>48/case</td>
   <td><div align="center">
     <?php if (isset($_SESSION['4003-D'])) {  echo $_SESSION['4003-D'] ;} ?>
   </div></td>
  </tr>
     <?php }
	if (strlen(trim($_SESSION['5003-D']))>0){ ?>

  <tr>
   <td>5003-D</td>
    <td>Oatmeal Choc Chip DeLite</td>
    <td>Lg. Wrapped</td>
    <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['5003-D'])) {  echo $_SESSION['5003-D'] ;} ?>
   </div></td>
  </tr>
     <?php }
	if (strlen(trim($_SESSION['6003-D']))>0){ ?>
  <tr>
    <td>6003-D </td>
    <td>Oatmeal DeLite</td>
    <td>Lg. Wrapped</td>
    <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['6003-D'])) {  echo $_SESSION['6003-D'] ;} ?>
   </div></td>
  </tr>
  <?php } ?>
 <tr class="text">
   <td colspan="5" bgcolor="#FFFFff"><div align="center"><span class="tinygrey">----------------------------------------------------------------------------------------------------------------------</span></div></td>
   </tr>
  
  </tr>
     <?php 	if (strlen(trim($_SESSION['1004-D']))>0){ ?>

  <tr>
   <td>1004-D</td>
   <td>Chocolate Chip DeLite</td>
   <td>Lg. Bulk</td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['1004-D'])) {  echo $_SESSION['1004-D'] ;} ?>
   </div></td>
  </tr>
     <?php }
	if (strlen(trim($_SESSION['3004-D']))>0){ ?>

  <tr>
   <td>3004-D </td>
   <td>Oatmeal Raisin DeLite</td>
   <td>Lg, Bulk</td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['3004-D'])) {  echo $_SESSION['3004-D'] ;} ?>
   </div></td>
  </tr>
     <?php }
	if (strlen(trim($_SESSION['4004-D']))>0){ ?>

  <tr>
   <td>4004-D</td>
   <td>Fudge Chip DeLite</td>
   <td>Lg. Bulk</td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['4004-D'])) {  echo $_SESSION['4004-D'] ;} ?>
   </div></td>
  </tr>
     <?php }
	if (strlen(trim($_SESSION['5004-D']))>0){ ?>

  <tr>
    <td>5004-D </td>
   <td>Oatmeal Choc Chip DeLite</td>
   <td>Lg. Bulk</td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['5004-D'])) {  echo $_SESSION['5004-D'] ;} ?>
   </div></td>
   </tr>
     <?php }
	if (strlen(trim($_SESSION['6004-D']))>0){ ?>
   <tr>
    <td>6004-D </td>
   <td>Oatmeal DeLite</td>
   <td>Lg. Bulk</td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['6004-D'])) {  echo $_SESSION['6004-D'] ;} ?>
   </div></td>
  </tr> 
  <?php } ?>
   <tr class="text">
   <td colspan="5" class="tinygrey"><div align="center">----------------------------------------------------------------------------------------------------------------------</div></td>
   </tr><tr class="text">
   <td colspan="5" class="bluemed"><div align="center">T.C.`s Original Recipes</div></td>
  </tr>
       <?php 	if (strlen(trim($_SESSION['T-1001']))>0){ ?>

  <tr>
   <td>T-1001 </td>
   <td>Chocolate Chip </td>
   <td>Tiny, Bulk </td>
   <td>288/case</td>
   <td><div align="center">
     <?php if (isset($_SESSION['T-1001'])) {  echo $_SESSION['T-1001'] ;} ?>
   </div></td>
  </tr>
       <?php }
	if (strlen(trim($_SESSION['T-4101']))>0){ ?>

  <tr>
   <td>T-4101</td>
   <td>White Chocolate Fudge </td>
   <td>Tiny, Bulk </td>
   <td>288/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['T-4101'])) {  echo $_SESSION['T-4101'] ;} ?>
   </div></td>
  </tr>
       <?php }
	if (strlen(trim($_SESSION['T-10001']))>0){ ?>

  <tr>
   <td>T-10001 </td>
   <td>White Chocolate </td>
   <td>Tiny, Bulk </td>
   <td>288/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['T-10001'])) {  echo $_SESSION['T-10001'] ;} ?>
   </div></td>
  </tr>
       <?php }
	if (strlen(trim($_SESSION['V1003']))>0){ ?>

  <tr>
    <td>1003 </td>
   <td>Chocolate Chip </td>
   <td>Lg. Wrapped </td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['V1003'])) {  echo $_SESSION['V1003'] ;} ?>
   </div></td>
  </tr>
       <?php }
	if (strlen(trim($_SESSION['V1103']))>0){ ?>

  <tr>
   <td>1103 </td>
   <td>Casey&#8217;s-<span class="textsmall">Caramel &amp; Choc</span> </td>
   <td>Lg. Wrapped </td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['V1103'])) {  echo $_SESSION['V1103'] ;} ?>
   </div></td>
  </tr>
       <?php }
	if (strlen(trim($_SESSION['V4103']))>0){ ?>

  <tr>
   <td>4103 </td>
   <td>White Chunk Fudge </td>
   <td>Lg. Wrapped </td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['V4103'])) {  echo $_SESSION['V4103'] ;} ?>
   </div></td>
  </tr>
  <?php } ?>
  <tr class="text">
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
  </tr>
       <?php 
	if (strlen(trim($_SESSION['V1004']))>0){ ?>

  <tr>
   <td>1004 </td>
    <td>Chocolate Chip </td>
    <td>Lg. Bulk</td>
    <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['V1004'])) {  echo $_SESSION['V1004'] ;} ?>
   </div></td>
  </tr>
       <?php }
	if (strlen(trim($_SESSION['V1104']))>0){ ?>

  <tr>
  <td>1104 </td>
    <td>Casey&#8217;s-<span class="textsmall"> Caramel &amp; Choc</span> </td>
    <td>Lg, Bulk</td>
    <td>48/case </td>
   <td><div align="center">
<?php if (isset($_SESSION['V1104'])) {  echo $_SESSION['V1104'] ;} ?></div>
   </td>
  </tr>
       <?php }
	if (strlen(trim($_SESSION['V4104']))>0){ ?>

  <tr>
   <td>4104 </td>
    <td>White Chunk Fudge </td>
    <td>Lg. Bulk</td>
    <td>48/case </td>
   <td><div align="center">
<?php if (isset($_SESSION['V4104'])) {  echo $_SESSION['V4104'] ;} ?></div>
   </td>
  </tr>
  <?php } ?>
  <tr>
   <td colspan="5" class="textbg"><div align="center" class="textlarge"><strong><font color="#003399">DAWG 
    Collection &#8211; Rice Krispie Bars </font></strong></div></td>
   </tr>
     <?php 
	if (strlen(trim($_SESSION['DAWG-D']))>0){ ?>

   <tr>
   <td>Dawg-D </td>
    <td>DuneDawg</td>
    <td>Lg. Wrapped</td>
    <td>48/case </td>
   <td><div align="center">
<?php if (isset($_SESSION['DAWG-D'])) {  echo $_SESSION['DAWG-D'] ;} ?></div>
   </td>
  </tr>
     <?php }
	if (strlen(trim($_SESSION['DAWG-M']))>0){ ?>

  <tr>
   <td>Dawg-M </td>
    <td>MudDawg<span class="textsmall"> (w/chocolate)</span> </td>
    <td>Lg. Wrapped</td>
    <td>48/case </td>
   <td><div align="center">
<?php if (isset($_SESSION['DAWG-M'])) {  echo $_SESSION['DAWG-M'] ;} ?></div>
   </td>
  </tr>
  <?php }?>
   <tr>
   <td colspan="5"><div align="center"><span class="bluemed">SPECIALITY COOKIES</span><span class="tinyblack"> - (see available months in brackets)</span></div></td>
   </tr>
     <?php 
	if (strlen(trim($_SESSION['8003-P']))>0){ ?>
   
  <tr>
    <td>8003-P</td>
   <td>Vanilla Pumpkin<span class="tinyblack"> (Oct)</span></td>
   <td>Lg. Wrapped</td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['8003-P'])) {  echo $_SESSION['8003-P'] ;} ?></div>
   </td>
  </tr>
       <?php }
	if (strlen(trim($_SESSION['8003-S']))>0){ ?>

  <tr>
   <td>8003-S</td>
   <td>Vanilla Snowman<span class="tinyblack"> (Nov/Dec/Jan)</span></td>
   <td>Lg, Wrapped</td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['8003-S'])) {  echo $_SESSION['8003-S'] ;} ?></div>
   </td>
  </tr>
       <?php }
	if (strlen(trim($_SESSION['9003-GT']))>0){ ?>

  <tr>
    <td>9003-GT</td>
   <td>Ginger Teddy<span class="tinyblack"> (Nov/Dec)</span></td>
   <td>Lg, Wrapped</td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['9003-GT'])) {  echo $_SESSION['9003-GT'] ;} ?></div>
   </td>
  </tr>
     <?php }
	if (strlen(trim($_SESSION['8003-H']))>0){ ?>

  <tr>
   <td>8003-H</td>
   <td>Vanilla Heart <span class="tinyblack">(Feb)</span></td>
   <td>Lg. Wrapped</td>
   <td bgcolor="#efefef">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC"><div align="center">
<?php if (isset($_SESSION['8003-H'])) {  echo $_SESSION['8003-H'] ;} ?></div>
   </td>
  </tr>
     <?php }
	if (strlen(trim($_SESSION['8003-B']))>0){ ?>
  
  <tr>
  <td>8003-B</td>
   <td>Vanilla Butterfly<span class="tinyblack"> (Mar/Apr/May)</span></td>
   <td>Lg. Wrapped</td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['8003-B'])) {  echo $_SESSION['8003-B'] ;} ?>
   </div></td>
  </tr>
  <?php } ?>
  <tr>
   <td colspan="5"><div align="center"><span class="bluemed">ICE CREAM SANDWICHES WITH DELUXE VANILLA ICE CREAM</span><span class="tinyblack">  (April, May, June)</span></div></td>
   </tr>
     <?php 
	if (strlen(trim($_SESSION['IceDawgI']))>0){ ?>
   
  <tr>
   <td class="tinyblack">Ice Dawg 1</td>
   <td>Chocolate Chip</td>
   <td>Lg. Wrapped</td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['IceDawgI'])) {  echo $_SESSION['IceDawgI'] ;} ?>
   </div></td>
  </tr>
       <?php }
	if (strlen(trim($_SESSION['IceDawgIV']))>0){ ?>

  <tr>
   <td  class="tinyblack">Ice Dawg IV</td>
   <td>Fudge Chip</td>
   <td>Lg. Wrapped</td>
   <td>48/case</td>
   <td><div align="center">
<?php if (isset($_SESSION['IceDawgIV'])) {  echo $_SESSION['IceDawgIV'] ;} ?>
   </div></td>
  </tr>
  <?php } ?>
   <tr>
   <td colspan="5"><div align="center" class="textlarge"><font color="#003399"><strong>GLUTEN FREE ITEMS</strong></font></div></td>
   </tr>
     <?php 
	if (strlen(trim($_SESSION['GF-10']))>0){ ?>
   
  <tr>
   <td>GF-10</td>
    <td>Gluten Free  Choc Chip Cookies</td>
    <td>&frac12; lb bag</td>
    <td>225 gram</td>
   <td><div align="center">
<?php if (isset($_SESSION['GF-10'])) {  echo $_SESSION['GF-10'] ;} ?>
   </div></td>
  </tr>
     <?php }
	if (strlen(trim($_SESSION['GF-15']))>0){ ?>
  
  <tr>
   <td>GF-15</td>
    <td>Gluten Free Brownies</td>
    <td >7 &frac12; &ldquo; pan</td>
    <td>325 gram</td>
   <td><div align="center">
<?php if (isset($_SESSION['GF-15'])) {  echo $_SESSION['GF-15'] ;} ?>
   </div></td>
  </tr>
       <?php }
	if (strlen(trim($_SESSION['GF-24']))>0){ ?>

  <tr>
   <td>GF-24</td>
   <td>Unbaked Pastry </td>
   <td>&nbsp;</td>
   <td>250 gram</td>
   <td><div align="center">
<?php if (isset($_SESSION['GF-24'])) {  echo $_SESSION['GF-24'] ;} ?>
   </div></td>
  </tr> 
     <?php }
	if (strlen(trim($_SESSION['GF-26']))>0){ ?>

  <tr>
    <td><span class="tinyblack">GF-26,27,28</span></td>
   <td class="tinyblack">Unbaked Apple, Blueberry, Cherry Pies</td>
   <td>8&rdquo;  pan</td>
   <td>700 gram</td>
   <td><div align="center">
<?php if (isset($_SESSION['GF-26'])) {  echo $_SESSION['GF-26'] ;} ?>
   </div></td>
  </tr>
  <?php } ?>
  <tr>
   <td colspan="5" ><div align="center"><span class="textlarge"><font color="#003399"><strong>100% 
    PURE UNSWEETENED JUICES </strong></font></span></div></td> 
  <?php if (strlen(trim($_SESSION['OASISApple']))>0){ ?>	
	<tr>
  <td>OASIS </td>
    <td>Apple Juice </td>
    <td>200 ml tetra </td>
    <td>30/case </td>
   <td><div align="center">
<?php if (isset($_SESSION['OASISApple'])) {  echo $_SESSION['OASISApple'] ;} ?>
   </div></td>
  </tr>
    <?php }?>
  <?php if (strlen(trim($_SESSION['OASISWildberry']))>0){ ?>
  <tr>
   <td>OASIS </td>
    <td>Wildberry Juice </td>
    <td>200 ml tetra </td>
    <td>30/case </td>
   <td><div align="center">
<?php if (isset($_SESSION['OASISWildberry'])) {  echo $_SESSION['OASISWildberry'] ;} ?>
   </div></td>
  </tr>
    <?php }?>
  <?php if (strlen(trim($_SESSION['OASISTropical']))>0){ ?>
  <tr>
  <td>OASIS </td>
    <td>Seven Fruit Tropical Juice</td>
    <td>200 ml tetra </td>
    <td>30/case </td>
   <td><div align="center">
<?php if (isset($_SESSION['OASISTropical'])) {  echo $_SESSION['OASISTropical'] ;} ?>
   </div></td>
  </tr>
  <?php } ?>
  <tr>
   <td bgcolor="#ffffff"></td>
   <td bgcolor="#ffffff"></td>
   <td bgcolor="#ffffff"></td>
   <td bgcolor="#ffffff"></td>
   <td bgcolor="#ffffff" ></td>
  </tr>
   </tr>

  <?php if (strlen(trim($_SESSION['other']))>0){ ?>   
  <tr>
   <td valign="top" bgcolor="#ffffff">Other items<br />
       </td>
   <td colspan="4" bgcolor="#ffffff"><div>
<?php if (isset($_SESSION['other'])) {  echo $_SESSION['other'] ;} ?>
   </div></td>
  </tr>
  <?php }?>
  <tr>
   <td bgcolor="#ffffff"></td>
   <td bgcolor="#ffffff"></td>
   <td bgcolor="#ffffff"></td>
   <td bgcolor="#ffffff"></td>
   <td bgcolor="#ffffff" ></td>
  </tr>
  
 </table> 
 </td>
</tr>
</table>

</form>
</div>
</body>
</html>
