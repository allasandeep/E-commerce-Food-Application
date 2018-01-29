<?php
	session_start();
	require ("function.php");// Including the db Connection	
	remove();
	update();
	if(!isset($_SESSION['cust_email'])){	
	echo "<script>window.open('login.php','_self')</script>";
	
}
else
{
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
  height: auto; 
  margin: 0 auto 10px;
  padding: 25px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.box {
  position: relative;  
  z-index: 1;
  background: #FFFFFF;
  max-width: 270px; 
  height: auto;  
  margin: 0 auto 100px;
  padding: 25px;
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
<?php 	
	$cust_id = $_SESSION['cust_id'];
	$ip = getIp();
    $check_itm =  'select * from cart where ip_add="'.$ip.'" AND cust_id= "'.$cust_id.'"';	
	$stmt = $conn->query($check_itm);
	$count = $stmt->rowCount();
	if($count>0){		
	?>
 <div id="all" >

        <div id="content" >
            <div class="container" >

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket" >                    

                        <form method="post" action="cart.php" class="form1" >

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <?php total_items();?> item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th></th>
											<th>Quantity</th>
											<th></th>
                                            <th>Unit price</th>                                            
                                            <th colspan="2">Total</th>
                                        </tr>									
                                    </thead>                              

                                        <tbody>
										<tr>
										<?php 
$total = 0;	
	global $conn;
	
	$ip = getIp();
	
	$sel_price = $conn->query('select *from cart where ip_add="'.$ip.'"');	
	
	while($i_price = $sel_price->fetch(PDO::FETCH_ASSOC)){
		
		$itm_id = $i_price['i_id'];
		$qty = $i_price['qty'];
		$itm_price = $conn->query('select *from items where item_id="'.$itm_id.'"');	
		
		while ($ii_price = $itm_price->fetch(PDO::FETCH_ASSOC)){			
	
			$item_price = array($ii_price['item_price']);
			$item_name = $ii_price['item_name'];
			$item_image = $ii_price['item_image'];
			$single_price = $ii_price['item_price'];
			$values = array_sum($item_price);			
			$total += $values;
			?>
	
			
                                            <td>
                                                <a href="#">
                                                    <img src="<?php echo $item_image;?>" height="50px" width="50px" alt="<?php echo $item_name; ?>">
                                                </a>
                                            </td>
                                            <td><a href="#"><?php echo $item_name; ?></a>
                                            </td>
                                            <td align="right">
                                              <a href="cart.php?update_id=<?php echo $itm_id;?>&up_qty=<?php $qty1=$qty+1; echo $qty1;?>"><i class="glyphicon glyphicon-plus" ></i></a></td><td style="width:50px"><input type="text" value="<?php echo $qty; ?>" name="qty" class="form-control" disabled ></td><td align="left"><a href="cart.php?update_id=<?php echo $itm_id;?>&dow_qty=<?php $qty2=$qty-1; echo $qty2;?>"><i class="glyphicon glyphicon-minus" ></i></a></td>
    
											
                                            <td>$<?php echo $single_price;  ?></td>                                            
                                            <td>$<?php $updated_price = $single_price*$qty; $final_total+=$updated_price; echo $updated_price; ?></td>
                                            <td><a href="cart.php?item_id=<?php echo $itm_id;?>"><i class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                        </tr>
<?php	
		}
	}
?>											
                                    </tbody>
                                    <tfoot>
	
                                        <tr>
                                            <th colspan="6">Total</th>
                                            <th colspan="2">$<?php echo number_format((float)$final_total, 2, '.', '');  ?></th>
                                        </tr>
		
                                    </tfoot>
                                </table>

                            
                            <!-- /.table-responsive -->

                            
                                <div class="pull-left">
                                    <a href="menu.php" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                
							</div>	

                        </form>

                                       <!-- /.box -->


                    


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3" >
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs may apply.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>$<?php echo number_format((float)$final_total, 2, '.', ''); ?></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>$<?php $ship = 2.00; echo number_format((float)$ship, 2, '.', ''); ?></th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>$<?php $tax=($total*6.25)/100;  echo number_format((float)$tax, 2, '.', ''); ?></th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>$<?php $mtotal = $final_total+$ship+$tax; echo number_format((float)$mtotal, 2, '.', '');?></th>
                                    </tr>
                                </tbody>
                            </table>												
								<br>
                                     <a href="checkout1.php" ><i class="fa fa-chevron-left"></i><button class="btn btn-primary btn_block"> Proceed to Checkout</button></a>
                                    
                                
                        </div>

                    </div>


                
                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
</div>
	<?php } 
	 else
	 {
	 echo '<div class="container text-center">
    <h1 style="color:green">Your Cart is Empty</h1>   
   </div>  ';
	 }?>

</body>
</html>
<?php } ?>