<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-01-12 13:13:19 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt. ~ SYSPATH\classes\Kohana\Cookie.php [ 152 ] in D:\OPENSERVER\html\booklet\system\classes\Kohana\Cookie.php:67
2013-01-12 13:13:19 --- DEBUG: #0 D:\OPENSERVER\html\booklet\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('session_payload', NULL)
#1 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request.php(155): Kohana_Cookie::get('session_payload')
#2 D:\OPENSERVER\html\booklet\booklet.atwebpages.com\index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in D:\OPENSERVER\html\booklet\system\classes\Kohana\Cookie.php:67
2013-01-12 13:16:03 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt. ~ SYSPATH\classes\Kohana\Cookie.php [ 152 ] in D:\OPENSERVER\html\booklet\system\classes\Kohana\Cookie.php:67
2013-01-12 13:16:03 --- DEBUG: #0 D:\OPENSERVER\html\booklet\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('session_payload', NULL)
#1 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request.php(155): Kohana_Cookie::get('session_payload')
#2 D:\OPENSERVER\html\booklet\booklet.atwebpages.com\index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in D:\OPENSERVER\html\booklet\system\classes\Kohana\Cookie.php:67