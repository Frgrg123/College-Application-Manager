<?php
 
error_reporting(E_ALL);
ini_set("display_errors", 1);


if (empty($_GET['Sort'])) {
	$query = 'SELECT * FROM 2016_transfer_applicants u INNER JOIN 2016_transfer_applicant_sat_scores s ON u.id=s.id';
} else {
 if($_GET['Sort'] == "id"){
	 $query = 'SELECT * FROM 2016_transfer_applicants u INNER JOIN 2016_transfer_applicant_sat_scores s ON u.id=s.id ORDER BY id ASC';
 }
 if($_GET['Sort'] == "name"){
	 $query = 'SELECT * FROM 2016_transfer_applicants u INNER JOIN 2016_transfer_applicant_sat_scores s ON u.id=s.id ORDER BY name ASC';
 }
 if($_GET['Sort'] == "age"){
	 $query = 'SELECT * FROM 2016_transfer_applicants u INNER JOIN 2016_transfer_applicant_sat_scores s ON u.id=s.id ORDER BY age ASC';
 }
}
 
 
$cxn = mysqli_connect(	"warehouse.cims.nyu.edu", "wj537", "******", "wj537_college_database");

$result = $cxn->query($query); 

?>
<!doctype html>
<html lang="en" charset="utf-8">
	<head>
		<link rel="stylesheet" type="text/css" href="transfer_report.css">
		<title>All data of 2016 Transfer Applicants</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Data of 2016 Transfer Applicants as well as their SAT scores and ACT scores (if applicable)</h1>
		<ul>
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET">
		<select name="Sort">
			<option value="id">ID</option>
			<option value="name">Name</option>
			<option value="age">Age</option>
		</select>
 		<input type="submit" value="Go!" />
 		</form>
	<table>
		<tr>
			<td>Name</td>
			<td>ID</td>
			<td>Picture</td>
			<td>Age</td>
			<td>Previous College</td>
			<td>Acceptance Decision</td>
			<td>Major</td>
			<td>SAT Reading Score</td>
			<td>SAT Writing Score</td>
			<td>SAT Math Score</td>
			<td>ACT Composite Score</td>
			<td>ACT Writing Score</td>
		</tr>
<?php while ($row = $result->fetch_assoc()) : ?>
 		<tr>
			 <td><?php echo $row["name"]; ?></td>
			 <td><?php echo $row["id"]; ?></td>
			 <td><img src="<?php echo $row["id"]; ?>.jpg"></td>
 			 <td><?php echo $row["age"]; ?></td>
 			 <td><?php echo $row["previous_college"]; ?></td>
 			 <td><?php echo $row["decision"]; ?></td>
 			 <td><?php echo $row["major"]; ?></td>
 			 <td><?php echo $row["sat_reading"]; ?></td>
 			 <td><?php echo $row["sat_writing"]; ?></td>
			 <td><?php echo $row["sat_math"]; ?></td>
			 <td><?php echo $row["act_composite"]; ?></td>
			 <td><?php echo $row["act_writing"]; ?></td>
 		</tr>
<?php endwhile; ?>	
	</table>
		</ul>
	</body>
</html>
			 