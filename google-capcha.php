<?php 
	if(isset($_POST['post'])) {
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		
		$url = "https://www.google.com/recaptcha/api/siteverify";
		$data = [
			'secret' => "6LfXfogdAAAAANYUHsB2x1MJDjjLsXX85awOioUf",
			'response' => $_POST['token'],
			// 'remoteip' => $_SERVER['REMOTE_ADDR']
		];

		$options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );

		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);

		$res = json_decode($response, true);
		if($res['success'] == true) {

			// Perform you logic here for ex:- save you data to database
  			echo '<div class="alert alert-success">
			  		<strong>Success!</strong> Your inquiry successfully submitted.
		 		  </div>';
		} else {
			echo '<div class="alert alert-warning">
					  <strong>Error!</strong> You are not a human.
				  </div>';
		}
	}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Google reCAPTHA V3</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://www.google.com/recaptcha/api.js?render=6LfXfogdAAAAAI8pM5tlIQ1mIaJECSkrSsIA8np1"></script>
  
  </head>
  <body>
	<div class="container">
	    <center><h1>Google reCAPTHA V3 </h1></center>
	    <hr>
	    <div class="card">
		  	<h3 class="card-header info-color white-text text-center py-4">
		    	<strong>What's in you mind, let us know</strong>
		  	</h3>
		  	<div class="card-body px-lg-5 pt-0">
		    	<form id="enq-frm" role="form" method="post" action="#" class="form-horizontal">
				<div class="form-group">
	              	<div class="input-group">
	                    <div class="input-group-addon addon-diff-color">
	                        <span class="glyphicon glyphicon-user"></span>
	                    </div>
	                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Full Name">
	              	</div>
	            </div>
	            <div class="form-group">
	            	<div class="input-group">
	                    <div class="input-group-addon addon-diff-color">
	                        <span class="glyphicon glyphicon-envelope"></span>
	                    </div>
	                	<input type="email" class="form-control" id="uemail" name="uemail" placeholder="Email Address">
	            	</div>
	            </div>
	            <div class="form-group">
	            	<div class="input-group">
	                    <div class="input-group-addon addon-diff-color">
	                        <span class="glyphicon glyphicon-envelope"></span>
	                    </div>
	                	<textarea class="form-control" id="msg" name="msg" placeholder="Enter your message" rows="5"></textarea>
	            	</div>
	            </div>
	            <div class="form-group">
	                <input type="submit" value="Post" class="btn btn-success btn-block" name="post">
	            </div> 
	            <input type="hidden" id="token" name="token">
	        	</form>
			</div>
		</div>
	</div>
	<div style="position: fixed; bottom: 30px; right: 100px; color: green;">
	</div>
  </body>

  <script>
  grecaptcha.ready(function() {
      grecaptcha.execute('6LfXfogdAAAAAI8pM5tlIQ1mIaJECSkrSsIA8np1', {action: 'homepage'}).then(function(token) {
         console.log(token);
         document.getElementById("token").value = token;
      });
  });
  </script>

</html>
