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
                        <li>Checkout - Payment Method</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">
                   
                        <form method="post" action="checkout4.php" class="form1">
                            <h2>Checkout</h2>
                            <ul class="nav nav-pills nav-justified">
                                <li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>
							<br>
							
                         <div class="table">
                            <div class="content">
							<hr>
                                <div class="row">
								
                                    <div class="col-sm-6">
									<a href="checkout3.php?pay_id=1&&o_id=<?php orders();?>"><button type="button" class="form-control input-lg" style="border-radius:0px;" name="payment1">Payment gateway</button></a>
                                        
                                    </div>
                                    <div class="col-sm-6">
									<a href="checkout3.php?pay_id=2&&o_id=<?php orders();?>"><button type="button" class="form-control input-lg"  style="border-radius:0px;"name="payment2">Cash on Delivery</button></a>
                                    
                                    </div>
                                    <hr>
                                </div>
                                <!-- /.row -->
 <hr>
                            </div>
							<br>
							<br><br>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout2.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Delivery</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continue to Order Review<i class="fa fa-chevron-right"></i>
                                    </button>
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
if(isset($_GET['pay_id'])){	 
		
	 $payment_id = $_GET['pay_id'];
	 $or_id = $_GET['o_id'];
	 if($payment_id == 1)
	 {
	 $update_c = "update orders set payment='Payment Gateway' where order_id='".$or_id."'";
	 }
	 else
	 {
	 $update_c = "update orders set payment='Cash on Delivery' where order_id='".$or_id."'";
	 }
		
	if ($conn->query($update_c) == TRUE) {
       echo "";
    } else {
    echo "Error: " . $insert_c . "<br>" . $conn->error;
   }
 
 }
 
 ?>
