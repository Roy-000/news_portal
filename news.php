<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Latest News</title>

        <style>
            .display_img {
                border: 2px solid black;
                margin-right: 350px;
                margin-left: 175px;
                margin-top: 0px;
                margin-bottom: 0px;

            }

            .dlt_btn {
                float: right;
                background-color: crimson;
                margin-top: -20px;

            }

            .display_w {
                width: 400px;
                height: 150px;
                overflow: hidden;
                font-size: 50px;

            }

            .view_news {
                background: lightgray;
                margin-left: 850px;
                margin-bottom: 2px;
            }


            img {
                width: 300px;
                height: 200px;
                float: left;
            }
        </style>
    </head>

    <body>





        <?php include 'navbar.php' ?> <br>

        <h1>Welcome, <?php echo strtoupper($_SESSION['name']); ?></h1>


        <div>
            <?php      # <!-- php start -->
            include 'db.php';

            $sql = "SELECT * FROM news order by id desc";
            $query = mysqli_query($conn, $sql);

            while ($info = mysqli_fetch_array($query)) {
            ?>
                <!-- php end -->

                <div class="display_img">
                    <label id="" style="float: right;"><?php echo formate_day($info['date']) ?></label>

                    <img src="images/<?php echo  $info['image']; ?>" alt="">

                    <div class="display_w"> <?php echo  $info['news']; ?></div>

                    <div class="display_date">
                        <br><br>
                        <label id=""><?php echo formate_date($info['date']) ?></label>
                        <label id=""><?php echo formate_time($info['date']) ?></label>
                    </div>


                    <form action="news_view.php" method="post">
                        <input type="text" name="id" value="<?php echo $info['id'];  ?>" hidden>

                        <input class="view_news" type="submit" name="view_news" value="Details">

                    </form>



                    <!-- ###################################delete post######################################################### -->

                    <?php


                    if ($_SESSION['role'] && $_SESSION['role'] === 'Admin') { ?>
                        <div class="delete_btn">
                            <form action="delete_back.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $info['id'] ?>">
                                <th><input class="dlt_btn" type="submit" name="delete" value="Delete"></th>
                            </form>


                        <?php } ?>


                        </div>




                </div>
                <br>
            <?php  #<!-- php start -->
            }
            ?>
            <!-- php end   -->

        </div>

    </body>

    </html>
<?php
} else {
    header("Location: login.php");
}
?>