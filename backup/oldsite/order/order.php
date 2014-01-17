<?php

	session_start();

?>	

<HTML>

<HEAD>

<TITLE>Terra Cotta Cookies: Order Form</TITLE>

<meta name="keywords" content="Terra, Terra Cotta Cookies, cookies, TC Cookies, fundraising, cookie dough, healthy cookies, healthy snacks, children’s snacks, healthy desserts, snacks, peanut free, nut free, schools, allergy, ice cream, fat, chocolate, holiday, desserts, student’s desserts, nutrition, frozen, shortbread, soya, Dr. Ben Feingold, natural ingredients, Toronto, Ontario, Georgetown, cookie delivery,WebHosting4Life" />

<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" />

  <meta http-equiv="Expires" CONTENT="0" />

  <meta http-equiv="Cache-Control" CONTENT="no-cache" />

  <meta http-equiv="Pragma" CONTENT="no-cache" />



<link href="../main.css" rel="stylesheet" type="text/css" />

</HEAD>

<BODY BGCOLOR=#ffffff background="images/bg_main_1400x1green.gif" LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH="0" MARGINHEIGHT="0" onLoad="javascript:history.go(1);">

<!-- ImageReady Slices (order.psd) -->

<table id="Table_01" width="771" height="2001" border="0" cellpadding="0" cellspacing="0">

	<tr>

		<td colspan="3" rowspan="2">

			<img src="images2/logo.gif" alt="" width="217" height="107" border="0" usemap="#Map3" /></td>

		<td colspan="3">

			<img src="images2/menu.gif" alt="" width="553" height="83" border="0" usemap="#Map" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="83" alt="" /></td>
	</tr>

	<tr>

		<td colspan="3" rowspan="2">

			<img src="images2/head.gif" alt="" width="553" height="67" border="0" usemap="#Map2" /></td>

<td>

			<img src="images2/spacer.gif" width="1" height="24" alt="" /></td>
	</tr>

	<tr>

		<td rowspan="2">

			<img src="images2/pizza.gif" width="114" height="237" alt="" /></td>

		<td colspan="2" rowspan="2">

			<img src="images2/pizza_right.gif" width="103" height="237" alt="" /></td>

		<td style="height: 43px">

			<img src="images2/spacer.gif" width="1" height="43" alt="" /></td>
	</tr>

	<tr>

		<td rowspan="10">

			<img src="images2/left.gif" width="29" height="816" alt="" /></td>

		<td width="513" rowspan="12" valign="top" background="images2/textarea1.gif"><br />

		 <form name="form1" method="post" action="OrderSendMail.php" id="form1">

        <div align="center"></div>

        <table width="98%"  border="0" class="text">
         <!--DWLayoutTable-->
         <tr>
          <td colspan="5"><div align="center"> <font color="#FF0000"><strong>Required 
           
           Information Missing (see fields in red below)</strong></font></div></td>
         </tr>
         <tr>
          <td width="10%"><p align="center">&nbsp;</p></td>
          <td width="30%"><p align="center"><strong>Product</strong></p></td>
          <td width="30%"><p align="center"><strong>Size</strong></p></td>
          <td width="10%"><p align="center"><strong>Pack</strong></p></td>
          <td width="8%"><p align="center"><strong>Order</strong></p></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff"><p>&nbsp;T-1001 </p></td>
          <td bgcolor="#ffffff"><p>Chocolate Chip</p></td>
          <td bgcolor="#ffffff"><p>Tiny, Bulk</p></td>
          <td bgcolor="#ffffff"><p align="center">288/case</p></td>
          <td align="middle" valign="center" bgcolor="#ffffff" class="text"><div align="center">
            <input name= "T-1001" size="4" value="<?php if (isset($_SESSION['T-1001'])) {  echo $_SESSION['T-1001'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff"><p>&nbsp;T-4101</p></td>
          <td bgcolor="#ffffff"><p>White Chocolate Fudge</p></td>
          <td bgcolor="#ffffff"><p>Tiny, Bulk</p></td>
          <td bgcolor="#ffffff"><p align="center">288/case</p></td>
          <td height="18" align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="T-4101" size ="4" value="<?php  echo $_SESSION['T-4101'] ;  ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff"><p>&nbsp;T-10001 </p></td>
          <td bgcolor="#ffffff"><p>White Chocolate</p></td>
          <td bgcolor="#ffffff"><p>Tiny, Bulk</p></td>
          <td bgcolor="#ffffff"><p align="center">288/case</p></td>
          <td height="18" align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="T-10001" size="4" value="<?php if (isset($_SESSION['T-10001'])) {  echo $_SESSION['T-10001'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ccffff"><p>&nbsp;1002-D </p></td>
          <td bgcolor="#ccffff"><p> Chocolate Chip DeLite </p></td>
          <td bgcolor="#ccffff"><p>Small, Bulk</p></td>
          <td bgcolor="#ccffff"><p align="center">96/case </p></td>
          <td height="18" align="middle" valign="center" bgcolor="#ccffff"><div align="center">
            <input name="1002-D" size="4" value="<?php if (isset($_SESSION['1002-D'])) {  echo $_SESSION['1002-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ccffff"><p>&nbsp;3002-D</p></td>
          <td bgcolor="#ccffff"><p>Oatmeal Raisin </p></td>
          <td bgcolor="#ccffff"><p>Small, Bulk</p></td>
          <td bgcolor="#ccffff"><p align="center">96/case </p></td>
          <td height="18" align="middle" valign="center" bgcolor="#ccffff"><div align="center">
            <input name="3002-D" size="4" value="<?php if (isset($_SESSION['3002-D'])) {  echo $_SESSION['3002-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ccffff">&nbsp;4002-D</td>
          <td bgcolor="#ccffff">Fudge Chip DeLite </td>
          <td bgcolor="#ccffff">Small, Bulk</td>
          <td bgcolor="#ccffff"><div align="center">96/case </div></td>
          <td height="18" align="middle" valign="center" bgcolor="#ccffff"><div align="center">
            <input name="4002-D" size="4" value="<?php if (isset($_SESSION['4002-D'])) {  echo $_SESSION['4002-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ccffff">&nbsp;5002-D </td>
          <td bgcolor="#ccffff"> Oatmeal Choc Chip Delite</td>
          <td bgcolor="#ccffff">Small, Bulk</td>
          <td bgcolor="#ccffff"><div align="center">96/case </div></td>
          <td height="18" align="middle" valign="center" bgcolor="#ccffff"><div align="center">
            <input name="5002-D" id="5002-D " size ="4" value="<?php if (isset($_SESSION['5002-D'])) {  echo $_SESSION['5002-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ccffff">&nbsp;6002-D</td>
          <td bgcolor="#ccffff">Oatmeal  DeLite</td>
          <td bgcolor="#ccffff">Small, Bulk</td>
          <td bgcolor="#ccffff"><div align="center">96/case </div></td>
          <td height="18" align="middle" valign="center" bgcolor="#ccffff"><div align="center">
            <input name="6002-D" id="6002-D" size="4" value="<?php if (isset($_SESSION['6002-D'])) {  echo $_SESSION['6002-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;1003</td>
          <td bgcolor="#ffffff">Chocolate Chip</td>
          <td bgcolor="#ffffff">Large, Wrapped </td>
          <td bgcolor="#ffffff"><div align="center">48/case</div></td>
          <td height="18" align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="1003" id="1003" size="4" value="<?php if (isset($_SESSION['V1003'])) { echo $_SESSION['V1003'];}?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;1103</td>
          <td bgcolor="#ffffff">Casey’s-Caramel &amp; Choc</td>
          <td bgcolor="#ffffff">Large, Wrapped </td>
          <td bgcolor="#ffffff"><div align="center">48/case </div></td>
          <td height="18" align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="1103" id="1103" size="4" value="<?php if (isset($_SESSION['V1103'])) {  echo $_SESSION['V1103'] ;} ?>" />
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;3003</td>
          <td bgcolor="#ffffff">Oatmeal Raisin <strong> </strong></td>
          <td bgcolor="#ffffff">Large, Wrapped</td>
          <td bgcolor="#ffffff"><div align="center">48/case </div></td>
          <td  align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="3003" id="3003" size="4" value="<?php if (isset($_SESSION['V3003'])) {  echo $_SESSION['V3003'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;4003 </td>
          <td bgcolor="#ffffff">Fudge Chip</td>
          <td bgcolor="#ffffff">Large, Wrapped </td>
          <td bgcolor="#ffffff"><div align="center">48/case </div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="4003" id="4003" size="4" value="<?php if (isset($_SESSION['V4003'])) {  echo $_SESSION['V4003'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;4103 </td>
          <td bgcolor="#ffffff">White Chunk Fudge </td>
          <td bgcolor="#ffffff">Large, Wrapped </td>
          <td bgcolor="#ffffff"><div align="center">48/case </div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="4103" id="4103 " size ="4" value="<?php if (isset($_SESSION['V4103'])) {  echo $_SESSION['V4103'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;5003 </td>
          <td bgcolor="#ffffff">Oatmeal Choc Chip <strong> </strong></td>
          <td bgcolor="#ffffff">Large, Wrapped</td>
          <td bgcolor="#ffffff"><div align="center">48/case </div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="5003" id="5003 " size ="4" value="<?php if (isset($_SESSION['V5003'])) {  echo $_SESSION['V5003'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ccffff">&nbsp;1003-D </td>
          <td bgcolor="#ccffff">Chocolate Chip DeLite </td>
          <td bgcolor="#ccffff">Large, Wrapped </td>
          <td bgcolor="#ccffff"><div align="center">48/case </div></td>
          <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
            <input name="1003-D" id="1003-D" size="4" value="<?php if (isset($_SESSION['1003-D'])) {  echo $_SESSION['1003-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ccffff">&nbsp;4003-D </td>
          <td bgcolor="#ccffff">Fudge Chip DeLite </td>
          <td bgcolor="#ccffff">Large, Wrapped </td>
          <td bgcolor="#ccffff"><div align="center">48/case</div></td>
          <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
            <input name="4003-D" id="4003-D" size="4" value="<?php if (isset($_SESSION['4003-D'])) {  echo $_SESSION['4003-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ccffff">&nbsp;6003-D</td>
          <td bgcolor="#ccffff">Oatmeal DeLite </td>
          <td bgcolor="#ccffff">Large, Wrapped</td>
          <td bgcolor="#ccffff"><div align="center">48/case</div></td>
          <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
            <input name="6003-D" id="6003-D" size="4" value="<?php if (isset($_SESSION['6003-D'])) {  echo $_SESSION['6003-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ccffff">&nbsp;1004-D</td>
          <td bgcolor="#ccffff">Chocolate Chip DeLite</td>
          <td bgcolor="#ccffff">Large, Bulk</td>
          <td bgcolor="#ccffff"><div align="center">48/case</div></td>
          <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
            <input name="1004-D" id="10004-D" size="4" value="<?php if (isset($_SESSION['1004-D'])) {  echo $_SESSION['1004-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ccffff">&nbsp;4004-D </td>
          <td bgcolor="#ccffff">Fudge Chip DeLite</td>
          <td bgcolor="#ccffff">Large, Bulk</td>
          <td bgcolor="#ccffff"><div align="center">48/case</div></td>
          <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
            <input name="4004-D" id="4004-D" size="4" value="<?php if (isset($_SESSION['4004-D'])) {  echo $_SESSION['4004-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ccffff">&nbsp;6004-D</td>
          <td bgcolor="#ccffff">Oatmeal  DeLite</td>
          <td bgcolor="#ccffff">Large, Bulk</td>
          <td bgcolor="#ccffff"><div align="center">48/case</div></td>
          <td align="middle" valign="center" bgcolor="#ccffff"><div align="center">
            <input name="6004-D" id="6004-D" size="4" value="<?php if (isset($_SESSION['6004-D'])) {  echo $_SESSION['6004-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;1004 </td>
          <td bgcolor="#ffffff">Chocolate Chip</td>
          <td bgcolor="#ffffff">Large, Bulk</td>
          <td bgcolor="#ffffff"><div align="center">48/case</div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="1004" id="1004 2" size ="4" value="<?php if (isset($_SESSION['V1004'])) {  echo $_SESSION['V1004'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;1104 </td>
          <td bgcolor="#ffffff">Casey’s- Caramel &amp; Choc </td>
          <td bgcolor="#ffffff">Large, Bulk</td>
          <td bgcolor="#ffffff"><div align="center">48/case</div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="1104" id="1104 " size ="4" value="<?php if (isset($_SESSION['V1104'])) {  echo $_SESSION['V1104'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;3004 </td>
          <td bgcolor="#ffffff">Oatmeal Raisin</td>
          <td bgcolor="#ffffff">Large, Bulk</td>
          <td bgcolor="#ffffff"><div align="center">48/case</div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="3004" id="3004 " size ="4" value="<?php if (isset($_SESSION['V3004'])) {  echo $_SESSION['V3004'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;4004 </td>
          <td bgcolor="#ffffff">Fudge Chip </td>
          <td bgcolor="#ffffff">Large, Bulk</td>
          <td bgcolor="#ffffff"><div align="center">48/case</div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="4004" id="4004 " size ="4" value="<?php if (isset($_SESSION['V4004'])) {  echo $_SESSION['V4004'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;4104</td>
          <td bgcolor="#ffffff">White Chunk Fudge</td>
          <td bgcolor="#ffffff">Large, Bulk</td>
          <td bgcolor="#ffffff"><div align="center">48/case</div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="4104" id="4104" size="4" value="<?php if (isset($_SESSION['V4104'])) {  echo $_SESSION['V4104'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;5004 </td>
          <td bgcolor="#ffffff"> Oatmeal Choc Chip</td>
          <td bgcolor="#ffffff">Large, Bulk</td>
          <td bgcolor="#ffffff"><div align="center">48/case</div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="5004" id="5004 " size ="4" value="<?php if (isset($_SESSION['V5004'])) {  echo $_SESSION['V5004'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;Dawg-D </td>
          <td bgcolor="#ffffff">DuneDawg (Rice Krispie Bar)</td>
          <td bgcolor="#ffffff">Large, Wrapped</td>
          <td bgcolor="#ffffff"><div align="center">48/case </div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="Dawg-D" id="Dawg-D " size ="4" value="<?php if (isset($_SESSION['Dawg-D'])) {  echo $_SESSION['Dawg-D'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;Dawg-M</td>
          <td bgcolor="#ffffff">MudDawg (Rice Krispie Bar with Chocolate)</td>
          <td bgcolor="#ffffff">Large, Wrapped</td>
          <td bgcolor="#ffffff"><div align="center">48/case </div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="Dawg-M" id="Dawg-M" size="4" value="<?php if (isset($_SESSION['Dawg-M'])) {  echo $_SESSION['Dawg-M'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#CCFFFF">&nbsp;GF-10 </td>
          <td bgcolor="#CCFFFF">Gluten Free Chocolate Chip </td>
          <td bgcolor="#CCFFFF">&frac12; lb bag</td>
          <td bgcolor="#CCFFFF"><div align="center">225 gram </div></td>
          <td align="middle" valign="center" bgcolor="#CCFFFF"><div align="center">
            <input name="GF-10" id="GF-10" size ="4" value="<?php if (isset($_SESSION['GF-10'])) {  echo $_SESSION['GF-10'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#CCFFFF">&nbsp;GF-15 </td>
          <td bgcolor="#CCFFFF">Gluten Free Brownies</td>
          <td bgcolor="#CCFFFF">7 &frac12; &ldquo; pan</td>
          <td bgcolor="#CCFFFF"><div align="center">325 gram </div></td>
          <td align="middle" valign="center" bgcolor="#CCFFFF"><div align="center">
            <input name="GF-15" id="GF-15" size ="4" value="<?php if (isset($_SESSION['GF-15'])) {  echo $_SESSION['GF-15'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#CCFFFF">&nbsp;GF-20</td>
          <td bgcolor="#CCFFFF">Gluten Free Vanilla Cake</td>
          <td bgcolor="#CCFFFF">8 &rdquo; pan</td>
          <td bgcolor="#CCFFFF"><div align="center">450 gram </div></td>
          <td align="middle" valign="center" bgcolor="#CCFFFF"><div align="center">
            <input name="GF-20" id="GF-20" size ="4" value="<?php if (isset($_SESSION['GF-20'])) {  echo $_SESSION['GF-20'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#FFFFFF">&nbsp;OASIS </td>
          <td bgcolor="#FFFFFF">Apple Juice </td>
          <td bgcolor="#FFFFFF">200 ml tetra </td>
          <td bgcolor="#FFFFFF"><div align="center">30/case </div></td>
          <td align="center" valign="middle" bgcolor="#FFFFFF"><div align="center">
            <input name="OASISApple" type="text" id="OASIS Apple" size="4" value="<?php if (isset($_SESSION['OASISApple'])) {  echo $_SESSION['OASISApple'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#FFFFFF">&nbsp;OASIS </td>
          <td bgcolor="#FFFFFF">Wildberry Juice </td>
          <td bgcolor="#FFFFFF">200 ml tetra </td>
          <td bgcolor="#FFFFFF"><div align="center">30/case </div></td>
          <td align="center" valign="middle" bgcolor="#FFFFFF"><div align="center">
            <input name="OASISWildberry" type="text" id="OASIS Wildberry" size="4" value="<?php if (isset($_SESSION['OASISWildberry'])) {  echo $_SESSION['OASISWildberry'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff">&nbsp;OASIS </td>
          <td bgcolor="#ffffff">Seven Fruit Tropical Juice</td>
          <td bgcolor="#ffffff">200 ml tetra </td>
          <td bgcolor="#ffffff"><div align="center">30/case </div></td>
          <td align="middle" valign="center" bgcolor="#ffffff"><div align="center">
            <input name="OASISTropical" id="OASIS Tropical" size ="4" value="<?php if (isset($_SESSION['OASISTropical'])) {  echo $_SESSION['OASISTropical'] ;} ?>"/>
          </div></td>
         </tr>
         <tr>
          <td valign="top" bgcolor="#ffffff">Other items<br />
           (see left)<br />          </td>
          <td colspan="4" bgcolor="#ffffff"><div>
           <textarea name=other cols=35><?php if (isset($_SESSION['other'])) {  echo $_SESSION['other'] ;} ?>
        </textarea>
          </div></td>
         </tr>
         <tr>
          <td bgcolor="#ffffff"></td>
          <td bgcolor="#ffffff"></td>
          <td bgcolor="#ffffff"></td>
          <td bgcolor="#ffffff"></td>
          <td bgcolor="#ffffff" ></td>
         </tr>
         <tr>
          <td height="18" colspan="2" bgcolor="#ffffff"><div align="center"> <font color="#cc0066"><strong> - Required information is missing
           
           -</strong></font></div></td>
          <td height="18" bgcolor="#ffffff"><?php if (isset($_SESSION['School2'])) { ?>
            <font color="#003399">Contact Name</font>
            <?php } else { ?>
            <font color="#FF0000">Contact Name</font>
            <?php } ?>          </td>
          <td height="18" colspan="2" bgcolor="#ffffff"><input name="School2" id="School2" value="<?php if (isset($_SESSION['School2'])) {  echo $_SESSION['School2'] ;} ?>"/></td>
         </tr>
         <tr>
          <td height="18" bgcolor="#ffffff"><?php if (isset($_SESSION['school'])) { ?>
            <font color="#003399">Name of School</font>
            <?php } else { ?>
            <font color="#FF0000">Name of School</font>
            <?php } ?>          </td>
          <td bgcolor="#ffffff"><input name="school" id="school" value="<?php if (isset($_SESSION['school'])) {  echo $_SESSION['school'];} ?>"/></td>
          <td bgcolor="#ffffff"><?php if (isset($_SESSION['cemail'])) { ?>
            <font color="#003399">Contact email</font></td>
          <?php } else  { ?>
          <font color="#FF0000">Contact email</font>
          <?php } ?>
          <td colspan="2" bgcolor="#ffffff"><input name="cemail" id="cemail" value="<?php if (isset($_SESSION['cemail'])) {  echo $_SESSION['cemail']; } ?>"/></td>
         </tr>
         <tr>
          <td height="24" bgcolor="#ffffff"><?php if (isset($_SESSION['city'])) { ?>
            <font color="#003399">Town/City</font></td>
          <?php } else  { ?>
          <font color="#FF0000">Town/City</font>
          <?php }  ?>
          <td bgcolor="#ffffff"><input name="city" id="city" value="<?php if (isset($_SESSION['city'])) {  echo $_SESSION['city']; }?>"/></td>
          <td bgcolor="#ffffff"><?php if (strlen( trim($_SESSION['phone2']) . trim($_SESSION['phone1']) )>0) { ?>
            <font color="#003399">Phone 1</font>
            <?php } else { ?>
            <font color="#FF0000">Phone 1</font>
            <?php }  ?>          </td>
          <td colspan="2" bgcolor="#ffffff"><input name="phone1" id="phone1" value="<?php if (isset($_SESSION['phone1'])) {  echo $_SESSION['phone1']; } ?>"/></td>
         </tr>
         <tr>
          <td height="18" bgcolor="#ffffff"><font color="#003399">Today`s Date</font></td>
          <td bgcolor="#ffffff"><input name="Date Today" id="datetoday" value="<?php 

			print date('D, d M Y H:i:s T');

			?>"/></td>
          <td bgcolor="#ffffff"><?php if  (strlen(trim($_SESSION['phone2']) . trim($_SESSION['phone1']))>0) { ?>
            <font color="#003399">Phone 2</font>
            <?php } else { ?>
            <font color="#FF0000">Phone 2</font>
            <?php } ?>          </td>
          <td colspan="2" bgcolor="#ffffff"><input name="phone2" id="phone2" value="<?php if (isset($_SESSION['phone2'])) {  echo $_SESSION['phone2'];} ?>"/></td>
         </tr>
         <tr>
          <td height="18" colspan="2" bgcolor="#ffffff">For Delivery Information: <a href="../delivery/delivery.html" target=_blank>check our delivery 
           
           schedule to your area</a></td>
          <td align="middle" bgcolor="#ffffff"><div align="left">
            <?php if (strlen($_SESSION['DeliveryDate'])>0 ) {?>
            <font color="#003399">Delivery 
             
             Date</font>
            <?  } else { ?>
            <font color="#FF0000">Delivery 
             
             Date</font>
            <? }?>
          </div></td>
          <td colspan="2" align="middle" bgcolor="#ffffff"><div align="left">
            <input name="DeliveryDate" id="DeliveryDate" />
          </div></td>
         </tr>
         <tr>
          <td height="18" colspan="5" bgcolor="#ffffff"><div align="center"><strong><font color="#cc0066">You 
           
           should receive a confirmation email, once you press SUBMIT. We 
           
           will also call you to confirm your order and amount due. If you 
           
           do not receive a confirmation email, or we have not confirmed 
           
           your order within 24 hours, <br />
           please call us immediately at 905-877-4216.</font></strong></div></td>
         </tr>
        </table>
       <p align="center"> 

          <label>

          <input type="submit" name="Submit" value="Submit Order" />

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

          <input type="reset" name="Submit2" value="Reset Form" />
         </label>
        </p>
      </form> </td>

		<td rowspan="11">

			<img src="images2/pic1.gif" width="11" height="1148" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="194" alt="" /></td>
	</tr>

	<tr>

		<td colspan="3">

			<img src="images2/hot.gif" width="217" height="36" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="36" alt="" /></td>
	</tr>

	<tr>

		<td colspan="2">

			<img src="images2/eggs.gif" width="131" height="175" alt="" /></td>

		<td>

			<img src="images2/eggs_right.gif" width="86" height="175" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="175" alt="" /></td>
	</tr>

	<tr>

		<td colspan="3">

			<img src="images2/customer.gif" width="217" height="68" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="68" alt="" /></td>
	</tr>

	<tr>

		<td colspan="3">

			<img src="images2/textbox1.gif" width="217" height="19" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="19" alt="" /></td>
	</tr>

	<tr>

		<td colspan="3">

			<img src="images2/box.gif" width="217" height="24" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="24" alt="" /></td>
	</tr>

	<tr>

		<td colspan="3">

			<img src="images2/textbox2.gif" width="217" height="18" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="18" alt="" /></td>
	</tr>

	<tr>

		<td colspan="3" background="images2/box2.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text">&nbsp;&nbsp;<A href="../delivery/delivery.html" target=_blank>Click 

      here</a> for Delivery Schedule</span></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="88" alt="" /></td>
	</tr>

	<tr>

		<td colspan="3">

			<img src="images2/dynamic.gif" width="217" height="28" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="28" alt="" /></td>
	</tr>

	<tr>

		<td colspan="3" rowspan="3">

			<img src="images2/order_18.gif" alt="" width="217" height="1200" border="0" usemap="#Map4" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="166" alt="" /></td>
	</tr>

	<tr>

		<td rowspan="2">

			<img src="images2/order_19.gif" width="29" height="1034" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="332" alt="" /></td>
	</tr>

	<tr>

		<td>

			<img src="images2/order_20.gif" width="11" height="702" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="1" height="702" alt="" /></td>
	</tr>

	<tr>

		<td>

			<img src="images2/spacer.gif" width="114" height="1" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="17" height="1" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="86" height="1" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="29" height="1" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="513" height="1" alt="" /></td>

		<td>

			<img src="images2/spacer.gif" width="11" height="1" alt="" /></td>

		<td></td>
	</tr>
</table>

<!-- End ImageReady Slices -->



<map name="Map"><area shape="rect" coords="11,44,77,67" href="../about/about.html" alt="About Us"/>

<area shape="rect" coords="91,43,164,66" href="../products/products.html" alt="Products"/>

<area shape="rect" coords="173,41,253,66" href="#" /><area shape="rect" coords="267,43,331,66" href="order.html" alt="Order"/>

<area shape="rect" coords="350,43,435,67" href="../delivery/delivery.html"/>

<area shape="rect" coords="448,42,533,67" href="../fundraising/fundraising.html" alt="Fun raising"/>

</map>

<map name="Map2"><area shape="rect" coords="338,28,526,56" href="../pdf/T.C.'sMenuSept08.pdf" target="_blank"/>

</map>

<map name="Map3"><area shape="rect" coords="163,2,210,18" href="../index.html" />

</map>

<map name="Map4"><area shape="rect" coords="32,19,203,118" href="../products/products.html" alt="Products" />

<area shape="rect" coords="21,205,203,320" href="../fundraising/fundraising.html" />

</map>

<script language="JavaScript">

document.form1.datetoday.value=Date();

</script>

</body>

</html>