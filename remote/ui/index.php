<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Remote PC Lock</title>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Remote PC Lock</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form action="" method="POST" id="login-form" role="form">
				<legend>Login</legend>

				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" placeholder="Your Username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Your Password">
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary">Login</button>	
				</div>
			</form>
		</div>
		<div class="col-md-6 lock-button-wrapper" id="lock-wrapper">
			<div class="text-center">
				<a href="" class="btn btn-primary btn-lg" id="lock-btn">Lock PC</a>
			</div>	
		</div>
	</div>
</div>


<!-- scripts -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>

<script>


	var login_form = $("#login-form");

	login_form.submit(function(event){
		event.preventDefault(); // Prevents page reload.
		username = $("#username").val();
		password = $("#password").val();
		
		data = {
			'user' : username,
			'user_key' : password
		};

		url = window.location.origin + '/';

		$.ajax({
		  type: "POST",
		  url: url+'get_url.php',
		  data: data,
		  success: function(result){
		  	// console.log(result);
		  	result = jQuery.parseJSON(result);
		  	
		  	if(result.success == 1){
		  		$('#lock-btn').attr('href', result.url+"/lock.php");
		  		$('#lock-wrapper').show();
		  	}else{
		  		console.log("Bad!");
		  	}
		  },
		  error: function(){
		  	console.log('Your have an Error!');
		  }
		});

	});
//go on working. papa hain msg mt krna isi pe comment likhna . uload karna hai.
 
</script>
</body
></html>