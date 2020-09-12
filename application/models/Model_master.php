<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_master extends Model_setting{

	/**------------------------------------------------------------ */
	/* USER SID */
	public function get_usersid()
	{
		 $query = $this->db->select('up.id, up.profile_nickname, sg.group_name, nj.jabatan_name')
		 ->join('user_pegawai upeg','upeg.user_profile_id=up.id')
		 ->join('neutron_jabatan nj','nj.id=upeg.jabatan_id')
		 ->join('system_group sg','sg.id=up.group_id')
		 ->get('user_profile up');

		if($query->num_rows() > 0){
			return $query;
		}
		return false;
	}

	public function _get_usersid($limit=false)
	{
		$column = ['up.profile_nickname','sg.group_name','nj.jabatan_name'];
		$this->like_datatable($column,$_POST['search']);
		$this->order_datatable($column);
		if($limit){$this->limit_datatable($_POST['length'],$_POST['start']);}
		return $this->get_usersid();
	}
        public function get_recordsTotal_usersid(){return $this->get_recordsTotal_datatable($this->get_usersid());}
	public function get_recordsFiltered_usersid(){return $this->get_recordsFiltered_datatable($this->_get_usersid());}
	
	public function check_username()
	{
		return $this->get_data('system_user','username',['username'=>sql_clean($this->input->post('username'))]);
	}
	public function check_email()
	{
		return $this->get_data('user_profile','profile_email',['profile_email'=>sql_clean($this->input->post('email'))]);
	}
	/**End USER SID */
	/**------------------------------------------------------------ */
        
        /**------------------------------------------------------------ */
	/* PENGATURAN GRUP USER*/
	public function get_grupuser()
	{
		 $query = $this->db->select('sg.id, sg.group_name')->get('system_group sg');
		if($query->num_rows() > 0){
			return $query;
		}
		return false;
	}

	public function _get_grupuser($limit=false)
	{
		$column = ['sg.group_name'];
		$this->like_datatable($column,$_POST['search']);
		$this->order_datatable($column);
		if($limit){$this->limit_datatable($_POST['length'],$_POST['start']);}
		return $this->get_grupuser();
	}
	public function get_recordsTotal_grupuser(){return $this->get_recordsTotal_datatable($this->get_grupuser());}
	public function get_recordsFiltered_grupuser(){return $this->get_recordsFiltered_datatable($this->_get_grupuser());}
        /**End GRUP USER */
	/**------------------------------------------------------------ */
        
        /**------------------------------------------------------------ */
	/* PENGATURAN MODULE*/
	public function get_settingmodule()
	{
		$query = $this->db->select('sm.module_name, sm.id')->get('system_module sm');
		if($query->num_rows() > 0){
			return $query;
		}
		return false;
	}

	public function _get_settingmodule($limit=false)
	{
		$column = ['sm.module_name'];
		($_POST['search']['regex']) ? $this->like_datatable($column,$_POST['search']['value']) : '';
		$this->order_datatable($column);
		if($limit){$this->limit_datatable($_POST['length'],$_POST['start']);}
		return $this->get_settingmodule();
	}
	public function get_recordsTotal_settingmodule(){return $this->get_recordsTotal_datatable($this->get_settingmodule());}
	public function get_recordsFiltered_settingmodule(){return $this->get_recordsFiltered_datatable($this->_get_settingmodule());}
        /**End GRUP USER */
	/**------------------------------------------------------------ */
        

}



/* End of file Model_master.php */
/* Location: ./application/models/Model_master.php */