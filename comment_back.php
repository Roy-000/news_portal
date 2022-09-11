<?php

session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "news_website";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "Connection Failed";
}

$news_id = $_POST['p_id'];

$name = $_SESSION['name'];

$comment = $_POST['comment'];



$sql = " INSERT INTO comment(user_name, news_id, comment) values('$name', '$news_id', '$comment')";
$querry = mysqli_query($conn, $sql);

if ($querry == true) {
    echo "Your Comment was added.";
    header("location:news.php");

} else {
    echo "Some error occured.";

}
