<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| EMAIL CONFING
| -------------------------------------------------------------------
| Configuration of outgoing mail server.
|
*/
/*
$config['protocol']='smtp';
$config['smtp_host']='smtp.postmarkapp.com';
$config['smtp_timeout']='30';
$config['smtp_user']='30a8ee25-daf7-4253-a251-174fbd0b9df1';
$config['smtp_pass']='30a8ee25-daf7-4253-a251-174fbd0b9df1';
$config['charset']='utf-8';
$config['newline']="\r\n";
$config['mailtype']="html";
*/

$config['protocol']='smtp';
$config['smtp_host']='smtp.sendgrid.net';
$config['smtp_port']='587';
$config['smtp_user']='';

$config['smtp_pass']='@3';
$config['crlf']="\r\n";
$config['newline']="\r\n";
// $config['mailtype']="html";

/* End of file email.php */
/* Location: ./system/application/config/email.php */
