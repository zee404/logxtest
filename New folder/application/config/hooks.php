<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/


$hook['post_controller_constructor'] = array(
'class' => 'Loging_hook',
'function' => 'checkb4visit',
'filename' => 'Loging_hook.php',
'filepath' => 'controllers/my_hooks'
);

$hook['post_system'] = array(
'class' => 'Loging_hook',
'function' => 'save_log',
'filename' => 'Loging_hook.php',
'filepath' => 'controllers/my_hooks'
);