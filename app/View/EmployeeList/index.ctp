<style>
	.paging .current,
	.paging .disabled,
	.paging a {
		font-family: sans-serif;
		font-weight: bolder;
		text-decoration: none;
		padding: 8px 12px;
		display: inline-block;
		color: #fff;
	}
	.paging > span {
		display: inline-block;
		border: 1px solid #5fe90b;
		background: #5fe90b;
		min-width: 3em;
		margin: 5px 5px;
		box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.3);
	}
	.paging > span:not(.current):hover {
		background: #D7DBDD;
		border: 1px solid #D7DBDD;
	}
	.paging .disabled {
		color: #fff;
	}
	.paging .disabled:hover {
		background: #5fe90b;
		border: 1px solid #ffd32a;
	}
	.paging .current {
		background: #00FF00;
		border: 1px solid #00FF00;
		color: #fff;
	}
</style>

<?php
	$emp_id = '';
	$emp_name = '';
	$email = '';
	if(!empty($search)) {
		$emp_id = $search['id'];
		$emp_name = $search['username'];
		$email = $search['email'];
		// pr($email);die();
	}
?>

<div class="container">
	<div class="col-sm-12">
		<h2 align="center">Employee List</h2><br>
		<form class="form-inline" action="" method="post">
			<div id="errMsg" class="error"><?php echo $errMsg; ?></div>
			<div id="succMsg" class="success"><?php echo $succMsg; ?></div>

			<div class="errorSuccess">
				<?php if($this->Session->check('Message.errorMessage')): ?>
					<div class="error">
						<strong style="color: red;">
							<?php echo $this->Flash->render("errorMessage"); ?>	
						</strong>
					</div>
				<?php endif; ?>
			</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="col-sm-4">
					<label for="emp_id"><?php echo __('EmpID:'); ?></label>
				</div>
				<div class="col-sm-8">
					<input type="text" class="search form-control push-right" id="emp_id" name="emp_id" value="<?php echo $emp_id; ?>"placeholder="Enter EmpID" style="border-radius: 10px;" />
				</div>
			</div>
			<div class="col-sm-3">
				<div class="col-sm-4">
					<label for="emp_name"><?php echo __('Name:') ?></label>
				</div>
				<div class="col-sm-8">
					<input type="text" class="search form-control push-right" id="username" name="username" value="<?php echo $emp_name; ?>" placeholder="Enter Name" style="border-radius: 10px;" />
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-6">
						<div class="col-sm-3">
							<label for="emp_email"><?php echo __('Email:') ?></label>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<input type="text" class="search form-control push-right" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter Email Address" style="border-radius: 10px;"/>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<input type="button" id="btnSearch" class="form-control btn btn-primary btn-block" value="Search" style="border-radius: 10px;" />
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
								<a href="<?php echo $this->webroot; ?>Registration"><input type="button" id="btnRegister" class="form-control btn btn-primary btn-block" value="New Register" style="border-radius: 10px;" /></a>
						</div>
					</div>
				</div>
			</div>
		</div><input type="hidden" id="hdId" name="hdId"></form><br><br>

		<div id="errorMsg" class="error"><?php echo $errorMsg; ?></div>
		<div id="successMsg" class="success"><?php echo $successMsg; ?></div>

		<?php if(!empty($employees)) { ?>
		<div class="table-responsive">
            <table class="table table-bordered">
                <thead id="thead">
                    <tr>
                        <th><?php echo $this->Paginator->sort('EmpID'); ?></th>
                        <th><?php echo __('First Name'); ?></th>
                        <th><?php echo __('Last Name'); ?></th>
                        <th><?php echo __('User Name'); ?></th>
                        <th><?php echo __('Date Of Birth'); ?></th>
                        <th><?php echo __('Gender'); ?></th>
                        <th><?php echo __('Marital Status'); ?></th>
                        <th><?php echo __('Email'); ?></th>
                        <th><?php echo __('Phone'); ?></th>
                        <th><?php echo __('Address'); ?></th>
                        <th colspan ="3" class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee): 
							if($employee['EmployeeModel']['gender'] == 'M'){
								$gender = 'Male';
							}else{
								$gender = 'Female';
							}
							if($employee['EmployeeModel']['marital_status'] == '1'){
								$merital = 'Single';
							}else if($employee['EmployeeModel']['marital_status'] == '2'){
								$merital = 'Relationship';
							}else{
								$merital = 'Maried';
							}
							?>
					<tr>
							<td><?php echo h($employee['EmployeeModel']['id']); ?>&nbsp;</td>
							<td><?php echo h($employee['EmployeeModel']['firstname']); ?>&nbsp;</td>
							<td><?php echo h($employee['EmployeeModel']['lastname']); ?>&nbsp;</td>
							<td><?php echo h($employee['EmployeeModel']['username']); ?>&nbsp;</td>
							<td><?php echo h($employee['EmployeeModel']['dateofbirth']); ?>&nbsp;</td>
							<td><?php echo h($gender); ?>&nbsp;</td>
							<td><?php echo h($merital); ?>&nbsp;</td>
							<td><?php echo h($employee['EmployeeModel']['email']); ?>&nbsp;</td>
							<td><?php echo h($employee['EmployeeModel']['phone']); ?>&nbsp;</td>
							<td><?php echo h($employee['EmployeeModel']['address']); ?>&nbsp;</td>

							<td class="actions">

								<a href="#" onclick="ViewLink(<?php echo $employee['EmployeeModel']['id']; ?>)"><span class='glyphicon glyphicon-eye-open'></span></a>
							</td>
							<td>
								<a href="#" onclick="EditLink(<?php echo $employee['EmployeeModel']['id']; ?>)"><span class='glyphicon glyphicon-list-alt'></span></a>
							</td>
							<td id="delete-btn">
								<a href="#" style="display: inline;" data-toggle="confirmation" data-popout="true" onclick="DeleteLink(<?php echo $employee['EmployeeModel']['id']; ?>)"><span class='glyphicon glyphicon-trash'></span></a>
							</td>
					</tr>
					<?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
	</div>
</div>

<div class="row" style="clear:both;margin: 40px 0px;">
	<?php if($pageCount > 1) { ?>
	    <div class="col-sm-12" style="padding: 10px;text-align: center;">
			<div class="paging">
			<?php
				echo $this->Paginator->first('<<');
			    echo $this->Paginator->prev('< ', array(), null, array('class' => 'prev disabled'));
			    echo $this->Paginator->numbers(array('separator'=>'', 'modulus'=>2));
			    echo $this->Paginator->next(' >', array(), null, array('class' => 'next disabled'));
			    echo $this->Paginator->last('>>');
			?>
			</div>
		</div> 
	<?php } ?>
</div>

<div id="empModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered">	
	    <!-- Modal content-->
	    <div class="modal-content" style="background-color: #0fa8fa;">
	    	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><?php echo __('Employee Detail Data');?></h4>
	       	</div>
			<div class="modal-body">
				<!-- Table-->
				<div class="row">
					<div class="control-label col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
							<label><?php echo __("Employee ID"); ?></label>
						</div>
					</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="form-group">                    		
							<input type="text" name="popup_empid" id="popup_empid"  class="form-control" readonly />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
							<label><?php echo __("Employee First Name"); ?></label>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="form-group">                    		
							<input type="text"  name="popup_empfname" id="popup_empfname" class="form-control" readonly />
						</div>
					</div>			
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
							<label><?php echo __("Employee Last Name"); ?></label>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="form-group">                    		
							<input type="text"  name="popup_emplname" id="popup_emplname" class="form-control" readonly />
						</div>
					</div>			
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
							<label><?php echo __("User Name"); ?></label>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="form-group">                    		
							<input type="text"  name="popup_username" id="popup_username" class="form-control" readonly />
						</div>
					</div>			
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
							<label><?php echo __("Date Of Birth"); ?></label>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="form-group">                    		
							<input type="text"  name="popup_dofbirth" id="popup_dofbirth" class="form-control" readonly />
						</div>
					</div>			
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
							<label><?php echo __("Gender"); ?></label>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="form-group">                    		
							<input type="text"  name="popup_gender" id="popup_gender" class="form-control" readonly />
						</div>
					</div>			
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
							<label><?php echo __("Marital Status"); ?></label>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="form-group">                    		
							<input type="text"  name="popup_marital" id="popup_marital" class="form-control" readonly />
						</div>
					</div>			
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
							<label><?php echo __("Phone Number"); ?></label>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="form-group">                    		
							<input type="text"  name="popup_phone" id="popup_phone" class="form-control" readonly />
						</div>
					</div>			
				</div>
				<div class="row">					
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
							<label><?php echo __("Email"); ?></label>                        	
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="form-group">                    		
							<input type="text"  name="popup_empemail" id="popup_empemail" class="form-control" readonly />
						</div>
					</div>			
				</div>
				<div class="row">					
					<div class="col-lg-3 col-md-3 col-sm-3">
						<div class="form-group">
							<label><?php echo __("Address"); ?></label>                        	
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="form-group">                    		
							<input type="text"  name="popup_address" id="popup_address" class="form-control" readonly />
						</div>
					</div>
				</div>	
			</div>
			<div class="modal-footer"> 
				<button style="border-radius: 18px;" type="button" class="btn btn-success" data-dismiss="modal"><?php echo __("Close"); ?></button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$(".search").keyup(function(){
			var id = $(this).val();
			if (id.length) {
			$.ajax({
				url: '<?php echo $this->webroot; ?>EmployeeList/autoFill',
				type: 'post',
				data: {id:id}, //first controller type, second this type
				dataType: 'json',
				success: function(data) {
					//console.log(data);					
					if(data != '' || data != undefined) {
						var id = data['EmployeeModel']['id'];
						var name = data['EmployeeModel']['username'];
						var email = data['EmployeeModel']['email'];
						$("#emp_id").val(id);
						$("#username").val(name);
						$("#email").val(email);
					}
				},
				error: function() {
					console.log('error');
				}
			});
		}
		else{
			$("#username").val("");
			$("#email").val("");
		}
		});
	});

	function EditLink(id){
		if(id != '' || id != null){ 
			document.getElementById('hdId').value = id;
			document.forms[0].action = "<?php echo $this->webroot;?>EmployeeList/edit";
			document.forms[0].method = "POST";
			document.forms[0].submit();
		}
	}

	function DeleteLink(id){
		$.confirm({

			title: 'Confirmation',
			content: 'Are you sure want to delete?',
			icon: 'fa fa-question-circle',
			animation: 'scale',
			closeAnimation: 'scale',
			opacity: 0.5,
			buttons: {
				'confirm': {
					text: 'Ok',
					action: function(){
						document.getElementById('hdId').value = id;
						document.forms[0].action = "<?php echo $this->webroot;?>EmployeeList/delete";
						document.forms[0].method = "POST";
						document.forms[0].submit();
					}
				},
				Cancel: function(){}
			}
		});
	}

	function ViewLink(id){
		document.getElementById('errorMsg').innerHTML = "";
		document.getElementById('successMsg').innerHTML = "";

		$('#empModal').modal('show');
	
		if(id != '' || id != null){
			// alert(id);die();
			document.getElementById('hdId').value = id;
			
			$.ajax({
				type: 'post',
				url: '<?php echo $this->Html->url(array('controller'=> 'EmployeeList','action' => 'viewer')); ?>',
				data: { 
					'id' : id
				},
				dataType: 'json',
				success: function(data) {

					if(data != '' || data != undefined) {

						if(data['EmployeeModel']['gender'] == '1'){
							var gender = 'Male';
						}else{
							var gender = 'Female';
						}
						if(data['EmployeeModel']['marital_status'] == '1'){
							var marital = 'Single';
						}else if(data['EmployeeModel']['marital_status'] == '2'){
							var marital = 'Relationship';
						}else{
							var marital = 'Maried';
						}
						$("#popup_empid").val(data['EmployeeModel']['id']);
						$("#popup_empfname").val(data['EmployeeModel']['firstname']);
						$("#popup_emplname").val(data['EmployeeModel']['lastname']);
						$("#popup_username").val(data['EmployeeModel']['username']);
						$("#popup_dofbirth").val(data['EmployeeModel']['dateofbirth']);
						$("#popup_gender").val(gender);
						$("#popup_marital").val(marital);
						$("#popup_phone").val(data['EmployeeModel']['phone']);
						$("#popup_empemail").val(data['EmployeeModel']['email']);
						$("#popup_address").val(data['EmployeeModel']['address']);
					}	
					
				},			
			});
			
		}
		
	}

	$("#btnSearch").click(function(){
		document.forms[0].action = "<?php echo $this->webroot;?>EmployeeList/search";
		document.forms[0].method = "POST";
		document.forms[0].submit();
	});

</script>
