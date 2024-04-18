<?php
App::uses('AppController', 'Controller');
/**
 * Employees Controller
 *
 * @property Employee $Employee
 * @property PaginatorComponent $Paginator
 */
class RegistrationController extends AppController {

	public $uses = array('EmployeeModel');
	public $components = array('Session');

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index','registerProcess');
	}

	public function index(){

	 	$hdflag = "Register";
		$errorMsg = "";
		$succMsg = "";

	 	$result = array(
			'empFirstname' => "",
			'empLastname' => "",
			'empUsername' => "",
			'empDOB' => "",
			'empGender' => "",
			'empMarital' => "",
			'empPhone' => "",
			'empPassword' => "",
			'empEmail' => "",
			'empAddress' => "");

		$this->set("hdflag", $hdflag);
		$this->set("empData", $result);
		$this->set("errMsg", $errorMsg);
		$this->set("succMsg", $succMsg);
		$this->render('index');

	}

	public function create_emp(){
		$hdflag = "Register";
		$errorMsg = "";
		$succMsg = "";
		$emp_id = $this->Session->read('EMPID');
		if($this->request->is('Post')){

			$firstname = $this->request->data['fname'];
			$lastname = $this->request->data['lname'];
			$username = $this->request->data['username'];
			$dofBirth = $this->request->data['from_date'];
			$gender = $this->request->data['gender'];
			$marital = $this->request->data['marital'];
			$phone = $this->request->data['phone'];
			$email = $this->request->data['email'];
			$pass = $this->request->data['password'];
			$encrypt_pwd = AuthComponent::password($pass);
			//pr($encrypt_pwd);die();
			$addr = $this->request->data['address'];
			 
			
			$this->EmployeeModel->insertEmployee($firstname, $lastname, $username, $dofBirth, $gender, $marital, $phone, $email, $encrypt_pwd, $addr, $emp_id);

			$result = array(
					'empFirstname' => "",
					'empLastname' => "",
					'empUsername' => "",
					'empDOB' => "",
					'empGender' => "",
					'empMarital' => "",
					'empPhone' => "",
					'empPassword' => "",
					'empEmail' => "",
					'empAddress' => "");

				$this->set("hdflag", $hdflag);
				$this->set("empData", $result);
				$this->set("errMsg", $errorMsg);
				$this->set("succMsg","Insert Successfully!");
				$this->render('index');
		}
		
	}

	public function Upload(){
		$result = array();
		$hdflag = "Update";
		$empid = $this->Session->read('EditEMPID');
		$emp_data = $this->EmployeeModel->find(
											'all',
												array('conditions'=>
													array(
														'id' => $empid,
														'flag' => 1 
													)
												)
											);
		// pr($emp_data);die();
		if(!empty($emp_data)){
			foreach ($emp_data as $data) {
				$result['empFirstname'] = $data['EmployeeModel']['firstname'];
				$result['empLastname'] = $data['EmployeeModel']['lastname'];
				$result['empUsername'] = $data['EmployeeModel']['username'];
				$result['empDOB'] = $data['EmployeeModel']['dateofbirth'];
				$result['empGender'] = $data['EmployeeModel']['gender'];
				$result['empMarital'] = $data['EmployeeModel']['marital_status'];
				$result['empEmail'] = $data['EmployeeModel']['email'];
				$result['empPhone'] = $data['EmployeeModel']['phone'];
				$result['empAddress'] = $data['EmployeeModel']['address'];
			}
			$this->set("hdflag", $hdflag);
			$this->set("empData", $result);
			$this->set("succMsg", "");
			$this->set("errMsg", "");
			$this->render('index');
		}
	}

	public function update(){
		$errorMsg = "";
		$succMsg = "";
		$hdflag = "Update";
		if($this->request->is('Post')){

			$empid = $this->Session->read('EditEMPID');
			$emp_id = $this->Session->read('EMPID');

			$firstname = $this->request->data['fname'];
			$lastname = $this->request->data['lname'];
			$username = $this->request->data['username'];
			$dofBirth = $this->request->data['from_date'];
			$gender = $this->request->data['gender'];
			$marital = $this->request->data['marital'];
			$phone = $this->request->data['phone'];
			$email = $this->request->data['hdemail'];
			$addr = $this->request->data['address'];

			$emp_data = $this->EmployeeModel->find(
											'all',
												array('conditions'=>
													array(
														'id !=' => $empid,
														'email' => $email,
														'flag !=' => 0
													)
												)
											);//pr($emp_data);die(); 
			if(!empty($emp_data)) {

				$result = array(
					'empFirstname'=>$firstname,
					'empLastname'=>$lastname,
					'empUsername'=>$username,
					'empDOB'=>$dofBirth,
					'empGender'=>$gender,
					'empMarital'=>$marital,
					'empPhone'=>$phone,
					'empEmail'=>$email,
					'empAddress'=>$addr
				);

				$this->set("hdflag", $hdflag);
				$this->set("empData", $result);
				$errorMsg = "This email is already exit!";
				$this->set("errMsg", $errorMsg);
				$this->set("succMsg","");
				$this->render('index');
			}else{
				$this->EmployeeModel->updateEmployee($empid, $firstname, $lastname, $username, $dofBirth, $gender, $marital, $phone, $email, $addr, $emp_id);

				$result = array(
				'empFirstname'=>$firstname,
				'empLastname'=>$lastname,
				'empUsername'=>$username,
				'empDOB'=>$dofBirth,
				'empGender'=>$gender,
				'empMarital'=>$marital,
				'empPhone'=>$phone,
				'empEmail'=>$email,
				'empAddress'=>$addr);

				$this->set("hdflag", $hdflag);
				$this->set("empData", $result);
				$this->set("errMsg", $errorMsg);
				$this->set("succMsg", "Update Successfully!");
				$this->render('index');
			}
		}
	}

}