<?php
session_start();
include "db.php";

if(isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name'])&& isset($_POST['c_password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 

    function function_alert($message) {

        echo "<script>alert('$message');</script>";
        echo "<script>window.location.href='register.php'</script>";
    }

    $name = validate ($_POST['name']);

    $uname = validate ($_POST['uname']);
    $pass = validate ($_POST['password']);

    $c_pass = validate ($_POST['c_password']);


$user_data= 'uname='. $uname. '& name='.$name;




    if (empty($name)){

        function_alert("Name is required");
        
    }else if (empty($uname)){

        function_alert("User Name is required");
        
    }else if(empty($pass)){

        function_alert("Passwprd is required");
        
    }else if(empty($c_pass)){

        function_alert("Confiem Passwprd is required");
        
    }else if($pass !== $c_pass){

        function_alert("Password and Confiem Passwprd are not the same ");
        
    }else{

        $pass = md5($pass);


        $sql="SELECT * FROM users 
        WHERE user_name='$uname' ;";

        $result= mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) >0){    
            header("Location:register.php?error=User name is already taken try another & $user_data");
            exit();
        }else{
            $sql2 = "INSERT INTO users(user_name,password,name,role) VALUES('$uname','$pass','$name','normal_user') ";
            $result2= mysqli_query($conn,$sql2);

            if($result2){
                header("Location:login.php?success=Accunt created successfully & $user_data");
                exit();
            }else{
                header("Location:register.php?error=unknown error & $user_data");
                exit();
            }
        
        }
    }
}else{
    header("Location:login.php");
    exit();
}



?>