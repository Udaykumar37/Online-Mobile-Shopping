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
    .itemModalCart{
        margin-left: 15px;
        margin-top: 20px;
        padding-top:20px;
        background-color: #f5f5f5;
        float: left;
        width: 300px;
        height: 350px;
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
        function movetocart(x){
            var url="ajaxProcess.php?type=addToCart&key="+x;
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
                            $("."+x).hide();
                            alert("Item Successfully moved to Card");
                        
                    }else{
                        
                      
                            alert("Item cannot be Moved to Cart");
                       
                    }
 
                    },
                error: function (err,xhr) {
                        console.log("error"+err.Message);
                    }    
            });
        
        }
</script>
<div class="bd">
    <center>
    
   <div class="divs"> 
       <?php
            
                 require_once './connect_db.php';
           
                    $sql="select * from list_of_items l join cart_wishlist c on l.items_id=c.itemid and"
                            . " c.cust_id=".$_SESSION["cid"]." and c.status=0 ";
                    $result=$conn->query($sql);
                if($result->num_rows){
                    while($row = $result->fetch_assoc()){
                        
          ?>
    <div class="itemModalCart <?php echo $row['ct_wl_id']?>">
        <center>
            <img class="itImg" src="<?php echo $row['itemImgpath']?>" /><br><br>
            <a href="itemDesc.php?id=<?php echo $row["items_id"]?>"><span class="itName"><?php echo $row['item_name']?></span></a><br>
            <span class="itPrice">Price : &#8377 <?php echo $row['itemcost']?></span><br><br>
            <input type="button" value="Move to cart" onclick="movetocart('<?php echo $row['ct_wl_id']?>')"/>
        </center>
        
    </div>
      <?php
                    }
                }
                else{
                   ?>
           <div class="divOutput"><span class="spanOp">There are no items in your wish list<span></div>
           <?php
                }
                $conn->close;
      ?>
       
       
   </div>
        </center>  
</div>


    
 