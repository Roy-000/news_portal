<?php

include 'db.php';
$p_id = $_POST['id'];
echo $p_id;
function function_alert($message) {

    echo "<script>alert('$message');</script>";
    echo "<script>window.location.href='news.php'</script>";
}

    
        $id = $_POST['id'];
        
        $del = "DELETE FROM news WHERE id='$id'";
        $delete = mysqli_query($conn, $del);
    
    if($delete){
    
        function_alert("Deleted");
    }else{
        
        function_alert("some error occored ");
        
    }

    
    ?>
            