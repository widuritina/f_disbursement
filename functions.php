<html>
<head><h1></h1>
</head>


	<body>
	
	<?php
		function http_disburse_req($url, $bank_code, $account_number, $amount, $remark) {
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, "$url");			
			curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
//to send data to Slightly-big flip
			curl_setopt($ch, CURLOPT_POST, 1);
			$payloads = [
				"bank_code" => $bank_code,
				"account_number" => $account_number,
				"amount" => $amount,
				"remark" => $remark,
			];
			curl_setopt($ch, CURLOPT_POSTFIELDS,$a=http_build_query($payloads)); //echo"<br>";echo($a);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array( "Content-Type: application/x-www-form-urlencoded"));
			curl_setopt($ch, CURLOPT_USERPWD, "HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41");
			
//end of Slightly-big flip
			
			$output = curl_exec($ch); 
			curl_close($ch);  
			return $output;
		}
		
		function http_disburse_stat($url) {
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, "$url");	
			curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_USERPWD, "HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41");

			$output = curl_exec($ch); 
			curl_close($ch);  
			return $output;
		}
		
		function query_db($query) {
			require 'db_connection.php';
			//echo "<br>";echo($query);
			if(mysqli_query($dbConn, $query)) {
				echo"<br>";echo("Data inserted");
			} else {
				echo"<br>";echo("Failed to  insert data");
				echo(mysqli_error($dbConn));
			}
			//mysqli_close($dbConn);
		}
	?>	
	
	</body>



<html>