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
    .divs{
        padding-left:  30px;
        
    }
    .itemModal{
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
        padding-top:20px;
        background-color: #f5f5f5;
        float: left;
        width: 290px;
        height: 350px;
        border: 1px solid #cdcdcd;
        border-radius: 5px;
    }
    .itImg{
        border-radius: 10px;
        width: 200px;
        height: 250px;
    }
    a{
        text-decoration: none;
    }
    .itName{
         font-size: 20px;
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
<div class="bd" >
    
    
   <div class="divs"> 
       <?php
            
                 require_once './connect_db.php';
           
                    $sql="select * from list_of_items where item_name like '%".$_POST['search']."%'";
                    $result=$conn->query($sql);
                if($result->num_rows){
                    while($row = $result->fetch_assoc()){
                        
          ?>
    <div class="itemModal">
        <center>
            <img class="itImg" src="<?php echo $row['itemImgpath']?>" /><br><br>
            <a href="itemDesc.php?id=<?php echo $row["items_id"]?>"><span class="itName"><?php echo $row['item_name']?></span></a><br>
            <span class="itPrice">Price : &#8377 <?php echo $row['itemcost']?></span><br><br>
        </center>
        
    </div>
      <?php
                    }
                }
                $conn->close;
      ?>
       
       
   </div>
       
</div>


    
 