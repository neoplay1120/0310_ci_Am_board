<?php

class Board extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Board_model');
    } 

    public function index() {
        $this->list();
    }

    public function list() {

        $search = $this->input->get('search');
        
        // 현재 페이지 가져오기
        $now_page = $this->uri->segment(3);
        // 전체글 개수 가져오기
        $result_count = $this->Board_model->list_total($search);
        // 리스트 값 가져오기
        $result_list = $this->Board_model->list_select($now_page,$search);
    
    
        // pagenation 시작
        $this->load->library('pagination');
        $config['base_url'] = 'http://127.0.0.1:9001/index.php/board/list';
        $config['total_rows'] = $result_count->cnt;
        $config['per_page'] = 10;
        $config['num_links'] = 5;
        $config['first_link'] = '처음으로';
        $config['last_link'] = '끝으로';
        $config['reuse_query_string'] = TRUE;
        $this->pagination->initialize($config);
        // pagenation 끝
        
        
        $data['page_nation'] = $this->pagination->create_links();
        $data['list'] = $result_list;
        $data['search'] = $search;
    
        $this->load->view('board/list', $data);
    }

    public function input() {
        $this->load->view('board/input');
    }

    public function update() {

        // id값 가져오기
        $id = $this->input->get('id');
    
        // id를 가지고 모델의 view_select메서드를 호출하여 기존 값 불러오기
        // 기존에 작성했던 코드의 재사용
        $result = $this->Board_model->view_select($id);
    
        // 쿼리 수행 결과값을 배열에 저장하고 뷰에 전달하며 뷰 호출
        $data['result'] = $result;
        $this->load->view('board/update', $data);
    }

    public function view() {

        // id값 가져오기
        $id = $this->input->get('id');
    
        // id값을 가지고 모델 호출
        $result = $this->Board_model->view_select($id);
        
        // 모델 메서드(쿼리 수행) 결과값을 뷰에 전달하며 뷰 호출
        $data['result'] = $result;
        $this->load->view('board/view', $data);
        $this->comment_list($id);
        
    }

    private function comment_list($board_id) {

        $data['result'] = $result = $this->Board_model->comment_list($board_id);
        $data['board_id'] = $board_id;
    
        $this->load->view('comment/list', $data);
    
    }


}

?>