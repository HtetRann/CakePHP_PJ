<?php
App::uses('AppModel', 'Model');

class EmployeeModel extends AppModel {
	public $useTable = 'users';

	public function insertEmployee( $firstname, $lastname, $username, $dofBirth, $gender, $marital, $phone, $email, $pass, $addr, $emp_id){
		$date = ('Y-m-d H:i:s');
		$param = array();
		$sql = "INSERT INTO users (firstname, lastname, username, dateofbirth, email, password, gender, marital_status, phone, address, flag, created_id, updated_id, created_date, updated_date)";
		$sql .= " VALUES (:firstname, :lastname, :username, :dateofbirth, :email, :password, :gender, :marital_status, :phone, :address, :flag, :created_id, :updated_id, :created_date, :updated_date)";

		$param['firstname'] = $firstname;
		$param['lastname'] = $lastname;
		$param['username'] = $username;
		$param['dateofbirth'] = $dofBirth;
		$param['email'] = $email;
		$param['password'] = $pass;
		$param['gender'] = $gender;
		$param['marital_status'] = $marital;
		$param['phone'] = $phone;
		$param['address'] = $addr;
		$param['flag'] = 1;
		$param['created_id'] = 1;
		$param['updated_id'] = 1;
		$param['created_date'] = $date;
		$param['updated_date'] = $date;

		$data = $this->query($sql, $param);
		return $data;

	}

	public function deleteEmpdata($empid){
		$param = array();
		$date = date('Y-m-d H:i:s');
		$sql = "";
		$sql .= "UPDATE users SET flag = :flag, updated_date = :updated_date";
		$sql .= " WHERE id = :id";

		$param['flag'] = 0;
		$param['updated_date'] = $date; 
		$param['id'] = $empid;
		$data = $this->query($sql, $param);
		return $data;
	}

	public function updateEmployee($empid, $firstname, $lastname, $username, $dofBirth, $gender, $marital, $phone, $email, $addr, $emp_id){

		$date = ('Y-m-d H:i:s');
		$param = array();
		$sql = "";
		$sql .= " UPDATE users SET firstname = :firstname, lastname = :lastname, username = :username, dateofbirth = :dateofbirth, email = :email, gender = :gender, marital_status = :marital_status, phone = :phone, address = :address, flag = :flag, updated_id = :updated_id, updated_date = :updated_date";
		$sql .= " WHERE id = :id";

		$param['id'] = $empid;
		$param['firstname'] = $firstname;
		$param['lastname'] = $lastname;
		$param['username'] = $username;
		$param['dateofbirth'] = $dofBirth;
		$param['email'] = $email;
		$param['gender'] = $gender;
		$param['marital_status'] = $marital;
		$param['phone'] = $phone;
		$param['address'] = $addr;
		$param['flag'] = 1;
		$param['updated_id'] = $emp_id;
		$param['updated_date'] = $date;
		
		$data = $this->query($sql, $param);
		return $data;
	}

	

}