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

if ( ! function_exists('form_url'))
{
	function form_url($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'url',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('form_tel'))
{
	function form_tel($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'tel',
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
		$title = ((string)$title !== '') ? $title : 'Accept';
		$attributes = array(
			'type' => 'submit',
			'class' => 'btn btn-lg btn-default',
			'value' => $title
		);
		$attributes = _stringify_attributes($attributes);
		return '<input '.$attributes.'>';
	}
}

if ( ! function_exists('form_button_submit'))
{
	function form_button_submit($title='')
	{
		$title = ((string)$title !== '') ? $title : 'Submit';
		$attributes = array(
			'type' => 'submit',
			'class' => 'btn btn-lg btn-success',
			'value' => $title
		);
		$attributes = _stringify_attributes($attributes);
		return '<input '.$attributes.'>';
	}
}

if ( ! function_exists('form_button_reset'))
{
	function form_button_reset($title='')
	{
		$title = ((string)$title !== '') ? $title : 'Reset';
		$attributes = array(
			'type' => 'reset',
			'class' => 'btn btn-lg btn-warning',
			'value' => $title
		);
		$attributes = _stringify_attributes($attributes);
		return '<input '.$attributes.'>';
	}
}

if ( ! function_exists('form_anchor_edit'))
{
	function form_anchor_edit($uri='')
	{
		$title = (string) '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>';
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
		$title = (string) '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
		$site_url = is_array($uri)
			? site_url($uri)
			: (preg_match('#^(\w+:)?//#i', $uri) ? $uri : site_url($uri));
		$attributes = array(
			'type' => 'button',
			'class' => 'btn btn-warning',
			'onclick' => "return confirm('ต้องการลบใช่หรือไม่ ?');"
		);
		$attributes = _stringify_attributes($attributes);
		return '<a href="'.$site_url.'"'.$attributes.'>'.$title.'</a>';
	}
}

if ( ! function_exists('dropdown_answer'))
{
	function dropdown_answer()
	{
		$answer = array(
			'' => 'เลือกคำตอบ',
			'1' => 'ก.',
			'2' => 'ข.',
			'3' => 'ค.',
			'4' => 'ง.',
			'5' => 'จ.',
		);
		return $answer;
	}
}
