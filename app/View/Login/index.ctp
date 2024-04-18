<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Login</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.css');
		echo $this->Html->script('jquery-2.1.4.min');
		echo $this->Html->script('bootstrap.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<form action="<?php echo $this->webroot; ?>Login/loginprocess" id="loginproc" method="post">
		<div class="col-sm-4">
			<h2 align="center">Employee Login</h2><br>
			<div id="errorMsg" class="error"><?php echo $errorMsg; ?></div>
			<div class="row">
				<div class="col-sm-3">
					<label for="emp_name">Name:</label>
				</div>
				<div class="col-sm-9">
					<div class="form-group">
					<input type="text" class="form-control push-right" id="email" autofocus name="email" placeholder="Enter email address" style="border-dius: 10px;" />
					<div id="erremail" class="errmsg" ></div>
					</div>
				</div>	
			</div>
			<div class="row">
				<div class="col-sm-3">
					<label for="emp_pass">Password:</label>
				</div>
				<div class="col-sm-9">
					<div class="form-group">
					<input type="password" class="form-control push-right" name="password" id="password" placeholder="Enter passwrod" style="border-radius: 10px;" />
					<div id="errpassword" class="errmsg" ></div>
					</div>
				</div>	
			</div><br>
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="button" id="btnlogin" class="form-control btn btn-primary btn-block" value="Login" onclick="formValidation()" style="border-radius: 10px;" />
					</div>
				</div>
				<div class="col-sm-4"></div>
			</div>
		<div class="col-md-4"></div>
	</div>
	</form>
</div>
</body>
</html>

<script>
	function formValidation(){
		
		document.getElementById("erremail").innerHTML = "";
		document.getElementById("errpassword").innerHTML = "";
		
		var email = document.getElementById("email").value;		
		var password = document.getElementById("password").value;
		var chk = true;
		
		if(email == "" || email == null){			
			document.getElementById("erremail").innerHTML ="Enter Email!";
			chk = false;
		}
		
		if(password == "" || password == null){			
			document.getElementById("errpassword").innerHTML ="Enter Password!";
			chk = false;
		}
		
		if(chk) {
	   		document.forms[0].action = "<?php echo $this->webroot; ?>Login/loginprocess";
			document.forms[0].method = "POST";
			document.forms[0].submit();	
		
			//document.getElementById('loginproc').submit();
		}		
	}
</script>