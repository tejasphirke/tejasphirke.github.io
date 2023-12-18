<?php

// $host = "Tejas";
// $username = "root";
// $password = "Tejas21061999";
// $dbname = "contact";

// Create database connection
// $conn = new mysqli($host, $username, $password, $dbname);

// Check connection 
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(name, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $name, $email, $subject, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

// Check if the form is submitted
// $name = $_POST['name'];
// $email = $_POST['email'];
// $subject = $_POST['subject'];
// $message = $_POST['message'];

    // $sql = "INSERT INTO submissions (name, email, subject, message) 
    //         VALUES ('$name', '$email', '$subject', '$message')";

    // if ($conn->query($sql) === TRUE) {
    //     echo "Record inserted successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }



// Close the database connection
// $conn->close();
?>
