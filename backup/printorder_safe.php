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
   <td height="18" bgcolor="#ffffff"><font color="#003399">Today's Date</font></td>
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
     <?php if (isset($_SESSION['T-1001'])) {  echo $_SESSION['T-1001'] ;} ?>
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
     <?php if (isset($_SESSION['T-4101'])) {  echo $_SESSION['T-4101'] ;} ?>
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
     <?php if (isset($_SESSION['T-10001'])) {  echo $_SESSION['T-10001'] ;} ?>
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
     <?php if (isset($_SESSION['1002-D'])) {  echo $_SESSION['1002-D'] ;} ?>
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
     <?php if (isset($_SESSION['3002-D'])) {  echo $_SESSION['3002-D'] ;} ?>
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
     <?php if (isset($_SESSION['4002-D'])) {  echo $_SESSION['4002-D'] ;} ?>
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
     <?php if (isset($_SESSION['5002-D'])) {  echo $_SESSION['5002-D'] ;} ?>
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
     <?php if (isset($_SESSION['6002-D'])) {  echo $_SESSION['6002-D'] ;} ?>
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
     <?php if (isset($_SESSION['V1003'])) {  echo $_SESSION['V1003'] ;} ?>
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
     <?php if (isset($_SESSION['V1103'])) {  echo $_SESSION['V1103'] ;} ?>
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
     <?php if (isset($_SESSION['V3003'])) {  echo $_SESSION['V3003'] ;} ?>
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
     <?php if (isset($_SESSION['V4003'])) {  echo $_SESSION['V4003'] ;} ?>
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
     <?php if (isset($_SESSION['V4103'])) {  echo $_SESSION['V4103'] ;} ?>"
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
     <?php if (isset($_SESSION['V5003'])) {  echo $_SESSION['V5003'] ;} ?>
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
     <?php if (isset($_SESSION['1003-D'])) {  echo $_SESSION['1003-D'] ;} ?>
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
     <?php if (isset($_SESSION['4003-D'])) {  echo $_SESSION['4003-D'] ;} ?>
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
     <?php if (isset($_SESSION['6003-D'])) {  echo $_SESSION['6003-D'] ;} ?>
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
     <?php if (isset($_SESSION['1004-D'])) {  echo $_SESSION['1004-D'] ;} ?>
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
     <?php if (isset($_SESSION['4004-D'])) {  echo $_SESSION['4004-D'] ;} ?>
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
     <?php if (isset($_SESSION['6004-D'])) {  echo $_SESSION['6004-D'] ;} ?>
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
     <?php if (isset($_SESSION['V1004'])) {  echo $_SESSION['V1004'] ;} ?>
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
     <?php if (isset($_SESSION['V1104'])) {  echo $_SESSION['V1104'] ;} ?>"
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
     <?php if (isset($_SESSION['V3004'])) {  echo $_SESSION['V3004'] ;} ?>
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
     <?php if (isset($_SESSION['V4004'])) {  echo $_SESSION['V4004'] ;} ?>
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
     <?php if (isset($_SESSION['V4104'])) {  echo $_SESSION['V4104'] ;} ?>
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
     <?php if (isset($_SESSION['V5004'])) {  echo $_SESSION['V5004'] ;} ?>
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
     <?php if (isset($_SESSION['DAWG-D'])) {  echo $_SESSION['DAWG-D'] ;} ?>
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
    <?php if (isset($_SESSION['DAWG-M'])) {  echo $_SESSION['DAWG-M'] ;} ?>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['8003-P']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">8003-P</td>
   <td bgcolor="#FFFFCC">Vanilla Pumpkin<span class="tinyblack"> (Oct)</span></td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC" >
  <?php if (isset($_SESSION['8003-P'])) {  echo $_SESSION['8003-P'] ;} ?>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['8003-S']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">8003-S</td>
   <td bgcolor="#FFFFCC">Vanilla Snowman<span class="tinyblack"> (Nov/Dec/Jan)</span></td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC">
   <?php if (isset($_SESSION['8003-S'])) {  echo $_SESSION['8003-S'] ;} ?>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['9003-GT']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">9003-GT</td>
   <td bgcolor="#FFFFCC">Ginger Teddy<span class="tinyblack"> (Nov/Dec)</span></td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC">
      <?php if (isset($_SESSION['9003-GT'])) {  echo $_SESSION['9003-GT'] ;} ?>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['8003-H']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">8003-H</td>
   <td bgcolor="#FFFFCC">Vanilla Heart <span class="tinyblack">(Feb)</span></td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC">
   <?php if (isset($_SESSION['8003-H'])) {  echo $_SESSION['8003-H'] ;} ?>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['8003-B']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">8003-B</td>
   <td bgcolor="#FFFFCC">Vanilla Butterfly<span class="tinyblack"> (Mar/Apr/May)</span></td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC">
   <?php if (isset($_SESSION['8003-B'])) {  echo $_SESSION['8003-B'] ;} ?>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['8002-ML']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC">8002-ML</td>
   <td bgcolor="#FFFFCC">Vanilla Maple Leaf<span class="tinyblack"> (June)</span></td>
   <td bgcolor="#FFFFCC">Small, Bulk</td>
   <td bgcolor="#FFFFCC">96/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC">
   <?php if (isset($_SESSION['8002-ML'])) {  echo $_SESSION['8002-ML'] ;} ?>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['IceDawgI']))>0){ ?>
  <tr>
   <td bgcolor="#FFFFCC"><span class="tinyblack">Ice Dawg 1</span></td>
   <td bgcolor="#FFFFCC">Chocolate Chip</td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC">
      <?php if (isset($_SESSION['IceDawgI'])) {  echo $_SESSION['IceDawgI'] ;} ?>
   </td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['IceDawgIV']))>0){ ?>

  <tr>
   <td bgcolor="#FFFFCC"><span class="tinyblack">Ice Dawg IV</span></td>
   <td bgcolor="#FFFFCC">Fudge Chip</td>
   <td bgcolor="#FFFFCC">Large, Wrapped</td>
   <td bgcolor="#FFFFCC">48/case</td>
   <td align="middle" valign="center" bgcolor="#FFFFCC">
   <?php if (isset($_SESSION['IceDawgIV'])) {  echo $_SESSION['IceDawgIV'] ;} ?>
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
     <?php if (isset($_SESSION['GF-10'])) {  echo $_SESSION['GF-10'] ;} ?>
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
     <?php if (isset($_SESSION['GF-15'])) {  echo $_SESSION['GF-15'] ;} ?>
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
     <?php if (isset($_SESSION['GF-20'])) {  echo $_SESSION['GF-20'] ;} ?>
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
     <?php if (isset($_SESSION['OASISApple'])) {  echo $_SESSION['OASISApple'] ;} ?>
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
     <?php if (isset($_SESSION['OASISWildberry'])) {  echo $_SESSION['OASISWildberry'] ;} ?>
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
     <?php if (isset($_SESSION['OASISTropical'])) {  echo $_SESSION['OASISTropical'] ;} ?>
   </div></td>
  </tr>
  <?php }?>
  <?php if (strlen(trim($_SESSION['other']))>0){ ?>
  <tr>
   <td valign="top" bgcolor="#ffffff">Other items<br />
    (see left)<br />   </td>
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
