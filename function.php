<?PHP
session_start();
$host = 'courses'; 
$user = 'z1821331';
$password='1996Jun06';
$db = 'z1821331'; 
$conn = new PDO("mysql:host=$host;dbname=$db",$user,$password);// Creating a New PDO connection with the corresponding host,database name,user and password.  
//For throwing Exceptions 
try
{
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  echo 'ERROR: ' . $e->getMessage();
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}


function cart(){
	if(isset($_GET['itm_id']))
	{
	global $conn;		
	$ip = getIp();
	$itm_id = $_GET['itm_id'];
	$cust_id = $_SESSION['cust_id'];
	$cust_email = $_SESSION['cust_email'];
	$check_itm =  'select * from cart where ip_add=? AND i_id= ?';	
	$stmt = $conn->prepare($check_itm);
	$stmt->execute(array($ip,$itm_id));
	$count = $stmt->rowCount();
	if($count>0){		
	echo "<Script>alert('Item already added to cart!')</script>";
	echo "<script>window.open('menu.php','_self')</script>";
	}
	else{
	$insert_temp ='INSERT INTO order_items (cust_id,cust_email,i_id, ip_add, qty) VALUES ("'.$cust_id.'","'.$cust_email.'","'.$itm_id.'","'.$ip.'","1")';
	$conn->exec($insert_temp);
	$insert_itm = 'INSERT INTO cart (cust_id,i_id, ip_add, qty) VALUES ("'.$cust_id.'","'.$itm_id.'","'.$ip.'","1")';
	$conn->exec($insert_itm);
	echo "<Script>alert('Item added to cart!')</script>";
	echo "<script>window.open('menu.php','_self')</script>";
	}
	}
}

function total_items(){
	
	if(isset($_GET['itm_id'])){
		
		global $conn;		
		$ip = getIp();		
		$get_items = $conn->query('select *from cart where ip_add="'.$ip.'"');		
	    $count_items = $get_items->rowCount();		
		}
		else{
		global $conn;		
		$ip = getIp();		
		$get_items = $conn->query('select *from cart where ip_add="'.$ip.'"');		
	    $count_items = $get_items->rowCount();		
		}

	echo $count_items;
	}
	
//getting the total price of the items in the cart
function total_price(){
	$total = 0;	
	global $conn;
	
	$ip = getIp();
	
	$sel_price = $conn->query('select *from cart where ip_add="'.$ip.'"');	
	
	while($i_price = $sel_price->fetch(PDO::FETCH_ASSOC)){
		
		$itm_id = $i_price['i_id'];		
		$itm_price = $conn->query('select *from items where item_id="'.$itm_id.'"');	
		
		while ($ii_price = $itm_price->fetch(PDO::FETCH_ASSOC)){
			
			$item_price = array($ii_price['item_price']);			
			
			$values = array_sum($item_price);			
			$total += $values;
	
		}
	}
echo $total;
}		

function remove(){
	if(isset($_GET['item_id']))
	{
	global $conn;		
	$ip = getIp();
	$itm_id = $_GET['item_id'];
	$del_itm = "delete from cart where i_id ='".$itm_id."' and ip_add='".$ip."'";	
	if( $conn->query($del_itm)== TRUE){		
	
	echo "<script>window.open('cart.php','_self')</script>";
	}	
	}
}	

function update(){
	global $conn;
	$ip = getIp();
	  if(isset($_GET['update_id']) && isset($_GET['up_qty']) ){  
		  
		  
		  $itm_id = $_GET['update_id'];
		  $qty =$_GET['up_qty'];
		  
		  $update_qty = "update cart set qty='".$qty."' where i_id='".$itm_id."'";  
		  
		  //$total = $total*$qty;
		  
		  if($conn->query($update_qty) == TRUE)
		  {
			  //echo "<Script>alert('Cart updated successfully!')</script>";
	          echo "<script>window.open('cart.php','_self')</script>";
		  }
	  }
	  else if((isset($_GET['update_id']) && isset($_GET['dow_qty']) ))
	  {		
		  $itm_id = $_GET['update_id'];
		  $qty =$_GET['dow_qty'];		  
		    
		  
		  //$total = $total*$qty;
		  
		  if($qty == 0)
		  {
			  echo "<Script>alert('The Quantity cannot be less than one')</script>";
	          echo "<script>window.open('cart.php','_self')</script>";
		  }
		  else if( $qty >=1 )
		  {
			  $update_qty = "update cart set qty='".$qty."' where i_id='".$itm_id."'";
			  $conn->query($update_qty);
			  // echo "<Script>alert('Cart updated Successfully!')</script>";
	           echo "<script>window.open('cart.php','_self')</script>";
		  }
	  }
}

function make_query()
{
	global $conn;
 $query = "SELECT * FROM banner ORDER BY banner_id ASC";
 $result = $conn->query($query);
 return $result;
}

function make_slide_indicators()
{
 global $conn;
 $output = ''; 
 $count = 0;
 $result = make_query();
 while($row = $result->fetch(PDO::FETCH_ASSOC))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides()
{
 global $conn;
 $output = '';
 $count = 0;
 $result = make_query();
 while($row = $result->fetch(PDO::FETCH_ASSOC))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="'.$row["banner_image"].'" alt="'.$row["banner_title"].'" style=" height:80%;" />
  </div>';
  $count = $count + 1;
 }
 return $output;
}

function orders(){
	global $conn;
	
	$ip = getIp();
	
	$query = $conn->query('select *from orders where cust_ip="'.$ip.'"');	
	
	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		
		$o_id = $row['order_id'];
	}
echo $o_id;
	}

 function tooltip(){
    $ip = getIp();
	$itm_id = $row['item_id'];	
	$check_itm = 'select * from cart where ip_add=? AND i_id= ?';	
	$stmt = $conn->prepare($check_itm);
	$stmt->execute(array($ip,$itm_id));
	$count = $stmt->rowCount();
	if($count>0)
	echo "Item already in Cart";
	else
	 echo "Click to add";
}
?>
