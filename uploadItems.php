<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
        include './header.php';
?>
    <!--    <title>Registration Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="scripts/script.js"></script>
        <link rel="stylesheet" href="styles/style.css"/>
          <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>-->
  <style>
      table{
          border: 0px;
      }
    td{
        border-top: 0px solid white !important;
    }
</style>
  <script>
            function submitItemsForm(){

            var img=$('#img').val();
            var payment = $('input[name="payT[]"]:checked').length;
            
    var img_ext=$('#img').val().split('.').pop().toLowerCase();
          if($('#mb_name').val()==""||$().val('#mb_name')==null){
              alert("Please enter Mobile Name");
              $('#mb_name').focus();
          }
          else if($('#price').val()==""||$().val('#price')==null){
              alert("Please enter Mobile price");
              $('#price').focus();
          }
          else if(payment<=0){
              alert("Please check Payment Type");
              $('#cod').focus();
          }
          else if($('#mb_desc').val()==""){
              alert("Please enter Mobile description");
              $('#mb_desc').focus();
          }
           else if(img==""||img==null||img==undefined){
             alert("Please Select Image");
                document.getElementById('img').focus();
           }
        else if($.inArray(img_ext,['png','jpg','jpeg'])==-1){
                alert("Please Select Correct Image Extension jpg/png/jpeg");
            document.getElementById('img').focus();
          }else{
              $('#itemsForm').submit();
          }
      }
      </script>

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
    
    <div class="bd">
        <div class="row">
            
        </div>
        <div class="row">
    <center>
        <form action="saveItems.php" method="post" id="itemsForm" enctype="multipart/form-data">
            <table class="table table-responsive " style="width: 500px;">
            <tr>
                <td colspan="2" class="title">Upload Mobile Details</td>
            </tr>
            <tr>
                <td class="lable">Mobile Name :</td>
                <td><input type="text" id="mb_name" name="mb_name" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">Price :</td>
                <td><input type="text" id="price" name="price" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"/></td>
            </tr>
            <tr>
                <td class="lable">Payment Type :</td>
                <td><input type="checkbox" name="payT[]" id="cod" value="Cash On Delivery"/>COD
                    <input type="checkbox" name="payT[]" id="nb" value="Net Banking Credit/Debit card"/>Net Banking Credit/Debit card
            </tr>
            <tr>
                <td class="lable">Mobile Description:</td>
                <td><textarea id="mb_desc" name="mb_desc" class="form-control text" onfocus="focusBox(this)" onblur="blurBox(this)"></textarea></td>
            </tr>
            
            <tr>
                <td class="lable">Upload Image : </td>
                <td><input type="file" name="imageP" id="img" onchange="viewImage(this)"/><img id="img_prv"/>
                   </td>
            </tr>
             
            <tr>
                <td colspan="2" style="text-align: center">
                    <input type="button" value="Submit" onclick="submitItemsForm()" class="btn btn-primary button" onmouseover="mouseIn(this)" onmouseout="mouseOut(this)" />
                           <input type="reset" value="Reset" class="btn btn-primary button" onmouseover="mouseIn(this)" onmouseout="mouseOut(this)"/></td>
            </tr>
             
        </table>
           
          
    </form>  
        </center>
        </div>

    </div>


