<style>
h2{
	font-family:Time New Roman;
}
</style>
<script>
	$(document).ready(function(){
		var hdflag = document.getElementById('hdflag').value;
		if(hdflag == "Update"){
			$("#frm_pwd").hide();
			document.getElementById('email').disabled = true;
		}
		$('#from_date').datepicker({
			format: 'yyyy-mm-dd',
			todayBtn: "linked"
		});
	});
</script>
<div class="container">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h2 align="center">Employee Registration</h2><br><br>
					<form method="post" action="<?php echo $this->webroot; ?>Registration/registerProcess" id="submit_form">
					<!-- <div id="errorMsg" class="error"><?php echo $errMsg; ?></div> -->
					<div id="succMsg" class="success"><?php echo $succMsg; ?></div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label for="first_name"><?php echo __('First Name'); ?></label>
						</div>
						<div class="col-sm-8">
							<input type="text" class="form-control push-right" id="fname" value="<?php echo $empData['empFirstname']; ?>" autofocus name="fname" required="required" placeholder="Enter First Name"/>
							<div id="errfName" class="errmsg" ><?php echo $errMsg; ?></div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label for="last_name"><?php echo __('Last Name'); ?></label>
						</div>
						<div class="col-sm-8">
							<input type="text" class="form-control push-right" id="lname" autofocus name="lname" required="required" value="<?php echo $empData['empLastname']; ?>" placeholder="Enter Last Name"/>
							<div id="errlName" class="errmsg" ></div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label for="user_name"><?php echo __('User Name'); ?></label>
						</div>
						<div class="col-sm-8">
							<input type="text" class="form-control push-right" id="username" autofocus name="username" required="requiered" value="<?php echo $empData['empUsername']; ?>" placeholder="Enter User Name"/>
							<div id="errUserName" class="errmsg" ></div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label for="from_date"><?php echo __('Date of Birth'); ?></label>
						</div>
						<div class="col-sm-8">
							<div class='input-group date datetimepicker' id='from'>
								<input type='text' class="form-control" id='from_date' name="from_date" autofocus placeholder="YYYY-MM-DD" value="<?php echo $empData['empDOB'] ?>" />
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
							<div id="errDOB" class="errmsg" ></div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label for="gender">Gender:</label>
						</div>
						<div class="col-sm-8">
							<div class="radio-inline">
								<input class="form-check-input" type="radio" name="gender" id="gender1" value="M"<?php if($empData['empGender'] == 'M'){echo 'checked= "checked"';} ?>>
				  				<label class="form-check-label" for="inlineRadio1">Male</label>
							</div>
							<div class="radio-inline">
				  				<input class="form-check-input" type="radio" name="gender" id="gender2"value = "F"<?php if($empData['empGender'] == 'F'){echo 'checked= "checked"';} ?>>
				  				<label class="form-check-label" for="inlineRadio2">Female</label>
							</div>
							<div id="errGender" class="errmsg" ></div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label for="gender"><?php echo __('Marital Status'); ?></label>
						</div>
					    <div class="col-sm-6">
						    <select class="form-control" id="marital" name="marital">
						      <option value="0" selected><?php echo __('---Select Marital Status---'); ?></option> 
						      <option value="1" <?php if($empData['empMarital'] == 1){echo 'selected = "selected"';} ?>><?php echo __('Single'); ?></option>
						      <option value="2" <?php if($empData['empMarital'] == 2){echo 'selected = "selected"';} ?>><?php echo __('Relationship'); ?></option>
						      <option value="3" <?php if($empData['empMarital'] == 3){echo 'selected = "selected"';} ?>><?php echo __('Maried'); ?></option>
						    </select>
						    <div id="errMarital" class="errmsg"></div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label for="address"><?php echo __('Address'); ?></label>
						</div>
						<div class="col-sm-8">
							<textarea name="address" id="address" class="form-control" placeholder="Your address!"><?php echo $empData['empAddress']; ?></textarea>
							<div id="errAddr" class="errmsg" ></div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label for="phone"><?php echo __('Phone'); ?></label>
						</div>
						<div class="col-sm-8">
							<input type="text" class="form-control push-right" id="phone" name="phone" required="requiered" value="<?php echo $empData['empPhone']; ?>" placeholder="Enter Phone Number"/>
							<div id="errPhone" class="errmsg" ></div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label for="email"><?php echo __('Email'); ?></label>
						</div>
						<div class="col-sm-8">
							<input type="text" class="form-control push-right" id="email" value="<?php echo $empData['empEmail']; ?>" required="required" autofocus name="email" placeholder="Enter Email"/>
							<div id="errEmail" class="errmsg" ></div>
						</div>
					</div>
					<div class="form-group row" id="frm_pwd">
						<div class="col-sm-4">
							<label for="pass"><?php echo __('Password'); ?></label>
						</div>
						<div class="col-sm-8">
							<input type="password" class="form-control push-right" id="password" value="<?php echo $empData['empPassword']; ?>" required="required" autofocus name="password" placeholder="Enter Password"/>
							<div id="errPass" class="errmsg" ></div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4"></div>
						<div class="col-sm-4">
							<input type="button" onclick="FormValidation()" class="form-control btn btn-primary btn-block" value="<?php echo __('Save'); ?>" id="btn_save" data-toggle="confirmation" data-popout="true">
						</div>
						<div class="col-sm-4"></div>
					</div>
					<input type="hidden" name="hdflag" id="hdflag" value="<?php echo $hdflag; ?>">
					<input type="hidden" name="hdemail" id="hdemail" value="<?php echo $empData['empEmail']; ?>">

			</form>
		</div>
				<div class="col-sm-3"></div>
			</div>
	</div>

<script>
	function FormValidation(){
		// document.getElementById('errorMsg').innerHTML='';
		document.getElementById('succMsg').innerHTML='';
		var hdflag = document.getElementById('hdflag').value;

		var chk = true;

		var patt = /^[a-zA-Z -]+$/;
		var phoneno = /^[0-9]*$/;

		

		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
    	

		var fname = document.getElementById('fname').value;
		var lname = document.getElementById('lname').value;
		var username = document.getElementById('username').value;
		var dofbirth = document.getElementById('from_date').value;
		var gender = document.getElementsByName('gender');
		var maritalStatus = document.getElementById('marital').value;
		var phone = document.getElementById('phone').value;
		var email = document.getElementById('email').value;
		var pass = document.getElementById('password').value;
		var addr = document.getElementById('address').value;

		if(fname == '' || fname == null){
			document.getElementById('errfName').innerHTML="Enter first name!"+"<br>";
			document.getElementById('errfName').style.color='red';
			document.getElementById('fname').style.border='1px solid red';
			chk = false;

		}else if(!patt.test(fname)){
			document.getElementById("errfName").innerHTML ="Enter first name is Character Only!"+"<br>";
			document.getElementById('errfName').style.color='red';
			document.getElementById('fname').style.border='1px solid red';
			chk = false;
		}
		if(lname == '' || lname == null){
			document.getElementById('errlName').innerHTML="Enter last name!"+"<br>";
			document.getElementById('errlName').style.color='red';
			document.getElementById('lname').style.border='1px solid red';
			chk = false;

		}else if(!patt.test(lname)){
			document.getElementById("errlName").innerHTML ="Enter last name is Character Only!"+"<br>";
			document.getElementById('errlName').style.color='red';
			document.getElementById('lname').style.border='1px solid red';
			chk = false;
		}
		if(username == '' || username == null){
			document.getElementById('errUserName').innerHTML="Enter username name!"+"<br>";
			document.getElementById('errUserName').style.color='red';
			document.getElementById('username').style.border='1px solid red';
			chk = false;

		}else if(!patt.test(username)){
			document.getElementById("errUserName").innerHTML ="Enter userame is Character Only!"+"<br>";
			document.getElementById('errUserName').style.color='red';
			document.getElementById('username').style.border='1px solid red';
			chk = false;
		}

		if(dofbirth == '' || dofbirth == null){
			document.getElementById('errDOB').innerHTML="Enter Date of Birth!"+"<br>";
			document.getElementById('errDOB').style.color='red';
			document.getElementById('from_date').style.border='1px solid red';
			chk = false;
		}

		if((gender[0].checked == false) && (gender[1].checked == false)){
			document.getElementById('errGender').innerHTML="Choose Gender Type!"+"<br>";
			document.getElementById('errGender').style.color='red';
			chk = false;
		}

		if(maritalStatus == 0){
			document.getElementById('errMarital').innerHTML="Select Marital Status!"+"<br>";
			document.getElementById('errMarital').style.color='red';
			document.getElementById('marital').style.border='1px solid red';
			chk = false;
		}

		if(addr == '' || addr == null){
			document.getElementById('errAddr').innerHTML="Enter address!"+"<br>";
			document.getElementById('errAddr').style.color='red';
			document.getElementById('address').style.border='1px solid red';
			chk = false;
		}

		if(phone == '' || phone == null){
			document.getElementById('errPhone').innerHTML="Enter phone number!"+"<br>";
			document.getElementById('errPhone').style.color='red';
			document.getElementById('phone').style.border='1px solid red';
			chk = false;
		}else if(!phoneno.test(phone)){
			document.getElementById('errPhone').innerHTML="Enter  number only!"+"<br>";
			document.getElementById('errPhone').style.color='red';
			document.getElementById('phone').style.border='1px solid red';
			chk = false;
		}

		if(email == '' || email == null){
			document.getElementById('errEmail').innerHTML="Enter email address!"+"<br>";
			document.getElementById('errEmail').style.color='red';
			document.getElementById('email').style.border='1px solid red';
			chk = false;
		}else if(!re.test(String(email).toLowerCase())){
			document.getElementById('errEmail').innerHTML="Enter valid email format!"+"<br>";
			document.getElementById('errEmail').style.color='red';
			document.getElementById('email').style.border='1px solid red';
			chk = false;
		}

		if(hdflag == "Register"){
			if(pass == '' || pass == null){
				document.getElementById('errPass').innerHTML="Enter password!"+"<br>";
				document.getElementById('errPass').style.color='red';
				document.getElementById('password').style.border='1px solid red';
				chk = false;
			}else if((pass.length > 7) && (!pass.match(paswd))){
				document.getElementById('errPass').innerHTML="Don't enter at most 6 character!"+"<br>";
				document.getElementById('errPass').style.color='red';
				document.getElementById('password').style.border='1px solid red';
				chk = false;
			}
		}

		if(chk){
			if(hdflag == "Register"){
				$.confirm({

					title: 'Confirmation',
					content: 'Are you sure want to save?',
					icon: 'fa fa-question-circle',
					animation: 'scale',
					closeAnimation: 'scale',
					opacity: 0.5,
					buttons: {
						'confirm': {
							text: 'Ok',
							action: function(){
								document.forms[0].action="<?php echo $this->webroot; ?>Registration/create_emp";
								document.forms[0].method = "POST";
								document.forms[0].submit();
							}
						},
						Cancel: function(){}
					}
				});			
			}else{

				$.confirm({

					title: 'Confirmation',
					content: 'Are you sure want to update?',
					icon: 'fa fa-question-circle',
					animation: 'scale',
					closeAnimation: 'scale',
					opacity: 0.5,
					buttons: {
						'confirm': {
							text: 'Ok',
							action: function(){
								document.forms[0].action="<?php echo $this->webroot; ?>Registration/update";
								document.forms[0].method = "POST";
								document.forms[0].submit();
							}
						},
						Cancel: function(){}
					}
				});
			}
		}

	}

</script>