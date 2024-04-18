<?php
App::uses('AppController', 'Controller');
/**
 * Employees Controller
 *
 * @property Employee $Employee
 * @property PaginatorComponent $Paginator
 */
class LoginController extends AppController {

	public $uses = array('EmployeeModel');
	public $components = array('Session');

	function beforeFilter() {
	$this->Auth->allow('index','loginProcess');		
	$this->Auth->authenticate = array(
			AuthComponent::ALL => array('employeeModel' => 'EmployeeModel'),
			'Basic',
			'Form' => array(
					'fields' => array(
							'email' => 'email',
							'password' => 'password'
						)
				)
		);

	if($this->Session->read('EMAIL')) {
			$this->Session->destroy();
		}

	}
	 public function index(){

	 	$this->layout=false;
	 	$errorMsg = "";
		$this->set("errorMsg", $errorMsg);
	 	$this->render('index');


	 }

	 public function loginprocess(){
		
		$errorMsg = "";
		$this->layout = false;
		
		if($this->request->is('Post')) {
			
			$email = $this->request->data['email'];
			$password = $this->request->data['password'];
			//pr($email);pr($password);die();		
			// pr(AuthComponent::password($password));			
			$emp_data = $this->EmployeeModel->find(
											'all',
												array('conditions'=>
													array(
														'email' => $email
														,'password' => AuthComponent::password($password) 
													)
												)
											);
			// pr(AuthComponent::password($password));
		    // pr($emp_data);die();
			if (count($emp_data) > 0) {
				// pr($emp_data[0]['User']['id']);die();
				if ($this->Auth->login($emp_data)) {
					
					$this->Session->write('EMPID', $emp_data[0]['EmployeeModel']['id']);
					$this->Session->write('EMAIL', $emp_data[0]['EmployeeModel']['email']);
					$this->redirect(array('controller'=>'EmployeeList','action'=>'index'));
				}
			}else {
				$errorMsg = "Login Email and Password Is Invalid!";
				$this->set("errorMsg",$errorMsg);
				$this->render('index');
			}

		}
		
	}

	public function logout(){
		
		$this->Session->destroy();
	
		$this->redirect( array(
			'controller' => 'Login',
			'action' => 'index'
			)
		);
		
	}

	public function forgot(){
		if($this->request->is('post')){
			$this->Session->write('EditEMPID', $editId);
			$this->redirect(array('controller'=>'Registration', 'action'=>'Upload'));
		}
	}


}