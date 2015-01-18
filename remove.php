<?php
$id = $_GET["id"];
$u = $_GET["u"];
$p = $_GET["p"];

$con = new mysqli("localhost", $u, $p)
or die ('Could not connect to the database server' . $con->connect_error);
$sql = "DELETE FROM solderhelper.new WHERE id LIKE '$id';";
if($con->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error deleting records: " . $sql . "\n" . $con->error;
}