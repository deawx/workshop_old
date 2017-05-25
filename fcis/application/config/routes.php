<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'welcome';
$route['admin'] = 'admin/dashboard';

$route['signout'] = 'users/signout';
$route['signin'] = 'users/signin';
$route['signup'] = 'users/signup';
$route['auth/activate/(:num)/(:any)'] = 'users/activate/$1/$2';

$route['read/(:any)'] = 'posts/read/$1';

$route['category/(:any)'] = 'posts/category/$1';
$route['category/(:any)/(:num)'] = 'posts/category/$1/$2';

$route['tag/(:any)'] = 'posts/tag/$1';
$route['tag/(:any)/(:num)'] = 'posts/tag/$1/$2';

$route['blog'] = 'posts/index';
$route['blog/(:num)'] = 'posts/index/$1';
