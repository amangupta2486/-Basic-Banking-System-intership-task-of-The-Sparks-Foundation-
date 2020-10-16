<?php
error_reporting(0);
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Transfer Credits..</title>
	<?php require_once "bootstrap.php"; ?>
	<style>
body {
  background-color: linen;
  margin-top: 100px;
  margin-bottom: 100px;
  margin-right: 150px;
  margin-left: 80px;
}
a{
	margin-top: 0px;
   margin-bottom: 0px;
   margin-right: 0px;
   margin-left: 0px;
}
</style>
</head>
<body >
	<h2>Transfer amount from one user to another</h2>
	<a href="index.php">Home Page</a>
	<form action="" method="GET">
		<h2><p>From User
		<input type="text" name="u1" value=""></p>
		<p>To User
		<input type="text" name="u2" value=""></p>
		<p>Amount 
		<input type="text" name="amt" value=""></p>
        </h2>
		<input type="submit" name="submit" value="Transfer">
	</form>

	<?php
	
			if($_GET['submit'])
			{
			$u1=$_GET['u1'];
			$u2=$_GET['u2'];
			$amt=$_GET['amt'];


			if($u1!="" && $u2!="" && $amt!="")
			{
				
				$query1= "UPDATE customers SET current_balance = current_balance + '$amt' WHERE name = '$u2' ";
				$data1= mysqli_query($conn, $query1);
				$query2= "UPDATE customers SET current_balance = current_balance - '$amt' WHERE name = '$u1' ";
				$data2= mysqli_query($conn, $query2);

				if ($data1 && $data2)
				{
					echo"Data Submit into Database";
					echo $bl1;
					echo $bl2;

				}
				else
				{
					echo "Error in Submition ";
				}

			}

			else
			{
				echo"All Fields are Required";
			}
		}
		else
		{
			echo "Enter All Required Fields And Submit.";
		}

	?>

	<br><br>
	<h3>....TO VIEW UPDATED DATA...</h3>
	<br>
	<h3>
	<a href="display.php">Click To View Updated User Details</a>
	<h3>
</body>
</html>