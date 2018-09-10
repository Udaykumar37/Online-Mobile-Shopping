<?php
        include './header.php';
?>

<style>
    .divs{
        padding-left:  30px;
        
    }
    .itemModal{
        margin-left: 15px;
        padding-top:20px;
        margin-top: 20px;
        background-color: #f5f5f5;
        float: left;
        width: 300px;
        height: 300px;
        border: 1px solid #cdcdcd;
        border-radius: 5px;
    }
    .itImg{
        border-radius: 10px;
        width: 250px;
        height: 200px;
    }
    a{
        text-decoration: none;
    }
    .itName{
         font-size: 25px;
        color: blue;
        font-weight: 5px;
        padding-top:  10px;
    }
    .itPrice{
        padding-top: 10px;
        font-size: 15px;
        color: black;
        font-weight: 5px;
        
    }

 
</style>
<script>
    
        function caluculateTotal(){
            var total=0;
            $(".cartT").find("tr").each(function() { //get all rows in table

                if((($(this).find('.exists').text())!="")){
                        total = total+parseFloat($(this).find('.exists').text()); 
                    }
        });
        console.log(total);
            $('#cTR').text(total);
        }
        function removeFromCart(x){
            var url="ajaxProcess.php?type=removeFromCart&key="+x;
            $.ajax({
                type :  "GET",
                url:  url,
                dataType: 'json',
                processData: true,
                beforeSend: function () {
                            console.log(url);
                        },
                success: function (data) {
                        console.log(data);
                        
                        if(data.status=="true"){
                            $("."+x).remove();
                            alert("Item Successfully Removed From Cart");
                            caluculateTotal();
                        
                    }else{
                        
                      
                            alert("Item cannot be Removed From Cart");
                            caluculateTotal();
                       
                    }
 
                    },
                error: function (err,xhr) {
                        console.log("error"+err.Message);
                    }    
            });
        
        }

</script>
<style>
    td{
        border: 1px solid black !important;
    }
    </style>
<div class="bd">

       
       <center>
           
       <table class="table table-bordered table-responsive cartT" style="width: 1000px;">
         
       
       <?php
            
                 require_once './connect_db.php';
                    $total=0;
                    $sql="select * from list_of_items l join cart_wishlist c on l.items_id=c.itemid and"
                            . " c.cust_id=".$_SESSION["cid"]." and c.status=01";
                    $result=$conn->query($sql);
                if($result->num_rows){
                    while($row = $result->fetch_assoc()){
                        
                               echo "<tr class='".$row['ct_wl_id']."'>";
echo "<td>" . $row['item_name'] . "</td>";
echo "<td><image src='" . $row['itemImgpath'] . "' width='200px',height='200px'/></td>";
echo "<td class='exists'>" . $row['itemcost'] . "</td>";
echo "<td><input type='button' class='btn btn-primary' value='Remove From Cart' onclick=\"removeFromCart('".$row['ct_wl_id']."')\"></td>";
echo "</tr>";
    $total=$total+$row['itemcost'] ;
                    }
                }  
                
                $conn->close;
            ?>
           
           <?php
           if($result->num_rows){
           ?>
           <tr>
               <td colspan="2" style="text-align: right">Total: </td>
               <td id="cTR">&#8377;&nbsp;<?php echo $total?></td><td></td>
           </tr>
           <tr>
               <td colspan="4" style="text-align: center"><input type="button" class="btn btn-success" value="Place Your Order" onclick="javascript:window.location.href='orderAddress.php'"/></td>
            
           </tr>
           <?php
           }
           else{
               ?>
           <div class="divOutput"><span class="spanOp">There are no items in your Cart<span></div>
           <?php
           }
           ?>
        </table>
        </center>
   </div>



    
 