 <?php

/*
CONNECT TO DB
*/
$host 		=	"localhost";
$username 	=	"enbriaco_dbadmin";
$password 	=	"146SarahSt!";
$db 		=	"enbriaco_data";
$conn		=	mysqli_connect($host, $username, $password, $db);
if(!$conn)  {
die("Problem in database connection: " . mysql_error());
            }
 
 //GET THE POSTED VARIABLES
$project_name				=	$_POST["project_name"];
$description				=	$_POST["description"];
$identifier				=	$_POST["identifier"];
          
 //INSERT THE POSTED VALUES INTO THE DB
$insert_query 	= "insert $db.$table SET 
          name 					=	'$project_name', 
          description				=	'$description', 
          identifier				=	'$identifier', 
          decision_statement		=	'$decision_statement' 
          WHERE id =	$pid";         
          
$insert_result			= mysqli_query($conn, $insert_query);
$insert_final_result	= mysqli_fetch_assoc($insert_result);          

//GET THE PROJECT ID
$select_query	= "
				SELECT * 
				FROM $db.$table 
				WHERE id = mysqli_insert_id($conn)  
				";

$select_result 			= mysqli_query($conn, $select_query); 
$select_final_result	= mysqli_fetch_assoc($select_result);       
             
?>


SUCCESS!!

Project Name:   <?php echo $select_final_result["project_name"]?><br/>
Decscription:   <?php echo $select_final_result["description"]?><br/>
Identifier:     <?php echo $select_final_result["identifier"]?><br/>





