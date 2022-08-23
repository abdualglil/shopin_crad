<?php
include 'content.php';
$iditem = $_GET['iditem'];


$table = 'elements';
$query = "DELETE FROM $table WHERE id=$iditem";
$result = mysqli_query($content, $query) or die(mysqli_error($content));
header("location:new_show.php");

?>