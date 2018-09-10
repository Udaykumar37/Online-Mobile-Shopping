<?php
        include './header.php';
?>
<style>
    td{
        border-top: 0px solid white !important;
    }
</style>

<?php
        require_once './mail.php';
        $mailto=$_GET['email'];
        $op= mt_rand(666666, 999999);
        $sub="Forgot Password";
        $body="Helllo...".$_SESSION[""]."<br>Your One time Password is :".$op;
        
        if(sendmail($mailto, $sub, $body)){
            ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="scripts/script.js"></script>
        <link rel="stylesheet" href="styles/style.css"/>
          <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   -->
   <div class="bd">
  <script>
      function submitChangepassForm(){
          var op="<?php echo $op?>";
          console.log(op);
          if($('#pwd').val()==""||$().val('#pwd')==null){
              alert("Please enter One time password");
              $('#pwd').focus();
          }
          else if($('#new_pwd').val()==""||$().val('#new_pwd')==null){
              alert("Please enter New password");
              $('#new_pwd').focus();
          }
          else if($('#cnf_pwd').val()==""||$().val('#cnf_pwd')==null){
              alert("Please enter Confirm password");
              $('#cnf_pwd').focus();
          }
          else if($('#new_pwd').val()!=$('#cnf_pwd').val()){
              alert("new password and confirm password are not same");
              $('#cnf_pwd').focus();
          }
          else if($('#pwd').val()!=op){
              alert("Please enter Correct One time password");
              $('#pwd').focus();
          }else{
              $('#changePassFrm').submit();
          }
      }
  </script>    
      <center>
  <div class="divOutput"><span class="spanOp">A One time password has been sent to your registered mail.Please Use that Password to create a new one<span></div>
        <form action="changePassword.php" method="post" id="changePassFrm">
            <input type="hidden" name="email" value="<?php echo $mailto?>"/>
            <table class="table table-responsive" style="width: 500px">
            <tr>
                <td colspan="2" class="title">Change Password</td>
                </tr>
            <tr>
                <td class="lable">Password :</td>
                <td><input type="password" id="pwd" name="pwd" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">New Password :</td>
                <td><input type="password" id="new_pwd" name="new_pwd" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">Confirm Password :</td>
                <td><input type="password" id="cnf_pwd" name="cnf_pwd" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
                        <tr>
                <td colspan="2" style="text-align: center">
                    <input type="button" value="Submit" onclick="submitChangepassForm()" class="btn btn-primary button" onmouseover="mouseIn(this)" onmouseout="mouseOut(this)"/>
                    <input type="reset" value="Reset" class="btn btn-primary button" onmouseover="mouseIn(this)" onmouseout="mouseOut(this)"/></td>
            </tr>
            
            
        </table>
            

    </form>  
        </center>



            <?php
        }else{
            echo "<center>Invalid email Id</center>";
            include './login.php';
        }
        
?>
 </div>