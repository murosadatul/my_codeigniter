<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * MY_Controller.php
 * @author Murosadatul Mahmud <murosadatul@gmail.com>
 * @access public
 * @link https://github.com/murosadatul/my_codeigniter/application/core/
 */
class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->all_setting   = $this->msetting->get_system();
        $this->site_name     = $this->all_setting['site_name'];
        $this->year_dev      = $this->all_setting['year_dev'];
        $this->favicon       = $this->all_setting['favicon'];
        $this->site_logo     = $this->all_setting['site_logo'];
        $this->browser_title = '';
        $this->page_js       = '';
        $this->page_css      = '';
        $this->plugins       = [];

    }

    protected function template($content)
    {
            $data = [
                    'active_page'	 => $this->uri->segment(2),
                    'active_treeview'=> $this->uri->segment(1),
                    'base_url'	     => base_url(),
                    'site_name'	     => $this->site_name,
                    'year_dev'	     => $this->year_dev,
                    'setting'	     => $this->all_setting,
                    'browser_title'	 => $this->browser_title=='' ? $this->site_name : $this->site_name.' - '.$this->browser_title,
                    'favicon'	     => $this->favicon,
                    'site_logo'	     => $this->site_logo,
                    'page_css'	     => $this->page_css,
                    'page_js'	     => $this->page_js,
                    'load_plugins'   => $this->plugins,
                    'main_content'   => $content,
            ];
            $data['navbar'] = $this->parser->parse('theme/navbar', $data, TRUE);//akses navbar
            $data['breadcrumb'] = $this->parser->parse('theme/breadcrumb', $data, TRUE);//akses breadcrumb
            $data['sidebar'] = $this->parser->parse('theme/sidebar', $data, TRUE);//akses breadcrumb
            $this->parser->parse('theme/index', $data);//untuk mengakses template menggunakan library parser
    }
    protected function accesspage($code=''){return $this->msetting->get_privileges($code);}
    protected function accesslogin(){if (empty($this->session->userdata('log_session_sid')) OR ($this->session->userdata('user_id')!=decrypt('USERSESS',$this->session->userdata('SESSUSER'))) ) {return redirect('login');}}
    protected function get_sess_userid(){return decrypt('USERSESS',$this->session->userdata('user_id'));}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
