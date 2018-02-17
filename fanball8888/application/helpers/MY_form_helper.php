<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('form_number'))
{
	function form_number($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'number',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('form_email'))
{
	function form_email($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'email',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('form_button_default'))
{
	function form_button_default($title='')
	{
		$title = ((string)$title !== '') ? $title : '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>';
		$attributes = array(
			'type' => 'submit',
			'style' => 'width:10em;',
			'class' => 'btn btn-default'
		);
		$attributes = _stringify_attributes($attributes);
		return '<button '.$attributes.'>'.(string)$title.'</button>';
	}
}

if ( ! function_exists('form_button_submit'))
{
	function form_button_submit($title='')
	{
		$title = ($title !== '') ? $title : 'บันทึก';
		$attributes = array(
			'type' => 'submit',
			'style' => 'width:10em;',
			'class' => 'btn btn-success'
		);
		$attributes = _stringify_attributes($attributes);
		return '<button '.$attributes.'>'.(string)$title.'</button>';
	}
}

if ( ! function_exists('form_button_reset'))
{
	function form_button_reset($title='')
	{
		$title = ($title !== '') ? $title : 'รีเซ็ต';
		$attributes = array(
			'type' => 'reset',
			'style' => 'width:10em;',
			'class' => 'btn btn-warning'
		);
		$attributes = _stringify_attributes($attributes);
		return '<button '.$attributes.'>'.(string)$title.'</button>';
	}
}

if ( ! function_exists('form_anchor_edit'))
{
	function form_anchor_edit($uri='')
	{
		$title = (string) 'แก้ไข';
		$site_url = is_array($uri)
			? site_url($uri)
			: (preg_match('#^(\w+:)?//#i', $uri) ? $uri : site_url($uri));
		$attributes = array(
			'type' => 'button',
			'class' => 'btn btn-info'
		);
		$attributes = _stringify_attributes($attributes);
		return '<a href="'.$site_url.'"'.$attributes.'>'.$title.'</a>';
	}
}

if ( ! function_exists('form_anchor_delete'))
{
	function form_anchor_delete($uri='')
	{
		$title = (string) 'ลบ';
		$site_url = is_array($uri)
			? site_url($uri)
			: (preg_match('#^(\w+:)?//#i', $uri) ? $uri : site_url($uri));
		$attributes = array(
			'onclick' => "return confirm('ต้องการลบใช่หรือไม่ ?');"
		);
		$attributes = _stringify_attributes($attributes);
		return '<a href="'.$site_url.'"'.$attributes.'>'.$title.'</a>';
	}
}

if ( ! function_exists('form_anchor_back'))
{
	function form_anchor_back($uri='',$title='')
	{
		$title = ($title !== '') ? $title : 'ย้อนกลับ';
		$site_url = is_array($uri)
			? site_url($uri)
			: (preg_match('#^(\w+:)?//#i', $uri) ? $uri : site_url($uri));
		$attributes = array(
			'type' => 'button',
			'style' => 'width:8em;',
			'class' => 'btn btn-default'
		);
		$attributes = _stringify_attributes($attributes);
		return '<a href="'.$site_url.'"'.$attributes.'>'.(string)$title.'</a>';
	}
}

if ( ! function_exists('dropdown_bank'))
{
  function dropdown_bank()
  {
    $bank = array(
      '' => lang('form_choose'),
      'ธนาคารกรุงเทพ' => lang('form_bank_bbl'),
      'ธนาคารกรุงไทย' => lang('form_bank_ktb'),
      'ธนาคารกสิกรไทย' => lang('form_bank_kbank'),
      'ธนาคารไทยพาณิชย์' => lang('form_bank_scb'),
			'ธนาคารกรุงศรีอยุธยา' => lang('form_bank_bay'),
			'ธนาคารออมสิน' => lang('form_bank_gsb'),
			'ธนาคารทหารไทย' => lang('form_bank_tmb')
    );
    return $bank;
  }
}

if ( ! function_exists('dropdown_bank_office'))
{
  function dropdown_bank_office()
  {
    $bank = array(
      '' => lang('form_choose'),
      'ธนาคารกรุงเทพ' => lang('form_bank_bbl'),
      'ธนาคารกรุงไทย' => lang('form_bank_ktb'),
      'ธนาคารกสิกรไทย' => lang('form_bank_kbank'),
      'ธนาคารไทยพาณิชย์' => lang('form_bank_scb')
    );
    return $bank;
  }
}

if ( ! function_exists('dropdown_method'))
{
  function dropdown_method()
  {
    $bank = array(
      '' => lang('form_choose'),
      'ตู้เอทีเอ็ม' => lang('form_method_atm'),
      'ตู้ซีเอ็มดี' => lang('form_method_cmd'),
      'เว็บแอพ' => lang('form_method_web'),
      'โมบายแอพ' => lang('form_method_mobile'),
      'เคาเตอร์ธนาคาร' => lang('form_method_counter')
    );
    return $bank;
  }
}

if ( ! function_exists('dropdown_question'))
{
  function dropdown_question()
  {
    $question = array(
      '' => lang('form_choose'),
			'กีฬาที่ชื่นชอบมากที่สุด' => lang('form_question_sport_name'),
      'ชื่อนักกีฬาที่ชื่นชอบมากที่สุด' => lang('form_question_player_name'),
      'ชื่อสโมสรกีฬาที่ชื่นชอบมากที่สุด' => lang('form_question_club_name'),
      'ชื่อประเทศที่ชื่นชอบมากที่สุด' => lang('form_question_country_name'),
      'สถานที่ท่องเที่ยวที่ชื่นชอบมากที่สุด' => lang('form_question_attraction_name')
    );
    return $question;
  }
}

if ( ! function_exists('dropdown_theme'))
{
  function dropdown_theme()
  {
    $bank = array(
			'default' => lang('form_theme_default'),
			'cerulean' => lang('form_theme_cerulean'),
			'cosmo' => lang('form_theme_cosmo'),
			'cyborg' => lang('form_theme_cyborg'),
			'darkly' => lang('form_theme_darkly'),
			'flatly' => lang('form_theme_flatly'),
      'journal' => lang('form_theme_journal'),
      'lumen' => lang('form_theme_lumen'),
			'paper' => lang('form_theme_paper'),
      'readable' => lang('form_theme_readable'),
			'sandstone' => lang('form_theme_sandstone'),
			'simplex' => lang('form_theme_simplex'),
      'slate' => lang('form_theme_slate'),
      'spacelab' => lang('form_theme_spacelab'),
			'superhero' => lang('form_theme_superhero'),
      'united' => lang('form_theme_united'),
      'yeti' => lang('form_theme_yeti')
    );
    return $bank;
  }
}
