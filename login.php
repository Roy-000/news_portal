<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style.css">


</head>

<body>
    
    <form action="login_back.php" method="post">
        <h2>Login</h2>
        
        <?php if(isset($GET['error'])){ ?>  <!-- php start -->
            
            <p class="error">
            <?php echo $GET['error']; ?>
            </p> 
        
        <?php } ?>  <!-- php end -->

        <label>User Name</label><br>
        <input type="text" name="uname" placeholder="User Name"><br>
        
        
        <label>Password</label><br>
        <input type="password" name="password" placeholder="password"><br>
        
        
        <button type="submit">Login</button>
        <a href="register.php" class="ca">Creat an Account</a>
    </form>

</body>
</html>