<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()  //생성자
	{
		parent::__construct();
		$this->load->model('Board_model');  
	}
	
	public function board_insert(){
		$title = $this->input->post('title');
		$content =  $this->input->post('content');

		$this->Board_model->board_insert($title,$content);

		header("Location: http://127.0.0.1:9001/index.php/board/list");
	}

	public function board_update()
	{
		$id =  $this->input->post("id"); 
		$title =  $this->input->post("title"); 
		$content = $this->input->post("content");

		$this->Board_model->board_update($title,$content,$id);
		
		header("Location: /index.php/board/view?id=".$id);
	}


	public function comment_insert()
	{
		$content =  $this->input->post("content"); 
		$board_id =  $this->input->post("board_id");  

		$this->Board_model->comment_insert($content,$board_id);
		
		header("Location: /index.php/board/view?id=".$board_id);
	}

	public function comment_delete()
	{
		$comment_id =  $this->input->get("comment_id"); 
		$board_id =  $this->input->get("board_id");  

		$this->Board_model->comment_delete($comment_id);
		
		header("Location: /index.php/board/view?id=".$board_id);
	}
}
