<?php
	session_start();
    $myErrorMsg='';
    if (strlen(trim($_POST['Submit']))>0) { 
	    $infoFilled=0;
	    if (strlen(trim($_POST['School2']))==0) {
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
	    if (strlen(trim($_POST['city']))==0) {
			$infoFilled=1;
			$myErrorMsg= myErrorMsg . "- City\r\n";
	    }
	    if (strlen(trim($_POST['phone1'])  . trim($_POST['phone2']))==0) {
			$infoFilled=1;
			$myErrorMsg= myErrorMsg . "- Phone Number\r\n";
	    }
	    if  (strlen(trim($_POST['DeliveryDate']))==0) {
			$infoFilled=1;
			$myErrorMsg= myErrorMsg . "- Delivery Date\r\n";
	    }
	    if ($infoFilled==0) {
		    $FromName="Terra Cotta Cookie Order Processor";
			$From= "orders@terracottacookies.com";
		    //
			$ToName="Terra Cotta Cookie Order Processor";
			$ToEmail= "orders@terracottacookies.com" ; 
                        //$ToEmail = "catalinst@rogers.com";
			//$ToEmail= "cmaxwell@maxmediagroup.com" ; 
		    //change thank-you.htm with whatever you need as langing page after the email
			$thankyoupage="order_thankyou.html";
		    $Cc = $_POST['$email'];
		    $Subject=" TerraCotta Cookies Confirmation " ; 
	     
	   		$_SESSION['ErrorMsg']='';
	   		$myBody2=' ';
			$myBody="Please note: Terra Cotta Cookies will call to confirm your order and amount due." . chr(13) . chr(10) . "If you do not hear from us within 24 hours," . chr(13) . chr(10) . "please call 905-877-4216 immediately. Thank you."  . chr(13) . chr(10) . "" . chr(13) . chr(10) . "The following order was submitted:" . chr(13) . chr(10);
			$myBody=$myBody . "-------------------------------" . chr(13) . chr(10);
			$myBody = $myBody . "School Name : " . $_POST['school'] . chr(13) . chr(10);
			$myBody = $myBody . "City : " . $_POST['city'] . chr(13) . chr(10);
			$myBody = $myBody . "Phone 1: " . $_POST['phone1'] . chr(13) . chr(10);
			$myBody = $myBody . "Phone 2: " . $_POST['phone2'] . chr(13) . chr(10);
			$myBody = $myBody . "Contact Name : " . $_POST['School2'] . chr(13) . chr(10);
			$myBody = $myBody . "Contact email : " . $_POST['cemail'] . chr(13) . chr(10);
			$myBody = $myBody . "Order's Date : " . date('D, d M Y H:i:s T') . chr(13) . chr(10);
			$myBody = $myBody . "Delivery Date : " . $_POST['DeliveryDate'] . chr(13) . chr(10);
			$myBody=$myBody . "-------------------------------" . chr(13) . chr(10);
			$myBody=$myBody . "Order Content" . chr(13) . chr(10);


			if (strlen(trim($_POST['T-1001']))>0) {
			$myBody=$myBody . "T-1001 Chocolate Chip Tiny, Bulk(288/case) = " . $_POST['T-1001'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['T-4101']))>0) {
			$myBody=$myBody . "T-4101 White Chocolate Fudge Tiny, Bulk(288/case) = " . $_POST['T-4101'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['T-10001']))>0) {
			$myBody=$myBody . "T-10001 White Chocolate Tiny, Bulk(288/case) = " . $_POST['T-10001'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['1002-D']))>0) {
			$myBody=$myBody . "1002-D Chocolate Chip DeLite, 30g, Bulk(96/case) = " . $_POST['1002-D'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['3002-D']))>0) {
			$myBody=$myBody . "3002-D Oatmeal Raisin 30g, Bulk(96/case) = " . $_POST['3002-D'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['4002-D']))>0) {
			$myBody=$myBody . "4002-D Fudge Chip DeLite 30g, Bulk(96/case) = " . $_POST['4002-D'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['5002-D']))>0) {
			$myBody=$myBody . "5002-D Oatmeal Choc Chip Delite 30g, Bulk(96/case) = " . $_POST['5002-D'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['6002-D']))>0) {
			$myBody=$myBody . "6002-D Oatmeal DeLite 30g, Bulk(96/case) = " . $_POST['6002-D'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['1003']))>0) {
			$myBody=$myBody . "1003 Chocolate Chip Large, Wrapped(48/case) = " . $_POST['1003'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['1103']))>0) {
			$myBody=$myBody . "1103 Casey's-Caramel . Choc Large, Wrapped(48/case) = " . $_POST['1103'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['1203']))>0) {
			$myBody=$myBody . "1203 Choc Chip w `Attitude` Large, Wrapped(48/case) = " . $_POST['1203'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['3003']))>0) {
			$myBody=$myBody . "3003 Oatmeal Raisin Large, Wrapped(48/case) = " . $_POST['3003'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['4003']))>0) {
			$myBody=$myBody . "4003 Fudge Chip Large, Wrapped(48/case) = " . $_POST['4003'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['4103']))>0) {
			$myBody=$myBody . "4103 White Chunk Fudge Large, Wrapped(48/case) = " . $_POST['4103'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['5003']))>0) {
			$myBody=$myBody . "5003 Oatmeal Choc Chip Large, Wrapped(48/case) = " . $_POST['5003'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['1003-D']))>0) {
			$myBody=$myBody . "1003-D Chocolate Chip DeLite Large, Wrapped(48/case) = " . $_POST['1003-D'] . " case(s)" . chr(13) . chr(10);
			}
			if (strlen(trim($_POST['4003-D']))>0) {
			$myBody=$myBody . "4003-D Fudge Chip DeLite Large, Wrapped(48/case) = " . $_POST['4003-D'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['6003-D']))>0) {
			$myBody=$myBody . "6003-D Oatmeal DeLite Large, Wrapped(48/case) = " . $_POST['6003-D'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['1004-D']))>0) {
			$myBody=$myBody . "1004-D Chocolate Chip DeLite Large, Bulk(48/case) = " . $_POST['1004-D'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['4004-D']))>0) {
			$myBody=$myBody . "4004-D Fudge Chip DeLite Large, Bulk(48/case) = " . $_POST['4004-D'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['6004-D']))>0) {
			$myBody=$myBody . "6004-D Oatmeal DeLite Large, Bulk(48/case) = " . $_POST['6004-D'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['1004']))>0) {
			$myBody=$myBody . "1004 Chocolate Chip Large, Bulk(48/case) = " . $_POST['1004'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['1104']))>0) {
			$myBody=$myBody .  "1104 Casey's- Caramel & Choc Large, Bulk(48/case) = " . $_POST['1104'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['1204']))>0) {
			$myBody=$myBody  . "1204 Choc Chip w `Attitude` Large, Bulk(48/case) = " . $_POST['1204'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['3004']))>0) {
			$myBody=$myBody  . "3004 Oatmeal Raisin Large, Bulk(48/case) = " . $_POST['3004'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['4004']))>0) {
			$myBody=$myBody . "4004 Fudge Chip Large, Bulk(48/case) = " . $_POST['4004'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['4104']))>0) {
			$myBody=$myBody  . "4104 White Chunk Fudge Large, Bulk(48/case) = " . $_POST['4104'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['5004']))>0) {
			$myBody=$myBody . "5004 Oatmeal Choc Chip Large, Bulk(48/case) = " . $_POST['5004'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['7002']))>0) {
			$myBody=$myBody .  "7002 Oatmeal Chocolate Chip Small, Bulk(96/case) = " . $_POST['7002'] . " case(s)" . chr(13) . chr(10);
			}



			if (strlen(trim($_POST['7102']))>0) {
			$myBody=$myBody .  "7102 Fudge Chip Mookie Small, Bulk(96/case) = " . $_POST['7102'] . " case(s)" . chr(13) . chr(10);
			}



			if (strlen(trim($_POST['7003']))>0) {
			$myBody=$myBody .  "7003 Oatmeal Chocolate Chip Large, Wrapped(48/case) = " . $_POST['7003'] . " case(s)" . chr(13) . chr(10);
			}




			if (strlen(trim($_POST['7103']))>0) {
			$myBody=$myBody .  "7103 Fudge Chip Mookie Large, Wraped(48/case) = " . $_POST['7103'] . " case(s)" . chr(13) . chr(10);
			}


echo $myBody2 . "<BR>"; 

			if (strlen(trim($_POST['7004']))>0) {
			$myBody=$myBody .  "7004 Oatmeal Chocolate Chip Large, Bulk(48/case) = " . $_POST['7004'] . " case(s)" . chr(13) .chr(10);
	}

echo $myBody2 . "<BR>"; 

			if (strlen(trim($_POST['7104']))>0) {
			$myBody=$myBody  . "7104 Fudge Chip Mookie Large, Bulk(48/case) = " . $_POST['7104'] . " case(s)" . chr(13)  . chr(10);		
			}

echo $myBody2 . "<BR>"; 

			if (strlen(trim($_POST['Dawg-D']))>0) {
			$myBody=$myBody  . "Dawg-D DuneDawg (Rice Krispie Bar) Large, Wrapped(48/case) = " . $_POST['Dawg-D'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['Dawg-M']))>0) {
			$myBody=$myBody  . "Dawg-M MudDawg (Rice Krispie Bar with Chocolate) Large, Wrapped(48/case) = " . $_POST['Dawg-M'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['GF-10']))>0) {
			$myBody=$myBody  . "GF-10 Gluten Free Chocolate Chip Cookies ½ lb bag, 225 gram = " . $_POST['GF-10'] . " bag(s)" . chr(13)  . chr(10);
	
	}


			if (strlen(trim($_POST['GF-15']))>0) {
			$myBody=$myBody  . "GF-15 Gluten Free Brownies 7 ½ “ pan, 325 gram = " . $_POST['GF-15'] . " pan(s)" . chr(13) . chr(10);
	}


			if (strlen(trim($_POST['GF-20']))>0) {
			$myBody=$myBody  . "GF-20 Gluten Free Vanilla Cake 8 ” pan, 450 gram = " . $_POST['GF-20'] . " pan(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['OASISApple']))>0) {
			$myBody=$myBody .  "OASIS Apple Juice 200 ml tetra(30/case) = " . $_POST['OASISApple'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['OASISWildberry']))>0) {
			$myBody=$myBody  . "OASIS Wildberry Juice 200 ml tetra(30/case) = " . $_POST['OASISWildberry'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['OASISTropical']))>0) {
			$myBody=$myBody  . "OASIS Seven Fruit Tropical Juice 200 ml tetra(30/case) = " . $_POST['OASISTropical'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['BEAT']))>0) {
			$myBody=$myBody  . "BEAT Chocolate Milk 1% 250 ml tetra(27/case) = " . $_POST['BEAT'] . " case(s)" . chr(13) . chr(10);
			}


			if (strlen(trim($_POST['other']))>0) {
			$myBody=$myBody . "Other :" . $_POST['other'] .  chr(13) . chr(10);
			}


 		    $_SESSION['T-1001'] = '' ;
			$_SESSION['T-4101'] = '';
	   		$_SESSION['T-10001'] = '';
	   		$_SESSION['1002-D'] = '';
	   		$_SESSION['3002-D'] = '';
	   		$_SESSION['4002-D'] = '';
	   		$_SESSION['5002-D'] = '';
	   		$_SESSION['6002-D'] = '';
			$_SESSION['V1003'] = '';
			$_SESSION['V1103'] = '';
//	   		$_SESSION['1203'] = $_POST['1203'] ;
	   		$_SESSION['V3003'] = '';
	   		$_SESSION['V4003'] = '';
	   		$_SESSION['V4103'] = '' ;	   		
	   		$_SESSION['V1003'] = '';
	   		$_SESSION['V5003'] = '' ;	   		
	   		$_SESSION['1003-D'] = '';
	   		$_SESSION['4003-D'] = '';
	   		$_SESSION['6003-D'] = '';
//	   		$_SESSION['4103'] = $_POST['4103'] ;
//	   		$_SESSION['5003'] = $_POST['5003'] ;
	   		$_SESSION['1004-D'] = '';
	   		$_SESSION['4004-D'] = '';
	   		$_SESSION['6004-D'] = '';
	   		$_SESSION['V1004'] = '';
	   		$_SESSION['V1104'] = '';
	   		$_SESSION['V3004'] = '';
	   		$_SESSION['V4004'] = '';
	   		$_SESSION['V4104'] = '';
	   		$_SESSION['V5004'] = '';
//	   		$_SESSION['1204'] = $_POST['1204'] ;
	   		$_SESSION['V7002'] = '';
	   		$_SESSION['V7102'] = '' ;
	   		$_SESSION['V7003'] = '';
	   		$_SESSION['V7103'] = '';
	   		$_SESSION['V7004'] = '';
	   		$_SESSION['V7104'] = '';
	   		$_SESSION['Dawg-D'] = '';
	   		$_SESSION['Dawg-M'] = '';
	   		$_SESSION['OASISApple'] ='';
	   		$_SESSION['OASISWildberry'] = '';
	   		$_SESSION['OASISTropical'] = '';
	   		$_SESSION['BEAT'] = '';
	   		$_SESSION['GF-10'] = '';
	   		$_SESSION['GF-15'] = '';		
	   		$_SESSION['GF-20'] = '';						
	   		$_SESSION['other'] = '';
			$_SESSION['school'] = '';
			$_SESSION['School2'] = '';
			$_SESSION['cemail'] = '';
			$_SESSION['city'] = '';
			$_SESSION['DeliveryDate'] = '';
			$_SESSION['phone1'] = '';
			$_SESSION['phone2'] = '';
			$_SESSION['ErrorMsg']='';
			
		$mytotalbody=$myBody;  
	    
    $mailstatus=send_mail($FromName, $From, $ToName, $ToEmail , $Subject, $mytotalbody, "", "") ;
     $mailstatus=send_mail($FromName, $From, $_POST['School2'], $_POST['cemail'] , $Subject, $mytotalbody, "", "") ;
   
	$url =  server_url() . dirname($_SERVER['PHP_SELF'])  . "/" . $thankyoupage ; 

	if (!headers_sent())
   {
       header("Location: $url");
   }
   else
   {
       echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">\r\n";
   }
die();


	}
	else
	{
	
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
	   		$_SESSION['Dawg-D'] = $_POST['Dawg-D'] ;
	   		$_SESSION['Dawg-M'] = $_POST['Dawg-M'] ;
	   		$_SESSION['OASISApple'] = $_POST['OASISApple'] ;
	   		$_SESSION['OASISWildberry'] = $_POST['OASISWildberry'] ;
	   		$_SESSION['OASISTropical'] = $_POST['OASISTropical'] ;
	   		$_SESSION['BEAT'] = $_POST['BEAT'] ;
	   		$_SESSION['GF-10'] = $_POST['GF-10'] 		;
	   		$_SESSION['GF-15'] = $_POST['GF-15'] ;		
	   		$_SESSION['GF-20'] = $_POST['GF-20'] ;						
	   		$_SESSION['other'] = $_POST['other'] ;
			$_SESSION['school'] = $_POST['school'] ;
			$_SESSION['School2'] = $_POST['School2'] ;
			$_SESSION['cemail'] = $_POST['cemail'] ;
			$_SESSION['city'] = $_POST['city'] ;
			$_SESSION['DeliveryDate'] = $_POST['DeliveryDate'] ;
			$_SESSION['phone1'] = $_POST['phone1'] ;
			$_SESSION['phone2'] = $_POST['phone2'];
			$_SESSION['ErrorMsg']=$myErrorMsg;
//			die($_SESSION['T-4101']);
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'order.php';
		header("Location: http://$host$uri/$extra");
	   }
   }
   else
   {
    	$_SESSION['T-1001'] = '';
		$_SESSION['T-4101'] = '';
   		$_SESSION['T-10001'] = '';
   		$_SESSION['1002-D'] = '';
   		$_SESSION['3002-D'] = '';
   		$_SESSION['4002-D'] = '';
   		$_SESSION['5002-D'] = '';
   		$_SESSION['6002-D'] = '';
		$_SESSION['1103'] = '';
   		$_SESSION['1203'] = '';
   		$_SESSION['3003'] = '';
   		$_SESSION['4003'] = '';
   		$_SESSION['1003'] = '';
   		$_SESSION['1003-D'] = '';
   		$_SESSION['4003-D'] = '';
   		$_SESSION['6003-D'] = '';
   		$_SESSION['4103'] = '';
   		$_SESSION['5003'] = '';
   		$_SESSION['1004'] = '';
   		$_SESSION['1004-D'] = '';
   		$_SESSION['1104'] = '';
   		$_SESSION['1204'] = '';
   		$_SESSION['3004'] = '';
   		$_SESSION['4004'] = '';
   		$_SESSION['4004-D'] = '';
   		$_SESSION['6004-D'] = '';
   		$_SESSION['4104'] = '';
   		$_SESSION['5004'] = '';
   		$_SESSION['Dawg-D'] = '';
   		$_SESSION['Dawg-M'] = '';
   		$_SESSION['OASISApple'] = '';
   		$_SESSION['OASISWildberry'] = '';
   		$_SESSION['OASISTropical'] = '';
   		$_SESSION['BEAT'] = '';
		$_SESSION['GF-10'] = '';
		$_SESSION['GF-15'] = '';
		$_SESSION['GF-20'] = '';				
   		$_SESSION['other'] = '';
		$_SESSION['school'] = '';
		$_SESSION['School2'] = '';
		$_SESSION['cemail'] = '';
		$_SESSION['city'] = '';
		$_SESSION['DeliveryDate'] = '';
		$_SESSION['phone1'] = '';
		$_SESSION['phone2'] = '';
		$_SESSION['ErrorMsg']='';
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'order.html';
		header("Location: http://$host$uri/$extra");

   }


function send_mail( $myname, $myemail, $contactname,  $contactemail,  $subject,  $message,  $cc, $bcc) {
//$headers .=  "MIME-Version: 1.0\n";
//$headers .=  "Content-type: text/html; charset=iso-8859-1\n" ;
//$headers .=  "From: \"" . $myname . "\" <" . $myemail . ">\n" ;
//$headers = 'From: '. $myname  . '\r\n' . 'Reply-To:' . $myemail  . '\r\n' . 'X-Mailer: PHP/' . phpversion();
//$headers = 'From: '. $myname  . chr(13) . chr(10) . 'Reply-To:' . $myemail  . chr(13) . chr(10) . 'X-Mailer: PHP/' . phpversion();
$headers = 'From: "' . $myname . '" <' . $myemail . '>' . chr(13) . chr(10) . 'Reply-To:' . $myemail  . chr(13) . chr(10) . 'X-Mailer: PHP/' . phpversion();
 if ( $bcc !=  "" )
{
  $headers  .=  "Bcc: " . $bcc . "\n" ;
  }
 if ( $cc !=  "" )
{
  $headers  .=  "Cc: " . $cc . "\n" ;
  }
  $output =  $message; 
//$output =  wordwrap( $output,  72);

 return(mail(  $contactemail,  $subject,  $output,  $headers));
 }
function server_url()
{  
   $proto = "http" .
       ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "s" : "") . "://";
   $server = isset($_SERVER['HTTP_HOST']) ?
       $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
   return $proto . $server;
}

?> 