<?php

class Form extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Board_model');
    }

    public function index() {
    }

    public function board_insert() {

        // post방식으로 전달된 title, content값 받아오기
        $title = $this->input->post('title');
        $content = $this->input->post('content');

        // 모델에 title, content값을 전달하며 쿼리 수행
        $this->Board_model->board_insert($title, $content);

        // 쿼리 수행하고 나서 list페이지로 이동
        header("Location: http://127.0.0.1:9001/index.php/board/list");
    }

    public function board_update() {

        // post방식으로 전달된 _id, title, content 가져오기
        $_id = $this->input->post('_id');
        $title = $this->input->post('title');
        $content = $this->input->post('content');

        // _id, title, content값으로 모델에 전달하여 업데이트 쿼리 수행
        $this->Board_model->board_update($_id, $title, $content);

        // 쿼리 수행 완료 후 상세보기 화면으로 이동 (_id 방식으로 전달)
        header("Location: http://127.0.0.1:9001/index.php/board/view?id=".$_id);

    }

    public function board_delete() {

        // get방식으로 _id 가져오기
        $_id = $this->input->get('id');

        // _id값을 모델에 전달하여 삭제 쿼리 수행
        $this->Board_model->board_delete($_id);

        // 쿼리 수행 완료 후 리스트 화면으로 이동
        header("Location: http://127.0.0.1:9001/index.php/board/list");
    }

    public function comment_insert() {

        // post 방식으로 게시물의 id, content 가져오기
        $board_id = $this->input->post('board_id');
        $content = $this->input->post('content');
    
        // 게시물의 id, content를 모델에 전달하여 삽입 쿼리 수행
        $this->Board_model->comment_insert($board_id, $content);
    
        // 삽입 쿼리 수행 완료하면 상세 페이지로 이동
        header("Location: http://127.0.0.1:9001/index.php/board/view?id=".$board_id);
    
    }

    public function comment_delete() {

        // get방식으로 댓글의 id, 게시물의 id 가져오기
        $comment_id = $this->input->get('comment_id');
        $board_id = $this->input->get('board_id');

        // 댓글의 id를 모델에 전달하여 삭제 쿼리 수행
        $this->Board_model->comment_delete($comment_id);

        // 삭제 쿼리 수행 완료하면 상세 페이지로 이동
        header("Location: http://127.0.0.1:9001/index.php/board/view?id=".$board_id);
    }

  
}

?>