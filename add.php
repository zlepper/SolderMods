<?php
$id = $_GET["id"];
$u = $_GET["u"];
$p = $_GET["p"];

$con = new mysqli("localhost", $u, $p)
or die ('Could not connect to the database server' . $con->connect_error);

$sql = "INSERT INTO helpersolder.mods(filename, mcversion, modversion, md5, modname, modid, author)
	SELECT filename, mcversion, modversion, md5, modname, modid, author FROM solderhelper.new
    WHERE id LIKE '$id';";
if($con->query($sql) === TRUE) {
    $sql = "DELETE FROM solderhelper.new WHERE id LIKE '$id';";
    if($con->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error deleting old records: " . $sql . "\n" . $con->error;
    }
} else {
    if($con->errno === 1062) {
        $sql = "DELETE FROM solderhelper.new WHERE id LIKE '$id';";
        if($con->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "Error deleting duplicate records: " . $sql . "\n" . $con->error;
        }
    } else {
        echo "Error inserting new record: " . $sql . "\n" . $con->error . "\n";
        echo $con->errno;
    }
}