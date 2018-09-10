/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function submitForm(){
    var name=document.getElementById('name').value;
    var pwd=document.getElementById('pwd').value;
    var cnfpwd=document.getElementById('cnfpwd').value;
    var mbno=document.getElementById('mno').value;
    var email=document.getElementById('email').value;
    var city=document.getElementById('location').value;
    var gen=document.getElementsByName('gender');
    for(var i=0;i<gen.length;i++){
        if(gen[i].checked){
            var gender=gen[i].value;
            break;
        }
    }
    var lan=document.getElementsByName('lang[]');
    var lang=[];
    for(var i=0;i<lan.length;i++){
        if(lan[i].checked){
            lang.push(lan[i].value);
        }
    }
       
    console.log(name+" "+pwd+" "+cnfpwd+" "+mbno+" "+email+" "+gender+" "+city+" "+lang);
    
    var emMatch=/^([a-z]{6,20}|[A-Z]{6,20})[0-9]{0,}\@[a-z]{5,}\.[a-z]{3,}$/;
    var mbmatch=/^[6-9]{1}[0-9]{9}$/;
    
    if(name==""||name==null||name==undefined){
        alert("Please enter your name");
        document.getElementById('name').focus();
    }
    else if(pwd==""||pwd==null||pwd==undefined){
        alert("Please enter your Password");
        document.getElementById('pwd').focus();
    }
    else if(cnfpwd==""||cnfpwd==null||cnfpwd==undefined){
        alert("Please enter your Confirm Password");
        document.getElementById('cnfpwd').focus();
    }
    else if(pwd!=cnfpwd){
        alert("Password and Confirm Password are not same");
        document.getElementById('pwd').focus();
    }
    else if(mbno==""||mbno==null||mbno==undefined){
        alert("Please enter your Mobile No");
        document.getElementById('mno').focus();
    }
    else if(!mbno.match(mbmatch)){
	alert("Please enter a valid mobile number");
        document.getElementById('mno').focus();
    }
    else if(email==""||email==null||email==undefined){
        alert("Please enter your Email");
        document.getElementById('email').focus();
    }
    else if(!email.match(emMatch)){
	alert("Please enter a valid email id");
        document.getElementById('email').focus();
    }
    else if(gender==""||gender==null||gender==undefined){
        alert("Please Select your Gender");
        document.getElementById('M').focus();
    }
    else if(lang.length==0){
        alert("Please Select your Languages known");
        document.getElementById('eng').focus();
    }
    else if(city==""||city==null||city==undefined){
        alert("Please Select your Location");
        document.getElementById('location').focus();
    }
    else{
        //document.getElementById('thisForm').submit();
    }
       
}


function mouseIn(x){
    x.style.background="#48C9B0";
    x.style.border= "2px solid #ABEBC6"; 
}
function mouseOut(x){
    x.style.background="#5DADE2";
    x.style.border= "2px solid #2E86C1"; 
}
function focusBox(x){
    x.style.background="#EAEDED";
}
function blurBox(x){
    x.style.background="white";
}


function submitLoginForm(){
    var uname=$('#uname').val();
    var pwd=$('#pwd').val();
    if(uname==""||uname==null||uname==undefined){
        alert("Please enter your Username");
        $('#uname').focus();
    }
    else if(pwd==""||pwd==null||pwd==undefined){
        alert("Please enter your Password");
        document.getElementById('pwd').focus();
        $('#pwd').focus();
    }
    else{
        $('#loginForm').submit();
    }
}

    
function submitRegForm(){
    var name=document.getElementById('name').value;
    var pwd=document.getElementById('pwd').value;
    var cnfpwd=document.getElementById('cnfpwd').value;
    var mbno=document.getElementById('mno').value;
    var email=document.getElementById('email').value;
    //var city=document.getElementById('location').value;
    var gen=document.getElementsByName('gender');
    
    var img=$('#img').val();
    var img_ext=$('#img').val().split('.').pop().toLowerCase();
    
    for(var i=0;i<gen.length;i++){
        if(gen[i].checked){
            var gender=gen[i].value;
            break;
        }
    }
    /*var lan=document.getElementsByName('lang[]');
    var lang=[];
    for(var i=0;i<lan.length;i++){
        if(lan[i].checked){
            lang.push(lan[i].value);
        }
    }*/
       
    //console.log(name+" "+pwd+" "+cnfpwd+" "+mbno+" "+email+" "+gender);
    
    
    
    var emMatch=/^([a-z]{6,20}|[A-Z]{6,20})[0-9]{0,}\@[a-z]{5,}\.[a-z]{3,}$/;
    var mbmatch=/^[6-9]{1}[0-9]{9}$/;
    
    if(name==""||name==null||name==undefined){
        alert("Please enter your name");
        document.getElementById('name').focus();
    }
    else if(pwd==""||pwd==null||pwd==undefined){
        alert("Please enter your Password");
        document.getElementById('pwd').focus();
    }
    else if(cnfpwd==""||cnfpwd==null||cnfpwd==undefined){
        alert("Please enter your Confirm Password");
        document.getElementById('cnfpwd').focus();
    }
    else if(pwd!=cnfpwd){
        alert("Password and Confirm Password are not same");
        document.getElementById('pwd').focus();
    }
    else if(mbno==""||mbno==null||mbno==undefined){
        alert("Please enter your Mobile No");
        document.getElementById('mno').focus();
    }
    else if(!mbno.match(mbmatch)){
	alert("Please enter a valid mobile number");
        document.getElementById('mno').focus();
    }
    else if(email==""||email==null||email==undefined){
        alert("Please enter your Email");
        document.getElementById('email').focus();
    }
    else if($('#otp').val()==""||$('#otp').val()==null||$('#otp').val()==undefined){
        alert("Please enter otp");
        document.getElementById('otp').focus();
    }
    else if(!email.match(emMatch)){
	alert("Please enter a valid email id");
        document.getElementById('email').focus();
    }
    else if(gender==""||gender==null||gender==undefined){
        alert("Please Select your Gender");
        document.getElementById('M').focus();
    }
    else if(img==""||img==null||img==undefined){
        alert("Please Select Image");
        document.getElementById('img').focus();
    }
    else if($.inArray(img_ext,['png','jpg','jpeg'])==-1){
        alert("Please Select Correct Image Extension jpg/png/jpeg");
        document.getElementById('img').focus();
    }
    else{
        document.getElementById('signupform').submit();
    }
       
}
          var otp="";
      function checkEmailExist(emailId){
       if($('#email').val().length>0){
        $.ajax({
        type: "GET", //GET or POST or PUT or DELETE verb
        url: "ajaxProcess.php?type=email&emailid="+emailId+"", // Location of the service
        dataType: "json", //Expected data format from server
        processdata: true, //True or False
        success: function (result) {//On Successful service call
            console.log(result.exists);
            if(result.exists=="true"){
                $('#emEr').text("This Email Id is Already Registered");
                $('#emEr').show().attr("style","color:red");
                $('#email').val("");
                $('#email').focus();
            }
            else{
               $('#emEr').text("");
               $('#emEr').hide();
               $.ajax({
        type: "GET", //GET or POST or PUT or DELETE verb
        url: "ajaxProcess.php?type=sendotp&emailid="+emailId+"", // Location of the service
        dataType: "json", //Expected data format from server
        processdata: true, //True or False
        beforeSend: function () {
                   $('#emEr').text("An otp has sent to your email..Please enter the otp to continue!");
               $('#emEr').show().attr("style","color:black");     
                    },
        success: function (result) {//On Successful service call
            console.log(result.otp);
            if(result.otp=="no"){
                $('#emEr').text("Invalid email id..Please enter a valid one");
                $('#emEr').show().attr("style","color:red");
                $('#email').val("");
                $('#email').focus();
            }
            else{
                otp=result.otp;
                
               $('#emEr').text("An otp has sent to your email..Please enter the otp to continue!");
               $('#emEr').show().attr("style","color:black");
                
                $('#otpR').show();
                $('#otp').val("");
                $('#otp').focus();
                
            }
        },
        error:function(error){
           console.log(error);
       }
    });
                
            }
        },
        error:function(error){
           console.log(error);
       }
    });
       }
    }
      function checkOTP(){
          
          if($('#otp').val()!=otp){
              $('#emEr').text("Invalid OTP ..Please check your otp");
                $('#emEr').show().attr("style","color:red");
                $('#emEr').show();
                $('#otp').val("");
                $('#otp').focus();
          }
          else{
              $('#emEr').text("");
               $('#emEr').hide();
          }
      
      }
      
 
    function viewImage(input){
        if(input.files && input.files[0]){
            var reader=new FileReader();
            reader.onload=function(e){
                $('#img_prv').attr("src",e.target.result).width(150).height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
        
    }