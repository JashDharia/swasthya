<?php

function getNotification(){
    $id=$_SESSION['profile_id'];
	//$conn=new mysqli("localhost","root","","swasthya");
	$conn= new mysqli("localhost", "u996110698_jaden", "E@y91>h2i#Z", "u996110698_swasthya");
	$sql="SELECT * FROM notification WHERE profile_url='$id'";
	$res=mysqli_query($conn,$sql);
	if($res!=NULL){
	    return $res; 
	}
	else{
	    return 1;
	}
}