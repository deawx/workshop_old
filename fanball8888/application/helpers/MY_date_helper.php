<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('date_calendar'))
{
  function date_calendar($date_needle,$language='')
  {
    $CI =& get_instance();

    $date_needle = (string)$date_needle
    ? strtolower($date_needle)
    : NULL;

    $language = $CI->session->language !== FALSE
      ? $CI->session->language
      : $CI->config->item('language');

    $date_haystack = $CI->lang->load('calendar',$language,TRUE);
    foreach ($date_haystack as $_dh => $dh)
    {
      if (strpos($_dh,$date_needle) !== FALSE)
      {
        return $dh;
      }
    }
    return FALSE;
  }

}
