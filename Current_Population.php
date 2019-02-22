<?php
 
error_reporting(E_ALL);
ini_set("display_errors", 1);
 
$cxn = mysqli_connect(	"warehouse.cims.nyu.edu", "wj537", "******", "wj537_college_database");

$query = 'SELECT * FROM current_college_populations';

$result = $cxn->query($query); 

?>
<!doctype html>
<html lang="en" charset="utf-8">
	<head>
		<link rel="stylesheet" type="text/css" href="population.css">
		<title>College Populations</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Current Information about the schools of the college</h1>
		<ul>
	<table>
		<tr>
			 <td>School</td>
			 <td>Total Number of Students</td>
			 <td>Undergraduates</td>
			 <td>Graduates</td>
			 <td>Full Time Professors</td>
			 <td>Courses Offered</td>
			 <td>Website</td>
		</tr>
<?php while ($row = $result->fetch_assoc()) : ?>
 		<tr>
			 <td><?php echo $row["college"]; ?></td>
			 <td><?php echo $row["total_students"]; ?></td>
 			 <td><?php echo $row["undergraduates"]; ?></td>
 			 <td><?php echo $row["graduates"]; ?></td>
 			 <td><?php echo $row["full_time_professors"]; ?></td>
 			 <td><?php echo $row["courses_offered"]; ?></td>
			 <td><a href="<?php echo $row["college"]; ?>.html">Link</a></td>
 		</tr>
<?php endwhile; ?>	
	</table>
		</ul>
	</body>
</html>
			 