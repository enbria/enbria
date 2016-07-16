<?php

$wp_session = WP_Session::get_instance();
$pid = $wp_session["pid"];
//$wp_session['user_name'] = 'User Name'; 	

/*
PURPOSE OF THIS PAGE
1. Explain the Decision Owner and Decision Manager roles
2. Retrieve any submitted information
3. Determine which information needs to be updated or added
4. update or add information

*/

//DATABASE VARIABLES
$host 		=	"localhost";
$username 	=	"enbriaco_dbadmin";
$password 	=	"146SarahSt!";
$db 		=	"enbriaco_data";
$table = "enb_stakeholders";
$conn		=	mysqli_connect($host, $username, $password, $db);
if(!$conn) {die("Problem in database connection: " . mysql_error());  }

/*----------------------GET POST VALUES----------------------------------------------------------
 *---------------------------------------------------------------------------------------
 */

//DETERMINE IF ANYTHING IS IN THE POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
		  
//GET THE POSTED VARIABLES
    $post_dm_fname = $_POST["dm_fname"];
    $post_dm_lname = $_POST["dm_lname"];
    $post_do_fname = $_POST["do_fname"];
    $post_do_lname = $_POST["do_lname"];
    echo "1";echo "<br/>";        
    
//  Update DM
    $update_dm_query	= " UPDATE $db.$table SET fname = $post_dm_fname, lname = $post_dm_lname WHERE project_id = $pid AND role = 0 ";
    $update_dm_result 			    = mysqli_query($conn, $update_dm_query); 
    $update_dm_final_result		    = mysqli_fetch_assoc($update_dm_result);
    echo "2";echo "<br/>";        
    
//  Update DO
    $update_do_query	= " UPDATE $db.$table SET fname = $post_do_fname, lname = $post_do_lname WHERE project_id = $pid AND role = 0 ";
    $update_do_result 			    = mysqli_query($conn, $update_do_query); 
    $update_do_final_result		    = mysqli_fetch_assoc($update_do_result);
    echo "3";echo "<br/>";        
}   
    echo "4";echo "<br/>";        
/*----------------------GET DB VALUES----------------------------------------------------------
 *---------------------------------------------------------------------------------------
 */
 // Get DM from DB     
 $get_dm_query	        = " SELECT * FROM $db.$table WHERE project_id = $pid AND role = 0 ";
 $get_dm_result             = mysqli_query($conn, $get_dm_query); 
 $get_dm_final_result		= mysqli_fetch_assoc($get_dm_result);
 
 $db_dm_fname             = $get_dm_final_result["fname"];
 $db_dm_lname             = $get_dm_final_result["lname"];
 echo "5";echo "<br/>";        
 
 // Get DO from DB     
 $get_do_query	            = " SELECT * FROM $db.$table WHERE project_id = $pid AND role = 0 ";
 $get_do_result 			    = mysqli_query($conn, $get_do_query); 
 $get_do_final_result		= mysqli_fetch_assoc($get_do_result);
 
 $db_do_fname               = $get_do_final_result["fname"];
 $db_do_lname               = $get_do_final_result["lname"];   
 echo "6";echo "<br/>";        
 
 echo "Databaset Values <br/>DM Name: " . $db_dm_fname . $db_dm_lname . "<br/>";
 echo "DO Name: " . $db_do_fname . $db_do_lname . "<br/>"; 
 echo "<br/>";        

?>
Blah Blah Blah

<form name="update" action="/my-decisions/decision-overview/initiation/role-assignment/" method="post">
		  Decision Manager First Name <input type="text" name="dm_fname" value="<?php echo $db_dm_fname ?>" />
		  <br />
		  Decision Manager Last Name <input type="text" name="dm_lname" value="<?php echo $db_dm_lname ?>" />
		  <br />
		  Decision OwnerFirst Name <input type="text" name="do_fname" value="<?php echo $db_do_fname ?>" />
		  <br />
		  Decision Owner Last Name <input type="text" name="do_lname" value="<?php echo $db_do_lname ?>" />
		  <br />
		  <input type="submit" name="submit" value="Submit" />
</form>






<?php 
// FREE ALL RESULTS AND CLOSE THE CONNECTION
mysqli_free_result($update_dm_result);
mysqli_free_result($update_do_result);
mysqli_free_result($select_dm_result);



mysqli_close($conn);
?>

*/
