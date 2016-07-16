<?php
session_start();
/*STEPS
POST CURRENT USER
1. DISPLAY CURRENT PROJECTS
2. RETRIEVE THE CURRENT USER'S SUBSCRIPTION LEVEL
3. USING THE SUBSCRIPTION LEVEL, RETRIEVE THE NUMBER OF PROJECTS ENTITLED
4. COUNT THE CURRENT USER'S OPEN PROJECTS
5. COMPARE THE NUMBER OF PROJECTS ENTITLED TO THE NUMBER OF THE USER'S OPEN PROJECTS
6. IF THE USER HAS NOT MET THE NUMBER OF ENTITLED PROJECTS, PRESENT A BUTTON TO CREATE A NEW PROJECT 
*/
 
//DATABASE VARIABLES
$host 		=	"localhost";
$username 	=	"enbriaco_dbadmin";
$password 	=	"146SarahSt!";
$db 		=	"enbriaco_data";
$conn		=	mysqli_connect($host, $username, $password, $db);
if(!$conn) {die("Problem in database connection: " . mysql_error());  }

//GET CURRENT USER
$current_user 	=	wp_get_current_user();
$userid			=	$current_user->ID;

//TABLE VARIABLES
$table1 = "enb_projects";
$table2 = "enb_pms_member_subscriptions";
$table3 = "enb_subscription_types";
$table4 = "enb_projects";
$table5 = "enb_projects";
?>

<?php
// 1. DISPLAY CURRENT PROJECTS
$query1 = "SELECT * FROM $db.$table1 WHERE dm_id=$userid AND open='1'";
$result1 = mysqli_query($conn, $query1);
while($projects = mysqli_fetch_assoc($result1)) {
	// Display the project name
?>		
	<h4>
		<?php 
			echo $projects["name"];
		?>
	</h4>
	<?php	// "Edit this Decision" button and link	
	?>
	<form name="<?php echo $projects["id"]?>" action="/my-decisions/decision-overview/" method="post">
		<input type=hidden name="pid" value="<?php echo $projects["id"] ?>">
		<input type="submit" value="Edit this Decision">
		<br />
		<hr>
		<br />
		<br />
	</form>

<?php	
//close the while loop above
}
?>

<?php
// 2. RETRIEVE THE CURRENT USER'S SUBSCRIPTION LEVEL
$query2 = "SELECT * FROM $db.$table2 WHERE user_id=$userid";
$result2 = mysqli_query($conn, $query2);
$pre_sub_level = mysqli_fetch_assoc($result2);
$sub_level = $pre_sub_level["subscription_plan_id"];
echo "Subscription Plan ID: " . $sub_level;
?>
<br />
<?php
// 3. USING THE SUBSCRIPTION LEVEL, RETRIEVE THE NUMBER OF PROJECTS ENTITLED
$query3 = "SELECT * FROM $db.$table3 WHERE post_num=$sub_level";
$result3 = mysqli_query($conn, $query3);
$pre_sub_quantity = mysqli_fetch_assoc($result3);
$sub_quantity = $pre_sub_quantity["decision_quantity"];
echo "Subscription Quantity :" . $sub_quantity;
?>
<br />
<?php
// 4. COUNT THE CURRENT USER'S OPEN PROJECTS
$query4 = "SELECT COUNT(*) AS Answer FROM $db.$table4 WHERE dm_id='2' AND open='1';";
$result4 = mysqli_query($conn, $query4);
$open_proj = mysqli_fetch_array($result4);
echo "Number of open projects: " . $open_proj["Answer"] . "<br />";
?>
<br />
<?php
// 5. COMPARE THE NUMBER OF PROJECTS ENTITLED TO THE NUMBER OF THE USER'S OPEN PROJECTS
$remain = $sub_quantity - $open_proj["Answer"];
echo "Difference is: " . $remain . "<br />";

?>
<br />
<?php
// 6. IF THE USER HAS NOT MET THE NUMBER OF ENTITLED PROJECTS, PRESENT A BUTTON TO CREATE A NEW PROJECT 
if ($remain > 0)
	{
		echo "<hr />";
		echo "Your subscription entitles you to more Decisions.<br />";
		echo "<a href='/my-decisions/add-decision/' class='roll-button border'>Add a New Decision</a>";
	} 
else 
	{echo "If you require more Decision Projects, select here .<br />";}
?>
<?php
// FREE ALL RESULTS AND CLOSE THE CONNECTION
mysqli_free_result(result1);
mysqli_free_result(result2);
mysqli_free_result(result3);
mysqli_free_result(result4);
mysqli_free_result(result5);
mysqli_close($conn);
?>