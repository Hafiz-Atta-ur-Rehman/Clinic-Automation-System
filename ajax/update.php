<?php 

$conn=mysqli_connect('localhost','root','','db_cicas');

if($_POST['end']==''){
	$end='';
}
else{
	$end=$_POST['end'];
}

$q="UPDATE `events` SET `title`='{$_POST['title']}',`start`='{$_POST['date']}',`end`='{$end}',`allDay`='{$_POST['allday']}' WHERE `id`={$_POST['id']}";

if(mysqli_query($conn,$q))
{
    echo 1;
}
else
echo 0;

?>