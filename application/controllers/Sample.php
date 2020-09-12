<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sample.php
 * @author Murosadatul Mahmud <murosadatul@gmail.com>
 * @access public
 * @link https://github.com/murosadatul/my_codeigniter/application/controllers/
 */
class Sample extends MY_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('my_model');
            //Do your magic here
    }

    public function index() //dashboard
    {           
        // Tempusdominus Bbootstrap 4 -->
        $this->page_css = my_plugin_css('tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');
        // iCheck -->
        $this->page_css .= my_plugin_css('icheck-bootstrap/icheck-bootstrap.min.css');
        // JQVMap -->
        $this->page_css .= my_plugin_css('jqvmap/jqvmap.min.css');
        // Theme style -->
        $this->page_css = my_css('adminlte.min.css');
        // overlayScrollbars -->
        $this->page_css .= my_plugin_css('overlayScrollbars/css/OverlayScrollbars.min.css');
        // Daterange picker -->
        $this->page_css .= my_plugin_css('daterangepicker/daterangepicker.css');
        // summernote -->
        $this->page_css .= my_plugin_css('summernote/summernote-bs4.css');

        // ChartJS -->
        $this->page_js = my_plugin_js('chart.js/Chart.min.js');
        // Sparkline -->
        $this->page_js .= my_plugin_js('sparklines/sparkline.js');
        // JQVMap -->
        $this->page_js .= my_plugin_js('jqvmap/jquery.vmap.min.js');
        $this->page_js .= my_plugin_js('jqvmap/maps/jquery.vmap.usa.js');
        // jQuery Knob Chart -->
        $this->page_js .= my_plugin_js('jquery-knob/jquery.knob.min.js');
        // daterangepicker -->
        $this->page_js .= my_plugin_js('moment/moment.min.js');
        $this->page_js .= my_plugin_js('daterangepicker/daterangepicker.js');
        // Tempusdominus Bootstrap 4 -->
        $this->page_js .= my_plugin_js('tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');
        // Summernote -->
        $this->page_js .= my_plugin_js('summernote/summernote-bs4.min.js');
        //load js
        $this->page_js .= my_js('pages/dashboard.js'); //panggil fungsi my_js dari my_helper

        $data=[];
        // load main content
        $main = $this->parser->parse('sample/dashboard', $data, TRUE);
        // load template
        $this->template($main);
    }
    public function form_general()//form general
    {
            $data   = [];
            $this->page_js = my_js('pages/form_general.js');//panggil fungsi my_js dari my_helper
            // load plugins
            $this->plugins  = [PLUG_CUSTOMFILEINPUT];
            $main = $this->parser->parse('sample/form_general', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    public function form_advanced()//form advanced
    {
            $data   = [];
            // $this->page_js  = my_js('demo.js');
            $this->page_js  = my_js('pages/form_advanced.js');//panggil fungsi my_js dari my_helper
            // load plugins
            $this->plugins  = [PLUG_DATERANGEPICKER,PLUG_SELECT2,PLUG_ICHECK,PLUG_TEMPUSDOMINUS,PLUG_DATEPICKER,PLUG_COLORPICKER,PLUG_DUALLISTBOX,PLUG_INPUTMASK,PLUG_SWITCH];
            $main = $this->parser->parse('sample/form_advanced', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    public function form_validation()//form validation
    {
            $data   = [];
            $this->page_js = my_js('pages/form_validation.js');//panggil fungsi my_js dari my_helper
            // load plugins
            $this->plugins  = [PLUG_JQUERYVALIDATION];
            $main = $this->parser->parse('sample/form_validation', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    public function form_editor()//form editor
    {
            $data   = [];
            $this->page_js = my_js('pages/form_editor.js');//panggil fungsi my_js dari my_helper
            // load plugins
            $this->plugins  = [PLUG_SUMMERNOTE];
            $main = $this->parser->parse('sample/form_editor', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    public function modal()//modals & alerts
    {
            $data   = [];
            $this->page_js = my_js('pages/modal.js');//panggil fungsi my_js dari my_helper
            // load plugins
            $this->plugins  = [PLUG_SWEETALERT,PLUG_TOASTR];
            $main = $this->parser->parse('sample/modal', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    public function simpletable()//simple tabel
    {
            $data   = [];
            // $this->page_js = my_js('pages/modal.js');//panggil fungsi my_js dari my_helper
            // load plugins
            // $this->plugins  = [];
            $main = $this->parser->parse('sample/simpletabel', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    public function datatable()//data tabel
    {
            $data = ['accesspage'=>$this->accesspage('datatable'),'datatable'=>['1','2','3']];
            $this->page_js = my_js('pages/datatable.js');//panggil fungsi my_js dari my_helper
            // load plugins
            $this->plugins  = [PLUG_DATATABLE];
            $main = $this->parser->parse('sample/datatable', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    public function jsgrid()//jsgrid 
    {
            $data   = [];
            $this->page_js = my_js('pages/jsgrid.js');//panggil fungsi my_js dari my_helper
            // load plugins
            $this->plugins  = [PLUG_JSGRID];
            $main = $this->parser->parse('sample/jsgrid', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    public function fullcalendar()//fullcalendar
    {
            $data   = [];
            $this->page_js = my_js('pages/fullcalendar.js');//panggil fungsi my_js dari my_helper
            // load plugins
            $this->plugins  = [PLUG_JQUERYUI,PLUG_FULLCALENDAR];
            $main = $this->parser->parse('sample/fullcalendar', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    public function chartjs()//chartjs
    {
            $data   = [];
            $this->page_js = my_js('pages/chartjs.js');//panggil fungsi my_js dari my_helper
            // load plugins
            $this->plugins  = [PLUG_CHARTJS];
            $main = $this->parser->parse('sample/chartjs', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    public function chartflot()//chartflot
    {
            $data   = [];
            $this->page_js = my_js('pages/chartjs.js');//panggil fungsi my_js dari my_helper
            $this->plugins  = [PLUG_CHARTJS]; /*load data  plugins in array*/
            $main = $this->parser->parse('sample/chartjs', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    public function chartinline()//chartjs
    {
            $data   = [];
            $this->page_js = my_js('pages/chartjs.js');//panggil fungsi my_js dari my_helper
            // load plugins
            $this->plugins  = [PLUG_CHARTJS];
            $main = $this->parser->parse('sample/chartjs', $data, TRUE);
            $this->template($main);//panggil fungsi template di /core/my_controller
    }
    
    public function user()
    {
        $data   = [];
        $this->page_js = my_js('pages/exampleuser.js');
        $this->plugins  = [PLUG_DATATABLE]; /* Link Refence defined Plugins https://github.com/my_codeigniter/application/constants.php*/
        $main = $this->parser->parse('user', $data, TRUE);
        $this->template($main);
    }

    public function list_datatable_serverside()
    {
        $getData = $this->mymodel->_get_user(true);
        $data=[]; $total=0;
        if($getData){
            foreach ($getData->result() as $obj) {
                    $this->encryptbap->generatekey_once("USER"); /*Link Refence https://github.com/basit-adhi/MyCodeIgniterLibs/blob/master/libraries/Encryptbap.php*/
                    $id = $this->encryptbap->encrypt_urlsafe($obj->id, "json");
                    $row = [];
                        $row[] = $obj->user_name;
                        $row[] = '<a type="button" id="example" i="'.$id.'" href="javascript:void(0);" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modaledit"><i class="fa fa-cog" ></i> Edit</a>';
                    $data[] = $row;
                }
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->my_model->get_recordsTotal_user(),
            "recordsFiltered" => $this->my_model->get_recordsFiltered_user(),
            "data" => $data,
        );
        echo json_encode($output);
    }

}

/* End of file Sample.php */
/* Location: ./application/controllers/Sample.php */