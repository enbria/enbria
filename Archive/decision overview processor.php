<?php 
$project_name = $_POST["project_name"];  
$description = $_POST["description"];
$identifier = $_POST["identifier"];

$host = "localhost";
$username = "enbriaco_dbadmin";
$password = "146SarahSt!";
$db = "enbriaco_data";
$table1 = "enb_projects";

echo "Hello";

$conn=mysqli_connect($host, $username, $password, $db);
if(!$conn) { 
die("Problem in database connection: " . mysql_error()); 
}


//GET CURRENT USER
$current_user 	=	wp_get_current_user();
$userid			=	$current_user->ID;


echo "Project Name: " . $userid . "<br />";
echo "Project Name: " . $project_name . "<br />";
echo "Project Description: " . $description . "<br />";
echo "Project Identifier: " . $identifier . "<br />";

 //UPDATE 
$query = "
	INSERT INTO		$db.$table1 
					(name, description, identifier, dm_id) 
	VALUES			('$project_name', '$description', '$identifier', '$userid') 
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

mysqli_free_result(result);
mysqli_close($conn);
?>
