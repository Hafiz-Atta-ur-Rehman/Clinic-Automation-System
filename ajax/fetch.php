<?php
$conn=mysqli_connect('localhost','root','','db_cicas');
$q="select * from events";
$res=mysqli_query($conn,$q);
$rows=array();
$events="[";
while($row=mysqli_fetch_assoc($res)){
    $events.="{";
    	$events.="id : '".$row['id']."',";
	    $events.="title : '".$row['title']."',";
	    $events.="start : ".$row['start'].",";
	    $events.="end : ".$row['end'].",";
	    $events.="url : '".$row['url']."',";
	    $events.="backgroundColor : '".$row['backgroundColor']."',";
	    $events.="borderColor : '".$row['borderColor']."',";
	    $events.="allDay : ".$row['allDay'].",";
    $events.="},";
}
$events.="]";

echo $events;
?>