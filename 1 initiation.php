<?php 
/* PAGE PURPOSE
provide links to each of the subpages
*/

//RETRIEVE SESSION VARIABLES
$pid = $_SESSION["pid"];
$name = $_SESSION["name"];
$description = $_SESSION["description"];
$decision_statement = $_SESSION["staatement"];
$open = $_SESSION["open"];
$dm_id = $_SESSION["dm_id"];
$identifier = $_SESSION["identifier"];

echo $name;
?>
<br />
Let’s start laying the foundation! 
 1.1 Role Assignment
We need to identify the Decision’s Owner and Manager 
 1.2 Decision Statement
Set our baseline 
 1.3 Decision Team
Who else will be involved with this Decision? 
 1.4 Stakeholder Planning
Who will be impacted by the Decision? 