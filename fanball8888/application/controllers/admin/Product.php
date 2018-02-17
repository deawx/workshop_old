<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
    $this->load->model('Product_model','product');
	}

 	function index()
	{
    $post = $this->input->post('post');
    if ($post === 'product')
		{
			$this->product->save_product($this->input->post());
		}
		elseif ($post === 'product_url')
		{
			$this->product->save_product_url($this->input->post());
		}
    $id = $this->input->get('id');
		$category = $this->input->get('category');
		if ( ! $category)
		{
			redirect('admin/product?category=sportbook');
		}
		$data['product'] = $this->product->search_id($id)->row_array();
		$this->table->set_template(array('table_open'=>'<table class="table table-striped table-hover datatable">'));
		if ( ! (int)$id > 0)
		{
			$products = $this->product
				->search(array('category'=>$category))
				->result_array();
			foreach ($products as $_c=>$c)
			{
				$this->table->add_row(
					++$_c,anchor('admin/product?category='.$category.'&id='.$c['id'],$c['name']),$c['detail'],
					$this->db->where('product_id',$c['id'])->count_all_results('user_product'),
					($c['status'] == '0') ? 'ปิดใช้งาน' : 'เปิดใช้งาน'
				);
			}
			$this->table->set_heading(array('ที่','ชื่อผลิตภัณฑ์','ข้อมูลผลิตภัณฑ์','จำนวนแอคเคาท์','สถานะ'));
			$data['products'] = $this->table->generate();
		}
		else
		{
			$data['users'] = $this->db
				->where(array('product_id'=>$id))
				->group_by('user_id')
				->get('user_product')
				->num_rows();
			$data['accounts'] = $this->db
				->where(array('product_id'=>$id))
				->count_all_results('user_product');
			$data['requests']['deposit'] = $this->db
				->join('deposit as dp','dp.user_product_id = up.id')
				->where('up.product_id',$id)
				->count_all_results('user_product as up');
			$data['requests']['withdraw'] = $this->db
				->join('withdraw as wd','wd.user_product_id = up.id')
				->where('up.product_id',$id)
				->count_all_results('user_product as up');
			$last_regis = $this->db
				->select('created')
				->where(array('product_id'=>$id))
				->order_by('id','DESC')
				->get('user_product',1)
				->row_array();
			$data['last_regis'] = ($last_regis['created'])
				? $last_regis['created']
				: '00/00/0000 00:00:00';
			$url = $this->db
				->where('product_id',$id)
				->get('product_url')
				->result_array();
			foreach ($url as $_c=>$c)
			{
				$this->table->add_row(++$_c,$c['url'],form_anchor_delete('admin/product/delete_url/'.$c['id']));
			}
			$this->table->set_heading(array('ที่','ยูอาแอลผลิตภัณฑ์',''));
			$data['product_url'] = $this->table->generate();
		}
		$this->load->view('admin/product',$data);
	}

	function status($id,$status)
	{
		if ( ! (int)$id)
			return FALSE;

		$status = ($status == '0') ? '1' : '0';
		if ($this->db->set(array('status'=>$status))->where('id',$id)->update('product'))
			$this->session->set_flashdata('success','การเปลี่ยนสถานะเสร็จสิ้น');

		redirect($this->agent->referrer());
	}

	function delete_url($id)
  {
    if ($this->product->remove($id,'product_url'))
      $this->session->set_flashdata('warning','ลบลิงค์ผลิตภัณฑ์นี้แล้ว');

    redirect($this->agent->referrer());
  }

  function delete($id)
  {
    if ((int)$id > 0)
		{
			$product = $this->db->where('id',$id)->get('product')->row_array();
			if ($product)
			{
				$this->db->where('id',$id)->delete('product');
				$this->db->where('product_id',$id)->delete('product_url');
				unlink('assets/images/product/'.$product['logo']);
				unlink('assets/images/product/'.$product['picture']);
				$this->session->set_flashdata('info',lang('message_form_success'));
			}
		}
    redirect('admin/product');
  }

}
