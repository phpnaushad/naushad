<?php 
/* Template Name: Assets Type Display*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header(); 
global $wpdb, $current_user;
$user_id = $current_user->ID;
$assets_type = $wpdb->get_results("SELECT id, name, is_parent, status FROM financial_asset_type WHERE status = '1'");
?>

<div class="finan_container">
 
<header class="entry-header ast-no-thumbnail ast-no-meta finan_header">
<h1 class="entry-title financial_table" itemprop="headline">Financial Assets Type Display</h1>
<a href="<?php echo get_page_link('25799'); ?>">
<button class="btn btn-secondary add_form_button" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
</a>
</header>

 <div id="loader" class="lds-ring" style="display: none;"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>	

<section class="liability-type-section">
<form role="form" id="liability_type_filter">
<div class="row finan_row">

	<div class="col-sm-4">
	<div class="form-group">
		<label class="control-label">Month</label>
		<select name="month" id="month_id" class="form-control" required>
			<option value="">Select</option>
			<?php 
			  for( $m=1; $m<=12; ++$m ) { 
			  $month_label = date('F', mktime(0, 0, 0, $m, 1));
			  $month_value = date('n', mktime(0, 0, 0, $m, 1));		  
			?>
			<option value="<?php echo $month_value; ?>"><?php echo $month_label; ?></option>
			<?php } ?>
		</select>                       
	</div>
	</div>
	
	<div class="col-sm-4">
		<div class="form-group">
			<label class="control-label">Years</label>
			<select name="year" id="year_id" class="form-control" required>
				<option value="">Select</option>
				<?php $current_year = date('Y');
					for($i=$current_year; $i>=2020; $i--){	?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>	  	
			</select>                       
	</div>
	</div>

	<div class="col-sm-4">

	<div class="form-group liability_button">
	<button class="btn btn-secondary filter_form_button" type="button"><i class="fa fa-filter" aria-hidden="true"></i> Filter By</button>
	<button class="btn btn-secondary reset_form_button" type="button"><i class="fa fa-refresh" aria-hidden="true"></i>  Refresh</button>
	<!-- <button class="btn btn-secondary add_form_button" type="button"><i class="fa fa-plus" aria-hidden="true"></i>  Add</button> -->
	</div>
 </div>
	
	<div class="col-sm-4"></div>
	
</div>	
</form>
<div>
	 <table id="liability_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>				
				<th>Assets Type</th>
				<th>Owner</th>
				<th>Market Value</th>
				<th>Loan Balance</th>
				<th>Equity</th>
				<th>Cashflow</th>
				<th>Current Value</th>
				<th>Action</th>
			</tr>
		</thead>	
		<tbody>	
		
		</tbody>			

	</table>
	<div>
</section>

<!-- Edit Modal-->


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="renameModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="renameModal">Update Record</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
			
            <div class="modal-body">
			
				<div id="message"></div>
				
               <form role="form" id="liability_type_frm">    
					
					<div class="form-group">
                        <label class="control-label">Assets Type</label>
						<select name="asset_type_id" id="asset_type" class="form-control">
							<option value="">Select</option>
						  <?php foreach($assets_type as $data){	?>	
							  <?php if($data->is_parent=='1'){ ?><optgroup label="<?php echo $data->name; ?>"></optgroup><?php }else{ ?>
							  <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
							  <?php } ?>
						  <?php } ?>	
						</select>                       
                    </div>
					
                    <div class="form-group">
                        <label class="control-label">Owner</label>						
			<input type="text" class="form-control" name="owner" id="owner_id" value="" onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)" maxlength="30" required>								
                    </div>
					
                    <div class="form-group">
                        <label class="control-label">Market Value</label>                        
				<input type="text" class="number-separator form-control" name="market_value" id="market_value_id" value="" maxlength="13" required>
						
                    </div>
					
					<div class="form-group">
                        <label class="control-label">Loan Balance</label>						
						<input type="text" class="number-separator form-control" name="loan_balance" id="loan_balance_id" value="" maxlength="13" required>
                    </div>
					
					<div class="form-group">
                        <label class="control-label">Equity</label>
						<input type="text" class="number-separator form-control" name="equity" id="equity_id" value="" maxlength="13" required>					
                    </div>
					
					<div class="form-group">
                        <label class="control-label">Cashflow</label>						 
					<input type="text" class="number-separator form-control" name="cashflow" id="cashflow_id" value="" maxlength="13" required>						
                    </div>
					
					<div class="form-group">
                        <label class="control-label">Current Value</label>						
						<input type="text" class="number-separator form-control" name="current_value" id="current_value_id" maxlength="13" value="" required>						
                    </div>	
					
					<input type="hidden" name="row_id" value="" id="edit_row_id">
					
                
            </div>
            <div class="modal-footer">
                <button class="btn cancel_form_button" type="button" data-dismiss="modal">Cancel</button>
                <!---<a class="btn update_form_button" href="#" >Update</a>--->
				<button type="submit" class="btn update_form_button">Update</button>
            </div>
			</form>
        </div>
    </div>
</div>
</div>

<?php get_footer(); ?>
<script>
function getDataTablesRecords(){
	let id = <?php echo $user_id; ?>;    
    $.ajax({
      url:'<?php echo admin_url('admin-ajax.php'); ?>',
      method: 'post',
      data : {
      action:"getAssetsTypeDataByUserId",
      user_id: id,
      },
	  beforeSend: function(){
        $("tbody").html('<tr><td class="text-center" colspan="7"><i class="fa fa-spinner" style="font-size:52px;color:#781b11"></i></td></tr>');
       },

		success: function(result){
			//console.log(result.data);
			if(result.data.status == "success"){		
					
				$('#liability_table').DataTable().clear().draw();
					const all_data = result.data.view_data;						
					for (let i = 0; i < all_data.length; i++) { 
					//console.log(all_data[i]);                        
						 $('#liability_table').DataTable().row.add([ all_data[i][0], all_data[i][1], all_data[i][2], all_data[i][3], all_data[i][4], all_data[i][5], all_data[i][6],'<button id="edit_table_data" data-id="'+all_data[i][7]+'"><i class="fa fa-pencil finan_edit" aria-hidden="true"></i></button> &nbsp; <button id="delete_row_data" data-id="'+all_data[i][7]+'"><i class="fa fa-trash finan_edit" aria-hidden="true"></i></button>' ]).draw();
					}
			}
		}
    });
}


$(document).ready(function() {	
	$('#liability_table').dataTable({
		"bPaginate": 10,
		responsive: true,
		"bLengthChange": false,
		"bFilter": true,
		"bInfo": false,
		"bAutoWidth":false,
		dom: 'Bfrtip',
        buttons: [
			{
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6]
                },
				text: '<i class="fa fa-download"></i>',
                titleAttr: 'Excel'
            }
			]
	});	

	getDataTablesRecords();

} );
</script>


<script>
$(document).ready(function() {
	//set form data behalf of particular row id
	 $(document).on('click',"#edit_table_data",function(e){
		e.preventDefault();
		var id = $(this).attr('data-id');
		//alert(id);
		 if(id != ''){
			 $.ajax({  
				url: '<?php echo admin_url('admin-ajax.php'); ?>', 
				method: 'post',  
				data : {
				  action:"getAssetTypeDataByRowId",
				  id: id,
				},  				
					beforeSend: function(){
					 $("#loader").show();
					},				
					success: function(result){	
						if(result.success == true){
							$('#asset_type option[value='+result.data.asset_type_id+']').attr('selected','selected');
							$('#owner_id').attr('value',result.data.owner)
							$('#market_value_id').attr('value',result.data.market_value)
							$('#loan_balance_id').attr('value',result.data.loan_balance)
							$('#equity_id').attr('value',result.data.equity)
							$('#cashflow_id').attr('value',result.data.cashflow)
							$('#edit_row_id').attr('value',result.data.row_id)
							$('#current_value_id').attr('value',result.data.current_value)					
							
							$('#editModal').modal('show')
							
						}else{
							$('#editModal').modal('show');
							alert(result.data.message);
						}
						
					}, 
					complete: function(data){
					   $("#loader").hide();
					} 
			   }); 
			 
		 }else{
			alert("ID not found"); 
		 }
		 
	 });

	//update modal form data
	/*$(document).on('click','.update_form_button',function(e){
		e.preventDefault();
		
		var asset_type 	 = $('#asset_type').val();
		var owner 	 	 = $('#owner_id').val();				
		var market_value = $('#market_value_id').val();
		var loan_balance = $('#loan_balance_id').val();
		var equity       = $('#equity_id').val();
		var cashflow     = $('#cashflow_id').val();		
		var current_value= $('#current_value_id').val();
		var row_id       = $('#edit_row_id').val();			
	
		$.ajax({  
			url: '<?php echo admin_url('admin-ajax.php'); ?>', 
			method: 'post',  
			data : {
			  action:"update_assets_form_data",
				data: {'asset_type':asset_type, 'owner':owner, 'market_value':market_value, 'loan_balance':loan_balance, 'equity':equity, 'cashflow':cashflow, 'current_value':current_value, 'row_id':row_id },
			},  

				success: function(result){
				if(result.data.status == "success"){
						$('#editModal').modal('hide');	
						swal("Success", " " + result.data.message, "success");
					 }else{
						swal("Error", " " + result.data.message, "error"); 
					 }
					// Inner ajax call here
					getDataTablesRecords();

				},
				
           });		
			

	});*/
	
	//filetr behalf of month & year
	$(document).on('click','.filter_form_button',function(e){
		e.preventDefault();
	var month 	 = $('#month_id').val();	
	var year 	 = $('#year_id').val();	
	
	let id 	     = <?php echo $user_id; ?>;    
    $.ajax({
      url:'<?php echo admin_url('admin-ajax.php'); ?>',
      method: 'post',
      data : {
      action:"getAssetTypeDataFilter",
      user_id: id,
	  month: month,
	  year: year,
      },
	  beforeSend: function(){
        $("tbody").html('<tr><td class="text-center" colspan="7"><i class="fa fa-spinner" style="font-size:52px;color:red"></i></td></tr>');
       },

		success: function(result){
			//console.log(result.data);
			if(result.data.status == "success"){		
					
				$('#liability_table').DataTable().clear().draw();
					const all_data = result.data.view_data;						
					for (let i = 0; i < all_data.length; i++) { 
					//console.log(all_data[i]);                        
						 $('#liability_table').DataTable().row.add([ all_data[i][0], all_data[i][1], all_data[i][2], all_data[i][3], all_data[i][4], all_data[i][5], all_data[i][6],'<button id="edit_table_data" data-id="'+all_data[i][7]+'"><i class="fa fa-pencil-square-o finan_edit" aria-hidden="true"></i></button> &nbsp; <button id="delete_row_data" data-id="'+all_data[i][7]+'"><i class="fa fa-trash finan_edit" aria-hidden="true"></i></button>' ]).draw();
					}
			}
		}
    });
	
	});	
	
	//Reset button to click show all data as well as
	$(document).on('click','.reset_form_button',function(e){
		e.preventDefault();
		
	getDataTablesRecords();
	
	});	
	
		//Delete particular record on basis of row_id
	$(document).on('click',"#delete_row_data",function(e){
		e.preventDefault();
		var row_id = $(this).attr('data-id');

		swal({
			title: "Are you sure?",
			text: "Do you want to delete this records!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {

				$.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					type: 'post',
					data: {
						action:"delete_asset_user_row",
						row_id: row_id, 
					},
					success: function(result){						
						if(result.success == true){	
							swal('Successful!',result.data.message,'success');	
							//setTimeout(function(){ $("#delete_row_data").css('display','none') }, 500);							
						}else{
							swal('Error',result.data.message,'error');
						}
						
						/*Inner ajax start here*/
					    getDataTablesRecords();
						/*Inner ajax start here*/
						
					}
				});
			}else{
				swal("Poof! Your record is safe!");
			}
		});
	});

} );
</script>
<script>
$(document).ready(function () {

    // Currency Separator as per class number-separator
    var commaCounter = 10;

    function numberSeparator(Number) {
        Number += '';

        for (var i = 0; i < commaCounter; i++) {
            Number = Number.replace(',', '');
        }

        x = Number.split('.');
        y = x[0];
        z = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;

        while (rgx.test(y)) {
            y = y.replace(rgx, '$1' + ',' + '$2');
        }
        commaCounter++;
        return y + z;
    }

    // Set Currency Separator to input fields
    $(document).on('keypress , paste', '.number-separator', function (e) {
        if (/^-?\d*[,.]?(\d{0,3},)*(\d{3},)?\d{0,3}$/.test(e.key)) {
            $('.number-separator').on('input', function () {
                e.target.value = numberSeparator(e.target.value);
            });
        } else {
            e.preventDefault();
            return false;
        }
    });



})

</script>
<script>
$(document).ready(function () {
$(document).on('click','.update_form_button',function(e){			
		
		$("form[id='liability_type_frm']").validate({		 
		 
			rules: {
			  asset_type_id: "required",
			  owner: "required",
			  market_value: "required",
			  loan_balance: "required",
			  equity: "required",
			  cashflow: "required",
			  current_value: "required"	
			  
			},
			// Specify validation error messages
			messages: {
			  asset_type_id: " Select Assets Type",
			  owner: "Owner required",
			  market_value: "Market Value required",
			  loan_balance: "Loan Balance required",
			  equity: "Equity required",
			  cashflow: "Cash Flow required",	
			  current_value: "Current Value required"				  
			  
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler: function(form) {
				//console.log('submit handler section');
			  //form.submit();
				var asset_type 	 = $('#asset_type').val();
				var owner 	 	 = $('#owner_id').val();				
				var market_value = $('#market_value_id').val();
				var loan_balance = $('#loan_balance_id').val();
				var equity       = $('#equity_id').val();
				var cashflow     = $('#cashflow_id').val();		
				var current_value= $('#current_value_id').val();
				var row_id       = $('#edit_row_id').val();			
			
				$.ajax({  
					url: '<?php echo admin_url('admin-ajax.php'); ?>', 
					method: 'post',  
					data : {
					  action:"update_assets_form_data",
						data: {'asset_type':asset_type, 'owner':owner, 'market_value':market_value, 'loan_balance':loan_balance, 'equity':equity, 'cashflow':cashflow, 'current_value':current_value, 'row_id':row_id },
					},  

						success: function(result){
						if(result.data.status == "success"){
								$('#editModal').modal('hide');	
								swal("Success", " " + result.data.message, "success");
							 }else{
								swal("Error", " " + result.data.message, "error"); 
							 }
							// Inner ajax call here
							getDataTablesRecords();

						},
						
				});	
			  
			}
		  });			

	});
});

</script>	
