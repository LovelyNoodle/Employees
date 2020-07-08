<?php
require('db.php');

$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);

if(preg_match('/^[0-9]{1,6}$/', $_REQUEST['salary'])){
       echo "Valid Salary";
} else {
	echo "Invalid salary, stop playing with my HTML!!!";	
	die();
}



if(isset($_POST['search']))
{

        $valueToSearch = $_POST['salary'];
        $sqlfilter = "SELECT * FROM employees WHERE salary='{$valueToSearch}'";
}

        $filterResult=mysqli_query($link,$sqlfilter);


        echo "<table>";
                echo "<tr>";
                        echo "<th>Legitimation</th>";
                        echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
                        echo "<th>Phone number</th>";
                        echo "<th>Email Address</th>";
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

