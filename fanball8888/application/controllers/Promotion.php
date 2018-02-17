<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends Public_Controller {

	function index()
	{
		$this->data['promotion'] = $this->db->select('id,name')->order_by('sort')->get('promotion')->result_array();
		$this->data['event'] = $this->db
			->select('ev.*,pt.name')
			->join('promotion as pt','pt.id = ev.promotion_id')
			->get('event as ev')
			->result_array();
		$this->load->view('promotion',$this->data);
	}

	function get_bonus($pid,$id)
	{
		if ( ! (int)$pid OR ! (int)$id)
		{
			redirect('promotion');
		}
		$this->session->set_userdata('product_id',$pid);
		$this->session->set_userdata('event_id',$id);
		redirect('product/'.$pid);
	}

	function get_event($id)
	{
		if ( ! $id)
		{
			echo FALSE;
		}
		$events = $this->db->where('ev.id',$id)->get('event as ev')->row_array();
		$event = img('assets/images/promotion/large_'.$events['picture'],'',array('class'=>'img-responsive'));
		$event .= '<h4><i class="fa fa-calendar"></i> : วันที่เริ่ม : '.$events['startdate'].'</h4>';
		if ($events['limits'] > 0)
		{
			$counts = $this->db->where('event_id',$id)->count_all_results('deposit');
			if ($counts <= $events['limits'])
			{
				$event .= '<h4><i class="fa fa-clock-o"></i> : สถานะปัจจุบัน : OPEN'.'</h4>';
			}
			$event .= '<p><i class="fa fa-users"></i> : จำนวนจำกัด : '.$events['limits'].' แอคเคาท์</p>';
		}
		$event .= '<p><i class="fa fa-money"></i> : ';
		$event .= 'ยอดฝากขั้นต่ำ  : <u>'.number_format($events['minimum'],'2').' ฿</u> ';
		$event .= 'ยอดฝากสูงสุด  : <u>'.number_format($events['maximum'],'2').' ฿</u>';
		$event .= '</p>';
		$event .= '<hr><p class="text-indent:1em;">'.$events['detail'].'</p>';
		$event_groups = $this->db->select('ev.group_id,gp.detail')->where('ev.event_id',$id)->join('group as gp','gp.id=ev.group_id')->get('event_group as ev')->result_array();
		$event_group = array();
		foreach ($event_groups as $eg)
		{
			$event_group[] = $eg['group_id'];
		}
		$event_product = $this->db->select('pd.id,pd.name')->join('product as pd','pd.id = ep.product_id')->where('ep.event_id',$id)->get('event_product as ep')->result_array();
		$event .= '<hr>';
		if ($event_product)
		{
			$num = count($event_product);
			$grid = 12;
			if ($num >= 4)
			{
				$grid = 24;
			}
			$column = $grid/$num;
		}
		if ($this->session->login === TRUE) :
			if ( ! $event_group OR any_in_array($this->session->group,$event_group)) :
				$event .= '<div class="row">';
				foreach ($event_product as $_ep=>$ep)
				{
					$event .= '<div class="col-md-'.$column.'" style="padding-bottom:0.1em;">'.anchor('promotion/get_bonus/'.$ep['id'].'/'.$id,$ep['name'],array('class'=>'btn btn-success btn-block')).'</div>';
				}
				$event .= '</div>';
			else:
				$event .= '<h4><i class="fa fa-exclamation-circle"></i> เงื่อนไขที่ต้องการ <small>(ข้อใดข้อหนึ่ง)</small></h4>';
				foreach ($event_groups as $_eg=>$eg)
				{
					$event .= '<p style="text-indent:1em;">'.++$_eg.nbs(3).$eg['detail'].'</p>';
				}
				$event .= '<br>';
			endif;
		else:
			// $event .= 'จำเป็นต้อง '.anchor('user/login',lang('navbar_login'),array('class'=>'btn btn-primary'));
			// $event .= ' หรือ '.anchor('user/register',lang('navbar_register'),array('class'=>'btn btn-primary'));
		endif;
		echo $event;
	}

}
