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
					/*echo "<br><br>"; echo "Username: "; echo $rows['username']; 
					echo "<br>";echo "Bank Code: "; echo 
					echo "<br>";echo "Account Number: "; echo 
					echo "<br>";echo "Amount: Rp."; echo $amount; 
					echo "<br>";echo "Remark: "; echo $remark; 
					echo "<br>";echo "Time: "; echo */
					$bank_code=$rows['bank_code']; 
					$account_number=$rows['account_number']; 
					$timestamp=strftime("%Y-%m-%d %X"); 
				}

//curl to slightly-big flip				
				$output=http_disburse_req("https://api.github.com/users/petanikode", $bank_code, $account_number, $amount, $remark);
				$output = json_decode($output, TRUE);
				/*echo "<pre>";
				print_r($output);
				echo "</pre>";*/
			
				echo"<br>"; echo "Username: "; 			echo $username;
				echo"<br>"; echo "Id: "; 				echo $id=$output["id"];
				echo"<br>"; echo "Bank Code: ";			echo $bank_code=$output["public_repos"];
				echo"<br>"; echo "Account Number: ";	echo $account_number=$output["followers"];
				echo"<br>"; echo "Amount: "; 			echo $amount=$output["following"];
				echo"<br>"; echo "Remark: "; 			echo $remark=$output["node_id"];
				echo"<br>"; echo "Status: "; 			echo $status=$output["type"];
				echo"<br>"; echo "Beneficiary Name: "; 	echo $benef_name=$output["name"];
				echo"<br>"; echo "Timestamp: "; 		echo $timestamp=$output["updated_at"];
				//insert_db($username, $bank_code, $account_number, $amount, $remark, $status, $benef_name, $timestamp, $id);
				$query="INSERT INTO disburse_db (username, bank_code, account_number, amount, remark, status, benef_name,timestamp, id) VALUES ('$username', '$bank_code', '$account_number', '$amount', '$remark', '$status', '$benef_name', '$timestamp', '$id');";
				query_db($query);			
				
			} else {
				echo "User not found.";
				mysqli_close($dbConn);
				die;
			}
		}
		
		
	?>

	</body>



<html>