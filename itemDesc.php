<?php
        include './header.php';
        session_start();
?>
    <?php
            
                 require_once './connect_db.php';
           
                    $sql="select * from list_of_items where items_id =".$_GET['id']."";
                    //echo "$sql";
                    $result=$conn->query($sql);
                if($result->num_rows){
                   $row = $result->fetch_assoc()
                        
          ?>

<style>
    .divs{
        padding-left:  30px;
        
    }
    .itemModal{
        margin-left: 15px;
        padding-top:20px;
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
         size: 10px;
        color: blue;
        font-weight: 5px;
        padding-top:  10px;
    }
    .itPrice{
        padding-top: 10px;
        size: 10px;
        color: black;
        font-weight: 5px;
        
    }
    .thd{
        font-size: 20px;
        font-weight: 8px;
        
    }
    .addC{
        
        width: 200px;
        background-color: #d0e9c6;
        border: 2px solid #31b0d5;
        border-radius: 5px;
    }
    .addW{
  
        width: 200px;
        background-color: #d0e9c6;
        border: 2px solid #31b0d5;
        border-radius: 5px;
    }
    table{
        border: none;
    }
    td{
        border-top: 0px solid white !important;
    }
</style>
<script>
        function addToCWList(x){
            var url="ajaxProcess.php?type=addToList&addTo="+x+"&key="+<?php echo $row['items_id']?>;
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
                        if(x=="cart"){
                            alert("Item Successfully added to Cart");
                        }
                        else{
                            alert("Item Successfully added to WishList");
                        }
                    }else{
                        if(x=="cart"){
                            alert("Item cannot be added to cart");
                        }
                        else{
                            alert("Item cannot be added to WishList");
                        }
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
    <table class="table table-responsive" style="width: 800px;">
        <tr>
            <td colspan="2"><span style="font-size: 30px;font-family: 10px"><?php echo $row["item_name"]?></span></td>
        </tr>
        <tr>
            <td colspan="2"><center><img src="<?php echo $row['itemImgpath']?>" style="width: 300px;height: 300px;"/></center></td>
        </tr>
        <tr>
            <td class="thd">Price :</td>
            <td>&#8377;&nbsp;<?php echo $row["itemcost"]?></td>
        </tr>
        <tr>
            <td class="thd">Payment Type :</td>
            <td><?php echo $row["payment"]?></td>
        </tr>
        <tr>
            <td class="thd">Description :</td>
            <td><?php echo $row["item_desc"]?></td>
        </tr>
        <?php
                if($_SESSION["username"]!="admin"){
        
        ?>
        <tr>
            <td><input type="button" Value="Add to Wishlist" class="btn addW" onclick="addToCWList('wishl')"/></td>
            <td><input type="button" Value="Add to cart" class="btn addC" onclick="addToCWList('cart')"/></td>
        </tr>
        
        <?php
                }
                    }
                
                $conn->close;
      ?>
    </table>
    </center>
</div>
    
    
    
    
    
    
    
    
    
   
      
 

    
 