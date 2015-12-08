<?php

    if(!isset($_REQUEST['cmd'])){
	echo '{"result":0,message:"unknown command"}';
	exit();
}
    $cmd=$_REQUEST['cmd'];
    switch($cmd)
{
	case 1:
		addUser();	
		break;
	case 2:
		validateuser();
		break;
    case 3:
        addbooking();
        break;
    case 4:
        confirmbooking();
        break;
    case 5:
        getbookingsforprovider();
        break;
    case 6:
        getservices();
        break;
    case 7:
        getservicelist();
        break;
    case 8:
        getmybookings();
        break;
    case 9:
        validateservice();
        break;
    case 10:
        getallproviderbookings();
        break;
	default:
		echo '{"result":0,message:"unknown command"}';
		break;
}

    function addUser(){
        require_once("user.php");
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $age = $_REQUEST['age'];
        $sex = $_REQUEST['sex'];
        $phone = $_REQUEST['phone'];
        $obj = new user();
        if($obj->adduser($email,$password,$firstname,$lastname,$sex,$age,$phone)){
		$row = $obj->fetch();
            echo'{"result":1,"user":[';
            while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo ",";
                }
            }
    echo "]}";
        }
        else{
            echo'{"result":0,"message:"error adding user"}';
    
}
    }

    function validateuser(){

        require_once("user.php");
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $obj = new user();
        if($obj->validateuser($email,$password) && ($obj->get_num_rows()>0)){
		$row = $obj->fetch();
            echo'{"result":1,"user":[';
            while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo ",";
                }
            }
    echo "]}";
        }
        else{
            echo'{"result":0,"message:"error getting user"}';
    
}           
    }

    function addbooking(){
        require_once("booking.php");
        $userid = $_REQUEST['userid'];
        $time = $_REQUEST['time'];
        $provider = $_REQUEST['providerid'];
        $obj = new booking();
        if( !$obj->addbooking($userid,$time,$provider)){
            echo'{"result":0,"message:"error making booking"}';
        }
        else{
            echo'{"result":0,"message:"Booking made successfully"}';
        }
    }

    function confirmbooking(){
        require_once("booking.php");
        $bookingid = $_REQUEST['bookingid'];
        $obj = new booking();
        if($obj->confirmbooking($bookingid)){
		$row = $obj->confirmbooking($bookingid);
            echo'{"result":1,"booking":[';
            while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo ",";
                }
            }
    echo "]}";
        }
        else{
            echo'{"result":0,"message:"error confirm booking"}';
        }
        
    }

    function getbookingsforprovider(){
        require_once("booking.php");
        $providerid = $_REQUEST['providerid'];
        $obj = new booking();
        if($obj->getbookingsforprovider($providerid)){
		$row = $obj->fetch();
            echo'{"result":1,"bookings":[';
            while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo ",";
                }
            }
    echo "]}";
        }
        else{
            echo'{"result":0,"message:"error getting bookings"}';
        }
        
    }

    function getservices(){
        require_once("service.php");
        $obj = new service();
        if($obj->getallservices()){
		$row = $obj->fetch();
            echo'{"result":1,"services":[';
            while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo ",";
                }
            }
    echo "]}";
        }
        else{
            echo'{"result":0,"message:"error getting services"}';
        }
    }

    function getservicelist(){
        require_once("service.php");
        $id = $_REQUEST['serviceid'];
        $obj = new service();
        if($obj->getservices($id)){
		$row = $obj->fetch();
            echo'{"result":1,"serviceproviders":[';
            while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo ",";
                }
            }
    echo "]}";
        }
        else{
            echo'{"result":0,"message:"error getting services"}';
        }
    }

    function getmybookings(){
         require_once("booking.php");
        $userid = $_REQUEST['userid'];
        $obj = new booking();
        if($obj->getmybookings($userid)){
		$row = $obj->fetch();
            echo'{"result":1,"bookings":[';
            while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo ",";
                }
            }
    echo "]}";
        }
        else{
            echo'{"result":0,"message:"error getting bookings"}';
        }
    }

    function validateservice(){
        require_once("service.php");
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $obj = new service();
        if($obj->validateservice($email,$password) && ($obj->get_num_rows()>0)){
		$row = $obj->fetch();
            echo'{"result":1,"serviceprovider":[';
            while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo ",";
                }
            }
    echo "]}";
        }
        else{
            echo'{"result":0,"message:"error getting service provider"}';
    
}           
        
    }

    function getallproviderbookings(){
        require_once("booking.php");
        $providerid = $_REQUEST['providerid'];
        $obj = new booking();
        if($obj->getbookingsforprovider($providerid)){
		$row = $obj->fetch();
            echo'{"result":1,"bookings":[';
            while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo ",";
                }
            }
    echo "]}";
        }
        else{
            echo'{"result":0,"message:"error getting bookings"}';
        }
        
    }
           
?>