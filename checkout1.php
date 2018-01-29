<?php
	session_start();
	require ("function.php");// Including the db Connection	
	remove();
	update();
	
?>
<html lang="en">
<head>
  <title>E-Commerce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
<style>
.form1 {
  position: relative;  
  z-index: 1;
  background: #FFFFFF;
  max-width: 950px;
  height: 400px; 
  margin: 0 auto 5px;
  padding: 15px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.box {
  position: relative;  
  z-index: 1;
  background: #FFFFFF;
  max-width: 270px; 
  height: 400px;  
  margin: 0 auto 5px;
  padding: 15px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
</style>
<body>
    
<nav class="navbar navbar-inverse" style="border-radius:0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="menu.php">Food Menu</a></li>
        <li><a href="stores.php">Stores</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li style="top:7px;">
		<form class="form-inline my-2 my-lg-0"  method="get" action="results.php" enctype="multipart/form-data">
		<input class="form-control" type="search" name="user_query" placeholder="Search" aria-label="Search">
		<button class="btn btn-primary" name="search" type="submit">Search</button>
		</form>		
        <li><?php
	if(!isset($_SESSION['cust_email'])){
		
		echo "<a href='login.php'><span class='glyphicon glyphicon-user'></span> Login</a>";
	}
	else
	{
		echo "<a href='logout.php'><span class='glyphicon glyphicon-user'></span> Logout</a>";
	}
	?></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div> 
</nav>
  <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Address</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">
                   
                        <form method="post" action="" class="form1" enctype="multipart/form-data">
                            <h2>Checkout</h2>
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>
							<br>
                         <div class="table">
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">                                           
                                            <input type="text" class="form-control" name="first_name" id="firstname" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            
                                            <input type="text" class="form-control" name="last_name" id="lastname" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                             
                                <!-- /.row -->

                                <div class="row">
								<div class="col-sm-6">
                                        <div class="form-group">
                                           
                                            <input type="text" name="email_address"class="form-control" id="email" placeholder="Email Address" required>
                                        </div>
                                    </div>
								 <div class="col-sm-6">
									 <div class="form-group">
                                         <input type="text" class="form-control" name="street" id="city" placeholder="Street" required>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-sm-6 col-md-3">
                                       <div class="form-group">
                                            
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Telephone" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            
                                            <input type="text"  name="zip" class="form-control" id="zip" placeholder="Zip" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            
                                            <input type="text" name="state" class="form-control" id="state" placeholder="State" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            
                                            <input type="text" name="country" class="form-control" id="country" placeholder="Country" required>
                                        </div>
                                    </div>

                                   

                                </div>
                                <!-- /.row -->
                            <br>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="cart.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
							</div>
							</div>
                        </form>
						
                    
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

               
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
		</div>

</body>
</html>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){	 
	
     $ip = getIp();	
	 $f_name = $_POST['first_name'];
	 $l_name = $_POST['last_name'];
	 $e_mail = $_POST['email_address'];
	 $street = $_POST['street'];
	 $phone = $_POST['phone'];
	 $zip = $_POST['zip'];
	 $state = $_POST['state'];
	 $country = $_POST['country']; 
	
	$insert_c = 'insert into orders (order_amount,cust_ip,fname,lname,email,street,state,country,phone,zip,delivery_type,payment,status) values ("","'.$ip.'","'.$f_name.'","'.$l_name.'","'.$e_mail.'","'.$street.'","'.$state.'","'.$country.'","'.$phone.'","'.$zip.'","","","'.$status.'")';
    if ($conn->query($insert_c) == TRUE) {
        echo "<script>window.open('checkout2.php','_self')</script>";
    } else {
    echo "Error: " . $insert_c . "<br>" . $conn->error;
   }
 
 }
 
 ?>

