
       <?php

            //session_start();
            require 'connect_db.php';
            require 'getIp.php';
            
            $email=$_POST['email'];
            $pwd=$_POST['new_pwd'];
            
            
       $sqlInsert="update customers set password='".$pwd."',last_accessed=curdate(),pwd_modified=curdate(),"
               . "last_ipaddr='". getRealIpAddr()."' where email='".$email."'";
         //echo $sqlInsert;   
                    if(!$conn->query($sqlInsert)===TRUE){
                         echo "Error: " . $sqlInsert . "<br>" . $conn->error;
                         //echo "<center>Password cannot be Changed</center>";     
                         include './login.php';
                     ?>
<script>
        $("#loginForm").append(" <div class='divOutput'><span class='spanOp'>Password cannot be Changed<span></div>");
</script>
                <?php
                    }
                    else{
                        //echo "<center>Password Changed successfully..!! Login Again</center>";
                         include './login.php';
                    ?>
                
<script>
        $("#loginForm").append(" <div class='divOutput'><span class='spanOp'>Password Changed successfully..!! Login Again<span></div>");
</script>
 <?php
                    }
               
        ?>
       


