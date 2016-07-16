<?php

//Step 1 - Connect to the database and test the connection

//database 
$host = "localhost";
$username = "enbriaco_dbadmin";
$password = "146SarahSt!";
$db = "enbriaco_data";
$conn=mysqli_connect($host, $username, $password, $db);

if(!$conn) {
die("Problem in database connection: " . mysql_error());
}
// Step 2 - Variables
//$_POST variables
$pid = $_POST["pid"];
//Other variables
$table1 = "enb_projects";
$project_name = $POST["project_name"];
// Step 3 - Retrieve any current information from the database

$query = "
	SELECT 	* 
	FROM 	$db.$table1 
	WHERE 	id	= $pid
";

$result = mysqli_query($conn, $query);
$i=mysqli_fetch_assoc($result);

// 3. Test to make sure we are receiving information
echo "Project ID: " . $pid . "   Project Name: " . $project_name;


// present the form for updating the project information
?>
<form action="/project-info-processor/" method="post">
		  Project Name <input type="text" name="project_name" value="<?php echo $i["name"]; ?>" /><br />
		  Decision Statement <input type="textarea" name="decision_statement" value="<?php echo $i["decision_statement"]; ?>" /><br />
		  Decision Manager ID <input type="text" name="dm_userid" value="<?php echo $i["dm_id"]; ?>" /><br />
		  <input type="hidden" name="pid", value="<?php echo $i["id"]; ?>" /><br />
		  <br />
		  <input type="submit" name="submit" value="Submit" />
		</form>




<?php
mysqli_free_result($result);
mysqli_close($conn);
?>