<?php
	include_once("adb.php");
class service extends adb
{	
    
    function service(){}
    
    function getallservices(){
        $select_query = "select * from mwb_servicetype";
        return $this->query($select_query);
    }
    
    function getservices($id){
        $select_query = "select * from mwb_serviceprovider where serviceid='$id'";
        return $this->query($select_query);
    }
    
    function validateservice($email,$password){
        $select_query = "select * from mwb_serviceprovider where email='$email' and where password = '$password'";
        return $this->query($select_query);
    }
    
}
?>