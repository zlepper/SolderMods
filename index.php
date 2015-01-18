<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="jquery/jquery-2.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="row">
        <form role="form" method="post" action="data.php">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" required="required" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" required="required" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="submit" class="btn btn-default" value="login">
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>