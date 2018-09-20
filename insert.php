<?php
	
	$conn = mysqli_connect('localhost', 'root', '');
	if(!$conn)
	{
		echo "Server Not Connected";
	}
	if(!mysqli_select_db($conn, 'users'))
	{
		echo "Database not Selected";
	}
	
	$name = $_POST['name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$stmt = "SELECT email FROM userrecord WHERE email=$email";
	if(mysqli_query($conn, $stmt))
	{
		$sql = "INSERT INTO userrecord (name, age, gender, email, password) VALUES ('$name', '$age', '$gender', '$email', '$password')";
		if(!mysqli_query($conn, $sql))
		{
			echo "Not Inserted";
		}
		else 
		{
			echo "Record Inserted Into Database";
		}
		header("refresh:2; url=index.html");
	}
	else
	{
		echo "Email Already Registered";
	}
	$conn->close();
?>	