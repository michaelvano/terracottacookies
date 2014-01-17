<HTML>
	<HEAD>
		<TITLE>Terra Cotta Cookies: Order Form</TITLE>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
		  <meta http-equiv="Expires" CONTENT="0">
  <meta http-equiv="Cache-Control" CONTENT="no-cache">
  <meta http-equiv="Pragma" CONTENT="no-cache">

		<link href="../main.css" rel="stylesheet" type="text/css">
	</HEAD>
	<BODY BGCOLOR="#FFFFFF" background="images/bg_main_1400x1green.gif" LEFTMARGIN="0" TOPMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">
		<!-- ImageReady Slices (order.psd) -->
		<TABLE WIDTH="771" BORDER="0" CELLPADDING="0" CELLSPACING="0">
			<TR>
				<TD COLSPAN="3" ROWSPAN="2">
					<a href="../index.html"><IMG SRC="images/logo.gif" ALT="Back to home page" WIDTH="217" HEIGHT="107" border="0"></a></TD>
				
    <TD COLSPAN="3"> <IMG SRC="images/menu.gif" ALT="" WIDTH="553" HEIGHT="83" border="0" usemap="#Map3"></TD>
				<TD width="10">
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="83" ALT=""></TD>
			</TR>
			<TR>
				<TD COLSPAN="3" ROWSPAN="2">
					<IMG SRC="images/head.gif" WIDTH="553" HEIGHT="67" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="24" ALT=""></TD>
			</TR>
			<TR>
				
    <TD width="114" ROWSPAN="3"> <IMG SRC="images/pizza.gif" ALT="" WIDTH="114" HEIGHT="237" border="0"></TD>
				<TD COLSPAN="2" ROWSPAN="3">
					<IMG SRC="images/pizza_right.gif" ALT="" WIDTH="103" HEIGHT="237" border="0"></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="43" ALT=""></TD>
			</TR>
			<TR>
				<TD width="71">
					<IMG SRC="images/left.gif" WIDTH="71" HEIGHT="171" ALT=""></TD>
				<TD COLSPAN="2" ROWSPAN="14" valign="top" background="images/textarea1.gif"><form name="form1" method="post" action="OrderSendMail.asp">
        <img src="images/spacer.gif" width="70" height="8"> 
        <table width="98%" border="0" class="text">
          <!--DWLayoutTable-->
          <tr> 
            <td colspan="5"> <div align="center"> <font color="#FF0000"><strong>Required 
                Information Missing (see fields in red below)</strong></font></div></td>
          </tr>
          <tr bgcolor="#CCFFCC"> 
            <td width="63"><p align="left"><strong>Code</strong></p></td>
            <td width="100"><p><strong>Product</strong></p></td>
            <td width="126"><p align="left"><strong>Size</strong></p></td>
            <td width="60"><p align="center"><strong>Pack</strong></p></td>
            <td width="59"><p align="center"><strong>Order</strong></p></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td><p>T-1001 </p></td>
            <td><p>Chocolate Chip</p></td>
            <td><p>Tiny, Bulk</p></td>
            <td><p align="center">288/case</p></td>
            <td align="center" valign="middle" class="text"> <div align="center"> 
                <input name="T-1001" size="4" value="<%if len(Trim(Session("T-1001")))>0 then  Response.Write Session("T-1001") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td><p>T-4101</p></td>
            <td><p>White Chocolate Fudge</p></td>
            <td><p>Tiny, Bulk</p></td>
            <td><p align="center">288/case</p></td>
            <td height="18" align="center" valign="middle"> <div align="center"> 
                <input name="T-4101" type="text" id="white choc chip" size="4" value="<%if len(Trim(Session("T-4101")))>0 then  Response.Write Session("T-4101") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td><p>T-10001 </p></td>
            <td><p>White Chocolate</p></td>
            <td><p>Tiny, Bulk</p></td>
            <td><p align="center">288/case</p></td>
            <td height="18" align="center" valign="middle"> <div align="center"> 
                <input name="T-10001" type="text" size="4" value="<%if len(Trim(Session("T-10001")))>0 then  Response.Write Session("T-10001") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td bgcolor="#CCFFFF"><p>1002-D </p></td>
            <td bgcolor="#CCFFFF"><p> Chocolate Chip DeLite </p></td>
            <td bgcolor="#CCFFFF"><p>30g, Bulk </p></td>
            <td bgcolor="#CCFFFF"><p align="center">96/case </p></td>
            <td height="18" align="center" valign="middle" bgcolor="#CCFFFF"><div align="center"> 
                <input name="1002-D" type="text" size="4" value="<%if len(Trim(Session("1002-D")))>0 then  Response.Write Session("1002-D") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td bgcolor="#CCFFFF"><p>3002-D</p></td>
            <td bgcolor="#CCFFFF"><p>Oatmeal Raisin </p></td>
            <td bgcolor="#CCFFFF"><p>30g, Bulk <strong>&quot;B&quot;</strong></p></td>
            <td bgcolor="#CCFFFF"><p align="center">96/case </p></td>
            <td height="18" align="center" valign="middle" bgcolor="#CCFFFF"><div align="center"> 
                <input name="3002-D" type="text" size="4" value="<%if len(Trim(Session("3002-D")))>0 then  Response.Write Session("3002-D") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td bgcolor="#CCFFFF"><p>4002-D</p></td>
            <td bgcolor="#CCFFFF"><p>Fudge Chip DeLite </p></td>
            <td bgcolor="#CCFFFF"><p>30g, Bulk </p></td>
            <td bgcolor="#CCFFFF"><p align="center">96/case </p></td>
            <td height="18" align="center" valign="middle" bgcolor="#CCFFFF"><div align="center"> 
                <input name="4002-D" type="text" size="4" value="<%if len(Trim(Session("4002-D")))>0 then  Response.Write Session("4002-D") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td bgcolor="#CCFFFF">5002-D </td>
            <td bgcolor="#CCFFFF"> Oatmeal Choc Chip Delite</td>
            <td bgcolor="#CCFFFF">30g, Bulk <strong>&quot;B&quot;</strong></td>
            <td bgcolor="#CCFFFF"><div align="center">96/case </div></td>
            <td height="18" align="center" valign="middle" bgcolor="#CCFFFF"><div align="center"> 
                <input name="5002-D" type="text" id="5002-D " size="4" value="<%if len(Trim(Session("5002-D")))>0 then  Response.Write Session("5002-D") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td bgcolor="#CCFFFF">6002-D</td>
            <td bgcolor="#CCFFFF">Oatmeal Apple DeLite &quot;NEW&quot;</td>
            <td bgcolor="#CCFFFF">30g, Bulk<strong> &quot;B&quot;</strong></td>
            <td bgcolor="#CCFFFF"><div align="center">96/case </div></td>
            <td height="18" align="center" valign="middle" bgcolor="#CCFFFF"> 
              <input name="6002-D" type="text" id="6002-D" size="4" value="<%if len(Trim(Session("6002-D")))>0 then  Response.Write Session("6002-D") end if %>"> 
            </td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>1003 </td>
            <td>Chocolate Chip</td>
            <td>Large, Wrapped </td>
            <td><div align="center">48/case </div></td>
            <td height="18" align="center" valign="middle"><div align="center"> 
                <input name="1003" type="text" id="1003 " size="4" value="<%if len(Trim(Session("1003")))>0 then  Response.Write Session("1003") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>1103</td>
            <td>Casey&#8217;s-Caramel &amp; Choc</td>
            <td>Large, Wrapped </td>
            <td><div align="center">48/case </div></td>
            <td height="18" align="center" valign="middle"><div align="center"> 
                <input name="1103" type="text" id="1103" size="4" value="<%if len(Trim(Session("1103")))>0 then  Response.Write Session("1103") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>1203</td>
            <td> Choc Chip w &#8220;Attitude&#8221; </td>
            <td>Large, Wrapped </td>
            <td><div align="center">48/case </div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="1203" type="text" id="1203" size="4" value="<%if len(Trim(Session("1203")))>0 then  Response.Write Session("1203") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>3003</td>
            <td>Oatmeal Raisin</td>
            <td>Large, Wrapped <strong>&quot;B&quot;</strong></td>
            <td><div align="center">48/case </div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="3003" type="text" id="3003" size="4" value="<%if len(Trim(Session("3003")))>0 then  Response.Write Session("3003") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>4003 </td>
            <td>Fudge Chip</td>
            <td>Large, Wrapped </td>
            <td><div align="center">48/case </div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="4003" type="text" id="4003" size="4" value="<%if len(Trim(Session("4003")))>0 then  Response.Write Session("4003") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>4103 </td>
            <td>White Chunk Fudge </td>
            <td>Large, Wrapped </td>
            <td><div align="center">48/case </div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="4103" type="text" id="4103 " size="4" value="<%if len(Trim(Session("4103")))>0 then  Response.Write Session("4103") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>5003 </td>
            <td>Oatmeal Choc Chip</td>
            <td>Large, Wrapped <strong>&quot;B&quot;</strong></td>
            <td><div align="center">48/case </div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="5003" type="text" id="5003 " size="4" value="<%if len(Trim(Session("5003")))>0 then  Response.Write Session("5003") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td bgcolor="#CCFFFF">1003-D </td>
            <td bgcolor="#CCFFFF">Chocolate Chip DeLite </td>
            <td bgcolor="#CCFFFF">Large, Wrapped </td>
            <td bgcolor="#CCFFFF"><div align="center">48/case </div></td>
            <td height="18" align="center" valign="middle" bgcolor="#CCFFFF"><div align="center"> 
                <input name="1003-D" type="text" id="1003-D " size="4" value="<%if len(Trim(Session("1003-D")))>0 then  Response.Write Session("1003-D") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td bgcolor="#CCFFFF">4003-D </td>
            <td bgcolor="#CCFFFF">Fudge Chip DeLite </td>
            <td bgcolor="#CCFFFF">Large, Wrapped </td>
            <td bgcolor="#CCFFFF"><div align="center">48/case </div></td>
            <td align="center" valign="middle" bgcolor="#CCFFFF"><div align="center"> 
                <input name="4003-D" type="text" id="4003-D " size="4" value="<%if len(Trim(Session("4003-D")))>0 then  Response.Write Session("4003-D") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td bgcolor="#CCFFFF">6003-D</td>
            <td bgcolor="#CCFFFF">Oatmeal Apple DeLite &quot;NEW&quot;</td>
            <td bgcolor="#CCFFFF">Large, Wrapped <strong> &quot;B&quot;</strong></td>
            <td bgcolor="#CCFFFF"><div align="center">48/case</div></td>
            <td align="center" valign="middle" bgcolor="#CCFFFF"> <input name="6003-D" type="text" id="6003-D" size="4" value="<%if len(Trim(Session("6003-D")))>0 then  Response.Write Session("6003-D") end if %>"> 
            </td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td bgcolor="#CCFFFF">1004-D</td>
            <td bgcolor="#CCFFFF">Chocolate Chip DeLite</td>
            <td bgcolor="#CCFFFF">Large, Bulk</td>
            <td bgcolor="#CCFFFF"><div align="center">48/case</div></td>
            <td align="center" valign="middle" bgcolor="#CCFFFF"><div align="center"> 
                <input name="1004-D" type="text" id="1004-D" size="4" value="<%if len(Trim(Session("1004-D")))>0 then  Response.Write Session("1004-D") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td bgcolor="#CCFFFF">4004-D </td>
            <td bgcolor="#CCFFFF">Fudge Chip DeLite</td>
            <td bgcolor="#CCFFFF">Large, Bulk</td>
            <td bgcolor="#CCFFFF"><div align="center">48/case</div></td>
            <td align="center" valign="middle" bgcolor="#CCFFFF"><div align="center"> 
                <input name="4004-D" type="text" id="4004-D " size="4" value="<%if len(Trim(Session("4004-D")))>0 then  Response.Write Session("4004-D") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td bgcolor="#CCFFFF">6004-D</td>
            <td bgcolor="#CCFFFF">Oatmeal Apple DeLite &quot;NEW&quot;</td>
            <td bgcolor="#CCFFFF">Large, Bulk <strong> &quot;B&quot;</strong></td>
            <td bgcolor="#CCFFFF"><div align="center">48/case</div></td>
            <td align="center" valign="middle" bgcolor="#CCFFFF"> <input name="6004-D" type="text" id="6004-D" size="4" value="<%if len(Trim(Session("6004-D")))>0 then  Response.Write Session("6004-D") end if %>"> 
            </td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>1004 </td>
            <td>Chocolate Chip</td>
            <td>Large, Bulk</td>
            <td><div align="center">48/case</div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="1004" type="text" id="1004 2" size="4" value="<%if len(Trim(Session("1004")))>0 then  Response.Write Session("1004") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>1104 </td>
            <td>Casey&#8217;s- Caramel &amp; Choc </td>
            <td>Large, Bulk</td>
            <td><div align="center">48/case</div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="1104" type="text" id="1104 " size="4" value="<%if len(Trim(Session("1104")))>0 then  Response.Write Session("1104") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>1204 </td>
            <td>Choc Chip w &#8220;Attitude&#8221;</td>
            <td>Large, Bulk</td>
            <td><div align="center">48/case</div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="1204" type="text" id="1204 " size="4" value="<%if len(Trim(Session("1204")))>0 then  Response.Write Session("1204") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>3004 </td>
            <td>Oatmeal Raisin</td>
            <td>Large, Bulk<strong> &quot;B&quot;</strong></td>
            <td><div align="center">48/case</div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="3004" type="text" id="3004 " size="4" value="<%if len(Trim(Session("3004")))>0 then  Response.Write Session("3004") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>4004 </td>
            <td>Fudge Chip </td>
            <td>Large, Bulk</td>
            <td><div align="center">48/case</div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="4004" type="text" id="4004 " size="4" value="<%if len(Trim(Session("4004")))>0 then  Response.Write Session("4004") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>4104</td>
            <td>White Chunk Fudge</td>
            <td>Large, Bulk</td>
            <td><div align="center">48/case</div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="4104" type="text" id="4104" size="4" value="<%if len(Trim(Session("4104")))>0 then  Response.Write Session("4104") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>5004 </td>
            <td> Oatmeal Choc Chip</td>
            <td>Large, Bulk<strong> &quot;B&quot;</strong></td>
            <td><div align="center">48/case</div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="5004" type="text" id="5004 " size="4" value="<%if len(Trim(Session("5004")))>0 then  Response.Write Session("5004") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>Dawg-D </td>
            <td>DuneDawg (Rice Krispie Bar)</td>
            <td>Large, Wrapped <strong> &quot;B&quot;</strong></td>
            <td><div align="center">48/case </div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="Dawg-D" type="text" id="Dawg-D " size="4" value="<%if len(Trim(Session("Dawg-D")))>0 then  Response.Write Session("Dawg-D") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>Dawg-M</td>
            <td>MudDawg (Rice Krispie Bar with Chocolate)</td>
            <td>Large, Wrapped <strong> &quot;B&quot;</strong></td>
            <td><div align="center">48/case </div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="Dawg-M" type="text" id="Dawg-M" size="4" value="<%if len(Trim(Session("Dawg-M")))>0 then  Response.Write Session("Dawg-M") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>OASIS </td>
            <td>Apple Juice </td>
            <td>200 ml tetra </td>
            <td><div align="center">30/case </div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="OASISApple" type="text" id="OASIS Apple" size="4" value="<%if len(Trim(Session("OASISApple")))>0 then  Response.Write Session("OASISApple") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>OASIS </td>
            <td>Fieldberry Juice </td>
            <td>200 ml tetra </td>
            <td><div align="center">30/case </div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="OASISFieldberry" type="text" id="OASIS Fieldberry" size="4" value="<%if len(Trim(Session("OASISFieldberry")))>0 then  Response.Write Session("OASISFieldberry") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>OASIS </td>
            <td>Seven Fruit Tropical Juice</td>
            <td>200 ml tetra </td>
            <td><div align="center">30/case </div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="OASISTropical" type="text" id="OASIS Tropical" size="4" value="<%if len(Trim(Session("OASISTropical")))>0 then  Response.Write Session("OASISTropical") end if %>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>BEAT </td>
            <td>Chocolate Milk 1% </td>
            <td>250 ml tetra </td>
            <td><div align="center">27/case </div></td>
            <td align="center" valign="middle"><div align="center"> 
                <input name="BEAT" type="text" id="BEAT " size="4" value="<%if len(Trim(Session("BEAT")))>0 then  Response.Write Session("BEAT") end if%>">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td valign="top">Other Items (see left)</td>
            <td colspan="4"><div> 
                <textarea name="other" cols="35" rows="2"><%if len(Trim(Session("other")))>0 then  Response.Write Session("other") end if%></textarea>
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="18" colspan="2"> <div align="center"> <font color="#FF0000"><strong>Required 
                Information Missing (see fields in red below)</strong></font></div></td>
            <%if len(Trim(Session("School2")))>0 then %>
            <td height="18">Contact Name</td>
            <%else%>
            <td height="18"><font color="#FF0000"><strong>Contact Name</strong></font></td>
            <%end if%>
            <td height="18" colspan="2"><input name="School2" type="text" id="School2" size="20" value="<%if len(Trim(Session("School2")))>0 then  Response.Write Session("School2") end if%>"></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <%if len(Trim(Session("School2")))>0 then %>
            <td height="18">Name of School</td>
            <%else%>
            <td height="18"><font color="#FF0000"><strong>Name of School</strong></font></td>
            <%end if%>
            <td><input name="school" type="text" id="school" size="20" value="<%if len(Trim(Session("school")))>0 then  Response.Write Session("school") end if%>"></td>
            <%if len(Trim(Session("cemail")))>0 then %>
            <td height="18">Contact email</td>
            <%else%>
            <td height="18"><font color="#FF0000"><strong>Contact email</strong></font></td>
            <%end if%>
            <td colspan="2"><input name="cemail" type="text" id="cemail" size="20" value="<%if len(Trim(Session("cemail")))>0 then  Response.Write Session("cemail") end if%>"></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <%if len(Trim(Session("city")))>0 then %>
            <td height="24">Town/City</td>
            <%else%>
            <td height="24"><font color="#FF0000"><strong>Town/City</strong></font></td>
            <%end if%>
            <td><input name="city" type="text" id="city" size="20" value="<%if len(Trim(Session("city")))>0 then  Response.Write Session("city") end if%>"></td>
            <%if (len(Trim(Session("phone2")))+len(Trim(Session("phone1"))))>0 then %>
            <td>Phone 1</td>
            <%else%>
            <td ><font color="#FF0000"><strong>Phone 1</strong></font></td>
            <%end if%>
            <td colspan="2"><input name="phone1" type="text" id="phone1" size="20" value="<%if len(Trim(Session("phone1")))>0 then  Response.Write Session("phone1") end if%>"></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="18">Today's Date</td>
            <td><input name="Date Today" type="text" id="date today" size="20" value="<%Response.Write Now()%>"></td>
            <%if (len(Trim(Session("phone2")))+len(Trim(Session("phone1"))))>0 then %>
            <td>Phone 2</td>
            <%else%>
            <td ><font color="#FF0000"><strong>Phone 2</strong></font></td>
            <%end if%>
            <td colspan="2"><input name="phone2" type="text" id="phone2" size="20" value="<%if len(Trim(Session("phone2")))>0 then  Response.Write Session("phone2") end if%>"></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="18" colspan="2">For Delivery Information: <a href="../delivery/delivery.html" target="_blank"> 
              check our delivery schedule to your area</a></td>
            <td align="center"> 
              <%if len(Trim(Session("DeliveryDate")))>0 then %>
              <div align="left">Delivery Date</div>
              <%else%>
              <div align="left"><font color="#FF0000"><strong>Delivery Date</strong></font> 
              </div>
              <%end if%>
            </td>
            <td colspan="2" align="center"><div align="left"> 
                <input name="DeliveryDate" type="text" id="DeliveryDate" size="20" value="<%if len(Trim(Session("DeliveryDate")))>0 then  Response.Write Session("DeliveryDate") end if%>">
              </div></td>
          </tr>
        </table>
        <p align="center">
							<label> 
          <input type="submit" name="Submit" value="Submit  Order">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
          <input type="submit" name="Reset" value="Reset Form">
          </label>
						</p>
					</form>
				</TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="171" ALT=""></TD>
			</TR>
			<TR>
				<TD ROWSPAN="3">
					<IMG SRC="images/head2.gif" WIDTH="71" HEIGHT="82" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="23" ALT=""></TD>
			</TR>
			<TR>
				<TD COLSPAN="3">
					<IMG SRC="images/hot.gif" WIDTH="217" HEIGHT="36" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="36" ALT=""></TD>
			</TR>
			<TR>
				
    <TD COLSPAN="2" ROWSPAN="2"> <a href="../newsletter/newsletter.html"><IMG SRC="images/eggs.gif" ALT="" WIDTH="131" HEIGHT="175" border="0"></a></TD>
				
    <TD width="86" ROWSPAN="2"> <a href="../newsletter/newsletter.html"><img src="images/eggs_right.gif" alt="" width="86" height="175" border="0"></a></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="23" ALT=""></TD>
			</TR>
			<TR>
				
    <TD ROWSPAN="2"> <img src="images/left2.gif" width="71" height="172" alt=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="152" ALT=""></TD>
			</TR>
			<TR>
				<TD COLSPAN="3" ROWSPAN="2">
					<IMG SRC="images/customer.gif" WIDTH="217" HEIGHT="68" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="20" ALT=""></TD>
			</TR>
			<TR>
				<TD ROWSPAN="3">
					<IMG SRC="images/head3.gif" WIDTH="71" HEIGHT="82" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="48" ALT=""></TD>
			</TR>
			<TR>
				<TD COLSPAN="3">
					<IMG SRC="images/textbox1.gif" WIDTH="217" HEIGHT="19" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="19" ALT=""></TD>
			</TR>
			<TR>
				<TD COLSPAN="3" ROWSPAN="2">
					<IMG SRC="images/box.gif" WIDTH="217" HEIGHT="24" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="15" ALT=""></TD>
			</TR>
			<TR>
				<TD ROWSPAN="6">
					<img src="images/line3.gif" width="71" height="843" alt=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="9" ALT=""></TD>
			</TR>
			<TR>
				<TD COLSPAN="3">
					<IMG SRC="images/textbox2.gif" WIDTH="217" HEIGHT="18" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="18" ALT=""></TD>
			</TR>
			<TR>
				
    <TD COLSPAN="3" background="images/box2.gif">&nbsp;&nbsp;&nbsp;<span class="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../delivery/delivery.html" target="_blank">Click 
      here</a> for Delivery Schedule</span></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="88" ALT=""></TD>
			</TR>
			<TR>
				<TD COLSPAN="3">
					<IMG SRC="images/dynamic.gif" WIDTH="217" HEIGHT="28" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="28" ALT=""></TD>
			</TR>
			<TR>
				<TD COLSPAN="3" ROWSPAN="2">
					<IMG SRC="images/delivery-panel.gif" ALT="" WIDTH="217" HEIGHT="700" border="0" usemap="#Map2"></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="660" ALT=""></TD>
			</TR>
			<TR>
				<TD width="1">
					<IMG SRC="images/Hugo42_TCC1-1_22.gif" WIDTH="1" HEIGHT="40" ALT=""></TD>
				<TD width="481" background="images/copyright.gif">
					<div align="center"><font color="#000000"><span class="text">Terra 
        Cotta Cookie Co.</span></font><span class="text"><font color="#000000"> © 2005 .<a href="privacy.html" style="color: #000000; text-decoration: none;">
									Privacy Policy</a> . <a href="terms.html" style="color: #000000; text-decoration: none;">
									Terms Of Use</a> </font>
						</span></div>
				</TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="40" ALT=""></TD>
			</TR>
			<TR>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="114" HEIGHT="1" ALT=""></TD>
				<TD width="17">
					<IMG SRC="images/spacer.gif" WIDTH="17" HEIGHT="1" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="86" HEIGHT="1" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="71" HEIGHT="1" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="1" HEIGHT="1" ALT=""></TD>
				<TD>
					<IMG SRC="images/spacer.gif" WIDTH="481" HEIGHT="1" ALT=""></TD>
				<TD></TD>
			</TR>
		</TABLE>
		
<!-- End ImageReady Slices -->
<map name="Map2"><area shape="rect" coords="39,29,202,139" href="../products/products.html" target="_blank" alt="T.C.'s Menu">
  <area shape="rect" coords="33,224,204,352" href="../pdf/FRTallysheet0506.pdf" target="_blank" alt="&quot;Fun&quot;raising Menu F)">
</map>
<map name="Map">
  <area shape="rect" coords="33,224,204,352" href="../pdf/FRTallysheet0506.pdf" target="_blank" alt="&quot;Fun&quot;raising Menu F)">
</map>
<map name="Map2">
</map>
<map name="Map3"><area shape="rect" coords="6,44,82,67" href="../about/about.html" alt="About Us">
  <area shape="rect" coords="91,44,167,66" href="../products/products.html" alt="Products">
  <area shape="rect" coords="174,42,255,66" href="../ingredients/ingredients.html" alt="Ingredients">
  <area shape="rect" coords="261,42,333,66" href="order.html" alt="Order">
  <area shape="rect" coords="353,43,425,67" href="../delivery/delivery.html" alt="Delivery">
  <area shape="rect" coords="450,42,529,64" href="../fundraising/fundraising.html" alt="Fundraising">
</map>
<%Response.Write "<script language=""JavaScript"">"
Response.Write "alert(""Required Information Missing (see fields in red below):\r\n" & Session("ErrorMsg") & """);"
Response.Write "</script>"
%>
</BODY>
</HTML>
