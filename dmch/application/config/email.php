<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['smtp_host'] =  'ssl://smtp.gmail.com';
$config['smtp_user'] =  'email@gmail.com';
$config['smtp_pass'] =  'password';
$config['smtp_port'] =  '465';
