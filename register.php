<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <style>
        

    </style>

</head>

<body>
    
    <form action="register_back.php" method="post">
        <h2>Sign Up</h2>
        
        <?php if(isset($GET['error'])){ ?>  <!-- php start -->
            
            <p class="error">
            <?php echo $GET['error']; ?>
            </p> 
        
        <?php } ?>  <!-- php end -->

        <?php if(isset($GET['success'])){ ?>  <!-- php start -->
            
            <p class="success">
            <?php echo $GET['success']; ?>
            </p> 
        
        <?php } ?>  <!-- php end -->


        <label>Name</label>
        <?php if(isset($GET['name'])){ ?>  <!-- php start -->
            <input type="text" name="name" placeholder="Name" value="<?php echo $GET['name']; ?>"><br>
            <?php echo $GET['name']; ?>
        
        <?php }else{ ?>  <!-- php end -->
            <input type="text" name="name" placeholder="Name"><br>
        <?php } ?>

        <label>User Name</label>
        <?php if(isset($GET['uname'])){ ?>  <!-- php start -->
            <input type="text" name="uname" placeholder="User Name" value="<?php echo $GET['uname']; ?>"><br>
            <?php echo $GET['name']; ?>
        
        <?php }else{ ?>  <!-- php end -->
            <input type="text" name="uname" placeholder="User Name"><br>
        <?php } ?>

        
        <label>Password</label>
        <input type="password" name="password" placeholder="password"><br>

        <label>Confirm Password</label>
        <input type="password" name="c_password" placeholder="Confirm password"><br>

        
        <button type="submit">Sign Up</button>
        <a href="login.php" class="ca">Already have an Account</a>
    </form>

</body>
</html>