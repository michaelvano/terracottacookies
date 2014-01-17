<?php require_once('connection/connect.php'); ?>

<?php



/**

 * @author Tudor Stanciu

 * @copyright MCST Consulting INC 2009

 */

	session_start();

		global $dbhost,$dbname,$dbusername,$dbpassword, $rezult,$linkid; 

        $linkid=mysql_connect($dbhost,$dbusername,$dbpassword) or die('Cannot connect');

		if (!$linkid) {

		  //$MYSQL_ERRORNO=0;

			  $MYSQL_ERROR='Connection failed';

		}

		else

		{

		  $dblink=mysql_select_db($dbname,$linkid);

		}



	

	if (!isset($_POST['Edit']) and !isset($_POST['Submit'])) {

		$_SESSION['NoError']=1;

		$host  = $_SERVER['HTTP_HOST'];

		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

		$extra = 'order_test2010.html';

		header("Location: http://$host$uri/$extra");

	}	

	

	if (strlen(trim($_POST['Edit']))>0) {

		

		$_SESSION['NoError']=1;

		$host  = $_SERVER['HTTP_HOST'];

		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

		$extra = 'order_testSept2010.php';

		header("Location: http://$host$uri/$extra");

		die('!!!');

	}

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

	    if ($infoFilled==0) {

		    $FromName="Terra Cotta Cookie Order Processor";

			$From= "orders@terracottacookies.com";

		    //

			$ToName="Terra Cotta Cookie Order Processor";

			//$ToEmail= "orders@terracottacookies.com" ; 
            $ToEmail = "catalinst@rogers.com";

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

			$myBody = $myBody . "Contact Name : " . $_POST['school2'] . chr(13) . chr(10);

			$myBody = $myBody . "Contact email : " . $_POST['cemail'] . chr(13) . chr(10);

			$myBody = $myBody . "Order's Date : " . $_POST['datetoday'] . chr(13) . chr(10);

			$myBody = $myBody . "Delivery Date : " . $_POST['deliverydate'] . chr(13) . chr(10);

			$myBody=$myBody . "-------------------------------" . chr(13) . chr(10);

			$myBody=$myBody . "Order Content" . chr(13) . chr(10);



				$myQuery.="insert into orders_header (schoolname,city,phone1,phone2,contact,cemail,orderdate,deliverydate) values ( ";

				$myQuery.="'" . $_POST['school'] . "',";

				$myQuery.="'" . $_POST['city'] . "',";

				$myQuery.="'" . $_POST['phone1'] . "',";

				$myQuery.="'" . $_POST['phone2'] . "',";

				$myQuery.="'" . $_POST['school2'] . "',";

				$myQuery.="'" . $_POST['cemail'] . "',";

				$myQuery.="'" . $_POST['datetoday'] . "',";

				$myQuery.="'" . $_POST['deliverydate'] . "')";

				mysql_query($myQuery);

				$myQuery="select ID from orders_header where ";

				$myQuery.="schoolname='" . $_POST['school'] . "' and ";

				$myQuery.="city='" . $_POST['city'] . "' and ";

				$myQuery.="phone1='" . $_POST['phone1'] . "' and ";

				$myQuery.="phone2='" . $_POST['phone2'] . "' and ";

				$myQuery.="contact='" . $_POST['school2'] . "' and ";

				$myQuery.="cemail='" . $_POST['cemail'] . "' and ";

				$myQuery.="orderdate='" . $_POST['datetoday'] . "' and ";

				$myQuery.="deliverydate='" . $_POST['deliverydate'] . "'";

				$rezult=mysql_query($myQuery);

				$ID=mysql_result($rezult,0,"ID");





			if (strlen(trim($_POST['1002-D']))>0) {
			$myBody=$myBody . "1002-D Chocolate Chip DeLite, 30g, Bulk(96/case) = " . $_POST['1002-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'1002-D','Chocolate Chip DeLite, 30g, Bulk(96/case)','" .$_POST['1002-D'] . "')";
			mysql_query($myQuery);

			}

			if (strlen(trim($_POST['3002-D']))>0) {
			$myBody=$myBody . "3002-D Oatmeal Raisin 30g, Bulk(96/case) = " . $_POST['3002-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'3002-D','Oatmeal Raisin 30g, Bulk(96/case)','" .$_POST['3002-D'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['4002-D']))>0) {
			$myBody=$myBody . "4002-D Fudge Chip DeLite 30g, Bulk(96/case) = " . $_POST['4002-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'4002-D','Fudge Chip DeLite 30g, Bulk(96/case)','" .$_POST['4002-D'] . "')";
			mysql_query($myQuery);
			}
			if (strlen(trim($_POST['5002-D']))>0) {
			$myBody=$myBody . "5002-D Oatmeal Choc Chip Delite 30g, Bulk(96/case) = " . $_POST['5002-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'5002-D','Oatmeal Choc Chip Delite 30g, Bulk(96/case)','" .$_POST['5002-D'] . "')";
			mysql_query($myQuery);
			}
			if (strlen(trim($_POST['6002-D']))>0) {
			$myBody=$myBody . "6002-D Oatmeal DeLite 30g, Bulk(96/case) = " . $_POST['6002-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'6002-D','Oatmeal DeLite 30g, Bulk(96/case)','" .$_POST['6002-D'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['1003-D']))>0) {
			$myBody=$myBody . "1003-D Chocolate Chip DeLite Large, Wrapped(48/case) = " . $_POST['1003-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'1003-D','Chocolate Chip DeLite Large, Wrapped(48/case)','" .$_POST['1003-D'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['3003-D']))>0) {
			$myBody=$myBody . "3003-D Oatmeal Raison DeLite Large, Wrapped(48/case) = " . $_POST['3003-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'3003-D','Oatmeal Raison DeLite Large, Wrapped(48/case)','" .$_POST['3003-D'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['4003-D']))>0) {
			$myBody=$myBody . "4003-D Fudge Chip DeLite Large, Wrapped(48/case) = " . $_POST['4003-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'4003-D','Fudge Chip DeLite Large, Wrapped(48/case)','" .$_POST['4003-D'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['5003-D']))>0) {
			$myBody=$myBody . "5003-D Oatmeal Choc Chip DeLite Large, Wrapped(48/case) = " . $_POST['5003-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'5003-D','Oatmeal Choc Chip DeLite Large, Wrapped(48/case)','" .$_POST['5003-D'] . "')";
			mysql_query($myQuery);
			}




			if (strlen(trim($_POST['6003-D']))>0) {
			$myBody=$myBody . "6003-D Oatmeal DeLite Large, Wrapped(48/case) = " . $_POST['6003-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'6003-D','Oatmeal DeLite Large, Wrapped(48/case)','" .$_POST['6003-D'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['1004-D']))>0) {
			$myBody=$myBody . "1004-D Chocolate Chip DeLite Large, Bulk(48/case) = " . $_POST['1004-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'1004-D','Chocolate Chip DeLite Large, Bulk(48/case)','" .$_POST['1004-D'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['3004-D']))>0) {
			$myBody=$myBody . "3004-D Oatmeal Raison DeLite Large, Bulk(48/case) = " . $_POST['3004-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'3004-D','Oatmeal Raison DeLite Large, Bulk(48/case))','" .$_POST['3004-D'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['4004-D']))>0) {
			$myBody=$myBody . "4004-D Fudge Chip DeLite Large, Bulk(48/case) = " . $_POST['4004-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'4004-D','Fudge Chip DeLite Large, Bulk(48/case))','" .$_POST['4004-D'] . "')";
			mysql_query($myQuery);
			}


			if (strlen(trim($_POST['5004-D']))>0) {
			$myBody=$myBody . "5004-D Oatmeal Choc Chip DeLite Large, Bulk(48/case) = " . $_POST['5004-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'5004-D','Oatmeal Choc Chip DeLite Large, Bulk(48/case))','" .$_POST['5004-D'] . "')";
			mysql_query($myQuery);
			}



			if (strlen(trim($_POST['6004-D']))>0) {
			$myBody=$myBody . "6004-D Oatmeal DeLite Large, Bulk(48/case) = " . $_POST['6004-D'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'6004-D','Oatmeal DeLite Large, Bulk(48/case)','" .$_POST['6004-D'] . "')";
			mysql_query($myQuery);
			}


//
			if (strlen(trim($_POST['T-1001']))>0) {
			$myBody=$myBody . "T-1001 Chocolate Chip Tiny, Bulk(288/case) = " . $_POST['T-1001'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'T-1001','Chocolate Chip Tiny, Bulk(288/case','" .$_POST['T-1001'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['T-4101']))>0) {
			$myBody=$myBody . "T-4101 White Chocolate Fudge Tiny, Bulk(288/case) = " . $_POST['T-4101'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'T-4101','White Chocolate Fudge Tiny, Bulk(288/case)','" .$_POST['T-4101'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['T-10001']))>0) {
			$myBody=$myBody . "T-10001 White Chocolate Tiny, Bulk(288/case) = " . $_POST['T-10001'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'T-10001','White Chocolate Tiny, Bulk(288/case)','" .$_POST['T-10001'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['1003']))>0) {
			$myBody=$myBody . "1003 Chocolate Chip Large, Wrapped(48/case) = " . $_POST['1003'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'1003','Chocolate Chip Large, Wrapped(48/case)','" .$_POST['1003'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['1103']))>0) {
			$myBody=$myBody . "1103 Casey's-Caramel . Choc Large, Wrapped(48/case) = " . $_POST['1103'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'1103','Casey`s-Caramel . Choc Large, Wrapped(48/case)','" .$_POST['1103'] . "')";
			mysql_query($myQuery);
			}





			if (strlen(trim($_POST['1203']))>0) {

			$myBody=$myBody . "1203 Choc Chip w `Attitude` Large, Wrapped(48/case) = " . $_POST['1203'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'1203','Choc Chip w `Attitude` Large, Wrapped(48/case)','" .$_POST['1203'] . "')";

			mysql_query($myQuery);

			}





			if (strlen(trim($_POST['3003']))>0) {

			$myBody=$myBody . "3003 Oatmeal Raisin Large, Wrapped(48/case) = " . $_POST['3003'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'3003','Oatmeal Raisin Large, Wrapped(48/case)','" .$_POST['3003'] . "')";

			mysql_query($myQuery);

			}





			if (strlen(trim($_POST['4003']))>0) {

			$myBody=$myBody . "4003 Fudge Chip Large, Wrapped(48/case) = " . $_POST['4003'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'4003','Fudge Chip Large, Wrapped(48/case)','" .$_POST['4003'] . "')";

			mysql_query($myQuery);

			}





			if (strlen(trim($_POST['4103']))>0) {
			$myBody=$myBody . "4103 White Chunk Fudge Large, Wrapped(48/case) = " . $_POST['4103'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'4103','White Chunk Fudge Large, Wrapped(48/case)','" .$_POST['4103'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['5003']))>0) {

			$myBody=$myBody . "5003 Oatmeal Choc Chip Large, Wrapped(48/case) = " . $_POST['5003'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'5003','Oatmeal Choc Chip Large, Wrapped(48/case)','" .$_POST['5003'] . "')";

			mysql_query($myQuery);

			}

			if (strlen(trim($_POST['1004']))>0) {
			$myBody=$myBody . "1004 Chocolate Chip Large, Bulk(48/case) = " . $_POST['1004'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'1004','Chocolate Chip Large, Bulk(48/case)','" .$_POST['1004'] . "')";
			mysql_query($myQuery);

			}

			if (strlen(trim($_POST['1104']))>0) {
			$myBody=$myBody .  "1104 Casey's- Caramel & Choc Large, Bulk(48/case) = " . $_POST['1104'] . " case(s)" . chr(13) . chr(10);
			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'1104','Casey`s- Caramel & Choc Large, Bulk(48/case)','" .$_POST['1104'] . "')";
			mysql_query($myQuery);
			}

			if (strlen(trim($_POST['1204']))>0) {

			$myBody=$myBody  . "1204 Choc Chip w `Attitude` Large, Bulk(48/case) = " . $_POST['1204'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'1204','Choc Chip w `Attitude` Large, Bulk(48/case)','" .$_POST['1204'] . "')";

			mysql_query($myQuery);

			}





			if (strlen(trim($_POST['3004']))>0) {

			$myBody=$myBody  . "3004 Oatmeal Raisin Large, Bulk(48/case) = " . $_POST['3004'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'3004','Oatmeal Raisin Large, Bulk(48/case)','" .$_POST['3004'] . "')";

			mysql_query($myQuery);

			}





			if (strlen(trim($_POST['4004']))>0) {

			$myBody=$myBody . "4004 Fudge Chip Large, Bulk(48/case) = " . $_POST['4004'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'4004','Fudge Chip Large, Bulk(48/case)','" .$_POST['4004'] . "')";

			mysql_query($myQuery);

			}





			if (strlen(trim($_POST['4104']))>0) {

			$myBody=$myBody  . "4104 White Chunk Fudge Large, Bulk(48/case) = " . $_POST['4104'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'4104','White Chunk Fudge Large, Bulk(48/case','" .$_POST['4104'] . "')";

			mysql_query($myQuery);			

			}





			if (strlen(trim($_POST['5004']))>0) {

			$myBody=$myBody . "5004 Oatmeal Choc Chip Large, Bulk(48/case) = " . $_POST['5004'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'5004','Oatmeal Choc Chip Large, Bulk(48/case','" .$_POST['5004'] . "')";

			mysql_query($myQuery);

			}





			if (strlen(trim($_POST['7002']))>0) {

			$myBody=$myBody .  "7002 Oatmeal Chocolate Chip Small, Bulk(96/case) = " . $_POST['7002'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'7002','Oatmeal Chocolate Chip Small, Bulk(96/case)','" .$_POST['7002'] . "')";

			mysql_query($myQuery);

			}







			if (strlen(trim($_POST['7102']))>0) {

			$myBody=$myBody .  "7102 Fudge Chip Mookie Small, Bulk(96/case) = " . $_POST['7102'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'7102','Fudge Chip Mookie Small, Bulk(96/case)','" .$_POST['7102'] . "')";

			mysql_query($myQuery);

			}







			if (strlen(trim($_POST['7003']))>0) {

			$myBody=$myBody .  "7003 Oatmeal Chocolate Chip Large, Wrapped(48/case) = " . $_POST['7003'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'7003','Oatmeal Chocolate Chip Large, Wrapped(48/case)','" .$_POST['7003'] . "')";

			mysql_query($myQuery);

			}









			if (strlen(trim($_POST['7103']))>0) {

			$myBody=$myBody .  "7103 Fudge Chip Mookie Large, Wraped(48/case) = " . $_POST['7103'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'7103','Fudge Chip Mookie Large, Wraped(48/case)','" .$_POST['7103'] . "')";

			mysql_query($myQuery);

			}





 



			if (strlen(trim($_POST['7004']))>0) {

			$myBody=$myBody .  "7004 Oatmeal Chocolate Chip Large, Bulk(48/case) = " . $_POST['7004'] . " case(s)" . chr(13) .chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'7004','Oatmeal Chocolate Chip Large, Bulk(48/case)','" .$_POST['7004'] . "')";

			mysql_query($myQuery);

	}



 



			if (strlen(trim($_POST['7104']))>0) {

			$myBody=$myBody  . "7104 Fudge Chip Mookie Large, Bulk(48/case) = " . $_POST['7104'] . " case(s)" . chr(13)  . chr(10);		

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'7104','Fudge Chip Mookie Large, Bulk(48/case)','" .$_POST['7104'] . "')";

			mysql_query($myQuery);

			}







			if (strlen(trim($_POST['Dawg-D']))>0) {

			$myBody=$myBody  . "Dawg-D DuneDawg (Rice Krispie Bar) Large, Wrapped(48/case) = " . $_POST['Dawg-D'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'DAWG-D','DuneDawg (Rice Krispie Bar) Large, Wrapped(48/case)','" .$_POST['Dawg-D'] . "')";

			mysql_query($myQuery);

			}





			if (strlen(trim($_POST['Dawg-M']))>0) {

			$myBody=$myBody  . "Dawg-M MudDawg (Rice Krispie Bar with Chocolate) Large, Wrapped(48/case) = " . $_POST['Dawg-M'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'DAWG-M','MudDawg (Rice Krispie Bar with Chocolate) Large, Wrapped(48/case)','" .$_POST['Dawg-M'] . "')";

			mysql_query($myQuery);

			}



			if (strlen(trim($_POST['8003-P']))>0) {

			$myBody=$myBody  . "8003-P Vanilla Pumpkin (Oct) Large, Wrapped(48/case) = " . $_POST['8003-P'] . " case(s)" . chr(13)  . chr(10);		

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'8003-P','Vanilla Pumpkin (Oct) Large, Wrapped(48/case)','" .$_POST['8003-P'] . "')";

			mysql_query($myQuery);

			}



			if (strlen(trim($_POST['8003-S']))>0) {

			$myBody=$myBody  . "8003-S Vanilla Snowman (Nov/Dec/Jan) Large, Wrapped(48/case) = " . $_POST['8003-S'] . " case(s)" . chr(13)  . chr(10);		

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'8003-S','Vanilla Snowman (Nov/Dec/Jan) Large, Wrapped(48/case)','" .$_POST['8003-S'] . "')";

			mysql_query($myQuery);

			}



			if (strlen(trim($_POST['9003-GT']))>0) {

			$myBody=$myBody  . "9003-GT Ginger Teddy (Nov/Dec) Large, Wrapped(48/case) = " . $_POST['9003-GT'] . " case(s)" . chr(13)  . chr(10);		

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'9003-S','Ginger Teddy (Nov/Dec) Large, Wrapped(48/case)','" .$_POST['9003-S'] . "')";

			mysql_query($myQuery);

			}



			if (strlen(trim($_POST['8003-H']))>0) {

			$myBody=$myBody  . "8003-H Vanilla Heart (Feb) Large, Wrapped(48/case) = " . $_POST['8003-H'] . " case(s)" . chr(13)  . chr(10);		

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'8003-H','Vanilla Heart (Feb) Large, Wrapped(48/case)','" .$_POST['8003-H'] . "')";

			mysql_query($myQuery);

			}



			if (strlen(trim($_POST['8003-B']))>0) {

			$myBody=$myBody  . "8003-B Vanilla Butterfly (Mar/Apr/May) Large, Wrapped(48/case) = " . $_POST['8003-B'] . " case(s)" . chr(13)  . chr(10);		

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'8003-B','Vanilla Butterfly (Mar/Apr/May) Large, Wrapped(48/case)','" .$_POST['8003-B'] . "')";

			mysql_query($myQuery);

			}

			

			if (strlen(trim($_POST['8002-ML']))>0) {

			$myBody=$myBody  . "8002-ML Vanilla Maple Leaf (June) Small,Bulk(96/case) = " . $_POST['8002-ML'] . " case(s)" . chr(13)  . chr(10);		

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'8002-ML','Vanilla Maple Leaf (June) Small,Bulk(96/case)','" .$_POST['8002-ML'] . "')";

			mysql_query($myQuery);

			}			



			if (strlen(trim($_POST['IceDawgI']))>0) {

			$myBody=$myBody  . "IceDawg I Chocolate Chip Large, Wrapped(48/case) = " . $_POST['IceDawgI'] . " case(s)" . chr(13)  . chr(10);		

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'IceDawg I','Chocolate Chip Large, Wrapped(48/case)','" .$_POST['IceDawgI'] . "')";

			mysql_query($myQuery);

			}

			if (strlen(trim($_POST['IceDawgIV']))>0) {

			$myBody=$myBody  . "Ice Dawg IV Fudge Chip Large, Wrapped(48/case) = " . $_POST['IceDawgIV'] . " case(s)" . chr(13)  . chr(10);		

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'Ice Dawg IV','Fudge Chip Large, Wrapped(48/case)','" .$_POST['IceDawgIV'] . "')";

			mysql_query($myQuery);

			}





			if (strlen(trim($_POST['GF-10']))>0) {

			$myBody=$myBody  . "GF-10 Gluten Free Chocolate Chip Cookies ½ lb bag, 225 gram = " . $_POST['GF-10'] . " bag(s)" . chr(13)  . chr(10);

	

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'GF-10','Gluten Free Chocolate Chip Cookies ½ lb bag, 225 gram','" .$_POST['GF-10'] . "')";

			mysql_query($myQuery);

	}





			if (strlen(trim($_POST['GF-15']))>0) {

			$myBody=$myBody  . "GF-15 Gluten Free Brownies 7 ½ “ pan, 325 gram = " . $_POST['GF-15'] . " pan(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'GF-15','Gluten Free Brownies 7 ½ “ pan, 325 gram ','" .$_POST['GF-15'] . "')";

			mysql_query($myQuery);

	}

	





			if (strlen(trim($_POST['GF-24']))>0) {

			$myBody=$myBody  . "GF-24 Unbaked Pastry , 250 gram = " . $_POST['GF-24'] . " pan(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'GF-24','Unbaked Pastry , 250 gram','" .$_POST['GF-24'] . "')";

			mysql_query($myQuery);

			}

			if (strlen(trim($_POST['GF-26']))>0) {

			$myBody=$myBody  . "GF-26,27,28 Unbaked Apple, Blueberry, Cherry Pies  8 ” pan, 450 gram = " . $_POST['GF-26'] . " pan(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'GF-26,27,28','Unbaked Apple, Blueberry, Cherry Pies  8 ” pan, 450 gram','" .$_POST['GF-26'] . "')";

			mysql_query($myQuery);

			}



			if (strlen(trim($_POST['OASISApple']))>0) {

			$myBody=$myBody .  "OASIS Apple Juice 200 ml tetra(30/case) = " . $_POST['OASISApple'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'OASISApple','OASIS Apple Juice 200 ml tetra(30/case)','" .$_POST['OASISApple'] . "')";

			mysql_query($myQuery);

			}





			if (strlen(trim($_POST['OASISWildberry']))>0) {

			$myBody=$myBody  . "OASIS Wildberry Juice 200 ml tetra(30/case) = " . $_POST['OASISWildberry'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'OASIS Wildberry','OASIS Wildberry Juice 200 ml tetra(30/case)','" .$_POST['OASISWildberry'] . "')";

			mysql_query($myQuery);

			}





			if (strlen(trim($_POST['OASISTropical']))>0) {

			$myBody=$myBody  . "OASIS Seven Fruit Tropical Juice 200 ml tetra(30/case) = " . $_POST['OASISTropical'] . " case(s)" . chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'OASISTropical','OASIS Seven Fruit Tropical Juice 200 ml tetra(30/case)','" .$_POST['OASISTropical'] . "')";

			mysql_query($myQuery);

			}









			if (strlen(trim($_POST['other']))>0) {

			$myBody=$myBody . "Other :" . $_POST['other'] .  chr(13) . chr(10);

			$myQuery="insert into orders_items (OrderID,Product,ProductName,Qty) values (" . $ID . ",'Other','".$_POST['other'] . "','1')";

			mysql_query($myQuery);

			}





    	   		$_SESSION['1002-D']='';
	   		$_SESSION['3002-D'] ='';
	   		$_SESSION['4002-D']='';
	   		$_SESSION['5002-D'] ='';
	   		$_SESSION['6002-D'] ='';

	   		$_SESSION['1003-D']='';
	   		$_SESSION['3003-D'] ='';
	   		$_SESSION['4003-D'] ='';
	   		$_SESSION['5003-D'] ='';
	   		$_SESSION['6003-D'] ='';

	   		$_SESSION['1004-D']='';
	   		$_SESSION['3004-D'] ='';
	   		$_SESSION['4004-D'] ='';
	   		$_SESSION['5004-D'] ='';
	   		$_SESSION['6004-D'] ='';

	   		$_SESSION['T-1001'] ='';
			$_SESSION['T-4101'] ='';
	   		$_SESSION['T-10001'] ='';
			$_SESSION['V1003'] ='';
			$_SESSION['V1103'] ='';
//	   		$_SESSION['1203'] = $_POST['1203'] ;
	   		//$_SESSION['V3003'] = $_POST['3003'] ;
	   		//$_SESSION['V4003'] = $_POST['4003'] ;
	   		$_SESSION['V4103'] ='';
	   		//$_SESSION['V1003'] = $_POST['1003'] ;
	   		//$_SESSION['V5003'] = $_POST['5003'] ;	   		
//	   		$_SESSION['4103'] = $_POST['4103'] ;
//	   		$_SESSION['5003'] = $_POST['5003'] ;
	   		$_SESSION['V1004'] ='';
	   		$_SESSION['V1104'] ='';
	   		//$_SESSION['V3004'] = $_POST['3004'] ;
	   		//$_SESSION['V4004'] = $_POST['4004'] ;
	   		$_SESSION['V4104'] ='';
	   		$_SESSION['V5004'] ='';
//	   		$_SESSION['1204'] = $_POST['1204'] ;
	   		$_SESSION['V7002']='';
	   		$_SESSION['V7102'] ='';
	   		$_SESSION['V7003'] ='';
	   		$_SESSION['V7103'] ='';
	   		$_SESSION['V7004'] ='';
	   		$_SESSION['V7104'] ='';
	   		$_SESSION['DAWG-D'] ='';
	   		$_SESSION['DAWG-M'] ='';
	   		$_SESSION['8003-P']='';
	   		$_SESSION['8003-S']='';
	   		$_SESSION['8003-H']='';
	   		$_SESSION['8003-B']='';
	   		$_SESSION['8002-ML']='';
	   		$_SESSION['9003-GT']='';
	   		$_SESSION['IceDawgI'] ='';
	   		$_SESSION['IceDawgIV'] ='';
	   		$_SESSION['OASISApple'] ='';
	   		$_SESSION['OASISWildberry']='';
	   		$_SESSION['OASISTropical'] ='';
	   		$_SESSION['BEAT'] ='';
	   		$_SESSION['GF-10'] ='';
	   		$_SESSION['GF-15'] ='';
	   		$_SESSION['GF-24'] ='';
			$_SESSION['GF-26'] ='';
	   		$_SESSION['other'] ='';

		$_SESSION['school'] = '';

		$_SESSION['school2'] = '';

		$_SESSION['cemail'] = '';

		$_SESSION['city'] = '';

		$_SESSION['deliverydate'] = '';

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

			$_SESSION['ErrorMsg']=$myErrorMsg;

			//die($_SESSION['ErrorMsg']);

		$host  = $_SERVER['HTTP_HOST'];

		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

		$extra = 'order_testSept2010.php';

		header("Location: http://$host$uri/$extra");

	   }

   }

   else

   {

    	   		$_SESSION['1002-D']='';
	   		$_SESSION['3002-D'] ='';
	   		$_SESSION['4002-D']='';
	   		$_SESSION['5002-D'] ='';
	   		$_SESSION['6002-D'] ='';

	   		$_SESSION['1003-D']='';
	   		$_SESSION['3003-D'] ='';
	   		$_SESSION['4003-D'] ='';
	   		$_SESSION['5003-D'] ='';
	   		$_SESSION['6003-D'] ='';

	   		$_SESSION['1004-D']='';
	   		$_SESSION['3004-D'] ='';
	   		$_SESSION['4004-D'] ='';
	   		$_SESSION['5004-D'] ='';
	   		$_SESSION['6004-D'] ='';

	   		$_SESSION['T-1001'] ='';
			$_SESSION['T-4101'] ='';
	   		$_SESSION['T-10001'] ='';
			$_SESSION['V1003'] ='';
			$_SESSION['V1103'] ='';
//	   		$_SESSION['1203'] = $_POST['1203'] ;
	   		//$_SESSION['V3003'] = $_POST['3003'] ;
	   		//$_SESSION['V4003'] = $_POST['4003'] ;
	   		$_SESSION['V4103'] ='';
	   		//$_SESSION['V1003'] = $_POST['1003'] ;
	   		//$_SESSION['V5003'] = $_POST['5003'] ;	   		
//	   		$_SESSION['4103'] = $_POST['4103'] ;
//	   		$_SESSION['5003'] = $_POST['5003'] ;
	   		$_SESSION['V1004'] ='';
	   		$_SESSION['V1104'] ='';
	   		//$_SESSION['V3004'] = $_POST['3004'] ;
	   		//$_SESSION['V4004'] = $_POST['4004'] ;
	   		$_SESSION['V4104'] ='';
	   		$_SESSION['V5004'] ='';
//	   		$_SESSION['1204'] = $_POST['1204'] ;
	   		$_SESSION['V7002']='';
	   		$_SESSION['V7102'] ='';
	   		$_SESSION['V7003'] ='';
	   		$_SESSION['V7103'] ='';
	   		$_SESSION['V7004'] ='';
	   		$_SESSION['V7104'] ='';
	   		$_SESSION['DAWG-D'] ='';
	   		$_SESSION['DAWG-M'] ='';
	   		$_SESSION['8003-P']='';
	   		$_SESSION['8003-S']='';
	   		$_SESSION['8003-H']='';
	   		$_SESSION['8003-B']='';
	   		$_SESSION['8002-ML']='';
	   		$_SESSION['9003-GT']='';
	   		$_SESSION['IceDawgI'] ='';
	   		$_SESSION['IceDawgIV'] ='';
	   		$_SESSION['OASISApple'] ='';
	   		$_SESSION['OASISWildberry']='';
	   		$_SESSION['OASISTropical'] ='';
	   		$_SESSION['BEAT'] ='';
	   		$_SESSION['GF-10'] ='';
	   		$_SESSION['GF-15'] ='';
	   		$_SESSION['GF-24'] ='';
			$_SESSION['GF-26'] ='';
	   		$_SESSION['other'] ='';

		$_SESSION['school'] = '';

		$_SESSION['school2'] = '';

		$_SESSION['cemail'] = '';

		$_SESSION['city'] = '';

		$_SESSION['deliverydate'] = '';

		$_SESSION['phone1'] = '';

		$_SESSION['phone2'] = '';

		$_SESSION['ErrorMsg']='';

		$host  = $_SERVER['HTTP_HOST'];

		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

		$extra = 'order_test2010.html';

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