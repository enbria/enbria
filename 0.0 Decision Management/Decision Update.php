<?php
$wp_session = WP_Session::get_instance();
//$wp_session['user_name'] = 'User Name'; 	

$pid 					= $wp_session["project_pid"];	
$table					= "enb_projects";


//CONNECT TO DB

$host 		=	"localhost";
$username 	=	"enbriaco_dbadmin";
$password 	=	"146SarahSt!";
$db 		=	"enbriaco_data";
$conn		=	mysqli_connect($host, $username, $password, $db);
if(!$conn)  {
die("Problem in database connection: " . mysql_error());
            }

//DETERMINE IF ANYTHING IS IN THE POST
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		  //GET THE POSTED VARIABLES
		  $project_name				=	$_POST["project_name"];
		  $description				=	$_POST["description"];
		  $identifier				=	$_POST["identifier"];
		  $decision_statement		=	$_POST["decision_statement"];
		  
		  //UPDATE THE DB WITH THE POSTED VARIABLES
		  $update_query 	= "UPDATE $db.$table SET 
					name 					=	'$project_name', 
					description				=	'$description', 
					identifier				=	'$identifier', 
					decision_statement		=	'$decision_statement' 
					WHERE id =	$pid";
			
$update_result			= mysqli_query($conn, $update_query);
$update_final_result	= mysqli_fetch_assoc($update_result);
// if( $update_result ) {echo 'Success';} else {echo 'Query Failed';}	  	  
}

/*    
echo "<h3> PHP List All POST Variables</h3>";
foreach ($_POST as $key=>$val)
		  echo $key." ".$val."<br/>";
	*/


//FETCH THE PROJECT INFORMATION FROM THE DB
$select_query	= "
				SELECT * 
				FROM $db.$table 
				WHERE id = $pid
				";

$select_result 			= mysqli_query($conn, $select_query); 
$select_final_result	= mysqli_fetch_assoc($select_result);
// if( $select_result ) { echo 'Success'; } else { echo 'Query Failed'; }

?>


<form name="update" action="/my-decisions/decision-overview/decision-update/" method="post">
		  Project Name <input type="text" name="project_name" value="<?php echo $select_final_result["name"] ; ?>" /><br />
		  Project Description <br /><textarea name="description" form="update" ><?php echo $select_final_result["description"]; ?> </textarea><br />
		  Project Identifier <input type="text" name="identifier" value="<?php echo $select_final_result["identifier"]; ?>" /><br />
		  Project Statement <br /><textarea name="decision_statement" form="update"><?php echo $select_final_result["decision_statement"]; ?> </textarea><br />			  
		  <br />
		  <input type="submit" name="submit" value="Update" />
</form>
<a href="http://enbria.com/my-decisions/decision-overview/" class="roll-button border">Return to Overview</a>


<?php 
// FREE ALL RESULTS AND CLOSE THE CONNECTION
mysqli_free_result($update_result);
mysqli_free_result($select_result);
mysqli_close($conn);
?>