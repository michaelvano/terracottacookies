<%
    on error resume next
    dim infoFilled 
    Dim myBody
    Dim myErrorMsg
    myErrorMsg=""
    if Len(Trim(Request.Form("Submit")))>0 then 
    infoFilled=0
    if Len(Trim(Request.Form("School2")))=0 then 
		infoFilled=1
		myErrorMsg= myErrorMsg & "- Contact Name\r\n"
    end if
    if Len(Trim(Request.Form("school")))=0 then 
		infoFilled=1
		myErrorMsg= myErrorMsg & "- School Name\r\n"
    end if
    if Len(Trim(Request.Form("cemail")))=0 then 
		infoFilled=1
		myErrorMsg= myErrorMsg & "- Contact Email\r\n"
    end if
    if Len(Trim(Request.Form("city")))=0 then 
		infoFilled=1
		myErrorMsg= myErrorMsg & "- City\r\n"
    end if
    if (Len(Trim(Request.Form("phone1")))+Len(Trim(Request.Form("phone2"))))=0 then 
		infoFilled=1
		myErrorMsg= myErrorMsg & "- Phone Number\r\n"
    end if
    if Len(Trim(Request.Form("DeliveryDate")))=0 then 
		infoFilled=1
		myErrorMsg= myErrorMsg & "- Delivery Date\r\n"
    end if
    if infoFilled=0 then 
   		Session("ErrorMsg")=""
		myBody="The following order was submitted:" & chr(13) & chr(10)
		myBody=myBody & "-------------------------------" & chr(13) & chr(10)
		myBody = myBody & "School Name : " & Request.Form("school") & chr(13) & chr(10)
		myBody = myBody & "City : " & Request.Form("city") & chr(13) & chr(10)
		myBody = myBody & "Phone 1: " & Request.Form("phone1") & chr(13) & chr(10)
		myBody = myBody & "Phone 2: " & Request.Form("phone2") & chr(13) & chr(10)
		myBody = myBody & "Contact Name : " & Request.Form("school2") & chr(13) & chr(10)
		myBody = myBody & "Contact email : " & Request.Form("cEmail") & chr(13) & chr(10)
		myBody = myBody & "Order's Date : " & Now() & chr(13) & chr(10)
		myBody = myBody & "Delivery Date : " & Request.Form("DeliveryDate") & chr(13) & chr(10)
		myBody=myBody & "-------------------------------" & chr(13) & chr(10)
		myBody=myBody & "Order Content" & chr(13) & chr(10)
		if not Len(Trim(Request.Form("T-1001")))=0 then 
		myBody=myBody & "T-1001 Chocolate Chip Tiny, Bulk(288/case) = " & Request.Form("T-1001") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("T-4101")))=0 then 
		myBody=myBody & "T-4101 White Chocolate Fudge Tiny, Bulk(288/case) = " & Request.Form("T-4101") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("T-10001")))=0 then 
		myBody=myBody & "T-10001 White Chocolate Tiny, Bulk(288/case) = " & Request.Form("T-10001") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("1002-D")))=0 then 
		myBody=myBody & "1002-D Chocolate Chip DeLite, 30g, Bulk(96/case) = " & Request.Form("1002-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("3002-D")))=0 then 
		myBody=myBody & "3002-D Oatmeal Raisin 30g, Bulk(96/case) = " & Request.Form("3002-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("4002-D")))=0 then 
		myBody=myBody & "4002-D Fudge Chip DeLite 30g, Bulk(96/case) = " & Request.Form("4002-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("5002-D")))=0 then 
		myBody=myBody & "5002-D Oatmeal Choc Chip Delite 30g, Bulk(96/case) = " & Request.Form("5002-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("6002-D")))=0 then 
		myBody=myBody & "6002-D Oatmeal Apple DeLite 30g, Bulk(96/case) = " & Request.Form("6002-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("1003")))=0 then 
		myBody=myBody & "1003 Chocolate Chip Large, Wrapped(48/case) = " & Request.Form("1003") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("1103")))=0 then 
		myBody=myBody & "1103 Casey's-Caramel & Choc Large, Wrapped(48/case) = " & Request.Form("1103") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("1203")))=0 then 
		myBody=myBody & "1203 Choc Chip w `Attitude` Large, Wrapped(48/case) = " & Request.Form("1203") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("3003")))=0 then 
		myBody=myBody & "3003 Oatmeal Raisin Large, Wrapped(48/case) = " & Request.Form("3003") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("4003")))=0 then 
		myBody=myBody & "4003 Fudge Chip Large, Wrapped(48/case) = " & Request.Form("4003") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("4103")))=0 then 
		myBody=myBody & "4103 White Chunk Fudge Large, Wrapped(48/case) = " & Request.Form("4103") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("5003")))=0 then 
		myBody=myBody & "5003 Oatmeal Choc Chip Large, Wrapped(48/case) = " & Request.Form("5003") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("1003-D")))=0 then 
		myBody=myBody & "1003-D Chocolate Chip DeLite Large, Wrapped(48/case) = " & Request.Form("1003-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("4003-D")))=0 then 
		myBody=myBody & "4003-D Fudge Chip DeLite Large, Wrapped(48/case) = " & Request.Form("4003-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("6003-D")))=0 then 
		myBody=myBody & "6003-D Oatmeal Apple DeLite Large, Wrapped(48/case) = " & Request.Form("6003-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("1004-D")))=0 then 
		myBody=myBody & "1004-D Chocolate Chip DeLite Large, Bulk(48/case) = " & Request.Form("1004-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("4004-D")))=0 then 
		myBody=myBody & "4004-D Fudge Chip DeLite Large, Bulk(48/case) = " & Request.Form("4004-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("6004-D")))=0 then 
		myBody=myBody & "6004-D Oatmeal Apple DeLite Large, Bulk(48/case) = " & Request.Form("6004-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("1004")))=0 then 
		myBody=myBody & "1004 Chocolate Chip Large, Bulk(48/case) = " & Request.Form("1004") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("1104")))=0 then 
		myBody=myBody & "1104 Casey's- Caramel & Choc Large, Bulk(48/case) = " & Request.Form("1104") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("1204")))=0 then 
		myBody=myBody & "1204 Choc Chip w `Attitude` Large, Bulk(48/case) = " & Request.Form("1204") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("3004")))=0 then 
		myBody=myBody & "3004 Oatmeal Raisin Large, Bulk(48/case) = " & Request.Form("3004") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("4004")))=0 then 
		myBody=myBody & "4004 Fudge Chip Large, Bulk(48/case) = " & Request.Form("4004") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("4104")))=0 then 
		myBody=myBody & "4104 White Chunk Fudge Large, Bulk(48/case) = " & Request.Form("4104") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("5004")))=0 then 
		myBody=myBody & "5004 Oatmeal Choc Chip Large, Bulk(48/case) = " & Request.Form("5004") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("Dawg-D")))=0 then 
		myBody=myBody & "Dawg-D DuneDawg (Rice Krispie Bar) Large, Wrapped(48/case) = " & Request.Form("Dawg-D") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("Dawg-M")))=0 then 
		myBody=myBody & "Dawg-M MudDawg (Rice Krispie Bar with Chocolate) Large, Wrapped(48/case) = " & Request.Form("Dawg-M") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("OASISApple")))=0 then 
		myBody=myBody & "OASIS Apple Juice 200 ml tetra(30/case) = " & Request.Form("OASISApple") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("OASISFieldberry")))=0 then 
		myBody=myBody & "OASIS Fieldberry Juice 200 ml tetra(30/case) = " & Request.Form("OASISFieldberry") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("OASISTropical")))=0 then 
		myBody=myBody & "OASIS Seven Fruit Tropical Juice 200 ml tetra(30/case) = " & Request.Form("OASISTropical") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("BEAT")))=0 then 
		myBody=myBody & "BEAT Chocolate Milk 1% 250 ml tetra(27/case) = " & Request.Form("BEAT") & " case(s)" & chr(13) & Chr(10)
		end if
		if not Len(Trim(Request.Form("other")))=0 then 
		myBody=myBody & "Other :" & Request.Form("other") &  chr(13) & Chr(10)
		end if
	    
'		Dim MyCDONTSMail  
'		Set MyCDONTSMail = Server.CreateObject("CDONTS.NewMail")
'		MyCDONTSMail.bcc= "cmaxwell@maxmediagroup.com"
'		MyCDONTSMail.To= "order@terracottacookies.com"
'		'MyCDONTSMail.To= "catalinst@rogers.com"
'		MyCDONTSMail.From= "order@terracottacookies.com"
'		MyCDONTSMail.cc = Request.Form("cemail")
'		MyCDONTSMail.Subject="Order"
'		MyCDONTSMail.Body= MyBody
'		MyCDONTSMail.Send
'		set MyCDONTSMail=Nothing
		Set objErrMail= Server.CreateObject("CDO.Message")
		With objErrMail
	          .From = "TerraCotta Order Processor<orders@terracottacookies.com>"
        	  .To = "orders@terracottacookies.com"
'        	  .Bcc = "cmaxwell@maxmediagroup.com"
'         	  .Cc = Request.Form("cemail")
'        	  .To = "catalinst@rogers.com"
	          .Subject = "Order Confirmation"
'        	  .HTMLBody = CStr("" & myBody)
        	  .TextBody = CStr("" & myBody)
	          .Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/sendusing") = 2
        	  .Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpserver") = "67.18.229.188"
       		  .Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpserverport") = 25
	          .Configuration.Fields.Update
	          .Send
	        End With
	    Set obErrMail = Nothing
		Set objErrMail= Server.CreateObject("CDO.Message")
		With objErrMail
	          .From = "TerraCotta Order Processor<orders@terracottacookies.com>"
        	  .To = Request.Form("cemail")
'        	  .Bcc = "cmaxwell@maxmediagroup.com"
'         	  .Cc = Request.Form("cemail")
'        	  .To = "catalinst@rogers.com"
	          .Subject = "Order Confirmation"
'        	  .HTMLBody = CStr("" & myBody)
        	  .TextBody = CStr("" & myBody)
	          .Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/sendusing") = 2
        	  .Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpserver") = "67.18.229.188"
       		  .Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpserverport") = 25
	          .Configuration.Fields.Update
	          .Send
	        End With
	    Set obErrMail = Nothing

	   	Session("T-1001") = ""
		Session("T-4101") = ""
   		Session("T-10001") = ""
   		Session("1002-D") = ""
   		Session("3002-D") = ""
   		Session("4002-D") = ""
   		Session("5002-D") = ""
   		Session("6002-D") = ""
		Session("1103") = ""
   		Session("1203") = ""
   		Session("3003") = ""
   		Session("4003") = ""
   		Session("1003") = ""
   		Session("1003-D") = ""
   		Session("4003-D") = ""
   		Session("6003-D") = ""
   		Session("4103") = ""
   		Session("5003") = ""
   		Session("1004") = ""
   		Session("1004-D") = ""
   		Session("1104") = ""
   		Session("1204") = ""
   		Session("3004") = ""
   		Session("4004") = ""
   		Session("4004-D") = ""
   		Session("6004-D") = ""
   		Session("4104") = ""
   		Session("5004") = ""
   		Session("Dawg-D") = ""
   		Session("Dawg-M") = ""
   		Session("OASISApple") = ""
   		Session("OASISFieldberry") = ""
   		Session("OASISTropical") = ""
   		Session("BEAT") = ""
   		Session("other") = ""
		Session("school") = ""
		Session("School2") = ""
		Session("cemail") = ""
		Session("city") = ""
		Session("DeliveryDate") = ""
		Session("phone1") = ""
		Session("phone2") = ""

		Response.Redirect("order_thankyou.html")
   else
	   	Session("T-1001") = Request.Form("T-1001")
		Session("T-4101") = Request.Form("T-4101")
   		Session("T-10001") = Request.Form("T-10001")
   		Session("1002-D") = Request.Form("1002-D")
   		Session("3002-D") = Request.Form("3002-D")
   		Session("4002-D") = Request.Form("4002-D")
   		Session("5002-D") = Request.Form("5002-D")
   		Session("6002-D") = Request.Form("6002-D")
		Session("1103") = Request.Form("1103")
   		Session("1203") = Request.Form("1203")
   		Session("3003") = Request.Form("3003")
   		Session("4003") = Request.Form("4003")
   		Session("1003") = Request.Form("1003")
   		Session("1003-D") = Request.Form("1003-D")
   		Session("4003-D") = Request.Form("4003-D")
   		Session("6003-D") = Request.Form("6003-D")
   		Session("4103") = Request.Form("4103")
   		Session("5003") = Request.Form("5003")
   		Session("1004") = Request.Form("1004")
   		Session("1004-D") = Request.Form("1004-D")
   		Session("1104") = Request.Form("1104")
   		Session("1204") = Request.Form("1204")
   		Session("3004") = Request.Form("3004")
   		Session("4004") = Request.Form("4004")
   		Session("4004-D") = Request.Form("4004-D")
   		Session("6004-D") = Request.Form("6004-D")
   		Session("4104") = Request.Form("4104")
   		Session("5004") = Request.Form("5004")
   		Session("Dawg-D") = Request.Form("Dawg-D")
   		Session("Dawg-M") = Request.Form("Dawg-M")
   		Session("OASISApple") = Request.Form("OASISApple")
   		Session("OASISFieldberry") = Request.Form("OASISFieldberry")
   		Session("OASISTropical") = Request.Form("OASISTropical")
   		Session("BEAT") = Request.Form("BEAT")
   		Session("other") = Request.Form("other")
		Session("school") = Request.Form("school")
		Session("School2") = Request.Form("School2")
		Session("cemail") = Request.Form("cemail")
		Session("city") = Request.Form("city")
		Session("DeliveryDate") = Request.Form("DeliveryDate")
		Session("phone1") = Request.Form("phone1")
		Session("phone2") = Request.Form("phone2")
		Session("ErrorMsg")=myErrorMsg
	Response.Redirect("order.asp")
   end if
   else
    	Session("T-1001") = ""
		Session("T-4101") = ""
   		Session("T-10001") = ""
   		Session("1002-D") = ""
   		Session("3002-D") = ""
   		Session("4002-D") = ""
   		Session("5002-D") = ""
   		Session("6002-D") = ""
		Session("1103") = ""
   		Session("1203") = ""
   		Session("3003") = ""
   		Session("4003") = ""
   		Session("1003") = ""
   		Session("1003-D") = ""
   		Session("4003-D") = ""
   		Session("6003-D") = ""
   		Session("4103") = ""
   		Session("5003") = ""
   		Session("1004") = ""
   		Session("1004-D") = ""
   		Session("1104") = ""
   		Session("1204") = ""
   		Session("3004") = ""
   		Session("4004") = ""
   		Session("4004-D") = ""
   		Session("6004-D") = ""
   		Session("4104") = ""
   		Session("5004") = ""
   		Session("Dawg-D") = ""
   		Session("Dawg-M") = ""
   		Session("OASISApple") = ""
   		Session("OASISFieldberry") = ""
   		Session("OASISTropical") = ""
   		Session("BEAT") = ""
   		Session("other") = ""
		Session("school") = ""
		Session("School2") = ""
		Session("cemail") = ""
		Session("city") = ""
		Session("DeliveryDate") = ""
		Session("phone1") = ""
		Session("phone2") = ""
		Session("ErrorMsg")=""
		Response.Redirect("order.html")
   end if
 %>