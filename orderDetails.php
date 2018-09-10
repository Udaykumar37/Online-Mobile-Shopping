<?php
        include './header.php';
?>
<style>
    th,td{
        border:1px solid black !important;
    }
</style>
<div class="bd">
    <center>
    <table class="table table-bordered table-responsive" style="width:1000px;">
           
            <?php
            
                 require_once './connect_db.php';
           
                    $sql="select o.order_id,o.order_date,l.items_id,l.item_name,l.itemcost,l.itemImgpath,a.addr_id,a.hno_street,a.city,a.dist,a.zip,a.`state`
 from orders o join customers c on o.customer_id=c.customer_id join list_of_items l on o.itemid=l.items_id join 
address a on o.addr_id=a.addr_id where o.customer_id=".$_SESSION["cid"]."";
                    $result=$conn->query($sql);
                if($result->num_rows){
                    ?>
         <tr>
                <th>Item name</th>
                <th>Price</th>
                <th>Address</th>
                <th>Ordered date</th><th>Image</th>
            </tr>
        <?php
                    while($row = $result->fetch_assoc()){
                           echo "<tr>";
echo "<td><a href='itemDesc.php?id=".$row["items_id"]."'>" . $row['item_name'] . "</a></td>";
echo "<td>" . $row['itemcost'] . "</td>";
echo "<td>" .$row["hno_street"].",".$row["city"].",".$row["dist"].",".$row["zip"].",".$row["state"]. "</td>";
echo "<td>" . $row['order_date'] . "</td>";
echo "<td><image src='" . $row['itemImgpath'] . "' width='200px',height='200px'/></td>";
echo "</tr>";
                    }
                }else{
               ?>
           <div class="divOutput"><span class="spanOp">You Have not ordered anything yet..!!<span></div>
           <?php
           }

                
                $conn->close;
            ?>
            
        </table> 
    </center>
</div>

