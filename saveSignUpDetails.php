   <?php

            session_start();
            require 'connect_db.php';
            require './getIp.php';
            
            require './mail.php';
            $name=$_POST['name'];
            $pwd=$_POST['pwd'];
            $email=$_POST['email'];
            $mobileno=$_POST['mobileno'];
            $gender=$_POST['gender'];
            
        $name_img=$email."_".$_FILES['imageP']['name'];
        $target_dir_img="Images/";
        $target_file_img= $target_dir_img .$email."_". basename($_FILES['imageP']['name']);
        $imageFileType= strtolower(pathinfo($target_file_img,PATHINFO_EXTENSION));
        $exten_arr_img=array("jpg","jpeg","png");
        
        
            $sub="Registration";
            $body="You Have Successfully created Your Account...<br>Have a good shopping experience :-)" ;       
      
            $sqlCheck="select count(*) as count from customers where email='".$email."' or mobileno=".$mobileno."";
            
            $result=$conn->query($sqlCheck);
            if($result->num_rows>0){
                $row=$result->fetch_assoc();
                if($row["count"]>0){
                                    $conn->close();
                                    include './signup.php';
                  ?>
  
<script>
        $("#signupform").append(" <div class='divOutput'><span class='spanOp'>This email id or mobileno is already Registered<span></div>");
</script>
                        <?php
                    
                }
                else{
                    $sqlInsert="insert into customers(user_name,password,email,mobileno,gender,signup_date,last_accessed,pwd_modified,last_ipaddr,imagePath) values "
     . "('".$name."','".$pwd."','".$email."',".$mobileno.",'".$gender."',curdate(),curdate(),curdate(),'". getRealIpAddr()."',"
                            . "'".$target_file_img."')";
            
                     if(move_uploaded_file($_FILES['imageP']['tmp_name'], $target_file_img)&&!$conn->query($sqlInsert)===TRUE){
                         echo "Error: " . $sqlInsert . "<br>" . $conn->error;
                         echo "<center>Registration failure</center>";
                        include './signup.php'; 
                    }
                    else{
                        if($row["user_name"]=="admin"){
                           $_SESSION["username"]=$row["user_name"];
                            $_SESSION["emailid"]=$row["email"];
                            $_SESSION["mobileno"]=$row["mobileno"];
                            $_SESSION["password"]=$row["password"];
                            header("location:uploadItems.php");
                       }
                       else{
                           
                         $_SESSION["username"]=$name;
                        $_SESSION["emailid"]=$email;
                        $_SESSION["mobileno"]=$mobileno;
                        $_SESSION["password"]=$pwd;
                        header("location:initial_page.php");
                        sendmail($email, $sub, $body);
                       }
                        $conn->close();
                        //echo "Data successfully inserted"; 
                        
                    }
                }
            }
            
           
            
        ?>
       


