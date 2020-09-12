<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * my_helper.php
 * @author Murosadatul Mahmud <murosadatul@gmail.com>
 * @access public
 * @link https://github.com/murosadatul/my_codeigniter/application/helpers/
 */
	// load file javascript
	function my_js($url){return '<script src="'.base_url().'assets/js/'.$url.'"></script>';}
	// load file css
	function my_css($url){return '<link rel="stylesheet" href="'.base_url().'assets/css/'.$url.'">';}
        // load file javascript
	function my_plugin_js($url){return '<script src="'.base_url().'assets/plugins/'.$url.'"></script>';}
	// load file css
	function my_plugin_css($url){return '<link rel="stylesheet" href="'.base_url().'assets/plugins/'.$url.'">';}
	/**
	 * Notifikasi success atau error
	 * @param
	 * $status     Status Notifikasi   => success, error, warning, info
	 * $message    Pesan Notifikasi    
	 * $mode       Mode Notifikasi     => js/default('')
	 */
	function notification_success_error($result,$msg_success,$msg_error,$mode='')
	{
		if($mode=='js'){
			echo json_encode(($result) ? ['status' => 'success', 'message' => $msg_success] : ['status' => 'error', 'message' => $msg_error]); 
		}else{
			$CI =& get_instance();
			$CI->session->set_flashdata('message', ( ($result) ? ['status'=> 'success','message'=>$msg_success]  : ['status'=> 'error','message'=>$msg_error] ));
		}
	}
	/**
	 * Notifikasi
	 * @param
	 * $status     Status Notifikasi   => success, error, warning, info
	 * $message    Pesan Notifikasi    
	 * $mode       Mode Notifikasi     => js/default('')
	 */
	function notification($status,$message,$mode='')
	{
		if($mode=='js'){
			echo json_encode(['status'=> $status,'message'=>$message]);
		}else{
			$CI =& get_instance();
			$CI->session->set_flashdata('message',['status'=> $status,'message'=>$message]);
		}	
	}
	/**
     * Decrypt cipher text, all information loaded from session with given name
     * @param string $name          name of the encryption in session. IMPORTANT: if use moresecure mode, 1 name for 1 encrypt-decrypt, because every encrypt will generate unique tag
     * @param string $ciphertext    text to decrypt
     * @return string original text
     */
	function encrypt($name, $ciphertext)
	{
		$CI =& get_instance();
		$CI->encryptbap->generatekey_once($name);
		$result = $CI->encryptbap->encrypt_urlsafe($ciphertext, "json");
		return $result;
	}
	/**
     * Decrypt cipher text, all information loaded from session with given name
     * @param string $name          name of the encryption in session. IMPORTANT: if use moresecure mode, 1 name for 1 encrypt-decrypt, because every encrypt will generate unique tag
     * @param string $ciphertext    text to decrypt
     * @return string original text
     */
	function decrypt($name, $ciphertext)
	{
		$CI =& get_instance();
		$result = json_decode($CI->encryptbap->decrypt_urlsafe($name, $ciphertext));
		return $result;
	}

	function ifnull($input, $alternative)
	{
			return (!isset($input) || is_null($input) || trim($input) == "" || trim($input) == "undefined" || trim($input) == "null") ? $alternative : $input;
	}

	function replace_name_file($text='')
	{
		$find = strripos($text, '.');
		$hasil1 = substr($text, 0,$find);
		$rplc1 = preg_replace('/[^a-zA-Z0-9]/','_', $hasil1);
		$rplc2 = preg_replace('/_+/', '_', $rplc1);

		if (strlen($rplc2)>10) {
			$rplc2 = substr($rplc2, 0,10);
			if (strlen($rplc2)==strripos($rplc2,'_')+1) {
				$rplc2 = substr($rplc2, 0,strripos($rplc2,'_'));
			}
		}

		$hasil2 = substr($text, $find);
		$hasil_rplc = $rplc2.$hasil2;
		return $hasil_rplc;
	}

	function random_text($length=10)
	{
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$count = mb_strlen($chars);

		for ($i = 0, $result = ''; $i < $length; $i++) {
			$index = rand(0, $count - 1);
			$result .= mb_substr($chars, $index, 1);
		}
		// $result = enkripsi($result);
		return $result;
	}

	function upload_file($name='',$path='', $option_config=array())
	{
		$CI =& get_instance();

		$arr = array();
		$get_nama = replace_name_file($_FILES[$name]['name']);

		$new_name = date('Ymd').$get_nama;

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
		$config['file_name'] = $new_name;
		$config['max_size']  = '0';
		$config['max_width']  = '0';

		if (!empty($option_config)) {
			foreach ($option_config as $key => $value) {
				$option_config[$key] = $value;
			}
		}
		
		$CI->load->library('upload', $config);
		
		if ($CI->upload->do_upload($name)) {
			$data = array('upload_data' => $CI->upload->data());
			$file_name = $data['upload_data']['file_name'];
			$arr = array(
				'error'	=> false,
				'file_name' => $file_name
			);
		} else {
			$arr = array('error' => $CI->upload->display_errors());
			// return false;
		}
		return $arr;
	}
	
	function label_status($status)
	{
		$label = ['draft'=>'label-default','reject'=>'label-danger','review'=>'label-primary','approve'=>'label-success'];
		return $label[$status];
	}
	function status($status)
	{
		$sts = ['draft'=>'Belum Dikirim','reject'=>'Ditolak','review'=>'Proses','approve'=>'Diterima'];
		return $sts[$status];
	}
	function enum_jumlahpeserta($jumlah)
	{
		$hasil = ['perorangan'=>'Perorangan/Double','beregu'=>'Beregu(2-11)','massal'=>'Massal'];
		return $hasil[$jumlah];
	}

	function sql_clean($value)
	{
		$relpace = str_replace("'","", htmlspecialchars($value, ENT_QUOTES));
		return $relpace;
	}
	function xss_clean($string)
	{
            $result = htmlentities($string,ENT_QUOTES,'UTF-8');
	}
    /**
     * Create My Modal
     * @param type $id Modal Id
     * @param type $class Modal Class (sm,lg,xl)
     * @param type $title Modal Title
     * @param type $action Modal Action
     * @param type $body Modal Body
     */
    function create_mymodal($id,$class,$title,$action,$body)
    {
        echo '<div class="modal static fade" id="'.$id.'">'
                .'<div class="modal-dialog '.$class.'">'
                .'<div class="modal-content">'
                .'    <div class="modal-header">'
                .'      <h4 class="modal-title">'.$title.'</h4>'
                .'      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                .'    </div>'
                .'    <div class="modal-body">'.$body.'</div>'
                .'    <div class="modal-footer"><button type="button" class="btn btn-primary" >Simpan</button><button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>'
                .'    </div>'
                .'  </div>'
                .'</div>'
            .'</div>';
    }
    /**
     * Create My Modal
     * @param type $id Table Id
     * @param type $class Table Class
     * @param type $header Table Header
     * @param type $body Table Body
     */
    function create_mytable($id,$header,$class='',$body='')
    {
        $table = '<table id="'.$id.'" class="table table-bordered table-hover dt-responsive '.((isset($class)) ? $class : '' ) .'"><thead><tr>';
        if(isset($header)){foreach ($header as $value){ $table.='<th>'.$value.'</th>';}}
        $table .= '</tr></thead><tbody>'.$body.'</tbody></table>';
        echo $table;
    }


/* End of file my_helper.php */
/* Location: ./application/helpers/my_helper.php */