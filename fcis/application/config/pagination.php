<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['per_page'] = 10;
$config['num_links'] = 5;
$config['uri_segment'] = 4;
$config['page_query_string'] = TRUE;
$config['use_page_numbers'] = FALSE;
$config['display_pages'] = TRUE;
$config['reuse_query_string'] = TRUE;
$config['query_string_segment'] = 'offset';

$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';

$config['first_link'] = '&laquo;';
$config['first_tag_open'] = '<li class="first page">';
$config['first_tag_close'] = '</li>';

$config['last_link'] = '&raquo;';
$config['last_tag_open'] = '<li class="last page">';
$config['last_tag_close'] = '</li>';

$config['next_link'] = '&rarr;';
$config['next_tag_open'] = '<li class="next page">';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '&larr;';
$config['prev_tag_open'] = '<li class="prev page">';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="active"><a href="">';
$config['cur_tag_close'] = '</a></li>';

$config['num_tag_open'] = '<li class="page">';
$config['num_tag_close'] = '</li>';

$config['anchor_class'] = 'follow_link';
