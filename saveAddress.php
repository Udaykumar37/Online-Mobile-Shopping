       <?php

            session_start();
            require 'connect_db.php';

            $street=$_POST['street'];
            $city=$_POST['city'];
            $dist=$_POST['dist'];
            $zip=$_POST['zip'];
            $state=$_POST['state'];
           
        
       
     $sqlInsert="insert into address(customer_id,hno_street,city,dist,zip,state,last_addr) "
             . "values(".$_SESSION["cid"].",'".$street."','".$city."','".$dist."','".$zip."','".$state."',now())";
            
              if($conn->query($sqlInsert)){
                  header("location:viewAddress.php?type=new"); 
                  //echo "done";
                    }
                    else{
                        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
                        $conn->close();
                        echo "<center>Address Cannot be added"; 
                        include './orderAddress.php'; 
                    }
                
          
            
        ?>
       


