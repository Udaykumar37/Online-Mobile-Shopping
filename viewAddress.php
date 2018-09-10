<?php
        include './header.php';
?>

<!--<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>-->
<style>
    #pImg{
        width: 300px;
        height: 300px;
        border-radius: 30px;
    }
    td{
        border:1px solid black !important;
    }
    </style>

<div class="bd">
    <center>
    <table class="table table-responsive table-bordered" style="width: 700px;text-align: center;border:0px;">
            <tr> 
                <td colspan="3">Item Details</td>
            </tr>
            <?php
            
                 require_once './connect_db.php';
           
                   $sqlIt="select * from list_of_items l join cart_wishlist c on l.items_id=c.itemid and"
                            . " c.cust_id=".$_SESSION["cid"]." and c.status=01";
                    $resultIt=$conn->query($sqlIt);
                    
                    if($resultIt->num_rows){
                    while($row = $resultIt->fetch_assoc()){
                        
                               echo "<tr class='".$row['ct_wl_id']."'>";
echo "<td>" . $row['item_name'] . "</td>";
echo "<td><image src='" . $row['itemImgpath'] . "' width='200px',height='200px'/></td>";
echo "<td >" . $row['itemcost'] . "</td>";
echo "</tr>";
    $total=$total+$row['itemcost'] ;
                    }
                }  

            ?>
           <tr>
               <td colspan="2" style="text-align: right">Total: </td>
               <td>&#8377;&nbsp;<?php echo $total?></td>
           </tr>     
    </table>   <br><br>     
    
      <table class="table table-responsive table-bordered" style="width: 700px;text-align: center;border:0px">
            <tr> 
                <td colspan="2">Address Details</td>
            </tr>
         <?php
                  
                    if($_GET["type"]=="new"){
                        $sqlAddr="select addr_id,hno_street,city,dist,zip,state,customer_id from address where"
                                . "  customer_id=".$_SESSION["cid"]." order by last_addr desc limit 1";
                    }
                    else if($_GET["type"]=="old"){
                        $sqlAddr="select addr_id,hno_street,city,dist,zip,state,customer_id from address where "
                                . " customer_id=".$_SESSION["cid"]." and addr_id=".$_GET["addrId"]."";
                    }
                    $addrId="";
                    $resultAddr=$conn->query($sqlAddr);
                    
                if($resultAddr->num_rows){
                    $row=$resultAddr->fetch_assoc();
                    $addrId=$row["addr_id"];
                    ?>
            
            
            <tr><td>House no/street</td><td><?php echo $row["hno_street"]?></td></tr>
            <tr><td>City</td><td><?php echo $row["city"]?></td></tr>
            <tr><td>District</td><td><?php echo $row["dist"]?></td></tr>
            <tr><td>Zip Code</td><td><?php echo $row["zip"]?></td></tr>
            <tr><td>State</td><td><?php echo $row["state"]?></td></tr>
            
                <?php
                }  
                
                $conn->close;
            ?>
        </table> 
    <input type="button" class="btn btn-success" value="Confirm Order" style="width: 300px;margin-bottom: 10px" 
           onclick="javascript:window.location.href='confirmOrder.php?addrId=<?php echo $addrId?>'"/>
    </center>
</div>

