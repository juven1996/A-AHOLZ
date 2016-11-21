<?php
class Admin_order extends CI_Controller {

    
    const VIEW_FOLDER = 'admin/order';
 
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }
 
    
    public function index()
    {     

        //pagination settings
        $config['per_page'] = 5;

        $config['base_url'] = base_url().'admin/order';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        } 

        //load the view
        $data['main_content'] = 'admin/order/list';
        $this->load->view('includes/template', $data);  

    }//index


}