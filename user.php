<?php
	include_once("adb.php");
class user extends adb
{	
    
    function user(){}
    
    function adduser($email,$password,$firstname,$lastname,$sex,$age,$phone){
        $insert_query = "insert into mwb_users set email='$email',password = '$password',firstname='$firstname',lastname='$lastname',sex='$sex',age='$age',phone='$phone'";
		return $this->query($insert_query);
    }
    
    function validateuser($email,$password){
        $select_query = "select * from mwb_users where email= '$email' and password='$password'";
        return $this->query($select_query);
    }
    
}
?>