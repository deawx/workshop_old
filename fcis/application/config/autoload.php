<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','session','email','form_validation','user_agent','log_user');

$autoload['drivers'] = array();

$autoload['helper'] = array('url','file','form','html','text','date','array','general','security');

$autoload['config'] = array('ci-blog');

$autoload['language'] =array('auth', 'ion_auth');

$autoload['model'] = array();
