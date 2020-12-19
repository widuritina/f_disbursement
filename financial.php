<html>
<head><h1>Disbursement</h1>
</head>


	<body>
	
	<form action="" method="POST">
		<br><br>Please fill you disbursement detail.<br>
		Username: <input type="text" name="username" value=""><br>
		Password: <input type="text" name="password" value=""><br>
		Amount : Rp<input type="text" name="amount" value=""><br>
		Remark : <input type="text" name="remark" value=""><br>
		Do you want to continue disbursement ?
		<input type="submit" name="submit" value="submit">
	</form>

	
	<?php
		require 'db_connection.php';
		include("functions.php");
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
					echo "<br><br>"; 
					echo "<br>";echo "Username: "; echo $rows['username']; 
					echo "<br>";echo "Bank Code: "; echo $bank_code=$rows['bank_code']; 
					echo "<br>";echo "Account Number: "; echo $account_number=$rows['account_number']; 
					echo "<br>";echo "Amount: Rp."; echo $amount; 
					echo "<br>";echo "Remark: "; echo $remark; 
					echo "<br>";echo "..sending disburse request.. ";
				}

//curl to slightly-big flip				
				$output=http_disburse_req("https://nextar.flip.id/disburse", $bank_code, $account_number, $amount, $remark);
				$output = json_decode($output, TRUE);
				/*echo "<pre>";
				print_r($output);
				echo "</pre>";*/
			
				
				echo"<br>"; echo "<br>"; echo "..accepting response.. "; 			
				echo"<br>"; echo "Username: "; 			echo $username;
				echo"<br>"; echo "Id: "; 				echo $id=$output["id"];
				echo"<br>"; echo "Bank Code: ";			echo $bank_code=$output["bank_code"];
				echo"<br>"; echo "Account Number: ";	echo $account_number=$output["account_number"];
				echo"<br>"; echo "Amount: "; 			echo $amount=$output["amount"];
				echo"<br>"; echo "Remark: "; 			echo $remark=$output["remark"];
				echo"<br>"; echo "Status: "; 			echo $status=$output["status"];
				echo"<br>"; echo "Beneficiary Name: "; 	echo $benef_name=$output["beneficiary_name"];
				echo"<br>"; echo "Timestamp: "; 		echo $timestamp=$output["time_served"];
				echo"<br>"; echo "Receipt: "; 			echo $output["receipt"];
				$receipt=$output['receipt'];
				
				$query="INSERT INTO disburse_db (username, bank_code, account_number, amount, remark, status, benef_name,timestamp, id, receipt) VALUES ('$username', '$bank_code', '$account_number', '$amount', '$remark', '$status', '$benef_name', '$timestamp', '$id', '$receipt');";
				query_db($query);	

				
				if (strcmp($status,"SUCCESS")!=0) {
					echo "<br>"; echo "Your disbursement status is "; echo $status; 
					echo "<br>"; echo "Please check into status activity.";
				} else {
					header("Location: $receipt");
				}
				
			} else {
				echo "User not found.";
				mysqli_close($dbConn);
				die;
			}
		}
		
		
	?>

	</body>



<html>