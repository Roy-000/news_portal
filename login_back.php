<?php
session_start();
include "db.php";

if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 

    function function_alert($message) {

        echo "<script>alert('$message');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }

    $uname = validate ($_POST['uname']);
    $pass = validate ($_POST['password']);
   // $pass=md5($pass);

    if (empty($uname)){

        function_alert("User Name is required");
    
    }else if(empty($pass)){

        function_alert("Password is required");
    
    }else{
        $sql="SELECT * FROM users 
        WHERE user_name='$uname' AND password= '$pass';";

        $result= mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) >0){
            $row =mysqli_fetch_assoc($result);
            
            if ($row['user_name'] === $uname && $row['password'] === $pass ){
                $_SESSION['user_name'] = $row['user_name']; 
                $_SESSION['name'] = $row['name']; 
                $_SESSION['id'] = $row['id']; 
                $_SESSION['role'] = $row['role']; 
                header("Location: news.php");
                
            }
        }else{
            function_alert("Incorect User Name or Password");
            exit();
        }

    }
    }else{
    header("Location:login.php");
    exit();

}



?>