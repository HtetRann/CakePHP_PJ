<?php
App::uses('AppController', 'Controller');
/**
 * Employees Controller
 *
 * @property Employee $Employee
 * @property PaginatorComponent $Paginator
 */
class EmployeeListController extends AppController {

	public $uses = array('EmployeeModel');
	public $components = array('Paginator');
	var $helpers = array ('Html', 'Form');

	 public function index() {

		$errorMsg = "";
		$successMsg = "";
		$errMsg = "";
		$succMsg = "";

		$conditions = [];
		$conditions['flag'] = 1;
		$this->paginate = array(
			'limit' => 7,
			'conditions' => $conditions
		);
		$list = $this->Paginator->paginate();
		$pageCount = $this->params['paging']['EmployeeModel']['pageCount'];
		$rowCount = $this->params['paging']['EmployeeModel']['count'];

		if($rowCount > 0){
			$successMsg = "Total Row: $rowCount Row";
		}else{
			$errorMsg = "Data is not found!";
		}

		$this->set("errorMsg", $errorMsg);
		$this->set("successMsg", $successMsg);
		$this->set("errMsg", $errMsg);
		$this->set("succMsg", $succMsg);
		$this->set('employees', $list);
		$this->set('pageCount', $pageCount);
	}

	public function search() {
		$errorMsg = "";
		$successMsg = "";
		$errMsg = "";
		$succMsg = "";

		$conditions = [];
		$search = [];
		
		/*if($this->Session->check('Employees_successMsg')){
			$succMsg = $this->Session->read('Employees_successMsg');
			$this->Session->delete('Employees_successMsg');
			}else{
			$this->set('succMsg','');
			}

			if($this->Session->check('Employees_errorMsg')){
			$errMsg = $this->Session->read('Employees_errorMsg');
			$this->Session->delete('Employees_errorMsg');
			}else{
			$this->set('errMsg','');
			}*/

		if($this->request->is('post')) {
			$id = $this->request->data['emp_id'];
			$name = $this->request->data['username'];
			$email = $this->request->data['email'];

			$this->Session->write('ID',$id);
			$this->Session->write('NAME',$name);
			$this->Session->write('EMAIL',$email);


			}if($this->request->is('get')) {
			$id = $this->Session->read('ID');
			$name =$this->Session->read('NAME');
			$email=$this->Session->read('EMAIL');
			}

			if(!empty($id)) {
			$conditions['id'] = $id;
			}
			if(!empty($name)) {
			$conditions['username LIKE '] = '%'.$name.'%';
			}
			if(!empty($email)) {
			$conditions['email'] = $email;
			}

			$search = array(
			'id' => $id,
			'username' => $name,
			'email' => $email
			);

		$conditions['flag'] = 1;
		$this->paginate = array(
			'limit' => 7,
			'conditions' => $conditions
		);
		$list = $this->Paginator->paginate();
		$pageCount = $this->params['paging']['EmployeeModel']['pageCount'];
		$rowCount = $this->params['paging']['EmployeeModel']['count'];
		if($rowCount > 0){
			$successMsg = "Total Row: $rowCount Row";
		}else{
			$errorMsg = "Data is not found!";
		}

		$this->set("errorMsg", $errorMsg);
		$this->set("successMsg", $successMsg);
		$this->set("errMsg", $errMsg);
		$this->set("succMsg", $succMsg);
		$this->set('employees', $list);
		$this->set('pageCount', $pageCount);
		$this->set('search', $search);
		$this->render('index');
	}

		public function autoFill() {
		$this->request->allowMethod('ajax');
		$this->autoRender = false;
		$this->layout = false;

		$name = $this->request->query('q');
		$id = $this->request->data('id');
		// pr($name);

		$get = $this->EmployeeModel->find('first', array(
				'conditions' => array(
					'flag' => 1,
					'id' => $id,
					'username LIKE' => '%'.$name.'%'
				),
				'fields' => array(
					'id',
					'username',
					'email'
				)
			)
		);
		echo json_encode($get);
	}


		public function edit(){
		if($this->request->is('post')){
			$editId=$this->request->data("hdId");

			$this->Session->write('EditEMPID', $editId);
			$this->redirect(array('controller'=>'Registration', 'action'=>'Upload'));
		}
	}

	public function delete(){
		$errorMsg = "";
		$successMsg = "";
		$errMsg = "";
		$succMsg = "";
		if($this->request->is('post')){
			$deleteId=$this->request->data("hdId");
			$this->EmployeeModel->deleteEmpdata($deleteId);
			$this->redirect(array('action' => 'index'));
		}
	}

	public function viewer(){
		
		$this->request->allowMethod('ajax');
		$this->autoRender = false;
		$this->layout = false;
		
		$id = $this->request->data('id');

		$get = $this->EmployeeModel->find('first', array(
				'conditions' => array(
					'flag' => 1,
					'id' => $id
				),
				'fields' => array(
					'id',
					'firstname',
					'lastname',
					'username',
					'dateofbirth',
					'email',
					'gender',
					'marital_status',
					'phone',
					'address'
				)
			)
		);
		echo json_encode($get);
	}
}