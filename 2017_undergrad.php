<?php
 
error_reporting(E_ALL);
ini_set("display_errors", 1);

$query = 'SELECT * FROM 2017_undergrad_applicants';
 
$cxn = mysqli_connect(	"warehouse.cims.nyu.edu", "wj537", "******", "wj537_college_database");

$result = $cxn->query($query); 

?>
<!DOCTYPE html>
 <html>
 	<head>
		<link rel="stylesheet" type="text/css" href="2017_undergrad.css">
 		<title>Add New Undergrad Applicant</title>
 		<meta charset="utf-8" />
 	</head>
 	<body>
 		<h1>Enter Applicant Information</h1>
 
 		<form method="GET" action="add_student.php">
 			<label>Student Name </label>
 			<input name="name" type="text" />
 			<br />
 
 			<label>Student Age: </label>
 			<input name="age" type="text" />
 			<br />
 
 			<label>High School: </label>
 			<input name="school" type="text" />
 			<br />
			
			<label>SAT Score: </label>
 			<input name="score" type="text" />
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
			 <td>High School</td>
			 <td>SAT Score</td>
			 <td>Acceptance Decision</td>
		 </tr>		 
<?php while ($row = $result->fetch_assoc()): ?> 
			<tr>
			 <td><?php echo $row['name']; ?></td>
 			 <td><?php echo $row['age']; ?></td>
			 <td><?php echo $row['high_school']; ?></td>
 			 <td><?php echo $row['sat_score']; ?></td>
			 <td><?php echo $row['decision']; ?></td>
			</tr>
<?php endwhile; ?>	
		 </table>
 	</body>
 </html>