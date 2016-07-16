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
Time to identify our choices 
 3.1 Outcome Identification
Here we identify all our possible choices 
 3.2 Outcome Review and Rating
We will review each of the identified outcomes against our requirements and score them 