<?php
        include './header.php';
?>

  <script>
                function subAddrForm(){

          if($('#street').val()==""||$('#street').val()==null){
              alert("Please enter House No/street");
              $('#street').focus();
          }
          else if($('#city').val()==""||$().val('#city')==null){
              alert("Please enter City");
              $('#city').focus();
          }
          else if($('#dist').val()==""||$('#dist').val()==null){
              alert("Please enter District");
              $('#dist').focus();
          }
          else if($('#zip').val()==""){
              alert("Please enter Zip code");
              $('#zip').focus();
          }
          else if($('#state').val()==""){
              alert("Please enter state");
              $('#state').focus();
          }
          else{
              $('#addressform').submit();
          }
      }
      
      function showAddressForm(){
          $("#addressform").slideDown();
      }
      </script>
      <style>
             th,td{
        border:1px solid black !important;
    }
      </style>
<div class="bd"> 
    <center>
    <table class="table table-bordered table-responsive" style="width: 700px;text-align: center">
        
            <?php
                  
                    $sqlAddr="select addr_id,hno_street,city,dist,zip,state,customer_id from address where "
                                . " customer_id=".$_SESSION["cid"]."";
                    
                    
                    $resultAddr=$conn->query($sqlAddr);
                    
                if($resultAddr->num_rows){
                    ?>
        <tr>
            <td colspan="2">Select Address</td>
        </tr>
        <?php
                    $cnt=0;
                    while($row=$resultAddr->fetch_assoc()){
                        $cnt=$cnt+1;
                    ?>
            
            
        <tr><td>Address <?php echo $cnt?></td>
            <td><a href="viewAddress.php?type=old&addrId=<?php echo $row["addr_id"]?>"><?php echo $row["hno_street"].",".$row["city"].",".$row["dist"].",".$row["zip"].",".$row["state"]?></a></td></tr>
            
                    <?php
                    }   
                }  
                
                $conn->close;
            ?>
    </table><br>
    <input type="button" class="btn btn-success" value="Add New Address" style="width: 300px;" onclick="showAddressForm()"/><br><br>
   
    <form action="saveAddress.php" method="post" id="addressform" enctype="multipart/form-data" style="display: none">
            <table class="table table-responsive" style="width: 500px;">
            <tr>
                <td colspan="2" class="title">Add Address</td>
            </tr>
            <tr>
                <td class="lable">House No/Street:</td>
                <td><input type="text" id="street" name="street" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">City :</td>
                <td><input type="text" id="city" name="city" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">District:</td>
                <td><input type="text" id="dist" name="dist" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">Zip Code:</td>
                <td><input type="text" id="zip" name="zip" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">State:</td>
                <td><input type="text" id="state" name="state" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            
           
            <tr>
                <td colspan="2" style="text-align: center">
                    <input type="button" value="Submit" onclick="subAddrForm()" class="btn btn-primary button" onmouseover="mouseIn(this)" onmouseout="mouseOut(this)" />
                           <input type="reset" value="Reset" class="btn btn-primary button" onmouseover="mouseIn(this)" onmouseout="mouseOut(this)"/></td>
            </tr>
             
        </table>
           
          
    </form>  
        </center>
</div>
