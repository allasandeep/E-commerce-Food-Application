<?php	
   session_start();
	require ("function.php");// Including the db Connection
?>

<html lang="en">
<head>
  <title>E-Commerce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>$().alert()
$(".alert").alert()</script>  
</head>
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
        <li ><a href="home.php">Home</a></li>
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
         <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>
 <div class="container" align="center" >
      <form class="form-signin" method="post" action="" style="width:450px; height:450px;">
        <h2 class="form-signin-heading">Please sign in</h2><br>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus=""><br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
		<p class="h4">Not registered? <a href="register.php">Create an account</a></p>
      </form>

    </div> <!-- /container -->
  

</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
			 $c_email = $_POST['email'];
             $c_pass = $_POST['password'];	
             $sel_c = $conn->query('select *from customers where cust_pass="'.$c_pass.'" AND cust_email="'.$c_email.'"');
			 while($row = $sel_c->fetch(PDO::FETCH_ASSOC))
			 {
				 $cust_id = $row['cust_id'];
				 $name = $row['cust_dname'];				 
			 }
			 $check_customer = $sel_c->rowCount();
             if($check_customer==0){
				 echo "<script>alert('Password or Email is incorrect,Please try again!')</script>";
				 exit();
			 }
         
	$ip = getIp();	
    
	$sel_cart = $conn->query('select *from cart where ip_add="'.$ip.'"');
	$row = $sel_cart->fetch(PDO::FETCH_ASSOC);
	$check_cart = $sel_cart->rowCount();
	if($check_customer>0 AND $check_cart==0){
		
		$_SESSION['cust_id']= $cust_id;
		$_SESSION['cust_name']= $name;
		$_SESSION['cust_email']=$c_email;		
		
		echo "<script>window.open('menu.php','_self')</script>";
	}
	else
	{
		$_SESSION['cust_id']= $cust_id;
		$_SESSION['cust_name']=$name;
		$_SESSION['cust_email']=$c_email;
		
		echo "<script>window.open('cart.php','_self')</script>";
	}
			 
		}
		
	
		 ?>
