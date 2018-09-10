<?php
        include './header.php';
?>

<div class="bd">    
    <center>
   <?php

            session_start();
            require 'connect_db.php';
      
       
            
            $sqlmain="";
            $sqlUpdate="update cart_wishlist set status=03 WHERE cust_id= ".$_SESSION["cid"].";";
            $sqlIt="select * from list_of_items l join cart_wishlist c on l.items_id=c.itemid and"
                            . " c.cust_id=".$_SESSION["cid"]." and c.status=01";
                    $resultIt=$conn->query($sqlIt);
                    
                    if($resultIt->num_rows){
                    while($row = $resultIt->fetch_assoc()){
                            $sqlmain=$sqlmain."insert into orders(addr_id,customer_id,itemid,order_date)"
                                    . " values(".$_GET["addrId"].",".$_SESSION["cid"].",".$row["items_id"].",now());";
                            
                    }
                }  
               $sqlmain=$sqlmain.$sqlUpdate; 
                
              if(  $conn->multi_query($sqlmain)){
                 //header("location:viewAddress.php?type=new"); 
                 ?>

<div class="divOutput"><span class="spanOp">Your order was successfully placed..!!!<br>Please go to Orders Section To view Your Orders<span></div>
                 <?php
                    }
                    else{
                        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
                        $conn->close();
                  ?>      
                       <div class="divOutput"><span class="spanOp">Your Order cannot be Placed..!!!<span></div>
                   <?php         
                    }
                
          
            
        ?>
       
                                   </center>
</div>
