<?php include('include.php');?>
<!DOCTYPE html>
<html lang="en">

<?php include('head.php');?>
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />

<?php include('top-header-menu.php');?>
<?php include('sidebar-menu.php');?>

<!--main-container-part-->
<div id="content">
	<!--breadcrumbs-->
	<div id="content-header">
		<div id="breadcrumb"> <a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
	</div>
	<!--End-breadcrumbs-->
	<div class="container-fluid">
		<hr>
		<div style="font-size:22px; color:red;">
			<?php //echo $_SESSION['updateerror']; unset($_SESSION['updateerror']); ?>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>Customer Data</h5> </div>
					<div class="widget-content nopadding">
						<form class="form-horizontal" method="post" action="order-process.php" name="password_validate" id="password_validate">
							<div class="form-horizontal">
								<div class="span6 customer-order-left">
									<h5>Billing Details</h5>
									<div class="form-group">
										<label class="control-label">Full Name:</label>
										<div class="controls">
											<input type="text" class="span10" name="user_billing_name" id="user_billing_name" required value="" />
											</div>
									</div>
									<div class="form-group">
										<label class="control-label">Email:</label>
										<div class="controls">
											<input type="text" class="span10" name="user_billing_email" id="user_billing_email" required value="" /> </div>
									</div>
									<div class="form-group">
										<label class="control-label">Phone :</label>
										<div class="controls">
											<input type="text" class="span10" name="user_billing_phone" id="user_billing_phone" required value="" /> </div>
									</div>
									<div class="form-group">
										<label class="control-label">Address</label>
										<div class="controls">
											<textarea class="textarea_editor1 span10" rows="6" name="user_billing_address" id="user_billing_address" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label">Landmark</label>
										<div class="controls">
											<input type="text" class="span10" name="user_billing_landmark" id="user_billing_landmark" value="" /> </div>
									</div>
									<div class="form-group">
										<label class="control-label">Country</label>
										<div class="controls">

										<select name="user_billing_country" id="user_billing_country" class="span10" required>
											<option value="">Select Country</option>
											<option value="UAE">UAE</option>
											<option value="Pakistan">Pakistan</option>
											<option value="Qatar">Qatar</option>
											<option value="Oman">Oman</option>
											<option value="Bahrain">Bahrain</option>
											<option value="Kuwait">Kuwait</option>
											<option value="Saudi Arabia">Saudi Arabia</option>
										</select>	

										</div>
									</div>
									<div class="form-group">
										<label class="control-label">State</label>
										<div class="controls">
											<input type="text" class="span10" name="user_billing_state" id="user_billing_state" value="" required /> </div>
									</div>
									<div class="form-group">
										<label class="control-label">City</label>
										<div class="controls">
											<input type="text" class="span10" name="user_billing_city" id="user_billing_city" value="" /> </div>
									</div>
									<div class="form-group">
										<label class="control-label">Postalcode</label>
										<div class="controls">
											<input type="text" class="span10" name="user_billing_postal_code" id="user_billing_postal_code" value="" required /> </div>
									</div>
									
									<div class="form-group bill-info">
									<label class="control-label">Billing Information</label>
									<div class="controls"><input type="checkbox" name="address_mode" id="check-address" value="1"> Same as billing?</div>
									</div>
									
								</div>
								<div class="span6 customer-order-right">
									<h5>Shipping Details</h5>
									<div class="form-group">
										<label class="control-label">Full Name:</label>
										<div class="controls">
											<input type="text" class="span10" name="user_shipping_name" id="user_shipping_name" required value="" />
											</div>
									</div>
									<div class="form-group">
										<label class="control-label">Email:</label>
										<div class="controls">
											<input type="text" class="span10" name="user_shipping_email" id="user_shipping_email" required value="" /> </div>
									</div>
									<div class="form-group">
										<label class="control-label">Phone :</label>
										<div class="controls">
											<input type="text" class="span10" name="user_shipping_phone" id="user_shipping_phone" required value="" /> </div>
									</div>
									<div class="form-group">
										<label class="control-label">Address</label>
										<div class="controls">
											<textarea class="textarea_editor1 span10" rows="6" name="user_shipping_address" id="user_shipping_address" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label">Landmark</label>
										<div class="controls">
											<input type="text" class="span10" name="user_shipping_landmark" id="user_shipping_landmark" value="" /> </div>
									</div>
									<div class="form-group">
										<label class="control-label">Country</label>
										<div class="controls">
										<select name="user_shipping_country" id="user_shipping_country" class="span10" required>
											<option value="">Select Country</option>
											<option value="UAE">UAE</option>
											<option value="Pakistan">Pakistan</option>
											<option value="Qatar">Qatar</option>
											<option value="Oman">Oman</option>
											<option value="Bahrain">Bahrain</option>
											<option value="Kuwait">Kuwait</option>
											<option value="Saudi Arabia">Saudi Arabia</option>
										</select>
											</div>
									</div>
									<div class="form-group">
										<label class="control-label">State</label>
										<div class="controls">
											<input type="text" class="span10" name="user_shipping_state" id="user_shipping_state" required value=""  /> </div>
									</div>
									<div class="form-group">
										<label class="control-label">City</label>
										<div class="controls">
											<input type="text" class="span10" name="user_shipping_city" id="user_shipping_city" value="" /> </div>
									</div>
									<div class="form-group">
										<label class="control-label">Postalcode</label>
										<div class="controls">
											<input type="text" class="span10" name="user_shipping_postal_code" id="user_shipping_postal_code" value="" required /> </div>
									</div>
								</div>
							</div>


							<div class="bill-courier-sec">
								<div class="span6 customer-order-left">
									<div class="form-group">
									<label class="control-label">Courier Amount</label>
										<div class="controls">	  
										<input type="text" class="span10" name="order_courier_amount" id="order_courier_amount" required /> 
										<!---<select name="order_courier_amount" class="span10" required>
											<option value="0">Select Courier</option>
											<option value="40">Abu Dhabi 40</option>
											<option value="30">Dubai 30</option>
											<option value="30">Sarja 30</option>
											<option value="30">Ajman 30</option>
											<option value="40">Ras Al Khaimah 40</option>
											<option value="35">Fujairah 35</option>
											<option value="0">Other 0</option>
										</select>--->
										</div>	
									</div>
								</div>

								<div class="span6 customer-order-right">
									<div class="form-group">
									<label class="control-label">Discount</label>
									<div class="controls">	  
										<select name="order_discount" class="span10" required>
											<option value="">Select Discount</option>
											<option value="0">0%</option>
											<option value="5">5%</option>
											<option value="10">10%</option>
										</select>
									</div>	
									</div>
								</div>

							</div>
							
							<div class="bill-courier-sec">
							<div class="col-md-10">
								<div class="form-group table-responsive">
								<table class="table table-bordered table-striped dataTable dtr-inline" id="dynamic_field">
									<tr>
										<td>
										<?php
										$sql = $pdo->prepare("select product_id, product_name, product_regular_price from fda_products");
										$sql->execute();
										$data = $sql->fetchAll();
										?>
										<select name="order_product_name[]" id="order_product_name" class="span12" onchange="smschange(this,1)" required>
											<option value="">Select Medicine</option>
											<?php
											foreach ($data as $row) {
											?>
											<option value="<?php echo $row['product_id']; ?>"><?psubhp echo $row['product_name']; ?></option>
											<?php } ?>
										</select>
										</td>
										<td id="response1"></td>
										<td>
											<input type="text" name="order_product_qty[]" placeholder="Quantity" class="quantity" required />
										</td>
										
										<td>
											<button type="button" name="add" id="add" class="btn btn-primary">Add More</button>
										</td>
									</tr>
								</table>
									<!---<input type="submit" class="btn btn-success" name="submit" id="submit" value="Submit">--->
								</div>
							</div>
							</div>
							

							<div class="form-actions">
								<input type="submit" class="btn btn-success" name="submit" value="submit">							
							</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!--end-main-container-part-->
<?php //include('footer.php');?>
<?php include('footer1.php');?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/masked.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_validation.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){ 
     $('#check-address').click(function(){ 
     if ($('#check-address').is(":checked")) {
      $('#user_shipping_name').val($('#user_billing_name').val());
      $('#user_shipping_email').val($('#user_billing_email').val());
	  $('#user_shipping_phone').val($('#user_billing_phone').val());
	  $('#user_shipping_address').val($('#user_billing_address').val());
	  $('#user_shipping_landmark').val($('#user_billing_landmark').val());
	  $('#user_shipping_state').val($('#user_billing_state').val());
	  $('#user_shipping_city').val($('#user_billing_city').val());
	  $('#user_shipping_postal_code').val($('#user_billing_postal_code').val());
      var country = $('#country option:selected').val();
      $('#user_billing_country option[value=' + country + ']').attr('selected','selected');
     } else { //Clear on uncheck
      $('#user_shipping_name').val("");
      $('#user_shipping_email').val("");
      $('#user_shipping_phone').val("");
      $('#user_shipping_address').val("");
	  $('#user_shipping_landmark').val("");
	  $('#user_shipping_state').val("");
	  $('#user_shipping_city').val("");
	  $('#user_shipping_postal_code').val("");
      $('#user_shipping_country option[value=""]').attr('selected','selected');
     };
    });
 
   });
</script>

<script>
function smschange(id,i)
{	 
//alert(id.value);
	/*$("select").on("change", function() {
	  var id = $(this).attr("id");
	  alert(id);
	});*/
    //alert('change2');
	//$("#order_product_name2").change(function(){
	//$(document).on('change', 'select', function(){	
	//$('select[name="order_product_name"]').change(function(){	 
		//var id=$(this).val();	
	
		//$("#order_product_name").change(function(){
			
			
		var id = id.value;
		var inc = i;	
		//alert(inc);		
		var dataString = 'id='+ id;		
		//alert(dataString);
		$.ajax({
			type: "POST",
			url: "select-product.php",
			data: dataString,
			cache: false,
			success: function(data)
			{
			//alert(data);
			$("#response"+inc).html(data);		
			}
		});

	//});
}
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var i = 1;

    $("#add").click(function(){
      i++;
      $('#dynamic_field').append('<tr id="row'+i+'"><td>'+'<select name="order_product_name[]" id="order_product_name'+i+'" class="span12" onchange="smschange(this,'+i+')">'+'<option value="0">Select Medicine</option>'+'<?php foreach ($data as $row) { ?>'+'<option value="<?php echo $row['product_id']; ?>" ><?php echo $row['product_name']; ?></option>'+'<?php } ?>'+'</select></td><td id="response'+i+'"></td><td><input type="text" name="order_product_qty[]" placeholder="Quantity" class="form-control name_email"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    
	});

    $(document).on('click', '.btn_remove', function(){  
      var button_id = $(this).attr("id");   
      $('#row'+button_id+'').remove();  
    });
	
	

    /*$("#submit").on('click',function(){
      var formdata = $("#add_name").serialize();
      $.ajax({
        url   :"action.php",
        type  :"POST",
        data  :formdata,
        cache :false,
        success:function(result){
          alert(result);
          $("#add_name")[0].reset();
        }
      });
    });*/
	
  });
</script>
</body>
</html>
