<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Login.php
 * @author Murosadatul Mahmud <murosadatul@gmail.com>
 * @access public
 * @link https://github.com/murosadatul/my_codeigniter/application/controllers/
 */
class Login extends MY_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->helper(['form']);
            $this->load->model('model_master','mmaster');/*load model master*/

    }
    //Mahmud, clear
    public function index() //dashboard
    {
            // $this->generate_sidebar_menu();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username','required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                    // siapkan data pengaturan
                    $data = [
                            'base_url'	     => base_url(),
                            'site_name'	     => $this->site_name,
                            'year_dev'	     => $this->year_dev,
                            'setting'	     => $this->all_setting,
                            'browser_title'	 => $this->site_name.'-Login',
                            'favicon'	     => $this->favicon,
                            'site_logo'	     => $this->site_logo,
                    ];
                    $main = $this->parser->parse('theme/login', $data);
            }
            else
            {
                    $this->auth();
            }
    }
    /**
     * authentication username and password
     */
    private function auth()
    {
            $dtauth = $this->msetting->get_data('system_user','username,password,id',['username'=>sql_clean($this->input->post('username')) ]);		

            if($dtauth)
            {
                    $dtlog=$dtauth->row_array();
                    if( password_verify($this->input->post('password'),$dtlog['password']) )
                    {
                            $this->session->set_userdata('userid',$dtlog['id']);
                            $this->generate_sidebar_menu($dtlog['id']);
                            redirect('sample');
                    }
                    $this->session->set_userdata('errorlog','Gagal login.');
                    redirect('login');
            }
            $this->session->set_userdata('errorlog','Gagal login.');
            redirect('login');	
    }

    private function generate_sidebar_menu()
    {
            if( empty($this->session->userdata('sidebar')) ){
                    $query=$this->msetting->get_module();
                    $arr_menu=[];
                    if($query) {
                            foreach ($query->result() as $obj) {
                                    $arr_menu[]= ['module_name'=>$obj->module_name,'url'=>$obj->url,'icon'=>$obj->icon,'order'=>$obj->order,'flag_menu'=>$obj->flag_menu,'code'=>$obj->code,'parent'=>$obj->parent];
                                    $query_child = $this->msetting->get_module($obj->code);
                                    if($query_child) {
                                            foreach ($query_child->result() as $obj) {
                                                    $arr_menu[]= ['module_name'=>$obj->module_name,'url'=>$obj->url,'icon'=>$obj->icon,'order'=>$obj->order,'flag_menu'=>$obj->flag_menu,'code'=>$obj->code,'parent'=>$obj->parent];	
                                            }	
                                    }
                            }
                    }
                    return $this->session->set_userdata('sidebar',$arr_menu);
            }
            return true;
    }
    //Mahmud, clear
    public function logout()
    {
            $this->session->sess_destroy();
            redirect('login');
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */