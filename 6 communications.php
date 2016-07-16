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
We need to track and communicate! 
 5.1 Status Review and Reporting
Regular reviews and communication 
 5.2 Stakeholder Update
Keep those nosy stakeholders updated! 
 5.3 Risk Review
What can go wrong?