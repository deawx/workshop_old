<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('any_in_array'))
{
  function any_in_array($needle, $haystack)
  {
    $needle = is_array($needle) ? $needle : array($needle);
    $haystack = (array)$haystack;

    foreach ($needle as $item)
    {
      if (in_array($item, $haystack))
      {
        return TRUE;
      }
    }
    return FALSE;
  }
}
