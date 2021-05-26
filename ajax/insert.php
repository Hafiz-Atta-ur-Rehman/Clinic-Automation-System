<?php 
$conn=mysqli_connect('localhost','root','','db_cicas');
$q="INSERT INTO `events`(`title`, `start`,`allDay`,`backgroundColor`,`borderColor`,`end`) VALUES ('{$_POST['title']}','{$_POST['date']}','{$_POST['allday']}','{$_POST['bg']}','{$_POST['bg']}','{$_POST['date']}')";
if(mysqli_query($conn,$q))
{
    echo 1;
}
else
echo 0;
?>