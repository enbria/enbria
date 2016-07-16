<?php
/*STEPS

//GET CURRENT USER
$current_user 	=	wp_get_current_user();
$userid			=	$current_user->ID;



*/
 
//DATABASE VARIABLES
$host 		=	"localhost";
$username 	=	"enbriaco_dbadmin";
$password 	=	"146SarahSt!";
$db 		=	"enbriaco_data";
$conn		=	mysqli_connect($host, $username, $password, $db);
if(!$conn) {die("Problem in database connection: " . mysql_error());  }

//TABLE VARIABLES
$table1 = "enb_projects";
$table2 = "enb_pms_member_subscriptions";
$table3 = "enb_subscription_types";
$table4 = "enb_projects";
$table5 = "enb_projects";

$pid = $_POST["pid"];
$_SESSION["pid"] = $pid;

$query1 = "SELECT * FROM $db.$table1 WHERE id=$pid";
$result1 = mysqli_query($conn, $query1);



?>

<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<h5> Decision Manager Project Steps</h5>

1. List out all the steps
2. Need to show what has been completed.  checkbox?
3. Each of the steps needs to be a hyperlink to the page to complete the steps

<form>
  <input type="checkbox" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="other"> Other
</form>

	<form name="<?php echo $pid . "1.0"?>" action="/initiation/" method="post">
	<input type=hidden name="pid" value="<?php echo $projects["id"]?>">
	<input type="submit" value="Edit this project">
	<br />
	<hr>
	<br />
	<br />
	</form>




<div class="w3-row-padding">

<div class="w3-third">
<h6>STEP 1 - Initiation </h6>
<small> <i>Let's start laying the foundation! </i></small> 
<hr>
1.1 Role Assignment
<small> <i>We need to identify the Decision's Owner and Manager </i></small> 
1.2 Decision Statement
<small> <i>Set our baseline </i></small> 
1.3 Decision Team
<small> <i>Who else will be involved with this Decision? </i></small> 
1.4 Stakeholder Planning
<small> <i>Who will be impacted by the Decision? </i></small> 
</div>

<div class="w3-third">
<h6>2 Requirements</h6>
2.1 Requirements Identification
2.2 Weighting
&#32;
&#32;
&#32;
</div>

<div class="w3-third">
<h6>3 Outcomes</h6>
3.1 Outcome Identification
3.2 Outcome Review and Rating
&#32;
&#32;
&#32;
</div>

<div class="w3-third">
<h6>4 Deciding</h6>
4.1 Score Consolidation
4.2 Stakeholder Review
4.3 Decision
</div>

<div class="w3-third">
<h6>5 Monitor</h6>
5.1 Status Review and Reporting
5.2 Stakeholder Update
5.3 Risk Review
</div>

<div class="w3-third">
<h6>6 Follow-up</h6>
6.1 Decision Package
6.2 Next Steps
</div>
