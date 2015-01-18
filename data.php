<?php
/**
 * Created by PhpStorm.
 * User: Rasmus
 * Date: 17-01-2015
 * Time: 21:35
 */

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solder Helper Version Helper</title>
    <script src="jquery/jquery-2.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="action.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $host = "127.0.0.1";
            $port = 3306;
            if($_POST["name"] != null) {
                $user = $_POST["name"];
            } else {
                die("Naming error 409");
            }
            if($_POST["password"] != null) {
                $password = $_POST["password"];
            } else {
                die("Password error 508");
            }
            $dbname = "solderhelper";
            $con = new mysqli($host, $user, $password)
            or error($con->error);
            $sql = "SELECT * FROM solderhelper.new";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                echo "<table class='table' data-p='" . $password . "' data-u='" . $user . "'><tr><th>#</th><th>Filename</th><th>Minecraft Version</th><th>Mod Version</th><th>MD5</th><th>Action</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr data-id='" . $row["id"] . "'><td>" . $row["id"] . "</td><td>" . $row["filename"] . "</td><td>" . $row["mcversion"] . "</td><td>" . $row["modversion"] . "</td><td>" . $row["md5"] . "</td><td><button type='button' class='btn btn-success'>Accept</button><button type='button' class='btn btn-danger'>Remove</button></td></tr>";
                }
                echo "</table>";
            } else {
                echo "done";
            }
        } else {
            die("You are a fool!!");
        }

        function error($err) {
            echo 'Could not connect to the database server' . $err;
            die ('Could not connect to the database server' . $err);
        }

        ?>
    </div>
</div>
</body>
</html>