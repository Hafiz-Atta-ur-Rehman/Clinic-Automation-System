<?php 

$conn=mysqli_connect('localhost','root','','db_cicas');

$q="DELETE FROM `events` where id={$_POST['id']}";

if(mysqli_query($conn,$q))
{
    echo 1;
}
else
{
    echo 0;
}


?>