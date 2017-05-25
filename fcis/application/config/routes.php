<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'users';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/dashboard';

$route['signout'] = 'users/signout';
$route['signin'] = 'users/signin';
$route['signup'] = 'users/signup';

$route['auth/activate/(:num)/(:any)'] = 'users/activate/$1/$2';
