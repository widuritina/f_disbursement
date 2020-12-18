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
			echo
			
			$query="SELECT * from disburse_db where username ='$username' and id ='$id';";
			$result=mysqli_query($dbConn, $query);

			//echo(mysqli_error($dbConn));
			
			$resultcheck=mysqli_num_rows($result);
			if($resultcheck>0) {
				$amount="";
				$remark="";
				while ($rows=mysqli_fetch_assoc($result)) {
					echo "<br><br>"; echo "Username: "; echo $rows['username']; 
					echo "<br>";echo "Bank Code: "; echo $bank_code=$rows['bank_code']; 
					echo "<br>";echo "Account Number: "; echo $account_number=$rows['account_number']; 
					echo "<br>";echo "Amount: Rp."; echo $amount=$rows['amount']; 
					echo "<br>";echo "Remark: "; echo $rows['remark']; 
					echo "<br>";echo "Time: "; echo $rows['timestamp']; 
					echo "<br>";echo "Status: "; echo $status=$rows['status']; 
				}
				
//chech status in db				
				if (strcmp($status, "Success")==0) {
					echo "<br>";echo "";
				} else {
					echo "<br>";echo "<br>";
					echo "..need to send another check status..";
//send disbursment status request
					$output=http_disburse_req("https://api.github.com/users/petanikode", $bank_code, $account_number, $amount, $remark); //
					$output = json_decode($output, TRUE);
					echo "<pre>";
					print_r($output);
					echo "</pre>";
					
					echo"<br>"; echo $username;
					echo"<br>"; echo $id=$output["id"];
					echo"<br>"; echo $bank_code=$output["public_repos"];
					echo"<br>"; echo $account_number=$output["followers"];
					echo"<br>"; echo $amount=$output["following"];
					echo"<br>"; echo $remark=$output["node_id"];
					echo"<br>"; echo $status=$output["type"];
					echo"<br>"; echo $benef_name=$output["name"];
					echo"<br>"; echo $timestamp=$output["updated_at"];
					$query="UPDATE disburse_db SET status='$status' WHERE id='$id' and username='$username';";
					query_db($query);
			
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