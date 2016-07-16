<?php

/* PAGE PURPOSE
1. At the top of the page, present the project name, identifier, and dm name.  Link to a page to edit them.
2. Show the steps involved in the project.
3. Show the status of each of the project steps.
4. Set several $_SESSION variables.
*/
	
$wp_session = WP_Session::get_instance();
//$wp_session['user_name'] = 'User Name'; 	  


// HANDLE THE SELECTED PROJECT ID		  
if (isset($_POST["pid"])){
		  $pid 	= $_POST["pid"];
		  $wp_session["project_pid"] = $_POST["pid"];
		  //echo "POST PID value " . $_POST["pid"] . "<br/>";
		  //echo "SESSION PID value " . $wp_session["project_pid"] . "<br/>";
} else {
		  $pid 	= $wp_session["project_pid"];		  
}

//echo "Current PID value " . $pid . "<br/>";


//DATABASE VARIABLES
$host 		=	"localhost";
$username 	=	"enbriaco_dbadmin";
$password 	=	"146SarahSt!";
$db 		=	"enbriaco_data";
$conn		=	mysqli_connect($host, $username, $password, $db);
if(!$conn) {die("Problem in database connection: " . mysql_error());  }

//PROJECT VARIABLES
$table1 = "enb_projects";
$query1 = "SELECT * FROM $db.$table1 WHERE id = $pid";
$result = mysqli_query($conn, $query1);
$result1 = mysqli_fetch_assoc($result);

//ASSIGN PROJECT $_SESSION VARIABLES
$wp_session["project_name"] 			= $result1["name"];
$wp_session["project_description"] 	= $result1["description"];
$wp_session["project_statement"] 	= $result1["decision_statement"];
$wp_session["project_open"] 			= $result1["open"];
$wp_session["project_dm_id"] 			= $result1["dm_id"];
$wp_session["project_identifier"] 	= $result1["identifier"];

//PROGRESS VARIABLES
$table2 = "enb_progress";
$query2 = "SELECT * FROM $db.$table2 WHERE id = $pid";
$result3 = mysqli_query($conn, $query2);
$result4 = mysqli_fetch_assoc($result3);

//ASSIGN PROGRESS $_SESSION VARIABLES
//$_SESSION["project_pid"] 	= $pid;
$wp_session["progress_initiation"] 						= $result4["initiation"];
$wp_session["progress_role_assignment"] 				= $result4["role_assignment"];
$wp_session["progress_decision_statement"] 				= $result4["decision_statement"];
$wp_session["progress_decision_team"] 					= $result4["decision_team"];
$wp_session["progress_stakeholder_planning"] 			= $result4["stakeholder_planning"];
$wp_session["progress_requirement_groups"] 				= $result4["requirement_groups"];
$wp_session["progress_requirements_identification"] 	= $result4["requirements_identification"];
$wp_session["progress_requirements_weighting"] 			= $result4["requirements_weighting"];
$wp_session["progress_outcomes"] 						= $result4["outcomes"];
$wp_session["progress_outcome_identification"] 			= $result4["outcome_identification"];
$wp_session["progress_outcome_review_and_rating"] 		= $result4["outcome_review_and_rating"];
$wp_session["progress_decision"] 						= $result4["decision"];
$wp_session["progress_score_consolidation"] 			= $result4["score_consolidation"];
$wp_session["progress_stakeholder_review"] 				= $result4["stakeholder_review"];
$wp_session["progress_decide"] 							= $result4["decide"];
$wp_session["progress_monitor"] 						= $result4["monitor"];
$wp_session["progress_status_review_and_reporting"] 	= $result4["status_review_and_reporting"];
$wp_session["progress_stakeholder_update"] 				= $result4["stakeholder_update"];
$wp_session["progress_risk_review"] 					= $result4["risk_review"];
$wp_session["progress_decision_package"] 				= $result4["identifier"];
$wp_session["progress_next_steps"] 						= $result4["next_steps"];


//<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
?>
<table>
		  <tr>
					<td>Project Name</td>
					<td><?php echo $result1["name"]; ?></td>
		  </tr>
		  <tr>
					<td>Project Description</td>
					<td><?php echo $result1["description"]; ?></td>
		  </tr>
		  <tr>
					<td>Project Identifier</td>
					<td><?php echo $result1["identifier"]; ?></td>
		  </tr>
		  <tr>
					<td>Decision Statement</td>
					<td><?php echo $result1["decision_statement"]; ?></td>
		  </tr>


</table>

<a href="http://enbria.com/my-decisions/decision-overview/decision-update/" class="roll-button border">Update Project Data</a>


<div class="w3-row-padding">

<div class="w3-third">
	<fieldset>
		<legend><h6><a href="/initiation/">STEP 1 - Initiation </a></h6></legend>
		<small> <i>Let's start laying the foundation! </i></small> 
		  <a href="/my-decisions/decision-overview/initiation/role-assignment/" name="1.1 Role Assignment" target="_self">		1.1 Role Assignment</a>
			<small> <i>We need to identify the Decision's Owner and Manager </i></small> 
		1.2 Decision Statement
			<small> <i>Set our baseline </i></small> 
		1.3 Decision Team
			<small> <i>Who else will be involved with this Decision? </i></small> 
		1.4 Stakeholder Planning
			<small> <i>Who will be impacted by the Decision? </i></small> 
	</fieldset>
</div>

<div class="w3-third">
	<fieldset>
		<legend><h6><a href="/initiation/">STEP 2 - Requirements </a></h6></legend>
		<small> <i>Into the details! </i></small> 
		2.1 Requirement Groups
			<small> <i>Identify how we are going to group our requirements </i></small> 
		2.2 Requirements Identification
			<small> <i>Make sure we've identified all the requirements and potential impacts </i></small> 
		2.3 Weighting
			<small> <i>Now we set priorities</i></small> 
	</fieldset>
</div>

<div class="w3-third">
	<fieldset>
		<legend><h6><a href="/initiation/">STEP 3 - Outcomes</a></h6></legend>
		<small> <i>Time to identify our choices </i></small> 
		3.1 Outcome Identification
			<small> <i>Here we identify all our possible choices </i></small> 
		3.2 Outcome Review and Rating
			<small> <i>We will review each of the identified outcomes against our requirements and score them </i></small> 
	</fieldset>
</div>
</div>
<br/>
<div class="w3-row-padding">
<div class="w3-third">
	<fieldset>
		<legend><h6><a href="/initiation/">STEP 4 - Decision </a></h6></legend>
		<small> <i>Decision time!! </i></small> 
		4.1 Score Consolidation
			<small> <i>Let's see what the numbers say </i></small> 
		4.2 Stakeholder Review
			<small> <i>How do we anticipate the Stakeholders responding? </i></small> 
		4.3 Decision
			<small> <i>After considering all factors, we have decided that...</i></small> 
	</fieldset>
</div>

<div class="w3-third">
	<fieldset>
		<legend><h6><a href="/initiation/">STEP Always - Monitor</a></h6></legend>
		<small> <i>We need to track and communicate! </i></small>
		5.1 Status Review and Reporting
		<small> <i>Regular reviews and communication </i></small> 
		5.2 Stakeholder Update
		<small> <i>Keep those nosy stakeholders updated! </i></small> 
		5.3 Risk Review
		<small> <i>What can go wrong?</i></small> 
	</fieldset>
</div>

<div class="w3-third">
	<fieldset>
		<legend><h6><a href="/initiation/">STEP 6 - Follow-up</a></h6></legend>
		<small> <i>Let's POST moving! </i></small> 
		6.1 Decision Package
		<small> <i>A set of downloads for your records</i></small> 
		6.2 Next Steps
		<small> <i>What now? </i></small> 
	</fieldset>
</div>

</div>
<?php
    
echo "<h3> PHP List All Session Variables</h3>";
foreach ($wp_session as $key=>$val)
		  echo $key." ".$val."<br/>";
	
?>

<?php 
// FREE ALL RESULTS AND CLOSE THE CONNECTION
mysqli_free_result(result);

mysqli_close($conn);
?>