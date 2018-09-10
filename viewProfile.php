<?php
        include './header.php';
?>

<style>
    #pImg{
        width: 300px;
        height: 300px;
        border-radius: 30px;
    }
    </style>
    <style>
    td{
        border-top: 5px solid transparent !important;
        padding-left: 20px !important;
        color: #632929;
        font-size: 20px;
        font-family: 10px;
    }
</style>
<div class="bd">
    <center>
    <table class="table table-responsive" style="width: 700px;text-align: center;border:0px">
            <tr> 

            <?php
            
                 require_once './connect_db.php';
           
                    $sql="select customer_id,user_name,password,email,gender,mobileno,imagePath "
                            . "from customers where customer_id=".$_SESSION["cid"]."";
                    $result=$conn->query($sql);
                if($result->num_rows){
                    $row=$result->fetch_assoc();
                    ?>
       
            <tr><td rowspan="5" ><center><img  id="pImg" src="<?php echo $row["imagePath"]?>" alt="Profile" class="img img-rounded img-circle img-responsive" /></center></td></tr>
            <tr><td>Name :<?php echo $row["user_name"]?></td></tr>
            <tr><td>Email :<?php echo $row["email"]?></td></tr>
            <tr><td>Mobile No :<?php echo $row["mobileno"]?></td></tr>
            <tr><td>gender :<?php echo $row["gender"]?></td></tr>
            
                <?php
                }  
                
                $conn->close;
            ?>
        </table> 
    </center>
</div>

