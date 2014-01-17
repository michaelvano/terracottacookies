<?php

	session_start();
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
	    if (strlen(trim($_POST['Submit']))>0) { 
		    $infoFilled=0;
		    if (strlen(trim($_POST['school2']))==0) {
				$infoFilled=1;
				$myErrorMsg= $myErrorMsg . "- Contact Name\r\n" ;
			}	
		    if (strlen(trim($_POST['school']))==0) {
				$infoFilled=1;
				$myErrorMsg= $myErrorMsg . "- School Name\r\n" ;
		    }
		    if (strlen(trim($_POST['cemail']))==0) {
				$infoFilled=1;
				$myErrorMsg= myErrorMsg . "- Contact Email\r\n";
		    }
		    	    else
		    {
		    	if (!validEmail($_POST['cemail']))
				{
				$infoFilled=1;
				$myErrorMsg= myErrorMsg . "- Contact Email\r\n";
				}	    	
			} 

		    if (strlen(trim($_POST['city']))==0) {
				$infoFilled=1;
				$myErrorMsg= myErrorMsg . "- City\r\n";
		    }
		    if (strlen(trim($_POST['phone1'])  . trim($_POST['phone2']))==0) {
				$infoFilled=1;
				$myErrorMsg= myErrorMsg . "- Phone Number\r\n";
		    }
		    if  (strlen(trim($_POST['deliverydate']))==0) {
				$infoFilled=1;
				$myErrorMsg= myErrorMsg . "- Delivery Date\r\n";
		    }
		    if ($infoFilled==1) {
   				$host  = $_SERVER['HTTP_HOST'];
				$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = 'order.php';
				header("Location: http://$host$uri/$extra");
				
		    	}

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

@import url("vzstyles/vzh2.css");
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
<td colspan="2" id="masthead">
<div id="logodiv"><img src="images/TC-logo-compliant.jpg" alt="Terra Cotta Cookie Company" width="206" height="130"></div></td>
</tr>
<tr>
 <td colspan="2" id="menubar"><div id="p7PMM_1" class="p7PMMh10">
  <ul class="p7PMM">
   <li><a href="index.html" class="p7PMM_img"><img src="images/menu_home.jpg" width="87" height="104" alt="Home"></a></li>
   <li><a href="welcome.html" class="p7PMM_img"><img src="images/menu_welcome.jpg" width="87" height="104" alt="T.C.'s Cookies"></a></li>
   <li><a href="products.html" class="p7PMM_img"><img src="images/menu_products.jpg" width="87" height="104" alt="TCs Products"></a></li>
   <li><a href="fun-raising.html" class="p7PMM_img"><img src="images/menu_funraising.jpg" width="87" height="104" alt="Fun-Raising"></a></li>
   <li><a href="ingredients.html" class="p7PMM_img"><img src="images/menu_ingredients.jpg" width="87" height="104" alt="All-natural Ingredients"></a></li>
   <li><a href="order.html" class="p7PMM_img"><img src="images/menu_order.jpg" width="87" height="104" alt="Order Now"></a></li>
   <li><a href="delivery.html" class="p7PMM_img"><img src="images/menu_delivery.jpg" width="87" height="104" alt="Delivery Schedule"></a></li>
   <li><a href="newsletter.html" class="p7PMM_img"><img src="images/menu_newsletter.jpg" width="87" height="104" alt="TC Cookies Newsletter"></a></li>
   <li><a href="contact.html" class="p7PMM_img"><img src="images/menu_contact.jpg" width="87" height="104" alt="Contact Us"></a></li>
  </ul>
  <div class="p7pmmclearfloat">&nbsp;</div>
  <!--[if lte IE 6]>
<style>.p7PMMh10 ul ul li {float:left; clear: both; width: 100%;}.p7PMMh10 {text-align: left;}.p7PMMh10, .p7PMMh10 ul ul a {zoom: 1;}</style>
<![endif]-->
  <!--[if IE 5]>
<style>.p7PMMh10, .p7PMMh10 ul ul a {height: 1%; overflow: visible !important;} .p7PMMh10 {width: 100%;}</style>
<![endif]-->
  <!--[if IE 7]>
<style>.p7PMMh10, .p7PMMh10 a{zoom:1;}.p7PMMh10 ul ul li{float:left;clear:both;width:100%;}</style>
<![endif]-->
  <script type="text/javascript">
<!--
P7_PMMop('p7PMM_1',1,0,-5,-5,0,0,0,1,1,3,1,1,0);
//-->
  </script>
</div></td>
</tr>
<tr>
<td id="maincontent">
 <h1>order</h1>
 <form name="form1" method="post" action="ordersubmit.php" id="form1">
 <table width="550"  border="0" align="center" class="columns">
  <!--DWLayoutTable-->
         <tr>
   			<td colspan="5"><div align="center" class="redbold"><strong>           
          Please Confirm Your Order </strong></div></td>
		</tr>

  <tr>
   <td width="72">&nbsp;</p></td>
   <td width="192"><strong>Product</strong></td>
   <td width="102"><strong>Size</strong></td>
   <td width="75"><strong>Pack</strong></td>
   <td width="85"><div align="center"><strong>Order</strong></div></td>
  </tr>
  <?php if (strlen(trim($_SESSION['T-1001']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;T-1001 </td>
   <td bgcolor="#ffffff">Chocolate Chip</td>
   <td bgcolor="#ffffff">Tiny, Bulk</td>
   <td bgcolor="#ffffff">288/case</td>
   <td align="middle" valign="center" bgcolor="#ffffff" class="text"><div align="center">
     <INPUT name= "T-1001" size="4" value="<?php if (isset($_SESSION['T-1001'])) {  echo $_SESSION['T-1001'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
   <?php if (strlen(trim($_SESSION['T-4101']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;T-4101</td>
   <td bgcolor="#ffffff">White Chocolate Fudge</td>
   <td bgcolor="#ffffff">Tiny, Bulk</td>
   <td bgcolor="#ffffff">288/case</td>
   <td height="18" align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="T-4101" size ="4" value="<?php if (isset($_SESSION['T-4101'])) {  echo $_SESSION['T-4101'] ;} ?>" readonly/>
   </div></td>
  </tr>
    <?php }?>
    <?php if (strlen(trim($_SESSION['T-10001']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;T-10001 </td>
   <td bgcolor="#ffffff">White Chocolate</td>
   <td bgcolor="#ffffff">Tiny, Bulk</td>
   <td bgcolor="#ffffff">288/case</td>
   <td height="18" align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="T-10001" size="4" value="<?php if (isset($_SESSION['T-10001'])) {  echo $_SESSION['T-10001'] ;} ?>" readonly/>
   </div></td>
  </tr>
    <?php }?>
    <?php if (strlen(trim($_SESSION['1002-D']))>0){ ?>
  <tr>
   <td bgcolor="#ccffff">&nbsp;1002-D </td>
   <td bgcolor="#ccffff"> Chocolate Chip DeLite </td>
   <td bgcolor="#ccffff">Small, Bulk</td>
   <td bgcolor="#ccffff">96/case </td>
   <td height="18" align="middle" valign="center" bgcolor="#ccffff"><div align="center">
     <input name="1002-D" size="4" value="<?php if (isset($_SESSION['1002-D'])) {  echo $_SESSION['1002-D'] ;} ?>"  readonly/>
   </div></td>
  </tr>
      <?php }?>
    <?php if (strlen(trim($_SESSION['3002-D']))>0){ ?>
  <tr>
   <td bgcolor="#ccffff">&nbsp;3002-D</td>
   <td bgcolor="#ccffff">Oatmeal Raisin </td>
   <td bgcolor="#ccffff">Small, Bulk</td>
   <td bgcolor="#ccffff">96/case </td>
   <td height="18" align="middle" valign="center" bgcolor="#ccffff"><div align="center">
     <input name="3002-D" size="4" value="<?php if (isset($_SESSION['3002-D'])) {  echo $_SESSION['3002-D'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
    <?php if (strlen(trim($_SESSION['4002-D']))>0){ ?>
  <tr>
   <td bgcolor="#ccffff">&nbsp;4002-D</td>
   <td bgcolor="#ccffff">Fudge Chip DeLite </td>
   <td bgcolor="#ccffff">Small, Bulk</td>
   <td bgcolor="#ccffff">96/case </td>
   <td height="18" align="middle" valign="center" bgcolor="#ccffff"><div align="center">
     <input name="4002-D" size="4" value="<?php if (isset($_SESSION['4002-D'])) {  echo $_SESSION['4002-D'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
    <?php if (strlen(trim($_SESSION['5002-D']))>0){ ?>
  <tr>
   <td bgcolor="#ccffff">&nbsp;5002-D </td>
   <td bgcolor="#ccffff"> Oatmeal Choc Chip Delite</td>
   <td bgcolor="#ccffff">Small, Bulk</td>
   <td bgcolor="#ccffff">96/case </td>
   <td height="18" align="middle" valign="center" bgcolor="#ccffff"><div align="center">
     <input name="5002-D" id="5002-D " size ="4" value="<?php if (isset($_SESSION['5002-D'])) {  echo $_SESSION['5002-D'] ;} ?>"  readonly/>
   </div></td>
  </tr>
      <?php }?>
    <?php if (strlen(trim($_SESSION['6002-D']))>0){ ?>
  <tr>
   <td bgcolor="#ccffff">&nbsp;6002-D</td>
   <td bgcolor="#ccffff">Oatmeal  DeLite</td>
   <td bgcolor="#ccffff">Small, Bulk</td>
   <td bgcolor="#ccffff">96/case </td>
   <td height="18" align="middle" valign="center" bgcolor="#ccffff"><div align="center">
     <input name="6002-D" id="6002-D" size="4" value="<?php if (isset($_SESSION['6002-D'])) {  echo $_SESSION['6002-D'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
    <?php if (strlen(trim($_SESSION['V1003']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;1003</td>
   <td bgcolor="#ffffff">Chocolate Chip</td>
   <td bgcolor="#ffffff">Large, Wrapped </td>
   <td bgcolor="#ffffff">48/case</td>
   <td height="18" align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="1003" id="1003" size="4" value="<?php if (isset($_SESSION['V1003'])) {  echo $_SESSION['V1003'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['V1103']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;1103</td>
   <td bgcolor="#ffffff">Casey&rsquo;s-Caramel &amp; Choc</td>
   <td bgcolor="#ffffff">Large, Wrapped </td>
   <td bgcolor="#ffffff"><div align="left">48/case </div></td>
   <td height="18" align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="1103" id="1103" size="4" value="<?php if (isset($_SESSION['V1103'])) {  echo $_SESSION['V1103'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['V3003']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;3003</td>
   <td bgcolor="#ffffff">Oatmeal Raisin <strong> </strong></td>
   <td bgcolor="#ffffff">Large, Wrapped</td>
   <td bgcolor="#ffffff"><div align="left">48/case </div></td>
   <td  align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="3003" id="3003" size="4" value="<?php if (isset($_SESSION['V3003'])) {  echo $_SESSION['V3003'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['V4003']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;4003 </td>
   <td bgcolor="#ffffff">Fudge Chip</td>
   <td bgcolor="#ffffff">Large, Wrapped </td>
   <td bgcolor="#ffffff"><div align="left">48/case </div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="4003" id="4003" size="4" value="<?php if (isset($_SESSION['V4003'])) {  echo $_SESSION['V4003'] ;} ?>"/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['V4103']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;4103 </td>
   <td bgcolor="#ffffff">White Chunk Fudge </td>
   <td bgcolor="#ffffff">Large, Wrapped </td>
   <td bgcolor="#ffffff"><div align="left">48/case </div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="4103" id="4103 " size ="4" value="<?php if (isset($_SESSION['V4103'])) {  echo $_SESSION['V4103'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['V5003']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;5003 </td>
   <td bgcolor="#ffffff">Oatmeal Choc Chip <strong> </strong></td>
   <td bgcolor="#ffffff">Large, Wrapped</td>
   <td bgcolor="#ffffff"><div align="left">48/case </div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="5003" id="5003 " size ="4" value="<?php if (isset($_SESSION['V5003'])) {  echo $_SESSION['V5003'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['1003-D']))>0){ ?>
  <tr>
   <td bgcolor="#ccffff">&nbsp;1003-D </td>
   <td bgcolor="#ccffff">Chocolate Chip DeLite </td>
   <td bgcolor="#ccffff">Large, Wrapped </td>
   <td bgcolor="#ccffff"><div align="left">48/case </div></td>
   <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
     <input name="1003-D" id="1003-D" size="4" value="<?php if (isset($_SESSION['1003-D'])) {  echo $_SESSION['1003-D'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['4003-D']))>0){ ?>
  <tr>
   <td bgcolor="#ccffff">&nbsp;4003-D </td>
   <td bgcolor="#ccffff">Fudge Chip DeLite </td>
   <td bgcolor="#ccffff">Large, Wrapped </td>
   <td bgcolor="#ccffff"><div align="left">48/case</div></td>
   <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
     <input name="4003-D" id="4003-D" size="4" value="<?php if (isset($_SESSION['4003-D'])) {  echo $_SESSION['4003-D'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['6003-D']))>0){ ?>
  <tr>
   <td bgcolor="#ccffff">&nbsp;6003-D</td>
   <td bgcolor="#ccffff">Oatmeal  DeLite </td>
   <td bgcolor="#ccffff">Large, Wrapped</td>
   <td bgcolor="#ccffff"><div align="left">48/case</div></td>
   <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
     <input name="6003-D" id="6003-D" size="4" value="<?php if (isset($_SESSION['6003-D'])) {  echo $_SESSION['6003-D'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['1004-D']))>0){ ?>
  <tr>
   <td bgcolor="#ccffff">&nbsp;1004-D</td>
   <td bgcolor="#ccffff">Chocolate Chip DeLite</td>
   <td bgcolor="#ccffff">Large, Bulk</td>
   <td bgcolor="#ccffff"><div align="left">48/case</div></td>
   <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
     <input name="1004-D" id="10004-D" size="4" value="<?php if (isset($_SESSION['1004-D'])) {  echo $_SESSION['1004-D'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['4004-D']))>0){ ?>
  <tr>
   <td bgcolor="#ccffff">&nbsp;4004-D </td>
   <td bgcolor="#ccffff">Fudge Chip DeLite</td>
   <td bgcolor="#ccffff">Large, Bulk</td>
   <td bgcolor="#ccffff"><div align="left">48/case</div></td>
   <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
     <input name="4004-D" id="4004-D" size="4" value="<?php if (isset($_SESSION['4004-D'])) {  echo $_SESSION['4004-D'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['6004-D']))>0){ ?>
  <tr>
   <td bgcolor="#ccffff">&nbsp;6004-D</td>
   <td bgcolor="#ccffff">Oatmeal  DeLite</td>
   <td bgcolor="#ccffff">Large, Bulk</td>
   <td bgcolor="#ccffff"><div align="left">48/case</div></td>
   <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
     <input name="6004-D" id="6004-D" size="4" value="<?php if (isset($_SESSION['6004-D'])) {  echo $_SESSION['6004-D'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['V1004']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;1004 </td>
   <td bgcolor="#ffffff">Chocolate Chip</td>
   <td bgcolor="#ffffff">Large, Bulk</td>
   <td bgcolor="#ffffff"><div align="left">48/case</div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="1004" id="1004 2" size ="4" value="<?php if (isset($_SESSION['V1004'])) {  echo $_SESSION['V1004'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['V1104']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;1104 </td>
   <td bgcolor="#ffffff">Casey&rsquo;s- Caramel &amp; Choc </td>
   <td bgcolor="#ffffff">Large, Bulk</td>
   <td bgcolor="#ffffff"><div align="left">48/case</div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="1104" id="1104 " size ="4" value="<?php if (isset($_SESSION['V1104'])) {  echo $_SESSION['V1104'] ;} ?>" readonly/>
   </div></td>
  </tr>
      <?php }?>
  <?php if (strlen(trim($_SESSION['V3004']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;3004 </td>
   <td bgcolor="#ffffff">Oatmeal Raisin</td>
   <td bgcolor="#ffffff">Large, Bulk</td>
   <td bgcolor="#ffffff"><div align="left">48/case</div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="3004" id="3004 " size ="4" value="<?php if (isset($_SESSION['V3004'])) {  echo $_SESSION['V3004'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['V4004']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;4004 </td>
   <td bgcolor="#ffffff">Fudge Chip </td>
   <td bgcolor="#ffffff">Large, Bulk</td>
   <td bgcolor="#ffffff"><div align="left">48/case</div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="4004" id="4004 " size ="4" value="<?php if (isset($_SESSION['V4004'])) {  echo $_SESSION['V4004'] ;} ?>" readonly/>
   </div></td>
  </tr>
<?php }?>
  <?php if (strlen(trim($_SESSION['V4104']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;4104</td>
   <td bgcolor="#ffffff">White Chunk Fudge</td>
   <td bgcolor="#ffffff">Large, Bulk</td>
   <td bgcolor="#ffffff"><div align="left">48/case</div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="4104" id="4104" size="4" value="<?php if (isset($_SESSION['V4104'])) {  echo $_SESSION['V4104'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['V5004']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;5004 </td>
   <td bgcolor="#ffffff"> Oatmeal Choc Chip</td>
   <td bgcolor="#ffffff">Large, Bulk</td>
   <td bgcolor="#ffffff"><div align="left">48/case</div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="5004" id="5004 " size ="4" value="<?php if (isset($_SESSION['V5004'])) {  echo $_SESSION['V5004'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['DAWG-D']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;Dawg-D </td>
   <td bgcolor="#ffffff">DuneDawg (Rice Krispie Bar)</td>
   <td bgcolor="#ffffff">Large, Wrapped</td>
   <td bgcolor="#ffffff"><div align="left">48/case </div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="DAWG-D" id="DAWG-D " size ="4" value="<?php if (isset($_SESSION['DAWG-D'])) {  echo $_SESSION['DAWG-D'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['DAWG-M']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;Dawg-M</td>
   <td bgcolor="#ffffff">MudDawg (Rice Krispie Bar with Chocolate)</td>
   <td bgcolor="#ffffff">Large, Wrapped</td>
   <td bgcolor="#ffffff"><div align="left">48/case </div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="DAWG-M" id="DAWG-M" size="4" value="<?php if (isset($_SESSION['DAWG-M'])) {  echo $_SESSION['DAWG-M'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['8003-P']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">8003-P</td>
   <td bgcolor="#FFFFCC">Vanilla Pumpkin<span class="tinyblack"> (Oct)</span></td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC" ><div align="center">
   <input name="8003-P" id="8003-P" size="4" value="<?php if (isset($_SESSION['8003-P'])) {  echo $_SESSION['8003-P'] ;} ?>" readonly="true"/></div>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['8003-S']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">8003-S</td>
   <td bgcolor="#FFFFCC">Vanilla Snowman<span class="tinyblack"> (Nov/Dec/Jan)</span></td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC"><div align="center">
   <input name="8003-S" id="8003-S" size="4" value="<?php if (isset($_SESSION['8003-S'])) {  echo $_SESSION['8003-S'] ;} ?>" readonly="true"/></div>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['9003-GT']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">9003-GT</td>
   <td bgcolor="#FFFFCC">Ginger Teddy<span class="tinyblack"> (Nov/Dec)</span></td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC"><div align="center">
      <input name="9003-GT" id="9003-GT" size="4" value="<?php if (isset($_SESSION['9003-GT'])) {  echo $_SESSION['9003-GT'] ;} ?>" readonly="true"/></div>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['8003-H']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">8003-H</td>
   <td bgcolor="#FFFFCC">Vanilla Heart <span class="tinyblack">(Feb)</span></td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC"><div align="center">
   <input name="8003-H" id="8003-H" size="4" value="<?php if (isset($_SESSION['8003-H'])) {  echo $_SESSION['8003-H'] ;} ?>" readonly="true"/></div>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['8003-B']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">8003-B</td>
   <td bgcolor="#FFFFCC">Vanilla Butterfly<span class="tinyblack"> (Mar/Apr/May)</span></td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC"><div align="center">
   <input name="8003-B" id="8003-B" size="4" value="<?php if (isset($_SESSION['8003-B'])) {  echo $_SESSION['8003-B'] ;} ?>" readonly="true"/></div>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['8002-ML']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">8002-ML</td>
   <td bgcolor="#FFFFCC">Vanilla Maple Leaf<span class="tinyblack"> (June)</span></td>
   <td bgcolor="#FFFFCC">Small, Bulk</td>
   <td bgcolor="#FFFFCC">96/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC"><div align="center">
   <input name="8002-ML" id="8002-ML" size="4" value="<?php if (isset($_SESSION['8002-ML'])) {  echo $_SESSION['8002-ML'] ;} ?>" readonly="true"/></div>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['IceDawgI']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC"><span class="tinyblack">Ice Dawg 1</span></td>
   <td bgcolor="#FFFFCC">Chocolate Chip</td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC"><div align="center">
      <input name="IceDawgI" id="IceDawgI" size="4" value="<?php if (isset($_SESSION['IceDawgI'])) {  echo $_SESSION['IceDawgI'] ;} ?>" readonly="true"/></div>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['IceDawgIV']))>0){ ?>

  <tr>
   <td bgcolor="#FFFFCC"><span class="tinyblack">Ice Dawg IV</span></td>
   <td bgcolor="#FFFFCC">Fudge Chip</td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC"><div align="center">
   <input name="IceDawgIV" id="IceDawgIV" size="4" value="<?php if (isset($_SESSION['IceDawgIV'])) {  echo $_SESSION['IceDawgIV'] ;} ?>" readonly="true"/></div>
   </td>
  </tr>
    <?php }?>
  <?php if (strlen(trim($_SESSION['GF-10']))>0){ ?>
  <tr>
   <td bgcolor="#CCFFFF">&nbsp;GF-10 </td>
   <td bgcolor="#CCFFFF">Gluten Free Chocolate Chip </td>
   <td bgcolor="#CCFFFF">&frac12; lb bag</td>
   <td bgcolor="#CCFFFF"><div align="left">225 gram </div></td>
   <td align="middle" valign="center" bgcolor="#CCFFFF"><div align="center">
     <input name="GF-10" id="GF-10" size ="4" value="<?php if (isset($_SESSION['GF-10'])) {  echo $_SESSION['GF-10'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['GF-15']))>0){ ?>
  <tr>
   <td bgcolor="#CCFFFF">&nbsp;GF-15 </td>
   <td bgcolor="#CCFFFF">Gluten Free Brownies</td>
   <td bgcolor="#CCFFFF">7 &frac12; &ldquo; pan</td>
   <td bgcolor="#CCFFFF"><div align="left">325 gram </div></td>
   <td align="middle" valign="center" bgcolor="#CCFFFF"><div align="center">
     <input name="GF-15" id="GF-15" size ="4" value="<?php if (isset($_SESSION['GF-15'])) {  echo $_SESSION['GF-15'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['GF-20']))>0){ ?>
  <tr>
   <td bgcolor="#CCFFFF">&nbsp;GF-20</td>
   <td bgcolor="#CCFFFF">Gluten Free Vanilla Cake</td>
   <td bgcolor="#CCFFFF">8 &rdquo; pan</td>
   <td bgcolor="#CCFFFF"><div align="left">450 gram </div></td>
   <td align="middle" valign="center" bgcolor="#CCFFFF"><div align="center">
     <input name="GF-20" id="GF-20" size ="4" value="<?php if (isset($_SESSION['GF-20'])) {  echo $_SESSION['GF-20'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['OASISApple']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFFF">&nbsp;OASIS </td>
   <td bgcolor="#FFFFFF">Apple Juice </td>
   <td bgcolor="#FFFFFF">200 ml tetra </td>
   <td bgcolor="#FFFFFF"><div align="left">30/case </div></td>
   <td align="center" valign="middle" bgcolor="#FFFFFF"><div align="center">
     <input name="OASISApple" type="text" id="OASISApple" size="4" value="<?php if (isset($_SESSION['OASISApple'])) {  echo $_SESSION['OASISApple'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['OASISWildberry']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFFF">&nbsp;OASIS </td>
   <td bgcolor="#FFFFFF">Wildberry Juice</td>
   <td bgcolor="#FFFFFF">200 ml tetra </td>
   <td bgcolor="#FFFFFF"><div align="left">30/case </div></td>
   <td align="center" valign="middle" bgcolor="#FFFFFF"><div align="center">
     <input name="OASISWildberry" type="text" id="OASISWildberry" size="4" value="<?php if (isset($_SESSION['OASISWildberry'])) {  echo $_SESSION['OASISWildberry'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['OASISTropical']))>0){ ?>
  <tr>
   <td bgcolor="#ffffff">&nbsp;OASIS </td>
   <td bgcolor="#ffffff">Seven Fruit Tropical Juice</td>
   <td bgcolor="#ffffff">200 ml tetra </td>
   <td bgcolor="#ffffff"><div align="left">30/case </div></td>
   <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
     <input name="OASISTropical" id="OASISTropical" size ="4" value="<?php if (isset($_SESSION['OASISTropical'])) {  echo $_SESSION['OASISTropical'] ;} ?>" readonly/>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['other']))>0){ ?>
  <tr>
   <td valign="top" bgcolor="#ffffff">Other items<br />
    (see left)<br />   </td>
   <td colspan="4" bgcolor="#ffffff"><div>
    <TEXTAREA name="other" id="other" cols="35"  readonly><?php if (isset($_SESSION['other'])) {  echo $_SESSION['other'] ;} ?></TEXTAREA>
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
  <tr>
   <td height="18" colspan="2" bgcolor="#ffffff"><div align="center"> <strong> --- All information is required 
    
    ---</strong></div></td>
   <td height="18" bgcolor="#ffffff">
   <?php if (isset($_SESSION['school2'])  and strlen(trim($_SESSION['school2']))>0 ) { ?>
            <font color="#003399">Contact Name</font>
            <?php } else { ?>
            <font color="#FF0000">Contact Name</font>
    <?php } ?>
	</td>
   <td height="18" colspan="2" bgcolor="#ffffff"><input name="school2" id="school2" value="<?php if (isset($_SESSION['school2'])) {  echo $_SESSION['school2'];} ?>" readonly/></td>
  </tr>
  <tr>
   <td height="18" bgcolor="#ffffff"><?php if (isset($_SESSION['school']) and strlen(trim($_SESSION['school']))>0 ) { ?>
            <font color="#003399">Name of School</font>
            <?php } else { ?>
            <font color="#FF0000">Name of School</font>
            <?php } ?></td>
   <td bgcolor="#ffffff"><input name="school" id="school" value="<?php if (isset($_SESSION['school'])) {  echo $_SESSION['school'];} ?>" readonly/></td>
   <td bgcolor="#ffffff">
      <?php if (isset($_SESSION['cemail']) and strlen(trim($_SESSION['cemail']))>0 and validEmail($_SESSION['cemail'])) { ?>
            <font color="#003399">Contact email</font>
            <?php } else { ?>
            <font color="#FF0000">Contact email</font>
    <?php } ?>

   </td>
   <td colspan="2" bgcolor="#ffffff"><input name="cemail" id="cemail" value="<?php if (isset($_SESSION['cemail'])) {  echo $_SESSION['cemail'];} ?>" readonly/></td>
  </tr>
  <tr>
   <td height="24" bgcolor="#ffffff">
      <?php if (isset($_SESSION['city']) and strlen(trim($_SESSION['city']))>0 ) { ?>
            <font color="#003399">Town/City</font>
            <?php } else { ?>
            <font color="#FF0000">Town/City</font>
    <?php } ?>

   </td>
   <td bgcolor="#ffffff"><input name="city" id="city" value="<?php if (isset($_SESSION['city'])) {  echo $_SESSION['city'];} ?>" readonly/></td>
   <td bgcolor="#ffffff">
   <?php if (strlen( trim($_SESSION['phone2']) . trim($_SESSION['phone1']) )>0) { ?>
            <font color="#003399">Phone 1</font>
            <?php } else { ?>
            <font color="#FF0000">Phone 1</font>
            <?php }  ?> 
   </td>
   <td colspan="2" bgcolor="#ffffff"><input name="phone1" id="phone1" value="<?php if (isset($_SESSION['phone1'])) {  echo $_SESSION['phone1'];} ?>" readonly/></td>
  </tr>
  <tr>
   <td height="18" bgcolor="#ffffff"><font color="#003399">Today's Date</font></td>
   <td bgcolor="#ffffff"><input name="datetoday" id="datetoday" value="<?php print date('M d Y H:i', strtotime('+1 hour'));?>" readonly/></td>
   <td bgcolor="#ffffff">
   <?php if (strlen( trim($_SESSION['phone2']) . trim($_SESSION['phone1']) )>0) { ?>
            <font color="#003399">Phone 2</font>
            <?php } else { ?>
            <font color="#FF0000">Phone 2</font>
            <?php }  ?> 
   </td>
   <td colspan="2" bgcolor="#ffffff"><input name="phone2" id="phone2" value="<?php if (isset($_SESSION['phone2'])) {  echo $_SESSION['phone2'];} ?>" readonly/></td>
  </tr>
  <tr>
   <td height="18" colspan="2" bgcolor="#ffffff">For Delivery Information: <A href="delivery.html" target=_blank>check our delivery 
    
    schedule to your area</a></td>
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
     <input name="deliverydate" id="deliverydate" value="<?php if (isset($_SESSION['deliverydate'])) {  echo $_SESSION['deliverydate'];} ?>" readonly/>
   </div></td>
  </tr>
  <tr>
   <td height="18" colspan="5" bgcolor="#ffffff"><div align="center" class="green"><strong>You 
    
    should receive a confirmation email, once you press<span class="red"> SUBMIT</span>. We 
    
    will also call you to confirm your order and amount due. If you 
    
    do not receive a confirmation email, or we have not confirmed 
    
    your order within 24 hours, 
    
    please call us immediately at 905-877-4216.</strong></div></td>
  </tr>
 </table> 
<p align="center"> 

          <label>

          <input type="submit" name="Submit" value="Yes! Go Ahead and Process Order!" />

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

          <input type="submit" name="Edit" value="Go Back to Add/Change items" />
         </label>
        </p>
   <p align="center" class="redbold">
<A onFocus="this.blur()" onClick="NewWindow(this.href,'Popup','750','550','yes','center'); return false" href="printorder.php">Click here for a Printer-Friendly Version of your Order</A> (Opens in a new window) </p>

 </td>
<td id="sidebar">
 <h2 align="center">order details </h2>
 <p>
    <A onFocus="this.blur()" onClick="NewWindow(this.href,'Popup','750','550','yes','center'); return false" href="PDF/Winter2010/T.C.'sMenuJan2010.pdf">Print T.C.'s Menu</A> (PDF) </p>
 <p align="center"><span class="green">For Delivery Times</span><br> 
  <A href="delivery.html" target=_blank>Check our delivery 
   
   schedule to your area</a></p>
 <p align="center"><span class="green">Products are available at our Factory Outlet,<span class="text"> 20 Armstrong Ave., Unit 1,
  Georgetown, ON</span> Monday to Friday, 9:00am to 5:00 pm from September to June.</span></p>
 <p align="center">&nbsp;</p> <p>&nbsp;</p></td>
</tr>
</table>

</form>
<table id="footerTable" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td id="footer"><div align="center">&copy; Copyright 2009 Terra Cotta Cookie Company. All Rights Reserved.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.maxmediagroup.com" target="_blank"> Design by Maxmedia Design Group Inc</a>.</div></td>
</tr>
</table>
</div>
</body>
</html>
<?php
/**
Validate an email address.
Provide email address (raw input)
Returns true if the email address has the email 
address format and the domain exists.
*/
function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if
(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // domain not found in DNS
         $isValid = false;
      }
   }
   return $isValid;
}

?>