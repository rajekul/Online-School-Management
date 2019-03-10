<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticemodel extends CI_Model {
	
	public function addNotice($notice)
	{
		$this->db->insert('notice',$notice);
	}
	public function editNotice($notice,$serial)
	{
		$this->db->where('serial',$serial);
		$this->db->update('notice',$notice);
	}
	public function deleteNotice($serial)
	{
		$this->db->where('serial',$serial);
		$this->db->delete('notice');
	}
	
	public function getAll()
	{
		$result = $this->db->get('notice');
		return $result->result_array();
	}
	public function getNotices($viewer)
	{
		$this->db->where('viewer','all');
		$this->db->or_where('viewer',$viewer);
		$result = $this->db->get('notice');
		return $result->result_array();
	}
	public function searchNotices($notice)
	{
		$this->db->like('title',$notice);
		$this->db->or_like('date',$notice);
		$result = $this->db->get('notice');
		return $result->result_array();
	}
	
	
}