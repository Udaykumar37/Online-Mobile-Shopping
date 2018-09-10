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
    td{
        border-top: 0px solid white !important;
    }
</style>
<div class="bd">

    <center>
        <form action="saveSignUpDetails.php" method="post" id="signupform" enctype="multipart/form-data">
            <table class="table table-responsive" style="width: 600px;border:0px"  >
            <tr>
                <td colspan="2" class="title">Registration form</td>
            </tr>
            <tr>
                <td class="lable">Name :</td>
                <td><input type="text" id="name" name="name" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">Password :</td>
                <td><input type="password" id="pwd" name="pwd" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">Confirm Password :</td>
                <td><input type="password" id="cnfpwd" name="cnfpwd" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">Mobile no :</td>
                <td><input type="text" id="mno" name="mobileno" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">Email :</td>
                <td><input type="text" id="email" name="email" class="form-control text" onfocus="focusBox(this)"
                           onblur="blurBox(this)" onchange="checkEmailExist(this.value)"/><!--onchange="checkEmailExist(this.value)"-->
                    <br><span id="emEr"></span>
                </td>
            </tr>
            <tr id="otpR" style="display: none">
                <td class="lable">OTP :</td>
                <td><input type="text" id="otp" name="otp" class="form-control text" onfocus="focusBox(this)"
                           onblur="blurBox(this)" onchange="checkOTP()"/>
                </td>
            </tr>
            <tr>
                <td class="lable">Gender :</td>
                <td><input type="radio" name="gender" id="M" value="Male" />&nbsp;&nbsp;Male
                    <input type="radio" name="gender" id="F" value="Male"/>&nbsp;&nbsp;Female</td>
            </tr>
            <tr>
                <td class="lable">Upload Image : </td>
                <td><input type="file" name="imageP" id="img" onchange="viewImage(this)"/><img id="img_prv"/>
                   </td>
            </tr>
             
            <tr>
                <td colspan="2" style="text-align: center">
                    <input type="button" value="Submit" onclick="submitRegForm()" class="btn btn-primary button" onmouseover="mouseIn(this)" onmouseout="mouseOut(this)" />
                           <input type="reset" value="Reset" class="btn btn-primary button" onmouseover="mouseIn(this)" onmouseout="mouseOut(this)"/></td>
            </tr>
             <tr>
                <td colspan="2" style="text-align: center"> <a href="login.php">Click here to goto SignIn Page</a>
                </td>
            </tr>
        </table>
           
          
    </form>  
        </center>
</div>
