<?php
        include './header.php';
?>
<style>
    th,td{
        border: 1px solid black !important;
    }
</style>
<div class="bd">
    <center>
    <table class="table table-responsive table-bordered" style="width: 800px;border: 0px">
            <tr>
                <th>Mobile Name</th>
                <th>Mobile Price</th>
                <th>Mobile Description</th>
                <th>Payment Type</th><th>Image</th>
            </tr>
            <?php
            
                 require_once './connect_db.php';
           
                    $sql="select * from list_of_items";
                    $result=$conn->query($sql);
                if($result->num_rows){
                    while($row = $result->fetch_assoc()){
                           echo "<tr>";
echo "<td>" . $row['item_name'] . "</td>";
echo "<td>" . $row['itemcost'] . "</td>";
echo "<td>" . $row['item_desc'] . "</td>";
echo "<td>" . $row['payment'] . "</td>";
echo "<td><image src='" . $row['itemImgpath'] . "' width='200px',height='200px'/></td>";
echo "</tr>";
                    }
                }  
                
                $conn->close;
            ?>
            
    </table> </center>
</div>

