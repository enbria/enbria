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
Decision time!! 
 4.1 Score Consolidation
Let’s see what the numbers say 
 4.2 Stakeholder Review
How do we anticipate the Stakeholders responding? 
 4.3 Decision
After considering all factors, we have decided that…