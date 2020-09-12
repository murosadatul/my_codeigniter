<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model_setting.php
 * @author Murosadatul Mahmud <murosadatul@gmail.com>
 * @access public
 * @link https://github.com/murosadatul/my_codeigniter/application/models/
 */
class My_model extends CI_Model
{
	/** 
	 * ambil data pengaturan system dari tabel system_setting
     */
	public function get_system()
	{
		$arr   = [];
		$query = $this->db->get('system_setting');
		$data  = $query->result_array();
		if (!empty($data)) {
			foreach ($data as $row) {
				$arr[$row['code']] = $row['value'];
			}
		}
		return $arr;
	}

	/** 
	 * ambil data module dari tabel system_module 
     * @param 
     * type $parent     Parent Code
     */
	public function get_module($parent='')
	{
		if($parent!=NULL OR $parent==''){
			$query = $this->db->query("SELECT sm.module_name, sm.url, sm.icon, sm.order, sm.flag_menu, sm.code, sm.parent FROM system_module sm WHERE ".(($parent=='' OR $parent==NULL) ? " isnull(parent) ": "parent='".$parent."'")."ORDER BY sm.order asc" );
			if($query->num_rows() > 0){
				return $query;
			}
			return false;
		}
		return false;
	}

	/** 
	 * ambil data dari tabel system_privileges
     * @param 
     * type $code     Module Code 
     * type $uid      User Id
     */
	public function get_privileges($code)
	{
		$uid = $this->session->userdata('userid');
		if($code!='')
		{
			$query = $this->db->query("SELECT sp.create, sp.read, sp.update, sp.delete FROM system_privileges sp, system_module sm WHERE sm.id=sp.module_id and sp.group_id = '".$uid."' and sm.code='".$code."'");
			if($query->num_rows() > 0)
			{
				return $query->row_array();
			}
			return false;
		}
		return false;
	}

	/**
	 * get data 
     * @param 
     * type $table     table name
     * type $select    field selected
     * type $where     where
     */
	public function get_data($table,$select='',$where=array())
	{
		if(isset($table)){
			$query = $this->db->select( ( (isset($select)) ? $select : '*' ) );
			if(!empty($where)){foreach ($where as $key => $value) {$query = $this->db->where($key,$value);}}
			$query = $this->db->get($table);
			return $this->num_rows($query);	
		}
		return false;
	}

	/**
     * get rows number
     * @param 
     * type $q      Query
     */
	protected function num_rows($q)
	{
		if(isset($q))
		{
			if($q->num_rows()>0){return $q;}
			return false;
		}
		return false;
	}

	/**
	 * insert or update data
     * @param 
     * type $table     Table Name
     * type $data      Data
     * type $id        Id
     */
    public function insert_update($table,$data=array(),$id=array())
    {
            if(isset($table) && empty(!$data)){return (empty($id)) ? $this->db->insert($table,$data) : $this->db->update($table,$data,$id);}
            return false;
    }

	/**
	 * Delete data 
     * @param 
     * type $table     Table Name  
     * type $id        Id
     */
	public function delete($table,$id=array())
	{
		if(isset($table) && empty(!$id)){return $this->db->delete($table,$id);}
		return false;
	}

	/**
	 * Get Datatable Where Like
     * @param 
     * type $column_search     Column Search (array)
     * type $post_search       Search Value  (string)
     */
	public function like_datatable($column_search=[],$post_search)
	{
		$i = 0;
		if(empty(!$column_search))
		{
			foreach ($column_search as $item)
			{
				if(isset($post_search))
				{
					if($i===0)
					{
						$this->db->group_start(); 
						$this->db->like($item, $post_search);
					}
					else
					{
						$this->db->or_like($item, $post_search);
					}
	
					if(count($column_search) - 1 == $i) 
						$this->db->group_end(); 
				}
				$i++;
			}
		}
	}

	/**
	 * Get Datatable order
     * @param 
     * type $column_order     Column Order (array)
     */
	public function order_datatable($column_order=[])
	{
		if(isset($_POST['order'])) 
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
	}

	/**
	* Get Limit  Datatable
	* @param $length Panjang Row
	* @param $start  Row Awal
	*/
	public function limit_datatable($length, $start)
	{
            if($length != -1){$this->db->limit($length, $start);}
	}
        
        
        public function get_recordsTotal_datatable($data) {
            if($data){return $data->num_rows();}
            return 0;
        }
        
        public function get_recordsFiltered_datatable($data)
        {
            if($data){return $data->num_rows();}
            return 0;
        }
}


/* End of file Model_setting.php */
/* Location: ./application/models/Model_setting.php */