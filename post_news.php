<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Post News</title>

    <style>
        textarea{
            width: 500px;
            height: 300px;
            font-size: 30px;
        }

        div{
            border: 5px solid black;
            width: 500px;
            margin-top: 30px;
            margin-left: 450px;
            padding: 20px;
        }

        input[type=file]{
            font-size: 20px;
            margin: 10px;
        }

        input[type=Submit]{
            font-size: 20px;
            font-weight: bold;
        }

    </style>

</head>

<body>
    <?php include 'navbar.php' ?>
    
    <div class="">

        <form class="" action="post_news.php" method="post" enctype="multipart/form-data">

            <textarea name="news" id="input_news"  rows="20" cols="80" placeholder="Post News" required></textarea>
            <br>
            <input type="file" name="image" value="" required>
            <br>
            <input type="submit" name="submit" value="Submit">

        </form>

        <?php

        include 'db.php';

        if(isset($_POST['submit'])){
            $w_news=$_POST['news'];
            $image=$_FILES['image']['name'];
            $image_type=$_FILES['image']['type'];
            $image_size=$_FILES['image']['size'];
            $image_temp=$_FILES['image']['tmp_name'];
            $image_store="images/".$image;

            move_uploaded_file($image_temp,$image_store);

            $sql="INSERT INTO news(news,image) values('$w_news','$image')";
            $query=mysqli_query($conn,$sql);
            



        }

        ?>

    </div>
</body>
</html>