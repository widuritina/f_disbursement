<html>
<head><h1>Disbursement Status</h1>
</head>


	<body>

	<form action="" method="POST">
		<br><br>Please fill you disbursement detail.<br>
		Username: <input type="text" name="username" value=""><br>
		Disburse Id: <input type="text" name="id" value=""><br>
		Do you want to continue disbursement ?
		<input type="submit" name="submit" value="submit">
	</form>

	<?php
		include ("functions.php");
		require 'db_connection.php';
		if(isset($_POST['submit'])){
			$username= $_POST['username'];
			$id= $_POST['id'];
			
			$query="SELECT * from disburse_db where username ='$username' and id ='$id';";
			$result=mysqli_query($dbConn, $query);		
			$resultcheck=mysqli_num_rows($result);
			if($resultcheck>0) {
				$amount="";
				$remark="";
				while ($rows=mysqli_fetch_assoc($result)) {
					/*
					echo "<br><br>"; echo "Username: "; echo $rows['username']; 
					echo "<br>";echo "Bank Code: "; echo $bank_code=$rows['bank_code']; 
					echo "<br>";echo "Account Number: "; echo $account_number=$rows['account_number']; 
					echo "<br>";echo "Amount: Rp."; echo $amount=$rows['amount']; 
					echo "<br>";echo "Remark: "; echo $rows['id']; 
					echo "<br>";echo "Time: "; echo $rows['timestamp']; 
					echo "<br>";echo "Status: "; echo $status=$rows['status']; 
					*/
					$status=$rows['status'];
					$id=$rows['id'];
					$receipt=$rows['receipt'];
				}
				
//check status in db				
				if (strcmp($status, "SUCCESS")==0) {
					header("Location: $receipt");
					
				} else {
					
					echo "<br>";
					echo "<br>";echo "..need to send another check status..";
					echo "<br>";echo "..accepting response..";	
					
//send disbursment status request
					$output=http_disburse_stat("https://nextar.flip.id/disburse/{$id}"); //
					$output = json_decode($output, TRUE);
					
					echo "<pre>";
					print_r($output);
					echo "</pre>";
					echo"<br>"; echo "Username: "; 			echo $username;
					echo"<br>"; echo "Id: "; 				echo $id=$output["id"];
					echo"<br>"; echo "Bank Code: ";			echo $bank_code=$output["bank_code"];
					echo"<br>"; echo "Account Number: ";	echo $account_number=$output["account_number"];
					echo"<br>"; echo "Amount: "; 			echo $amount=$output["amount"];
					echo"<br>"; echo "Remark: "; 			echo $remark=$output["remark"];
					echo"<br>"; echo "Status: "; 			echo $status=$output["status"];
					echo"<br>"; echo "Beneficiary Name: "; 	echo $benef_name=$output["beneficiary_name"];
					echo"<br>"; echo "Timestamp: "; 		echo $timestamp=$output["time_served"];
					$receipt=$output['receipt'];
					
					$query="UPDATE disburse_db SET status='$status', receipt='$receipt' WHERE id='$id' and username='$username';";
					query_db($query);
					mysqli_close($dbConn);

					header("Location: $receipt");

				} 
			} 
			else {
				echo "User and id not match.";
				mysqli_close($dbConn);
				die;

			}
		}

	?>

	</body>



<html>