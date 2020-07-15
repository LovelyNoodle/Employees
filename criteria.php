<?php
require('db.php');

if(isset($_POST['select']))
{
        $value1 = mysqli_real_escape_string($link , $_REQUEST['low']);
	$value1clean=filter_var($value1 , FILTER_SANITIZE_NUMBER_INT , FILTER_FLAG_STRIP_HIGH);
        $value2 = mysqli_real_escape_string($link , $_REQUEST['high']);
	$value2clean=filter_var($value2 , FILTER_SANITIZE_NUMBER_INT , FILTER_FLAG_STRIP_HIGH);

	if(preg_match('/^[0-9]{1,6}$/', $_REQUEST['low'])){
       echo "Valid lower entrance";
} else {
	echo "Invalid lower entrance , stop playing with my HTML!";	
	die();
}
	if(preg_match('/^[0-9]{1,6}$/', $_REQUEST['high'])){
       echo "Valid higher entrance";
} else {
	echo "Invalid higher entrance, stop playing with my HTML!!!";	
	die();
}
	

        $sqlfilter = "SELECT * FROM employees WHERE salary >= '{$value1clean}' AND salary <= '{$value2clean}' ";
}

        $filterResult=mysqli_query($link,$sqlfilter);


        echo "<table>";
                echo "<tr>";
                        echo "<th>Legitimation ID</th>";
                        echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Phone</th>";
                        echo "<th>Email</th>";
                        echo "<th>Salary</th>";
                echo "<tr>";
                while($row=mysqli_fetch_array($filterResult))
                {
                        echo "<tr>";
                                echo "<td>".$row['LegitimationID']."</td>";
                                echo "<td>".$row['firstname']."</td>";
				echo "<td>".$row['lastname']."</td>";
                                echo "<td>".$row['phone']."</td>";
                                echo "<td>".$row['email']."</td>";
                                echo "<td>".$row['salary']."</td>";
                        echo "</tr>";
                }

            echo "</table>";
        mysqli_free_result($filterResult);


?>

