<html>
<head><h1>Disbursement</h1>
</head>


	<body>
	
	<?php
	$bank_code="";
	$account_number="";
	$amount="";
	$remark="";
		require 'db_connection.php';
		if(isset($_POST['submit'])){
			$username= $_POST['username'];
			$password= $_POST['password'];
			$amount= $_POST['amount'];
			$remark= $_POST['remark'];
			
			$query="SELECT * from admin where username ='$username' and password ='$password';";
			$result=mysqli_query($dbConn, $query);
			$resultcheck=mysqli_num_rows($result);
			
			if($resultcheck>0) {
				while ($rows=mysqli_fetch_assoc($result)) {
					echo "<br><br>"; echo "Username: "; echo $rows['username']; 
					echo "<br>";echo "Bank Code: "; echo $bank_code=$rows['bank_code']; 
					echo "<br>";echo "Account Number: "; echo $account_number=$rows['account_number']; 
					echo "<br>";echo "Amount: Rp."; echo $amount; 
					echo "<br>";echo "Remark: "; echo $remark; 
				}
			} else {
				echo "User not found.";
				die;
			}			
		}
	?>
	
	<form action="" method="POST">
		Do you want to continue?
		<br><input type="submit" name="ok" value="ok">
		<br><input type="submit" name="cancel" value="cancel">
	</form>
	
	<?php
	
	if (isset($_POST['ok'])){
				http_disburse_req("https://api.github.com/users/petanikode", $bank_code, $account_number, $amount, $remark); //
	} else {
		die;
	}
	?>

	

	<?php
	

		function http_disburse_req($url, $bank_code, $account_number, $amount, $remark) {
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, "$url");			
			curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			//to send data to Slightly-ig flip
			curl_setopt($ch, CURLOPT_POST, 1);
			$payloads = [
				"bank_code" => $bank_code,
				"account_number" => $account_number,
				"amount" => $amount,
				"remark" => $remark,
			];
			curl_setopt($ch, CURLOPT_POSTFIELDS,$a=http_build_query($payloads)); echo"<br>";echo($a);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array( "Content-Type: application/x-www-form-urlencoded"));
			curl_setopt($ch, CURLOPT_USERPWD, "xyz");
			//end of Slightly-big flip
			
			
			$output = curl_exec($ch); 
			curl_close($ch);      	
			
			
			$output = json_decode($output, TRUE);

			/*echo "<pre>";
			print_r($output);
			echo "</pre>";*/
		}

	?>	
	
	</body>



<html>