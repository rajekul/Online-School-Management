<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccountingModel extends CI_Model {
	
	public function addFee($fee)
	{
		$this->db->insert('fees',$fee);
		return $this->db->insert_id();
	}
	public function addPayment($payment)
	{
		$this->db->insert('studentpayment',$payment);
		//return $this->db->insert_id();
	}
	public function addSingleFee($fee)
	{
		$this->db->insert('singlefee',$fee);
	}
	public function addStudentFee($studentfee)
	{
		$this->db->insert('studentfees',$studentfee);
	}
	public function editFee($fee,$feeid)
	{
		$this->db->where('feeid',$feeid);
		$this->db->update('fees',$fee);
	}
	public function addMonthlyFee($fee)
	{
		$this->db->insert('monthlyfees',$fee);
	}
	public function addAdmisssionFee($fee)
	{
		$this->db->insert('admissionfee',$fee);
	}
	public function editMonthlyFee($fee,$classid)
	{
		$this->db->where('classid',$classid);
		$this->db->update('monthlyfees',$fee);
	}
	public function updateMonthlyFee($classid,$fee)
	{
		$this->db->where('classid',$classid);
		$this->db->update('monthlyfees',$fee);
	}
	public function editAdmissionFee($fee,$serial)
	{
		$this->db->where('serial',$serial);
		$this->db->update('admissionfee',$fee);
	}
	public function deleteFee($feeid)
	{
		$this->db->where('feeid',$feeid);
		$this->db->delete('fees');
		$this->db->where('feeid',$feeid);
		$this->db->delete('studentfees');
	}
	public function deleteAdmissionFee($serial)
	{
		$this->db->where('serial',$serial);
		$this->db->delete('admissionfee');
	}
	
	public function getAllFees($month)
	{
		$this->db->join('class','fees.classid=class.classid');
		$this->db->like('date',$month,'after');
		$result = $this->db->get('fees');
		return $result->result_array();
	}
	public function getMonthlyFees()
	{
		$this->db->join('class','monthlyfees.classid=class.classid');
		$result = $this->db->get('monthlyfees');
		return $result->result_array();
	}
	public function getAllAdmissionFee()
	{
		$result = $this->db->get('admissionfee');
		return $result->result_array();
	}
	public function getClassMonthlyFee($classid,$month)
	{
		$this->db->where('classid',$classid);
		$this->db->where('month',$month);
		$result = $this->db->get('monthlyfees');
		return $result->row_array();
	}
	public function getFeeByStudent($sid)
	{
		$this->db->join('fees','studentfees.feeid=fees.feeid');
		$this->db->select_sum('amount');
		$this->db->where('sid',$sid);
		$result = $this->db->get('studentfees');
		return $result->row_array();
	}
	public function getSingleFeeByStudent($sid)
	{
		
		$this->db->select_sum('fee');
		$this->db->where('sid',$sid);
		$result = $this->db->get('singlefee');
		return $result->row_array();
	}
	public function getPaymentByStudent($sid)
	{
		$this->db->select_sum('amount');
		$this->db->where('sid',$sid);
		$result = $this->db->get('studentpayment');
		return $result->row_array();
	}
	public function getAllPayments()
	{
		$this->db->join('studentinfo','studentpayment.sid=studentinfo.sid');
		$result = $this->db->get('studentpayment');
		return $result->result_array();
	}
	public function getStudentPayments($sid)
	{
		$this->db->where('sid',$sid);
		$result = $this->db->get('studentpayment');
		return $result->result_array();
	}
	public function getStudentFees($sid)
	{
		
		$this->db->join('fees','studentfees.feeid=fees.feeid');
		$this->db->where('studentfees.sid',$sid);
		$result = $this->db->get('studentfees');
		return $result->result_array();
	}
	public function getStudentOtherFees($sid)
	{
		$this->db->join('singlefee','studentfees.sid=singlefee.sid');
		$this->db->where('studentfees.sid',$sid);
		$result = $this->db->get('studentfees');
		return $result->result_array();
	}
	//////Expenses.............................................................................
	
	
	public function addExpenses($expense)
	{
		$this->db->insert('expenses',$expense);
	}
	public function getExpenses()
	{
		$result = $this->db->get('expenses');
		return $result->result_array();
	}
	
	public function getTotalExpense()
	{
		$this->db->select_sum('amount');
		$result = $this->db->get('expenses');
		return $result->row_array();
	}
	public function getTotalPayment()
	{
		$this->db->select_sum('amount');
		$result=$this->db->get('studentpayment');
		return $result->row_array();
	}
	

	
}