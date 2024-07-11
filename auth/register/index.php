
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="shortcut icon" href="../../layouts/favicon.ico" type="image/x-icon">
    </head>
<?php include '../..\layouts\link.php' ?>
    <body>
    <div class="container">
        <h1>Register</h1> <br> 
        <form action="proses_register.php" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required> <br> 
            
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required> <br> 
            
            <input type="submit" value="Register" class="btn btn-success"> 
        </form> <br>

        <p>Already have an account? <a href="../login/index.php">Login</a></p>
    </div>
</body>
</html>