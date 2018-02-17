<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('recaptcha'))
{
  function recaptcha()
  {
    $captcha = array(
      'word' => rand('1111','9999'),
      'img_path' => './captcha/',
      'img_url' => base_url().'captcha/',
      'img_width' => '150',
      'img_height' => '50',
      'expiration' => 2400,
      'font_path' => 'system/fonts/texb.ttf',
      'font_size'	=> 22,
      'colors' => array(
      'background' => array(255, 255, 255),
      'border' => array(255, 255, 255),
      'text' => array(0, 0, 0),
      'grid' => array(255, 40, 40)
      )
    );
    return $captcha;
  }
}
