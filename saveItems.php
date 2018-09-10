       <?php

            session_start();
            require 'connect_db.php';

            $mb_name=$_POST['mb_name'];
            $price=$_POST['price'];
            $payT=$_POST['payT'];
            $mb_desc=$_POST['mb_desc'];
            $payTOp="";
            foreach ($payT as $l) {
                        $payTOp=$payTOp.$l.",";
                    }
            
        $name_img=$mb_name."_".$_FILES['imageP']['name'];
        $target_dir_img="ItemImages/";
        $target_file_img= $target_dir_img .$mb_name."_". basename($_FILES['imageP']['name']);
        $imageFileType= strtolower(pathinfo($target_file_img,PATHINFO_EXTENSION));
        $exten_arr_img=array("jpg","jpeg","png");
        
        
       
     $sqlInsert="insert into list_of_items(item_name,itemcost,item_desc,payment,itemImgpath)"
             . " values('".$mb_name."','".$price."','".$mb_desc."','".$payTOp."','".$target_file_img."')";
            
              if(move_uploaded_file($_FILES['imageP']['tmp_name'], $target_file_img)&&!$conn->query($sqlInsert)===TRUE){
                         echo "Error: " . $sqlInsert . "<br>" . $conn->error;
                         echo "<center>Item Details Not Inserted</center>";
                        include './uploadItems.php'; 
                    }
                    else{
                        
                        $conn->close();
                        //echo "<center>Item Details Successfully Inserted...Insert Another Details</center>"; 
                        ?>
<script>

    alert("Item Details Successfully Inserted");
    
</script>
    
<?php
                        include './uploadItems.php'; 
                    }
                
          
            
        ?>
       


