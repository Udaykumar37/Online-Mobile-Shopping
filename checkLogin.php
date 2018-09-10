 <script type="text/javascript" src="scripts/script.js"></script>
       <link rel="stylesheet" href="styles/style.css"/>
       <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 

      <?php

            session_start();
            require 'connect_db.php';
            require './getIp.php';
            $uname=$_POST['uname'];
            $pwd=$_POST['pwd'];
            
            
          
            $sqlCheck="select customer_id,user_name,password,email,mobileno from customers where email='".$uname."' and password='".$pwd."'";
            $result=$conn->query($sqlCheck);
            
                if(!$result){
                     echo "Error: " . $sqlCheck . "<br>" . $conn->error;
                }
                else{
                   if($result->num_rows==1){
                       $row=$result->fetch_assoc();
                       /*if($row["user_name"]=="admin"){
                           $_SESSION["username"]=$row["user_name"];
                            $_SESSION["emailid"]=$row["email"];
                            $_SESSION["mobileno"]=$row["mobileno"];
                            $_SESSION["password"]=$row["password"];
                            header("location:uploadItems.php");
                       }else{*/
                            $_SESSION["cid"]=$row["customer_id"];
                           $_SESSION["username"]=$row["user_name"];
                            $_SESSION["emailid"]=$row["email"];
                            $_SESSION["mobileno"]=$row["mobileno"];
                            $_SESSION["password"]=$row["password"];
                            header("location:initial_page.php");
                       //}
                            
                   }
                   else{
                        include './login.php';
                        ?>
  
<script>
        $("#loginForm").append(" <div class='divOutput'><span class='spanOp'>Invalid username or password<span></div>");
</script>
                        <?php
                   }
                }
                $conn->close();
        ?>
       


