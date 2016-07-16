<?php 
$pid = $_POST["pid"];  
$project_name = $_POST["project_name"];  
$decision_statement = $_POST['decision_statement'];  
$description= $_POST['description'];  
$dm_id = $_POST['dm_userid'];  

echo "Project ID is: " . $pid . "<br />";
echo "Project name is: " . $project_name . "<br />";
echo "Decision Statement is: " . $decision_statement . "<br />";
echo "Project Description is: " . $description . "<br />";
echo "Decision Manager ID is: " . $dm_id . "<br />";
echo "Open Status is: " . $open . "<br />";
echo "Identifier is: " . $identifier . "<br />";


$host = "localhost";
$username = "enbriaco_dbadmin";
$password = "146SarahSt!";
$db = "enbriaco_data";
$table1 = "enb_projects";

$conn=mysqli_connect($host, $username, $password, $db);

if(!$conn) {
die("Problem in database connection: " . mysql_error());
}

$_SESSION["pid"] = $pid;
echo "Project ID: " . $pid;

echo "<br />";

 //UPDATE 
 $query = "
	UPDATE 		$db.$table1 
	SET 		project_name 		= '$project_name', 
				description 	= '$description', 
				decision_statement 	= '$decision_statement', 
				dm_id 			= '$dm_id'
	WHERE 		id 			= '$pid'  
 ";

 $result = mysqli_query($conn, $query); 

 if( $result )
 {
 	echo 'Success';
 }
 else
 {
 	echo 'Query Failed';
 }

ysqli_free_result(result);
mysqli_close($conn);
?>
