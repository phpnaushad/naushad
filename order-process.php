<?php include('include.php');
if(!isset($_SESSION['mcdadminid']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Invoice Order</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="css/new/bootstrap.css" />  
<link rel="stylesheet" href="css/new/bootstrap.min.css" />  
<link rel="stylesheet" href="css/new/invoice.css" />  
</head>
<body>
<?php
//include('top-header-menu.php');
//include('sidebar-menu.php');

//$rowcount = count($_POST["order_product_name"]);
if (isset($_POST['submit']) && (!empty($_POST['submit'])))
{
	$user_billing_name  = $_POST['user_billing_name'];   
	$user_billing_email = $_POST['user_billing_email'];
	$user_billing_phone = $_POST['user_billing_phone'];
	$user_billing_address = $_POST['user_billing_address'];
	$user_billing_landmark = $_POST['user_billing_landmark'];
	$user_billing_country    = $_POST['user_billing_country'];
	$user_billing_state   = $_POST['user_billing_state'];
	$user_billing_city = $_POST['user_billing_city'];
	$user_billing_postal_code = $_POST['user_billing_postal_code'];
	
	$user_shipping_name  = $_POST['user_shipping_name'];   
	$user_shipping_email = $_POST['user_shipping_email'];
	$user_shipping_phone = $_POST['user_shipping_phone'];
	$user_shipping_address = $_POST['user_shipping_address'];
	$user_shipping_landmark = $_POST['user_shipping_landmark'];
	$user_shipping_country    = $_POST['user_shipping_country'];
	$user_shipping_state   = $_POST['user_shipping_state'];
	$user_shipping_city = $_POST['user_shipping_city'];
	$user_shipping_postal_code = $_POST['user_shipping_postal_code'];
	
	$rowcount = count($_POST["order_product_name"]);
	
	$order_product_name = $_POST['order_product_name'];
	$order_regular_price = $_POST['order_regular_price'];
	$order_product_qty = $_POST['order_product_qty'];
	
	$order_courier_amount = $_POST['order_courier_amount'];
	$order_discount = $_POST['order_discount'];
	
	@$address_mode = $_POST['address_mode'];
	date_default_timezone_set("Asia/Kolkata"); 
	$user_created_on  = date('Y-m-d H:i:s');
	
$last_user_id ='';
$last_user_id ='';

$admininsert = $pdo->prepare("insert into fda_user set user_billing_name='".$user_billing_name."', user_billing_email='".$user_billing_email."', user_billing_phone='".$user_billing_phone."', user_billing_address='".$user_billing_address."', user_billing_landmark='".$user_billing_landmark."', user_billing_country='".$user_billing_country."', user_billing_state='".$user_billing_state."', user_billing_city='".$user_billing_city."', user_billing_postal_code='".$user_billing_postal_code."', user_shipping_name='".$user_shipping_name."', user_shipping_email='".$user_shipping_email."', user_shipping_phone='".$user_shipping_phone."', user_shipping_address='".$user_shipping_address."', user_shipping_landmark='".$user_shipping_landmark."', user_shipping_country='".$user_shipping_country."', user_shipping_state='".$user_shipping_state."', user_shipping_city='".$user_shipping_city."', user_shipping_postal_code='".$user_shipping_postal_code."', user_status='1', address_mode='".$address_mode."', user_created_on='".$user_created_on."' ");

$result = $admininsert->execute();
$last_user_id = $pdo->lastInsertId();

	if($last_user_id!= ''){
		$insert = $pdo->prepare("insert into fda_order set user_id='".$last_user_id."', order_payment_type='1', order_status='0', order_date='".$user_created_on."' ");
		@$result = $insert->execute();
		$last_order_id = $pdo->lastInsertId();
	}

if ($rowcount > 0) {
	for ($i=0; $i < $rowcount; $i++) { 
		if (trim($_POST['order_product_name'] != '') && trim($_POST['order_regular_price'] != '') && trim($_POST['order_product_qty'] != '')) {
			$order_product_name = $_POST['order_product_name'][$i];
			$order_regular_price = $_POST['order_regular_price'][$i];
			$order_product_qty = $_POST['order_product_qty'][$i];
			
			$insert = $pdo->prepare("insert into fda_order_items set order_id='".$last_order_id."', order_product_id='".$order_product_name."', order_product_name='".$order_product_name."', order_product_qty='".$order_product_qty."', order_regular_price='".$order_regular_price."', status='1', created_on='".$user_created_on."' ");
			@$result = $insert->execute();	

			$query = $pdo->prepare("SELECT product_stock_qty FROM `fda_products` WHERE `product_id`='".$order_product_name."' ");
			$query->execute();
			$result = $query->fetch();

			$updt_stock_qty = $result['product_stock_qty']- $order_product_qty;
			date_default_timezone_set("Asia/Kolkata"); 
			$updated_on  = date('Y-m-d H:i:s');

			$updt = $pdo->prepare("UPDATE fda_products SET product_stock_qty='".$updt_stock_qty."', updated_on='".$updated_on."' WHERE `product_id`='".$order_product_name."' ");
			@$success = $updt->execute();

		   }
	    }
	//echo "Order item data inserted successfully";
	$_SESSION['success'] = 'Order item data inserted successfully';
    }


}

 $qry = $pdo->prepare("SELECT count(*) FROM `fda_order` WHERE `order_id`='".$last_order_id."' AND `user_id`='".$last_user_id."' ");
 $rows = $qry->execute();
 if($rows =='1'){
	$stmt = $pdo->prepare("SELECT * FROM `fda_order_items` WHERE `order_id`='".$last_order_id."' ");
	@$stmt->execute();
	$products = $stmt->fetchAll();
 }

$aqry = $pdo->prepare("
SELECT 
    t1.user_billing_name, 
    t1.user_billing_email, 
    t1.user_billing_phone,
	t1.user_billing_address,
	t1.user_billing_landmark,
	t1.user_billing_city,
	t1.user_billing_state,
	t1.user_billing_country,
	t1.user_billing_postal_code,	
	t1.user_shipping_name,
	t1.user_shipping_email,
	t1.user_shipping_phone,
	t1.user_shipping_address,
	t1.user_shipping_landmark,
	t1.user_shipping_city,
	t1.user_shipping_state,
	t1.user_shipping_country,
	t1.user_shipping_postal_code,
	t1.user_status,
	t2.order_id,
	t2.order_number,
	t2.order_courier_amount,
	t2.order_discount,
	t2.order_total_amount,
	t2.order_status,
	t2.order_date,
	t2.order_updated_on	
FROM
    fda_user t1
INNER JOIN fda_order t2
    ON t1.user_id = t2.user_id
	WHERE t1.user_id='".$last_user_id."' AND t2.user_id='".$last_user_id."'
");
 @$aqry->execute();
 $user_data = $aqry->fetch();
?>

<div class="invoice">
							<div class="col-md-12 invoice-logo">
							<div class="col-sm-6 col-xs-12 logo"><img src="img/sk-llc-logo.jpg" alt=""  /></div>
							<div class="col-sm-6 col-xs-12 invoice-txt"><h3>Invoice</h3></div>							
							</div>

						<div class="invoice-info">
						  <div class="col-sm-4 invoice-col">
							<strong>From </strong>
							<address>
							  Sahil Khan General Trading L.L.C<br>
							  Room No 401, Dar Al Makatib Frij Murar Near Al Hotel,<br>
							  Deira, Dubai-UAE<br>
							  Phone: 0509423867							  
							</address>
						  </div>
						  <!-- /.col -->
						  <div class="col-sm-5 invoice-col">
							<strong>To</strong>
							<?php if(@$user_data['address_mode']==='1'){ ?>
							<address>
							   <?php echo $user_data['user_billing_name']; ?><br>							  
							   <?php echo $user_data['user_billing_address']; ?><br>
							  <?php echo $user_data['user_billing_landmark']; ?> <?php echo $user_data['user_billing_city']; ?><br>
							  <?php echo $user_data['user_billing_state']; ?>, <?php echo $user_data['user_billing_country']; ?> <?php echo $user_data['user_billing_postal_code']; ?><br>
							  Phone: <?php echo $user_data['user_billing_phone']; ?><br>
							  Email: <?php echo $user_data['user_billing_email']; ?>
							</address>
							<?php }else{ ?>
							<address>
							 <?php echo $user_data['user_shipping_name']; ?><br>							  
							   <?php echo $user_data['user_shipping_address']; ?><br>
							  <?php echo $user_data['user_shipping_landmark']; ?> <?php echo $user_data['user_shipping_city']; ?><br>
							  <?php echo $user_data['user_shipping_state']; ?>, <?php echo $user_data['user_shipping_country']; ?> <?php echo $user_data['user_shipping_postal_code']; ?><br>
							  Phone: <?php echo $user_data['user_shipping_phone']; ?><br>
							  Email: <?php echo $user_data['user_shipping_email']; ?>
							</address>
							<?php } ?>
						  </div>
						  <!-- /.col -->
						  <div class="col-sm-3 invoice-col">
						  </br>
						  <address>
							<b>Invoice: <?php echo $user_data['order_id']; ?></b><br>	
								<?php $date = date('Y-m-d', strtotime($user_data['order_date'])); ?>
							<b>Date: </b> <?php echo $date; ?>
						  </address>
						  </div>
						  <!-- /.col -->
						</div>
						
						<div class="col-12 table-responsive invoice-table">
							<table class="table table-bordered table-striped dataTable dtr-inline">
							  <thead>
							  <tr>
								<th>Description of Product</th>
								<th>Unit</th>
								<th>Price</th>
								<th>Amount</th>
							  </tr>
							  </thead>
							  <tbody>
							    <?php 
								  $tmpSubTotal = 0;
								  foreach($products as $product){ ?>
							  <tr>
								<td><?php echo productname($product['order_product_id']); ?></td>
								<td><?php echo $product['order_product_qty']; ?></td>
								<td><?php echo $product['order_regular_price']; ?></td>
								<td><?php echo $sub = $product['order_product_qty'] * $product['order_regular_price'] ; ?></td>
							  </tr>
							    <?php $tmpSubTotal += $sub; } ?>							  
							  </tbody>
							</table>
						</div>
						
				<div class="invoice-third">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="invoice-third-terms">
							<!--<p class="lead">Terms of Delivery:</p>
							<div class="img-sec">
							Paytm, Paypal
							</div>--->							
							<div class="invoice-trn"><strong>TRN: 100603800200003</strong></div>
						</div>	
					</div>
					
					<div class="col-md-6 col-sm-6 invoice-third-table">
						<div class="table-responsive">
								<form name="order_updt" method="post">
								<table class="table table-bordered table-striped dataTable dtr-inline">
									<tbody><tr>
									  <th style="width:50%">Subtotal:</th>
									  <td><?php echo $tmpSubTotal; ?></td>
									</tr>
									<tr>
									  <th>Discount (<?php echo $order_discount; ?>%)</th>
									  <td><?php 
									  //$order_discount = '5';
									  echo $dis = ($tmpSubTotal*$order_discount)/100; ?></td>
									  <input type="hidden" name="order_discount" id="order_discount" value="<?php echo $order_discount; ?>">
									</tr>
									<tr>
									  <th>Courier charge:</th>
									  <?php //$order_courier_amount = '1000';?>
									  <td><?php echo $charge = $order_courier_amount; ?></td>
									<input type="hidden" name="order_courier_amount" id="order_courier_amount" value="<?php echo $charge; ?>">								  
									</tr>
									<?php ?>
									<tr>
									  <th>Total:</th>
									  <td><?php echo $gtotal = $tmpSubTotal-$dis+$charge ?></td>
									  <input type="hidden" name="order_total_amount" id="order_total_amount" value="<?php echo $gtotal; ?>">
									 
									 <input type="hidden" name="order_id" id="order_id" value="<?php echo $last_order_id; ?>">
									 <input type="hidden" name="user_id" id="user_id" value="<?php echo $last_user_id; ?>">
									</tr>
								  </tbody>
								</table>
								<div class="d-print-none">
								<input type="submit" name="submit" id="submit-id" value="Save">
								<!---<button type="submit" class="btn btn-primary">Save</button></div>-->							 
								</div>							
							</form>
						</div>
					</div>					
				</div>	

				<div class="buttons">						
					<a class="d-print-none" href="javascript:window.print()"><i class="fa fa-print"></i>Print</a>
					<a class="d-print-none" href="home.php"><i class="fa fa-print"></i> Back to Dashboard</a>
				</div>			
</div>					
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    //$('.btn-primary').click(function (e) {
	$( "form" ).on( "submit", function(e) {		
      e.preventDefault();	  
      var order_id = $('#order_id').val();	
		//alert(order_id);
      var user_id = $('#user_id').val();
	  //alert(user_id);
      var order_courier_amount = $('#order_courier_amount').val();
	  var order_discount = $('#order_discount').val();
      var order_total_amount = $('#order_total_amount').val();	 
      $.ajax
        ({
          type: "POST",
          url: "post.php",
          data: { "order_id": order_id, "user_id": user_id, "order_courier_amount": order_courier_amount, "order_discount": order_discount, "order_total_amount": order_total_amount },		
          success: function (data) {
			alert('successful!');
			//alert('Data from the server' + data);
            //$('.result').html(data);
            //$('#contactform')[0].reset();
          }
        });
    });
  });
</script>
</body>
</html>
