<?php
 
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
 $name = $_GET['name'];
 $age = $_GET['age'];
 $school = $_GET['college'];
 $score = $_GET['major'];
 $decision = $_GET['decision'];
 
 
 $cxn = mysqli_connect(	"warehouse.cims.nyu.edu", "wj537", "******", "wj537_college_database");
 

 $query = "INSERT into 2017_undergrad_applicants (name, age, previous_college, major, decision) VALUES('" . $name . "','" . $age . "','" . $college . "','" . $major . "','" . $decision . "');";
 
 $result = $cxn->query($query); 
  

 header("Location:2017_transfer.php");
 
 
 ?> 