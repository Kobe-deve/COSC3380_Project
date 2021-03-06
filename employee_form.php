<?php include 'actions/login_check.php';?>

<!DOCTYPE HTML>

<html>
	<title>Employee Form</title>
	<link rel="stylesheet" href="css/style.css">
	
	<header id = "site_header">
		<h1>THEME PARK SYSTEM MANAGEMENT SYSTEM</h1>
	</header>
		
	<nav id = "status_bar">
		<a href = "front_page.php">Front Page</a>
		
		<?php
				if($_SESSION['hasReports'] or $_SESSION['isAdmin'])
					echo "<a href = 'data_report.php' >Data Report</a>";
				if($_SESSION['hasRide'] or $_SESSION['isAdmin'])
					echo "<a href = 'ride_form.php' >Ride Form</a>";
				if($_SESSION['isAdmin'])
					echo "<a href = 'update_status.php' >Update Weather</a>";
		?>
		
		<a href = "logout.php"> Change Password </a>
		<a href = "actions/logout.php"> Log out </a>
	</nav>
	
		
	<body class = "cool_form">
		<p>
			<a href = "create_employee_form.php">Create Employee</a>
		</p>
		<?php
			$query = "SELECT * FROM employee";
		
			echo '<table border="0" cellspacing="2" cellpadding="2"> 
				  <tr> <td colspan = "6" class = "table_head"><h1>Employees</h1></td></tr>
				  
				  <tr id = "first_th"> 
						<td>employee_id </td> 
						<td>name_first </td>  
						<td>name_middle </td> 
						<td>name_last </td> 
						<td>date_of_birth </td> 
						<td>phone_number </td> 
				  </tr>';
	
			if ($result = $connect->query($query)) 
			{
				while ($row = $result->fetch_assoc()) 
				{
					$field1name = $row["employee_id"];
					$field2name = $row["name_first"];
					$field3name = $row["name_middle"];
					$field4name = $row["name_last"];
					$field5name = $row["date_of_birth"];
					$field6name = $row["phone_number"];
        
					echo '<tr style="line-height:40px;" > 
							<td>'.$field1name.'</td> 
							<td>'.$field2name.'</td> 
							<td>'.$field3name.'</td> 
							<td>'.$field4name.'</td> 
							<td>'.$field5name.'</td> 
							<td>'.$field6name.'</td>
							<td><a href="actions/ride_delete.php?id='.$field1name.'">Delete</a></td>
							<td><a href="ride_edit.php?id='.$field1name.'">Edit</a></td>
						  </tr>';
				}
				$result->free();
				echo "</table>";
			} 
			?>
	</body>
</html>
