<?php
require ("voitures.php");

$retour[0] = rand(0, 10) ;



$result = new voitures($retour);
$result -> afficherinfo();

echo json_encode($result);

?>
