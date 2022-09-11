<?php
include 'navbar.php';
?>
<style>

    .bar{
        width: 80%;
        height: 5%;
        margin: 10px;
        margin-left: 10%;
    }
    .btn{
        margin-left: 50%;
    }
</style>


<form action="<?php $_SERVER['PHP_SELF'] ?> " method="GET">
    <input type="text" class="bar" name="search_text"><br>
    <input type="submit" class="btn" value="Search">
</form>
<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "news_website";

$conn = mysqli_connect($host, $user, $pass, $db); #for connectimg to data base

if (!$conn) {
    echo "Connection Failed";
}



if (isset($_GET['search_text'])) {
    $search_text = $_GET['search_text'];

    $sql = "SELECT * FROM `news` WHERE `news` LIKE '%$search_text%'";
    $querry = mysqli_query($conn, $sql);

    if (mysqli_num_rows($querry) > 0) {

        while ($info = mysqli_fetch_assoc($querry)) {

            $news = $info['news'];
            $date = $info['date'];

            echo  "News:".$news .' '.' '.' '.' '. "Date: ". $date ."<br>";
        }
    }
}

?>
