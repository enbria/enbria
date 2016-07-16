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
Into the details! 
 2.1 Requirement Groups
Identify how we are going to group our requirements 
 2.2 Requirements Identification
Make sure we’ve identified all the requirements and potential impacts 
 2.3 Weighting
Now we set priorities

