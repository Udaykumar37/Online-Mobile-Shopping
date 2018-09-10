<?php

require './connect_db.php';
require_once './mail.php';
$type = $_GET["type"];
session_start();
if ($type == "email") {

    $email = $_GET["emailid"];
    //echo "email" . $email;
    $sqlCheck = "select count(*) as count from customers where email='". $email ."'";

    $result = $conn->query($sqlCheck);
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row["count"] <= 0) {
                 $data=array();
                 $data['exists']="false";
                 $conn->close();
                 
                 echo json_encode($data);
                //$return=$_POST;   
                //$return["count"] = $row["count"];
                // $return["json"] = json_encode($return);
                //$return=$row["count"];
                //echo $return;
            }
            else{
                $data=array();
                $data['exists']="true";
                 $conn->close();
                 echo json_encode($data);
            }
        }
    }
    else{
        die("Connection error:".$conn->error);
            $conn->close();
    }
}


    if($type=="search"){
        
        
        $key = $_GET["key"];

    $data=array();
    $sqlCheck = "select items_id,item_name from list_of_items where item_name like '%".$key."%'";
    //echo $sqlCheck;
    $resStr="<ul id=\"details\">";
    $result = $conn->query($sqlCheck);
    if ($result) {
        if ($result->num_rows > 0) {
            $data=array();
            
            while($row = $result->fetch_assoc()){
                            
                $resStr=$resStr."<li onclick=\"selectitem('".$row["item_name"]."');\">".$row["item_name"]."</li>";
            }
        }
        else{
           $resStr=$resStr."<li>No suggestions</li>"; 
        }
        $resStr=$resStr. "</ul>";
        $data['data']=$resStr;
        //$data['data']=$resStr;
                 $conn->close();
            echo json_encode($data); 
    }
    else{
        die("Connection error:".$conn->error);
                        $conn->close();
    }
    }
    
    
    if($type=="sendotp"){
        
       $email = $_GET["emailid"];

        
        $op= mt_rand(666666, 999999);
        $sub="Account Registration Otp";
        $body="Helllo...".$_SESSION[""]."<br>Your One time Password for account creation is :".$op;
        
        if(sendmail($email, $sub, $body)){
            $data=array();
    
        $data['otp']=$op;
            echo json_encode($data); 
    }
    else{
            $data['otp']="no";
            $conn->close();
            echo json_encode($data); 
    }
    }
    
    
    
 if ($type == "addToList") {

    $addTo = $_GET["addTo"];
    $itemId = $_GET["key"];
    //echo "email" . $email;
    if($addTo=="wishl")
    {
        $status=0;
    }
    else if($addTo=="cart"){
        $status=1;
    }
    $sqlCheck = "insert into cart_wishlist(itemid,cust_id,status) values(".$itemId.",".$_SESSION['cid'].",".$status.")";
    

   if ($conn->query($sqlCheck)) {
        
                $data=array();
                $data['status']="true";
                 $conn->close();
                 echo json_encode($data);
        }
    else{
        $data=array();
                $data['status']="false";
                 $conn->close();
                 echo json_encode($data);
    }
}


   
 if ($type == "addToCart") {

    $ct_wl_id = $_GET["key"];
 
   $sqlCheck = "update cart_wishlist set status=1 where ct_wl_id=".$ct_wl_id."";
    

   if ($conn->query($sqlCheck)) {
        
                $data=array();
                $data['status']="true";
                 $conn->close();
                 echo json_encode($data);
        }
    else{
        $data=array();
                $data['status']="false";
                 $conn->close();
                 echo json_encode($data);
    }
}

  
 if ($type == "removeFromCart") {

    $ct_wl_id = $_GET["key"];
 
   $sqlCheck = "delete from cart_wishlist where ct_wl_id=".$ct_wl_id."";
    

   if ($conn->query($sqlCheck)) {
        
                $data=array();
                $data['status']="true";
                 $conn->close();
                 echo json_encode($data);
        }
    else{
        $data=array();
                $data['status']="false";
                 $conn->close();
                 echo json_encode($data);
    }
}
?>