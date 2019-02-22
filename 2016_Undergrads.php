<?php
 
error_reporting(E_ALL);
ini_set("display_errors", 1);


if (empty($_GET['Sort'])) {
	$query = 'SELECT * FROM 2016_undergrad_applicants u INNER JOIN 2016_undergrad_applicant_sat_scores s ON u.id=s.id;';
} else {
 if($_GET['Sort'] == "id"){
	 $query = 'SELECT * FROM 2016_undergrad_applicants u INNER JOIN 2016_undergrad_applicant_sat_scores s ON u.id=s.id ORDER BY id ASC';
 }
 if($_GET['Sort'] == "name"){
	 $query = 'SELECT * FROM 2016_undergrad_applicants u INNER JOIN 2016_undergrad_applicant_sat_scores s ON u.id=s.id ORDER BY name ASC';
 }
 if($_GET['Sort'] == "age"){
	 $query = 'SELECT * FROM 2016_undergrad_applicants u INNER JOIN 2016_undergrad_applicant_sat_scores s ON u.id=s.id ORDER BY age ASC';
 }
}
 
 if (empty($_GET['Criteria'])) {
	$query = 'SELECT * FROM 2016_undergrad_applicants u INNER JOIN 2016_undergrad_applicant_sat_scores s ON u.id=s.id;';
} else {
 if($_GET['Criteria'] == "accepted"){
	 $query = 'SELECT * FROM 2016_undergrad_applicants u INNER JOIN 2016_undergrad_applicant_sat_scores s ON u.id=s.id WHERE u.decision="Accepted"';
 }
 if($_GET['Criteria'] == "rejected"){
	 $query = 'SELECT * FROM 2016_undergrad_applicants u INNER JOIN 2016_undergrad_applicant_sat_scores s ON u.id=s.id WHERE u.decision="Rejected"';
 }
 if($_GET['Criteria'] == "18plus"){
	 $query = 'SELECT * FROM 2016_undergrad_applicants u INNER JOIN 2016_undergrad_applicant_sat_scores s ON u.id=s.id WHERE u.age>18';
 }
 if($_GET['Criteria'] == "18"){
	 $query = 'SELECT * FROM 2016_undergrad_applicants u INNER JOIN 2016_undergrad_applicant_sat_scores s ON u.id=s.id WHERE u.age=18';
 }
 if($_GET['Criteria'] == "18minus"){
	 $query = 'SELECT * FROM 2016_undergrad_applicants u INNER JOIN 2016_undergrad_applicant_sat_scores s ON u.id=s.id WHERE u.age<18';
 }
}
 
 
$cxn = mysqli_connect("warehouse.cims.nyu.edu", "wj537", "******", "wj537_college_database");


$result = $cxn->query($query); 

?>
<html>
		<head>
		<link rel="stylesheet" type="text/css" href="undergrad_report.css">
		<title>All data of 2016 Undergraduate Applicant</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Data of 2016 Undergraduate Applicants as well as their SAT scores and ACT scores (if applicable)</h1>
		<ul>
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET">
		<p>Sort By</p>
		<select name="Sort">
			<option value="id">ID</option>
			<option value="name">Name</option>
			<option value="age">Age</option>
		</select>
 		<input type="submit" value="Go!" />
 		</form>
		<br><br>
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET">
		<p>Criteria</p>
		<select name="Criteria">
			<option value="accepted">Accepted</option>
			<option value="rejected">Rejected</option>
			<option value="18plus">Older than 18</option>
			<option value="18">18 Year Olds</option>
			<option value="18minus">Younger Than 18</option>
		</select>
 		<input type="submit" value="Go!" />
 		</form>
	<table>
		 <tr>
			 <td>Name</td>
			 <td>ID</td>
			 <td>Age</td>
			 <td>High School</td>
			 <td>Acceptance Decision</td>
			 <td>College</td>
			 <td>Major</td>
			 <td>SAT Reading Score</td>
			 <td>SAT Writing Score</td>
			 <td>SAT Math Score</td>
			 <td>ACT Composite Score</td>
			 <td>ACT Writing Score</td>
		 </tr>		 
<?php while ($row = $result->fetch_assoc()): ?> 
			<tr>
			 <td><?php echo $row['name']; ?></td>
			 <td><?php echo $row['id']; ?></td>
 			 <td><?php echo $row['age']; ?></td>
 			 <td><?php echo $row['high_school']; ?></td>
 			 <td><?php echo $row['decision']; ?></td>
 			 <td><?php echo $row['college']; ?></td>
 			 <td><?php echo $row['major']; ?></td>
 			 <td><?php echo $row['sat_reading']; ?></td>
 			 <td><?php echo $row['sat_writing']; ?></td>
 			 <td><?php echo $row['sat_math']; ?></td>
			 <td><?php echo $row['act_composite']; ?></td>
			 <td><?php echo $row['act_writing']; ?></td>
			</tr>
<?php endwhile; ?>	
		 </table>
<?php if ($result->num_rows === 0) {
	 print("No Results");
} ?>
		 </ul>
	</body>
</html>