<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News View</title>
    <style>
        img {
            width: 800px;
            height: 350px;
        }

        div {
            margin: 400px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .news {
            border: 2px solid black;
            width: 800px;
            font-size: 20px;
            margin-left: 0px;
            margin-top: 5px;

            /* text-align: justify; */
        }

        textarea {
            margin-left: 400px;
            width: 800px;
            margin-top: 10px;
        }

        .comment_b {
        
            margin-bottom: 50px;
            margin-left: 1130px;
        }
.c_show{
    
    border: 1px solid black; 
}

.c_name{
    margin-left: 00px;
}

.commend{
    margin-left: 20px;
}

        
    </style>
</head>


<body>

    <?php
    include 'db.php';
    include 'navbar.php';

    //alert function
    function function_alert($massage)
    {
        echo "<script>alert('$massage');</script>";
        echo "<script>window.location.href='full_news.php'</script>";
    }
    ?>

    <?php

    $id = $_POST['id'];

    $sql = "SELECT * from news where id='$id'";
    $query = mysqli_query($conn, $sql);

    while ($info = mysqli_fetch_array($query)) {
    ?>
        <div class="container text-center ">
            <p class="date"> <?php echo $info['date'];  ?> </p>

            <img src="images/<?php echo $info['image'];  ?>" alt="">

            <div class="news">
                <p style="white-space: pre-wrap;"> <?php echo $info['news'] ?> </p>

            </div>
        </div>
    <?php   } ?>



    <!-- ###################################################COMMENT############################################################# -->

    <form action="comment_back.php" method="POST">
        <input name="p_id" class="comment_b" type="text" value="<?php echo $id ?>" hidden>
        <textarea name="comment" id="comment" cols="30" rows="2" placeholder="Write a comment..."></textarea>
        <input name="submit" class="comment_b" type="submit" value="Comment">
    </form>








    <!-- ------------------------------for printing comment--------------------------------------------- -->

    <?php      # <!-- php start -->



    $sql1 = "SELECT * FROM comment where news_id = '" . $id . "'";
    $querry1 = mysqli_query($conn, $sql1);




    if (mysqli_num_rows($querry1) > 0) {

        while ($info = mysqli_fetch_assoc($querry1)) {

    ?>
            <!-- php end -->
            <div class="c_show">


                <div class="c_name"> <?php echo  strtoupper($info['user_name']) ?></div>
            
                <div class="commend"> <?php echo  $info['comment']; ?></div>

            </div>
    <?php  #<!-- php start -->
        }
    }
    ?> <!-- php end   -->

    </div>

</body>

</html>
<?php

?>



</body>



</html>