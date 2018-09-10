<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
        include './header.php';
?>
<style>
    td{
        border-top: 0px solid white !important;
    }
</style>
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
<div class="bd">
<!--<html>
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
  <script>
      function checkMail(){
        if($('#uname').val()==""||$('#uname').val()==null){
            alert('Please enter email id');
            return false;
        }
        else{
            $('#a').attr("href","forgotPass.php?email="+$('#uname').val()+"");
            return true;
        }
      }
  </script>    

    <center>
        <form action="checkLogin.php" method="post" id="loginForm">
            <table class="table table-responsive" style="width: 500px;border:0px">
            <tr>
                <td colspan="2" class="title">Login form</td>
            </tr>
            <tr>
                <td class="lable">Email :</td>
                <td><input type="text" id="uname" name="uname" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">Password :</td>
                <td><input type="password" id="pwd" name="pwd" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
                        <tr>
                <td colspan="2" style="text-align: center">
                    <input type="button" value="Submit" onclick="submitLoginForm()" class="btn btn-primary button" onmouseover="mouseIn(this)" onmouseout="mouseOut(this)"/>
                    <input type="reset" value="Reset" class="btn btn-primary button" onmouseover="mouseIn(this)" onmouseout="mouseOut(this)"/></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center"><a href="signup.php"  target="blank">New to Cactus ? SignUp</a>
                    <a href=""   onclick="return checkMail()" id="a">Forgot Password</a>
                </td>
            </tr>
            
        </table>
            

    </form>  
        </center>
</div>