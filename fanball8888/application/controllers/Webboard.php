<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webboard extends Public_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('table');
		$this->load->helper('smiley');
		$this->load->helper('typography');
		$image_array = get_clickable_smileys(base_url().'smileys','smiley');
		$col_array = $this->table->make_columns($image_array,4);
		$this->data['smiley_table'] = $this->table->generate($col_array);
		$this->load->model('Webboard_model','webboard');
	}

	function index()
	{
		$offset = ($this->input->get('p') > 0) ? $this->input->get('p') : '0';
		$this->load->library('pagination');
		$this->db->where_in('status',array('1','2','3'));
		$config	= array(
			'base_url' => site_url(uri_string()),
			'total_rows' => $this->db->count_all_results('webboard_topic'),
			'per_page' => 15
		);
		$this->pagination->initialize($config);
		$topic = $this->db
			->select('wt.id,wt.user_id,wt.title,wt.datetime,wt.views,wt.comments,wt.status,us.picture,us.username')
			->join('user as us','us.id = wt.user_id')
			->limit($config['per_page'])
			->offset($offset);
		$this->data['topic'] = $topic
			// ->where_in('wt.status',array('0','1','2'))
			->order_by('wt.id','DESC')
			->get('webboard_topic as wt')
			->result_array();
		$this->data['pinned'] = $this->db
			->select('wt.id,wt.user_id,wt.title,wt.datetime,wt.views,wt.comments,wt.status,us.picture,us.username')
			->join('user as us','us.id = wt.user_id')
			->order_by('wt.status','DESC')
			->order_by('wt.id','DESC')
			->where_not_in('wt.category_id',array('5','6'))
			->where_in('wt.status',array('3','4','5'))
			->get('webboard_topic as wt')
			->result_array();
		$this->data['game'] = $this->db
			->select('wt.id,wt.user_id,wt.title,wt.datetime,wt.views,wt.comments,wt.status,us.picture,us.username')
			->join('user as us','us.id = wt.user_id')
			->where('wt.status !=','2')
			->where_in('wt.category_id',array('5','6'))
			->order_by('wt.id','DESC')
			->get('webboard_topic as wt')
			->result_array();
		$prefs = array(
			'start_day' => 'sunday',
			'template' => '
	      {table_open}<table class="table table-bordered" border="0" cellpadding="0" cellspacing="0">{/table_open}
	      {heading_row_start}<tr class="alert alert-success">{/heading_row_start}
	      {heading_previous_cell}<th class="text-center"><a href="{previous_url}"><i class="fa fa-lg fa-caret-left"></i></a></th>{/heading_previous_cell}
	      {heading_title_cell}<th class="text-center" colspan="{colspan}">{heading}</th>{/heading_title_cell}
	      {heading_next_cell}<th class="text-center"><a href="{next_url}"><i class="fa fa-lg fa-caret-right"></i></a></th>{/heading_next_cell}
	      {heading_row_end}</tr>{/heading_row_end}
	      {week_row_start}<tr class="text-center">{/week_row_start}
	      {week_day_cell}<td>{week_day}</td>{/week_day_cell}
	      {week_row_end}</tr>{/week_row_end}
	      {cal_row_start}<tr class="text-center">{/cal_row_start}
	      {cal_cell_start}<td>{/cal_cell_start}
	      {cal_cell_start_today}<td class="today">{/cal_cell_start_today}
	      {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
	      {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
	      {cal_cell_content_today}<div class="active"><a href="{content}">{day}</a></div>{/cal_cell_content_today}
	      {cal_cell_no_content}{day}{/cal_cell_no_content}
	      {cal_cell_no_content_today}<div class="active">{day}</div>{/cal_cell_no_content_today}
	      {cal_cell_blank}&nbsp;{/cal_cell_blank}
	      {cal_cell_other}{day}{/cal_cel_other}
	      {cal_cell_end}</td>{/cal_cell_end}
	      {cal_cell_end_today}</td>{/cal_cell_end_today}
	      {cal_cell_end_other}</td>{/cal_cell_end_other}
	      {cal_row_end}</tr>{/cal_row_end}
	      {table_close}</table>{/table_close}
		');
		$this->load->library('calendar',$prefs);
		$this->data['category'] = $this->db->order_by('sort','ASC')->get('webboard_category')->result_array();
		$this->load->view('webboard',$this->data);
	}

	function save_topic($id='')
	{
		$post = $this->input->post();
		if ($post)
		{
			$this->webboard->save_topic($post);
		}
		$category = $this->db->get('webboard_category')->result_array();
		$this->data['category'] = array(''=>lang('form_choose'));
		foreach ($category as $c)
		{
			$this->data['category'][$c['id']] = $c['name'];
		}
		if ((int)$id > 0)
		{
			$this->data['save_topic'] = $this->db
				->select('wt.*,us.picture,us.username')
				->join('user as us','us.id = wt.user_id')
				->where('wt.id',$id)->get('webboard_topic as wt')
				->row_array();
		}
		else
		{
			$this->load->helper('captcha');
			$captcha = recaptcha();
			$this->session->set_flashdata('captcha',$captcha['word']);
			$this->data['captcha'] = create_captcha($captcha);
		}
		$this->load->view('topic',$this->data);
	}

	function save_comment($id='')
	{
		$post = $this->input->post();
		if ($post)
		{
			if ($this->webboard->save_comment($post) === TRUE)
			{
				$this->session->set_flashdata('success',lang('message_form_success'));
			}
			else
			{
				$this->session->set_flashdata('warning',lang('message_form_warning'));
			}
			redirect('webboard/view_topic/'.$post['webboard_topic_id']);
		}
		if ((int)$id > 0)
		{
			$this->load->helper('captcha');
			$captcha = recaptcha();
			$this->session->set_flashdata('captcha',$captcha['word']);
			$this->data['captcha'] = create_captcha($captcha);
			$this->data['save_comment'] = $this->db->where('id',$id)->get('webboard_comment')->row_array();
			$this->load->view('comment',$this->data);
		}
		else
		{
			redirect('webboard');
		}
	}

	function view_category($id='')
	{
		$id = ((int)$id > 0) ? $id : '';
		$this->load->library('pagination');
		$offset = ($this->input->get('p') > 0) ? $this->input->get('p') : '0';
		$config = array(
			'base_url' => site_url(uri_string()),
			'per_page' => 20
		);
		if ((int)$id > 0)
		{
			$config['total_rows']	= $this->db->where('category_id',$id)->count_all_results('webboard_topic');
		}
		else
		{
			$config['total_rows']	= $this->db->count_all_results('webboard_topic');
		}
		$this->db
			->select('wt.id,wt.user_id,wt.title,wt.datetime,wt.views,wt.comments,wt.status,us.picture,us.username')
			->join('user as us','us.id = wt.user_id')
			->limit($config['per_page'])
			->offset($offset)
			->order_by('wt.status','DESC')
			->order_by('wt.id','DESC');
		if ((int)$id > 0)
		{
			$this->db->where('wt.category_id',$id);
		}
		$this->data['topic'] = $this->db->get('webboard_topic as wt')->result_array();
		$this->data['category'] = $this->db->select('name')->where('id',$id)->get('webboard_category')->row_array();
		$this->pagination->initialize($config);
		$this->load->view('topic_category',$this->data);
	}

	function view_search()
	{
		$search = $this->input->get('search');
		$this->load->library('pagination');
		$offset = ($this->input->get('p') > 0) ? $this->input->get('p') : '0';
		$config = array(
			'base_url' => site_url(uri_string()),
			'total_rows' => $this->db->count_all_results('webboard_topic'),
			'per_page' => 20
		);
		$this->db
			->select('wt.id,wt.user_id,wt.title,wt.datetime,wt.views,wt.comments,wt.status,us.picture,us.username')
			->join('user as us','us.id = wt.user_id')
			->limit($config['per_page'])
			->offset($offset)
			->order_by('wt.status','DESC')
			->order_by('wt.id','DESC');
		if ( ! is_null($search))
		{
			$this->db->like('wt.title',$search);
		}
		$this->data['topic'] = $this->db->get('webboard_topic as wt')->result_array();
		$this->load->view('topic_search',$this->data);
	}

	function view_topic($id)
	{
		$post = $this->input->post();
		if ($post)
		{
			if ($this->webboard->save_comment($post) === TRUE)
			{
				$this->session->set_flashdata('info',lang('message_form_success'));
			}
			else
			{
				$this->session->set_flashdata('warning',lang('message_form_warning'));
			}
			redirect($this->agent->referrer());
		}
		if ((int)$id > 0)
		{
			$this->webboard->view_up($id);
			$offset = ($this->input->get('p') > 0) ? $this->input->get('p') : '0';
			$this->load->library('pagination');
			$config	= array(
				'base_url' => site_url(uri_string()),
				'total_rows' => $this->db->where('webboard_topic_id',$id)->count_all_results('webboard_comment'),
				'per_page' => 10
			);
			$this->pagination->initialize($config);
			$this->data['pinned'] = $this->db
				->select('wc.*,us.picture,us.username,us.role')
				->join('user as us','us.id = wc.user_id')
				->where('wc.webboard_topic_id',$id)
				->where('wc.status','1')
				->order_by('id','DESC')
				->get('webboard_comment as wc')
				->result_array();
			$this->data['comment'] = $this->db
				->select('wc.*,us.picture,us.username,us.role')
				->join('user as us','us.id = wc.user_id')
				->where('wc.webboard_topic_id',$id)
				->where('wc.status','')
				->limit($config['per_page'])
				->offset($offset)
				->get('webboard_comment as wc')
				->result_array();
			$this->load->helper('captcha');
			$captcha = recaptcha();
			$this->session->set_flashdata('captcha',$captcha['word']);
			$this->data['captcha'] = create_captcha($captcha);
			$this->data['topic'] = $this->db
				->select('wt.*,us.picture,us.username,us.role')
				->join('user as us','us.id = wt.user_id')
				->where('wt.id',$id)
				->get('webboard_topic as wt')
				->row_array();
		}
		else
		{
			redirect('webboard');
		}
		$this->load->view('topic_view',$this->data);
	}

	function pin_topic($id,$status)
	{
		if ($this->session->admin)
		{
			if ($this->webboard->pin_topic($id,$status) === TRUE)
			{
				$this->session->set_flashdata('success',lang('message_form_success'));
			}
			else
			{
				$this->session->set_flashdata('info',lang('message_form_warning'));
			}
			redirect($this->agent->referrer());
		}
	}

	function remove_topic($id)
	{
		if ($this->session->admin)
		{
			if ($this->webboard->remove_topic($id))
			{
				$this->session->set_flashdata('success',lang('message_form_success'));
			}
			redirect($this->agent->referrer());
		}
		return FALSE;
	}

	function pin_comment($id)
	{
		if ($this->session->admin)
		{
			if ($this->webboard->pin_comment($id))
			{
				$this->session->set_flashdata('success',lang('message_form_success'));
			}
			redirect($this->agent->referrer());
		}
		return FALSE;
	}

	function remove_comment($id)
	{
		if ($this->session->admin)
		{
			if ($this->webboard->remove_comment($id))
			{
				$this->session->set_flashdata('success',lang('message_form_success'));
			}
			redirect($this->agent->referrer());
		}
		$this->session->set_flashdata('info','ไม่สามารถลบคอมเม้นต์');
		redirect($this->agent->referrer());
	}

}
