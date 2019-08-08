<?php 
/**
* 
*/
class User extends DController
{
	
	function __construct()
	{
		parent::__construct();
		$data = array();
	}
	public function Index(){
		$this->makeUser();
	}
	public function makeUser(){
		$this->load->view("admin/header");
		$this->load->view("admin/sidebar");
		$this->load->view("admin/makeuser");
		$this->load->view("admin/footer");
	}
	public function addNewUser(){
		if (!($_POST)) {
			header("Location:".BASE_URL."/User");
		}
		$input = $this->load->validation("Dform");
		$input->post('username');
		$input->post('password');
		$input->post('level');
	
		$tablePost   = "tbl_user";
		$username    = $input->values['username'];
		$password  	 = $input->values['password'];
		$level  	 = $input->values['level'];
		$data = array(
			'username' => $username,
			'password' => $password,
			'level' => $level
			);
		$userModel = $this->load->model("UserModel");
		$result = $userModel->addUser($tablePost, $data);
		$mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "User Created Successfully..";
		} else {
			$mdata['msg'] = "User Not Created";
		}
		$url = BASE_URL."/User/listUser?msg=".urlencode(serialize($mdata));
		header("location:$url");

	}
	public function listUser(){
		
		$tableUser = "tbl_user";
		$userModel = $this->load->model("UserModel");
		$data['users'] = $userModel->userList($tableUser);
		$this->load->view("admin/header");
		$this->load->view("admin/sidebar");
		$this->load->view("admin/userlist", $data);
		$this->load->view("admin/footer");
	}
}





?>