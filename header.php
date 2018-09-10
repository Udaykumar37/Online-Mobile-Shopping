 <?php
            session_start();
            $carCnt="";
            $wishCnt="";
            if(isset($_SESSION["cid"])){
                 require_once './connect_db.php';
           
                    $sql="select status,count(itemid)as count from cart_wishlist where cust_id=".$_SESSION["cid"]." GROUP by status;";
                    $result=$conn->query($sql);
                    
                if($result->num_rows){
                      while($row = $result->fetch_assoc()){
                          if($row['status']==0){
                              $wishCnt=$row['count'];
                          }
                          if($row['status']==1){
                              $carCnt=$row['count'];
                          }
                      }
                }     
            } 
          ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script type="text/javascript" src="scripts/script.js"></script>
       <link rel="stylesheet" href="styles/style.css"/>
       <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
  </style> 
        <style>
            
       .divOutput {
    width: 70%;
    height: 50px;
    background: #f5f5f5;
    border: 1px solid #cdcdcd;
    display: table;
    text-align: center;
    border-radius: 5px;
}

.divOutput span {
    display: table-cell;
    vertical-align: middle;
     font-size: 20px;
}
            a{
                color:red;
            }
            .mainBg{
                background-image:url('projImages/cart.jpg');
                background-repeat: y-repeat;
                  height: 100%; 
    background-position: inherit;
    background-size: cover;
    color: #632929;
             
            }
            nav{
                margin-top: 20px;
                padding-bottom: 5px;
                padding-top: 5px;
            } 
          .bd{
              margin-top: 120px;
              display: none;
          }
          .navbar{
              font-size: 15px;
              font-weight: 10px;
              color: white;
          }
               table{
          border: 0px;
      }
    td{
        border-top: 0px solid white !important;
    }
      </style>
  <style>

/*#srid {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}*/
#details{float:left;list-style:none;margin-top:-3px;padding:0;width:500px;position: absolute;}
#details li{color:black;padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;border-radius: 5px;}
#details li:hover{background:#ece3d2;cursor: pointer;}
#search{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
.aaa{display: inline}
    </style> 
  <script>
      $(document).ready(function(){
    $(".bd").fadeIn();
});
        if(window.location.pathname.split('/').pop()=="initial_page.php"){
         history.pushState("null","null",document.title);
                window.addEventListener('popstate',function(){
                    history.pushState("null","null",document.title);
                });
                
           }    
         function showSuggest(){
             console.log($("#search").val());
            if($("#search").val().length>0){
            $.ajax({
                type :  "GET",
                url: "ajaxProcess.php?type=search&key="+$("#search").val(),
                dataType: 'json',
                processData: true,
                success: function (data) {
                        console.log(data.data);
                        $("#suggest").html(data.data);
                        $("#search").css("background","#FFF");
                    },
                error: function (error) {
                        console.log("error"+error);
                    }    
            });
        }
        else{
            $("#suggest").html("");
        }
        }
        
        function selectitem(x){
            $("#search").val(x);
            $("#suggest").hide();
            $("#searchForm").submit();
        }       
  </script>
<?php
    session_start();
?>
  <body class="mainBg">  
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
      <div class="navbar-header" style="width:100px;">
          <a class="navbar-brand" href="initial_page.php" style="color: white;">CartUs</a>
    </div>
    
      <form class="navbar-form navbar-left" method="post" action="initial_page.php" id="searchForm">
      <div class="input-group">
          
          <input type="text" class="form-control" autocomplete="off" placeholder="Search" name="search" 
                 id="search" onkeyup="showSuggest()" style="width: 450px"/>
        
        
          <button class="btn btn-default" style="height: 34px;" type="submit" >
            <i class="glyphicon glyphicon-search"></i>
          </button>
          <span id="suggest"></span>

      </div>
        
    </form>
      <ul class="nav navbar-nav">
          <?php
                if(!isset($_SESSION["username"])){
                    echo "<li><a href='login.php'>Login/SignUp</a></li>";
                    //echo "<li><a href='#'>Cart</a></li>";
                    //echo "<li><a href='#'>Wishlist</a></li>";
                }
                else if($_SESSION["username"]=="admin"){
                     echo "<li><a href='#'>Hello..".$_SESSION["username"]."</a></li>";
                    echo "<li><a href='viewProfile.php'>Profile</a></li>";
                    echo "<li><a href='uploadItems.php'>Add Items</a></li>";
                    echo "<li><a href='viewItemDetails.php'>View Items</a></li>";
                   echo "<li><a href='logout.php'>Logout</a></li>";                   
                    
                }
                else{
                    echo "<li><a href='#'>Hello..".$_SESSION["username"]."</a></li>";
                    echo "<li><a href='viewProfile.php'>Profile</a></li>";
                    echo "<li><a href='cartDetails.php'>Cart&nbsp;&nbsp;".$carCnt."</a></li>";
                    echo "<li><a href='wishlistDetails.php'>Wishlist&nbsp;&nbsp;".$wishCnt."</a></li>";
                     echo "<li><a href='orderDetails.php'>Orders</a></li>";
                    echo "<li><a href='logout.php'>Logout</a></li>";
                }

          ?>
    </ul>
    </div>
    <span id="suggest" ></span>
    
    <!--<div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      
    </ul>
    </div>-->
   
</nav>
     


