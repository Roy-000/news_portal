<?php

$host= "localhost";
$user="root";
$pass="";
$db="news_website";

$conn=mysqli_connect($host,$user,$pass,$db); #for connectimg to data base

if(!$conn){
    echo "Connection Failed";           
}


function formate_date($date){
    return date('Y-m-d',strtotime($date));
}
function formate_time($time){
    return date('g:i a',strtotime($time));
}

function formate_day($day){
    return date('l',strtotime($day));
}


?>