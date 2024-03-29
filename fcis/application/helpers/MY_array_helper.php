<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('any_in_array'))
{
  /**
   * Lets you check trought your array
   * If the function is empty it returns FALSE (defaul is FALSE)
   *
   * @param	array $needle
   * @param	array $haystack
   * @return boolean, TRUE if in array || FALSE if not
   *
   * Example : any_in_array(array('1','2'), array('1','3','5','7','9')));
   */
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

if ( ! function_exists('clear_null_array'))
{
  /**
   * Lets you check trought your array
   * If the function is empty it returns NULL (defaul is NULL)
   *
   * @param	array $array
   * @return array $array with clear couple of null value
   *
   * Example : clear_null_array(array('1'=>'','2'=>'true','3'=>false,'4'=>null)));
   */
  function clear_null_array($array)
  {
    $array = is_array($array) ? $array : array($array);
    $array = array_map('trim', $array);
		$array = array_filter($array);
    return $array;
  }
}

/**
*  Sorts an array (you know the kind) by key
 * and by the comparison operator you prefer.
 * Note that instead of most important criteron first, it's
 * least important criterion first.
 * The default sort order is ascending, and the default sort
 * type is strnatcmp.
 *
 * @param array		The array to sort
 *
 * Example of usage : multisort($a, "'name'", true, 0, "'id'", false, 2));
 */
 if ( ! function_exists('multisort'))
 {
   function multisort(&$array)
   {
     for($i = 1; $i < func_num_args(); $i += 3)
     {
       $key = func_get_arg($i);
       $order = true;

       if($i + 1 < func_num_args())
         $order = func_get_arg($i + 1);

       $type = 0;
       if($i + 2 < func_num_args())
         $type = func_get_arg($i + 2);

       switch($type)
       {
         case 1: // Case insensitive natural.
         $t = 'strnatcasecmp($a[' . $key . '], $b[' . $key . '])';
         break;
         case 2: // Numeric.
         $t = '$a[' . $key . '] - $b[' . $key . ']';
         break;
         case 3: // Case sensitive string.
         $t = 'strcmp($a[' . $key . '], $b[' . $key . '])';
         break;
         case 4: // Case insensitive string.
         $t = 'strcasecmp($a[' . $key . '], $b[' . $key . '])';
         break;
         default: // Case sensitive natural.
         $t = 'strnatcmp($a[' . $key . '], $b[' . $key . '])';
         break;
       }
       uasort($array, create_function('$a, $b', 'return ' . ($order ? '' : '-') . '(' . $t . ');'));
     }
     return $array;
   }
 }

/**
 * Recusively search a value for a given key
 *
 * $std = new stdClass();
 * $std->name     = 'luke';
 * $std->age     = '25';
 * $std->sex     = 'M';
 *
 * $array     = array(	array('type'=>'dog', 'name'=>'butch', 'sex'=>'m', 'breed'=>'boxer'),
 *                    	array('type'=>'dog', 'name'=>'fido', 'sex'=>'m', 'breed'=>'doberman'),
 *                    	'simpleValue',
 *                    	array('type'=>'cat', 'name'=>'tiddles','sex'=>'m', 'breed'=>'maine coon'),
 *                   	array('type'=>'horse', 'name'=>'ed','sex'=>'m', 'breed'=>'clydesdale'),
 *                   	$std);
 *
 * echo array_recursive_search($array, '25', 'age');        	// returns 5
 * echo array_recursive_search($array, '25', 'name');    		// returns false
 * echo array_recursive_search($array, 'simpleValue');    	// returns 2
 * echo array_recursive_search($array, 'fido');            	// returns 1
 *
 */
 if ( ! function_exists('array_recursive_search'))
 {
   function array_recursive_search($haystack, $needle, $index = null)
   {
     $aIt     = new RecursiveArrayIterator($haystack);
     $it    = new RecursiveIteratorIterator($aIt);
     while($it->valid())
     {
       if (((isset($index) AND ($it->key() == $index)) OR (!isset($index))) AND ($it->current() == $needle)) {
         return $aIt->key();
       }
       $it->next();
     }
     return FALSE;
   }
 }

//function array_recursive_get

if ( ! function_exists('array_get'))
{
	function array_get($array, $searched, $index)
	{
		$aIt = new RecursiveArrayIterator($array);
		$it = new RecursiveIteratorIterator($aIt);
		while($it->valid())
		{
			if (((isset($index) AND ($it->key() == $index)) OR (!isset($index))) AND ($it->current() == $searched))
			{
				$c = $aIt->current();
				return $c;
//				return $c[$key];
			}
			$it->next();
		}
		return FALSE;
	}
}
