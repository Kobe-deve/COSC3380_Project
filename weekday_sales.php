<?php include 'actions/login_check.php';?>
<!DOCTYPE HTML>

<html>
	<title>Weekly Sales Report</title>
	<link rel="stylesheet" href="css/style.css">
	
	<header id = "site_header">
		<h1>THEME PARK SYSTEM MANAGEMENT SYSTEM</h1>
	</header>
	
	<nav id = "status_bar">
	
		<?php
			if($_SESSION['hasEmployee'] or $_SESSION['isAdmin'])
				echo "<a href = 'employee_form.php' >Employee Form</a>";
			if($_SESSION['hasReports'] or $_SESSION['isAdmin'])
				echo "<a href = 'data_report.php' >Data Report</a>";
			if($_SESSION['hasRide'] or $_SESSION['isAdmin'])
				echo "<a href = 'ride_form.php' >Ride Form</a>";
			if($_SESSION['isAdmin'])
				echo "<a href = 'update_status.php' >Update Weather</a>";
		?>
		
		<a href = "password_manage.php"> Change Password </a>
		<a href = "actions/logout.php"> Log out </a>
	</nav>
		
	<body>
			<?php
				$sd = $_REQUEST['Start_Date'];
				$ed = $_REQUEST['End_Date'];
				echo "<h1> Sales from $sd to $ed</h1>";
					  
				$query = "CALL sales_by_weekday('$sd 00:00:00','$ed 23:59:59')";
				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>Day of Week </td> 
							<td>Park Tickets Sold </td>  
							<td>Park Ticket Revenue </td> 
							<td>Waterpark Tickets Sold </td> 
							<td>Waterpark Ticket Revenue </td> 
							<td>Season Passes Sold </td> 
							<td>Season Pass Revenue </td> 
							<td>Total Revenue </td> 
					  </tr>';
				
				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["Day of Week"];
						$field2name = $row["Park Tickets Sold"];
						$field3name = $row["Park Ticket Revenue"];
						$field4name = $row["Waterpark Tickets Sold"];
						$field5name = $row["Waterpark Ticket Revenue"];
						$field6name = $row["Season Passes Sold"];
						$field7name = $row["Season Pass Revenue"];
						$field8name = $row["Total Revenue"];
        
						echo '<tr> 
								  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
                				  <td>$'.$field3name.'</td> 
                				  <td>'.$field4name.'</td> 
                				  <td>$'.$field5name.'</td> 
                				  <td>'.$field6name.'</td> 
                				  <td>$'.$field7name.'</td> 
                				  <td>$'.$field8name.'</td> 
							  </tr>';
					}
				}
			?>
		</body>
</html>