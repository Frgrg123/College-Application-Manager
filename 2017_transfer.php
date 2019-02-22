<?php
 
error_reporting(E_ALL);
ini_set("display_errors", 1);

$query = 'SELECT * FROM 2017_transfer_applicants';
 
$cxn = mysqli_connect(	"warehouse.cims.nyu.edu", "wj537", "******", "wj537_college_database");

$result = $cxn->query($query); 

?>
<!DOCTYPE html>
 <html>
 	<head>
		<link rel="stylesheet" type="text/css" href="2017_transfer.css">
 		<title>Add New Transfer Applicant</title>
 		<meta charset="utf-8" />
 	</head>
 	<body>
 		<h1>Enter Applicant Information</h1>
 
 		<form method="GET" action="add_transfer.php">
 			<label>Student Name: </label>
 			<input name="name" type="text" />
 			<br />
 
 			<label>Student Age: </label>
 			<input name="age" type="text" />
 			<br />
 
 			<label>Previous College: </label>
 			<input name="college" type="text" />
 			<br />
			
			<label>Major: </label>
 			<input name="major" type="text" />
 			<br />
			
			<label>Decision: </label>
 			<input name="decision" type="text" />
 			<br />
			
 			<input type="submit" value="Save" />
		
 		 </form>
		
		 <br><br><br>
	
		 <table>
		 <tr>
			 <td>Name</td>
			 <td>Age</td>
			 <td>Previous College</td>
			 <td>Major</td>
			 <td>Acceptance Decision</td>
		 </tr>		 
<?php while ($row = $result->fetch_assoc()): ?> 
			<tr>
			 <td><?php echo $row['name']; ?></td>
 			 <td><?php echo $row['age']; ?></td>
			 <td><?php echo $row['previous_college']; ?></td>
 			 <td><?php echo $row['major']; ?></td>
			 <td><?php echo $row['decision']; ?></td>
			</tr>
<?php endwhile; ?>	
		 </table>
 	</body>
 </html>