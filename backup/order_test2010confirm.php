<?php

	session_start();
	   		$_SESSION['1002-D'] = $_POST['1002-D'] ;
	   		$_SESSION['3002-D'] = $_POST['3002-D'] ;
	   		$_SESSION['4002-D'] = $_POST['4002-D'] ;
	   		$_SESSION['5002-D'] = $_POST['5002-D'] ;
	   		$_SESSION['6002-D'] = $_POST['6002-D'] ;

	   		$_SESSION['1003-D'] = $_POST['1003-D'] ;
	   		$_SESSION['3003-D'] = $_POST['3003-D'] ;
	   		$_SESSION['4003-D'] = $_POST['4003-D'] ;
	   		$_SESSION['5003-D'] = $_POST['5003-D'] ;
	   		$_SESSION['6003-D'] = $_POST['6003-D'] ;

	   		$_SESSION['1004-D'] = $_POST['1004-D'] ;
	   		$_SESSION['3004-D'] = $_POST['3004-D'] ;
	   		$_SESSION['4004-D'] = $_POST['4004-D'] ;
	   		$_SESSION['5004-D'] = $_POST['5004-D'] ;			   	   		
	   		$_SESSION['6004-D'] = $_POST['6004-D'] ;

	   		$_SESSION['T-1001'] = $_POST['T-1001'] ;
			$_SESSION['T-4101'] = $_POST['T-4101'] ;
	   		$_SESSION['T-10001'] = $_POST['T-10001'] ;
			$_SESSION['V1003'] = $_POST['1003'] ;
			$_SESSION['V1103'] = $_POST['1103'] ;
//	   		$_SESSION['1203'] = $_POST['1203'] ;
	   		//$_SESSION['V3003'] = $_POST['3003'] ;
	   		//$_SESSION['V4003'] = $_POST['4003'] ;
	   		$_SESSION['V4103'] = $_POST['4103'] ;	   		
	   		//$_SESSION['V1003'] = $_POST['1003'] ;
	   		//$_SESSION['V5003'] = $_POST['5003'] ;	   		
//	   		$_SESSION['4103'] = $_POST['4103'] ;
//	   		$_SESSION['5003'] = $_POST['5003'] ;
	   		$_SESSION['V1004'] = $_POST['1004'] ;
	   		$_SESSION['V1104'] = $_POST['1104'] ;
	   		//$_SESSION['V3004'] = $_POST['3004'] ;
	   		//$_SESSION['V4004'] = $_POST['4004'] ;
	   		$_SESSION['V4104'] = $_POST['4104'] ;
	   		$_SESSION['V5004'] = $_POST['5004'] ;
//	   		$_SESSION['1204'] = $_POST['1204'] ;
	   		$_SESSION['V7002'] = $_POST['7002'] ;
	   		$_SESSION['V7102'] = $_POST['7102'] ;
	   		$_SESSION['V7003'] = $_POST['7003'] ;
	   		$_SESSION['V7103'] = $_POST['7103'] ;
	   		$_SESSION['V7004'] = $_POST['7004'] ;
	   		$_SESSION['V7104'] = $_POST['7104'] ;
	   		$_SESSION['DAWG-D'] = $_POST['Dawg-D'] ;
	   		$_SESSION['DAWG-M'] = $_POST['Dawg-M'] ;
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
	   		$_SESSION['GF-24'] = $_POST['GF-24'] ;				
			$_SESSION['GF-26'] = $_POST['GF-26'] ;						
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
				$extra = 'order_testSept2010.php';
				header("Location: http://$host$uri/$extra");
				
		    	}

}
?>	

<?php

	session_start();

?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
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
<div id="logodiv"><img src="images/TC-wordmarkcol-200.jpg" alt="Terra Cotta Cookie Company" width="200" height="110"></div></td>
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
<form name="form1" method="post" action="ordersubmit_Sept2010.php" id="form1">
 <table width="550"  border="0" align="center" class="columns">
  <!--DWLayoutTable-->
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
     <INPUT name= "1002-D" id="1002-D" size="4" value="<?php if (isset($_SESSION['1002-D'])) {  echo $_SESSION['1002-D'] ;} ?>"  readonly />
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
     <input name="3002-D" id="3002-D" size ="4" value="<?php if (isset($_SESSION['3002-D'])) {  echo $_SESSION['3002-D'] ;} ?>"  readonly />
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
     <input name="4002-D" id="4002-D" size="4" value="<?php if (isset($_SESSION['4002-D'])) {  echo $_SESSION['4002-D'] ;} ?>"  readonly />
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
     <input name="5002-D" id="5002-D" size="4" value="<?php if (isset($_SESSION['5002-D'])) {  echo $_SESSION['5002-D'] ;} ?>"  readonly />
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
     <input name="6002-D" id="6002-D" size="4"  value="<?php if (isset($_SESSION['6002-D'])) {  echo $_SESSION['6002-D'] ;} ?>"  readonly />
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
     <input name="1003-D" id="1003-D" size="4" value="<?php if (isset($_SESSION['1003-D'])) {  echo $_SESSION['1003-D'] ;} ?>"  readonly />
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
     <input name="3003-D" id="3003-D " size ="4" value="<?php if (isset($_SESSION['3003-D'])) {  echo $_SESSION['3003-D'] ;} ?>" readonly />
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
     <input name="4003-D" id="4003-D" size="4" value="<?php if (isset($_SESSION['4003-D'])) {  echo $_SESSION['4003-D'] ;} ?>" readonly />
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
     <input name="5003-D" id="5003-D" size="4" value="<?php if (isset($_SESSION['5003-D'])) {  echo $_SESSION['5003-D'] ;} ?>" readonly />
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
     <input name="6003-D" id="6003-D" size="4" value="<?php if (isset($_SESSION['6003-D'])) {  echo $_SESSION['6003-D'] ;} ?>" readonly />
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
     <input name="1004-D" id="10004-D" size="4" value="<?php if (isset($_SESSION['1004-D'])) {  echo $_SESSION['1004-D'] ;} ?>" readonly />
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
     <input name="3004-D" id="3004-D" size="4" value="<?php if (isset($_SESSION['3004-D'])) {  echo $_SESSION['3004-D'] ;} ?>" readonly />
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
     <input name="4004-D" id="4004-D" size="4" value="<?php if (isset($_SESSION['4004-D'])) {  echo $_SESSION['4004-D'] ;} ?>" readonly />
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
     <input name="5004-D" id="5004-D" size ="4" value="<?php if (isset($_SESSION['5004-D'])) {  echo $_SESSION['5004-D'] ;} ?>" readonly />
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
     <input name="6004-D" id="6004-D" size ="4" value="<?php if (isset($_SESSION['6004-D'])) {  echo $_SESSION['6004-D'] ;} ?>" readonly />
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
     <input name="T-1001" id="T-1001" size ="4" value="<?php if (isset($_SESSION['T-1001'])) {  echo $_SESSION['T-1001'] ;} ?>"  readonly />
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
     <input name="T-4101" id="T-4101" size ="4" value="<?php if (isset($_SESSION['T-4101'])) {  echo $_SESSION['T-4101'] ;} ?>" readonly />
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
     <input name="T-10001" id="T-10001 " size ="4" value="<?php if (isset($_SESSION['T-10001'])) {  echo $_SESSION['T-10001'] ;} ?>" readonly />
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
     <input name="1003" id="1003" size="4" value="<?php if (isset($_SESSION['V1003'])) {  echo $_SESSION['V1003'] ;} ?>" readonly />
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
     <input name="1103" id="1103 " size ="4" value="<?php if (isset($_SESSION['V1103'])) {  echo $_SESSION['V1103'] ;} ?>" readonly />
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
     <input name="4103" id="4103 " size ="4" value="<?php if (isset($_SESSION['V4103'])) {  echo $_SESSION['V4103'] ;} ?>" readonly />
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
     <input name="1004" id="1004" size="4" value="<?php if (isset($_SESSION['V1004'])) {  echo $_SESSION['V1004'] ;} ?>" readonly />
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
   <input name="1104" id="1104" size ="4" value="<?php if (isset($_SESSION['V1104'])) {  echo $_SESSION['V1104'] ;} ?>" readonly /></div>
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
   <input name="4104" id="4104" size ="4" value="<?php if (isset($_SESSION['V4104'])) {  echo $_SESSION['V4104'] ;} ?>" readonly /></div>
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
   <input name="Dawg-D" id="Dawg-D" size ="4" value="<?php if (isset($_SESSION['DAWG-D'])) {  echo $_SESSION['DAWG-D'] ;} ?>" readonly /></div>
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
   <input name="Dawg-M" id="Dawg-M" size ="4" value="<?php if (isset($_SESSION['DAWG-M'])) {  echo $_SESSION['DAWG-M'] ;} ?>" readonly /></div>
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
   <input name="8003-P" id="8003-P" size ="4" value="<?php if (isset($_SESSION['8003-P'])) {  echo $_SESSION['8003-P'] ;} ?>" readonly /></div>
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
   <input name="8003-S" id="8003-S" size ="4" value="<?php if (isset($_SESSION['8003-S'])) {  echo $_SESSION['8003-S'] ;} ?>" readonly /></div>
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
   <input name="9003-GT" id="9003-GT" size ="4" value="<?php if (isset($_SESSION['9003-GT'])) {  echo $_SESSION['9003-GT'] ;} ?>" readonly /></div>
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
     <input name="8003-H" id="8003-H" size ="4" value="<?php if (isset($_SESSION['8003-H'])) {  echo $_SESSION['8003-H'] ;} ?>" readonly /></div>
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
     <input name="8003-B" id="8003-B" size ="4" value="<?php if (isset($_SESSION['8003-B'])) {  echo $_SESSION['8003-B'] ;} ?>" readonly />
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
     <input name="IceDawgI" id="IceDawgI" size ="4" value="<?php if (isset($_SESSION['IceDawgI'])) {  echo $_SESSION['IceDawgI'] ;} ?>" readonly />
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
     <input name="IceDawgIV" type="text" id="IceDawgIV" size="4" value="<?php if (isset($_SESSION['IceDawgIV'])) {  echo $_SESSION['IceDawgIV'] ;} ?>" readonly />
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
     <input name="GF-10" type="text" id="GF-10" size="4" value="<?php if (isset($_SESSION['GF-10'])) {  echo $_SESSION['GF-10'] ;} ?>" readonly />
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
     <input name="GF-15" id="GF-15" size ="4" value="<?php if (isset($_SESSION['GF-15'])) {  echo $_SESSION['GF-15'] ;} ?>" readonly />
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
     <input name="GF-24" id="GF-24" size ="4"  value="<?php if (isset($_SESSION['GF-24'])) {  echo $_SESSION['GF-24'] ;} ?>" readonly />
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
     <input name="GF-26" id="GF-26" size ="4" value="<?php if (isset($_SESSION['GF-26'])) {  echo $_SESSION['GF-26'] ;} ?>" readonly />
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
     <input name="OASISApple" type="text" id="OASISApple" size="4" value="<?php if (isset($_SESSION['OASISApple'])) {  echo $_SESSION['OASISApple'] ;} ?>" readonly />
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
     <input name="OASISWildberry" type="text" id="OASISWildberry" size="4" value="<?php if (isset($_SESSION['OASISWildberry'])) {  echo $_SESSION['OASISWildberry'] ;} ?>" readonly />
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
        <input name="OASISTropical" id="OASISTropical" size ="4" value="<?php if (isset($_SESSION['OASISTropical'])) {  echo $_SESSION['OASISTropical'] ;} ?>" readonly />
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
    <TEXTAREA name="other" id="other" cols="35" readonly ><?php if (isset($_SESSION['other'])) {  echo $_SESSION['other'] ;} ?></TEXTAREA>
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
  <tr>
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
 <p>&nbsp;</p>
<p align="center"> 

          <label>

          <input type="submit" name="Submit" value="Yes! Go Ahead and Process Order!" />

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

          <input type="submit" name="Edit" value="Go Back to Add/Change items" />
         </label>
        </p>
   <p align="center" class="redbold">
<A onFocus="this.blur()" onClick="NewWindow(this.href,'Popup','750','550','yes','center'); return false" href="printorder_Sept2010.php" >Click here for a Printer-Friendly Version of your Order</A> (Opens in a new window) </p>

 </td>
<td id="sidebar">
 <h2 align="center">order details </h2>
 <p>
    <A onFocus="this.blur()" onClick="NewWindow(this.href,'Popup','750','550','yes','center'); return false" href="PDF/Winter2010/T.C.'sMenuJan2010.pdf"  >Print T.C.'s Menu</A> (PDF) </p>
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
<script language="JavaScript">
var d = new Date();
var m_names = new Array("January", "February", "March", 
"April", "May", "June", "July", "August", "September", 
"October", "November", "December");

var curr_date = d.getDate();
var curr_month = d.getMonth();
var curr_year = d.getFullYear();
var curr_hour = d.getHours();
var curr_min = d.getMinutes();

document.form1.datetoday.value=m_names[curr_month]+" "+ curr_date + " " +  
curr_year+" "+curr_hour+":"+curr_min;


</script>

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