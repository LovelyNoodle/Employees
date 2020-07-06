<?php
$link = mysqli_connect("localhost", "stefan", "qwer1234", "Company");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$id = mysqli_real_escape_string($link, $_REQUEST['id']);
$idclean = filter_var($id, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
$fname = mysqli_real_escape_string($link, $_REQUEST['firstname']);
$fnameclean = filter_var($fname, FILTER_SANITIZE_STRING);
$lname = mysqli_real_escape_string($link, $_REQUEST['lastname']);
$lnameclean = filter_var($lname, FILTER_SANITIZE_STRING);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$prefix = mysqli_real_escape_string($link, $_REQUEST['prefix']);

        if(preg_match('/^[0-9]{1,6}$/', $_REQUEST['id'])){
       echo "Valid Legitimation ID";
        echo "<br>";
} else {
        echo "Invalid Legitimation ID , stop playing with my html";  
        echo "<br>";    
        die();
}

if(preg_match('/^[a-zA-Z\p{L}\ ]{3,30}$/u', $_REQUEST['firstname'])){
	echo "Valid First Name";
	echo "<br>";
} else {
	echo "Invalid first name";
	echo "<br>";
	die();
}

if(preg_match('/^[a-zA-Z\p{L}\ ]{3,30}$/u', $_REQUEST['lastname'])){
	echo "Valid Last Name";
	echo "<br>";
} else {
	echo "Invalid last name";
	echo "<br>";
	die();
}

if(preg_match('/^[0-9]{9}$/', $_REQUEST['phone'])){
	echo "Valid phone number";
	echo "<br>";
}else {
	echo "Invalid phone";
	echo "<br>";
	die();
}

if(preg_match('/^\+[0-9]{2}$/',$_REQUEST['prefix'])){
	echo "Valid prefix";
	echo "<br>";
}else {
	echo "Invalid prefix";
	echo "<br>";
	die();
}

if($prefix && $phone){
	$phoneclean = $prefix . $phone;
}

	if(preg_match('/^[0-9]{1,6}$/', $_REQUEST['salary'])){
       echo "Valid Salary";
	echo "<br>";
} else {
	echo "Invalid salary , stop playing with my HTML!!!";	
	echo "<br>";	
	die();
}
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$emailclean = filter_var($email, FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);
$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);
$salaryclean = filter_var($salary, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

if(isset($_POST['email']) && !empty($_POST['email'])){
	if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
		echo 'Valid email ';
		echo "<br>";	
}
		else{
                        echo "Invalid email ";
			echo "<br>";
                        die();

	}
} else {
	echo "Please enter an email";
	echo "<br>";
	die();
}


$sql = "INSERT INTO Employees (LegitimationID,firstname,lastname, phone, email, salary) VALUES ('$idclean', '$fnameclean','$lnameclean','$phoneclean', '$emailclean', '$salaryclean')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not be able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);


?>
