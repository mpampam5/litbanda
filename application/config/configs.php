<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Version: 1.0
* Author: mpampam
*	Email : mpampam5@gmail.com
*/

//base_url
$config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$config['base_url'] .= "://".$_SERVER['HTTP_HOST'];
$config['base_url'] .= preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME']));

//profile
$config['name']        = "Mpampam";
$config['description'] = "mpampam";
$config['version']     = "1.0";
$config['logo']        = "cpanel-logo.svg";
$config['key']         = "wsx , lp-12345qwerty";

//database
// $config['host']     = "localhost";
// $config['db']       = "apalah";
// $config['username'] = "root";
// $config['password'] = "";

 //DIR style
 $config['admin_dir'] = $config['base_url']."/temp/admin/";
 $config['public_dir'] = $config['base_url']."/temp/public/";
