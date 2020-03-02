<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['pre_controller'][] = array(
    'class'    => '',
    'function' => 'initialize_php_activerecord',
    'filename' => 'ActiveRecord.php',
    'filepath' => 'third_party/php-activerecord'                                
);

$hook['pre_controller'][] = array(
  'class'  => 'FBXHProfiler',
  'function' => 'XHPStart',
  'filename' => 'fbxhprofiler.php',
  'filepath' => 'hooks',
  'params' => array()
);
 
$hook['post_controller'][] = array(
   'class'  => 'FBXHProfiler',
   'function' => 'XHPEnd',
   'filename' => 'fbxhprofiler.php',
   'filepath' => 'hooks',
   'params' => array()
);

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */