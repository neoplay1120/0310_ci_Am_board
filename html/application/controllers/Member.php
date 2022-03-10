<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()  //생성자
	{
		parent::__construct();
		$this->load->model('Board_model');  
		$this->load->library('session');
	}

    
	public function index()
	{
		echo "회원 프로그램";
	} 

	public function input(){
 		$data['msg'] = $this->input->get("msg");
		$this->load->view('member/input',$data);
	}

	public function insert(){
		$email =  $this->input->post("email"); 
		$password = $this->input->post("password");
		$password = md5($password);
 
		$result = $this->Board_model->member_insert($email,$password);

		if($result == true)
		{
			header("Location: /index.php/member/login");
		}
		else {
			header("Location: /index.php/member/input?msg=이미 사용 중입니다.");
		}
	}

	public function login(){
		
		$this->session->sess_destroy(); // 세션 삭제
		$this->load->view("member/login");
	}

	public function update(){
		echo "회원정보수정";
	}

	public function session()
	{
		$email = $this->input->post("email"); 
		$password = $this->input->post("password");
		$password = md5($password);

		$result = $this->Board_model->login_select($email,$password);

		if(isset($result->_id))
		{
			$newdata = array( 
				'email'     => $email,
				'_id' 		=> $result->_id
			);

			$this->session->set_userdata($newdata);
            // 이 부분은 세션을 적용하겠다는 말 'set_userdata' 세션을 적용하겠습니다.

			header("Location: /index.php/board/list");
		}
		else
		{ 
			header("Location: /index.php/member/login");
		}
	}
}